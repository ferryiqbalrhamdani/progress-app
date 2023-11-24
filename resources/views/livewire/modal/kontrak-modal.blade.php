<div wire:ignore.self class="modal fade" id="kontrakModal" data-backdrop="static" style="color: black"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Kontrak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeData'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                <div class="mb-3">
                    <p>Progress :</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$percentage_kontrak}}%"
                            aria-valuenow="{{$percentage_kontrak}}" aria-valuemin="0" aria-valuemax="100">
                            {{$percentage_kontrak}}%</div>
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
                                @if($pic_handle != NULL)
                                , {{$pic_handle}}
                                @endif</td>
                        </tr>
                    </tbody>
                </table>



                <hr style="border: .5px solid black;">
                <form wire:submit.prevent='ubahDataKontrak'>
                    <div class="container">
                        <div class="mb-3">
                            <label for="usul_pesanan" class="form-label">Usul Pesanan</label>
                            <select class="custom-select card-hover form-control" id="usul_pesanan"
                                wire:model.live='usul_pesanan'>
                                <option value="0">Belum Selesai</option>
                                <option value="1">Selesai</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sprinada" class="form-label">Sprinada</label>
                            <select class="custom-select card-hover form-control" id="sprinada"
                                wire:model.live='sprinada'>
                                <option value="0">Belum Selesai</option>
                                <option value="1">Selesai</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="prakualifikasi" class="form-label">Prakualifikasi</label>
                            <select class="custom-select card-hover form-control" id="prakualifikasi"
                                wire:model.live='prakualifikasi'>
                                <option value="0">Belum Selesai</option>
                                <option value="1">Selesai</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sph" class="form-label">SPH</label>
                            <select class="custom-select card-hover form-control" id="sph" wire:model.live='sph'>
                                <option value="0">Belum Selesai</option>
                                <option value="1">Selesai</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sppbj" class="form-label">SPPBJ</label>
                            <select class="custom-select card-hover form-control" id="sppbj" wire:model.live='sppbj'>
                                <option value="0">Belum Selesai</option>
                                <option value="1">Selesai</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="no_kontrak_kontrak" class="form-label">No Kontrak</label>
                            <select class="custom-select card-hover form-control" id="no_kontrak_kontrak"
                                wire:model.live='no_kontrak_kontrak'>
                                <option value="0">Belum Selesai</option>
                                <option value="1">Selesai</option>
                            </select>
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

<div wire:ignore.self class="modal fade" id="lihatKontrakModal" data-backdrop="static" style="color: black"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Kontrak Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeData'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                <div class="mb-3">
                    <p>Progress :</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$percentage_kontrak}}%"
                            aria-valuenow="{{$percentage_kontrak}}" aria-valuemin="0" aria-valuemax="100">
                            {{$percentage_kontrak}}%</div>
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
                                @if($pic_handle != NULL)
                                , {{$pic_handle}}
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
                            <th colspan="2"></th>
                            <th>Tanggal</th>
                        </tr>
                        <tr>
                            <th class="col-5">Usul Pesanan</th>
                            @if($usul_pesanan == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{date('d/m/Y', strtotime($tgl_usul_pesanan)) }}
                                {{-- {{ Carbon\Carbon::parse($l->tgl_lembur)->translatedFormat('l, d/m/Y')}} --}}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif

                        </tr>
                        <tr>
                            <th class="col-5">Sprinada</th>
                            @if($sprinada == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{date('d/m/Y', strtotime($tgl_sprinada)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif

                        </tr>
                        <tr>
                            <th class="col-5">Prakualifikasi</th>
                            @if($prakualifikasi == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{date('d/m/Y', strtotime($tgl_prakualifikasi)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif

                        </tr>
                        <tr>
                            <th class="col-5">SPH</th>
                            @if($sph == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{date('d/m/Y', strtotime($tgl_sph)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif

                        </tr>
                        <tr>
                            <th class="col-5">SPPBJ</th>
                            @if($sppbj == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{date('d/m/Y', strtotime($tgl_sppbj)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif

                        </tr>
                        <tr>
                            <th class="col-5">No Kontrak</th>
                            @if($no_kontrak_kontrak == 1)
                            <td>
                                <i class="fas fa-check-circle" style="color: #4E73DF;"></i>
                            </td>
                            <td>
                                {{date('d/m/Y', strtotime($tgl_no_kontrak_kontrak)) }}
                            </td>
                            @else
                            <td>
                                <i class="fas fa-times" style="color: #ce1717;"></i>
                            </td>
                            <td>
                                -
                            </td>
                            @endif

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

@push('kontrak')
<script>
    window.addEventListener('show-kontrak-modal', event =>{
            $('#kontrakModal').modal('show');
        });
    window.addEventListener('hide-kontrak-modal', event =>{
            $('#kontrakModal').modal('hide');
        });
    window.addEventListener('show-lihat-kontrak-modal', event =>{
            $('#lihatKontrakModal').modal('show');
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
</script>
@endpush