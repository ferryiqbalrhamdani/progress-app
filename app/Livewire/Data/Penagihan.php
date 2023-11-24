<?php

namespace App\Livewire\Data;

use App\Models\Admin;
use App\Models\Bobot;
use App\Models\DpAdmin;
use App\Models\TerminAdmin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class Penagihan extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 5;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    #[Url()]
    public $search = '';

    public
        $simb_display,
        $sppm_display,
        $surat_pengantar_barang_pt_display,
        $packing_list_pt_display,
        $invoice_display,
        $packing_list_display,
        $awb_bl_display,
        $kontrak_display,
        $amademen_kontrak_display,
        $surat_pernyataan_barang_display,
        $percentage_penagihan;

    public
        $simb_tgl,
        $sppm_tgl,
        $surat_pengantar_barang_pt_tgl,
        $packing_list_pt_tgl,
        $invoice_tgl,
        $packing_list_tgl,
        $awb_bl_tgl,
        $kontrak_tgl,
        $amademen_kontrak_tgl,
        $surat_pernyataan_barang_tgl,
        $tgl_bast;

    public $id_project;

    public $nama_pengadaan, $no_up, $pic, $indexTermin;

    public
        $surat_permohonan,
        $percentage_dp,
        $percentage_termin,
        $kwitansi_pembayaran,
        $bap,
        $ssp_ppn_pph,
        $efaktur,
        $kontrak,
        $jamuk,
        $sppbj,
        $id_dp;

    public
        $nama_termin,
        $surat_permohonan_tgl,
        $kwitansi_pembayaran_tgl,
        $bap_tgl,
        $ssp_ppn_pph_tgl,
        $efaktur_tgl,
        $kontrak_tgl_dp,
        $jamuk_tgl,
        $sppbj_tgl,
        $id_termin;

    public function lihatData($id)
    {
        $this->id_project = $id;

        $data = Admin::where('id', $this->id_project)->first([
            'simb',
            'simb_tgl',
            'sppm',
            'sppm_tgl',
            'surat_pengantar_barang_pt',
            'surat_pengantar_barang_pt_tgl',
            'packing_list_pt',
            'packing_list_pt_tgl',
            'invoice',
            'invoice_tgl',
            'packing_list',
            'packing_list_tgl',
            'awb_bl',
            'awb_bl_tgl',
            'kontrak',
            'kontrak_tgl',
            'amademen_kontrak',
            'amademen_kontrak_tgl',
            'surat_pernyataan_barang',
            'surat_pernyataan_barang_tgl',
            'percentage_penagihan',
            'created_at',
            'tgl_bast',
        ]);



        $pic_data = Admin::where('id', $this->id_project)->first();
        $pic = $pic_data->user()->first();

        // dd($pic);

        $this->pic = $pic->nama;
        $this->no_up = $pic_data->no_up;
        $this->nama_pengadaan = $pic_data->nama_pengadaan;

        $this->simb_display = $data->simb;
        $this->sppm_display = $data->sppm;
        $this->surat_pengantar_barang_pt_display = $data->surat_pengantar_barang_pt;
        $this->packing_list_pt_display = $data->packing_list_pt;
        $this->invoice_display = $data->invoice;
        $this->packing_list_display = $data->packing_list;
        $this->awb_bl_display = $data->awb_bl;
        $this->kontrak_display = $data->kontrak;
        $this->amademen_kontrak_display = $data->amademen_kontrak;
        $this->surat_pernyataan_barang_display = $data->surat_pernyataan_barang;
        $this->percentage_penagihan = $data->percentage_penagihan;

        $this->simb_tgl = $data->simb_tgl;
        $this->sppm_tgl = $data->sppm_tgl;
        $this->surat_pengantar_barang_pt_tgl = $data->surat_pengantar_barang_pt_tgl;
        $this->packing_list_pt_tgl = $data->packing_list_pt_tgl;
        $this->invoice_tgl = $data->invoice_tgl;
        $this->packing_list_tgl = $data->packing_list_tgl;
        $this->awb_bl_tgl = $data->awb_bl_tgl;
        $this->kontrak_tgl = $data->kontrak_tgl;
        $this->amademen_kontrak_tgl = $data->amademen_kontrak_tgl;
        $this->surat_pernyataan_barang_tgl = $data->surat_pernyataan_barang_tgl;

        $this->tgl_bast = $data->tgl_bast;

        $this->dispatch('show-lihat-penagihan-modal');
    }

    public function inputData($id)
    {
        $this->id_project = $id;

        $data = Admin::where('id', $this->id_project)->first();
        $pic = $data->user()->first();

        $this->pic = $pic->nama;
        $this->no_up = $data->no_up;
        $this->nama_pengadaan = $data->nama_pengadaan;

        $this->simb_display = $data->simb;
        $this->sppm_display = $data->sppm;
        $this->surat_pengantar_barang_pt_display = $data->surat_pengantar_barang_pt;
        $this->packing_list_pt_display = $data->packing_list_pt;
        $this->invoice_display = $data->invoice;
        $this->packing_list_display = $data->packing_list;
        $this->awb_bl_display = $data->awb_bl;
        $this->kontrak_display = $data->kontrak;
        $this->amademen_kontrak_display = $data->amademen_kontrak;
        $this->surat_pernyataan_barang_display = $data->surat_pernyataan_barang;
        $this->percentage_penagihan = $data->percentage_penagihan;

        $this->dispatch('show-penagihan-modal');
    }

    public function ubahDataPenagihan()
    {
        $simb_bobot = 0;
        $sppm_bobot = 0;
        $surat_pengantar_barang_pt_bobot = 0;
        $packing_list_pt_bobot = 0;
        $invoice_bobot = 0;
        $packing_list_bobot = 0;
        $awb_bl_bobot = 0;
        $kontrak_bobot = 0;
        $amademen_kontrak_bobot = 0;
        $surat_pernyataan_barang_bobot = 0;

        $data = Admin::where('id', $this->id_project)->first();
        $percentage = $data->percentage;


        if ($this->simb_display == 1) {
            $simb_bobot = 10;
        } else {
            $simb_bobot = 0;
        }

        if ($this->sppm_display == 1) {
            $sppm_bobot = 10;
        } else {
            $sppm_bobot = 0;
        }

        if ($this->surat_pengantar_barang_pt_display == 1) {
            $surat_pengantar_barang_pt_bobot = 10;
        } else {
            $surat_pengantar_barang_pt_bobot = 0;
        }

        if ($this->packing_list_pt_display == 1) {
            $packing_list_pt_bobot = 10;
        } else {
            $packing_list_pt_bobot = 0;
        }

        if ($this->invoice_display == 1) {
            $invoice_bobot = 10;
        } else {
            $invoice_bobot = 0;
        }

        if ($this->packing_list_display == 1) {
            $packing_list_bobot = 10;
        } else {
            $packing_list_bobot = 0;
        }

        if ($this->awb_bl_display == 1) {
            $awb_bl_bobot = 10;
        } else {
            $awb_bl_bobot = 0;
        }

        if ($this->kontrak_display == 1) {
            $kontrak_bobot = 10;
        } else {
            $kontrak_bobot = 0;
        }

        if ($this->amademen_kontrak_display == 1) {
            $amademen_kontrak_bobot = 10;
        } else {
            $amademen_kontrak_bobot = 0;
        }

        if ($this->surat_pernyataan_barang_display == 1) {
            $surat_pernyataan_barang_bobot = 10;
        } else {
            $surat_pernyataan_barang_bobot = 0;
        }

        // tanngal 
        if ($this->simb_display == 1) {
            if ($data->simb_tgl == null) {
                $simb_tgl = Carbon::now();
            } else {
                $simb_tgl = $data->simb_tgl;
            }
        } else {
            $simb_tgl = null;
        }

        if ($this->sppm_display == 1) {
            if ($data->sppm_tgl == null) {
                $sppm_tgl = Carbon::now();
            } else {
                $sppm_tgl = $data->sppm_tgl;
            }
        } else {
            $sppm_tgl = null;
        }

        if ($this->surat_pengantar_barang_pt_display == 1) {
            if ($data->surat_pengantar_barang_pt_tgl == null) {
                $surat_pengantar_barang_pt_tgl = Carbon::now();
            } else {
                $surat_pengantar_barang_pt_tgl = $data->surat_pengantar_barang_pt_tgl;
            }
        } else {
            $surat_pengantar_barang_pt_tgl = null;
        }

        if ($this->packing_list_pt_display == 1) {
            if ($data->packing_list_pt_tgl == null) {
                $packing_list_pt_tgl = Carbon::now();
            } else {
                $packing_list_pt_tgl = $data->packing_list_pt_tgl;
            }
        } else {
            $packing_list_pt_tgl = null;
        }

        if ($this->invoice_display == 1) {
            if ($data->invoice_tgl == null) {
                $invoice_tgl = Carbon::now();
            } else {
                $invoice_tgl = $data->invoice_tgl;
            }
        } else {
            $invoice_tgl = null;
        }

        if ($this->packing_list_display == 1) {
            if ($data->packing_list_tgl == null) {
                $packing_list_tgl = Carbon::now();
            } else {
                $packing_list_tgl = $data->packing_list_tgl;
            }
        } else {
            $packing_list_tgl = null;
        }

        if ($this->awb_bl_display == 1) {
            if ($data->awb_bl_tgl == null) {
                $awb_bl_tgl = Carbon::now();
            } else {
                $awb_bl_tgl = $data->awb_bl_tgl;
            }
        } else {
            $awb_bl_tgl = null;
        }

        if ($this->kontrak_display == 1) {
            if ($data->kontrak_tgl == null) {
                $kontrak_tgl = Carbon::now();
            } else {
                $kontrak_tgl = $data->kontrak_tgl;
            }
        } else {
            $kontrak_tgl = null;
        }

        if ($this->amademen_kontrak_display == 1) {
            if ($data->amademen_kontrak_tgl == null) {
                $amademen_kontrak_tgl = Carbon::now();
            } else {
                $amademen_kontrak_tgl = $data->amademen_kontrak_tgl;
            }
        } else {
            $amademen_kontrak_tgl = null;
        }

        if ($this->surat_pernyataan_barang_display == 1) {
            if ($data->surat_pernyataan_barang_tgl == null) {
                $surat_pernyataan_barang_tgl = Carbon::now();
            } else {
                $surat_pernyataan_barang_tgl = $data->surat_pernyataan_barang_tgl;
            }
        } else {
            $surat_pernyataan_barang_tgl = null;
        }

        $percentage_penagihan = $simb_bobot + $sppm_bobot + $surat_pengantar_barang_pt_bobot + $packing_list_pt_bobot + $invoice_bobot + $packing_list_bobot
            + $awb_bl_bobot + $kontrak_bobot + $amademen_kontrak_bobot + $surat_pernyataan_barang_bobot;



        if ($percentage_penagihan == 100) {
            $total_percentage = $percentage + 10;
        } elseif ($percentage_penagihan == 90) {
            $total_percentage = $percentage - 10;
        } elseif ($percentage_penagihan < 90) {
            $total_percentage = $percentage - 0;
        }

        $projectData = Admin::where('id', $this->id_project)->first();



        Admin::where('id', $this->id_project)->update([
            'simb' => $this->simb_display,
            'simb_tgl' => $simb_tgl,
            'sppm' => $this->sppm_display,
            'sppm_tgl' => $sppm_tgl,
            'surat_pengantar_barang_pt' => $this->surat_pengantar_barang_pt_display,
            'surat_pengantar_barang_pt_tgl' => $surat_pengantar_barang_pt_tgl,
            'packing_list_pt' => $this->packing_list_pt_display,
            'packing_list_pt_tgl' => $packing_list_pt_tgl,
            'invoice' => $this->invoice_display,
            'invoice_tgl' => $invoice_tgl,
            'packing_list' => $this->packing_list_display,
            'packing_list_tgl' => $packing_list_tgl,
            'awb_bl' => $this->awb_bl_display,
            'awb_bl_tgl' => $awb_bl_tgl,
            'kontrak' => $this->kontrak_display,
            'kontrak_tgl' => $kontrak_tgl,
            'amademen_kontrak' => $this->amademen_kontrak_display,
            'amademen_kontrak_tgl' => $amademen_kontrak_tgl,
            'surat_pernyataan_barang' => $this->surat_pernyataan_barang_display,
            'surat_pernyataan_barang_tgl' => $surat_pernyataan_barang_tgl,
            'percentage_penagihan' => $percentage_penagihan,
            'percentage' => $total_percentage,
        ]);

        $dataProject = Admin::where('id', $this->id_project)->first();
        if ($dataProject->percentage_penagihan == 100) {
            Admin::where('id', $this->id_project)->update([
                'bobot_penagihan' => 50,
            ]);
        } else {
            Admin::where('id', $this->id_project)->update([
                'bobot_penagihan' => 0,
            ]);
        }

        if ($data->payment_term == 'no') {

            Admin::where('id', $this->id_project)->update([
                'percentage_penagihan_all' => $percentage_penagihan,
            ]);
        } elseif ($data->payment_term == 'dp') {

            if ($data->dpPenagihan()->count() > 0) {
                $dp = DpAdmin::where('project_id', $this->id_project)->first()->bobot;
                $project = Admin::where('id', $this->id_project)->first()->bobot_penagihan;
                Admin::where('id', $this->id_project)->update([
                    'percentage_penagihan_all' => $project + $dp,
                ]);
            }
        } elseif ($data->payment_term == 'termin') {
            $project = Admin::where('id', $this->id_project)->first()->bobot_penagihan;
            $termin = TerminAdmin::where('project_id', $this->id_project)->get()->sum('bobot');




            Admin::where('id', $this->id_project)->update([
                'percentage_penagihan_all' => $project + $termin,
            ]);
        }

        if ($percentage_penagihan == 100) {
            Bobot::where('project_id', $this->id_project)->update([
                'bobot_penagihan' => 10,
            ]);
        } else {
            Bobot::where('project_id', $this->id_project)->update([
                'bobot_penagihan' => 0,
            ]);
        }






        $this->dispatch('hide-penagihan-modal');

        $this->id_project = '';

        $this->dispatch('update', [
            'title' => 'Data berhasil diubah.',
            'icon' => 'success',
        ]);
    }

    public function lihatDataDp($id)
    {
        $this->id_project = $id;

        $dataSatu = Admin::where('id', $this->id_project)->first();
        $data = $dataSatu->dpPenagihan()->first();
        $pic = $dataSatu->user()->first();

        $this->pic = $pic->nama;
        $this->no_up = $dataSatu->no_up;
        $this->nama_pengadaan = $dataSatu->nama_pengadaan;


        $this->surat_permohonan = $data->surat_permohonan;
        $this->kwitansi_pembayaran = $data->kwitansi_pembayaran;
        $this->bap = $data->bap;
        $this->ssp_ppn_pph = $data->ssp_ppn_pph;
        $this->efaktur = $data->efaktur;
        $this->kontrak = $data->kontrak;
        $this->jamuk = $data->jamuk;
        $this->sppbj = $data->sppbj;

        $this->surat_permohonan_tgl = $data->surat_permohonan_tgl;
        $this->kwitansi_pembayaran_tgl = $data->kwitansi_pembayaran_tgl;
        $this->bap_tgl = $data->bap_tgl;
        $this->ssp_ppn_pph_tgl = $data->ssp_ppn_pph_tgl;
        $this->efaktur_tgl = $data->efaktur_tgl;
        $this->kontrak_tgl_dp = $data->kontrak_tgl;
        $this->jamuk_tgl = $data->jamuk_tgl;
        $this->sppbj_tgl = $data->sppbj_tgl;

        $this->percentage_dp = $data->percentage;


        $this->tgl_bast = $dataSatu->tgl_bast;

        // dd($pic);

        $this->dispatch('show-ubah-dp-modal');
    }

    public function inputDataDp($id)
    {
        $this->id_project = $id;

        $dataSatu = Admin::where('id', $this->id_project)->first();
        $data = DpAdmin::where('project_id', $this->id_project)->first();
        $pic = $dataSatu->user()->first();

        $this->pic = $pic->nama;
        $this->no_up = $dataSatu->no_up;
        $this->nama_pengadaan = $dataSatu->nama_pengadaan;


        $this->percentage_dp = $data->percentage;
        $this->surat_permohonan = $data->surat_permohonan;
        $this->kwitansi_pembayaran = $data->kwitansi_pembayaran;
        $this->bap = $data->bap;
        $this->ssp_ppn_pph = $data->ssp_ppn_pph;
        $this->efaktur = $data->efaktur;
        $this->kontrak = $data->kontrak;
        $this->jamuk = $data->jamuk;
        $this->sppbj = $data->sppbj;

        $this->dispatch('show-input-dp-modal');

        // dd($data);
    }

    public function ubahDataPenagihanDp()
    {
        $surat_permohonan_bobot = 0;
        $kwitansi_pembayaran_bobot = 0;
        $bap_bobot = 0;
        $ssp_ppn_pph_bobot = 0;
        $efaktur_bobot = 0;
        $kontrak_bobot = 0;
        $jamuk_bobot = 0;
        $sppbj_bobot = 0;

        $data = DpAdmin::where('project_id', $this->id_project)->first();
        $project = Admin::where('id', $this->id_project)->first();
        $percentage = $data->percentage;


        if ($this->surat_permohonan == 1) {
            $surat_permohonan_bobot = 12;
        } else {
            $surat_permohonan_bobot = 0;
        }

        if ($this->kwitansi_pembayaran == 1) {
            $kwitansi_pembayaran_bobot = 12;
        } else {
            $kwitansi_pembayaran_bobot = 0;
        }

        if ($this->bap == 1) {
            $bap_bobot = 12;
        } else {
            $bap_bobot = 0;
        }

        if ($this->ssp_ppn_pph == 1) {
            $ssp_ppn_pph_bobot = 12;
        } else {
            $ssp_ppn_pph_bobot = 0;
        }

        if ($this->efaktur == 1) {
            $efaktur_bobot = 12;
        } else {
            $efaktur_bobot = 0;
        }

        if ($this->kontrak == 1) {
            $kontrak_bobot = 12;
        } else {
            $kontrak_bobot = 0;
        }

        if ($this->jamuk == 1) {
            $jamuk_bobot = 14;
        } else {
            $jamuk_bobot = 0;
        }

        if ($this->sppbj == 1) {
            $sppbj_bobot = 14;
        } else {
            $sppbj_bobot = 0;
        }



        // tanngal 
        if ($this->surat_permohonan == 1) {
            if ($data->surat_permohonan_tgl == null) {
                $surat_permohonan_tgl = Carbon::now();
            } else {
                $surat_permohonan_tgl = $data->surat_permohonan_tgl;
            }
        } else {
            $surat_permohonan_tgl = null;
        }

        if ($this->kwitansi_pembayaran == 1) {
            if ($data->kwitansi_pembayaran_tgl == null) {
                $kwitansi_pembayaran_tgl = Carbon::now();
            } else {
                $kwitansi_pembayaran_tgl = $data->kwitansi_pembayaran_tgl;
            }
        } else {
            $kwitansi_pembayaran_tgl = null;
        }

        if ($this->bap == 1) {
            if ($data->bap_tgl == null) {
                $bap_tgl = Carbon::now();
            } else {
                $bap_tgl = $data->bap_tgl;
            }
        } else {
            $bap_tgl = null;
        }

        if ($this->ssp_ppn_pph == 1) {
            if ($data->ssp_ppn_pph_tgl == null) {
                $ssp_ppn_pph_tgl = Carbon::now();
            } else {
                $ssp_ppn_pph_tgl = $data->ssp_ppn_pph_tgl;
            }
        } else {
            $ssp_ppn_pph_tgl = null;
        }

        if ($this->efaktur == 1) {
            if ($data->efaktur_tgl == null) {
                $efaktur_tgl = Carbon::now();
            } else {
                $efaktur_tgl = $data->efaktur_tgl;
            }
        } else {
            $efaktur_tgl = null;
        }

        if ($this->kontrak == 1) {
            if ($data->kontrak_tgl == null) {
                $kontrak_tgl = Carbon::now();
            } else {
                $kontrak_tgl = $data->kontrak_tgl;
            }
        } else {
            $kontrak_tgl = null;
        }

        if ($this->jamuk == 1) {
            if ($data->jamuk_tgl == null) {
                $jamuk_tgl = Carbon::now();
            } else {
                $jamuk_tgl = $data->jamuk_tgl;
            }
        } else {
            $jamuk_tgl = null;
        }


        if ($this->sppbj == 1) {
            if ($data->sppbj_tgl == null) {
                $sppbj_tgl = Carbon::now();
            } else {
                $sppbj_tgl = $data->sppbj_tgl;
            }
        } else {
            $sppbj_tgl = null;
        }

        $percentage_penagihan = $surat_permohonan_bobot + $kwitansi_pembayaran_bobot + $bap_bobot + $ssp_ppn_pph_bobot + $efaktur_bobot + $kontrak_bobot
            + $jamuk_bobot + $sppbj_bobot;


        if ($percentage_penagihan == 100) {
            $bobot = 50;
        } else {
            $bobot = 0;
        }



        DpAdmin::where('project_id', $this->id_project)->update([
            'surat_permohonan' => $this->surat_permohonan,
            'kwitansi_pembayaran' => $this->kwitansi_pembayaran,
            'surat_permohonan_tgl' => $surat_permohonan_tgl,
            'kwitansi_pembayaran_tgl' => $kwitansi_pembayaran_tgl,
            'bap' => $this->bap,
            'bap_tgl' => $bap_tgl,
            'ssp_ppn_pph' => $this->ssp_ppn_pph,
            'ssp_ppn_pph_tgl' => $ssp_ppn_pph_tgl,
            'efaktur' => $this->efaktur,
            'efaktur_tgl' => $efaktur_tgl,
            'kontrak' => $this->kontrak,
            'kontrak_tgl' => $kontrak_tgl,
            'jamuk' => $this->jamuk,
            'jamuk_tgl' => $jamuk_tgl,
            'sppbj' => $this->sppbj,
            'sppbj_tgl' => $sppbj_tgl,
            'percentage' => $percentage_penagihan,
            'bobot' => $bobot,
        ]);

        if ($percentage_penagihan == 100) {
            Bobot::where('project_id', $this->id_project)->update([
                'bobot_penagihan' => 10,
            ]);
        } else {
            Bobot::where('project_id', $this->id_project)->update([
                'bobot_penagihan' => 0,
            ]);
        }



        $dp = DpAdmin::where('project_id', $this->id_project)->first()->bobot;
        // $termin = TerminAdmin::where('project_id', $this->id_project)->first()->bobot;
        $project = Admin::where('id', $this->id_project)->first()->bobot_penagihan;
        // dd($dp, $project);


        Admin::where('id', $this->id_project)->update([
            'percentage_penagihan_all' => $project + $dp,
        ]);

        $this->dispatch('hide-input-dp-modal');

        $this->id_project = '';

        $this->dispatch('dpUpdate', [
            'title' => 'Data berhasil diubah.',
            'icon' => 'success',
        ]);
    }

    public function lihatDataTermin($id)
    {
        $this->id_termin = $id;
        $dataTermin = TerminAdmin::where('id', $this->id_termin)->first();

        $this->id_project = $dataTermin->project_id;
        $data = Admin::where('id', $this->id_project)->first();
        $pic = $data->user()->first();

        $this->pic = $pic->nama;
        $this->no_up = $data->no_up;
        $this->nama_pengadaan = $data->nama_pengadaan;

        $this->nama_termin = $dataTermin->name;

        $this->percentage_termin = $dataTermin->percentage;
        $this->surat_permohonan = $dataTermin->surat_permohonan;
        $this->kwitansi_pembayaran = $dataTermin->kwitansi_pembayaran;
        $this->bap = $dataTermin->bap;
        $this->ssp_ppn_pph = $dataTermin->ssp_ppn_pph;
        $this->efaktur = $dataTermin->efaktur;
        $this->kontrak = $dataTermin->kontrak;
        $this->sppbj = $dataTermin->sppbj;

        $this->surat_permohonan_tgl = $dataTermin->surat_permohonan_tgl;
        $this->kwitansi_pembayaran_tgl = $dataTermin->kwitansi_pembayaran_tgl;
        $this->bap_tgl = $dataTermin->bap_tgl;
        $this->ssp_ppn_pph_tgl = $dataTermin->ssp_ppn_pph_tgl;
        $this->efaktur_tgl = $dataTermin->efaktur_tgl;
        $this->kontrak_tgl_dp = $dataTermin->kontrak_tgl;
        $this->sppbj_tgl = $dataTermin->sppbj_tgl;

        $this->percentage_termin = $dataTermin->percentage;


        $this->tgl_bast = $data->tgl_bast;


        $this->dispatch('show-lihat-termin-modal');
    }

    public function inputDataTermin($id)
    {
        $this->id_termin = $id;
        $dataTermin = TerminAdmin::where('id', $this->id_termin)->first();

        $this->id_project = $dataTermin->project_id;
        $data = Admin::where('id', $this->id_project)->first();
        $pic = $data->user()->first();

        $this->pic = $pic->nama;
        $this->no_up = $data->no_up;
        $this->nama_pengadaan = $data->nama_pengadaan;

        $this->nama_termin = $dataTermin->name;

        $this->percentage_termin = $dataTermin->percentage;
        $this->surat_permohonan = $dataTermin->surat_permohonan;
        $this->kwitansi_pembayaran = $dataTermin->kwitansi_pembayaran;
        $this->bap = $dataTermin->bap;
        $this->ssp_ppn_pph = $dataTermin->ssp_ppn_pph;
        $this->efaktur = $dataTermin->efaktur;
        $this->kontrak = $dataTermin->kontrak;
        $this->sppbj = $dataTermin->sppbj;


        $this->dispatch('show-input-termin-modal');
    }

    public function ubahDataPenagihanTermin()
    {
        $surat_permohonan_bobot = 0;
        $kwitansi_pembayaran_bobot = 0;
        $bap_bobot = 0;
        $ssp_ppn_pph_bobot = 0;
        $efaktur_bobot = 0;
        $kontrak_bobot = 0;
        $sppbj_bobot = 0;

        $data = TerminAdmin::where('id', $this->id_termin)->first();
        $percentage = $data->percentage;


        if ($this->surat_permohonan == 1) {
            $surat_permohonan_bobot = 14;
        } else {
            $surat_permohonan_bobot = 0;
        }

        if ($this->kwitansi_pembayaran == 1) {
            $kwitansi_pembayaran_bobot = 14;
        } else {
            $kwitansi_pembayaran_bobot = 0;
        }

        if ($this->bap == 1) {
            $bap_bobot = 14;
        } else {
            $bap_bobot = 0;
        }

        if ($this->ssp_ppn_pph == 1) {
            $ssp_ppn_pph_bobot = 14;
        } else {
            $ssp_ppn_pph_bobot = 0;
        }

        if ($this->efaktur == 1) {
            $efaktur_bobot = 14;
        } else {
            $efaktur_bobot = 0;
        }

        if ($this->kontrak == 1) {
            $kontrak_bobot = 15;
        } else {
            $kontrak_bobot = 0;
        }

        if ($this->sppbj == 1) {
            $sppbj_bobot = 15;
        } else {
            $sppbj_bobot = 0;
        }



        // tanngal 
        if ($this->surat_permohonan == 1) {
            if ($data->surat_permohonan_tgl == null) {
                $surat_permohonan_tgl = Carbon::now();
            } else {
                $surat_permohonan_tgl = $data->surat_permohonan_tgl;
            }
        } else {
            $surat_permohonan_tgl = null;
        }

        if ($this->kwitansi_pembayaran == 1) {
            if ($data->kwitansi_pembayaran_tgl == null) {
                $kwitansi_pembayaran_tgl = Carbon::now();
            } else {
                $kwitansi_pembayaran_tgl = $data->kwitansi_pembayaran_tgl;
            }
        } else {
            $kwitansi_pembayaran_tgl = null;
        }

        if ($this->bap == 1) {
            if ($data->bap_tgl == null) {
                $bap_tgl = Carbon::now();
            } else {
                $bap_tgl = $data->bap_tgl;
            }
        } else {
            $bap_tgl = null;
        }

        if ($this->ssp_ppn_pph == 1) {
            if ($data->ssp_ppn_pph_tgl == null) {
                $ssp_ppn_pph_tgl = Carbon::now();
            } else {
                $ssp_ppn_pph_tgl = $data->ssp_ppn_pph_tgl;
            }
        } else {
            $ssp_ppn_pph_tgl = null;
        }

        if ($this->efaktur == 1) {
            if ($data->efaktur_tgl == null) {
                $efaktur_tgl = Carbon::now();
            } else {
                $efaktur_tgl = $data->efaktur_tgl;
            }
        } else {
            $efaktur_tgl = null;
        }

        if ($this->kontrak == 1) {
            if ($data->kontrak_tgl == null) {
                $kontrak_tgl = Carbon::now();
            } else {
                $kontrak_tgl = $data->kontrak_tgl;
            }
        } else {
            $kontrak_tgl = null;
        }



        if ($this->sppbj == 1) {
            if ($data->sppbj_tgl == null) {
                $sppbj_tgl = Carbon::now();
            } else {
                $sppbj_tgl = $data->sppbj_tgl;
            }
        } else {
            $sppbj_tgl = null;
        }

        $percentage_penagihan = $surat_permohonan_bobot + $kwitansi_pembayaran_bobot + $bap_bobot + $ssp_ppn_pph_bobot + $efaktur_bobot + $kontrak_bobot
            + $sppbj_bobot;

        if ($percentage_penagihan == 100) {
            $termin = TerminAdmin::where('id', $this->id_termin)->first();
            $id = $termin->project_id;
            $count = TerminAdmin::where('project_id', $id)->get()->count();

            $bobot = 50 / $count;
        } else {
            $bobot = 0;
        }

        // dd($surat_permohonan_tgl, $kontrak_tgl);

        TerminAdmin::where('id', $this->id_termin)->update([
            'surat_permohonan' => $this->surat_permohonan,
            'kwitansi_pembayaran' => $this->kwitansi_pembayaran,
            'surat_permohonan_tgl' => $surat_permohonan_tgl,
            'kwitansi_pembayaran_tgl' => $kwitansi_pembayaran_tgl,
            'bap' => $this->bap,
            'bap_tgl' => $bap_tgl,
            'ssp_ppn_pph' => $this->ssp_ppn_pph,
            'ssp_ppn_pph_tgl' => $ssp_ppn_pph_tgl,
            'efaktur' => $this->efaktur,
            'efaktur_tgl' => $efaktur_tgl,
            'kontrak' => $this->kontrak,
            'kontrak_tgl' => $kontrak_tgl,
            'sppbj' => $this->sppbj,
            'sppbj_tgl' => $sppbj_tgl,
            'percentage' => $percentage_penagihan,
            'bobot' => $bobot,
            // 'percentage' => $total_percentage,
        ]);

        $termin = TerminAdmin::where('id', $this->id_termin)->first();
        $id = $termin->project_id;
        $this->id_project = $id;




        if ($percentage_penagihan == 100) {
            Bobot::where('project_id', $this->id_project)->update([
                'bobot_penagihan' => 10,
            ]);
        } else {
            Bobot::where('project_id', $this->id_project)->update([
                'bobot_penagihan' => 0,
            ]);
        }



        $termin = TerminAdmin::where('project_id', $this->id_project)->get()->sum('bobot');
        $project = Admin::where('id', $this->id_project)->first()->bobot_penagihan;


        Admin::where('id', $this->id_project)->update([
            'percentage_penagihan_all' => $project + floor($termin),
        ]);

        // dd($termin, $project, Admin::where('id', $this->id_project)->first()->percentage_penagihan_all);

        $this->dispatch('hide-input-termin-modal');

        $this->id_project = '';

        $this->dispatch('terminUpdate', [
            'title' => 'Data berhasil diubah.',
            'icon' => 'success',
        ]);
    }

    public function closeData()
    {
        $this->pic = '';
        $this->no_up = '';
        $this->nama_pengadaan = '';

        $this->simb_display = '';
        $this->sppm_display = '';
        $this->surat_pengantar_barang_pt_display = '';
        $this->packing_list_pt_display = '';
        $this->invoice_display = '';
        $this->packing_list_display = '';
        $this->awb_bl_display = '';
        $this->kontrak_display = '';
        $this->amademen_kontrak_display = '';
        $this->surat_pernyataan_barang_display = '';
        $this->percentage_penagihan = '';
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
        return view('livewire.data.penagihan', [
            'project' => Admin::where('status_project', 1)->where('no_up', 'like', '%' . $this->search . '%')->orderBy($this->sortField, $this->sortDirection)->paginate($this->perPage),
            'dp' => DpAdmin::all(),
            'termin' => TerminAdmin::all(),
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
