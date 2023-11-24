@section('title')
Profile
@endsection
<div>
    @include('livewire.modal.profile-modal')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>

    <hr style="border: .5px solid black;">

    <div class="row">
        <div class="col-12 col-lg-6 mb-3">
            <div class="card shadow-sm card-shadow">
                {{-- <div class="card-header">
                    Featured
                </div> --}}
                <div class="text-center mt-3">
                    @if (Auth::user()->jk == 'L')
                    <img class="img-profile rounded-circle card-img-top" style="width: 45%;"
                        src="{{asset('sb-admin-2/img/2.jpg')}}">

                    @else
                    <img class="img-profile rounded-circle card-img-top" style="width: 45%;"
                        src="{{asset('sb-admin-2/img/5.jpg')}}">

                    @endif

                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">{{Auth::user()->nama}}</h5>
                    <hr>

                    <p class="card-text"><b>Informasi Detail</b></p>

                    <div class="card-hover">
                        <table class="table table-bordered  bg-body-tertiary rounded shadow-sm " style="color: black">
                            <tbody>
                                <tr>
                                    <th class="col-3">Username</th>
                                    <td>{{ Auth::user()->username }}</td>
                                </tr>
                                <tr>
                                    <th class="col-3">Role</th>
                                    <td style="text-transform: capitalize">{{ Auth::user()->role->name }}</td>
                                </tr>
                                <tr>
                                    <th class="col-4">Jenis Kelamin</th>
                                    <td>
                                        @if (Auth::user()->jk == 'L')
                                        Laki-laki
                                        @else
                                        Perempuan
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <button type="button" class="btn btn-primary form-control" wire:click='ubahProfile'>Ubah
                        Profile</button>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="row">
                {{-- <div class="col-12 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            Project berjalan
                        </div>
                        <div class="card-body">
                            @foreach ($project as $p)
                            <ul>
                                <li>
                                    <p class="card-text"> {{$p->nama_pengadaan}}</p>
                                    <div class="progress">
                                        <div class="progress-bar   @if($p->percentage == 100) bg-success @else progress-bar-striped progress-bar-animated @endif"
                                            role="progressbar" style="width: {{$p->percentage}}%"
                                            aria-valuenow="{{$p->percentage}}" aria-valuemin="0" aria-valuemax="100">
                                            @if($p->percentage == 100) complate! @else
                                            {{$p->percentage}}% @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                            </p>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <span>Jumlah Data : {{$project->total() }}</span> <br>
                                    <span>Jumlah Data Per Halaman : {{$project->count() }}</span>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    {{$project->links()}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-12 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            Ubah Password
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent='ubahPassword'>

                                <div class="mb-3">
                                    <label for="" class="form-label">Password Baru</label>
                                    <input type="text" class="form-control card-hover" wire:model.live='password_baru'>
                                    <div>
                                        @error('password_baru')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Ulangi Password</label>
                                    <input type="text" class="form-control card-hover"
                                        wire:model.live='password_confirm'>
                                    <div>
                                        @error('password_confirm')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary form-control">Ubah Password</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>