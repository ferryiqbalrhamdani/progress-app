<div wire:ignore.self class="modal fade" id="lihatPenagihanModal" data-backdrop="static" style="color: black"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Penagihan Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeData'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                <div class="mb-3">
                    <p>Progress :</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$percentage_penagihan}}%"
                            aria-valuenow="{{$percentage_penagihan}}" aria-valuemin="0" aria-valuemax="100">
                            {{$percentage_penagihan}}%</div>
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
                            <td style="text-transform: capitalize">
                                {{ $pic }}
                                @if($pic_penagihan != NULL)
                                , {{$pic_penagihan}}
                                @endif</td>
                            </td>
                        </tr>
                    </tbody>
                </table>



                <hr style="border: .5px solid black;">

                <table class="table table-bordered table-hover bg-body-tertiary rounded shadow-sm "
                    style="color: black">
                    <tbody>
                        <tr class="table-primary">
                            <th colspan="2">
                                Tanggal BAST : @if($tgl_bast != NULL)
                                <b>{{date('d/m/Y', strtotime($tgl_bast)) }}</b>
                                @else
                                -
                                @endif
                            </th>
                            <th>Tanggal</th>
                            <th>Selisih Hari</th>
                        </tr>
                        <tr>
                            <th class="col-5">SIMB</th>
                            @if($simb_display == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{date('d/m/Y', strtotime($simb_tgl)) }}
                                {{-- {{$simb_tgl }} --}}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($simb_display == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($simb_tgl) }} hari

                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">SPPM</th>
                            @if($sppm_display == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($sppm_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($sppm_display == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($sppm_tgl) }} hari
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">Surat Pengantar Barang (PT)</th>
                            @if($surat_pengantar_barang_pt_display == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($surat_pengantar_barang_pt_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($surat_pengantar_barang_pt_display == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($surat_pengantar_barang_pt_tgl) }} hari

                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">Packing List (PT)</th>
                            @if($packing_list_pt_display == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($packing_list_pt_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($packing_list_pt_display == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($packing_list_pt_tgl) }} hari
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">Invoice</th>
                            @if($invoice_display == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($invoice_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($invoice_display == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($invoice_tgl) }} hari
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">Packing List</th>
                            @if($packing_list_display == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($packing_list_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($packing_list_display == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($packing_list_tgl) }} hari

                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">AWB/BL</th>
                            @if($awb_bl_display == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($awb_bl_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($awb_bl_display == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($awb_bl_tgl) }} hari
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">Kontrak</th>
                            @if($kontrak_display == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($kontrak_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($kontrak_display == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($kontrak_tgl) }} hari


                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">Amademen Kontrak</th>
                            @if($amademen_kontrak_display == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($amademen_kontrak_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($amademen_kontrak_display == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($amademen_kontrak_tgl) }} hari



                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">Surat Pernyataan Barang</th>
                            @if($surat_pernyataan_barang_display == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($surat_pernyataan_barang_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($surat_pernyataan_barang_display == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($surat_pernyataan_barang_tgl) }} hari
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>





            </div>

            <div class="modal-footer ">
                <button button type="button" wire:click='closeData' class="btn btn-secondary form-control"
                    data-dismiss="modal">
                    <i class="fas fa-caret-left"></i> Kembali</button>
            </div>

        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="penagihanModal" data-backdrop="static" style="color: black"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Penagihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeData'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                <div class="mb-3">
                    <p>Progress :</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$percentage_penagihan}}%"
                            aria-valuenow="{{$percentage_penagihan}}" aria-valuemin="0" aria-valuemax="100">
                            {{$percentage_penagihan}}%</div>
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
                            <td style="text-transform: capitalize">{{ $pic }}
                                @if($pic_penagihan != NULL)
                                , {{$pic_penagihan}}
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>



                <hr style="border: .5px solid black;">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <form wire:submit.prevent='ubahDataPenagihan'>
                                <div class="container">
                                    <div class="mb-3">
                                        <label for="simb_display" class="form-label">SIMB</label>
                                        <select class="custom-select card-hover form-control" id="simb_display"
                                            wire:model.live='simb_display'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sppm_display" class="form-label">SPPM</label>
                                        <select class="custom-select card-hover form-control" id="sppm_display"
                                            wire:model.live='sppm_display'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="surat_pengantar_barang_pt_display" class="form-label">Surat
                                            Pengantar Barang
                                            (PT)</label>
                                        <select class="custom-select card-hover form-control"
                                            id="surat_pengantar_barang_pt_display"
                                            wire:model.live='surat_pengantar_barang_pt_display'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="packing_list_pt_display" class="form-label">Packing List
                                            (PT)</label>
                                        <select class="custom-select card-hover form-control"
                                            id="packing_list_pt_display" wire:model.live='packing_list_pt_display'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="invoice_display" class="form-label">Invoice</label>
                                        <select class="custom-select card-hover form-control" id="invoice_display"
                                            wire:model.live='invoice_display'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="packing_list_display" class="form-label">Packing List</label>
                                        <select class="custom-select card-hover form-control" id="packing_list_display"
                                            wire:model.live='packing_list_display'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="awb_bl_display" class="form-label">AWB/BL</label>
                                        <select class="custom-select card-hover form-control" id="awb_bl_display"
                                            wire:model.live='awb_bl_display'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kontrak_display" class="form-label">Kontrak</label>
                                        <select class="custom-select card-hover form-control" id="kontrak_display"
                                            wire:model.live='kontrak_display'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="amademen_kontrak_display" class="form-label">Amademen
                                            Kontrak</label>
                                        <select class="custom-select card-hover form-control"
                                            id="amademen_kontrak_display" wire:model.live='amademen_kontrak_display'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="surat_pernyataan_barang_display" class="form-label">Surat Pernyataan
                                            Barang</label>
                                        <select class="custom-select card-hover form-control"
                                            id="surat_pernyataan_barang_display"
                                            wire:model.live='surat_pernyataan_barang_display'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>


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

<div wire:ignore.self class="modal fade" id="inputDpModal" data-backdrop="static" style="color: black"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Input DP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeData'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                <div class="mb-3">
                    <p>Progress :</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$percentage_dp}}%"
                            aria-valuenow="{{$percentage_dp}}" aria-valuemin="0" aria-valuemax="100">
                            {{$percentage_dp}}%</div>
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
                            <td style="text-transform: capitalize">{{ $pic }}
                                @if($pic_penagihan != NULL)
                                , {{$pic_penagihan}}
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>



                <hr style="border: .5px solid black;">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <form wire:submit.prevent='ubahDataPenagihanDp'>
                                <div class="container">
                                    <div class="mb-3">
                                        <label for="surat_permohonan" class="form-label">Surat Permohonan</label>
                                        <select class="custom-select card-hover form-control" id="surat_permohonan"
                                            wire:model.live='surat_permohonan'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kwitansi_pembayaran" class="form-label">Kwitansi Pembayaran</label>
                                        <select class="custom-select card-hover form-control" id="kwitansi_pembayaran"
                                            wire:model.live='kwitansi_pembayaran'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bap" class="form-label">BAP</label>
                                        <select class="custom-select card-hover form-control" id="bap"
                                            wire:model.live='bap'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ssp_ppn_pph" class="form-label">SSP, PPN, PPH</label>
                                        <select class="custom-select card-hover form-control" id="ssp_ppn_pph"
                                            wire:model.live='ssp_ppn_pph'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="efaktur" class="form-label">Efaktur</label>
                                        <select class="custom-select card-hover form-control" id="efaktur"
                                            wire:model.live='efaktur'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kontrak" class="form-label">Kontrak</label>
                                        <select class="custom-select card-hover form-control" id="kontrak"
                                            wire:model.live='kontrak'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jamuk" class="form-label">Jamuk</label>
                                        <select class="custom-select card-hover form-control" id="jamuk"
                                            wire:model.live='jamuk'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sppbj" class="form-label">SPPBJ</label>
                                        <select class="custom-select card-hover form-control" id="sppbj"
                                            wire:model.live='sppbj'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
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

<div wire:ignore.self class="modal fade" id="lihatPenagihanDpModal" data-backdrop="static" style="color: black"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail DP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeData'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                <div class="mb-3">
                    <p>Progress :</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$percentage_dp}}%"
                            aria-valuenow="{{$percentage_dp}}" aria-valuemin="0" aria-valuemax="100">
                            {{$percentage_dp}}%</div>
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
                            <td style="text-transform: capitalize">{{ $pic }}
                                @if($pic_penagihan != NULL)
                                , {{$pic_penagihan}}
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>



                <hr style="border: .5px solid black;">

                <table class="table table-bordered table-hover bg-body-tertiary rounded shadow-sm "
                    style="color: black">
                    <tbody>
                        <tr class="table-primary">
                            <th colspan="2">
                                Tanggal BAST : @if($tgl_bast != NULL)
                                <b>{{date('d/m/Y', strtotime($tgl_bast)) }}</b>
                                @else
                                -
                                @endif
                            </th>
                            <th>Tanggal</th>
                            <th>Selisih Hari</th>
                        </tr>
                        <tr>
                            <th class="col-5">Surat Permohonan</th>
                            @if($surat_permohonan == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{date('d/m/Y', strtotime($surat_permohonan_tgl)) }}
                                {{-- {{$surat_permohonan_tgl }} --}}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($surat_permohonan == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($surat_permohonan_tgl) }} hari

                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">Kwitansi</th>
                            @if($kwitansi_pembayaran == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($kwitansi_pembayaran_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($kwitansi_pembayaran == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($kwitansi_pembayaran_tgl) }} hari
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">BAP</th>
                            @if($bap == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($bap_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($bap == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($bap_tgl) }} hari

                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">SSP/PPN/PPH</th>
                            @if($ssp_ppn_pph == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($ssp_ppn_pph_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($ssp_ppn_pph == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($ssp_ppn_pph_tgl) }} hari
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">Efaktur</th>
                            @if($efaktur == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($efaktur_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($efaktur == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($efaktur_tgl) }} hari
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">Kontrak</th>
                            @if($kontrak == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($kontrak_tgl_dp)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($kontrak == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($kontrak_tgl) }} hari

                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">Jamuk</th>
                            @if($jamuk == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($jamuk_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($jamuk == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($jamuk_tgl) }} hari
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">SPPBJ</th>
                            @if($sppbj == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($sppbj_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($sppbj == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($sppbj_tgl) }} hari


                                @else
                                -
                                @endif
                            </td>
                        </tr>

                    </tbody>
                </table>





            </div>

            <div class="modal-footer ">
                <button button type="button" wire:click='closeData' class="btn btn-secondary form-control"
                    data-dismiss="modal">
                    <i class="fas fa-caret-left"></i> Kembali</button>
            </div>

        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="inputTerminModal" data-backdrop="static" style="color: black"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah {{$nama_termin}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeData'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                <div class="mb-3">
                    <p>Progress :</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$percentage_termin}}%"
                            aria-valuenow="{{$percentage_termin}}" aria-valuemin="0" aria-valuemax="100">
                            {{$percentage_termin}}%</div>
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
                            <td style="text-transform: capitalize">{{ $pic }}
                                @if($pic_penagihan != NULL)
                                , {{$pic_penagihan}}
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>



                <hr style="border: .5px solid black;">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <form wire:submit.prevent='ubahDataPenagihanTermin'>
                                <div class="container">
                                    <div class="mb-3">
                                        <label for="surat_permohonan" class="form-label">Surat Permohonan</label>
                                        <select class="custom-select card-hover form-control" id="surat_permohonan"
                                            wire:model.live='surat_permohonan'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kwitansi_pembayaran" class="form-label">Kwitansi Pembayaran</label>
                                        <select class="custom-select card-hover form-control" id="kwitansi_pembayaran"
                                            wire:model.live='kwitansi_pembayaran'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bap" class="form-label">BAP</label>
                                        <select class="custom-select card-hover form-control" id="bap"
                                            wire:model.live='bap'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ssp_ppn_pph" class="form-label">SSP, PPN, PPH</label>
                                        <select class="custom-select card-hover form-control" id="ssp_ppn_pph"
                                            wire:model.live='ssp_ppn_pph'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="efaktur" class="form-label">Efaktur</label>
                                        <select class="custom-select card-hover form-control" id="efaktur"
                                            wire:model.live='efaktur'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kontrak" class="form-label">Kontrak</label>
                                        <select class="custom-select card-hover form-control" id="kontrak"
                                            wire:model.live='kontrak'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sppbj" class="form-label">SPPBJ</label>
                                        <select class="custom-select card-hover form-control" id="sppbj"
                                            wire:model.live='sppbj'>
                                            <option value="0">Belum Selesai</option>
                                            <option value="1">Selesai</option>
                                        </select>
                                    </div>
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

<div wire:ignore.self class="modal fade" id="lihatPenagihanTerminModal" data-backdrop="static" style="color: black"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail {{$nama_termin}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeData'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                <div class="mb-3">
                    <p>Progress :</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$percentage_termin}}%"
                            aria-valuenow="{{$percentage_termin}}" aria-valuemin="0" aria-valuemax="100">
                            {{$percentage_termin}}%</div>
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
                            <td style="text-transform: capitalize">{{ $pic }}
                                @if($pic_penagihan != NULL)
                                , {{$pic_penagihan}}
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>



                <hr style="border: .5px solid black;">

                <table class="table table-bordered table-hover bg-body-tertiary rounded shadow-sm "
                    style="color: black">
                    <tbody>
                        <tr class="table-primary">
                            <th colspan="2">
                                Tanggal BAST : @if($tgl_bast != NULL)
                                <b>{{date('d/m/Y', strtotime($tgl_bast)) }}</b>
                                @else
                                -
                                @endif
                            </th>
                            <th>Tanggal</th>
                            <th>Selisih Hari</th>
                        </tr>
                        <tr>
                            <th class="col-5">Surat Permohonan</th>
                            @if($surat_permohonan == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{date('d/m/Y', strtotime($surat_permohonan_tgl)) }}
                                {{-- {{$surat_permohonan_tgl }} --}}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($surat_permohonan == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($surat_permohonan_tgl) }} hari

                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">Kwitansi</th>
                            @if($kwitansi_pembayaran == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($kwitansi_pembayaran_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($kwitansi_pembayaran == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($kwitansi_pembayaran_tgl) }} hari
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">BAP</th>
                            @if($bap == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($bap_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($bap == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($bap_tgl) }} hari

                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">SSP/PPN/PPH</th>
                            @if($ssp_ppn_pph == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($ssp_ppn_pph_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($ssp_ppn_pph == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($ssp_ppn_pph_tgl) }} hari
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">Efaktur</th>
                            @if($efaktur == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($efaktur_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($efaktur == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($efaktur_tgl) }} hari
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">Kontrak</th>
                            @if($kontrak == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($kontrak_tgl_dp)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($kontrak == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($kontrak_tgl) }} hari

                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-5">SPPBJ</th>
                            @if($sppbj == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($sppbj_tgl)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif
                            <td>
                                @if($sppbj == 1)
                                {{ Carbon\Carbon::parse($tgl_bast)->diffInDays($sppbj_tgl) }} hari
                                @else
                                -
                                @endif
                            </td>
                        </tr>

                    </tbody>
                </table>





            </div>

            <div class="modal-footer ">
                <button button type="button" wire:click='closeData' class="btn btn-secondary form-control"
                    data-dismiss="modal">
                    <i class="fas fa-caret-left"></i> Kembali</button>
            </div>

        </div>
    </div>
</div>

@push('penagihan')
<script>
    window.addEventListener('show-penagihan-modal', event =>{
            $('#penagihanModal').modal('show');
        });
    window.addEventListener('hide-penagihan-modal', event =>{
            $('#penagihanModal').modal('hide');
        });
    window.addEventListener('show-lihat-penagihan-modal', event =>{
            $('#lihatPenagihanModal').modal('show');
        });
    window.addEventListener('show-input-dp-modal', event =>{
            $('#inputDpModal').modal('show');
        });
    window.addEventListener('hide-input-dp-modal', event =>{
            $('#inputDpModal').modal('hide');
        });
    window.addEventListener('show-ubah-dp-modal', event =>{
            $('#lihatPenagihanDpModal').modal('show');
        });
        window.addEventListener('show-input-termin-modal', event =>{
            $('#inputTerminModal').modal('show');
        });
        window.addEventListener('hide-input-termin-modal', event =>{
            $('#inputTerminModal').modal('hide');
        });
    window.addEventListener('show-lihat-termin-modal', event =>{
            $('#lihatPenagihanTerminModal').modal('show');
        });

        document.addEventListener('livewire:initialized', () =>{
        @this.on('update',(event) => {
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
        @this.on('dpUpdate',(event) => {
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
        @this.on('terminUpdate',(event) => {
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