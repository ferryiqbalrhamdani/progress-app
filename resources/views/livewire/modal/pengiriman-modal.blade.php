<div wire:ignore.self class="modal fade" id="pengirimanModal" data-backdrop="static" style="color: black"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><b>Pengiriman <sup>(step 1)</sup></b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeData'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                <div class="mb-3">
                    <p>Progress :</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$percentage_pengiriman}}%"
                            aria-valuenow="{{$percentage_pengiriman}}" aria-valuemin="0" aria-valuemax="100">
                            {{$percentage_pengiriman}}%</div>
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
                                @if($pic_pengiriman != NULL)
                                , {{$pic_pengiriman}}
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>



                <hr style="border: .5px solid black;">
                <div class="container">
                    <form wire:submit.prevent='ubahDataPengiriman'>

                        <div class="container">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="jenis_pengiriman">Jenis Pengiriman</label>
                                    <select class="form-control card-hover" wire:model.live='jenis_pengiriman'
                                        id="jenis_pengiriman">
                                        <option value="Lengkap">Lengkap</option>
                                        <option value="Bertahap">Bertahap</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="tgl_pengiriman">Tanggal Pengiriman</label>
                                    <input type="date" id="tgl_pengiriman" wire:model.live='tgl_pengiriman'
                                        class="form-control card-hover">
                                    @error('tgl_pengiriman')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
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

<div wire:ignore.self class="modal fade" id="lihatPengirimanModal" data-backdrop="static" style="color: black"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Pengiriman Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeData'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                <div class="mb-3">
                    <p>Progress :</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$percentage_pengiriman}}%"
                            aria-valuenow="{{$percentage_pengiriman}}" aria-valuemin="0" aria-valuemax="100">
                            {{$percentage_pengiriman}}%</div>
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
                                @if($pic_pengiriman != NULL)
                                , {{$pic_pengiriman}}
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>



                <hr style="border: .5px solid black;">

                <div class="card shadow-sm">
                    <div class="card-header">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="jenis_pengiriman">Jenis Pengiriman</label>
                                <input type="text" value="{{$jenis_pengiriman}}" disabled
                                    class="form-control card-hover text-dark">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="tgl_pengiriman">Tanggal Pengiriman</label>
                                <input type="text" disabled id="tgl_pengiriman" value="{{$tgl_pengiriman}}"
                                    class="form-control card-hover text-dark">

                            </div>
                        </div>

                    </div>
                </div>
                <hr style="border: .5px solid black;">

                <div class="table-responsive" wire:poll.keep-alive>


                    <table class="table table-bordered table-hover shadow-sm" style="color: black; white-space: nowrap">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">No BA Anname</th>
                                <th scope="col">Tgl BA Anname</th>
                                <th scope="col">Selisih Tgl Per-Hari ini</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if($pengiriman->where('id_project', $id_project)->count() == 0)
                            <tr class="text-center">
                                <td colspan="5">Tidak ada data.</td>
                            </tr>
                            @else
                            @foreach ($pengiriman as $pn)
                            @if ($pn->id_project == $id_project)
                            <tr>
                                <td>{{ $pn->no_baanname }}
                                    @if($pn->status_no_baanname > 0)
                                    <sup>
                                        <span class="badge badge-danger">{{$pn->status_no_baanname}}</span>
                                    </sup>
                                    @endif
                                </td>
                                <td>{{Carbon\Carbon::parse($pn->tgl_baanname)->format('d/m/Y')}}
                                    @if($pn->status_tgl_baanname > 0)
                                    <sup>
                                        <span class="badge badge-danger">{{$pn->status_tgl_baanname}}</span>
                                    </sup>
                                    @endif
                                </td>
                                <td>{{ Carbon\Carbon::parse($pn->tgl_baanname)->diffInDays(Carbon\Carbon::now()) }}
                                    Hari</td>
                            </tr>
                            @endif
                            @endforeach

                            @endif
                        </tbody>
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">No BA Inname</th>
                                <th scope="col">Tgl BA Inname</th>
                                <th scope="col">Selisih Tgl Per-Hari ini</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if($pengiriman->where('id_project', $id_project)->count() == 0)
                            <tr class="text-center">
                                <td colspan="5">Tidak ada data.</td>
                            </tr>
                            @else
                            @foreach ($pengiriman as $pn)
                            @if ($pn->id_project == $id_project)
                            <tr>
                                <td>{{ $pn->no_bainname }}
                                    @if($pn->status_no_bainname > 0)
                                    <sup>
                                        <span class="badge badge-danger">{{$pn->status_no_bainname}}</span>
                                    </sup>
                                    @endif
                                </td>
                                <td>{{Carbon\Carbon::parse($pn->tgl_bainname)->format('d/m/Y')}}
                                    @if($pn->status_tgl_bainname > 0)
                                    <sup>
                                        <span class="badge badge-danger">{{$pn->status_tgl_bainname}}</span>
                                    </sup>
                                    @endif
                                </td>
                                <td>{{ Carbon\Carbon::now()->diffInDays($pn->tgl_bainname) }} Hari</td>
                            </tr>
                            @endif
                            @endforeach

                            @endif
                        </tbody>
                        <thead>
                            <tr class="table-primary">
                                <th>No BAST</th>
                                <th>Tgl BAST</th>
                                <th>Selisih Tgl Per-Hari ini</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($tgl_bast == NULL || $tgl_bast == NULL)
                            <tr class="text-center">
                                <td colspan="5">Tidak ada data.</td>
                            </tr>
                            @else
                            <tr>
                                <td>{{$no_bast}}</td>
                                <td>
                                    @if ($tgl_bast != NULL)
                                    {{Carbon\Carbon::parse($tgl_bast)->format('d/m/Y')}}
                                    @endif
                                </td>
                                <td>
                                    @if ($tgl_bast != NULL)
                                    {{ Carbon\Carbon::now()->diffInDays($tgl_bast) }} Hari
                                    @endif
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    {{-- <table class="table table-bordered table-hover shadow-sm"
                        style="color: black; white-space: nowrap">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">No BA Inname</th>
                                <th scope="col">Tgl BA Inname</th>
                                <th scope="col">Selisih Tgl Per-Hari ini</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if($pengiriman->where('id_project', $id_project)->count() == 0)
                            <tr class="text-center">
                                <td colspan="5">Tidak ada data.</td>
                            </tr>
                            @else
                            @foreach ($pengiriman as $pn)
                            @if ($pn->id_project == $id_project)
                            <tr>
                                <td>{{ $pn->no_bainname }}
                                    @if($pn->status_no_bainname > 0)
                                    <sup>
                                        <span class="badge badge-danger">{{$pn->status_no_bainname}}</span>
                                    </sup>
                                    @endif
                                </td>
                                <td>{{Carbon\Carbon::parse($pn->tgl_bainname)->format('d/m/Y')}}
                                    @if($pn->status_tgl_bainname > 0)
                                    <sup>
                                        <span class="badge badge-danger">{{$pn->status_tgl_bainname}}</span>
                                    </sup>
                                    @endif
                                </td>
                                <td>{{ Carbon\Carbon::now()->diffInDays($pn->tgl_bainname) }} Hari</td>
                            </tr>
                            @endif
                            @endforeach

                            @endif
                        </tbody>
                    </table>
                    <table class="table table-bordered table-hover shadow-sm" style="color: black; white-space: nowrap">
                        <thead>
                            <tr class="table-primary">
                                <th>No BAST</th>
                                <th>Tgl BAST</th>
                                <th>Selisih Tgl Per-Hari ini</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$no_bast}}</td>
                                <td>{{Carbon\Carbon::parse($tgl_bast)->format('d/m/Y')}}</td>
                                <td>{{ Carbon\Carbon::now()->diffInDays($tgl_bast) }} Hari</td>
                            </tr>
                        </tbody>
                    </table> --}}
                </div>





            </div>

            <div class="modal-footer ">
                <button button type="button" wire:click='closeData' class="btn btn-secondary form-control"
                    data-dismiss="modal">
                    <i class="fas fa-caret-left"></i> Kembali</button>
            </div>

        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="innameAnnameModal" data-backdrop="static" style="color: black"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><b>BA Anname & BA Inname <sup>(step 2)</sup></b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeData'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                <div class="mb-3">
                    <p>Progress :</p>
                    <div class="progress" wire:poll.keep-alive>
                        <div class="progress-bar   @if($percentage_pengiriman == 100) bg-success @else progress-bar-striped progress-bar-animated @endif"
                            role="progressbar" style="width: {{$percentage_pengiriman}}%"
                            aria-valuenow="{{$percentage_pengiriman}}" aria-valuemin="0" aria-valuemax="100">
                            @if($percentage_pengiriman == 100) complate!
                            @else
                            {{$percentage_pengiriman}}% @endif
                        </div>
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
                                @if($pic_pengiriman != NULL)
                                , {{$pic_pengiriman}}
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>



                <hr style="border: .5px solid black;">
                <div class="">

                    <div class="container">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="jenis_pengiriman">Jenis Pengiriman</label>
                                        <input type="text" value="{{$jenis_pengiriman}}" disabled
                                            class="form-control card-hover text-dark">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="tgl_pengiriman">Tanggal Pengiriman</label>
                                        <input type="text" disabled id="tgl_pengiriman" value="{{$tgl_pengiriman}}"
                                            class="form-control card-hover text-dark">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr style="border: .5px solid black;">

                        <form wire:submit.prevent='tambahPengiriman'>
                            {{-- <form wire:submit.prevent='ubahDataaja'> --}}
                                @if($pengiriman->where('id_project', $id_project)->count() == 0 || $jenis_pengiriman ==
                                'Bertahap')

                                <div class="mb-3">
                                    <b><u>BA Anname</u></b>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 mb-2">
                                            <label for="no_baanname" class="form-label">No BA Anname</label>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <input wire:model.live='no_baanname' id="no_baanname" type="text"
                                                class="form-control card-hover">
                                            <div>
                                                @error('no_baanname')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 mb-2">
                                            <label for="tgl_baanname" class="form-label">Tgl BA Anname</label>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <input wire:model.live='tgl_baanname' type="date"
                                                class="form-control card-hover" id="tgl_baanname">
                                            <div>
                                                @error('tgl_baanname')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr style="border: .5px solid black;">

                                <div class="mb-3">
                                    <b><u>BA Inname</u></b>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 mb-2">
                                            <label for="no_bainname" class="form-label ">No BA Inname</label>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <input type="text" class="form-control card-hover"
                                                wire:model.live='no_bainname'>
                                            <div>
                                                @error('no_bainname')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 mb-2">
                                            <label for="tgl_bainname" class="form-label">Tgl BA Inname</label>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <input wire:model.live='tgl_bainname' type="date"
                                                class="form-control card-hover">
                                            <div>
                                                @error('tgl_bainname')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($jenis_pengiriman == 'Lengkap')
                                <div class="mb-3 ">
                                    <button type="submit" class="btn btn-primary form-control"><i
                                            class="far fa-save"></i> Simpan</button>
                                </div>
                                @endif
                                @endif



                                {{-- {{$id_project}} --}}

                                @if($pengiriman->where('id_project', $id_project)->count() > 0 && $jenis_pengiriman ==
                                'Lengkap')

                                <div class="table-responsive" wire:poll.keep-alive>

                                    <table class="table table-bordered table-hover shadow-sm"
                                        style="color: black; white-space: nowrap">
                                        <thead>
                                            <tr class="table-primary">
                                                <th scope="col">No BA Anname</th>
                                                <th scope="col">Tgl BA Anname</th>
                                                <th scope="col">No BA Inname</th>
                                                <th scope="col">Tgl BA Inname</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($pengiriman->where('id_project', $id_project)->count() == 0)
                                            <tr class="text-center">
                                                <td colspan="5">Tidak ada data.</td>
                                            </tr>
                                            @else
                                            @foreach ($pengiriman as $pn)
                                            @if ($pn->id_project == $id_project)
                                            <tr>
                                                <td>{{ $pn->no_baanname }}
                                                    @if($pn->status_no_baanname > 0)
                                                    <sup>
                                                        <span
                                                            class="badge badge-danger">{{$pn->status_no_baanname}}</span>
                                                    </sup>
                                                    @endif
                                                </td>
                                                <td>{{ date('d/m/Y', strtotime($pn->tgl_baanname)) }}
                                                    @if($pn->status_tgl_baanname > 0)
                                                    <sup>
                                                        <span
                                                            class="badge badge-danger">{{$pn->status_tgl_baanname}}</span>
                                                    </sup>
                                                    @endif
                                                </td>
                                                <td>{{ $pn->no_bainname }}
                                                    @if($pn->status_no_bainname > 0)
                                                    <sup>
                                                        <span
                                                            class="badge badge-danger">{{$pn->status_no_bainname}}</span>
                                                    </sup>
                                                    @endif
                                                </td>
                                                <td>{{ date('d/m/Y', strtotime($pn->tgl_bainname)) }}
                                                    @if($pn->status_tgl_bainname > 0)
                                                    <sup>
                                                        <span
                                                            class="badge badge-danger">{{$pn->status_tgl_bainname}}</span>
                                                    </sup>
                                                    @endif
                                                </td>
                                                <td><a wire:click='ubahPengiriman({{$pn->id}})'
                                                        class="btn btn-sm btn-primary">ubah</a>
                                                    <a wire:click='hapusPengiriman({{$pn->id}})'
                                                        class="btn btn-sm btn-danger">hapus</a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach

                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                @endif

                                @if($jenis_pengiriman == 'Bertahap')

                                @if($pengiriman->where('id_project', $id_project)->count() == 0 || $jenis_pengiriman ==
                                'Bertahap')


                                <div class="mb-3 text-center">
                                    <a wire:click='tambahPengiriman' class="btn btn-primary">Tambah</a>
                                </div>
                                @endif


                                {{-- {{$id_project}} --}}

                                <div class="table-responsive" wire:poll.keep-alive>

                                    <table class="table table-bordered table-hover shadow-sm"
                                        style="color: black; white-space: nowrap">
                                        <thead>
                                            <tr class="table-primary">
                                                <th scope="col">No BA Anname</th>
                                                <th scope="col">Tgl BA Anname</th>
                                                <th scope="col">No BA Inname</th>
                                                <th scope="col">Tgl BA Inname</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($pengiriman->where('id_project', $id_project)->count() == 0)
                                            <tr class="text-center">
                                                <td colspan="5">Tidak ada data.</td>
                                            </tr>
                                            @else
                                            @foreach ($pengiriman as $pn)
                                            @if ($pn->id_project == $id_project)
                                            <tr>
                                                <td>{{ $pn->no_baanname }}
                                                    @if($pn->status_no_baanname > 0)
                                                    <sup>
                                                        <span
                                                            class="badge badge-danger">{{$pn->status_no_baanname}}</span>
                                                    </sup>
                                                    @endif
                                                </td>
                                                <td>{{ date('d/m/Y', strtotime($pn->tgl_baanname)) }}
                                                    @if($pn->status_tgl_baanname > 0)
                                                    <sup>
                                                        <span
                                                            class="badge badge-danger">{{$pn->status_tgl_baanname}}</span>
                                                    </sup>
                                                    @endif
                                                </td>
                                                <td>{{ $pn->no_bainname }}
                                                    @if($pn->status_no_bainname > 0)
                                                    <sup>
                                                        <span
                                                            class="badge badge-danger">{{$pn->status_no_bainname}}</span>
                                                    </sup>
                                                    @endif
                                                </td>
                                                <td>{{ date('d/m/Y', strtotime($pn->tgl_bainname)) }}
                                                    @if($pn->status_tgl_bainname > 0)
                                                    <sup>
                                                        <span
                                                            class="badge badge-danger">{{$pn->status_tgl_bainname}}</span>
                                                    </sup>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($pengiriman->where('id_project', $id_project)->count() == 0 ||
                                                    $jenis_pengiriman == 'Bertahap')
                                                    <a wire:click='ubahPengiriman({{$pn->id}})'
                                                        class="btn btn-sm btn-primary">ubah</a>
                                                    @endif
                                                    <a wire:click='hapusPengiriman({{$pn->id}})'
                                                        class="btn btn-sm btn-danger">hapus</a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach

                                            @endif
                                        </tbody>
                                    </table>
                                </div>


                                @endif


                                {{--
                                <hr style="border: .5px solid black;">
                                <div class="mb-3">
                                    <b><u>BAST</u></b>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 mb-2">
                                            <label for="bast" class="form-label mt-2">Nomor BAST</label>

                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <select class="custom-select card-hover form-control" id="bast"
                                                wire:model.live='bast'>
                                                <option value="0">Belum Selesai</option>
                                                <option value="1">Selesai</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-4 mb-2">
                                            <label for="bast" class="form-label mt-2">Tanggal Inname</label>

                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <input type="date" class="form-control card-hover">
                                        </div>
                                    </div>

                                </div> --}}


                    </div>
                </div>






            </div>


            </form>
            <div class="modal-footer d-flex justify-content-center ">
                @if($jenis_pengiriman == 'Bertahap')
                <button type="button" class="btn btn-secondary form-control" data-dismiss="modal">Kembali</button>
                @endif
            </div>

        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="bastModal" data-backdrop="static" style="color: black"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><b>BAST<sup>(step 3)</sup></b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeData'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <h5 class="text-center" style="color: black"><b>{{ $nama_pengadaan }}</b> </h5>
                <div class="mb-3">
                    <p>Progress :</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$percentage_pengiriman}}%"
                            aria-valuenow="{{$percentage_pengiriman}}" aria-valuemin="0" aria-valuemax="100">
                            {{$percentage_pengiriman}}%</div>
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
                                @if($pic_pengiriman != NULL)
                                , {{$pic_pengiriman}}
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>



                <hr style="border: .5px solid black;">
                <div class="container">


                    <div class="container">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="jenis_pengiriman">Jenis Pengiriman</label>
                                        <input type="text" value="{{$jenis_pengiriman}}" disabled
                                            class="form-control card-hover text-success">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="tgl_pengiriman">Tanggal Pengiriman</label>
                                        <input type="text" disabled id="tgl_pengiriman" value="{{$tgl_pengiriman}}"
                                            class="form-control card-hover text-success">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr style="border: .5px solid black;">




                        {{-- {{$id_project}} --}}

                        <div class="table-responsive" wire:poll.keep-alive>

                            <table class="table table-bordered table-hover shadow-sm"
                                style="color: black; white-space: nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-primary" scope="col">No BA Anname</th>
                                        <th class="table-primary" scope="col">Tgl BA Anname</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($pengiriman->where('id_project', $id_project)->count() == 0)
                                    <tr class="text-center">
                                        <td colspan="5">Tidak ada data.</td>
                                    </tr>
                                    @else
                                    @foreach ($pengiriman as $pn)
                                    @if ($pn->id_project == $id_project)
                                    <tr>
                                        <td>{{ $pn->no_baanname }}
                                            @if($pn->status_no_baanname > 0)
                                            <sup>
                                                <span class="badge badge-danger">{{$pn->status_no_baanname}}</span>
                                            </sup>
                                            @endif
                                        </td>
                                        <td>{{ date('d/m/Y', strtotime($pn->tgl_baanname)) }}
                                            @if($pn->status_tgl_baanname > 0)
                                            <sup>
                                                <span class="badge badge-danger">{{$pn->status_tgl_baanname}}</span>
                                            </sup>
                                            @endif
                                        </td>

                                    </tr>
                                    @endif
                                    @endforeach

                                    @endif
                                </tbody>
                            </table>
                            <table class="table table-bordered table-hover shadow-sm"
                                style="color: black; white-space: nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-danger" scope="col">No BA Inname</th>
                                        <th class="table-danger" scope="col">Tgl BA Inname</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($pengiriman->where('id_project', $id_project)->count() == 0)
                                    <tr class="text-center">
                                        <td colspan="5">Tidak ada data.</td>
                                    </tr>
                                    @else
                                    @foreach ($pengiriman as $pn)
                                    @if ($pn->id_project == $id_project)
                                    <tr>
                                        <td>{{ $pn->no_bainname }}
                                            @if($pn->status_no_bainname > 0)
                                            <sup>
                                                <span class="badge badge-danger">{{$pn->status_no_bainname}}</span>
                                            </sup>
                                            @endif
                                        </td>
                                        <td>{{ date('d/m/Y', strtotime($pn->tgl_bainname)) }}
                                            @if($pn->status_tgl_bainname > 0)
                                            <sup>
                                                <span class="badge badge-danger">{{$pn->status_tgl_bainname}}</span>
                                            </sup>
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach

                                    @endif
                                </tbody>
                            </table>
                        </div>



                        <hr style="border: .5px solid black;">
                        <form wire:submit.prevent='ubahBast'>
                            <div class="mb-3">
                                <b><u>BAST</u></b>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-12 col-lg-4 mb-2">
                                        <label for="bast" class="form-label mt-2">Nomor BAST</label>

                                    </div>
                                    <div class="col-12 col-lg-8">
                                        <input type="text" id="bast" wire:model.live='no_bast'
                                            class="form-control card-hover">
                                        @error('no_bast')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-lg-4 mb-2">
                                        <label for="tgl_bast" class="form-label mt-2">Tanggal BAST</label>

                                    </div>
                                    <div class="col-12 col-lg-8">
                                        <input type="date" id="tgl_bast" wire:model.live='tgl_bast'
                                            class="form-control card-hover">
                                        @error('tgl_bast')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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

<div wire:ignore.self class="modal fade" id="confirmModal" style="background: rgba(0, 0, 0, .5)" data-backdrop="static"
    style="color: black" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><b>Confirmation</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeData'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <h6 class="text-center" style="color: black">Jika anda merubah jenis pengiriman, maka <b>BA Anname</b> &
                    <b>BA
                        Inname</b> akan
                    terhapus!
                </h6>
            </div>

            <div class="modal-footer d-flex justify-content-center ">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <form wire:submit.prevent='hapusBaInnameBaAnname'>
                    <button type="submit" class="btn btn-danger">Ya! Hapus</button>
                </form>
            </div>

        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="ubahPengiriman" style="background: rgba(0, 0, 0, .5)"
    data-backdrop="static" style="color: black" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal" role="document">
        <div class="modal-content" style="color: black">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><b>Ubah BA Anname & BA Inname</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black">
                <form wire:submit.prevent='actionUbahPengiriman'>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="no_baanname_ubah" class="form-label">No BA Anname</label>
                                <input type="text" value="{{$no_baanname_ubah}}" id="no_baanname_ubah"
                                    wire:model.live='no_baanname_ubah' class="form-control card-hover">
                                @error('no_baanname_ubah')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="tgl_baanname_ubah" class="form-label">Tgl BA Anname</label>
                                <input type="date" value="{{$tgl_baanname_ubah}}" id="tgl_baanname_ubah"
                                    wire:model.live='tgl_baanname_ubah' class="form-control card-hover">
                                @error('tgl_baanname_ubah')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr style="border: .5px solid #e3e6f0;">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="no_bainname_ubah" class="form-label">No BA Inname</label>
                                <input type="text" value="{{$no_bainname_ubah}}" id="no_bainname_ubah"
                                    wire:model.live='no_bainname_ubah' class="form-control card-hover">
                                @error('no_bainname_ubah')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="tgl_bainname_ubah" class="form-label">Tgl BA Inname</label>
                                <input type="date" value="{{$tgl_bainname_ubah}}" id="tgl_bainname_ubah"
                                    wire:model.live='tgl_bainname_ubah' class="form-control card-hover">
                                @error('tgl_bainname_ubah')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>

            <div class="modal-footer d-flex justify-content-center ">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                </form>
            </div>

        </div>
    </div>
</div>

@push('pengiriman')
<script>
    window.addEventListener('show-pengiriman-modal', event =>{
            $('#pengirimanModal').modal('show');
        });
    window.addEventListener('hide-pengiriman-modal', event =>{
            $('#pengirimanModal').modal('hide');
        });
    window.addEventListener('show-lihat-pengiriman-modal', event =>{
            $('#lihatPengirimanModal').modal('show');
        });
    window.addEventListener('show-inname-anname-modal', event =>{
            $('#innameAnnameModal').modal('show');
        });
    window.addEventListener('hide-inname-anname-modal', event =>{
            $('#innameAnnameModal').modal('hide');
        });
    window.addEventListener('show-bast-modal', event =>{
            $('#bastModal').modal('show');
        });
    window.addEventListener('hide-bast-modal', event =>{
            $('#bastModal').modal('hide');
        });
    window.addEventListener('show-confirm-modal', event =>{
            $('#confirmModal').modal('show');
        });
    window.addEventListener('hide-confirm-modal', event =>{
            $('#pengirimanModal').modal('hide');
            $('#confirmModal').modal('hide');
        });
    window.addEventListener('show-ubah-pengiriman-modal', event => {
        $('#ubahPengiriman').modal('show');
    });
    window.addEventListener('hide-ubah-pengiriman-modal', event => {
        $('#ubahPengiriman').modal('hide');
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
        @this.on('stepSatuUbah',(event) => {
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
                timer: 5000,
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
        @this.on('ubahPengiriman',(event) => {
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
        @this.on('hapusStepDua',(event) => {
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