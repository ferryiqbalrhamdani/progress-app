<?php

namespace App\Livewire\Data;

use App\Models\Admin;
use App\Models\Bobot;
use App\Models\DaftarPT;
use App\Models\DpAdmin;
use App\Models\Instansi;
use App\Models\Kontrak;
use App\Models\Pengiriman;
use App\Models\PO;
use App\Models\Sertifikat;
use App\Models\Termin;
use App\Models\TerminAdmin;
use App\Models\User;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule as ValidationRule;
use Laraindo\RupiahFormat;
use Laraindo\TanggalFormat;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class Project extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $id_delete_project;
    public $id_project;
    public $id_pic;
    public $id_termin;

    public $perPage = 6;
    public $sortField = 'percentage';
    public $sortDirection = 'desc';

    #[Url()]
    public $search = '';

    //onUpdate: false
    #[Rule(['required', 'string', 'min:3', 'unique:tb_admin,no_up'], as: 'No UP')]
    public $no_up;

    #[Rule('required|string')]
    public $nama_pengadaan;

    #[Rule('required|numeric')]
    public $tahun_anggaran;

    #[Rule('required')]
    public $nama_pt, $instansi, $jenis_anggaran, $pic, $vendor, $jenis_lelang;

    public $desc, $percentage;

    // step 1
    public $stepSatu_pic,
        $stepSatu_no_up,
        $stepSatu_nama_pt,
        $stepSatu_nama_pengadaan,
        $stepSatu_instansi,
        $stepSatu_desc,
        $stepSatu_jenis_anggaran,
        $stepSatu_vendor,
        $stepSatu_percentage,
        $stepSatu_tgl_input,
        $stepSatu_tahun_pengadaan;

    public $vendor_tambah = 1;

    public $data_vendor = [];
    public $data_vendor_updated = [];
    public $data_vendor_admin = [];
    public $data_sertifikat_admin = [];

    #[Rule('required')]
    public $selectedVendor = [];

    public $selectedVendorUpdated = [];

    #[Rule('required')]
    public $selectedVendorUpdate = [];

    // step 2
    #[Rule('required')]
    public $bebas_pajak = 'no';

    #[Rule('required')]
    public $asal_brand = 'lokal';

    #[Rule('required')]
    public $sertifikat_produk = [];

    #[Rule('required')]
    public $warranty = 'no';

    // payment term
    #[Rule('required')]
    public $payment = 'no';

    public $vendor_id = [];

    #[Rule('max:2')]
    public $termin;

    public $pajak, $brand, $garansi = 0;
    public $dp_payment = 20;

    // #[Rule('required|numeric')]
    public $data_termin = [];

    // step 2
    public $stepDua_id,
        $stepDua_pic,
        $stepDua_no_up,
        $stepDua_nama_pengadaan,
        $stepDua_percentage,
        $stepDua_bebas_pajak,
        $stepDua_pajak,
        $stepDua_asal_brand,
        $stepDua_brand,
        $stepDua_date,
        $stepDua_waranty,
        $stepDua_garansi,
        $stepDua_payment,
        $stepDua_dp_payment,
        $stepDua_termin,
        $ubah_sertifikat,
        $stepDua_tahun_pengadaan;

    public $stepDua_sertifikat;

    public $step_satu, $step_dua, $step_tiga;

    public $showBarangTerisi = 'tampil';
    public $show = false;

    // step 3
    #[Rule('required|unique:tb_admin,no_kontrak')]
    public $no_kontrak;

    #[Rule('required|numeric|max:10000000000000000|min:1000')]
    public $nilai_kontrak;

    #[Rule('required|date')]
    public $jatuh_tempo;

    #[Rule('required|date', as: 'tanggal kontrak')]
    public $tgl_kontrak;

    public $nilai_dp, $display_jatuh_tempo, $display_tgl_kontrak, $display_nilai_kontrak, $display_nilai_dp;

    // kontrak display
    public $sprinada, $usul_pesanan, $prakualifikasi, $sph, $sppbj, $no_kontrak_kontrak, $percentage_kontrak;
    // pengiriman display
    public $baanname, $bainname, $bast, $percentage_pengiriman;
    // penagihan display
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
        $jumlah_ea_received,
        $jumlah_ea;

    public
        $percentage_dp,
        $surat_permohonan_dp,
        $surat_permohonan_tgl_dp,
        $kwitansi_pembayaran_dp,
        $kwitansi_pembayaran_tgl_dp,
        $bap_dp,
        $bap_tgl_dp,
        $ssp_ppn_pph_dp,
        $ssp_ppn_pph_tgl_dp,
        $efaktur_dp,
        $efaktur_tgl_dp,
        $kontrak_dp,
        $kontrak_tgl_dp,
        $jamuk_dp,
        $jamuk_tgl_dp,
        $sppbj_dp,
        $sppbj_tgl_dp;

    public $dataDP = [];
    public $terminData = [];



    #[Rule('required|numeric')]
    public $valueTermin;

    public $percentage_marcendiser;

    public function mount()
    {
        $this->data_vendor = Vendor::all();
        $this->data_vendor_updated = Vendor::all();
        if (Admin::where('prioritas', '>', 0)->count() > 0) {
            $this->sortField = "prioritas";
        } else {
            $this->sortField = "percentage";
        }
    }

    public function show($field)
    {
        if ($this->showBarangTerisi == $field) {
            $this->show == true;
        }
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


    public function storeProject()
    {
        // dd($this->selectedVendor);
        $this->validate([
            'no_up' => ['required', 'string', 'min:3', 'unique:tb_admin,no_up'],
            'nama_pengadaan' => 'required|string',
            'tahun_anggaran' => 'required|numeric',
            'nama_pt' => 'required',
            'instansi' => 'required',
            'jenis_anggaran' => 'required',
            'pic' => 'required',
        ]);


        $this->dispatch('show-confirm-project-modal');
    }

    public function saveProject()
    {


        $project = Admin::create([
            'no_up' => $this->no_up,
            'nama_pengadaan' => $this->nama_pengadaan,
            'jenis_lelang' => $this->jenis_lelang,
            'pt_id' => $this->nama_pt,
            'instansi_id' => $this->instansi,
            'jenis_anggaran' => $this->jenis_anggaran,
            'tahun_anggaran' => $this->tahun_anggaran,
            'pic_id' => $this->pic,
            'description' => $this->desc,
            'tgl_garansi' => Carbon::now(),
        ]);

        $project->vendor()->sync($this->selectedVendor);
        $id = Admin::latest('created_at')->first();
        // dd(Admin::latest('created_at')->first()->id, Admin::latest('created_at')->first());

        if (Bobot::where('project_id', $id)->count() == 0) {
            Bobot::create([
                'project_id' => $id->id,
                'bobot_kontrak' => 0,
                'bobot_penagihan' => 0,
                'bobot_pengiriman' => 0,
                'bobot_marcendiser' => 0,
            ]);
        }

        Alert::success('Data berhasil ditambah.');
        return redirect('project');
    }

    public function preview()
    {


        $this->validate([
            'no_up' => ['required', 'string', 'min:3', 'unique:tb_admin,no_up'],
            'nama_pengadaan' => 'required|string',
            'tahun_anggaran' => 'required|numeric',
            'nama_pt' => 'required',
            'instansi' => 'required',
            'jenis_anggaran' => 'required',
            'pic' => 'required',
            'selectedVendor' => 'required',
            'jenis_lelang' => 'required',
        ]);

        $this->dispatch('show-project-modal');
    }

    public function lihatStepSatu($id)
    {
        $this->id_project = $id;
        $data = Admin::where('id', $id)->first();
        $pic = $data->user()->first();
        $pt = $data->pt()->first();
        $instansi = $data->instansi()->first();

        $vendor = $data->vendor()->get();
        $this->data_vendor_admin = $vendor;


        $this->stepSatu_tgl_input = $data->created_at;
        $this->stepSatu_percentage = $data->percentage;
        $this->stepSatu_desc = $data->description;
        $this->stepSatu_tahun_pengadaan = $data->tahun_anggaran;
        $this->stepSatu_jenis_anggaran = $data->jenis_anggaran;
        $this->stepSatu_nama_pengadaan = $data->nama_pengadaan;
        $this->stepSatu_nama_pt = $pt->name;
        $this->stepSatu_pic = $pic->nama;
        $this->stepSatu_no_up = $data->no_up;
        $this->stepSatu_instansi = $instansi->name;

        $this->jenis_lelang = $data->jenis_lelang;

        $this->dispatch('show-step-satu-modal');
        // dd($nama);
    }

    public function tambahVendor()
    {
        $tambah = $this->vendor_tambah + 1;

        $this->vendor_tambah = $tambah;
    }

    public function kurangVendor()
    {
        $tambah = $this->vendor_tambah - 1;

        $this->vendor_tambah = $tambah;
    }

    public function closeVendor()
    {
        $this->selectedVendor = [''];
        $this->data_vendor_updated = [''];

        // dd($this->selectedVendor, $this->data_vendor_updated);
    }

    public function closeStepSatu()
    {
        $this->stepSatu_tgl_input = '';
        $this->stepSatu_percentage = '';
        $this->stepSatu_desc = '';
        $this->stepSatu_vendor = '';
        $this->stepSatu_tahun_pengadaan = '';
        $this->stepSatu_jenis_anggaran = '';
        $this->stepSatu_instansi = '';
        $this->stepSatu_nama_pengadaan = '';
        $this->stepSatu_nama_pt = '';
        $this->stepSatu_pic = '';
        $this->stepSatu_no_up = '';
    }



    public function ubahStepSatu($id)
    {
        $data = Admin::where('id', $id)->first();
        $vendor = $data->vendor()->get();

        $this->data_vendor_admin = $vendor;

        $this->id_project = $data->id;
        $this->desc = $data->description;
        $this->tahun_anggaran = $data->tahun_anggaran;
        $this->jenis_anggaran = $data->jenis_anggaran;
        $this->instansi = $data->instansi_id;
        $this->nama_pengadaan = $data->nama_pengadaan;
        $this->nama_pt = $data->pt_id;
        $this->pic = $data->pic_id;
        $this->no_up = $data->no_up;
        $this->jenis_lelang = $data->jenis_lelang;

        $this->dispatch('show-ubah-step-satu-modal');
    }

    public function closeEditStepSatu()
    {
        $this->desc = '';
        $this->vendor = '';
        $this->tahun_anggaran = '';
        $this->jenis_anggaran = '';
        $this->instansi = '';
        $this->nama_pengadaan = '';
        $this->nama_pt = '';
        $this->pic = '';
        $this->no_up = '';
        $this->jenis_lelang = '';
        $this->data_vendor_admin = [];
    }

    public function hapusProject($id)
    {
        $this->id_delete_project = $id;
        $data = Admin::where('id', $id)->first();
        // $dataKu = Admin::where('id', $id)->get();
        // dd($data->pt()->first());

        $this->nama_pengadaan = $data->nama_pengadaan;

        $this->dispatch('show-confirm-delete-modal');
    }

    public function destroyProject()
    {

        DB::table('tb_admin_vendor')->where('id_project', $this->id_delete_project)->delete();
        DB::table('tb_admin_sertifikat')->where('tb_admin_id', $this->id_delete_project)->delete();
        Pengiriman::where('id_project', $this->id_delete_project)->delete();
        PO::where('project_id', $this->id_delete_project)->delete();
        Termin::where('id_project', $this->id_delete_project)->delete();
        DpAdmin::where('project_id', $this->id_delete_project)->delete();
        TerminAdmin::where('project_id', $this->id_delete_project)->delete();
        Bobot::where('project_id', $this->id_delete_project)->delete();



        Admin::where('id', $this->id_delete_project)->delete();


        $this->dispatch('hide-confirm-delete-modal');


        $this->id_delete_project = '';
        $this->id_delete_project = '';

        $this->dispatch('delete', [
            'title' => 'Data berhasil dihapus.',
            'icon' => 'success',
        ]);
    }

    public function closeConfirm()
    {
        $this->id_delete_project = '';
        $this->nama_pengadaan = '';
    }

    public function updateStepSatu()
    {
        $data = Admin::where('id', $this->id_project)->first();
        // dd($this->desc);

        $this->validate([
            'tahun_anggaran' => 'required|numeric',
            'nama_pt' => 'required',
            'pic' => 'required',
            'instansi' => 'required',
            'jenis_anggaran' => 'required',
            'jenis_lelang' => 'required',

        ]);

        $data->update([
            'pt_id' => $this->nama_pt,
            'instansi_id' => $this->instansi,
            'jenis_lelang' => $this->jenis_lelang,
            'jenis_anggaran' => $this->jenis_anggaran,
            'tahun_anggaran' => $this->tahun_anggaran,
            'pic_id' => $this->pic,
            'description' => $this->desc,
        ]);

        if ($this->selectedVendorUpdated) {
            $data->vendor()->sync($this->selectedVendorUpdated);
        }




        $this->dispatch('hide-ubah-step-satu-modal');


        $this->id_project = '';
        $this->nama_pt = '';
        $this->instansi = '';
        $this->jenis_anggaran = '';
        $this->tahun_anggaran = '';
        $this->pic = '';
        $this->desc = '';
        $this->selectedVendorUpdated = [];

        $this->nama_pengadaan = '';
        $this->no_up = '';

        $this->dispatch('updateStepSatu', [
            'title' => 'Data step 1 berhasil diubah.',
            'icon' => 'success',
        ]);

        // dd('success');
    }

    public function inputStepDua($id)
    {
        $data = Admin::where('id', $id)->first();
        $user = $data->user()->first();

        $this->id_project = $data->id;
        $this->pic = $user->nama;
        $this->id_pic = $user->id;
        $this->no_up = $data->no_up;
        $this->nama_pengadaan = $data->nama_pengadaan;
        $this->percentage = $data->percentage;
        $this->dispatch('show-ubah-step-dua-modal');
        // dd($data);
    }

    public function updateStepStepDua()
    {
        $this->validate([
            'sertifikat_produk' => 'required'
        ]);

        if ($this->payment == 'termin') {
            $this->validate([
                'termin' => 'numeric|max:2|min:1'
            ]);
        }

        // $data = [
        //     'id project' => $this->id_project,
        //     'id_pic' => $this->id_pic,
        //     'pajak' => $this->pajak,
        //     'brand' => $this->brand,
        //     'sertifikat_produk' => $this->sertifikat_produk,
        //     'dp' => $this->dp_payment,
        //     'termin' => $this->termin,
        //     'brand' => $this->asal_brand,
        //     'warranty' => $this->warranty,
        // ];
        // dd($data);

        $this->dispatch('show-tambah-step-dua-modal');
    }

    public function saveProjectDua()
    {


        $data = Admin::where('id', $this->id_project)->first();
        $dataDp = DpAdmin::where('project_id', $this->id_project)->get();
        $dataTermin = TerminAdmin::where('project_id', $this->id_project)->get();

        $data->sertifikat()->sync($this->sertifikat_produk);

        Admin::where('id', $this->id_project)->update([
            'bebas_pajak' => $this->bebas_pajak,
            'status_pajak' => $this->pajak,
            'asal_brand' => $this->asal_brand,
            'status_brand' => $this->brand,
            'waranty' => $this->warranty,
            'status_warraanty' => $this->garansi,
            'payment_term' => $this->payment,
            'status_dp' => $this->dp_payment,
            'status_termin' => $this->termin,
            'status_dua' => 1,
            'date_step_dua' => Carbon::now(),
        ]);





        if (Bobot::where('project_id', $this->id_project)->count() == 0) {
            Bobot::create([
                'project_id' => $this->id_project,
                'bobot_kontrak' => 0,
                'bobot_penagihan' => 0,
                'bobot_pengiriman' => 0,
                'bobot_marcendiser' => 0,
            ]);
        } else {
            Bobot::where('project_id', $this->id_project)->update([
                'bobot_kontrak' => 0,
                'bobot_penagihan' => 0,
                'bobot_pengiriman' => 0,
                'bobot_marcendiser' => 0,
            ]);
        }



        $this->dispatch('hide-confirm-step-dua-modal');



        $this->id_project = '';


        $this->id_project = '';
        $this->pic = '';
        $this->id_pic = '';
        $this->no_up = '';
        $this->nama_pengadaan = '';
        $this->percentage = '';

        $this->bebas_pajak = 'no';
        $this->pajak = '';
        $this->asal_brand = 'lokal';
        $this->brand = '';
        $this->warranty = '';
        $this->garansi = '';
        $this->payment = 'no';
        $this->dp_payment = '';
        $this->termin = '';
        $this->sertifikat_produk = [];

        $this->dispatch('stepDua', [
            'title' => 'Data step 2 berhasil ditambah.',
            'icon' => 'success',
        ]);
    }

    public function storeProjectDua()
    {
        $this->dispatch('show-confirm-step-dua-modal');
    }

    public function lihatStepDua($id)
    {
        $this->stepDua_id = $id;
        $data = Admin::where('id', $this->stepDua_id)->first();
        $pic = $data->user()->first();
        $sertifikat = $data->sertifikat()->get();

        $this->data_sertifikat_admin = $sertifikat;

        $this->stepDua_pic = $pic->nama;
        $this->stepDua_no_up = $data->no_up;
        $this->stepDua_nama_pengadaan = $data->nama_pengadaan;
        $this->stepDua_percentage = $data->percentage;
        $this->stepDua_date = $data->date_step_dua;
        $this->stepDua_bebas_pajak = $data->bebas_pajak;
        $this->stepDua_pajak = $data->status_pajak;
        $this->stepDua_asal_brand = $data->asal_brand;
        $this->stepDua_brand = $data->status_brand;
        $this->stepDua_waranty = $data->waranty;
        $this->stepDua_garansi = $data->status_warraanty;
        $this->stepDua_payment = $data->payment_term;
        $this->stepDua_dp_payment = $data->status_dp;
        $this->stepDua_termin = $data->status_termin;



        // dd($this->stepDua_sertifikat);

        $this->dispatch('show-step-dua-modal');
    }

    public function ubahStepDua($id)
    {
        $this->stepDua_id = $id;

        $data = Admin::where('id', $this->stepDua_id)->first();
        $user = $data->user()->first();
        $sertifikat = $data->sertifikat()->get();

        $this->data_sertifikat_admin = $sertifikat;




        $this->pic = $user->nama;
        $this->bebas_pajak = $data->bebas_pajak;
        $this->pajak = $data->status_pajak;
        $this->asal_brand = $data->asal_brand;
        $this->brand = $data->status_brand;
        $this->warranty = $data->waranty;
        $this->garansi = $data->status_warraanty;
        $this->payment = $data->payment_term;
        $this->dp_payment = $data->status_dp;
        $this->termin = $data->status_termin;
        $this->id_pic = $user->id;
        $this->no_up = $data->no_up;
        $this->nama_pengadaan = $data->nama_pengadaan;
        $this->percentage = $data->percentage;

        $this->dispatch('ubah-step-dua-modal');
    }

    public function updateStepStepDuaAction()
    {
        $data = Admin::where('id', $this->stepDua_id)->first();
        $dataTermin = TerminAdmin::where('project_id', $this->stepDua_id)->get();

        if ($this->payment == 'termin') {
            $this->validate([
                'termin' => 'numeric|max:2|min:1'
            ]);
        }




        if ($data->payment_term != $this->payment) {
            $this->dispatch('hapus-step-dua-modal');
        } else {
            if ($this->termin != $data->status_termin) {
                $this->validate([
                    'termin' => 'numeric|max:2'
                ]);



                $this->dispatch('hapus-termin-modal');
            } else {
                $data->update([
                    'bebas_pajak' => $this->bebas_pajak,
                    'status_pajak' => $this->pajak,
                    'asal_brand' => $this->asal_brand,
                    'status_brand' => $this->brand,
                    'waranty' => $this->warranty,
                    'status_warraanty' => $this->garansi,
                    'payment_term' => $this->payment,
                    'status_dp' => $this->dp_payment,
                    'status_termin' => $this->termin,
                    'status_dua' => 1,
                ]);





                if ($this->payment != $data->payment_term) {
                    DpAdmin::where('project_id', $this->stepDua_id)->delete();
                    TerminAdmin::where('project_id', $this->stepDua_id)->delete();
                }


                if ($this->sertifikat_produk) {
                    $data->sertifikat()->sync($this->sertifikat_produk);
                }

                if (Bobot::where('project_id', $this->stepDua_id)->count() == 0) {
                    Bobot::create([
                        'project_id' => $this->stepDua_id,
                        'bobot_kontrak' => 0,
                        'bobot_penagihan' => 0,
                        'bobot_pengiriman' => 0,
                        'bobot_marcendiser' => 0,
                    ]);
                }



                $this->stepDua_id = '';

                $this->data_sertifikat_admin = [];
                $this->sertifikat_produk = [];
                $this->pic = '';
                $this->bebas_pajak = 'no';
                $this->pajak = '';
                $this->asal_brand = 'lokal';
                $this->brand = '';
                $this->warranty = 'no';
                $this->garansi = '';
                $this->payment = '';
                $this->dp_payment = '';
                $this->termin = '';
                $this->id_pic = '';
                $this->no_up = '';
                $this->nama_pengadaan = '';
                $this->percentage = '';
                $this->nama_pengadaan = '';
                $this->no_up = '';

                $this->stepDua_no_up = '';
                $this->stepDua_nama_pengadaan = '';

                $this->dispatch('hide-step-dua-modal');



                $this->dispatch('ubahStepDua', [
                    'title' => 'Data step 2 berhasil diubah.',
                    'icon' => 'success',
                ]);
            }
        }
    }

    public function updateStepDuaWithTermin()
    {
        $dataTermin = TerminAdmin::where('project_id', $this->stepDua_id)->get();

        $data = Admin::where('id', $this->stepDua_id)->first();
        $data->update([
            'pic_handle' => NULL,
            'pic_penagihan' => NULL,
            'bebas_pajak' => $this->bebas_pajak,
            'status_pajak' => $this->pajak,
            'asal_brand' => $this->asal_brand,
            'status_brand' => $this->brand,
            'waranty' => $this->warranty,
            'status_warraanty' => $this->garansi,
            'payment_term' => $this->payment,
            'status_dp' => $this->dp_payment,
            'status_termin' => $this->termin,
            'status_dua' => 1,
            'status_tiga' => 0,
            'no_kontrak' => NULL,
            'nilai_kontrak' => NULL,
            'jatuh_tempo' => NULL,
            'tgl_kontrak' => NULL,
            'nilai_dp' => NULL,
            'status_project' => 0,
            'simb' => 0,
            'simb_tgl' => NULL,
            'sppm' => 0,
            'sppm_tgl' => NULL,
            'surat_pengantar_barang_pt' => 0,
            'surat_pengantar_barang_pt_tgl' => NULL,
            'packing_list_pt' => 0,
            'packing_list_pt_tgl' => NULL,
            'invoice' => 0,
            'invoice_tgl' => NULL,
            'packing_list' => 0,
            'packing_list_tgl' => NULL,
            'awb_bl' => 0,
            'awb_bl_tgl' => NULL,
            'kontrak' => 0,
            'kontrak_tgl' => NULL,
            'amademen_kontrak' => 0,
            'amademen_kontrak_tgl' => NULL,
            'surat_pernyataan_barang' => 0,
            'surat_pernyataan_barang_tgl' => NULL,
            'percentage_penagihan' => 0,

            'percentage_penagihan_all' => 0,

            'bobot_penagihan' => 0,
            'jumlah_item' => 0,
            'jumlah_ea' => 0,
            'jumlah_item_production' => 0,
            'jumlah_ea_production' => 0,
            'etd_production' => NULL,
            'jumlah_item_delivery' => 0,
            'jumlah_ea_delivery' => 0,
            'etd_delivery' => NULL,
            'jumlah_item_ready_stock' => 0,
            'jumlah_ea_ready_stock' => 0,
            'jumlah_item_received' => 0,
            'jumlah_ea_received' => 0,
            'percentage_marcendiser' => 0,
            'step_satu_marcendiser' => 1,
            'step_dua_marcendiser' => 0,
            'step_tiga_marcendiser' => 0,
            'step_empat_marcendiser' => 0,
            'status_marcendiser' => 0,

            'usul_pesanan' => 0,
            'usul_pesanan_tgl' => NULL,
            'sprinada' => 0,
            'sprinada_tgl' => NULL,
            'prakualifikasi' => 0,
            'prakualifikasi_tgl' => NULL,
            'sph' => 0,
            'sph_tgl' => NULL,
            'sppbj' => 0,
            'sppbj_tgl' => NULL,
            'no_kontrak_kontrak' => 0,
            'no_kontrak_kontrak_tgl' => NULL,
            'percentage_kontrak' => 0,

            'jenis_pengiriman' => 'Lengkap',
            'tgl_pengiriman' => NULL,
            'no_bast' => NULL,
            'tgl_bast' => NULL,
            'status_tgl_bast' => 0,
            'percentage_pengiriman' => 0,
            'nilai_dp' => 0,


            'tgl_garansi' => NULL,
            'bebas_pajak' => 'no',
            'status_pajak' => NULL,
            'asal_brand' => 'lokal',
            'status_brand' => NULL,
            'waranty' => 'no',
            'status_warranty' => 0,


        ]);

        if ($this->payment == 'termin') {
            if ($dataTermin->count() == 0) {
                for ($i = 0; $i < (int)$this->termin; $i++) {
                    TerminAdmin::create([
                        'project_id' => $this->stepDua_id
                    ]);
                }
            } else {
                TerminAdmin::where('project_id', $this->stepDua_id)->delete();
            }
        }

        if ($this->sertifikat_produk) {
            $data->sertifikat()->sync($this->sertifikat_produk);
        }

        Termin::where('id_project', $this->stepDua_id)->delete();
        Pengiriman::where('id_project', $this->stepDua_id)->delete();
        PO::where('project_id', $this->stepDua_id)->delete();

        if (Bobot::where('project_id', $this->stepDua_id)->count() == 0) {
            Bobot::create([
                'project_id' => $this->stepDua_id,
                'bobot_kontrak' => 0,
                'bobot_penagihan' => 0,
                'bobot_pengiriman' => 0,
                'bobot_marcendiser' => 0,
            ]);
        } else {
            Bobot::where('project_id', $this->stepDua_id)->update([
                'bobot_kontrak' => 0,
                'bobot_penagihan' => 0,
                'bobot_pengiriman' => 0,
                'bobot_marcendiser' => 0,
            ]);
        }


        $this->stepDua_id = '';

        $this->data_sertifikat_admin = [];
        $this->sertifikat_produk = [];
        $this->pic = '';
        $this->bebas_pajak = 'no';
        $this->pajak = '';
        $this->asal_brand = 'lokal';
        $this->brand = '';
        $this->warranty = 'no';
        $this->garansi = '';
        $this->payment = '';
        $this->dp_payment = '';
        $this->termin = '';
        $this->id_pic = '';
        $this->no_up = '';
        $this->nama_pengadaan = '';
        $this->percentage = '';
        $this->nama_pengadaan = '';
        $this->no_up = '';

        $this->stepDua_no_up = '';
        $this->stepDua_nama_pengadaan = '';

        $this->dispatch('hide-hapus-termin-modal');



        $this->dispatch('ubahStepDuaTermin', [
            'title' => 'Data step 2 berhasil diubah.',
            'icon' => 'success',
        ]);
    }
    public function updateStepDuaWithPaymentTerm()
    {
        // dd($this->stepDua_id);

        $data = Admin::where('id', $this->stepDua_id)->first();



        $data->update([
            'pic_handle' => NULL,
            'pic_penagihan' => NULL,
            'bebas_pajak' => $this->bebas_pajak,
            'status_pajak' => $this->pajak,
            'asal_brand' => $this->asal_brand,
            'status_brand' => $this->brand,
            'waranty' => $this->warranty,
            'status_warraanty' => $this->garansi,
            'payment_term' => $this->payment,
            'status_dp' => $this->dp_payment,
            'status_termin' => $this->termin,
            'status_dua' => 1,
            'status_tiga' => 0,
            'status_project' => 0,
            'no_kontrak' => NULL,
            'nilai_kontrak' => NULL,
            'jatuh_tempo' => NULL,
            'tgl_kontrak' => NULL,
            'nilai_dp' => NULL,
            'simb' => 0,
            'simb_tgl' => NULL,
            'sppm' => 0,
            'sppm_tgl' => NULL,
            'surat_pengantar_barang_pt' => 0,
            'surat_pengantar_barang_pt_tgl' => NULL,
            'packing_list_pt' => 0,
            'packing_list_pt_tgl' => NULL,
            'invoice' => 0,
            'invoice_tgl' => NULL,
            'packing_list' => 0,
            'packing_list_tgl' => NULL,
            'awb_bl' => 0,
            'awb_bl_tgl' => NULL,
            'kontrak' => 0,
            'kontrak_tgl' => NULL,
            'amademen_kontrak' => 0,
            'amademen_kontrak_tgl' => NULL,
            'surat_pernyataan_barang' => 0,
            'surat_pernyataan_barang_tgl' => NULL,
            'percentage_penagihan' => 0,

            'percentage_penagihan_all' => 0,

            'bobot_penagihan' => 0,
            'jumlah_item' => 0,
            'jumlah_ea' => 0,
            'jumlah_item_production' => 0,
            'jumlah_ea_production' => 0,
            'etd_production' => NULL,
            'jumlah_item_delivery' => 0,
            'jumlah_ea_delivery' => 0,
            'etd_delivery' => NULL,
            'jumlah_item_ready_stock' => 0,
            'jumlah_ea_ready_stock' => 0,
            'jumlah_item_received' => 0,
            'jumlah_ea_received' => 0,
            'percentage_marcendiser' => 0,
            'step_satu_marcendiser' => 1,
            'step_dua_marcendiser' => 0,
            'step_tiga_marcendiser' => 0,
            'step_empat_marcendiser' => 0,
            'status_marcendiser' => 0,

            'usul_pesanan' => 0,
            'usul_pesanan_tgl' => NULL,
            'sprinada' => 0,
            'sprinada_tgl' => NULL,
            'prakualifikasi' => 0,
            'prakualifikasi_tgl' => NULL,
            'sph' => 0,
            'sph_tgl' => NULL,
            'sppbj' => 0,
            'sppbj_tgl' => NULL,
            'no_kontrak_kontrak' => 0,
            'no_kontrak_kontrak_tgl' => NULL,
            'percentage_kontrak' => 0,

            'jenis_pengiriman' => 'Lengkap',
            'tgl_pengiriman' => NULL,
            'no_bast' => NULL,
            'tgl_bast' => NULL,
            'status_tgl_bast' => 0,
            'percentage_pengiriman' => 0,
            'nilai_dp' => 0,

            'tgl_garansi' => NULL,
            'bebas_pajak' => 'no',
            'status_pajak' => NULL,
            'asal_brand' => 'lokal',
            'status_brand' => NULL,
            'waranty' => 'no',
            'status_warranty' => 0,

        ]);



        DpAdmin::where('project_id', $this->stepDua_id)->delete();
        TerminAdmin::where('project_id', $this->stepDua_id)->delete();
        PO::where('project_id', $this->stepDua_id)->delete();

        Bobot::where('project_id', $this->stepDua_id)->update([
            'bobot_kontrak' => 0,
            'bobot_penagihan' => 0,
            'bobot_pengiriman' => 0,
            'bobot_marcendiser' => 0,
        ]);

        if ($this->sertifikat_produk) {
            $data->sertifikat()->sync($this->sertifikat_produk);
        }

        Termin::where('id_project', $this->stepDua_id)->delete();
        Pengiriman::where('id_project', $this->stepDua_id)->delete();


        if (Bobot::where('project_id', $this->stepDua_id)->count() == 0) {
            Bobot::create([
                'project_id' => $this->stepDua_id,
                'bobot_kontrak' => 0,
                'bobot_penagihan' => 0,
                'bobot_pengiriman' => 0,
                'bobot_marcendiser' => 0,
            ]);
        } else {
            Bobot::where('project_id', $this->stepDua_id)->update([
                'bobot_kontrak' => 0,
                'bobot_penagihan' => 0,
                'bobot_pengiriman' => 0,
                'bobot_marcendiser' => 0,
            ]);
        }

        $this->stepDua_id = '';

        $this->data_sertifikat_admin = [];
        $this->sertifikat_produk = [];
        $this->pic = '';
        $this->bebas_pajak = 'no';
        $this->pajak = '';
        $this->asal_brand = 'lokal';
        $this->brand = '';
        $this->warranty = 'no';
        $this->garansi = '';
        $this->payment = '';
        $this->dp_payment = '';
        $this->termin = '';
        $this->id_pic = '';
        $this->no_up = '';
        $this->nama_pengadaan = '';
        $this->percentage = '';
        $this->nama_pengadaan = '';
        $this->no_up = '';

        $this->stepDua_no_up = '';
        $this->stepDua_nama_pengadaan = '';

        $this->dispatch('hide-hapus-step-dua-modal');



        $this->dispatch('ubahStepDuaPaymentTerm', [
            'title' => 'Data step 2 berhasil diubah.',
            'icon' => 'success',
        ]);
    }

    public $namaTermin;

    public function ubahTerminData($id)
    {
        $this->id_termin = $id;

        $data = Termin::where('id', $this->id_termin)->first();

        $this->valueTermin = (int)$data->value;
        $this->namaTermin = $data->name;

        $this->dispatch('show-edit-nilai-termin-modal');
    }

    public function ubahValueTermin()
    {
        Termin::where('id', $this->id_termin)->update([
            'value' => $this->valueTermin
        ]);


        $this->dispatch('hide-edit-nilai-termin-modal');
        $this->dispatch('ubahNilaiTermin', [
            'title' => 'Nilai ' . Termin::where('id', $this->id_termin)->first()->name . ' berhasil diubah.',
            'icon' => 'success',
        ]);
    }

    public function closeEditStepDua()
    {
        $this->stepDua_nama_pengadaan = '';
        $this->stepDua_percentage = '';
        $this->stepDua_no_up = '';
        $this->stepDua_pic = '';
        $this->stepDua_bebas_pajak = '';
        $this->stepDua_pajak = '';
        $this->stepDua_asal_brand = '';
        $this->stepDua_brand = '';
        $this->stepDua_brand = '';
        $this->data_sertifikat_admin = [];
        $this->stepDua_waranty = '';
        $this->stepDua_garansi = '';
        $this->stepDua_payment = '';
        $this->stepDua_dp_payment = '';
        $this->stepDua_termin = '';
        $this->stepDua_date = '';
    }

    public function brand()
    {
        dd('success');
    }

    // step 3

    public function inputStepTiga($id)
    {
        $data = Admin::where('id', $id)->first();
        $user = $data->user()->first();
        $dp = $data->status_dp;

        $this->id_project = $data->id;
        $this->pic = $user->nama;
        $this->id_pic = $user->id;
        $this->no_up = $data->no_up;
        $this->nama_pengadaan = $data->nama_pengadaan;
        $this->percentage = $data->percentage;
        $this->payment = $data->payment_term;
        $this->termin = $data->status_termin;
        $this->nilai_kontrak = $data->nilai_kontrak;



        $this->dispatch('show-ubah-step-tiga-modal');
        // dd($data);
    }

    public function updateStepStepTiga()
    {
        $this->validate([
            'no_kontrak' => 'required|unique:tb_admin,no_kontrak',
            'nilai_kontrak' => 'required|numeric|max:1000000000000|min:1000',
            'jatuh_tempo' => 'required|date',
            'tgl_kontrak' => 'required|date',
        ]);

        $data = Admin::where('id', $this->id_project)->first();
        $user = $data->user()->first();
        $dp = $data->status_dp;
        $payment_term = $data->payment_term;


        $this->id_project = $data->id;
        $this->pic = $user->nama;
        $this->id_pic = $user->id;
        $this->no_up = $data->no_up;
        $this->nama_pengadaan = $data->nama_pengadaan;
        $this->percentage = $data->percentage;
        $this->payment = $data->payment_term;


        // dd($tanggal);

        if ($payment_term == 'dp') {
            $this->nilai_dp = $this->nilai_kontrak * ($dp / 100);
        } else {
            $this->nilai_dp = 0;
        }

        $this->display_nilai_kontrak = RupiahFormat::currency($this->nilai_kontrak);
        $this->display_nilai_dp = RupiahFormat::currency($this->nilai_dp);
        $this->display_jatuh_tempo = TanggalFormat::DateIndo($this->jatuh_tempo);
        $this->display_tgl_kontrak = TanggalFormat::DateIndo($this->tgl_kontrak);

        $this->dispatch('show-preview-step-tiga-modal');
    }

    public function confirmStepTiga()
    {

        $this->dispatch('show-confirm-step-tiga-modal');
    }

    public function updateStepStepTigaAction()
    {


        $this->validate([
            'no_kontrak' => 'required|unique:tb_admin,no_kontrak',
            'nilai_kontrak' => 'required|numeric',
            'jatuh_tempo' => 'required|date',
            'tgl_kontrak' => 'required|date',
        ]);

        $dataDp = DpAdmin::where('project_id', $this->stepDua_id)->get();
        $dataTermin = TerminAdmin::where('project_id', $this->stepDua_id)->get();


        $data = Admin::where('id', $this->id_project)->first();
        $payment_term = $data->payment_term;
        $dp = $data->status_dp;



        if ($payment_term == 'dp') {
            $this->nilai_dp = $this->nilai_kontrak * ($dp / 100);
        } else {
            $this->nilai_dp = 0;
        }





        Admin::where('id', $this->id_project)->update([
            'no_kontrak' => $this->no_kontrak,
            'nilai_kontrak' => $this->nilai_kontrak,
            'jatuh_tempo' => $this->jatuh_tempo,
            'tgl_kontrak' => $this->tgl_kontrak,
            'nilai_dp' => $this->nilai_dp,
            'status_tiga' => 1,
            'status_project' => 1,
        ]);

        $value = $this->data_termin;

        for ($i = 1; $i <= count($this->data_termin); $i++) {
            Termin::create([
                'name' => 'Termin ' . $i,
                'id_project' => $this->id_project,
                'value' => (int)$value[$i]
            ]);
        }



        if ($this->payment == 'termin') {
            if ($dataTermin->count() == 0) {
                for ($i = 0; $i < (int)$this->termin; $i++) {
                    TerminAdmin::create([
                        'name' => 'Termin ' . $i + 1,
                        'project_id' => $this->id_project,
                    ]);
                }
            }
        } elseif ($this->payment == 'dp') {
            if ($dataDp->count() == 0) {
                DpAdmin::create([
                    'project_id' => $this->id_project
                ]);
            }
        }



        $this->dispatch('hide-confirm-step-tiga-modal');


        $this->stepDua_id = '';
        $this->no_kontrak = '';
        $this->nama_pengadaan = '';
        $this->no_up = '';
        $this->id_project = '';
        $this->nilai_dp = '';
        $this->nilai_kontrak = '';
        $this->jatuh_tempo = '';
        $this->tgl_kontrak = '';
        $this->payment = '';
        $this->data_termin = [];

        $this->dispatch('stepTiga', [
            'title' => 'Data step 3 berhasil ditambah.',
            'icon' => 'success',
        ]);
    }

    public function lihatStepTiga($id)
    {
        $this->id_project = $id;
        $data = Admin::where('id', $this->id_project)->first();
        $user = $data->user()->first();

        $this->stepSatu_nama_pengadaan = $data->nama_pengadaan;
        $this->pic = $user->nama;
        $this->stepSatu_percentage = $data->percentage;
        $this->stepSatu_no_up = $data->no_up;
        $this->no_kontrak = $data->no_kontrak;
        $this->stepDua_payment = $data->payment_term;
        $this->nilai_kontrak = "Rp " . number_format($data->nilai_kontrak, 0, ',', '.');
        $this->display_jatuh_tempo = TanggalFormat::DateIndo($data->jatuh_tempo);
        $this->display_tgl_kontrak = TanggalFormat::DateIndo($data->tgl_kontrak);
        $this->nilai_dp = RupiahFormat::currency($data->nilai_dp);

        $this->dispatch('show-detail-project-tiga-modal');

        // dd('success');
    }

    public function closeLihatStepTiga()
    {
        $this->id_project = '';
        $this->stepSatu_nama_pengadaan = '';
        $this->stepSatu_percentage = '';
        $this->stepSatu_no_up = '';
        $this->no_kontrak = '';
        $this->nilai_kontrak;
        $this->display_jatuh_tempo = '';
        $this->display_tgl_kontrak = '';
        $this->jatuh_tempo = '';
        $this->tgl_kontrak = '';
        $this->nilai_dp = '';
    }
    public function closeUbahStepTiga()
    {
        $this->id_project = '';
        $this->stepSatu_nama_pengadaan = '';
        $this->stepSatu_percentage = '';
        $this->stepSatu_no_up = '';
        $this->no_kontrak = '';
        $this->nilai_kontrak = '';
        $this->display_jatuh_tempo = '';
        $this->display_tgl_kontrak = '';
        $this->jatuh_tempo = '';
        $this->tgl_kontrak = '';
        $this->nilai_dp = '';
    }

    public function ubahStepTiga($id)
    {
        $this->id_project = $id;

        $data = Admin::where('id', $this->id_project)->first();
        $user = $data->user()->first();

        $this->stepSatu_nama_pengadaan = $data->nama_pengadaan;
        $this->pic = $user->nama;
        $this->stepSatu_percentage = $data->percentage;
        $this->stepSatu_no_up = $data->no_up;
        $this->no_kontrak = $data->no_kontrak;
        $this->stepDua_payment = $data->payment_term;
        $this->nilai_kontrak = $data->nilai_kontrak;
        $this->jatuh_tempo = $data->jatuh_tempo;
        $this->tgl_kontrak = $data->tgl_kontrak;
        $this->payment = $data->payment_term;

        $this->dispatch('show-ubah-data-step-tiga-modal');
    }

    public function updateDataStepTiga()
    {
        $this->validate([
            'no_kontrak' => 'required|unique:tb_admin,no_kontrak,' . $this->id_project,
            'nilai_kontrak' => 'required|numeric',
            'jatuh_tempo' => 'required|date',
            'tgl_kontrak' => 'required|date',
        ]);

        $data = Admin::where('id', $this->id_project)->first();
        $payment_term = $data->payment_term;
        $dp = $data->status_dp;



        if ($payment_term == 'dp') {
            $this->nilai_dp = $this->nilai_kontrak * ($dp / 100);
        } else {
            $this->nilai_dp = 0;
        }





        Admin::where('id', $this->id_project)->update([
            'no_kontrak' => $this->no_kontrak,
            'nilai_kontrak' => $this->nilai_kontrak,
            'jatuh_tempo' => $this->jatuh_tempo,
            'tgl_kontrak' => $this->tgl_kontrak,
            'nilai_dp' => (int)$this->nilai_dp,
        ]);


        $this->dispatch('hide-ubah-data-step-tiga-modal');


        $this->id_project = '';
        $this->nilai_dp = '';
        $this->nilai_kontrak = '';
        $this->no_kontrak = '';
        $this->jatuh_tempo = '';
        $this->tgl_kontrak = '';
        $this->payment = '';
        $this->data_termin = [];

        $this->dispatch('ubahStepTiga', [
            'title' => 'Data step 3 berhasil diubah.',
            'icon' => 'success',
        ]);
    }


    // view project
    public function viewDetail($id)
    {
        $this->id_project = $id;
        $data = Admin::where('id', $this->id_project)->first();
        $dp = $data->dpPenagihan()->first();
        $dataBobot = Bobot::where('project_id', $this->id_project)->first();

        $vendor = $data->vendor()->get();
        $sertifikat = $data->sertifikat()->get();

        $this->data_vendor_admin = $vendor;
        $this->data_sertifikat_admin = $sertifikat;

        // dd($data->payment_term);
        $this->dataDP = DpAdmin::where('project_id', $this->id_project)->get();
        $this->terminData = TerminAdmin::where('project_id', $this->id_project)->get();

        // dd($this->dataDP, $this->id_project);

        // if ($data->payment_term = 'dp') {
        //     $this->percentage_dp = $dp->percentage;
        //     $this->surat_permohonan_dp = $dp->surat_permohonan;
        //     $this->surat_permohonan_tgl_dp = $dp->surat_permohonan_tgl;
        //     $this->kwitansi_pembayaran_dp = $dp->kwitansi_pembayaran_dp;
        //     $this->kwitansi_pembayaran_tgl_dp = $dp->kwitansi_pembayaran_tgl_dp;
        //     $this->bap_dp = $dp->bap;
        //     $this->bap_tgl_dp = $dp->bap_tgl;
        //     $this->ssp_ppn_pph_dp = $dp->ssp_ppn_pph;
        //     $this->ssp_ppn_pph_tgl_dp = $dp->ssp_ppn_pph_tgl;
        //     $this->efaktur_dp = $dp->efaktur;
        //     $this->efaktur_tgl_dp = $dp->efaktur_tgl;
        //     $this->kontrak_dp = $dp->kontrak;
        //     $this->kontrak_tgl_dp = $dp->kontrak_tgl;
        //     $this->jamuk_dp = $dp->jamuk;
        //     $this->jamuk_tgl_dp = $dp->jamuk_tgl;
        //     $this->sppbj_dp = $dp->sppbj;
        //     $this->sppbj_tgl_dp = $dp->sppbj_tgl;
        // } else {
        //     $this->percentage_dp = '';
        //     $this->surat_permohonan_dp = '';
        //     $this->surat_permohonan_tgl_dp = '';
        //     $this->kwitansi_pembayaran_dp = '';
        //     $this->kwitansi_pembayaran_tgl_dp = '';
        //     $this->bap_dp = '';
        //     $this->bap_tgl_dp = '';
        //     $this->ssp_ppn_pph_dp = '';
        //     $this->ssp_ppn_pph_tgl_dp = '';
        //     $this->efaktur_dp = '';
        //     $this->efaktur_tgl_dp = '';
        //     $this->kontrak_dp = '';
        //     $this->kontrak_tgl_dp = '';
        //     $this->jamuk_dp = '';
        //     $this->jamuk_tgl_dp = '';
        //     $this->sppbj_dp = '';
        //     $this->sppbj_tgl_dp = '';
        // }





        $this->step_satu = $data->status_satu;
        $this->step_dua = $data->status_dua;
        $this->step_tiga = $data->status_tiga;

        $pic = $data->user()->first();
        $pt = $data->pt()->first();
        $instansi = $data->instansi()->first();
        $vendor = $data->vendor()->first();
        $sertifikat = $data->bobot()->first();
        $bobot = $dataBobot->bobot_kontrak + $dataBobot->bobot_penagihan + $dataBobot->bobot_pengiriman + $dataBobot->bobot_marcendiser;

        $this->stepSatu_tgl_input = $data->created_at;
        $this->stepSatu_percentage = $bobot;
        $this->stepSatu_desc = $data->description;
        // $this->stepSatu_vendor = $vendor->name;
        $this->stepSatu_tahun_pengadaan = $data->tahun_anggaran;
        $this->stepSatu_jenis_anggaran = $data->jenis_anggaran;
        $this->stepSatu_instansi = $instansi->name;
        $this->stepSatu_nama_pengadaan = $data->nama_pengadaan;
        $this->stepSatu_nama_pt = $pt->name;
        $this->stepSatu_pic = $pic->nama;
        $this->stepSatu_no_up = $data->no_up;
        $this->jenis_lelang = $data->jenis_lelang;

        $this->stepDua_pic = $pic->nama;
        $this->stepDua_no_up = $data->no_up;
        $this->stepDua_nama_pengadaan = $data->nama_pengadaan;
        $this->stepDua_percentage = $data->percentage;
        $this->stepDua_date = $data->date_step_dua;
        $this->stepDua_bebas_pajak = $data->bebas_pajak;
        $this->stepDua_pajak = $data->status_pajak;
        $this->stepDua_asal_brand = $data->asal_brand;
        $this->stepDua_brand = $data->status_brand;
        $this->stepDua_sertifikat = $bobot;
        $this->stepDua_waranty = $data->waranty;
        $this->stepDua_garansi = $data->status_warraanty;
        $this->stepDua_payment = $data->payment_term;
        $this->stepDua_dp_payment = $data->status_dp;
        $this->stepDua_termin = $data->status_termin;

        $this->no_kontrak = $data->no_kontrak;
        $this->nilai_kontrak = RupiahFormat::currency($data->nilai_kontrak);
        $this->jatuh_tempo = $data->jatuh_tempo;
        $this->tgl_kontrak = $data->tgl_kontrak;
        $this->nilai_dp = RupiahFormat::currency($data->nilai_dp);

        if ($data->status_dua == 1 && $data->status_tiga == 1) {
            $this->display_jatuh_tempo = TanggalFormat::DateIndo($data->jatuh_tempo);
            $this->display_tgl_kontrak = TanggalFormat::DateIndo($data->tgl_kontrak);
        } else {
            $this->display_jatuh_tempo = '';
            $this->display_tgl_kontrak = '';
        }

        $this->usul_pesanan = $data->usul_pesanan;
        $this->sprinada = $data->sprinada;
        $this->prakualifikasi = $data->prakualifikasi;
        $this->sph = $data->sph;
        $this->sppbj = $data->sppbj;
        $this->no_kontrak_kontrak = $data->no_kontrak_kontrak;
        $this->percentage_kontrak = $data->percentage_kontrak;

        $this->baanname = $data->pengiriman()->count();
        $this->bainname = $data->pengiriman()->count();
        $this->bast = $data->no_bast;
        $this->percentage_pengiriman = $data->percentage_pengiriman;

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
        $this->percentage_penagihan = $data->percentage_penagihan_all;

        $this->jumlah_ea_received = $data->jumlah_ea_received;
        $this->jumlah_ea = $data->jumlah_ea;
        $this->percentage_marcendiser = $data->percentage_marcendiser;


        $this->dispatch('show-view-project-modal');
    }

    public function closeViewDetail()
    {
        $this->stepSatu_nama_pengadaan = '';
        $this->stepSatu_percentage = '';
        $this->stepSatu_no_up = '';
        $this->stepSatu_nama_pt = '';
        $this->stepSatu_instansi = '';
        $this->stepSatu_pic = '';
        $this->stepSatu_jenis_anggaran = '';
        $this->stepSatu_tahun_pengadaan = '';
        $this->stepSatu_desc = '';
        $this->stepDua_bebas_pajak = '';
        $this->stepDua_pajak = '';
        $this->stepDua_asal_brand = '';
        $this->stepDua_brand = '';
        $this->stepDua_waranty = '';
        $this->stepDua_garansi = '';
        $this->stepDua_payment = '';
        $this->stepDua_dp_payment = '';
        $this->no_kontrak = '';
        $this->nilai_kontrak = '';
        $this->display_jatuh_tempo = '';
        $this->display_tgl_kontrak = '';
        $this->nilai_dp = '';

        $this->percentage_kontrak = '';
        $this->usul_pesanan = '';
        $this->sprinada = '';
        $this->prakualifikasi = '';
        $this->sph = '';
        $this->sppbj = '';
        $this->no_kontrak_kontrak = '';
        $this->percentage_marcendiser = '';
        $this->jumlah_ea_received = '';
        $this->jumlah_ea = '';
        $this->percentage_pengiriman = '';
        $this->baanname = '';
        $this->bainname = '';
        $this->bast = '';
        $this->percentage_penagihan = '';
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

        $this->data_vendor_admin = [];



        // $this->reset();
    }

    public function closeStepDua()
    {
        $this->stepDua_nama_pengadaan = '';
        $this->stepDua_percentage = '';
        $this->stepDua_no_up = '';
        $this->stepDua_pic = '';
        $this->stepDua_bebas_pajak = '';
        $this->stepDua_pajak = '';
        $this->stepDua_asal_brand = '';
        $this->stepDua_brand = '';
        $this->stepDua_brand = '';
        $this->data_sertifikat_admin = [];
        $this->stepDua_waranty = '';
        $this->stepDua_garansi = '';
        $this->stepDua_payment = '';
        $this->stepDua_dp_payment = '';
        $this->stepDua_termin = '';
        $this->stepDua_date = '';
    }

    public function ubahSertif()
    {
        $this->ubah_sertifikat = 'ubah';
    }

    public function batalSertif()
    {
        $this->ubah_sertifikat = null;
    }

    public function refresh()
    {
        return;
    }

    public function closeTambahData()
    {
        $this->reset();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.data.project', [
            'users' => User::where('role_id', 3)->get(),
            'sertifikat' => Sertifikat::all(),
            'sertif' => DB::table('tb_admin_sertifikat')->where('tb_admin_id', $this->stepDua_id)->get(),
            'daftaPt' => DaftarPT::all(),
            'daftarInstansi' => Instansi::orderBy('created_at', 'desc')->get(),
            'daftarVendor' => Vendor::orderBy('created_at', 'desc')->get(),
            'admin' => Admin::where('nama_pengadaan', 'like', '%' . $this->search . '%')->orWhere('no_up', 'like', '%' . $this->search . '%')->orderBy($this->sortField, $this->sortDirection)->paginate($this->perPage),
            'data_admin' => Admin::where('id', $this->stepDua_id)->orWhere('id', $this->id_project)->orderBy($this->sortField, $this->sortDirection)->paginate($this->perPage),
            'dataProject' => Admin::where('id', $this->id_project)->orderBy($this->sortField, $this->sortDirection)->paginate($this->perPage),
            'dataTermin' => Termin::all(),
        ]);
    }

    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }

    // public function updatingPerPage()
    // {
    //     $this->resetPage();
    // }
}
