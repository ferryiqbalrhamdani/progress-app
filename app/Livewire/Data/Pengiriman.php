<?php

namespace App\Livewire\Data;

use App\Models\Admin;
use App\Models\Bobot;
use App\Models\Pengiriman as ModelsPengiriman;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class Pengiriman extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $id_project;
    public $id_pengiriman;
    public $id_pic;
    public $pic_pengiriman = NULL;

    public $perPage = 5;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    #[Url()]
    public $search = '';

    #[Rule('required|string')]
    public $baanname;

    #[Rule('required|string')]
    public $bainname;

    #[Rule('required|string')]
    public $bast;

    #[Rule('required|string')]
    public $percentage_pengiriman;

    public $nama_pengadaan, $no_up, $pic;

    public $jenis_pengiriman = 'lengkap';
    public $tgl_pengiriman;

    #[Rule('required|min:3|unique:tb_pengiriman,no_baanname')]
    public $no_baanname;

    #[Rule('required|date')]
    public $tgl_baanname;

    #[Rule('required|min:3|unique:tb_pengiriman,no_bainname')]
    public $no_bainname;

    #[Rule('required|date')]
    public $tgl_bainname;

    #[Rule('required|min:3|unique:tb_admin,no_bast')]
    public $no_bast;

    #[Rule('required|date')]
    public $tgl_bast;


    public
        $no_baanname_ubah,
        $tgl_baanname_ubah,
        $no_bainname_ubah,
        $tgl_bainname_ubah;

    public
        $status_no_baanname,
        $status_tgl_baanname,
        $status_no_bainname,
        $status_tgl_bainname;


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

    public function tambahPengiriman()
    {
        $id_project = $this->id_project;

        $project = Admin::where('id', $this->id_project)->first();
        $pengiriman = $project->pengiriman()->count();

        // dd($pengiriman);
        $this->validate([
            'no_baanname' => 'required|min:3|unique:tb_pengiriman,no_baanname',
            'tgl_baanname' => 'required|date',
            'no_bainname' => 'required|min:3|unique:tb_pengiriman,no_bainname',
            'tgl_bainname' => 'required|date',
        ]);


        $bobot_ba_anname_inname = 0;

        if ($pengiriman == null) {
            $bobot_ba_anname_inname = 33;
        } else {
            $bobot_ba_anname_inname = 0;
        }


        $percentage_pengiriman = $project->percentage_pengiriman + $bobot_ba_anname_inname;

        ModelsPengiriman::create([
            'id_project' => $id_project,
            'no_baanname' => $this->no_baanname,
            'tgl_baanname' => $this->tgl_baanname,
            'no_bainname' => $this->no_bainname,
            'tgl_bainname' => $this->tgl_bainname,
        ]);

        $project->update([
            'percentage_pengiriman' => $percentage_pengiriman
        ]);

        $this->no_baanname = '';
        $this->tgl_baanname = '';
        $this->no_bainname = '';
        $this->tgl_bainname = '';

        if ($this->jenis_pengiriman == 'Lengkap') {

            $this->dispatch('hide-inname-anname-modal');

            $this->id_project = '';

            $this->dispatch('stepDua', [
                'title' => 'Data berhasil ditambah.',
                'icon' => 'success',
            ]);
        } else {
            $this->dispatch('stepDua', [
                'title' => 'Data berhasil ditambah.',
                'icon' => 'success',
            ]);
        }
    }

    public function hapusPengiriman($id)
    {
        $pengiriman = ModelsPengiriman::where('id', $id)->first();

        ModelsPengiriman::where('id', $id)->delete();

        $project = Admin::where('id', $pengiriman->id_project)->first();
        $percentage_pengiriman = (int)$project->percentage_pengiriman;

        $count = $project->pengiriman()->get();



        // dd($pengiriman->id_project, $project->percentage_pengiriman, $count->count());
        if ($count->count() == 0) {
            if ($project->percentage_pengiriman == 65) {
                $percentage_pengiriman = (int)$project->percentage_pengiriman - 33;
            } else {
                $percentage_pengiriman = (int)$project->percentage_pengiriman;
            }
        }
        $project->update([
            'percentage_pengiriman' => (int)$percentage_pengiriman
        ]);

        $this->dispatch('hapusStepDua', [
            'title' => 'Data berhasil dihapus.',
            'icon' => 'success',
        ]);
    }

    public function inputData($id)
    {
        $data = Admin::where('id', $id)->first();
        $pic = $data->user()->first();
        $pic_pengiriman = $data->picPengiriman()->first();

        if ($pic_pengiriman != null) {
            $this->pic_pengiriman = $pic_pengiriman->nama;
        } else {
            $this->pic_pengiriman = '';
        }

        $this->id_project = $data->id;

        $this->nama_pengadaan = $data->nama_pengadaan;
        $this->percentage_pengiriman = $data->percentage_pengiriman;
        $this->no_up = $data->no_up;
        $this->pic = $pic->nama;

        $this->baanname = $data->baanname;
        $this->bainname = $data->bainname;
        $this->bast = $data->bast;

        $this->jenis_pengiriman = $data->jenis_pengiriman;
        $this->tgl_pengiriman = $data->tgl_pengiriman;



        $this->dispatch('show-pengiriman-modal');
    }

    public function inputDataAnnameInname($id)
    {
        $data = Admin::where('id', $id)->first();
        $pic = $data->user()->first();
        $pic_pengiriman = $data->picPengiriman()->first();

        if ($pic_pengiriman != null) {
            $this->pic_pengiriman = $pic_pengiriman->nama;
        } else {
            $this->pic_pengiriman = '';
        }
        // dd($data->jenis_pengiriman);

        $this->id_project = $data->id;

        $this->nama_pengadaan = $data->nama_pengadaan;
        $this->percentage_pengiriman = $data->percentage_pengiriman;
        $this->no_up = $data->no_up;
        $this->pic = $pic->nama;

        $this->baanname = $data->baanname;
        $this->bainname = $data->bainname;
        $this->bast = $data->bast;

        $this->jenis_pengiriman = $data->jenis_pengiriman;
        $this->tgl_pengiriman = Carbon::parse($data->tgl_pengiriman)->isoFormat('D MMMM Y');

        $this->dispatch('show-inname-anname-modal');
    }


    public function inputDataBast($id)
    {
        $data = Admin::where('id', $id)->first();
        $pic = $data->user()->first();
        $pic_pengiriman = $data->picPengiriman()->first();

        if ($pic_pengiriman != null) {
            $this->pic_pengiriman = $pic_pengiriman->nama;
        } else {
            $this->pic_pengiriman = '';
        }
        // dd($data->jenis_pengiriman);

        $this->id_project = $data->id;

        $this->nama_pengadaan = $data->nama_pengadaan;
        $this->percentage_pengiriman = $data->percentage_pengiriman;
        $this->no_up = $data->no_up;
        $this->pic = $pic->nama;

        $this->baanname = $data->baanname;
        $this->bainname = $data->bainname;
        $this->bast = $data->bast;

        $this->no_bast = $data->no_bast;
        $this->tgl_bast = $data->tgl_bast;

        $this->jenis_pengiriman = $data->jenis_pengiriman;
        $this->tgl_pengiriman = Carbon::parse($data->tgl_pengiriman)->isoFormat('D MMMM Y');

        $this->dispatch('show-bast-modal');
    }

    public function lihatData($id)
    {
        $data_ku = ModelsPengiriman::where('id_project', $id)->first();

        // dd(Carbon::parse($data_ku->simb_tgl)->diffInDays($data_ku->created_at));
        // dd($data_ku);

        $data = Admin::where('id', $id)->first();
        $pic = $data->user()->first();
        $pic_pengiriman = $data->picPengiriman()->first();

        if ($pic_pengiriman != null) {
            $this->pic_pengiriman = $pic_pengiriman->nama;
        } else {
            $this->pic_pengiriman = '';
        }

        $this->id_project = $data->id;

        $this->nama_pengadaan = $data->nama_pengadaan;
        $this->percentage_pengiriman = $data->percentage_pengiriman;
        $this->no_up = $data->no_up;
        $this->pic = $pic->nama;

        $this->baanname = $data->baanname;
        $this->bainname = $data->bainname;
        $this->bast = $data->bast;

        $this->no_bast = $data->no_bast;
        $this->tgl_bast = $data->tgl_bast;

        $this->jenis_pengiriman = $data->jenis_pengiriman;
        $this->tgl_pengiriman = Carbon::parse($data->tgl_pengiriman)->isoFormat('D MMMM Y');



        $this->dispatch('show-lihat-pengiriman-modal');
    }

    public function ubahBast()
    {
        $this->validate([
            'no_bast' => 'required',
            'tgl_bast' => 'required|date',
        ]);

        $project = Admin::where('id', $this->id_project)->first();
        $bobot = $project->bobot()->first();
        $no_bast = $project->no_bast;
        $tgl_bast = $project->tgl_bast;

        if ($no_bast == NULL || $tgl_bast == NULL) {
            $bobot_bast = 35;
        } else {
            $bobot_bast = 0;
        }

        $percentage_pengiriman = $project->percentage_pengiriman + $bobot_bast;



        Admin::where('id', $this->id_project)->update([
            'pic_Pengiriman' => Auth::user()->id,
            'no_bast' => $this->no_bast,
            'tgl_bast' => $this->tgl_bast,
            'percentage_pengiriman' => $percentage_pengiriman,
        ]);

        if (Admin::where('id', $this->id_project)->first()->percentage_pengiriman == 100) {
            Bobot::where('project_id', $this->id_project)->update([
                'bobot_pengiriman' => 20
            ]);
        } else {
            Bobot::where('project_id', $this->id_project)->update([
                'bobot_pengiriman' => 0
            ]);
        }

        // $hasil = 20 * $percentage_pengiriman / 100;
        // Bobot::where('project_id', $this->id_project)->update([
        //     'bobot_pengiriman' => floor($hasil)
        // ]);

        $this->dispatch('hide-bast-modal');

        $this->id_project = '';

        $this->dispatch('stepDua', [
            'title' => 'Data berhasil diubah.',
            'icon' => 'success',
        ]);
    }

    public function ubahPengiriman($id)
    {
        $this->id_pengiriman = $id;

        $data = ModelsPengiriman::where('id', $id)->first();


        $this->no_baanname_ubah = $data->no_baanname;
        $this->tgl_baanname_ubah = $data->tgl_baanname;
        $this->no_bainname_ubah = $data->no_bainname;
        $this->tgl_bainname_ubah = $data->tgl_bainname;

        $this->dispatch('show-ubah-pengiriman-modal');
    }

    public function actionUbahPengiriman()
    {
        $this->validate([
            'no_baanname_ubah' => 'required|unique:tb_pengiriman,no_baanname,' . $this->id_pengiriman,
            'tgl_baanname_ubah' => 'required|date',
            'no_bainname_ubah' => 'required|unique:tb_pengiriman,no_bainname,' . $this->id_pengiriman,
            'tgl_bainname_ubah' => 'required|date',
        ]);

        $data = ModelsPengiriman::where('id', $this->id_pengiriman)->first();

        if ($this->no_baanname_ubah != $data->no_baanname) {
            $status_no_baanname = $data->status_no_baanname + 1;
        } else {
            $status_no_baanname = $data->status_no_baanname;
        }

        if ($this->tgl_baanname_ubah != $data->tgl_baanname) {
            $status_tgl_baanname = $data->status_tgl_baanname + 1;
        } else {
            $status_tgl_baanname = $data->status_tgl_baanname;
        }

        if ($this->no_bainname_ubah != $data->no_bainname) {
            $status_no_bainname = $data->status_no_bainname + 1;
        } else {
            $status_no_bainname = $data->status_no_bainname;
        }

        if ($this->tgl_bainname_ubah != $data->tgl_bainname) {
            $status_tgl_bainname = $data->status_tgl_bainname + 1;
        } else {
            $status_tgl_bainname = $data->status_tgl_bainname;
        }


        ModelsPengiriman::where('id', $this->id_pengiriman)->update([
            'no_baanname' => $this->no_baanname_ubah,
            'status_no_baanname' => $status_no_baanname,
            'tgl_baanname' => $this->tgl_baanname_ubah,
            'status_tgl_baanname' => $status_tgl_baanname,
            'no_bainname' => $this->no_bainname_ubah,
            'status_no_bainname' => $status_no_bainname,
            'tgl_bainname' => $this->tgl_bainname_ubah,
            'status_tgl_bainname' => $status_tgl_bainname,
        ]);

        $this->dispatch('hide-ubah-pengiriman-modal');

        $this->dispatch('ubahPengiriman', [
            'title' => 'Data berhasil diubah.',
            'icon' => 'success',
        ]);
    }

    public function ubahDataPengiriman()
    {
        $this->validate([
            'jenis_pengiriman' => 'required',
            'tgl_pengiriman' => 'required|date',
        ]);


        $bobot_jenis_Pengiriman = 0;
        $bobot_tgl_pengiriman = 0;

        $data = Admin::where('id', $this->id_project)->first();
        $percentage = $data->percentage;


        // dd($this->jenis_pengiriman);

        if ($this->jenis_pengiriman == 'Lengkap' || $this->jenis_pengiriman == 'Bertahap') {
            $bobot_jenis_Pengiriman = 16;
        } else {
            $bobot_jenis_Pengiriman = 0;
        }

        if ($this->tgl_pengiriman != null) {
            $bobot_tgl_pengiriman = 16;
        } else {
            $bobot_tgl_pengiriman = 0;
        }

        // dd($bobot_jenis_Pengiriman, $bobot_tgl_pengiriman);


        $percentage_pengiriman = $bobot_jenis_Pengiriman + $bobot_tgl_pengiriman;

        if ($percentage_pengiriman == 100) {
            $total_percentage = $percentage + 20;
        } elseif ($percentage_pengiriman == 32) {
            $total_percentage = $percentage - 0;
        } elseif ($percentage_pengiriman < 100) {
            $total_percentage = $percentage - 20;
        }



        if ($data->tgl_pengiriman != null) {
            if ($this->jenis_pengiriman != $data->jenis_pengiriman) {
                // dd('ok');
                $this->dispatch('show-confirm-modal');
            } else {
                Admin::where('id', $this->id_project)->update([
                    'pic_pengiriman' => Auth::user()->id,
                    'jenis_pengiriman' => $this->jenis_pengiriman,
                    'tgl_pengiriman' => $this->tgl_pengiriman,
                ]);

                $this->dispatch('hide-pengiriman-modal');

                $this->id_project = '';

                $this->dispatch('stepSatu', [
                    'title' => 'Data berhasil diubah.',
                    'icon' => 'success',
                ]);
            }
        } else {
            Admin::where('id', $this->id_project)->update([
                'pic_pengiriman' => Auth::user()->id,
                'jenis_pengiriman' => $this->jenis_pengiriman,
                'tgl_pengiriman' => $this->tgl_pengiriman,
                'percentage_pengiriman' => (int)$percentage_pengiriman,
                'percentage' => (int)$total_percentage,
            ]);

            $this->dispatch('hide-pengiriman-modal');

            $this->id_project = '';

            $this->dispatch('stepSatu', [
                'title' => 'Data berhasil diubah.',
                'icon' => 'success',
            ]);
        }

        // dd($percentage_kontrak);
    }

    public function hapusBaInnameBaAnname()
    {
        $project = Admin::where('id', $this->id_project)->first();
        ModelsPengiriman::where('id_project', $this->id_project)->delete();
        $count = $project->pengiriman()->get();

        // dd($count->count());

        // dd($pengiriman->id_project, $project->percentage_pengiriman, $count->count());
        if ($count->count() == 0) {
            if ($project->percentage_pengiriman == 65) {
                $percentage_pengiriman = (int)$project->percentage_pengiriman - 33;
            } else {
                $percentage_pengiriman = (int)$project->percentage_pengiriman;
            }
        }

        $project->update([
            'percentage_pengiriman' => (int)$percentage_pengiriman,
            'jenis_pengiriman' => $this->jenis_pengiriman,
            'no_bast' => NULL,
            'tgl_bast' => NULL,
        ]);


        $this->dispatch('hide-confirm-modal');

        $this->id_project = '';

        $this->dispatch('stepSatuUbah', [
            'title' => 'Data berhasil diubah, BA Anname & BA Inname berhasil dihapus.',
            'icon' => 'success',
        ]);
    }


    public function closeData()
    {
        $this->id_project = '';

        $this->nama_pengadaan = '';
        $this->percentage_pengiriman = '';
        $this->no_up = '';
        $this->pic = '';

        $this->baanname = '';
        $this->bainname = '';
        $this->bast = '';
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.data.pengiriman', [
            'project' => Admin::where('status_project', 1)->where('no_up', 'like', '%' . $this->search . '%')->orderBy($this->sortField, $this->sortDirection)->paginate($this->perPage),
            'pengiriman' => ModelsPengiriman::all(),
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
