<?php

namespace App\Http\Livewire;

use App\Models\AdditionalPhotos;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class AdminGaleri extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $judul,
        $tanggal,
        $deskripsi,
        $file_name,
        $search,
        $modal = false,
        $galeri_id,
        $old_file_name,
        $deleteConfirmation = false,
        $viewModal = false,
        $deleteId,
        $additionalPhotos = [];

    public $selectedItem,
        $postId,
        $getGaleriId,
        $filename,
        $galeriDetail;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $updateQueryString = ['search'];

    public function render()
    {
        if ($this->search) {
            $galeris = Galeri::where('Judul', 'like', '%' . $this->search . '%')->paginate(5);
        } else {
            $galeris = Galeri::latest()->paginate(5);
        }
        return view(
            'livewire.admin-galeri',
            [
                'galeris' => $galeris,
                // 'additionalPhotos' => Galeri::all()
            ]
        );
    }

    public function openModal()
    {
        $this->modal = true;
    }
    public function closeModal()
    {
        $this->modal = false;
        $this->resetField();
    }
    public function resetField()
    {
        $this->judul = "";
        $this->tanggal = "";
        $this->deskripsi = "";
        $this->file_name = null;
        $this->deleteId = null;
        $this->additionalPhotos = null;
    }

    public function store()
    {
        $imageValidation = '';
        if ($this->file_name != $this->old_file_name) {
            $imageValidation = "required|image|mimes:jpg,jpeg,png|max:1024";
        }
        $this->validate([
            'judul' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'file_name' => $imageValidation,
            'additionalPhotos.*' => 'required|image|mimes:jpg,jpeg,png|max:1024'
        ]);

        if ($this->file_name != $this->old_file_name) {
            $fileName = $this->file_name->store('galeri');
        } else {
            $fileName = $this->file_name;
        }

        // // save photo to galeri
        // foreach ($this->additionalPhotos as $photo) {
        //     $photo->store('galeri');
        // }


        // if (!empty($this->additionalPhotos)) {
        //     $validateData = array_merge($validateData, [
        //         'additionalPhotos.*' => 'image'
        //     ]);
        // }

        $result = Galeri::updateOrCreate(['id' => $this->galeri_id], [
            'judul' => $this->judul,
            'tanggal' => $this->tanggal,
            'deskripsi' => $this->deskripsi,
            'file_name' => $fileName
        ]);

        if ($this->galeri_id) {
            $galeriInstanceId = $this->galeri_id;
        } else {
            $galeriInstanceId = $result->id;
        }

        // upload the image
        if (!empty($this->additionalPhotos)) {
            foreach ($this->additionalPhotos as $photo) {
                $photo->store('public/additional_photos');
                // foreach ($this->additionalPhotos as $photo) {
                //     $photo->store('galeri');

                // save the filename in the additional_photos table
                AdditionalPhotos::create([
                    'galeri_id' => $galeriInstanceId,
                    'filename' => $photo->hashName()
                ]);
            }
        }

        if ($result != "0") {
            session()->flash('message', 'Berhasil Mengupdate data');
        } else {
            session()->flash('errMessage', 'Gagal Mengupdate data');
        }
        $this->closeModal();
        $this->resetField();
    }

    // // Additional Photo
    // protected $listener = [
    //     'getPostId'
    // ];
    // public function getPostId($postId)
    // {
    //     $this->postId = $postId;
    // }

    // view modal Additional Photos
    public function openViewModal($itemId)
    {
        $this->selectedItem = $itemId;
        // $this->emit('galeriId', $this->selectedItem);


        $this->galeriDetail = AdditionalPhotos::where('galeri_id', '=', $this->selectedItem)->get();

        // if ($galeridetail) {
        //     $this->filename = $galeridetail->filename;
        // }

        // // Bisa ini
        // $galeriId = Galeri::find($itemId)->getAdditionalPhotos;
        // $this->getGaleriId = $galeriId;
        $this->viewModal = true;
    }
    public function closeViewModal()
    {
        $this->viewModal = false;
    }


    public function edit($id)
    {
        $galeri = Galeri::find($id);
        $this->judul = $galeri->judul;
        $this->tanggal = $galeri->tanggal;
        $this->deskripsi = $galeri->deskripsi;
        $this->file_name = $galeri->file_name;
        $this->old_file_name = $galeri->file_name;
        $this->galeri_id = $id;
        $this->openModal();
    }

    public function openDeleteModal($id)
    {
        $this->deleteId = $id;
        $this->deleteConfirmation = true;
    }

    public function closeDeleteModal()
    {
        $this->deleteConfirmation = false;
        $this->resetField();
    }

    public function delete($id)
    {
        $galeri = Galeri::find($id);
        $result = $galeri->delete();
        if ($result != "0") {
            session()->flash('message', 'Berhasil Mengahapus data');
        } else {
            session()->flash('errMessage', 'Gagal Mengahapus data');
        }
        $this->closeDeleteModal();
    }
}
