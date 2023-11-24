<?php

namespace App\Livewire;

use App\Models\Admin;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class Profile extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $id;

    #[Rule('required|string')]
    public $nama;

    // #[Rule('required|alpha_dash|min:3|string||unique:users,username,id')]
    public $username;

    #[Rule('required|min:3')]
    public $password;

    #[Rule('required|min:3')]
    public $password_baru;

    #[Rule('required|min:3|same:password_baru|required_with:password_baru')]
    public $password_confirm;


    #[Rule('required|alpha|max:1', as: 'jenis kelamin')]
    public $jk = 'L';

    #[Rule('required', as: 'role user')]
    public $role_id;

    public $showpassword = false;

    public function ubahProfile()
    {
        $this->nama = Auth::user()->nama;
        $this->username = Auth::user()->username;
        $this->jk = Auth::user()->jk;
        $this->role_id = Auth::user()->role_id;

        $this->dispatch('show-ubah-modal');
    }

    public function ubahData()
    {
        $this->validate([
            'nama' => 'required|string',
            'username' => 'required|alpha_dash|min:3|string||unique:users,username,' . Auth::user()->id,
            'jk' => 'required|string',
            'role_id' => 'required',
        ]);

        // dd('success');

        User::where('id', Auth::user()->id)->update([
            'nama' => $this->nama,
            'username' => $this->username,
            'jk' => $this->jk,
            'role_id' => $this->role_id,
        ]);

        Alert::toast('Data berhasil diubah.', 'success');
        return redirect('profile');
    }

    public function ubahPassword()
    {
        $this->validate([
            'password_baru' => 'required|min:3',
            'password_confirm' => 'required|min:3|same:password_baru',
        ]);


        User::where('id', Auth::user()->id)->update([
            'password' => Hash::make($this->password_baru)
        ]);

        Alert::toast('Password berhasil diubah.', 'success');
        return redirect('logout');
    }

    public function closeUbah()
    {
        $this->reset();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.profile', [
            'project' => Admin::where('status_project', 1)->orderBy('created_at', 'desc')->paginate(5),
            'countProject' => Admin::where('percentage', '<', 100)->get(),
            'role' => Role::all(),
        ]);
    }
}
