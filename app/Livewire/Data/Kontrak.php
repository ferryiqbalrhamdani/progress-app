<?php

namespace App\Livewire\Data;

use App\Models\Admin;
use App\Models\Bobot;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class Kontrak extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $id_delete_project;
    public $id_project;
    public $id_pic;

    public $perPage = 5;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public $nama_pengadaan, $percentage_kontrak, $no_up, $pic;

    #[Rule('required|string')]
    public $usul_pesanan;
    #[Rule('required|string')]
    public $sprinada;
    #[Rule('required|string')]
    public $prakualifikasi;
    #[Rule('required|string')]
    public $sph;
    #[Rule('required|string')]
    public $sppbj;
    #[Rule('required|string')]
    public $no_kontrak_kontrak;

    public
        $tgl_usul_pesanan,
        $tgl_sprinada,
        $tgl_prakualifikasi,
        $tgl_sph,
        $tgl_sppbj,
        $tgl_no_kontrak_kontrak;

    #[Url()]
    public $search = '';

    public function inputData($id)
    {
        $data = Admin::where('id', $id)->first();
        $pic = $data->user()->first();

        $this->id_project = $data->id;

        $this->nama_pengadaan = $data->nama_pengadaan;
        $this->percentage_kontrak = $data->percentage_kontrak;
        $this->no_up = $data->no_up;
        $this->pic = $pic->nama;

        $this->usul_pesanan = $data->usul_pesanan;
        $this->sprinada = $data->sprinada;
        $this->prakualifikasi = $data->prakualifikasi;
        $this->sph = $data->sph;
        $this->sppbj = $data->sppbj;
        $this->no_kontrak_kontrak = $data->no_kontrak_kontrak;

        $this->dispatch('show-kontrak-modal');
    }

    public function ubahDataKontrak()
    {
        $bobot_usul_pesanan = 0;
        $bobot_sprinada = 0;
        $bobot_prakualifikasi = 0;
        $bobot_sph = 0;
        $bobot_sppbj = 0;
        $bobot_no_kontrak_kontrak = 0;

        $data = Admin::where('id', $this->id_project)->first();
        $bobot = Bobot::where('project_id', $this->id_project)->first();
        $percentage = $data->percentage;


        if ($this->usul_pesanan == 1) {
            $bobot_usul_pesanan = 16;
        } else {
            $bobot_usul_pesanan = 0;
        }

        if ($this->sprinada == 1) {
            $bobot_sprinada = 16;
        } else {
            $bobot_sprinada = 0;
        }

        if ($this->prakualifikasi == 1) {
            $bobot_prakualifikasi = 16;
        } else {
            $bobot_prakualifikasi = 0;
        }

        if ($this->sph == 1) {
            $bobot_sph = 16;
        } else {
            $bobot_sph = 0;
        }

        if ($this->sppbj == 1) {
            $bobot_sppbj = 18;
        } else {
            $bobot_sppbj = 0;
        }

        if ($this->no_kontrak_kontrak == 1) {
            $bobot_no_kontrak_kontrak = 18;
        } else {
            $bobot_no_kontrak_kontrak = 0;
        }

        // tanggal
        if ($this->usul_pesanan == 1) {
            if ($data->usul_pesanan_tgl == null) {
                $tgl_usul_pesanan = Carbon::now();
            } else {
                $tgl_usul_pesanan = $data->usul_pesanan_tgl;
            }
        } else {
            $tgl_usul_pesanan = null;
        }

        if ($this->sprinada == 1) {
            if ($data->sprinada_tgl == null) {
                $tgl_sprinada = Carbon::now();
            } else {
                $tgl_sprinada = $data->sprinada_tgl;
            }
        } else {
            $tgl_sprinada = null;
        }

        if ($this->prakualifikasi == 1) {
            if ($data->prakualifikasi_tgl == null) {
                $tgl_prakualifikasi = Carbon::now();
            } else {
                $tgl_prakualifikasi = $data->prakualifikasi_tgl;
            }
        } else {
            $tgl_prakualifikasi = null;
        }

        if ($this->sph == 1) {
            if ($data->sph_tgl == null) {
                $tgl_sph = Carbon::now();
            } else {
                $tgl_sph = $data->sph_tgl;
            }
        } else {
            $tgl_sph = null;
        }

        if ($this->sppbj == 1) {
            if ($data->sppbj_tgl == null) {
                $tgl_sppbj = Carbon::now();
            } else {
                $tgl_sppbj = $data->sppbj_tgl;
            }
        } else {
            $tgl_sppbj = null;
        }

        if ($this->no_kontrak_kontrak == 1) {
            if ($data->no_kontrak_kontrak_tgl == null) {
                $tgl_no_kontrak_kontrak = Carbon::now();
            } else {
                $tgl_no_kontrak_kontrak = $data->no_kontrak_kontrak_tgl;
            }
        } else {
            $tgl_no_kontrak_kontrak = null;
        }


        $percentage_kontrak = $bobot_usul_pesanan + $bobot_sprinada + $bobot_prakualifikasi + $bobot_sph + $bobot_sppbj + $bobot_no_kontrak_kontrak;

        if ($percentage_kontrak == 100) {
            $total_percentage = $percentage + 20;
        } elseif ($percentage_kontrak == 84 || $percentage_kontrak == 82) {
            $total_percentage = $percentage - 20;
        } elseif ($percentage_kontrak < 82) {
            $total_percentage = $percentage - 0;
        }

        Admin::where('id', $this->id_project)->update([
            'usul_pesanan' => (int)$this->usul_pesanan,
            'usul_pesanan_tgl' => $tgl_usul_pesanan,
            'sprinada' => (int)$this->sprinada,
            'sprinada_tgl' => $tgl_sprinada,
            'prakualifikasi' => (int)$this->prakualifikasi,
            'prakualifikasi_tgl' => $tgl_prakualifikasi,
            'sph' => (int)$this->sph,
            'sph_tgl' => $tgl_sph,
            'sppbj' => (int)$this->sppbj,
            'sppbj_tgl' => $tgl_sppbj,
            'no_kontrak_kontrak' => (int)$this->no_kontrak_kontrak,
            'no_kontrak_kontrak_tgl' => $tgl_no_kontrak_kontrak,
            'percentage_kontrak' => (int)$percentage_kontrak,
            'percentage' => (int)$total_percentage,
        ]);

        if (Admin::where('id', $this->id_project)->first()->percentage_kontrak == 100) {
            $bobot->update([
                'bobot_kontrak' => 20
            ]);
        } else {
            $bobot->update([
                'bobot_kontrak' => 0
            ]);
        }

        // dd($bobot->bobot_kontrak);




        $this->dispatch('hide-kontrak-modal');

        $this->id_project = '';

        $this->dispatch('update', [
            'title' => 'Data berhasil diubah.',
            'icon' => 'success',
        ]);
    }

    // public function usulPesanan()
    // {
    //     $data = Admin::where('id', $this->id_project)->first();
    //     $percentage = $data->percentage;
    //     $percentage_kontrak = $data->percentage_kontrak;




    //     if ($this->usul_pesanan == 1) {
    //         $tgl_usul_pesanan = Carbon::now();

    //         $kontrak_percentage = $percentage_kontrak + 16;
    //     } else {
    //         $tgl_usul_pesanan = null;
    //         $kontrak_percentage = $percentage_kontrak - 16;
    //     }

    //     Admin::where('id', $this->id_project)->update([
    //         'usul_pesanan' => (int)$this->usul_pesanan,
    //         'usul_pesanan_tgl' => $tgl_usul_pesanan,
    //         'percentage_kontrak' => $kontrak_percentage,
    //     ]);

    //     // dd($this->usul_pesanan);
    // }

    public function lihatData($id)
    {
        $data = Admin::where('id', $id)->first();
        $pic = $data->user()->first();

        $this->id_project = $data->id;

        $this->nama_pengadaan = $data->nama_pengadaan;
        $this->percentage_kontrak = $data->percentage_kontrak;
        $this->no_up = $data->no_up;
        $this->pic = $pic->nama;

        $this->usul_pesanan = $data->usul_pesanan;
        $this->sprinada = $data->sprinada;
        $this->prakualifikasi = $data->prakualifikasi;
        $this->sph = $data->sph;
        $this->sppbj = $data->sppbj;
        $this->no_kontrak_kontrak = $data->no_kontrak_kontrak;

        $this->tgl_usul_pesanan = $data->usul_pesanan_tgl;
        $this->tgl_sprinada = $data->sprinada_tgl;
        $this->tgl_prakualifikasi = $data->prakualifikasi_tgl;
        $this->tgl_sph = $data->sph_tgl;
        $this->tgl_sppbj = $data->sppbj_tgl;
        $this->tgl_no_kontrak_kontrak = $data->no_kontrak_kontrak_tgl;


        $this->dispatch('show-lihat-kontrak-modal');
    }

    public function closeData()
    {
        $this->id_project = '';

        $this->nama_pengadaan = '';
        $this->percentage_kontrak = '';
        $this->no_up = '';
        $this->pic = '';

        $this->usul_pesanan = '';
        $this->sprinada = '';
        $this->prakualifikasi = '';
        $this->sph = '';
        $this->sppbj = '';
        $this->no_kontrak_kontrak = '';
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
        return view('livewire.data.kontrak', [
            'project' => Admin::where('status_project', 1)->where('no_up', 'like', '%' . $this->search . '%')->orderBy($this->sortField, $this->sortDirection)->paginate($this->perPage)
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
