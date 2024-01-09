<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Dashboard;
use App\Livewire\Data\Kontrak;
use App\Livewire\Data\Marcendiser;
use App\Livewire\Data\Penagihan;
use App\Livewire\Data\Pengiriman;
use App\Livewire\Data\Project;
use App\Livewire\Data\Project\DetailStep;
use App\Livewire\Profile;
use App\Livewire\Users;
use App\Livewire\Utilities\DaftarInstansi;
use App\Livewire\Utilities\DaftarPic;
use App\Livewire\Utilities\DaftarPt;
use App\Livewire\Utilities\DaftarVendor;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('login', Login::class)->name('login');
Route::get('register', Register::class)->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('dashboard', Dashboard::class);
    Route::get('daftar-pt', DaftarPt::class);
    Route::get('daftar-instansi', DaftarInstansi::class);
    Route::get('daftar-vendor', DaftarVendor::class);
    Route::get('daftar-pic', DaftarPic::class);
    Route::get('project', Project::class);
    Route::get('project/{slug}/detail-step', DetailStep::class);

    Route::get('kontrak', Kontrak::class);
    Route::get('pengiriman', Pengiriman::class);
    Route::get('penagihan', Penagihan::class);
    Route::get('marcendiser', Marcendiser::class);

    Route::get('users', Users::class);

    Route::get('profile', Profile::class);

    Route::get('preview', [Project::class, 'preview']);
});
