@section('title')
Users
@endsection
<div>
    @include('livewire.modal.users-modal')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
            <i class="fas fa-user-plus"></i> Tambah User
        </button>

    </div>


    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">User List</h6>
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
                                <input type="text" class="form-control card-hover" placeholder="cari nama user"
                                    wire:model.live='search'>
                            </div>
                        </div>
                    </div>
                    {{-- @if ($successMessage != null)
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert" wire:click='closeAlert'>×</button>
                        <strong>{{ $successMessage }}</strong>
                    </div>
                    @endif --}}
                    <div class="table-responsive" wire:poll.keep-alive>
                        <table class="table  table-hover table-bordered" style="color: black; white-space: nowrap">
                            <thead class="table-primary">
                                <tr>
                                    <th class="">
                                        Nama
                                        <span wire:click="sortBy('nama')" style="cursor: pointer; font-size: 10px">
                                            <i
                                                class="fa fa-arrow-up {{$sortField === 'nama' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                            <i
                                                class="fa fa-arrow-down {{$sortField === 'nama' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                        </span>
                                    </th>
                                    <th>
                                        Username
                                        <span wire:click="sortBy('username')" style="cursor: pointer; font-size: 10px">
                                            <i
                                                class="fa fa-arrow-up {{$sortField === 'username' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                            <i
                                                class="fa fa-arrow-down {{$sortField === 'username' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                        </span>
                                    </th>
                                    <th>
                                        JK
                                        <span wire:click="sortBy('jk')" style="cursor: pointer; font-size: 10px">
                                            <i
                                                class="fa fa-arrow-up {{$sortField === 'jk' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                            <i
                                                class="fa fa-arrow-down {{$sortField === 'jk' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                        </span>
                                    </th>
                                    <th>
                                        Role
                                        <span wire:click="sortBy('role_id')" style="cursor: pointer; font-size: 10px">
                                            <i
                                                class="fa fa-arrow-up {{$sortField === 'role_id' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                            <i
                                                class="fa fa-arrow-down {{$sortField === 'role_id' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                        </span>
                                    </th>
                                    <th>
                                        Status
                                        <span wire:click="sortBy('status')" style="cursor: pointer; font-size: 10px">
                                            <i
                                                class="fa fa-arrow-up {{$sortField === 'status' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                            <i
                                                class="fa fa-arrow-down {{$sortField === 'status' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                        </span>
                                    </th>
                                    <th>
                                        Tgl Input
                                        <span wire:click="sortBy('created_at')"
                                            style="cursor: pointer; font-size: 10px">
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
                                @if($users->count() == 0)
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data.</td>
                                </tr>
                                @else
                                @foreach ($users as $u)
                                <tr>
                                    <td>
                                        {{$u->nama }}
                                    </td>
                                    <td>
                                        {{$u->username }}
                                    </td>
                                    <td>
                                        {{$u->jk }}
                                    </td>
                                    <td>
                                        <p class="badge badge-dark">{{$u->role->name}}</p>
                                        @if($u->role_id == 3)
                                        <p class="badge badge-dark">PIC</p>
                                        @endif
                                    </td>
                                    <td>
                                        <button wire:click='statusAction({{$u->id}})'
                                            class="btn btn-sm @if($u->status == 1) btn-primary @else btn-danger @endif"
                                            @if($u->role_id == 1) disabled @endif>@if($u->status
                                            == 1) Active @else Inactive @endif</button>
                                    </td>
                                    <td>
                                        {{$u->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary" @if($u->role_id == 1) disabled @endif
                                            data-toggle="tooltip" data-placement="left" title="Ubah user"
                                            wire:click='ubahUser({{$u->id}})'><i class="fas fa-user-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-secondary" @if($u->role_id == 1) disabled @endif
                                            data-toggle="tooltip" data-placement="left" title="Reset password user"
                                            wire:click='resetPassword({{$u->id}})'><i class="fas fa-user-cog"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" @if($u->role_id == 1) disabled @endif
                                            data-toggle="tooltip" data-placement="left" title="Hapus user"
                                            wire:click='hapusUser({{$u->id}})'><i class="fas fa-user-times"></i>
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
                            <span>Halaman : {{ $users->currentPage() }} </span><br />
                            <span>Jumlah Data : @if($search == '') {{$users->total()}} @else {{$users->count() }}
                                @endif</span><br />
                            <span>Data Per Halaman : {{ $users->perPage()}} </span><br /><br />
                        </div>
                        <div class="col-12 col-lg-4 d-flex justify-content-end">
                            {{$users->links()}}

                        </div>
                    </div>
                    <!-- button to initialize toast -->

                    @if ($successMessage != null)

                    <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; top: 0;">

                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert" wire:click='closeAlert'>×</button>
                            <strong style="margin-right: 50px">{{ $successMessage }}</strong>
                        </div>
                    </div>

                    @endif

                </div>
            </div>
        </div>




    </div>

</div>