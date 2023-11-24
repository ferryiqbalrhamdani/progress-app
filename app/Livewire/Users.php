<?php

namespace App\Livewire;

use App\Models\Admin;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 5;
    public $sortField = 'role_id';
    public $sortDirection = 'asc';

    public $id_user, $nama_role, $status, $successMessage;

    #[Url()]
    public $search = '';

    #[Rule('required|string')]
    public $nama;

    // #[Rule('required|unique:users,username|alpha_dash|min:3')]
    public $username;

    #[Rule('required|min:3')]
    public $password;


    #[Rule('required|alpha|max:1', as: 'jenis kelamin')]
    public $jk = 'L';

    #[Rule('required', as: 'role user')]
    public $role_id;

    public $showpassword = false;

    public function closeDelete()
    {
        $this->reset();
    }

    public function tambahUser()
    {
        $this->validate([
            'nama' => 'required|string',
            'username' => 'required|alpha_dash|min:3|unique:users,username,' . $this->id_user,
            'password' => 'required|min:3',
            'jk' => 'required|alpha|max:1',
            'role_id' => 'required',

        ]);
        User::create([
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'nama' => $this->nama,
            'role_id' => $this->role_id,
            'jk' => $this->jk,
        ]);


        Alert::toast('Data berhasil disimpan.', 'success');
        return redirect('users');
    }

    public function hapus()
    {
        User::where('id', $this->id_user)->delete();
        // Session::flash('message', 'Data berhasil dihapus.');
        $this->successMessage = 'Data berhasil dihapus.';
        $this->dispatch('confirm');
    }

    public function closeAlert()
    {
        $this->reset();
    }

    public function hapusUser($id)
    {
        $this->id_user = $id;

        $data = User::where('id', $this->id_user)->first();
        $this->nama = $data->nama;



        $this->dispatch('show-confirm-delete');
    }

    public function ubahUser($id)
    {
        $this->id_user = $id;

        $data = User::where('id', $this->id_user)->first();

        $this->nama = $data->nama;
        $this->username = $data->username;
        $this->jk = $data->jk;
        $this->role_id = $data->role_id;
        $this->nama_role = $data->role->name;

        $this->dispatch('show-ubah-modal');
    }

    public function ubah()
    {
        $this->validate([
            'nama' => 'required|string',
            'username' => 'required|alpha_dash|min:3|unique:users,username,' . $this->id_user,
            'jk' => 'required|alpha|max:1',
            'role_id' => 'required',

        ]);

        User::where('id', $this->id_user)->update([
            'nama' => $this->nama,
            'username' => $this->username,
            'jk' => $this->jk,
            'role_id' => $this->role_id,
        ]);


        $this->dispatch('hide-ubah-modal');

        $this->id_user = '';
        $this->nama = '';
        $this->username = '';
        $this->password = '';
        $this->jk = 'L';
        $this->role_id = '';

        $this->dispatch('update', [
            'title' => 'Data Berhasil diubah!',
            'icon' => 'success',
        ]);
    }

    public function statusAction($id)
    {
        $this->id_user = $id;

        $data = User::where('id', $this->id_user)->first();
        $this->status = $data->status;



        $this->dispatch('show-status-modal');
    }

    public function ubahStatus()
    {
        User::where('id', $this->id_user)->update([
            'status' => $this->status
        ]);

        $this->successMessage = 'Data berhasil diubah.';

        $this->dispatch('close-status-modal');
    }

    public function resetPassword($id)
    {
        $this->id_user = $id;

        $data = User::where('id', $id)->first();

        $this->nama = $data->nama;

        $this->dispatch('show-confirm-reset');
    }

    public function resetPasswordUser()
    {
        User::where('id', $this->id_user)->update([
            'password' => Hash::make('user123')
        ]);

        $this->dispatch('hide-confirm-reset');


        $this->id_user = '';

        $this->dispatch('reset', [
            'title' => 'Data ' . $this->nama . ' berhasil diubah.',
            'icon' => 'success',
        ]);
    }

    public function closeUbah()
    {
        $this->id_user = '';
        $this->nama = '';
        $this->username = '';
        $this->password = '';
        $this->jk = 'L';
        $this->role_id = '';
    }

    public function openPas()
    {
        $this->showpassword = !$this->showpassword;
    }

    public function sortBy($sortField)
    {
        if ($this->sortField === $sortField) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $sortField;
    }

    public function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.users', [
            'users' => User::where('nama', 'like', '%' . $this->search . '%')->orderBy($this->sortField, $this->sortDirection)->paginate($this->perPage),
            'role' => Role::all(),
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }
}
