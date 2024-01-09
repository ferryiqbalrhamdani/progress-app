@section('title')
Project
@endsection
<div>
    @include('livewire.modal.project-modal')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Project</h1>
        {{-- <div wire:poll.keep-alive>
            Jam: {{ now()->format('H:i:s') }}
        </div> --}}
    </div>

    <!-- Content Row -->




    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Project List</h6>

                    <div class="">
                        <button class="btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                            data-target="#staticBackdrop">Tambah Data
                        </button>

                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body" style="color: black;">
                    <div class="container">

                        <div class="row">
                            <div class="col-12 col-lg-3">
                                <div class="mb-3">
                                    Show <select class="form-select form-select-lg card-hover"
                                        aria-label="Small select example" wire:model.live='perPage'>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="500">500</option>
                                    </select> entries
                                </div>

                            </div>
                            <div class="col-12 col-lg-6"></div>
                            <div class="col-12 col-lg-3">
                                <div class="mb-3 shadow-sm ">
                                    <input type="text" class="form-control card-hover"
                                        placeholder="nama project atau no up" wire:model.live='search'>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" wire:poll.keep-alive>
                            <table class="table table-hover table-bordered" style="color: black; white-space: nowrap">
                                <thead class="table-primary">
                                    <tr>
                                        <th class="">
                                            PIC
                                            <span wire:click="sortBy('pic_id')"
                                                style="cursor: pointer; font-size: 10px">
                                                <i
                                                    class="fa fa-arrow-up {{$sortField === 'pic_id' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                                <i
                                                    class="fa fa-arrow-down {{$sortField === 'pic_id' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                            </span>
                                        </th>
                                        <th>
                                            Nama Project
                                            <span wire:click="sortBy('nama_pengadaan')"
                                                style="cursor: pointer; font-size: 10px">
                                                <i
                                                    class="fa fa-arrow-up {{$sortField === 'nama_pengadaan' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                                <i
                                                    class="fa fa-arrow-down {{$sortField === 'nama_pengadaan' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                            </span>
                                        </th>
                                        <th>
                                            Progress
                                            <span wire:click="sortBy('percentage')"
                                                style="cursor: pointer; font-size: 10px">
                                                <i
                                                    class="fa fa-arrow-up {{$sortField === 'percentage' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                                <i
                                                    class="fa fa-arrow-down {{$sortField === 'percentage' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                            </span>
                                        </th>
                                        <th class="text-center">
                                            Step 1

                                        </th>
                                        <th class="text-center">
                                            Step 2

                                        </th>
                                        <th class="text-center">
                                            Step 3

                                        </th>
                                        <th class="text-center">
                                            Action

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($admin->count() == 0)
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data.</td>
                                    </tr>
                                    @else
                                    @foreach ($admin as $a)
                                    <tr>
                                        <td class="text-center" style="text-transform: capitalize">
                                            @foreach ($a->user()->get() as $user)
                                            <span class="badge badge-dark">{{$user->nama }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a wire:click='viewDetail({{ $a->id }})' style="cursor: pointer">{{
                                                $a->nama_pengadaan }}</a>
                                        </td>
                                        <td>
                                            @foreach ($a->bobot()->get() as $bobot)
                                            <div class="progress">
                                                <div class="progress-bar   @if($bobot->bobot_kontrak +
                                                $bobot->bobot_penagihan + $bobot->bobot_pengiriman +
                                                $bobot->bobot_marcendiser == 100) bg-success @else progress-bar-striped progress-bar-animated @endif"
                                                    role="progressbar" style="width: {{$bobot->bobot_kontrak +
                                                $bobot->bobot_penagihan + $bobot->bobot_pengiriman +
                                                $bobot->bobot_marcendiser}}%" aria-valuenow="{{$bobot->bobot_kontrak +
                                                $bobot->bobot_penagihan + $bobot->bobot_pengiriman +
                                                $bobot->bobot_marcendiser}}" aria-valuemin="0" aria-valuemax="100">
                                                    @if($bobot->bobot_kontrak +
                                                    $bobot->bobot_penagihan + $bobot->bobot_pengiriman +
                                                    $bobot->bobot_marcendiser == 100) complate! @else
                                                    {{$bobot->bobot_kontrak +
                                                    $bobot->bobot_penagihan + $bobot->bobot_pengiriman +
                                                    $bobot->bobot_marcendiser}}% @endif
                                                </div>
                                            </div>

                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            <button type="button" wire:click='lihatStepSatu({{$a->id}})'
                                                class="btn btn-secondary btn-circle btn-sm" data-toggle="modal"
                                                data-target="#stepSatu" data-toggle="tooltip" title='Lihat Detail'>
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="submit" wire:click='ubahStepSatu({{$a->id}})'
                                                class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip"
                                                title='Ubah Data'>
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            @if($a->status_dua > 0)
                                            <button type="button" wire:click='lihatStepDua({{$a->id}})'
                                                class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip"
                                                title='Lihat Detail'>
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="submit" wire:click='ubahStepDua({{$a->id}})'
                                                class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip"
                                                title='Ubah Data'>
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            @else
                                            <button type="submit" wire:click='inputStepDua({{$a->id}})'
                                                class="btn btn-primary btn-sm">
                                                input data
                                            </button>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($a->status_tiga > 0)
                                            <button type="button" wire:click='lihatStepTiga({{$a->id}})'
                                                class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip"
                                                title='Lihat Detail'>
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="submit" wire:click='ubahStepTiga({{$a->id}})'
                                                class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip"
                                                title='Ubah Data'>
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            @else
                                            <button wire:click='inputStepTiga({{$a->id}})' type="button"
                                                class="btn btn-sm btn-primary" @if($a->status_dua == 0)
                                                disabled @endif>input
                                                data</button>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <button type="button" wire:click='viewDetail({{ $a->id }})'
                                                class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip"
                                                title='Lihat Detail Data'>
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" wire:click='claimGaransiProject({{$a->id}})'
                                                class="btn btn-dark btn-circle btn-sm" data-toggle="tooltip"
                                                title='Claim Garansi'>
                                                <i class="fas fa-shield-virus"></i>
                                            </button>
                                            <button type="button" wire:click='hapusProject({{$a->id}})'
                                                class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip"
                                                title='Hapus Data'>
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <span>Halaman : {{ $admin->currentPage() }} </span><br />
                                <span>Jumlah Data : @if($search == '') {{$admin->total()}} @else {{$admin->count() }}
                                    @endif</span><br />
                                <span>Data Per Halaman : {{ $admin->perPage()}} </span><br /><br />
                            </div>
                            <div class="col-12 col-lg-4 d-flex justify-content-end">
                                {{$admin->links()}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>




</div>