@push('styleModal')
<style>
    ul.timeline {
        list-style-type: none;
        position: relative;
    }

    ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 400;
    }

    ul.timeline>li {
        margin: 20px 0;
        padding-left: 20px;
    }

    ul.timeline>li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #22c0e8;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
@endpush

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Project Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeVendor'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='preview'>
                    <div class="container">
                        <div class="form-outline mb-3">
                            <label class="form-label" for="nama_pengadaan">Nama Pengadaan<span
                                    class="text-danger">*</span></label>
                            <input type="text" id="nama_pengadaan"
                                class="form-control card-hover @error('nama_pengadaan') is-invalid @enderror"
                                wire:model.live='nama_pengadaan'>
                            <div>@error('nama_pengadaan') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="jenis_lelang">Jenis Lelang<span class="text-danger">*</span></label>
                                <select class="form-control card-hover @error('jenis_lelang') is-invalid @enderror"
                                    id="jenis_lelang" wire:model.live='jenis_lelang'>
                                    <option></option>
                                    <option value="Penunjukan Langsung">Penunjukan Langsung</option>
                                    <option value="Lelang Tertutup">Lelang Tertutup</option>
                                    <option value="e-Katalog">e-Katalog</option>
                                    <option value="LPSE">LPSE</option>
                                </select>
                                <div>@error('jenis_lelang') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label" for="no_up">No UP<span class="text-danger">*</span></label>
                            <input type="text" id="no_up"
                                class="form-control card-hover @error('no_up') is-invalid @enderror"
                                wire:model.live='no_up'>
                            <div>@error('no_up') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                        </div>
                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="nama_pt">Nama PT<span class="text-danger">*</span></label>
                                <select class="form-control  card-hover @error('nama_pt') is-invalid @enderror"
                                    id="nama_pt" wire:model.live='nama_pt'>
                                    <option></option>
                                    @foreach ($daftaPt as $dp)
                                    <option value="{{ $dp->id }}">{{ $dp->name }}</option>
                                    @endforeach
                                </select>
                                <div>@error('nama_pt') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="instansi">Instansi<span class="text-danger">*</span></label>
                                <select class="form-control card-hover @error('instansi') is-invalid @enderror"
                                    id="instansi" wire:model.live='instansi'>
                                    <option></option>
                                    @foreach ($daftarInstansi as $di)
                                    <option value="{{ $di->id }}">{{ $di->name }}</option>
                                    @endforeach
                                </select>
                                <div>@error('instansi') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="jenis_anggaran">Jenis Anggaran<span class="text-danger">*</span></label>
                                <select class="form-control card-hover @error('jenis_anggaran') is-invalid @enderror"
                                    id="jenis_anggaran" wire:model.live='jenis_anggaran'>
                                    <option></option>
                                    <option>Rutin</option>
                                    <option>Optimalisasi</option>
                                    <option>APBN-P</option>
                                    <option>APBN-KM</option>
                                    <option>Prioritas</option>
                                    <option>Automatic Adjustment</option>
                                    <option>Capim</option>
                                    <option>PLN</option>
                                    <option>PDN</option>
                                </select>
                                <div>@error('jenis_anggaran') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label" for="tahun_anggaran">Tahun Anggaran<span
                                    class="text-danger">*</span></label>
                            <input type="text" id="tahun_anggaran"
                                class="form-control card-hover @error('tahun_anggaran') is-invalid @enderror"
                                wire:model.live='tahun_anggaran'>
                            <div>@error('tahun_anggaran') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="pic">PIC<span class="text-danger">*</span></label>
                                <select class="form-control card-hover @error('pic') is-invalid @enderror" id="pic"
                                    wire:model.live='pic'>
                                    <option></option>
                                    @foreach ($users as $u)
                                    <option style="text-transform: capitalize" value="{{$u->id}}">{{$u->nama}}</option>
                                    @endforeach
                                </select>

                                <div>@error('pic') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                            </div>
                        </div>
                        <div class="form-outline mb-3">

                            <div class="form-group" wire:ignore>
                                <label for="taskSelect" class="form-label">Vendor<span
                                        class="text-danger">*</span></label>
                                <select class="form-select card-hover  @error('selectedVendor') is-invalid @enderror"
                                    id="taskSelect" wire:model.live='selectedVendor' multiple="multiple"
                                    style="width: 400px;">
                                    @foreach($data_vendor as $dv)
                                    <option id="{{$dv->id}}" value="{{$dv->id}}">{{$dv->name}}</option>
                                    @endforeach
                                </select>

                                <div>@error('selectedVendor') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>


                            </div>
                            {{-- <div class="my-3">
                                Selected Vendor :
                                @forelse($selectedVendor as $vendor)
                                {{$vendor}},
                                @empty
                                None
                                @endforelse
                            </div> --}}


                        </div>




                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="desc">Deskripsi</label>
                                <input type="text" id="desc" wire:model.live='desc' class="form-control card-hover">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="form-control btn btn-secondary"><i class="bi bi-eye"></i> Preview</button>
            </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal -->


<div wire:ignore.self class="modal fade" id="simpan" style="background: rgba(0,0,0,.5);" data-backdrop="static"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="color: black">Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='storeProject'>
                    <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                    <hr>
                    <table class="table table-bordered table-striped table-hover bg-body-tertiary rounded shadow-sm "
                        style="color: black">
                        <tbody>
                            <tr>
                                <th class="col-3">Jenis Lelalng</th>
                                <td>{{ $jenis_lelang }}</td>
                            </tr>
                            <tr>
                                <th class="col-3">No UP</th>
                                <td>{{ $no_up }}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Nama PT</th>
                                <td>
                                    @foreach ($daftaPt as $d)
                                    @if($nama_pt == $d->id)
                                    {{ $d->name }}
                                    @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3">Instansi</th>
                                <td>
                                    @foreach ($daftarInstansi as $di)
                                    @if($instansi == $di->id)
                                    {{ $di->name }}
                                    @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3">PIC</th>
                                <td style="text-transform: capitalize">
                                    @foreach ($users as $u)
                                    @if($u->id == $pic)
                                    <span class="badge badge-dark">{{$u->nama}}</span>
                                    @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3">Jenis Anggaran</th>
                                <td>{{ $jenis_anggaran }}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Tahun Anggaran</th>
                                <td>{{ $tahun_anggaran }}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Vendor</th>
                                <td>
                                    @foreach ($daftarVendor as $dv)
                                    @forelse($selectedVendor as $vendor)
                                    @if ($dv->id == $vendor)
                                    <span class="badge badge-primary">{{$dv->name}}</span>

                                    @endif
                                    @endforeach
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3">Deskripsi</th>
                                <td>
                                    @if($desc == '')
                                    -
                                    @else
                                    {{ $desc }}
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-pencil-square"></i>
                    Ubah Data</button>
                <button type="submit" class="btn btn-primary"><i class="bi bi-archive"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="stepSatu" style="background: rgba(0,0,0,.5);" data-backdrop="static"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="color: black">Detail Step 1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='storeProject'>
                    <h5 class="text-center" style="color: black"><b>{{ $stepSatu_nama_pengadaan }}</b> </h5>

                    <table class="table table-bordered  table-hover bg-body-tertiary rounded shadow-sm "
                        style="color: black">
                        <tbody>
                            <tr>
                                <th class="col-3">Jenis Lelang</th>
                                <td>{{ $jenis_lelang }}</td>
                            </tr>
                            <tr>
                                <th class="col-3">No UP</th>
                                <td>{{ $stepSatu_no_up }}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Nama PT</th>
                                <td>
                                    {{ $stepSatu_nama_pt }}
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3">Instansi</th>
                                <td>
                                    {{ $stepSatu_instansi }}
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3">PIC</th>
                                <td style="text-transform: capitalize">
                                    <span class="badge badge-dark">{{$stepSatu_pic}}</span>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3">Jenis Anggaran</th>
                                <td>{{ $stepSatu_jenis_anggaran }}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Tahun Anggaran</th>
                                <td>{{ $stepSatu_tahun_pengadaan }}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Vendor</th>
                                <td>
                                    @foreach ($data_vendor_admin as $item)
                                    <span class="badge badge-primary">{{$item->name}}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3">Deskripsi</th>
                                <td>
                                    @if($stepSatu_desc == '')
                                    -
                                    @else
                                    {{ $stepSatu_desc }}
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <span class="float-right ">Di input pada : {{
                        Carbon\Carbon::parse($stepSatu_tgl_input)->isoFormat('DD, MMMM YYYY')}}</span>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary form-control" data-dismiss="modal">Kembali</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- modal view project --}}
<div wire:ignore.self class="modal fade" id="viewProjectModal" data-backdrop="static" style="color: black"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    wire:click='closeViewDetail'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div wire:poll.keep-alive class="modal-body" style="color: black">
                <h5 class="text-center" style="color: black"><b>{{ $stepSatu_nama_pengadaan }}</b> </h5>
                <div class="mb-3">
                    <p>Progress :</p>
                    <div class="progress">
                        <div class="progress-bar   @if($stepSatu_percentage == 100) bg-success @else progress-bar-striped progress-bar-animated @endif"
                            role="progressbar" style="width: {{$stepSatu_percentage}}%"
                            aria-valuenow="{{$stepSatu_percentage}}" aria-valuemin="0" aria-valuemax="100">
                            @if($stepSatu_percentage == 100) complate! @else
                            {{$stepSatu_percentage}}% @endif
                        </div>
                    </div>

                </div>
                <table class="table table-bordered table-hover bg-body-tertiary rounded shadow-sm "
                    style="color: black">
                    <tbody>
                        <tr>
                            <th class="col-3">Jenis Lelang</th>
                            <td>
                                {{ $jenis_lelang }}
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3">No UP</th>
                            <td>{{ $stepSatu_no_up }}</td>
                        </tr>
                        <tr>
                            <th class="col-3">Nama PT</th>
                            <td>
                                {{ $stepSatu_nama_pt }}
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3">Instansi</th>
                            <td>
                                {{ $stepSatu_instansi }}
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3">PIC</th>
                            <td style="text-transform: capitalize">
                                <span class="badge badge-dark">{{$stepSatu_pic}}</span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3">Jenis Anggaran</th>
                            <td>{{ $stepSatu_jenis_anggaran }}</td>
                        </tr>
                        <tr>
                            <th class="col-3">Tahun Anggaran</th>
                            <td>{{ $stepSatu_tahun_pengadaan }}</td>
                        </tr>
                        <tr>
                            <th class="col-3">Vendor</th>
                            <td>

                                @foreach ($data_vendor_admin as $item)
                                <span class="badge badge-primary">{{$item->name}}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3">Deskripsi</th>
                            <td>
                                @if($stepSatu_desc == '')
                                -
                                @else
                                {{ $stepSatu_desc }}
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>

                @if($step_dua > 0)
                <hr style="border: .5px solid black;">
                <table class="table table-bordered table-hover bg-body-tertiary rounded shadow-sm "
                    style="color: black">
                    <tbody>
                        <tr>
                            <th class="col-3">Bebas Pajak</th>
                            <td> @if($stepDua_bebas_pajak == 'yes') {{ $stepDua_bebas_pajak }},
                                {{ $stepDua_pajak }} @else {{ $stepDua_bebas_pajak
                                }} @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3">Asal Brand</th>
                            <td> @if($stepDua_asal_brand == 'import') {{ $stepDua_asal_brand }}, {{ $stepDua_brand }}
                                @else {{ $stepDua_asal_brand
                                }} @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3">Sertifikat Produk</th>
                            <td>
                                @foreach ($data_sertifikat_admin as $item)
                                <span class="badge badge-primary">{{$item->name}}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3">Warranty</th>
                            <td>
                                @if($stepDua_waranty == 'yes'){{ $stepDua_waranty }}, {{
                                $stepDua_garansi }} hari @else {{ $stepDua_waranty }} @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3">Payment Term</th>
                            <td style="text-transform: capitalize">@if( $stepDua_payment == 'no' ){{ $stepDua_payment }}
                                DP @elseif(
                                $stepDua_payment == 'dp' ) {{ $stepDua_payment
                                }}, {{ $stepDua_dp_payment }}% @elseif( $stepDua_payment == 'termin' ) {{
                                $stepDua_payment }}, {{$stepDua_termin}}
                                kali
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                @endif
                @if($step_tiga > 0)

                <hr style="border: .5px solid black;">

                <table class="table table-bordered table-hover bg-body-tertiary rounded shadow-sm "
                    style="color: black">
                    <tbody>
                        <tr>
                            <th class="col-3">No Kontrak</th>
                            <td>
                                {{$no_kontrak}}
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3">Nilai Kontrak</th>
                            <td>
                                {{$nilai_kontrak}}
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3">Tanggal Kontrak</th>
                            <td>
                                {{$display_tgl_kontrak}}
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3">Jatuh Tempo</th>
                            <td>
                                {{$display_jatuh_tempo}}
                            </td>
                        </tr>
                        @if($stepDua_payment == 'dp')
                        <tr>
                            <th class="col-3">Nili DP</th>
                            <td>
                                {{$nilai_dp}} (20%)
                            </td>
                        </tr>
                        @elseif($stepDua_payment == 'termin')
                        @foreach ($dataTermin as $dt)
                        @if ($dt->id_project == $id_project)
                        <tr>
                            <th class="col-3">Nilai {{ $dt->name }}</th>
                            <td>
                                Rp {{number_format($dt->value, 0,',','.')}}
                            </td>

                        </tr>

                        @endif

                        @endforeach
                        @endif
                    </tbody>
                </table>



                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <h4><b>Timeline</b></h4>
                            <hr style="border: .5px solid black;">
                            <ul class="timeline">
                                <li>
                                    <a target="_blank" href="https://www.totoprayogo.com/#">Kontrak</a>
                                    <div class="progress mb-2">
                                        <div class="progress-bar   @if($percentage_kontrak == 100) bg-success @else progress-bar-striped progress-bar-animated @endif"
                                            role="progressbar" style="width: {{$percentage_kontrak}}%"
                                            aria-valuenow="{{$percentage_kontrak}}" aria-valuemin="0"
                                            aria-valuemax="100">
                                            @if($percentage_kontrak == 100) complate! @else
                                            {{$percentage_kontrak}}% @endif
                                        </div>
                                    </div>
                                    <ul class="timeline">
                                        <li>
                                            Usul Pesananan
                                            @if($usul_pesanan == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            Sprinada
                                            @if($sprinada == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            Prakualifikasi
                                            @if($prakualifikasi == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            SPH
                                            @if($sph == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            SPPBJ
                                            @if($sppbj == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            No Kontrak
                                            @if($no_kontrak_kontrak == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Marcendiser</a>
                                    <div class="progress">
                                        <div class="progress-bar   @if($percentage_marcendiser == 100) bg-success @else progress-bar-striped progress-bar-animated @endif"
                                            role="progressbar" style="width: {{$percentage_marcendiser}}%"
                                            aria-valuenow="{{$percentage_marcendiser}}" aria-valuemin="0"
                                            aria-valuemax="100">
                                            @if($percentage_marcendiser == 100) complate! @else
                                            {{$percentage_marcendiser}}% @endif
                                        </div>
                                    </div>
                                    <ul class="timeline">
                                        <li>
                                            <span style="cursor: pointer" data-toggle="collapse"
                                                data-target="#collapseExample" aria-expanded="false"
                                                aria-controls="collapseExample">Barang Terisi</span>
                                            @if($percentage_marcendiser == 100)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                            <ul wire:ignore.self class="collapse" id="collapseExample">
                                                <li style="font-size: 14px">Total barang terisi
                                                    <b>{{$jumlah_ea_received}}</b> dari <b>{{$jumlah_ea}}</b> barang

                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Pengiriman</a>
                                    <div class="progress">
                                        <div class="progress-bar   @if($percentage_pengiriman == 100) bg-success @else progress-bar-striped progress-bar-animated @endif"
                                            role="progressbar" style="width: {{$percentage_pengiriman}}%"
                                            aria-valuenow="{{$percentage_pengiriman}}" aria-valuemin="0"
                                            aria-valuemax="100">
                                            @if($percentage_pengiriman == 100) complate! @else
                                            {{$percentage_pengiriman}}% @endif
                                        </div>
                                    </div>
                                    <ul class="timeline">
                                        <li>
                                            BA Anname
                                            @if($baanname > 0)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            BA Inname
                                            @if($bainname > 0)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            BAST
                                            @if($bast != NULL)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Penagihan</a>
                                    <div class="progress">
                                        <div class="progress-bar   @if($percentage_penagihan == 100) bg-success @else progress-bar-striped progress-bar-animated @endif"
                                            role="progressbar" style="width: {{$percentage_penagihan}}%"
                                            aria-valuenow="{{$percentage_penagihan}}" aria-valuemin="0"
                                            aria-valuemax="100">
                                            @if($percentage_penagihan == 100) complate! @else
                                            {{$percentage_penagihan}}% @endif
                                        </div>
                                    </div>
                                    <ul class="timeline">
                                        <li>
                                            SIMB
                                            @if($simb_display == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            SPPM
                                            @if($sppm_display == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            Surat Pengantar Barang (PT)
                                            @if($surat_pengantar_barang_pt_display == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            Packing List (PT)
                                            @if($packing_list_pt_display == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            Invoice
                                            @if($invoice_display == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            Packing List
                                            @if($packing_list_display == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            AWB/BL
                                            @if($awb_bl_display == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            Kontrak
                                            @if($kontrak_display == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            Amademen Kontrak
                                            @if($amademen_kontrak_display == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            Surat Pernyataan Barang
                                            @if($surat_pernyataan_barang_display == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            @if($stepDua_payment == 'dp')
                            <hr style="border: .5px solid black;">
                            @foreach ($dataDP as $d)
                            {{-- {{$d}} --}}
                            <ul class="timeline offset-md-2" style="">
                                <li>
                                    <a href="#">Penagihan DP</a>
                                    <div class="progress">
                                        <div class="progress-bar   @if($d->percentage == 100) bg-success @else progress-bar-striped progress-bar-animated @endif"
                                            role="progressbar" style="width: {{$d->percentage}}%"
                                            aria-valuenow="{{$d->percentage}}" aria-valuemin="0" aria-valuemax="100">
                                            @if($d->percentage == 100) complate! @else
                                            {{$d->percentage}}% @endif
                                        </div>
                                    </div>
                                    <ul class="timeline">
                                        <li>
                                            Surat Permohonan
                                            @if($d->surat_permohonan == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            SPPM
                                            @if($sppm_display == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            Kwitansi Pembayaran
                                            @if($d->kwitansi_pembayaran == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            BAP
                                            @if($d->bap == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            Invoice
                                            @if($invoice_display == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            SSP/PPN/PPH
                                            @if($d->ssp_ppn_pph == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            e-Faktur
                                            @if($d->efaktur == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            Kontrak
                                            @if($d->kontrak == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            Jamuk
                                            @if($d->jamuk == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            SPPBJ
                                            @if($d->sppbj == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            @endforeach
                            @elseif($stepDua_payment == 'termin')
                            <hr style="border: .5px solid black;">
                            @foreach ($terminData as $td)
                            {{-- {{$d}} --}}
                            <ul class="timeline offset-md-2" style="">
                                <li>
                                    <a href="#">Penagihan {{$td->name}}</a>
                                    <div class="progress">
                                        <div class="progress-bar   @if($td->percentage == 100) bg-success @else progress-bar-striped progress-bar-animated @endif"
                                            role="progressbar" style="width: {{$td->percentage}}%"
                                            aria-valuenow="{{$td->percentage}}" aria-valuemin="0" aria-valuemax="100">
                                            @if($td->percentage == 100) complate! @else
                                            {{$td->percentage}}% @endif
                                        </div>
                                    </div>
                                    <ul class="timeline">
                                        <li>
                                            Surat Permohonan
                                            @if($td->surat_permohonan == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            SPPM
                                            @if($sppm_display == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            Kwitansi Pembayaran
                                            @if($td->kwitansi_pembayaran == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            BAP
                                            @if($td->bap == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            Invoice
                                            @if($invoice_display == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            SSP/PPN/PPH
                                            @if($td->ssp_ppn_pph == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            e-Faktur
                                            @if($td->efaktur == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            Kontrak
                                            @if($td->kontrak == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            SPPBJ
                                            @if($td->sppbj == 1)
                                            <p class="float-right">
                                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                                            </p>
                                            @else
                                            <p class="float-right">
                                                <i class="fas fa-times" style="color: #ce1717;"></i>
                                            </p>
                                            @endif
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            </div>



            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary form-control" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div wire:ignore.self class="modal fade shadow" style="background: rgba(0, 0, 0, .5)" id="confirm"
    data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="color: black">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="text-center" style="color: black">Apakah data yang anda inputkan sudah benar?</h6>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <form wire:submit.prevent='saveProject'>
                    <button type="submit" class="btn btn-primary">Ya! Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="confirmDelete" data-backdrop="static" style="color: black"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Delete Confirm</h5>
            </div>
            <div class="modal-body text-center">
                <h6>Apakah anda yakin ingin menghapus project <br> <b> {{ $nama_pengadaan }}?</b></h6>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    wire:click='closeConfirm()'>Batal</button>
                <button type="button" class="btn btn-danger " wire:click='destroyProject()'>Iya! Hapus</button>
            </div>
        </div>
    </div>
</div>

{{-- step satu --}}
<div wire:ignore.self class="modal fade" id="ubahStepSatu" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    wire:click='closeEditStepSatu()'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='updateStepSatu'>
                    <div class="container">
                        <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                        <hr style="border: .5px solid black;">
                        <div class="card-hover">
                            <table class="table table-bordered  bg-body-tertiary rounded shadow-sm "
                                style="color: black">
                                <tbody>
                                    <tr>
                                        <th class="col-3">No UP</th>
                                        <td>{{ $no_up }}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>


                        <hr style="border: .5px solid black;">

                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="jenis_lelang">Jenis Lelang<span class="text-danger">*</span></label>
                                <select class="form-control card-hover @error('jenis_lelang') is-invalid @enderror"
                                    id="jenis_lelang" wire:model.live='jenis_lelang'>
                                    <option></option>
                                    <option value="Penunjukan Langsung">Penunjukan Langsung</option>
                                    <option value="Lelang Tertutup">Lelang Tertutup</option>
                                    <option value="e-Katalog">e-Katalog</option>
                                    <option value="LPSE">LPSE</option>
                                </select>
                                <div>@error('jenis_lelang') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_pt">Nama PT<span class="text-danger">*</span></label>
                                <select class="form-control card-hover @error('nama_pt') is-invalid @enderror"
                                    id="nama_pt" wire:model.live='nama_pt'>
                                    <option></option>
                                    @foreach ($daftaPt as $dp)
                                    <option value="{{ $dp->id }}">{{ $dp->name }}</option>
                                    @endforeach
                                </select>
                                <div>@error('nama_pt') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="instansi">Instansi<span class="text-danger">*</span></label>
                                <select class="form-control card-hover @error('instansi') is-invalid @enderror"
                                    id="instansi" wire:model.live='instansi'>
                                    <option></option>
                                    @foreach ($daftarInstansi as $di)
                                    <option value="{{ $di->id }}">{{ $di->name }}</option>
                                    @endforeach
                                </select>
                                <div>@error('instansi') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="jenis_anggaran">Jenis Anggaran<span class="text-danger">*</span></label>
                                <select class="form-control card-hover @error('jenis_anggaran') is-invalid @enderror"
                                    id="jenis_anggaran" wire:model.live='jenis_anggaran'>
                                    <option></option>
                                    <option>Rutin</option>
                                    <option>Optimalisasi</option>
                                    <option>APBN-P</option>
                                    <option>APBN-KM</option>
                                    <option>Prioritas</option>
                                    <option>Automatic Adjustment</option>
                                    <option>Capim</option>
                                    <option>PLN</option>
                                    <option>PDN</option>
                                </select>
                                <div>@error('jenis_anggaran') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label" for="tahun_anggaran">Tahun Anggaran<span
                                    class="text-danger">*</span></label>
                            <input type="text" id="tahun_anggaran"
                                class="form-control card-hover @error('tahun_anggaran') is-invalid @enderror"
                                wire:model.live='tahun_anggaran'>
                            <div>@error('tahun_anggaran') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="pic">PIC<span class="text-danger">*</span></label>
                                <select class="form-control card-hover @error('pic') is-invalid @enderror" id="pic"
                                    wire:model.live='pic'>
                                    <option></option>
                                    @foreach ($users as $u)
                                    <option style="text-transform: capitalize" value="{{$u->id}}">{{$u->nama}}</option>
                                    @endforeach
                                </select>
                                <div>@error('pic') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                            </div>
                        </div>

                        <div class="form-outline mb-3">


                            <div class="form-group">
                                <div class=" d-flex justify-content-between">
                                    <label for="taskSelectUpdated" class="form-label">Vendor <span
                                            class="text-danger">*</span></label>
                                    <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#ubahVendor"
                                        role="button" aria-expanded="false" aria-controls="ubahVendor">
                                        Ubah
                                    </a>

                                </div>
                                <div class="row">
                                    <div class="col">
                                        @foreach ($data_vendor_admin as $item)
                                        <span class="badge badge-primary">{{$item->name}}</span>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="collapse mt-3" id="ubahVendor" wire:ignore>
                                    <select
                                        class="form-control card-hover  @error('selectedVendorUpdated') is-invalid @enderror"
                                        id="taskSelectUpdated" wire:model.live='selectedVendorUpdated'
                                        multiple="multiple" style="width: 400px;">
                                        @foreach($data_vendor as $dv)
                                        <option id="{{$dv->id}}" value="{{$dv->id}}">{{$dv->name}}</option>
                                        @endforeach
                                    </select>


                                </div>



                                <div>@error('selectedVendorUpdated') <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            {{-- <div class="my-3">
                                Selected Vendor :
                                @forelse($selectedVendor as $vendor)
                                {{$vendor}},
                                @empty
                                None
                                @endforelse
                            </div> --}}


                        </div>
                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="desc">Deskripsi</label>
                                <input type="text" value="{{$desc}}" wire:model.live='desc' class="form-control">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="form-control btn btn-primary"><i class="bi bi-pencil-square"></i>
                    Ubah</button>

            </div>
            </form>
        </div>
    </div>
</div>

{{-- step dua --}}
<div wire:ignore.self class="modal fade" id="dataStepDua" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Step 2</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    wire:click='closeEditStepSatu()'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='updateStepStepDua'>
                    <div class="container">
                        <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                        <hr style="border: .5px solid black;">
                        <div class="card-hover">
                            <table class="table table-bordered  bg-body-tertiary rounded shadow-sm "
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

                        </div>


                        <hr style="border: .5px solid black;">



                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="nama_pt">Bebas Pajak<span class="text-danger">*</span></label>
                                <br>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model.live='bebas_pajak'
                                                id="yes" value="yes">
                                            <label class="form-check-label" for="yes">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model.live='bebas_pajak'
                                                id="no" value="no">
                                            <label class="form-check-label" for="no">No</label>
                                        </div>

                                    </div>
                                </div>

                                @if($bebas_pajak == 'yes')
                                {{--
                                <hr style="border: 0.5px solid #2C53C5"> --}}
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model.live='pajak'
                                                id="SKTD" value="SKTD">
                                            <label class="form-check-label" for="SKTD">SKTD</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model.live='pajak'
                                                id="SKB" value="SKB">
                                            <label class="form-check-label" for="SKB">SKB</label>
                                        </div>

                                    </div>
                                </div>
                                @endif
                                <div>
                                    @error('bebas_pajak') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="instansi">Asal Brand<span class="text-danger">*</span></label>
                                <br>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:click='brand'
                                                wire:model.live='asal_brand' id="lokal" value="lokal">
                                            <label class="form-check-label" wire:click='brand' for="lokal">Lokal</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:click='brand'
                                                wire:model.live='asal_brand' id="import" value="import">
                                            <label class="form-check-label" wire:click='brand'
                                                for="import">Import</label>
                                        </div>

                                    </div>

                                </div>

                                @if($asal_brand == 'import')
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model.live='brand'
                                                id="SP2" value="SP2">
                                            <label class="form-check-label" for="SP2">SP2</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model.live='brand'
                                                id="NONSP2" value="Non SP2">
                                            <label class="form-check-label" for="NONSP2">Non SP2</label>
                                        </div>

                                    </div>
                                </div>
                                @endif
                                <div>
                                    @error('asal_brand') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="instansi">Sertifikat Produk<span class="text-danger">*</span></label>

                                <div class="row">
                                    <div class="col-12 col-lg-5">
                                        @foreach ($sertifikat as $s)
                                        @if($s->id == 1 || $s->id == 2 || $s->id == 3 || $s->id == 6)
                                        <div class="form-check">
                                            <input @if($asal_brand=='lokal' ) disabled @endif class="form-check-input"
                                                type="checkbox" wire:model.live='sertifikat_produk' value="{{$s->id}}"
                                                id="{{$s->name}}">
                                            <label class="form-check-label" for="{{$s->name}}">
                                                {{$s->name}}
                                            </label>
                                        </div>
                                        @endif


                                        @endforeach

                                    </div>
                                    <div class="col-12 col-lg-7">
                                        @foreach ($sertifikat as $s)
                                        @if( $s->id == 4 || $s->id == 5 || $s->id == 7 || $s->id == 8 )
                                        <div class="form-check">
                                            <input @if($asal_brand=='import' ) disabled @endif class="form-check-input"
                                                type="checkbox" wire:model.live='sertifikat_produk' value="{{$s->id}}"
                                                id="{{$s->name}}">
                                            <label class="form-check-label" for="{{$s->name}}">
                                                {{$s->name}}
                                            </label>
                                        </div>
                                        @endif


                                        @endforeach

                                    </div>
                                </div>

                                <div>
                                    @error('sertifikat_produk') <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="warranty">Warranty<span class="text-danger">*</span></label>
                                <br>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="warranty"
                                                wire:model.live='warranty' id="yesWarranty" value="yes">
                                            <label class="form-check-label" for="yesWarranty">yes
                                                @if($warranty == 'yes')
                                                <input type="number" wire:model.live='garansi'
                                                    style="width: 51px;height: 25px;">
                                                <span style="margin-left: 5px;">
                                                </span> hari</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="warranty"
                                                wire:model.live='warranty' id="noWarranty" value="no">
                                            <label class="form-check-label" for="noWarranty">no</label>
                                        </div>

                                    </div>

                                </div>
                                <div>
                                    @error('warranty') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label" for="tahun_anggaran">Payment Term<span
                                    class="text-danger">*</span></label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="payment" value="no"
                                    wire:model.live='payment' value="no" id="noDp" value="option1" checked>
                                <label class="form-check-label" for="noDp">
                                    No DP
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="payment" value="dp" id="dp"
                                    wire:model.live='payment' value="option2">
                                <label class="form-check-label" for="dp">
                                    DP
                                    @if($payment == 'dp')

                                    <span>20 %</span>
                                    @endif
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" value="termin" name="payment" id="termin"
                                    wire:model.live='payment' value="option2">
                                <label class="form-check-label" for="termin">
                                    Termin
                                    @if($payment == 'termin')
                                    <input type="number" style="width: 51px;height: 25px;" wire:model.live='termin'>
                                    <span style="margin-left: 5px;">
                                    </span> kali
                                    @endif
                                </label>
                                <br>
                                @error('termin')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                @error('payment') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="form-control btn btn-secondary"><i class="bi bi-eye"></i> Preview</button>



            </div>
            </form>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="simpanStepDua" style="background: rgba(0,0,0,.5);" data-backdrop="static"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="color: black">Preview step 2</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='storeProjectDua'>
                    <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                    <hr style="border: .5px solid black;">

                    <div class="card-hover">
                        <table class="table table-bordered  bg-body-tertiary rounded shadow-sm " style="color: black">
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

                    </div>


                    <hr style="border: .5px solid black;">
                    <table class="table table-bordered table-striped table-hover bg-body-tertiary rounded shadow-sm "
                        style="color: black">
                        <tbody>
                            <tr>
                                <th class="col-3">Bebas Pajak</th>
                                <td> @if($bebas_pajak == 'yes') {{ $bebas_pajak }},
                                    {{ $pajak }} @else {{ $bebas_pajak
                                    }} @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3">Asal Brand</th>
                                <td> @if($asal_brand == 'import') {{ $asal_brand }}, {{ $brand }} @else {{ $asal_brand
                                    }} @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3">Sertifikat Produk</th>
                                <td>
                                    @if($sertifikat_produk != null )
                                    @foreach ($sertifikat_produk as $s)
                                    @foreach ($sertifikat as $item)
                                    @if($item->id == $s)
                                    <span class="badge badge-primary">{{$item->name}}</span>
                                    @endif
                                    @endforeach

                                    @endforeach
                                    @else -
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3">Warranty</th>
                                <td>@if($warranty == 'yes'){{ $warranty }}, {{
                                    $garansi }} hari @else {{ $warranty }} @endif</td>
                            </tr>
                            <tr>
                                <th class="col-3">Payment Term</th>
                                <td style="text-transform: capitalize">@if( $payment == 'no' ){{ $payment }} DP @elseif(
                                    $payment == 'dp' ) {{ $payment
                                    }}, {{ $dp_payment }}% @elseif( $payment == 'termin' ) {{ $payment }}, {{$termin}}
                                    kali
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-pencil-square"></i>
                    Ubah Data</button>
                <button type="submit" class="btn btn-primary"><i class="bi bi-archive"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="stepDua" style="background: rgba(0,0,0,.5);" data-backdrop="static"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="color: black">Detail Step 2</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeStepDua'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="text-center" style="color: black"><b>{{ $stepDua_nama_pengadaan }}</b> </h5>

                <hr style="border: .5px solid black;">

                <div class="card-hover">
                    <table class="table table-bordered  bg-body-tertiary rounded shadow-sm " style="color: black">
                        <tbody>
                            <tr>
                                <th class="col-3">No UP</th>
                                <td>{{ $stepDua_no_up }}</td>
                            </tr>
                            <tr>
                                <th class="col-3">PIC</th>
                                <td style="text-transform: capitalize">{{ $stepDua_pic }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>


                <hr style="border: .5px solid black;">
                <table class="table table-bordered table-hover bg-body-tertiary rounded shadow-sm "
                    style="color: black">
                    <tbody>
                        <tr>
                            <th class="col-3">Bebas Pajak</th>
                            <td> @if($stepDua_bebas_pajak == 'yes') {{ $stepDua_bebas_pajak }},
                                {{ $stepDua_pajak }} @else {{ $stepDua_bebas_pajak
                                }} @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3">Asal Brand</th>
                            <td> @if($stepDua_asal_brand == 'import') {{ $stepDua_asal_brand }}, {{ $stepDua_brand }}
                                @else {{ $stepDua_asal_brand
                                }} @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3">Sertifikat Produk</th>
                            <td>
                                @foreach ($data_sertifikat_admin as $item)
                                <span class="badge badge-primary">{{$item->name}}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3">Warranty</th>
                            <td>
                                @if($stepDua_waranty == 'yes'){{ $stepDua_waranty }}, {{
                                $stepDua_garansi }} hari @else {{ $stepDua_waranty }} @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3">Payment Term</th>
                            <td style="text-transform: capitalize">@if( $stepDua_payment == 'no' ){{ $stepDua_payment }}
                                DP @elseif(
                                $stepDua_payment == 'dp' ) {{ $stepDua_payment
                                }}, {{ $stepDua_dp_payment }}% @elseif( $stepDua_payment == 'termin' ) {{
                                $stepDua_payment }}, {{$stepDua_termin}}
                                kali
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                <span class="float-right">Di input pada : {{
                    Carbon\Carbon::parse($stepDua_date)->isoFormat('DD, MMMM YYYY')}}</span>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary form-control" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="ubahStepDua" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Step 2</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    wire:click='closeEditStepDua()'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='updateStepStepDuaAction'>
                    <div class="container">
                        <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                        <hr style="border: .5px solid black;">

                        <div class="card-hover">
                            <table class="table table-bordered  bg-body-tertiary rounded shadow-sm "
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

                        </div>


                        <hr style="border: .5px solid black;">



                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="nama_pt">Bebas Pajak<span class="text-danger">*</span></label>
                                <br>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model.live='bebas_pajak'
                                                id="yes" value="yes">
                                            <label class="form-check-label" for="yes">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model.live='bebas_pajak'
                                                id="no" value="no">
                                            <label class="form-check-label" for="no">No</label>
                                        </div>

                                    </div>
                                </div>

                                @if($bebas_pajak == 'yes')
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model.live='pajak'
                                                id="SKID" value="SKID">
                                            <label class="form-check-label" for="SKID">SKID</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model.live='pajak'
                                                id="SKB" value="SKB">
                                            <label class="form-check-label" for="SKB">SKB</label>
                                        </div>

                                    </div>
                                </div>
                                @endif
                                <div>
                                    @error('bebas_pajak') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="instansi">Asal Brand<span class="text-danger">*</span></label>
                                <br>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model.live='asal_brand'
                                                id="lokal" value="lokal">
                                            <label class="form-check-label" for="lokal">Lokal</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model.live='asal_brand'
                                                id="import" value="import">
                                            <label class="form-check-label" for="import">Import</label>
                                        </div>

                                    </div>

                                </div>

                                @if($asal_brand == 'import')
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model.live='brand'
                                                id="SP2" value="SP2">
                                            <label class="form-check-label" for="SP2">SP2</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model.live='brand'
                                                id="NONSP2" value="Non SP2">
                                            <label class="form-check-label" for="NONSP2">Non SP2</label>
                                        </div>

                                    </div>
                                </div>
                                @endif
                                <div>
                                    @error('asal_brand') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="instansi">Sertifikat Produk<span class="text-danger">*</span></label>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            @foreach ($data_sertifikat_admin as $item)
                                            <span class="badge badge-primary">{{$item->name}}</span>
                                            @endforeach
                                        </div>
                                        <div class="col-6">
                                            @if($ubah_sertifikat == null)
                                            <a style="text-decoration: underline; cursor: pointer;" value='ubah'
                                                wire:model.live='ubah_sertifikat' wire:click='ubahSertif()'>ubah
                                            </a>
                                            @elseif($ubah_sertifikat == 'ubah')
                                            <a style="text-decoration: underline; cursor: pointer;" value='ubah'
                                                wire:model.live='ubah_sertifikat' wire:click='batalSertif()'>batal
                                            </a>
                                            @endif

                                        </div>
                                    </div>

                                </div>
                                @if($ubah_sertifikat == 'ubah')
                                <div class="form-outline mb-3">
                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col-12 col-lg-5">
                                                @foreach ($sertifikat as $s)
                                                @if($s->id == 1 || $s->id == 2 || $s->id == 3 || $s->id == 6)
                                                <div class="form-check">
                                                    <input @if($asal_brand=='lokal' ) disabled @endif
                                                        class="form-check-input" type="checkbox"
                                                        wire:model.live='sertifikat_produk' value="{{$s->id}}"
                                                        id="{{$s->name}}">
                                                    <label class="form-check-label" for="{{$s->name}}">
                                                        {{$s->name}}
                                                    </label>
                                                </div>
                                                @endif


                                                @endforeach

                                            </div>
                                            <div class="col-12 col-lg-7">
                                                @foreach ($sertifikat as $s)
                                                @if($s->id == 4 || $s->id == 5 )
                                                <div class="form-check">
                                                    <input @if($asal_brand=='import' ) disabled @endif
                                                        class="form-check-input" type="checkbox"
                                                        wire:model.live='sertifikat_produk' value="{{$s->id}}"
                                                        id="{{$s->name}}">
                                                    <label class="form-check-label" for="{{$s->name}}">
                                                        {{$s->name}}
                                                    </label>
                                                </div>
                                                @endif


                                                @endforeach

                                            </div>
                                        </div>

                                        <div>
                                            @error('sertifikat_produk') <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @endif


                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="warranty">Warranty<span class="text-danger">*</span></label>
                                <br>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="warranty"
                                                wire:model.live='warranty' id="yesWarranty" value="yes">
                                            <label class="form-check-label" for="yesWarranty">yes
                                                @if($warranty == 'yes')
                                                <input type="number" wire:model.live='garansi'
                                                    style="width: 51px;height: 25px;">
                                                <span style="margin-left: 5px;">
                                                </span> hari</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="warranty"
                                                wire:model.live='warranty' id="noWarranty" value="no">
                                            <label class="form-check-label" for="noWarranty">no</label>
                                        </div>

                                    </div>

                                </div>
                                <div>
                                    @error('warranty') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label" for="tahun_anggaran">Payment Term<span
                                    class="text-danger">*</span></label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="payment" value="no"
                                    wire:model.live='payment' value="no" id="noDp" value="option1" checked>
                                <label class="form-check-label" for="noDp">
                                    No DP
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="payment" value="dp" id="dp"
                                    wire:model.live='payment' value="option2">
                                <label class="form-check-label" for="dp">
                                    DP
                                    @if($payment == 'dp')
                                    <input disabled type="number" style="width: 41px;height: 25px;"
                                        wire:model.live='dp_payment'>
                                    <span style="margin-left: 5px;">
                                    </span> %
                                    @endif
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" value="termin" name="payment" id="termin"
                                    wire:model.live='payment' value="option2">
                                <label class="form-check-label" for="termin">
                                    Termin
                                    @if($payment == 'termin')
                                    <input type="number" style="width: 51px;height: 25px;" wire:model.live='termin'>
                                    <span style="margin-left: 5px;">
                                    </span> kali
                                    @endif
                                </label>
                                <br>
                                @error('termin')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                @error('payment') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="form-control btn btn-primary"><i class="fas fa-edit"></i> Ubah</button>



            </div>
            </form>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade shadow" style="background: rgba(0, 0, 0, .5)" id="confirmStepDua"
    data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="color: black">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="text-center" style="color: black">Apakah data yang anda inputkan sudah benar?</h6>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <form wire:submit.prevent='saveProjectDua'>
                    <button type="submit" class="btn btn-primary">Ya! Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- step tiga --}}
<div wire:ignore.self class="modal fade" id="ubahDataStepTiga" data-backdrop="static" data-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Step 3</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    wire:click='closeUbahStepTiga()'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='updateDataStepTiga'>
                    <div class="container">
                        <h5 class="text-center" style="color: black"><b>{{ $stepSatu_nama_pengadaan }}</b> </h5>
                        <hr style="border: .5px solid black;">
                        <div class="card-hover">
                            <table class="table table-bordered  bg-body-tertiary rounded shadow-sm "
                                style="color: black">
                                <tbody>
                                    <tr>
                                        <th class="col-3">No UP</th>
                                        <td>{{ $stepSatu_no_up }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-3">PIC</th>
                                        <td style="text-transform: capitalize">{{ $pic }}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>


                        <hr style="border: .5px solid black;">

                        <div class="form-outline mb-3">
                            <label class="form-label" for="no_kontrak">No Kontrak<span
                                    class="text-danger">*</span></label>
                            <input type="text" id="no_kontrak"
                                class="form-control card-hover @error('no_kontrak') is-invalid @enderror"
                                wire:model.live='no_kontrak'>
                            <div>@error('no_kontrak') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-outline">
                                    <label class="form-label" for="nilai_kontrak">Nilai Kontrak<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="number" id="nilai_kontrak" aria-label="Username"
                                            aria-describedby="basic-addon1"
                                            class="form-control card-hover @error('nilai_kontrak') is-invalid @enderror"
                                            wire:model.live='nilai_kontrak'>

                                    </div>

                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-outline">
                                    <label class="form-label" for="nilai_kontrak">Nilai Rupiah</label>
                                    <div class="input-group">
                                        <input type="text" disabled id="nilai_kontrak"
                                            value="{{'Rp '.number_format((int)$nilai_kontrak,0, ',', '.')}}"
                                            class="form-control card-hover">

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mb-3">
                            @error('nilai_kontrak') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label" for="tgl_kontrak">Tanggal Kontrak<span
                                    class="text-danger">*</span></label>
                            <input type="date" id="tgl_kontrak"
                                class="form-control card-hover @error('tgl_kontrak') is-invalid @enderror"
                                wire:model.live='tgl_kontrak'>
                            <div>@error('tgl_kontrak') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label" for="jatuh_tempo">Jatuh Tempo<span
                                    class="text-danger">*</span></label>
                            <input type="date" id="jatuh_tempo"
                                class="form-control card-hover @error('jatuh_tempo') is-invalid @enderror"
                                wire:model.live='jatuh_tempo'>
                            <div>@error('jatuh_tempo') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>

                        @if ($payment == 'dp')


                        <div class="form-outline mb-3">
                            <label class="form-label" for="display_nilai_dp">Nilai DP (20%)</label>
                            <input disabled type="text" id="display_nilai_dp" class="form-control card-hover"
                                value="@if($nilai_kontrak>0) Rp {{number_format((int)$nilai_kontrak * (20/100),0, ',', '.')}} @endif">
                            <div>@error('display_nilai_dp') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>

                        @elseif($payment == 'termin')
                        <table class="table table-bordered table-hover shadow-sm card-hover" style="color: black">
                            <thead>
                                <tr>
                                    <th>Termin</th>
                                    <th>Nilai</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                <?php $i = 1 ?>
                                @foreach ($dataTermin as $dt)
                                @if ($dt->id_project == $id_project )
                                <tr>
                                    <td scope="row">Termin {{ $i++ }}</td>
                                    <td>Rp {{ number_format($dt->value, 0, ',','.') }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-primary" wire:click='ubahTerminData({{$dt->id}})'><i
                                                class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                @endif

                                @endforeach
                            </tbody>
                        </table>
                        @endif


                    </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="form-control btn btn-primary"><i class="far fa-edit"></i> Ubah</button>



            </div>
            </form>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="dataStepTiga" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Step 3</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    wire:click='closeEditStepSatu()'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='updateStepStepTiga'>
                    <div class="container">
                        <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                        <hr style="border: .5px solid black;">
                        <div class="card-hover">
                            <table class="table table-bordered  bg-body-tertiary rounded shadow-sm "
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

                        </div>


                        <hr style="border: .5px solid black;">


                        <div class="form-outline mb-3">
                            <label class="form-label" for="no_kontrak">No Kontrak<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control card-hover @error('no_kontrak') is-invalid @enderror"
                                wire:model.live='no_kontrak'>
                            <div>@error('no_kontrak') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-outline">
                                    <label class="form-label" for="nilai_kontrak">Nilai Kontrak<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="number" id="nilai_kontrak" aria-label="Username"
                                            aria-describedby="basic-addon1"
                                            class="form-control card-hover @error('nilai_kontrak') is-invalid @enderror"
                                            wire:model.live='nilai_kontrak'>

                                    </div>

                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-outline">
                                    <label class="form-label" for="nilai_kontrak">Nilai Rupiah</label>
                                    <div class="input-group">
                                        <input type="text" disabled id="nilai_kontrak"
                                            value="{{'Rp '.number_format((int)$nilai_kontrak,0, ',', '.')}}"
                                            class="form-control card-hover">

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mb-3">@error('nilai_kontrak') <span class="text-danger "> {{ $message }}</span>
                            @enderror
                        </div>



                        <div class="form-outline mb-3">
                            <label class="form-label" for="tgl_kontrak">Tanggal Kontrak<span
                                    class="text-danger">*</span></label>
                            <input type="date" id="tgl_kontrak"
                                class="form-control card-hover @error('tgl_kontrak') is-invalid @enderror"
                                wire:model.live='tgl_kontrak'>
                            <div>@error('tgl_kontrak') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label" for="jatuh_tempo">Jatuh Tempo<span
                                    class="text-danger">*</span></label>
                            <input type="date" id="jatuh_tempo"
                                class="form-control card-hover @error('jatuh_tempo') is-invalid @enderror"
                                wire:model.live='jatuh_tempo'>
                            <div>@error('jatuh_tempo') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>
                        @if ($payment == 'dp')


                        <div class="form-outline mb-3">
                            <label class="form-label" for="display_nilai_dp">Nilai DP (20%)</label>
                            <input disabled type="text" id="display_nilai_dp" class="form-control card-hover"
                                value="@if($nilai_kontrak>0) Rp {{number_format((int)$nilai_kontrak * (20/100),0, ',', '.')}} @endif">
                            <div>@error('display_nilai_dp') <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        @endif

                        @if($payment == 'termin')

                        <div class="row">
                            <div class="col">
                                @for($x = 1; $x <= $termin; $x++) <label for="termin_{{$x}}" class="form-label">
                                    Termin {{$x}}</label>
                                    <input type="number" id="termin_{{$x}}" wire:model.live='data_termin.{{(int)$x}}'
                                        class="form-control mb-3 card-hover">

                                    @error('data_termin')
                                    <span class="text-danger">{{ $message }} {{ $x }}</span>
                                    @enderror
                                    @endfor
                            </div>
                            <div class="col">

                                @foreach ($data_termin as $dt)
                                <label for="nilaiTermin_{{$loop->iteration}}" class="form-label">Nilai
                                    Rupiah Termin
                                    {{$loop->iteration}}</label>
                                <input type="text" id="nilaiTermin_{{$loop->iteration}}"
                                    value="Rp {{ number_format($dt, 0,',','.') }}" disabled
                                    class="form-control mb-3 card-hover">
                                @endforeach

                            </div>
                        </div>
                        @endif

                        {{-- @foreach ($data_termin as $dt)
                        <label for="" class="form-label">Nilai Rupiah Termin {{$loop->iteration}}</label>
                        <input type="text" disabled id="" value="Rp {{ number_format($dt, 0,',','.') }}"
                            class="form-control mb-3 card-hover">

                        @endforeach --}}






                    </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="form-control btn btn-secondary"><i class="bi bi-eye"></i>
                    Preview</button>



            </div>
            </form>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="simpanStepDuaTiga" style="background: rgba(0,0,0,.5);"
    data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="color: black">Preview Step 3</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='confirmStepTiga'>
                    <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                    <hr style="border: .5px solid black;">

                    <div class="card-hover">
                        <table class="table table-bordered  bg-body-tertiary rounded shadow-sm " style="color: black">
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

                    </div>


                    <hr style="border: .5px solid black;">
                    <table class="table table-bordered table-striped table-hover bg-body-tertiary rounded shadow-sm "
                        style="color: black">
                        <tbody>
                            <tr>
                                <th class="col-3">No Kontrak</th>
                                <td>
                                    {{$no_kontrak}}
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3">Nilai Kontrak</th>
                                <td>
                                    {{$display_nilai_kontrak}}
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3">Tanggal Kontrak</th>
                                <td>
                                    {{$display_tgl_kontrak}}
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3">Jatuh Tempo</th>
                                <td>
                                    {{$display_jatuh_tempo}}
                                </td>
                            </tr>
                            @if($payment == 'dp')
                            <tr>
                                <th class="col-3">Nili DP</th>
                                <td>
                                    {{$display_nilai_dp}} (20%)
                                </td>
                            </tr>
                            @elseif($payment == 'termin')
                            @foreach ($data_termin as $dt)
                            <tr>
                                <th class="col-3">Termin {{$loop->iteration}}</th>
                                <td>Rp {{ number_format($dt, 0,',','.') }}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-pencil-square"></i>
                    Ubah Data</button>
                <button type="submit" class="btn btn-primary"><i class="bi bi-archive"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade shadow" style="background: rgba(0, 0, 0, .5)" id="confirmStepTiga"
    data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="color: black">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="text-center" style="color: black">Apakah data yang anda inputkan sudah benar?</h6>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <form wire:submit.prevent='updateStepStepTigaAction'>
                    <button type="submit" class="btn btn-primary">Ya! Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="viewStepTigaModal" data-backdrop="static" style="color: black"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Step 3</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    wire:click='closeLihatStepTiga'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <h5 class="text-center" style="color: black"><b>{{ $stepSatu_nama_pengadaan }}</b> </h5>
                <hr style="border: .5px solid black;">


                <table class="table table-bordered table-hover bg-body-tertiary rounded shadow-sm "
                    style="color: black">
                    <tbody>
                        <tr>
                            <th class="col-3">No UP</th>
                            <td>{{ $stepSatu_no_up }}</td>
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
                            <th class="col-3">No Kontrak</th>
                            <td>
                                {{$no_kontrak}}
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3">Nilai Kontrak</th>
                            <td>
                                {{$nilai_kontrak}}
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3">Tanggal Kontrak</th>
                            <td>
                                {{$display_tgl_kontrak}}
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3">Jatuh Tempo</th>
                            <td>
                                {{$display_jatuh_tempo}}
                            </td>
                        </tr>
                        @if($stepDua_payment == 'dp')
                        <tr>
                            <th class="col-3">Nilai DP</th>
                            <td>
                                {{$nilai_dp}} (20%)
                            </td>
                        </tr>
                        @elseif($stepDua_payment == 'termin')
                        <?php $i = 1 ?>
                        @foreach ($dataTermin as $dt)
                        @if ($dt->id_project == $id_project)
                        <tr>
                            <th class="col-3">Nilai Termin {{ $i++ }}</th>
                            <td>
                                Rp {{number_format($dt->value, 0,',','.')}}
                            </td>

                        </tr>

                        @endif

                        @endforeach
                        @endif
                    </tbody>
                </table>




            </div>

            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary form-control" data-dismiss="modal"
                    wire:click='closeLihatStepTiga'>Kembali</button>
            </div>
        </div>
    </div>
</div>

<!-- tambah garansi  -->
<div wire:ignore.self class="modal fade" id="tambahGaransi" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Garansi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='preview'>
                    <div class="container">
                        <div class="form-outline mb-3">
                            <label class="form-label" for="nama_pengadaan">Nama Pengadaan<span
                                    class="text-danger">*</span></label>
                            <input type="text" id="nama_pengadaan"
                                class="form-control card-hover @error('nama_pengadaan') is-invalid @enderror"
                                wire:model.live='nama_pengadaan'>
                            <div>@error('nama_pengadaan') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label" for="no_up">No UP<span class="text-danger">*</span></label>
                            <input type="text" id="no_up"
                                class="form-control card-hover @error('no_up') is-invalid @enderror"
                                wire:model.live='no_up'>
                            <div>@error('no_up') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                        </div>
                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="nama_pt">Nama PT<span class="text-danger">*</span></label>
                                <select class="form-control card-hover @error('nama_pt') is-invalid @enderror"
                                    id="nama_pt" wire:model.live='nama_pt'>
                                    <option></option>
                                    @foreach ($daftaPt as $dp)
                                    <option value="{{ $dp->id }}">{{ $dp->name }}</option>
                                    @endforeach
                                </select>
                                <div>@error('nama_pt') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="instansi">Instansi<span class="text-danger">*</span></label>
                                <select class="form-control card-hover @error('instansi') is-invalid @enderror"
                                    id="instansi" wire:model.live='instansi'>
                                    <option></option>
                                    @foreach ($daftarInstansi as $di)
                                    <option value="{{ $di->id }}">{{ $di->name }}</option>
                                    @endforeach
                                </select>
                                <div>@error('instansi') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="jenis_anggaran">Jenis Anggaran<span class="text-danger">*</span></label>
                                <select class="form-control card-hover @error('jenis_anggaran') is-invalid @enderror"
                                    id="jenis_anggaran" wire:model.live='jenis_anggaran'>
                                    <option></option>
                                    <option>Rutin</option>
                                    <option>Optimalisasi</option>
                                    <option>Prioritas</option>
                                </select>
                                <div>@error('jenis_anggaran') <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label" for="tahun_anggaran">Tahun Anggaran<span
                                    class="text-danger">*</span></label>
                            <input type="text" id="tahun_anggaran"
                                class="form-control card-hover @error('tahun_anggaran') is-invalid @enderror"
                                wire:model.live='tahun_anggaran'>
                            <div>@error('tahun_anggaran') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="pic">PIC<span class="text-danger">*</span></label>
                                <select class="form-control card-hover @error('pic') is-invalid @enderror" id="pic"
                                    wire:model.live='pic'>
                                    <option></option>
                                    @foreach ($users as $u)
                                    <option style="text-transform: capitalize" value="{{$u->id}}">{{$u->nama}}
                                    </option>
                                    @endforeach
                                </select>
                                <div>@error('pic') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="vendor">Vendor<span class="text-danger">*</span></label>
                                <select class="form-control card-hover  @error('vendor') is-invalid @enderror"
                                    id="vendor" wire:model.live='vendor'>
                                    <option></option>
                                    @foreach ($daftarVendor as $dv)
                                    <option style="text-transform: capitalize" value="{{$dv->id}}">{{$dv->name}}
                                    </option>
                                    @endforeach
                                </select>
                                <div>@error('vendor') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <div class="form-group">
                                <label for="desc">Deskripsi</label>
                                <textarea class="form-control card-hover " id="desc" rows="5"
                                    wire:model='desc'></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="form-control btn btn-secondary"><i class="bi bi-eye"></i>
                    Preview</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade shadow" style="background: rgba(0, 0, 0, .5)" id="hapusTermin"
    data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="color: black">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="text-center" style="color: black">Data <b>termin</b> berubah! Jika data <b>termin</b> berubah
                    maka data
                    step 3 sebelumnya akan terhapus.</h6>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <form wire:submit.prevent='updateStepDuaWithTermin'>
                    <button type="submit" class="btn btn-danger">Ya! Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade shadow" style="background: rgba(0, 0, 0, .5)" id="hapusStepDua"
    data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="color: black">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="text-center" style="color: black">Data <b>payment term</b> berubah! Jika data <b>payment
                        term</b> berubah
                    maka data
                    step 3 sebelumnya akan terhapus.</h6>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <form wire:submit.prevent='updateStepDuaWithPaymentTerm'>
                    <button type="submit" class="btn btn-danger">Ya! Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div wire:ignore.self class="modal fade shadow" style="background: rgba(0, 0, 0, .5);" id="nilaiTermin"
    data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="color: black">Ubah Nilai {{$namaTermin}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <form wire:submit.prevent='ubahValueTermin'>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="value" class="form-label">Nilai Termin</label>
                                <input type="number" wire:model.live='valueTermin' class="form-control card-hover">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="value" class="form-label">Nilai Termin</label>
                                <input type="text" disabled id="value"
                                    value="{{'Rp '.number_format((int)$valueTermin,0, ',', '.')}}"
                                    class="form-control card-hover">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('project')
<script>
    window.addEventListener('show-project-modal', event =>{
            $('#simpan').modal('show');
        });
        window.addEventListener('show-confirm-project-modal', event =>{
            $('#confirm').modal('show');
        });
        window.addEventListener('show-step-satu-modal', event =>{
            $('#stepSatu').modal('show');
        });
        window.addEventListener('show-confirm-delete-modal', event =>{
            $('#confirmDelete').modal('show');
        });
        window.addEventListener('hide-confirm-delete-modal', event =>{
            $('#confirmDelete').modal('hide');
        });
        window.addEventListener('show-ubah-step-satu-modal', event =>{
            $('#ubahStepSatu').modal('show');
        });
        window.addEventListener('hide-ubah-step-satu-modal', event =>{
            $('#ubahStepSatu').modal('hide');
        });
        window.addEventListener('show-ubah-step-dua-modal', event =>{
            $('#dataStepDua').modal('show');
        });
        window.addEventListener('show-ubah-step-tiga-modal', event =>{
            $('#dataStepTiga').modal('show');
        });
        window.addEventListener('show-ubah-data-step-tiga-modal', event =>{
            $('#ubahDataStepTiga').modal('show');
        });
        window.addEventListener('hide-ubah-data-step-tiga-modal', event =>{
            $('#ubahDataStepTiga').modal('hide');
        });
        window.addEventListener('show-view-project-modal', event =>{
            $('#viewProjectModal').modal('show');
        });
        window.addEventListener('show-tambah-step-dua-modal', event =>{
            $('#simpanStepDua').modal('show');
        });
        window.addEventListener('show-step-dua-modal', event =>{
            $('#stepDua').modal('show');
        });
        window.addEventListener('ubah-step-dua-modal', event =>{
            $('#ubahStepDua').modal('show');
        });
        window.addEventListener('hide-step-dua-modal', event =>{
            $('#ubahStepDua').modal('hide');
        });
        window.addEventListener('show-confirm-step-dua-modal', event =>{
            $('#confirmStepDua').modal('show');
        });
        window.addEventListener('hide-confirm-step-dua-modal', event =>{
            $('#confirmStepDua').modal('hide');
            $('#stepDua').modal('hide');
            $('#simpanStepDua').modal('hide');
            $('#dataStepDua').modal('hide');
        });
        window.addEventListener('show-preview-step-tiga-modal', event =>{
            $('#simpanStepDuaTiga').modal('show');
        });
        window.addEventListener('show-confirm-step-tiga-modal', event =>{
            $('#confirmStepTiga').modal('show');
        });
        window.addEventListener('hide-confirm-step-tiga-modal', event =>{
            $('#confirmStepTiga').modal('hide');
            $('#simpanStepDuaTiga').modal('hide');
            $('#dataStepTiga').modal('hide');
        });
        window.addEventListener('show-detail-project-tiga-modal', event =>{
            $('#viewStepTigaModal').modal('show');
        });
        window.addEventListener('hapus-termin-modal', event =>{
            $('#hapusTermin').modal('show');
        });
        window.addEventListener('hide-hapus-termin-modal', event =>{
            $('#hapusTermin').modal('hide');
            $('#ubahStepDua').modal('hide');
        });
        window.addEventListener('hapus-step-dua-modal', event =>{
            $('#hapusStepDua').modal('show');
        });
        window.addEventListener('hide-hapus-step-dua-modal', event =>{
            $('#hapusStepDua').modal('hide');
            $('#ubahStepDua').modal('hide');
        });
        window.addEventListener('show-edit-nilai-termin-modal', event =>{
            $('#nilaiTermin').modal('show');
        });
        window.addEventListener('hide-edit-nilai-termin-modal', event =>{
            $('#nilaiTermin').modal('hide');
        });
       
        // console.log($nilai_kontrak);
        
        $(document).ready(function () {
            $('#select2').select2();
            $('#select2').on('change', function (e) {
                var data = $('#select2').select2("val");
            @this.set('selected', data);
            });
        });

        $(document).ready(function(){
    
            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount:5,
            searchResultLimit:5,
            renderChoiceLimit:5
            }); 
            
            
        });

        $(document).ready(function() {
            $('.js-example-basic-single').on('change', function (e) {
                @this.set('foo', e.target.value);
            });
        });
</script>
<script type="text/javascript">
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value);
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ?  + rupiah : '');
    }
</script>

<script>
    const permissions = [
        @foreach ($daftarVendor as $dv)
            {
                label: "{{ $dv->name }}",
                value: "{{ $dv->id }}"
            },
        @endforeach
    ];
    VirtualSelect.init({
        ele: '#permissions',
        multiple: true,
        options: permissions,
    });
    let selectedPermissions = document.querySelector('#permissions');
            selectedPermissions.addEventListener('change', () => {
                let data = selectedPermissions.value;
                @this.set('selectedPermissions', data);
            });
</script>

<script>
    document.addEventListener("livewire:load", () => {
	Livewire.hook('message.processed', (message, component) => {
		$('.form-select').select2();
	}); });

</script>

<script>
    $(document).ready(function() {
        $('#taskSelect').select2();

        $('#taskSelect').on('change', function (e) {
            @this.set('selectedVendor', $(this).val());
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#taskSelectUpdated').select2();

        $('#taskSelectUpdated').on('change', function (e) {
            @this.set('selectedVendorUpdated', $(this).val());
        });
    });
</script>
<script>
    document.addEventListener('livewire:initialized', () =>{
        @this.on('delete',(event) => {
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
        @this.on('stepTiga',(event) => {
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
        @this.on('stepDua',(event) => {
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
        @this.on('updateStepSatu',(event) => {
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
        @this.on('ubahStepDua',(event) => {
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
        @this.on('ubahStepTiga',(event) => {
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
        @this.on('ubahStepDuaTermin',(event) => {
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
        @this.on('ubahStepDuaPaymentTerm',(event) => {
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
        @this.on('ubahNilaiTermin',(event) => {
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