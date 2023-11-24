<?php

namespace App\Livewire\Utilities;

use App\Models\Vendor;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarVendor extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Rule('required', as: 'Nama')]
    public $name;

    public $perPage = 5;
    public $sortField ='created_at';
    public $sortDirection = 'desc';

    public $id_vendor;

    #[Url()]
    public $search = '';

    public function hapus($id) {
        $daftar_vendor = Vendor::where('id', $id)->first();
        $this->id_vendor = $daftar_vendor->id;
        $this->name = $daftar_vendor->name;

        $this->dispatch('show-delete-modal');
    }

    public function destroy() {
        Vendor::where('id', $this->id_vendor)->delete();

        $this->id_vendor = '';

        Alert::toast('Data berhasil dihapus.', 'success');
        return redirect('daftar-vendor');
    }

     public function ubah($id) {
        $daftar_vendor = Vendor::where('id', $id)->first();
        $this->id_vendor = $daftar_vendor->id;
        $this->name = $daftar_vendor->name;

        $this->dispatch('show-ubah-modal');
    }

    public function update() {
        $this->validate();
        
        Vendor::where('id', $this->id_vendor)->update([
            'name' => $this->name
        ]);

        $this->id_vendor = '';
        $this->name = '';

        Alert::toast('Data berhasil diubah.', 'success');
        return redirect('daftar-vendor');
    }

    public function storeData() {
        $this->validate();

        Vendor::create([
            'name' => $this->name
        ]);

        Alert::toast('Data berhasil ditambah.', 'success');
        return redirect('daftar-vendor');
    }

    public function closeModal() {
        $this->id_vendor = '';
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
        return view('livewire.utilities.daftar-vendor', [
            'vendor' => Vendor::where('name', 'like', '%'.$this->search.'%')
                                    ->orWhere('created_at', 'like', '%'.$this->search.'%')
                                    ->orderBy($this->sortField, $this->sortDirection)
                                    ->paginate($this->perPage),
            'total' => Vendor::count(),
        ]);
    }
}
