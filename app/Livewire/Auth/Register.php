<?php

namespace App\Livewire\Auth;

use App\Models\DaftarPT;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Register extends Component
{
    #[Rule('required|string')]
    public $nama;

    #[Rule('required|unique:users,username|alpha_dash|min:3')]
    public $username;

    #[Rule('required|min:3')]
    public $password;

    #[Rule('required')]
    public $nama_pt;

    #[Rule('required|alpha|max:1')]
    public $jk = 'L';

    #[Rule('required')]
    public $divisi;

    public $showpassword = false;

    public function register()
    {
        $this->validate();

        User::create([
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'nama' => $this->nama,
            'nama_pt' => $this->nama_pt,
            'role_id' => $this->divisi,
            'jk' => $this->jk,
        ]);

        Alert::toast('Data berhasil disimpan.', 'success');
        return redirect('login');
    }

    public function openPas()
    {
        $this->showpassword = !$this->showpassword;
    }

    #[Layout('layouts.auth-layouts')]
    public function render()
    {
        return view('livewire.auth.register', [
            'role' => Role::all(),
            'daftarPT' => DaftarPT::all()
        ]);
    }
}
