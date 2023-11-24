<?php

namespace App\Livewire\Utilities;

use App\Models\Instansi;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarInstansi extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Rule('required', as: 'Nama')]
    public $name;

    public $perPage = 5;
    public $sortField ='created_at';
    public $sortDirection = 'desc';

    public $id_instansi;

    #[Url()]
    public $search = '';

    public function hapus($id) {
        $daftar_instansi = Instansi::where('id', $id)->first();
        $this->id_instansi = $daftar_instansi->id;
        $this->name = $daftar_instansi->name;

        $this->dispatch('show-delete-modal');
    }

    public function destroy() {
        Instansi::where('id', $this->id_instansi)->delete();

        $this->id_instansi = '';

        Alert::toast('Data berhasil dihapus.', 'success');
        return redirect('daftar-instansi');
    }

     public function ubah($id) {
        $daftar_instansi = Instansi::where('id', $id)->first();
        $this->id_instansi = $daftar_instansi->id;
        $this->name = $daftar_instansi->name;

        $this->dispatch('show-ubah-modal');
    }

    public function update() {
        $this->validate();
        
        Instansi::where('id', $this->id_instansi)->update([
            'name' => $this->name
        ]);

        $this->id_instansi = '';
        $this->name = '';

        Alert::toast('Data berhasil diubah.', 'success');
        return redirect('daftar-instansi');
    }

    public function storeData() {
        $this->validate();

        Instansi::create([
            'name' => $this->name
        ]);

        Alert::toast('Data berhasil ditambah.', 'success');
        return redirect('daftar-instansi');
    }

    public function closeModal() {
        $this->id_instansi = '';
        $this->name = '';
    }

    public function sortBy($sortField) {
        if($this->sortField === $sortField) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';

        }

        $this->sortField = $sortField;
    }

    public function swapSortDirection() {
       return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    } 
    
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.utilities.daftar-instansi', [
            'total' => Instansi::count(),
            'instansi' => Instansi::where('name', 'like', '%'.$this->search.'%')
                                    ->orWhere('created_at', 'like', '%'.$this->search.'%')
                                    ->orderBy($this->sortField, $this->sortDirection)
                                    ->paginate($this->perPage),
        ]);
    }
}
