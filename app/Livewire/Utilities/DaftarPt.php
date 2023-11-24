<?php

namespace App\Livewire\Utilities;

use App\Models\DaftarPT as ModelsDaftarPT;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarPt extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Rule('required', as: 'Nama PT')]
    public $name;

    public $perPage = 5;
    public $sortField ='created_at';
    public $sortDirection = 'desc';
    public $id_daftar_pt;

    #[Url()]
    public $search = '';

    public function sortBy($sortField) {
        if($this->sortField === $sortField) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';

        }

        $this->sortField = $sortField;
    }

    public function hapus($id) {
        $daftar_pt = ModelsDaftarPT::where('id', $id)->first();
        $this->id_daftar_pt = $daftar_pt->id;
        $this->name = $daftar_pt->name;

        $this->dispatch('show-delete-modal');
    }

    public function destroy() {
        ModelsDaftarPT::where('id', $this->id_daftar_pt)->delete();

        $this->id_daftar_pt = '';

        Alert::toast('Data berhasil dihapus.', 'success');
        return redirect('daftar-pt');
    }

     public function ubah($id) {
        $daftar_pt = ModelsDaftarPT::where('id', $id)->first();
        $this->id_daftar_pt = $daftar_pt->id;
        $this->name = $daftar_pt->name;

        $this->dispatch('show-ubah-modal');
    }

    public function update() {
        $this->validate();

        ModelsDaftarPT::where('id', $this->id_daftar_pt)->update([
            'name' => $this->name
        ]);

        $this->id_daftar_pt = '';
        $this->name = '';

        Alert::toast('Data berhasil diubah.', 'success');
        return redirect('daftar-pt');
    }

    public function storeData() {
        $this->validate();

        ModelsDaftarPT::create([
            'name' => $this->name
        ]);

        Alert::toast('Data berhasil ditambah.', 'success');
        return redirect('daftar-pt');
    }

    public function closeModal() {
        $this->id_daftar_pt = '';
        $this->name = '';
    }

    public function swapSortDirection() {
       return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    } 

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.utilities.daftar-pt', [
            'total' => ModelsDaftarPT::count(),
            'daftarPt' => ModelsDaftarPT::where('name', 'like', '%'.$this->search.'%')
                                        ->orWhere('created_at', 'like', '%'.$this->search.'%')
                                        ->orderBy($this->sortField, $this->sortDirection)
                                        ->paginate($this->perPage),
        ]);
    }
}
