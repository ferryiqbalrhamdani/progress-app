@section('title')
Daftar PIC
@endsection
<div>
    @include('livewire.modal.daftar-pic-modal')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar PIC</h1>
    </div>

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar PIC</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <div class="mb-3">
                                Show <select class="form-select form-select-lg card-hover"
                                    aria-label="Small select example" wire:model.live='perPage'>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                </select> entries
                            </div>
                        </div>
                        <div class="col-12 col-lg-6"></div>
                        <div class="col-12 col-lg-3">
                            <div class="mb-3 shadow-sm ">
                                <input type="text" class="form-control card-hover" placeholder="cari data"
                                    wire:model.live='search'>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" style="color: black">
                            <thead class="table-primary">
                                <tr>
                                    <th>
                                        Nama
                                        <span wire:click.prevent="sortBy('nama')"
                                            style="cursor: pointer; font-size: 12px" class="float-right">
                                            <i
                                                class="fa fa-arrow-up {{$sortField === 'nama' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                            <i
                                                class="fa fa-arrow-down {{$sortField === 'nama' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                        </span>
                                    </th>
                                    <th>
                                        Tgl Input
                                        <span wire:click.prevent="sortBy('created_at')"
                                            style="cursor: pointer; font-size: 12px" class="float-right">
                                            <i
                                                class="fa fa-arrow-up {{$sortField === 'created_at' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                            <i
                                                class="fa fa-arrow-down {{$sortField === 'created_at' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                        </span>
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($pic->count() == 0 )
                                <tr>
                                    <td colspan="3" class="text-center">tidak ada data.</td>
                                </tr>
                                @else
                                @foreach ($pic as $p)
                                <tr>
                                    <td scope="row" style="text-transform: capitalize">{{$p->nama}}</td>
                                    <td scope="row">{{ Carbon\Carbon::parse($p->created_at)->translatedFormat('d/m/Y')}}
                                    </td>
                                    <td class="text-center">
                                        <button wire:click='detail({{$p->id}})' class="btn btn-info btn-circle btn-sm"
                                            data-toggle="tooltip" data-placement="bottom" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <span>Halaman : {{ $pic->currentPage() }} </span><br />
                            <span>Jumlah Data : @if($search == '') {{$total}} @else {{$pic->count() }} @endif
                            </span><br />
                            <span>Data Per Halaman : {{ $pic->perPage()}} </span><br /><br />
                        </div>
                        <div class="col-12 col-lg-6 d-flex justify-content-end">
                            {{$pic->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>