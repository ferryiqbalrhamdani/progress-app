<?php

namespace App\Livewire\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Login extends Component
{
    #[Rule('required|alpha_dash')]
    public $username;

    #[Rule('required')]
    public $password;

    public $showpassword = false;

    public function loginAction(Request $request)
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status == 1) {

                if (Auth::user()->role_id == 1) {
                    Alert::toast('Selamat Datang ' . Auth::user()->nama, 'success');
                    return redirect('dashboard');
                }

                $request->session()->regenerate();

                if (Auth::user()->role_id == 2) {
                    Alert::toast('Selamat Datang ' . Auth::user()->nama, 'success');
                    return redirect('project');
                }

                $request->session()->regenerate();

                if (Auth::user()->role_id == 3) {
                    Alert::toast('Selamat Datang ' . Auth::user()->nama, 'success');
                    return redirect('marcendiser');
                }

                $request->session()->regenerate();

                if (Auth::user()->role_id == 4) {
                    Alert::toast('Selamat Datang ' . Auth::user()->nama, 'success');
                    return redirect('pengiriman');
                }

                $request->session()->regenerate();

                if (Auth::user()->role_id == 5) {
                    Alert::toast('Selamat Datang ' . Auth::user()->nama, 'success');
                    return redirect('penagihan');
                }
            }
            Alert::error('Gagal login', 'Akun user dibekukan, silahkan hubungi admin untuk info lebih lanjut.');
            return redirect('login');
        }

        Alert::error('Gagal login', 'Username atau password salah.');
        return redirect('login');
    }

    public function openPas()
    {
        $this->showpassword = !$this->showpassword;
    }

    #[Layout('layouts.auth-layouts')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
