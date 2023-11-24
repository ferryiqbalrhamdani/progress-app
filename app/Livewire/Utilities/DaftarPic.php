<?php

namespace App\Livewire\Utilities;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class DaftarPic extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Rule('required', as: 'Nama')]
    public $name;

    public $nama_pt, $jk, $role_id ;

    public $perPage = 5;
    public $sortField ='created_at';
    public $sortDirection = 'desc';

    public $id_vendor;

    #[Url()]
    public $search = '';

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

    public function detail($id) {
        $user = User::where('id', $id)->first();

        $this->name = $user->nama;
        $this->nama_pt = $user->nama_pt;
        $this->jk = $user->jk;

        // dd($user);

        $this->dispatch('show-detail-modal');
    }

    public function swapSortDirection() {
       return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    } 

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.utilities.daftar-pic', [
            'pic' => User::where('role_id', 3)
                                    ->where('nama', 'like', '%'.$this->search.'%')
                                    ->orderBy($this->sortField, $this->sortDirection)
                                    ->paginate($this->perPage),
            'total' => User::where('role_id', 3)->count(),
        ]);
    }
}
