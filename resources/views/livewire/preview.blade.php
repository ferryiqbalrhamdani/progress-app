@section('title')
    Preview
@endsection
<div>
    {{-- @include('livewire.modal.project-modal') --}}
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Project</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{$no_up}}</h6>
                    <button class="btn  btn-primary" data-toggle="modal" data-target="#staticBackdrop">Tambah Data</button>
                    
                </div>
                <!-- Card Body -->
                {{-- <div class="card-body">
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
                                <input type="text" class="form-control card-hover" placeholder="cari data keperluan cuti" wire:model.live='search'>
                            </div>
                        </div>
                    </div>
                   <div class="table-responsive">
                        <table class="table table-striped table-bordered" style="color: black">
                            <thead class="table-primary" >
                                <tr>
                                    <th>
                                        Nama
                                        <span wire:click.prevent="sortBy('users.name')" style="cursor: pointer; font-size: 12px" class="float-right">
                                            <i class="fa fa-arrow-up text-muted"></i>
                                            <i class="fa fa-arrow-down "></i>
                                        </span>
                                    </th>
                                    <th>
                                        Nama Project
                                        <span wire:click.prevent="sortBy('users.name')" style="cursor: pointer; font-size: 12px" class="float-right">
                                            <i class="fa fa-arrow-up "></i>
                                            <i class="fa fa-arrow-down "></i>
                                        </span>
                                    </th>
                                    <th>
                                        Progress
                                        <span wire:click.prevent="sortBy('users.name')" style="cursor: pointer; font-size: 12px" class="float-right">
                                            <i class="fa fa-arrow-up "></i>
                                            <i class="fa fa-arrow-down "></i>
                                        </span>
                                    </th>
                                    <th class="text-center">
                                        Action
                                        <span wire:click.prevent="sortBy('users.name')" style="cursor: pointer; font-size: 12px" class="float-right">
                                            <i class="fa fa-arrow-up "></i>
                                            <i class="fa fa-arrow-down "></i>
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">sadsa</td>
                                    <td>sdaada</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 60%"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ubah">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">asdsa</td>
                                    <td>asdad</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Complete!</div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ubah">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">asdsa</td>
                                    <td>asdad</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Complete!</div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ubah">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">asdsa</td>
                                    <td>asdad</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Complete!</div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ubah">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">asdsa</td>
                                    <td>asdad</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Complete!</div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ubah">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">asdsa</td>
                                    <td>asdad</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Complete!</div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ubah">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                   </div>
                </div> --}}
            </div>
        </div>

        

        
    </div>

    

    
</div>
