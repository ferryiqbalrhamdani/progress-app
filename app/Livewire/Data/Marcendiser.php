<?php

namespace App\Livewire\Data;

use App\Models\Admin;
use App\Models\Bobot;
use App\Models\PO;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class Marcendiser extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 5;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    #[Url()]
    public $search = '';

    public $id_project, $id_po;
    public $nama_pengadaan, $no_up, $pic;
    public $jenis_anggaran, $tahun_anggaran, $no_kontrak;


    #[Rule('required|numeric|min:0', as: 'Jumlah item')]
    public $jumlah_item;
    #[Rule('required|numeric|min:0', as: 'Jumlah EA')]
    public $jumlah_ea;
    #[Rule('required|numeric|min:0', as: 'Jumlah item')]
    public $jumlah_item_production;
    #[Rule('required|numeric|min:0', as: 'Jumlah EA')]
    public $jumlah_ea_production;
    #[Rule('required', as: 'Tanggal ETD')]
    public $etd_production;
    #[Rule('required|numeric|min:0', as: 'Jumlah item')]
    public $jumlah_item_delivery;
    #[Rule('required|numeric|min:0', as: 'Jumlah EA')]
    public $jumlah_ea_delivery;
    #[Rule('required', as: 'Tanggal ETD')]
    public $etd_delivery;
    #[Rule('required|numeric|min:0', as: 'Jumlah item')]
    public $jumlah_item_ready_stock;
    #[Rule('required|numeric|min:0', as: 'Jumlah EA')]
    public $jumlah_ea_ready_stock;
    #[Rule('required|numeric|min:0', as: 'Jumlah item')]
    public $jumlah_item_received;
    #[Rule('required|numeric|min:0', as: 'Jumlah EA')]
    public $jumlah_ea_received;

    public $percentage_marcendiser;

    #[Rule('required')]
    public $selectedVendor;



    // po
    #[Rule('required|string', as: 'Supplier')]
    public $supplier;
    #[Rule('required|string|unique:tb_po,no_po', as: 'No PO')]
    public $no_po_supplier;
    #[Rule('required|numeric|min:0', as: 'Jumlah item')]
    public $jumlah_item_supplier;
    #[Rule('required|numeric|min:0', as: 'Jumlah EA')]
    public $jumlah_ea_supplier;

    #[Rule('required|string', as: 'Supplier')]
    public $supplier_edit;
    #[Rule('required|string|unique:tb_po,no_po', as: 'No PO')]
    public $no_po_supplier_edit;
    #[Rule('required|numeric|min:0', as: 'Jumlah item')]
    public $jumlah_item_supplier_edit;
    #[Rule('required|numeric|min:0', as: 'Jumlah EA')]
    public $jumlah_ea_supplier_edit;

    #[Rule('required|string', as: 'No Invoice')]
    public $no_invoice, $no_po;

    public function ubahStepSatu($id)
    {
        $this->id_project = $id;

        $data = Admin::where('id', $this->id_project)->first();
        $pic = $data->user()->first();

        $this->pic = $pic->nama;
        $this->no_up = $data->no_up;
        $this->nama_pengadaan = $data->nama_pengadaan;

        $this->jumlah_item = $data->jumlah_item;
        $this->jumlah_ea = $data->jumlah_ea;

        $this->percentage_marcendiser = $data->percentage_marcendiser;

        $this->dispatch('show-step-satu-modal');
    }

    public function stepSatu()
    {
        $this->validate([
            'jumlah_item' => 'required|numeric|min:0|max:' . $this->jumlah_ea,
            'jumlah_ea' => 'required|numeric|min:0',
        ]);

        $data = Admin::where('id', $this->id_project)->first();

        if ($data->jumlah_item == 0 || $data->jumlah_ea == 0) {

            Admin::where('id', $this->id_project)->update([
                'jumlah_item' => $this->jumlah_item,
                'jumlah_ea' => $this->jumlah_ea,
                'step_dua_marcendiser' => 1,
            ]);

            $this->dispatch('hide-step-satu-modal');

            $this->id_project = '';
            $this->jumlah_item = '';
            $this->jumlah_item = '';

            $this->dispatch('stepSatu', [
                'title' => 'Data berhasil diubah.',
                'icon' => 'success',
            ]);
        } else {
            if ($data->step_empat_marcendiser > 0) {
                if ($data->jumlah_item != $this->jumlah_item || $data->jumlah_ea != $this->jumlah_ea) {
                    $this->dispatch('show-confirm-modal');
                } else {
                    Admin::where('id', $this->id_project)->update([
                        'jumlah_item' => $this->jumlah_item,
                        'jumlah_ea' => $this->jumlah_ea,
                        'step_dua_marcendiser' => 1,
                    ]);

                    $this->dispatch('hide-step-satu-modal');

                    $this->id_project = '';
                    $this->jumlah_item = '';
                    $this->jumlah_item = '';

                    $this->dispatch('stepSatu', [
                        'title' => 'Data berhasil diubah.',
                        'icon' => 'success',
                    ]);
                }
            } else {
                Admin::where('id', $this->id_project)->update([
                    'jumlah_item' => $this->jumlah_item,
                    'jumlah_ea' => $this->jumlah_ea,
                    'step_dua_marcendiser' => 1,
                ]);

                $this->dispatch('hide-step-satu-modal');

                $this->id_project = '';
                $this->jumlah_item = '';
                $this->jumlah_item = '';

                $this->dispatch('stepSatu', [
                    'title' => 'Data berhasil diubah.',
                    'icon' => 'success',
                ]);
            }
        }
    }

    public function ubahStepDua($id)
    {
        $this->id_project = $id;

        $data = Admin::where('id', $this->id_project)->first();
        $pic = $data->user()->first();


        $this->pic = $pic->nama;
        $this->no_up = $data->no_up;
        $this->nama_pengadaan = $data->nama_pengadaan;

        $po = PO::where('project_id', $this->id_project)->get();


        $this->dispatch('show-step-dua-modal');
    }

    public function ubahStepTiga($id)
    {
        $this->id_project = $id;

        $data = Admin::where('id', $this->id_project)->first();
        $pic = $data->user()->first();
        $po = PO::where('project_id', $this->id_project)->first();

        $this->pic = $pic->nama;
        $this->no_up = $data->no_up;
        $this->nama_pengadaan = $data->nama_pengadaan;

        $this->no_po = $po->no_po;

        $this->id_po = $po->id;

        $this->dispatch('show-step-tiga-modal');
    }

    public function inputInvoice($id)
    {
        $this->id_po = $id;
        $data = PO::where('id', $this->id_po)->first();

        $this->no_po = $data->no_po;
        $this->no_invoice = $data->no_invoice;

        $this->dispatch('show-no-invoice-modal');
    }

    public function addInvoice()
    {
        $this->validate([
            'no_invoice' => 'required|string|unique:tb_po,no_invoice,' . $this->id_po
        ]);

        PO::where('id', $this->id_po)->update([
            'no_invoice' => $this->no_invoice
        ]);

        Admin::where('id', $this->id_project)->update([
            'step_empat_marcendiser' => 1
        ]);

        $this->no_invoice = '';

        $this->dispatch('hide-no-invoice-modal');

        $this->dispatch('addInvoice', [
            'title' => 'Data berhasil diubah.',
            'icon' => 'success',
        ]);
    }

    public function ubahStepEmpat($id)
    {
        $this->id_project = $id;

        $data = Admin::where('id', $this->id_project)->first();
        $pic = $data->user()->first();

        $this->pic = $pic->nama;
        $this->no_up = $data->no_up;
        $this->nama_pengadaan = $data->nama_pengadaan;

        $this->jumlah_ea = $data->jumlah_ea;
        $this->jumlah_item = $data->jumlah_item;

        $this->jumlah_item_production = $data->jumlah_item_production;
        $this->jumlah_ea_production = $data->jumlah_ea_production;
        $this->etd_production = $data->etd_production;
        $this->jumlah_item_delivery = $data->jumlah_item_delivery;
        $this->jumlah_ea_delivery = $data->jumlah_ea_delivery;
        $this->etd_delivery = $data->etd_delivery;
        $this->jumlah_item_ready_stock = $data->jumlah_item_ready_stock;
        $this->jumlah_ea_ready_stock = $data->jumlah_ea_ready_stock;
        $this->jumlah_item_received = $data->jumlah_item_received;
        $this->jumlah_ea_received = $data->jumlah_ea_received;

        $this->dispatch('show-step-empat-modal');
    }

    public function stepEmpat()
    {
        // $hasil = $this->jumlah_item - $this->jumlah_item_production;
        // dd($hasil);

        $this->validate([
            'jumlah_item_production' => 'required|numeric|min:0|max:' . $this->jumlah_item,
            'jumlah_ea_production' => 'required|numeric|min:0|max:' . $this->jumlah_ea,
            'jumlah_item_ready_stock' => 'required|numeric|min:0|max:' . $this->jumlah_item,
            'jumlah_ea_ready_stock' => 'required|numeric|min:0|max:' . $this->jumlah_ea,
            'jumlah_item_delivery' => 'required|numeric|min:0|max:' . $this->jumlah_item,
            'jumlah_ea_delivery' => 'required|numeric|min:0|max:' . $this->jumlah_ea,
            'jumlah_item_received' => 'required|numeric|min:0|max:' . $this->jumlah_item,
            'jumlah_ea_received' => 'required|numeric|min:0|max:' . $this->jumlah_ea,
        ]);

        $bobot = Bobot::where('project_id', $this->id_project)->first();


        $jumlah_ea = $this->jumlah_ea;
        $jumlah_ea_received = $this->jumlah_ea_received;

        $hasil = $jumlah_ea_received / $jumlah_ea * 100;

        $percentage_marcendiser = floor($hasil);

        $data = Admin::where('id', $this->id_project)->first();
        // $jumlah_ea_received1 = $data->jumlah_ea_received;
        // $percentage = $data->percentage;

        // if($jumlah_ea_received == $jumlah_ea_received1) {
        //     $hasil_percen = $percentage - 0;
        // } else {
        //     $hasil_percen = $percentage - 0;
        // }








        Admin::where('id', $this->id_project)->update([
            'jumlah_item_production' => $this->jumlah_item_production,
            'jumlah_ea_production' => $this->jumlah_ea_production,
            'etd_production' => $this->etd_production,
            'jumlah_item_delivery' => $this->jumlah_item_delivery,
            'jumlah_ea_delivery' => $this->jumlah_ea_delivery,
            'etd_delivery' => $this->etd_delivery,
            'jumlah_item_ready_stock' => $this->jumlah_item_ready_stock,
            'jumlah_ea_ready_stock' => $this->jumlah_ea_ready_stock,
            'jumlah_item_received' => $this->jumlah_item_received,
            'jumlah_ea_received' => $this->jumlah_ea_received,
            'percentage_marcendiser' => (int)$percentage_marcendiser,
            'status_marcendiser' => 1,
            // 'percentage' => (int)$hasil_percen,

        ]);

        // if (Admin::where('id', $this->id_project)->first()->percentage_marcendiser == 100) {
        //     $bobot->update([
        //         'bobot_marcendiser' => 50
        //     ]);
        // } else {
        //     $bobot->update([
        //         'bobot_marcendiser' => 0
        //     ]);
        // }
        $bobot_marcendiser = 50 * $percentage_marcendiser / 100;
        $bobot->update([
            'bobot_marcendiser' => floor($bobot_marcendiser)
        ]);





        $this->pic = '';
        $this->no_up = '';
        $this->nama_pengadaan = '';

        $this->jumlah_ea = '';
        $this->jumlah_item = '';

        $this->jumlah_item_production = '';
        $this->jumlah_ea_production = '';
        $this->etd_production = '';
        $this->jumlah_item_delivery = '';
        $this->jumlah_ea_delivery = '';
        $this->etd_delivery = '';
        $this->jumlah_item_ready_stock = '';
        $this->jumlah_ea_ready_stock = '';
        $this->jumlah_item_received = '';
        $this->jumlah_ea_received = '';

        $this->dispatch('hide-step-empat-modal');

        $this->dispatch('stepEmpat', [
            'title' => 'Data berhasil diubah.',
            'icon' => 'success',
        ]);
    }



    public function closeData()
    {
        $this->pic = '';
        $this->no_up = '';
        $this->nama_pengadaan = '';
    }

    // PO
    public function addPO()
    {
        // dd($this->id_project);
        $this->validate([
            'supplier' => 'required|string',
            'no_po_supplier' => 'required|string|unique:tb_po,no_po',
            'jumlah_item_supplier' => 'required|numeric|min:1',
            'jumlah_ea_supplier' => 'required|numeric|min:1',
        ]);

        PO::create([
            'project_id' => $this->id_project,
            'supplier' => $this->supplier,
            'no_po' => $this->no_po_supplier,
            'jumlah_item' => $this->jumlah_item_supplier,
            'jumlah_ea' => $this->jumlah_ea_supplier,
        ]);
        $data = PO::where('project_id', $this->id_project)->count();
        // dd($data);




        if ($data > 0) {
            Admin::where('id', $this->id_project)->update([
                'step_tiga_marcendiser' => 1
            ]);
        } elseif ($data == 0) {
            Admin::where('id', $this->id_project)->update([
                'step_tiga_marcendiser' => 0
            ]);
        }


        $this->supplier = '';
        $this->no_po_supplier = '';
        $this->jumlah_item_supplier = '';
        $this->jumlah_ea_supplier = '';

        $this->dispatch('addPO', [
            'title' => 'Data berhasil ditambahkan.',
            'icon' => 'success',
        ]);
    }

    public function hapusPO($id)
    {
        PO::where('id', $id)->delete();

        $data = PO::where('project_id', $this->id_project)->count();

        if ($data > 0) {
            Admin::where('id', $this->id_project)->update([
                'step_tiga_marcendiser' => 1
            ]);
        } elseif ($data == 0) {
            Admin::where('id', $this->id_project)->update([
                'step_tiga_marcendiser' => 0
            ]);
        }

        $this->dispatch('hapusPO', [
            'title' => 'Data berhasil dihapus.',
            'icon' => 'success',
        ]);
    }

    public function editPO($id)
    {
        $this->id_po = $id;

        $data = PO::where('id', $this->id_po)->first();

        $this->supplier_edit = $data->supplier;
        $this->no_po_supplier_edit = $data->no_po;
        $this->jumlah_item_supplier_edit = $data->jumlah_item;
        $this->jumlah_ea_supplier_edit = $data->jumlah_ea;

        $this->dispatch('show-edit-po-modal');
    }

    public function ubahPOAction()
    {
        PO::where('id', $this->id_po)->update([
            'supplier' => $this->supplier_edit,
            'no_po' => $this->no_po_supplier_edit,
            'jumlah_item' => $this->jumlah_item_supplier_edit,
            'jumlah_ea' => $this->jumlah_ea_supplier_edit,
        ]);

        $this->dispatch('close-edit-po-modal');
        $this->dispatch('ubahPO', [
            'title' => 'Data berhasil diubah.',
            'icon' => 'success',
        ]);
    }


    public function lihatData($id)
    {
        $this->id_project = $id;

        $data = Admin::where('id', $this->id_project)->first();
        $pic = $data->user()->first();
        $po = PO::all();

        // dd($data->tahun_anggaran, $data->jenis_anggaran);

        $this->nama_pengadaan = $data->nama_pengadaan;
        $this->no_up = $data->no_up;
        $this->no_invoice = $data->no_invoice;
        $this->percentage_marcendiser = $data->percentage_marcendiser;
        $this->pic = $pic->nama;
        $this->jenis_anggaran = $data->jenis_anggaran;
        $this->tahun_anggaran = $data->tahun_anggaran;
        $this->no_kontrak = $data->no_kontrak;

        $this->jumlah_item = $data->jumlah_item;
        $this->jumlah_ea = $data->jumlah_ea;



        $this->jumlah_item_production = $data->jumlah_item_production;
        $this->jumlah_ea_production = $data->jumlah_ea_production;
        $this->etd_production = $data->etd_production;
        $this->jumlah_item_delivery = $data->jumlah_item_delivery;
        $this->jumlah_ea_delivery = $data->jumlah_ea_delivery;
        $this->etd_delivery = $data->etd_delivery;
        $this->jumlah_item_ready_stock = $data->jumlah_item_ready_stock;
        $this->jumlah_ea_ready_stock = $data->jumlah_ea_ready_stock;
        $this->jumlah_item_received = $data->jumlah_item_received;
        $this->jumlah_ea_received = $data->jumlah_ea_received;

        $this->dispatch('show-detail');
    }

    public function confirm()
    {
        Admin::where('id', $this->id_project)->update([
            'jumlah_item' => $this->jumlah_item,
            'jumlah_ea' => $this->jumlah_ea,
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
        ]);

        Bobot::where('project_id', $this->id_project)->update([
            'bobot_marcendiser' => 0
        ]);



        $this->dispatch('hide-confrim-modal');

        $this->id_project = '';

        $this->dispatch('confirm', [
            'title' => 'Data berhasil diubah.',
            'icon' => 'success',
        ]);
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
        return view('livewire.data.marcendiser', [
            'projectPic' => Admin::where('status_project', 1)->where('pic_id', Auth::user()->id)->where('no_up', 'like', '%' . $this->search . '%')->orderBy($this->sortField, $this->sortDirection)->paginate($this->perPage),
            'project' => Admin::where('status_project', 1)->where('no_up', 'like', '%' . $this->search . '%')->orderBy($this->sortField, $this->sortDirection)->paginate($this->perPage),
            'po' => PO::where('project_id', $this->id_project)->get(),
            'data_vendor' => Vendor::all(),
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
