@section('title')
Penagihan
@endsection
<div>
    @include('livewire.modal.penagihan-modal')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penagihan</h1>
    </div>

    <!-- Content Row -->


    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Project List</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-3">
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
                                <input type="text" class="form-control card-hover" placeholder="cari no up"
                                    wire:model.live='search'>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" wire:poll.keep-alive>
                        <table class="table  table-hover table-bordered" style="color: black; white-space: nowrap">
                            <thead class="table-primary">
                                <tr>
                                    <th class="">
                                        PIC
                                        <span wire:click="sortBy('pic_id')" style="cursor: pointer; font-size: 10px">
                                            <i
                                                class="fa fa-arrow-up {{$sortField === 'pic_id' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                            <i
                                                class="fa fa-arrow-down {{$sortField === 'pic_id' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                        </span>
                                    </th>
                                    <th>
                                        No UP
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
                                        <span wire:click="sortBy('bobot_penagihan')"
                                            style="cursor: pointer; font-size: 10px">
                                            <i
                                                class="fa fa-arrow-up {{$sortField === 'bobot_penagihan' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                            <i
                                                class="fa fa-arrow-down {{$sortField === 'bobot_penagihan' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                        </span>
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                    <th class="text-center">
                                        Add-Ons
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($project->count() == 0)
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data.</td>
                                </tr>
                                @else
                                @foreach ($project as $p)
                                <tr>
                                    <td class="text-center" style="text-transform: capitalize">
                                        @foreach ($p->user()->get() as $user)
                                        <span class="badge badge-dark">{{$user->nama }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{$p->no_up }}
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar   @if(floor($p->percentage_penagihan_all) == 100) bg-success @else progress-bar-striped progress-bar-animated @endif"
                                                role="progressbar"
                                                style="width: {{floor($p->percentage_penagihan_all)}}%"
                                                aria-valuenow="{{floor($p->percentage_penagihan_all)}}"
                                                aria-valuemin="0" aria-valuemax="100">
                                                @if(floor($p->percentage_penagihan_all) == 100) complate!
                                                @else
                                                {{floor($p->percentage_penagihan_all)}}% @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button wire:click='lihatData({{$p->id}})' class="btn btn-sm btn-secondary">
                                            <i class="far fa-eye"></i> lihat data</button>
                                        <button wire:click='inputData({{$p->id}})' class="btn btn-sm btn-primary">
                                            <i class="far fa-edit"></i> ubah data</button>
                                    </td>
                                    <td class="text-center">

                                        @foreach ($dp as $d)
                                        @if ($d->project_id == $p->id)
                                        <button wire:click='lihatDataDp({{$p->id}})' class="btn btn-sm btn-secondary">
                                            <i class="far fa-eye"></i> lihat data DP</button>
                                        <button wire:click='inputDataDp({{$p->id}})' class="btn btn-sm btn-primary">
                                            <i class="far fa-edit"></i> ubah data DP</button>
                                        @endif
                                        @endforeach

                                        <?php $i=1; ?>
                                        <?php $j=1; ?>
                                        @foreach ($termin as $t)
                                        @if ($t->project_id == $p->id)
                                        <div class="mb-3">
                                            <form wire:submit.prevent='lihatDataTermin({{$t->id}})'
                                                style="display: inline-block;">
                                                <button type="submit" class="btn btn-sm btn-secondary">
                                                    <i class="far fa-eye"></i> lihat data Termin {{ $i++ }}
                                                </button>
                                            </form>
                                            <form wire:submit.prevent='inputDataTermin({{$t->id}})'
                                                style="display: inline-block;">
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    <i class="far fa-edit"></i> ubah data Termin {{ $j++ }}
                                                </button>
                                            </form>

                                        </div>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <span>Halaman : {{ $project->currentPage() }} </span><br />
                            <span>Jumlah Data : @if($search == '') {{$project->total()}} @else {{$project->count() }}
                                @endif</span><br />
                            <span>Data Per Halaman : {{ $project->perPage()}} </span><br /><br />
                        </div>
                        <div class="col-12 col-lg-4 d-flex justify-content-end">
                            {{$project->links()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>

</div>