<?php

namespace App\Http\Livewire;

use App\Models\Galeri;
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
        $deleteId;

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
                'galeris' => $galeris
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
            'file_name' => $imageValidation
        ]);

        if ($this->file_name != $this->old_file_name) {
            $fileName = $this->file_name->store('galeri');
        } else {
            $fileName = $this->file_name;
        }

        $result = Galeri::updateOrCreate(['id' => $this->galeri_id], [
            'judul' => $this->judul,
            'tanggal' => $this->tanggal,
            'deskripsi' => $this->deskripsi,
            'file_name' => $fileName
        ]);
        if ($result != "0") {
            session()->flash('message', 'Berhasil Mengupdate data');
        } else {
            session()->flash('errMessage', 'Gagal Mengupdate data');
        }
        $this->closeModal();
        $this->resetField();
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
