@section('title')
    Daftar PT
@endsection
<div>
    @include('livewire.modal.daftar-pt-modal')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar PT</h1>
    </div>

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar PT</h6>
                    <button class="btn  btn-primary" data-toggle="modal" data-target="#tambahData">Tambah Data</button>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <div class="mb-3">
                                Show <select class="form-select form-select-lg card-hover" aria-label="Small select example" wire:model.live='perPage'>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                </select> entries
                            </div>
                        </div>
                        <div class="col-12 col-lg-6"></div>
                        <div class="col-12 col-lg-3">
                            <div class="mb-3 shadow-sm ">
                                <input type="text" class="form-control card-hover" placeholder="cari data" wire:model.live='search'>
                            </div>
                        </div>
                    </div>
                   <div class="table-responsive">
                        <table class="table table-striped table-bordered" style="color: black">
                            <thead class="table-primary" >
                                <tr>
                                    <th>
                                        Nama
                                        <span wire:click.prevent="sortBy('name')" style="cursor: pointer; font-size: 12px" class="float-right">
                                            <i class="fa fa-arrow-up {{$sortField === 'name' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                            <i class="fa fa-arrow-down {{$sortField === 'name' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                        </span>
                                    </th>
                                    <th>
                                        Tgl Input
                                        <span wire:click.prevent="sortBy('created_at')" style="cursor: pointer; font-size: 12px" class="float-right">
                                            <i class="fa fa-arrow-up {{$sortField === 'created_at' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                            <i class="fa fa-arrow-down {{$sortField === 'created_at' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                        </span>
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($daftarPt->count() == 0 )
                                    <tr>
                                        <td colspan="3" class="text-center">tidak ada data.</td>
                                    </tr>
                                @else
                                    @foreach ($daftarPt as $d)
                                        <tr>
                                            <td scope="row">{{$d->name}}</td>
                                            <td scope="row">{{ Carbon\Carbon::parse($d->created_at)->translatedFormat('d/m/Y')}}</td>
                                            <td class="text-center">
                                                <button wire:click='ubah({{$d->id}})' class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ubah">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button wire:click='hapus({{$d->id}})' class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus">
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
                        <div class="col-12 col-lg-6">
                            <span>Halaman : {{ $daftarPt->currentPage() }} </span><br/>
                            <span>Jumlah Data : @if($search == '') {{$total}} @else {{$daftarPt->count() }} @endif  </span><br/>
                            <span>Data Per Halaman : {{ $daftarPt->perPage()}} </span><br/><br/>
                        </div>
                        <div class="col-12 col-lg-6 d-flex justify-content-end">
                            {{$daftarPt->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        
    </div>
</div>
