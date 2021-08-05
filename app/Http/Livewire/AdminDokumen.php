<?php

namespace App\Http\Livewire;

use App\Models\Dokumen;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class AdminDokumen extends Component
{
    use WithPagination;
    use WithFileUploads;



    public $nama,
        $tahun,
        $keterangan,
        $link,
        $search,
        $modal = false,
        $dokumen_id,
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
            $dokumens = Dokumen::where('nama', 'like', '%' . $this->search . '%')->paginate(5);
        } else {
            $dokumens = Dokumen::latest()->paginate(5);
        }
        return view(
            'livewire.admin-dokumen',
            [
                'dokumens' => $dokumens
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
        $this->nama = "";
        $this->tahun = "";
        $this->keterangan = "";
        $this->link = "";
        $this->deleteId = null;
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'tahun' => 'required',
            'keterangan' => 'required',
            'link' => 'required',
        ]);


        $result = Dokumen::updateOrCreate(['id' => $this->dokumen_id], [
            'nama' => $this->nama,
            'tahun' => $this->tahun,
            'keterangan' => $this->keterangan,
            'link' => $this->link
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
        $dokumen = Dokumen::find($id);
        $this->nama = $dokumen->nama;
        $this->tahun = $dokumen->tahun;
        $this->keterangan = $dokumen->keterangan;
        $this->link = $dokumen->link;
        $this->dokumen_id = $id;
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
        $dokumen = Dokumen::find($id);
        $result = $dokumen->delete();
        if ($result != "0") {
            session()->flash('message', 'Berhasil Mengahapus data');
        } else {
            session()->flash('errMessage', 'Gagal Mengahapus data');
        }
        $this->closeDeleteModal();
    }
}
