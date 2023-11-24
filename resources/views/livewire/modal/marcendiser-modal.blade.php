<div wire:ignore.self class="modal fade" id="stepSatuModal" data-backdrop="static" style="color: black"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Barang di kontrak <sup><b>(step 1)</b></sup></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeData'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                <div class="mb-3">
                    <p>Progress :</p>
                    {{-- <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$percentage_penagihan}}%"
                            aria-valuenow="{{$percentage_penagihan}}" aria-valuemin="0" aria-valuemax="100">
                            {{$percentage_penagihan}}%</div>
                    </div> --}}

                </div>
                <table class="table table-bordered table-hover bg-body-tertiary rounded shadow-sm "
                    style="color: black">
                    <tbody>
                        <tr>
                            <th class="col-3">No UP</th>
                            <td>{{ $no_up }}</td>
                        </tr>
                        <tr>
                            <th class="col-3">PIC</th>
                            <td style="text-transform: capitalize">{{ $pic }}</td>
                        </tr>
                    </tbody>
                </table>



                <hr style="border: .5px solid black;">
                <div class="container mt-5">
                    <form wire:submit.prevent='stepSatu'>
                        <div class="row">
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="jumlah_item" class="form-label mt-2">Jumlah Item</label>
                            </div>
                            <div class="col-12 col-lg-8">
                                <input type="text" id="jumlah_item" wire:model.live='jumlah_item'
                                    class="form-control card-hover">
                                <div>
                                    @error('jumlah_item') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="jumlah_ea" class="form-label mt-2">Jumlah EA</label>
                            </div>
                            <div class="col-12 col-lg-8">
                                <input type="text" wire:model.live='jumlah_ea' id="jumlah_ea"
                                    class="form-control card-hover">
                                <div>
                                    @error('jumlah_ea') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="modal-footer ">
                <button type="submit" class="btn btn-primary form-control"><i class="far fa-save"></i> Simpan</button>
            </div>
            </form>

        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="stepDuaModal" data-backdrop="static" style="color: black"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Barang di pesan/PO <sup><b>(step 2)</b></sup></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeData'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                <div class="mb-3">
                    <p>Progress :</p>
                    {{-- <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$percentage_penagihan}}%"
                            aria-valuenow="{{$percentage_penagihan}}" aria-valuemin="0" aria-valuemax="100">
                            {{$percentage_penagihan}}%</div>
                    </div> --}}

                </div>
                <table class="table table-bordered table-hover bg-body-tertiary rounded shadow-sm "
                    style="color: black">
                    <tbody>
                        <tr>
                            <th class="col-3">No UP</th>
                            <td>{{ $no_up }}</td>
                        </tr>
                        <tr>
                            <th class="col-3">PIC</th>
                            <td style="text-transform: capitalize">{{ $pic }}</td>
                        </tr>
                    </tbody>
                </table>



                <hr style="border: .5px solid black;">
                <div class="container ">
                    <div class="card shadow-sm">
                        <div class="card-header">

                            <div class="row">
                                <form wire:submit.prevent='addPO'>
                                    <div class="col-md-10 offset-md-1">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="supplier" class="form-label">Supplier</label>
                                                    <select class="form-control card-hover" wire:model.live='supplier'
                                                        id="supplier">
                                                        <option></option>
                                                        @foreach($data_vendor as $dv)
                                                        <option id="{{$dv->id}}" value="{{$dv->name}}">{{$dv->name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    <div>
                                                        @error('supplier') <span class="text-danger"> {{ $message
                                                            }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="no_po_supplier" class="form-label">NO PO</label>
                                                    <input type="text" id="no_po_supplier"
                                                        wire:model.live='no_po_supplier'
                                                        class="form-control card-hover">
                                                    <div>
                                                        @error('no_po_supplier') <span class="text-danger"> {{ $message
                                                            }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="jumlah_item_supplier" class="form-label">Jumlah
                                                        Item</label>
                                                    <input type="text" id="jumlah_item_supplier"
                                                        wire:model.live='jumlah_item_supplier'
                                                        class="form-control card-hover">
                                                    <div>
                                                        @error('jumlah_item_supplier') <span class="text-danger"> {{
                                                            $message
                                                            }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="jumlah_ea_supplier" class="form-label">Jumlah EA</label>
                                                    <input type="text" id="jumlah_ea_supplier"
                                                        wire:model.live='jumlah_ea_supplier'
                                                        class="form-control card-hover">
                                                    <div>
                                                        @error('jumlah_ea_supplier') <span class="text-danger"> {{
                                                            $message
                                                            }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary form-control"><i
                                                class="far fa-save"></i>
                                            Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr style="border: .5px solid black;">
                    {{-- table --}}
                    <div class="table-responsive" wire:poll.keep-alive>
                        <table class="table  table-hover table-bordered shadow-sm"
                            style="color: black; white-space: nowrap;">
                            <thead class="table-primary">
                                <tr>
                                    <th class="text-center">
                                        Action
                                    </th>
                                    <th class="">
                                        Supplier

                                    </th>
                                    <th>
                                        No PO

                                    </th>
                                    <th>
                                        Jumlah Item

                                    </th>
                                    <th class="text-center">
                                        Jumlah EA

                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @if($po->count() == 0)
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data.</td>
                                </tr>
                                @else
                                @foreach ($po as $p)
                                <tr>
                                    <td class="text-center">
                                        <a wire:click='editPO({{$p->id}})' class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" data-placement="right" title="ubah"><i
                                                class="fas fa-edit"></i></a>
                                        <button wire:click='hapusPO({{$p->id}})' class="btn btn-sm btn-danger"
                                            data-toggle="tooltip" data-placement="right" title="hapus"><i
                                                class="fas fa-trash"></i></button>
                                    </td>
                                    <td style="text-transform: capitalize">
                                        {{$p->supplier}}
                                    </td>
                                    <td>
                                        {{$p->no_po}}
                                    </td>
                                    <td>
                                        {{$p->jumlah_item}}
                                    </td>
                                    <td>
                                        {{$p->jumlah_ea}}
                                    </td>

                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" class="text-center"><b>Total</b></td>
                                    <td><b>{{$po->sum('jumlah_item')}}</b> </td>
                                    <td cla><b>{{$po->sum('jumlah_ea')}}</b> </td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="stepTigaModal" data-backdrop="static" style="color: black"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Terima invoice supplier <sup><b>(step 3)</b></sup></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeData'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                <div class="mb-3">
                    <p>Progress :</p>
                    {{-- <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$percentage_penagihan}}%"
                            aria-valuenow="{{$percentage_penagihan}}" aria-valuemin="0" aria-valuemax="100">
                            {{$percentage_penagihan}}%</div>
                    </div> --}}

                </div>
                <table class="table table-bordered table-hover bg-body-tertiary rounded shadow-sm "
                    style="color: black">
                    <tbody>
                        <tr>
                            <th class="col-3">No UP</th>
                            <td>{{ $no_up }}</td>
                        </tr>
                        <tr>
                            <th class="col-3">PIC</th>
                            <td style="text-transform: capitalize">{{ $pic }}</td>
                        </tr>
                    </tbody>
                </table>



                <hr style="border: .5px solid black;">
                <div class="container mt-5">

                    {{-- table --}}
                    <div class="table-responsive" wire:poll.keep-alive>
                        <table class="table  table-hover table-bordered" style="color: black; white-space: nowrap">
                            <thead class="table-primary">
                                <tr>
                                    <th class="">
                                        Supplier

                                    </th>
                                    <th>
                                        No PO

                                    </th>
                                    <th>
                                        No Invoice

                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @if($po->count() == 0)
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data.</td>
                                </tr>
                                @else
                                @foreach ($po as $p)
                                <tr>
                                    <td style="text-transform: capitalize">
                                        {{$p->supplier}}
                                    </td>
                                    <td>
                                        {{$p->no_po}}
                                    </td>
                                    <td>
                                        @if($p->no_invoice == 0)
                                        -
                                        @else
                                        {{$p->no_invoice}}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button wire:click='inputInvoice({{$p->id}})' type="button"
                                            class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="left"
                                            title="Tambah/Ubah No Invoice"><i class="fas fa-edit"></i></button>
                                    </td>

                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="noInvoiceModal" data-backdrop="static"
    style="background: rgba(0, 0, 0, .5)" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">No PO : {{ $no_po }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent='addInvoice'>

                <div class="modal-body" style="color: black">
                    <div class="mb-3">
                        <label for="no_invoice" class="form-label">No Invoice</label>
                        <input type="text" id="no_invoice" wire:model.live='no_invoice' class="form-control">
                        <div>
                            @error('no_invoice') <span class="text-danger"> {{ $message
                                }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary form-control">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="confirmModal" data-backdrop="static" style="background: rgba(0, 0, 0, .5)"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent='confirm'>

                <div class="modal-body text-center">
                    <h6>Data <b>Jumlah Item</b> atau <b>Jumlah EA</b> berbeda dari data lama!</h6>
                    <h6>Jika data berubah maka step 4 akan <b>terhapus.</b></h6>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger ">Iya! Hapus</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="showEditPOModal" data-backdrop="static"
    style="background: rgba(0, 0, 0, .5)" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah PO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent='ubahPOAction'>

                <div class="modal-body" style="color: black">
                    <div class="mb-3">
                        <label for="supplier_edit" class="form-label">Supplier</label>
                        <select class="form-control card-hover" wire:model.live='supplier_edit' id="supplier_edit">
                            <option></option>
                            @foreach($data_vendor as $dv)
                            <option id="{{$dv->id}}" value="{{$dv->name}}">{{$dv->name}}
                            </option>
                            @endforeach
                        </select>
                        <div>
                            @error('supplier_edit') <span class="text-danger"> {{ $message
                                }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="no_po_supplier_edit" class="form-label">No PO</label>
                        <input type="text" id="no_po_supplier_edit" wire:model.live='no_po_supplier_edit'
                            class="form-control card-hover">
                        <div>
                            @error('no_po_supplier_edit') <span class="text-danger"> {{ $message
                                }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_item_supplier_edit" class="form-label">Jumlah
                            Item</label>
                        <input type="text" id="jumlah_item_supplier_edit" wire:model.live='jumlah_item_supplier_edit'
                            class="form-control card-hover">
                        <div>
                            @error('jumlah_item_supplier_edit') <span class="text-danger"> {{
                                $message
                                }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_ea_supplier_edit" class="form-label">Jumlah EA</label>
                        <input type="text" id="jumlah_ea_supplier_edit" wire:model.live='jumlah_ea_supplier_edit'
                            class="form-control card-hover">
                        <div>
                            @error('jumlah_ea_supplier_edit') <span class="text-danger"> {{
                                $message
                                }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary form-control">Simpan</button>
                </div>
            </form>


        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="stepEmpatModal" data-backdrop="static" style="color: black"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Shipping Barang <sup><b>(step 4)</b></sup></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeData'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                <div class="mb-3">
                    <p>Progress :</p>
                    {{-- <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$percentage_penagihan}}%"
                            aria-valuenow="{{$percentage_penagihan}}" aria-valuemin="0" aria-valuemax="100">
                            {{$percentage_penagihan}}%</div>
                    </div> --}}

                </div>
                <table class="table table-bordered table-hover bg-body-tertiary rounded shadow-sm "
                    style="color: black">
                    <tbody>
                        <tr>
                            <th class="col-3">No UP</th>
                            <td>{{ $no_up }}</td>
                        </tr>
                        <tr>
                            <th class="col-3">PIC</th>
                            <td style="text-transform: capitalize">{{ $pic }}</td>
                        </tr>
                    </tbody>
                </table>



                <hr style="border: .5px solid black;">
                <table class="table table-bordered table-hover bg-body-tertiary rounded shadow-sm "
                    style="color: black">
                    <tbody>
                        <tr>
                            <th class="col-3">Jumalh Item</th>
                            <td>{{ $jumlah_item }}</td>
                        </tr>
                        <tr>
                            <th class="col-3">Jumlah EA</th>
                            <td style="text-transform: capitalize">{{ $jumlah_ea }}</td>
                        </tr>
                    </tbody>
                </table>



                <hr style="border: .5px solid black;">
                <div class="container mt-5">
                    <form wire:submit.prevent='stepEmpat'>

                        <div class="row">

                            <div class="col-12 col-lg-6 mb-3">
                                <div class="card shadow-sm">
                                    <div class="card-header">
                                        Production
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="ready_stock_item" class="form-label">Item</label>
                                                <input type="number" class="form-control card-hover"
                                                    id="ready_stock_item" wire:model.live='jumlah_item_production'>
                                                <div>
                                                    @error('jumlah_item_production')
                                                    <span style="font-size: 12px" class="text-danger">
                                                        {{$message}}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="jumlah_ea_production" class="form-label">EA</label>
                                                <input type="number" id="jumlah_ea_production"
                                                    class="form-control card-hover"
                                                    wire:model.live='jumlah_ea_production'>
                                                <div>
                                                    @error('jumlah_ea_production')
                                                    <span style="font-size: 12px" class="text-danger">
                                                        {{$message}}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12">
                                                <label for="etd_production" class="form-label">ETD</label>
                                                <input type="date" class="form-control card-hover"
                                                    wire:model.live='etd_production'>
                                                <div>
                                                    @error('etd_production')
                                                    <span style="font-size: 12px" class="text-danger">
                                                        {{$message}}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <div class="card shadow-sm">
                                    <div class="card-header">
                                        Ready Stock
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-lg-12 mb-3">
                                                <label for="jumlah_item_ready_stock" class="form-label">Item</label>
                                                <input type="number" id="jumlah_item_ready_stock"
                                                    class="form-control card-hover"
                                                    wire:model.live='jumlah_item_ready_stock'>
                                                <div>
                                                    @error('jumlah_item_ready_stock')
                                                    <span style="font-size: 12px" class="text-danger">
                                                        {{$message}}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12">
                                                <label for="jumlah_ea_ready_stock" class="form-label">EA</label>
                                                <input type="number" id="jumlah_ea_ready_stock"
                                                    class="form-control card-hover"
                                                    wire:model.live='jumlah_ea_ready_stock'>
                                                <div>
                                                    @error('jumlah_ea_ready_stock')
                                                    <span style="font-size: 12px" class="text-danger">
                                                        {{$message}}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr style="border: .5px solid black;">

                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <div class="card shadow-sm">
                                    <div class="card-header">
                                        Delivery
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="jumlah_item_delivery" class="form-label">Item</label>
                                                <input id="jumlah_item_delivery" type="number"
                                                    class="form-control card-hover"
                                                    wire:model.live='jumlah_item_delivery'>
                                                <div>
                                                    @error('jumlah_item_delivery')
                                                    <span style="font-size: 12px" class="text-danger">
                                                        {{$message}}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="jumlah_ea_delivery" class="form-label">EA</label>
                                                <input type="number" id="jumlah_ea_delivery"
                                                    class="form-control card-hover"
                                                    wire:model.live='jumlah_ea_delivery'>
                                                <div>
                                                    @error('jumlah_ea_delivery')
                                                    <span style="font-size: 12px" class="text-danger">
                                                        {{$message}}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12">
                                                <label for="production_etd" class="form-label">ETD</label>
                                                <input type="date" class="form-control card-hover"
                                                    wire:model.live='etd_delivery'>
                                                <div>
                                                    @error('etd_delivery')
                                                    <span style="font-size: 12px" class="text-danger">
                                                        {{$message}}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 mb-3">
                                <div class="card shadow-sm">
                                    <div class="card-header">
                                        Received
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-lg-12 mb-3">
                                                <label for="jumlah_item_received" class="form-label">Item</label>
                                                <input type="number" id="jumlah_item_received"
                                                    class="form-control card-hover"
                                                    wire:model.live='jumlah_item_received'>
                                                <div>
                                                    @error('jumlah_item_received')
                                                    <span style="font-size: 12px" class="text-danger">
                                                        {{$message}}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12">
                                                <label for="jumlah_ea_received" class="form-label">EA</label>
                                                <input type="number" id="jumlah_ea_received"
                                                    class="form-control card-hover"
                                                    wire:model.live='jumlah_ea_received'>
                                                <div>
                                                    @error('jumlah_ea_received')
                                                    <span style="font-size: 12px" class="text-danger">
                                                        {{$message}}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-primary form-control">Simpan</button>
            </div>
            </form>

        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="showDetailModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" style="color: black">
                <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                <div class="mb-3">
                    <p>Progress :</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$percentage_marcendiser}}%"
                            aria-valuenow="{{$percentage_marcendiser}}" aria-valuemin="0" aria-valuemax="100">
                            {{$percentage_marcendiser}}%</div>
                    </div>

                </div>
                <table class="table table-bordered table-hover bg-body-tertiary rounded shadow-sm "
                    style="color: black">
                    <tbody>
                        <tr>
                            <th class="col-3">No UP</th>
                            <td>{{ $no_up }}</td>
                        </tr>
                        <tr>
                            <th class="col-3">PIC</th>
                            <td style="text-transform: capitalize">{{ $pic }}</td>
                        </tr>
                        <tr>
                            <th class="col-3">Jenis Anggaran</th>
                            <td style="text-transform: capitalize">{{ $jenis_anggaran }}</td>
                        </tr>
                        <tr>
                            <th class="col-3">Tahun Anggaran</th>
                            <td style="text-transform: capitalize">{{ $tahun_anggaran }}</td>
                        </tr>
                        <tr>
                            <th class="col-3">
                                No Kontrak</th>
                            <td style="text-transform: capitalize">{{ $no_kontrak }}</td>
                        </tr>
                    </tbody>
                </table>



                <hr style="border: .5px solid black;">
                <h5 class="" style="color: black"><b>Step 1</b> </h5>
                <table class="table table-bordered table-hover bg-body-tertiary rounded shadow-sm "
                    style="color: black">
                    <tbody>
                        <tr>
                            <th class="col-3">Jumlah Item</th>
                            <td>{{ $jumlah_item }}</td>
                        </tr>
                        <tr>
                            <th class="col-3">Jumlah EA</th>
                            <td style="text-transform: capitalize">{{ $jumlah_ea }}</td>
                        </tr>
                    </tbody>
                </table>
                <hr style="border: .5px solid black;">
                <h5 class="" style="color: black"><b>Step 2</b> </h5>
                <div class="table-responsive" wire:poll.keep-alive>
                    <table class="table  table-hover table-bordered shadow-sm"
                        style="color: black; white-space: nowrap;">
                        <thead class="table-primary">
                            <tr>
                                <th class="">
                                    Supplier

                                </th>
                                <th>
                                    No PO

                                </th>
                                <th>
                                    Jumlah Item

                                </th>
                                <th class="text-center">
                                    Jumlah EA

                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @if($po->count() == 0)
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data.</td>
                            </tr>
                            @else
                            @foreach ($po as $p)
                            <tr>
                                <td style="text-transform: capitalize">
                                    {{$p->supplier}}
                                </td>
                                <td>
                                    {{$p->no_po}}
                                </td>
                                <td>
                                    {{$p->jumlah_item}}
                                </td>
                                <td>
                                    {{$p->jumlah_ea}}
                                </td>

                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" class="text-center"><b>Total</b></td>
                                <td><b>{{$po->sum('jumlah_item')}}</b> </td>
                                <td cla><b>{{$po->sum('jumlah_ea')}}</b> </td>
                            </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
                <hr style="border: .5px solid black;">
                <h5 class="" style="color: black"><b>Step 3</b> </h5>
                <div class="table-responsive" wire:poll.keep-alive>
                    <table class="table  table-hover table-bordered shadow-sm"
                        style="color: black; white-space: nowrap;">
                        <thead class="table-primary">
                            <tr>
                                <th class="">
                                    Supplier

                                </th>
                                <th>
                                    No Invoice

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($po->count() == 0)
                            <tr>
                                <td colspan="2" class="text-center">Tidak ada data.</td>
                            </tr>
                            @else
                            @foreach ($po as $p)
                            <tr>
                                <td style="text-transform: capitalize">
                                    {{$p->supplier}}
                                </td>
                                <td>
                                    {{$p->no_invoice}}
                                </td>

                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>

                <hr style="border: .5px solid black;">
                <h5 class="" style="color: black"><b>Step 4</b> </h5>
                <div class="row">

                    <div class="col-12 col-lg-6 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                Production
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label for="ready_stock_item" class="form-label">Item</label>
                                        <input type="number" disabled class="form-control card-hover"
                                            id="ready_stock_item" wire:model.live='jumlah_item_production'>

                                    </div>
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label for="jumlah_ea_production" class="form-label">EA</label>
                                        <input type="number" disabled id="jumlah_ea_production"
                                            class="form-control card-hover" wire:model.live='jumlah_ea_production'>

                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <label for="etd_production" class="form-label">ETD</label>
                                        <input type="date" disabled class="form-control card-hover"
                                            wire:model.live='etd_production'>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                Ready Stock
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-12 mb-3">
                                        <label for="jumlah_item_ready_stock" class="form-label">Item</label>
                                        <input type="number" disabled id="jumlah_item_ready_stock"
                                            class="form-control card-hover" wire:model.live='jumlah_item_ready_stock'>

                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <label for="jumlah_ea_ready_stock" class="form-label">EA</label>
                                        <input type="number" disabled id="jumlah_ea_ready_stock"
                                            class="form-control card-hover" wire:model.live='jumlah_ea_ready_stock'>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                Delivery
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label for="jumlah_item_delivery" class="form-label">Item</label>
                                        <input id="jumlah_item_delivery" disabled type="number"
                                            class="form-control card-hover" wire:model.live='jumlah_item_delivery'>

                                    </div>
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label for="jumlah_ea_delivery" class="form-label">EA</label>
                                        <input type="number" id="jumlah_ea_delivery" class="form-control card-hover"
                                            wire:model.live='jumlah_ea_delivery' disabled>

                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <label for="production_etd" class="form-label">ETD</label>
                                        <input type="date" disabled class="form-control card-hover"
                                            wire:model.live='etd_delivery'>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                Received
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-12 mb-3">
                                        <label for="jumlah_item_received" class="form-label">Item</label>
                                        <input type="number" disabled id="jumlah_item_received"
                                            class="form-control card-hover" wire:model.live='jumlah_item_received'>

                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <label for="jumlah_ea_received" class="form-label">EA</label>
                                        <input type="number" disabled id="jumlah_ea_received"
                                            class="form-control card-hover" wire:model.live='jumlah_ea_received'>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@push('marcendiser')
<script>
    window.addEventListener('show-step-satu-modal', event =>{
            $('#stepSatuModal').modal('show');
        });
    window.addEventListener('hide-step-satu-modal', event =>{
            $('#stepSatuModal').modal('hide');
        });
    window.addEventListener('show-step-dua-modal', event =>{
            $('#stepDuaModal').modal('show');
        });
    window.addEventListener('show-step-tiga-modal', event =>{
            $('#stepTigaModal').modal('show');
        });
    window.addEventListener('show-no-invoice-modal', event =>{
            $('#noInvoiceModal').modal('show');
        });
    window.addEventListener('hide-no-invoice-modal', event =>{
            $('#noInvoiceModal').modal('hide');
        });
    window.addEventListener('show-step-empat-modal', event =>{
        $('#stepEmpatModal').modal('show');
    });
    window.addEventListener('hide-step-empat-modal', event =>{
        $('#stepEmpatModal').modal('hide');
    });
    window.addEventListener('show-detail', event =>{
        $('#showDetailModal').modal('show');
    });
    window.addEventListener('show-edit-po-modal', event =>{
        $('#showEditPOModal').modal('show');
    });
    window.addEventListener('show-confirm-modal', event =>{
        $('#confirmModal').modal('show');
    });
    window.addEventListener('close-edit-po-modal', event =>{
        $('#showEditPOModal').modal('hide');
    });
    window.addEventListener('hide-confrim-modal', event =>{
        $('#confirmModal').modal('hide');
        $('#stepSatuModal').modal('hide');
    });

    document.addEventListener('livewire:initialized', () =>{
        @this.on('stepSatu',(event) => {
            const data=event
            swal.fire({
                toast: true,
                position: "top-end",
                icon:data[0]['icon'],
                title:data[0]['title'],
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
            })
    });
    document.addEventListener('livewire:initialized', () =>{
        @this.on('addPO',(event) => {
            const data=event
            swal.fire({
                toast: true,
                position: "top-end",
                icon:data[0]['icon'],
                title:data[0]['title'],
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
            })
    });
    document.addEventListener('livewire:initialized', () =>{
        @this.on('hapusPO',(event) => {
            const data=event
            swal.fire({
                toast: true,
                position: "top-end",
                icon:data[0]['icon'],
                title:data[0]['title'],
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
            })
    });
    document.addEventListener('livewire:initialized', () =>{
        @this.on('addInvoice',(event) => {
            const data=event
            swal.fire({
                toast: true,
                position: "top-end",
                icon:data[0]['icon'],
                title:data[0]['title'],
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
            })
    });
    document.addEventListener('livewire:initialized', () =>{
        @this.on('stepEmpat',(event) => {
            const data=event
            swal.fire({
                toast: true,
                position: "top-end",
                icon:data[0]['icon'],
                title:data[0]['title'],
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
            })
    });
    document.addEventListener('livewire:initialized', () =>{
        @this.on('ubahPO',(event) => {
            const data=event
            swal.fire({
                toast: true,
                position: "top-end",
                icon:data[0]['icon'],
                title:data[0]['title'],
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
            })
    });
    document.addEventListener('livewire:initialized', () =>{
        @this.on('confirm',(event) => {
            const data=event
            swal.fire({
                toast: true,
                position: "top-end",
                icon:data[0]['icon'],
                title:data[0]['title'],
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
            })
    });
</script>
@endpush