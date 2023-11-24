@section('title')
Dashboard
@endsection
<div>
    @include('livewire.modal.tambah-data-project')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>





    <div class="row">
        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left-success card-hover h-100 py-2 card-shadow" style="cursor: pointer">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                TOTAL NILAI PROJECT</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                                {{number_format($project->pluck('nilai_kontrak')->sum(), 0,',','.')}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1.8em" viewBox="0 0 512 512">
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <style>
                                    svg {
                                        fill: #DDDFEB
                                    }
                                </style>
                                <path
                                    d="M0 64C0 46.3 14.3 32 32 32h80c79.5 0 144 64.5 144 144c0 58.8-35.2 109.3-85.7 131.7l51.4 128.4c6.6 16.4-1.4 35-17.8 41.6s-35-1.4-41.6-17.8L106.3 320H64V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V288 64zM64 256h48c44.2 0 80-35.8 80-80s-35.8-80-80-80H64V256zm256-96h80c61.9 0 112 50.1 112 112s-50.1 112-112 112H352v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V352 192c0-17.7 14.3-32 32-32zm80 160c26.5 0 48-21.5 48-48s-21.5-48-48-48H352v96h48z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left-danger card-hover h-100 py-2 card-shadow" style="cursor: pointer">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                TOTAL NILAI DP</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                                {{number_format($project->pluck('nilai_dp')->sum(), 0,',','.')}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1.8em" viewBox="0 0 512 512">
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <style>
                                    svg {
                                        fill: #DDDFEB
                                    }
                                </style>
                                <path
                                    d="M0 64C0 46.3 14.3 32 32 32h80c79.5 0 144 64.5 144 144c0 58.8-35.2 109.3-85.7 131.7l51.4 128.4c6.6 16.4-1.4 35-17.8 41.6s-35-1.4-41.6-17.8L106.3 320H64V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V288 64zM64 256h48c44.2 0 80-35.8 80-80s-35.8-80-80-80H64V256zm256-96h80c61.9 0 112 50.1 112 112s-50.1 112-112 112H352v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V352 192c0-17.7 14.3-32 32-32zm80 160c26.5 0 48-21.5 48-48s-21.5-48-48-48H352v96h48z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left-warning card-hover h-100 py-2 card-shadow" style="cursor: pointer">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                TOTAL NILAI TERMIN</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                                {{number_format($termin->pluck('value')->sum(), 0,',','.')}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1.8em" viewBox="0 0 512 512">
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <style>
                                    svg {
                                        fill: #DDDFEB
                                    }
                                </style>
                                <path
                                    d="M0 64C0 46.3 14.3 32 32 32h80c79.5 0 144 64.5 144 144c0 58.8-35.2 109.3-85.7 131.7l51.4 128.4c6.6 16.4-1.4 35-17.8 41.6s-35-1.4-41.6-17.8L106.3 320H64V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V288 64zM64 256h48c44.2 0 80-35.8 80-80s-35.8-80-80-80H64V256zm256-96h80c61.9 0 112 50.1 112 112s-50.1 112-112 112H352v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V352 192c0-17.7 14.3-32 32-32zm80 160c26.5 0 48-21.5 48-48s-21.5-48-48-48H352v96h48z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 col-6 mb-4 ">
            <div class="card border-left-primary h-100 py-2 card-hover card-shadow" style="cursor: pointer">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Project</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($project->count(),
                                0,',','.') }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 col-6 mb-4">
            <div class="card border-left-dark card-hover h-100 py-2 card-shadow" style="cursor: pointer">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                PROJECT BERJALAN</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{number_format($project->where('status_project', 1)->count(),0,',','.')}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tasks fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 col-6 mb-4">
            <div class="card border-left-info card-hover h-100 py-2 card-shadow" style="cursor: pointer">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                TOTAL PIC</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{number_format($users->count(),0,',','.')}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 col-6 mb-4">
            <div class="card border-left-warning card-hover h-100 py-2 card-shadow" style="cursor: pointer">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                TOTAL USER</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{number_format($all_users->count(),0,',','.')}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->


    <div class="row">

        <div class="col-xl-8 col-lg-9 ">

            <!-- Area Chart -->
            <div class="card shadow-sm card-hover mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Line Chart</h6>
                </div>
                <div class="card-body">
                    {{-- <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="limit">Limit Data</label>
                                <select class="form-control" id="limit" wire:model.live='limit'>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Example select</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Example select</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div> --}}
                    <div>
                        <canvas id="myChart" style="height: 300px !important; "></canvas>
                    </div>

                </div>
            </div>



        </div>

        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-3">
            <div class="card shadow-sm mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pie Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div>
                        <canvas id="pieChart" style="height: 500px !important; "></canvas>
                    </div>
                </div>
                <hr style="margin-bottom: 0.9rem;border-top: 1px  rgba(0,0,0,.1);">
            </div>
        </div>







        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Project List</h6>

                    {{-- <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div> --}}
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
                                <input type="text" class="form-control card-hover" placeholder="cari project">
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" style="color: black">
                            <thead class="table-primary">
                                <tr>
                                    <th>
                                        Nama
                                        <span wire:click.prevent="sortBy('users.name')"
                                            style="cursor: pointer; font-size: 12px" class="float-right">
                                            <i class="fa fa-arrow-up text-muted"></i>
                                            <i class="fa fa-arrow-down "></i>
                                        </span>
                                    </th>
                                    <th>
                                        Nama Project
                                        <span wire:click.prevent="sortBy('users.name')"
                                            style="cursor: pointer; font-size: 12px" class="float-right">
                                            <i class="fa fa-arrow-up "></i>
                                            <i class="fa fa-arrow-down "></i>
                                        </span>
                                    </th>
                                    <th>
                                        Progress
                                        <span wire:click.prevent="sortBy('users.name')"
                                            style="cursor: pointer; font-size: 12px" class="float-right">
                                            <i class="fa fa-arrow-up "></i>
                                            <i class="fa fa-arrow-down "></i>
                                        </span>
                                    </th>
                                    <th class="text-center">
                                        Action
                                        <span wire:click.prevent="sortBy('users.name')"
                                            style="cursor: pointer; font-size: 12px" class="float-right">
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
                                        <a href="#" class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip"
                                            data-placement="bottom" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">asdsa</td>
                                    <td>asdad</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Complete!
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip"
                                            data-placement="bottom" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">asdsa</td>
                                    <td>asdad</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Complete!
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip"
                                            data-placement="bottom" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">asdsa</td>
                                    <td>asdad</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Complete!
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip"
                                            data-placement="bottom" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">asdsa</td>
                                    <td>asdad</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Complete!
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip"
                                            data-placement="bottom" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">asdsa</td>
                                    <td>asdad</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Complete!
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip"
                                            data-placement="bottom" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>




    </div>




</div>

@push('dashboard')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
    integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

<script>
    // setInterval(() =>  @this.dispatch('ubahData'), 3000);
    var chartData = JSON.parse(`<?php echo $project_chart ?>`);
    console.log(chartData);
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: chartData.label,
            datasets: [{
                label: 'Rp',
                data: chartData.data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            
        }
    });
    // @this.on('berhasilUpdate', event =>{
    //     var chartData = JSON.parse(event.data);
    //     console.log(chartData);
    //     });



    const pie = document.getElementById('pieChart').getContext('2d');
    const pieChart = new Chart(pie, {
        type: 'pie',
        data: {
            labels: chartData.label,
            datasets: [{
                label: 'Rp',
                data: chartData.data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            
        }
    });
</script>



@endpush