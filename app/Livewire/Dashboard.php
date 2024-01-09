<?php

namespace App\Livewire;

use App\Models\Admin;
use App\Models\DaftarPT;
use App\Models\Instansi;
use App\Models\Termin;
use App\Models\User;
use App\Models\Vendor;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;

class Dashboard extends Component
{
    public $perPage = 5;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    #[Url()]
    public $search = '';

    public $project_chart;
    public $listeners = ['ubahData' => 'chageData'];

    public $limit = 5;
    public $nama, $no_up;

    #[Rule('required|alpha_dash')]
    public $vendor_id;

    // public function mount()
    // {
    //     $project_chart = Admin::whereYear('created_at', Carbon::now()->year)->limit($this->limit)->get();
    //     // dd($project_chart);
    //     foreach ($project_chart as $p) {
    //         $data['label'][] = $p->no_up;
    //         $data['data'][] = (int)$p->nilai_kontrak;
    //     }
    //     $this->project_chart = json_encode($data);
    //     // dd($this->project_chart);
    // }

    public function test()
    {
        dd($this->vendor_id);
    }

    public function chageData()
    {
        $project_chart = Admin::latest()->limit(10)->get();
        foreach ($project_chart as $p) {
            $data['label'][] = $p->no_up;
            $data['data'][] = (int)$p->nilai_kontrak;
        }
        $this->project_chart = json_encode($data);
        $this->dispatch('berhasilUpdate', ['data' => $this->project_chart]);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.dashboard', [
            'users' => User::where('role_id', 3)->get(),
            'all_users' => User::all(),
            'daftaPt' => DaftarPT::all(),
            'daftarInstansi' => Instansi::orderBy('created_at', 'desc')->get(),
            'daftarVendor' => Vendor::orderBy('created_at', 'desc')->get(),
            'project' => Admin::all(),
            'termin' => Termin::all(),
        ]);
    }
}
