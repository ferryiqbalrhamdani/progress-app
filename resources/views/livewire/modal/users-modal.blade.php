<!-- Modal -->
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" style="color: black">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='tambahUser'>
                    <div class="container">

                        <div class="form-outline mb-4">
                            <label class="form-label" for="username">Username<span class="text-danger">*</span></label>
                            <input type="text" id="username"
                                class="form-control form-control card-hover card-shadow @error('username') is-invalid @enderror"
                                wire:model.live='username'>
                            <div>@error('username') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-outline">
                            <label class="form-label" for="password">Password<span class="text-danger">*</span></label>
                            <input @if($showpassword==false) type="password" @else type="text" @endif id="password"
                                wire:model.live='password'
                                class="form-control form-control card-hover card-shadow @error('password') is-invalid @enderror" />
                        </div>

                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content-start ">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3"
                                wire:click='openPas()' />
                            <label class="form-check-label" for="form1Example3"> Show password </label>
                        </div>

                        <div class="mb-4">@error('password') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="nama">Nama<span class="text-danger">*</span></label>
                            <input type="text" id="nama"
                                class="form-control form-control card-hover card-shadow @error('nama') is-invalid @enderror"
                                wire:model.live='nama'>
                            <div>@error('nama') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                        </div>
                        <div class="form-outline mb-4">
                            <label for="" class="form-label">Jenis Kelamin<span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-check ">
                                        <input class="form-check-input " type="radio" value="L" name="jk"
                                            wire:model.live='jk' id="jk1" checked>
                                        <label class="form-check-label " for="jk1">
                                            Laki-laki
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="P" name="jk"
                                            wire:model.live='jk' id="jk2">
                                        <label class="form-check-label" for="jk2">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div>@error('jk') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                        </div>
                        <div class="form-outline mb-4">
                            <label for="role_id">Role User<span class="text-danger">*</span></label>
                            <select class="form-control card-hover" id="role" wire:model.live='role_id'>
                                <option></option>
                                @foreach ($role as $r)
                                <option value="{{$r->id}}">{{$r->name}}</option>
                                @endforeach
                            </select>
                            <div>
                                @error('role_id') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>

                        </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary form-control"><i class="fas fa-save"></i> Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="ubahUser" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" style="color: black">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeUbah'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='ubah'>
                    <div class="container">

                        <div class="form-outline mb-4">
                            <label class="form-label" for="username">Username<span class="text-danger">*</span></label>
                            <input type="text" id="username"
                                class="form-control form-control card-hover card-shadow @error('username') is-invalid @enderror"
                                wire:model.live='username'>
                            <div>@error('username') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="nama">Nama<span class="text-danger">*</span></label>
                            <input type="text" id="nama"
                                class="form-control form-control card-hover card-shadow @error('nama') is-invalid @enderror"
                                wire:model.live='nama'>
                            <div>@error('nama') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                        </div>
                        <div class="form-outline mb-4">
                            <label for="" class="form-label">Jenis Kelamin<span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-check ">
                                        <input class="form-check-input " type="radio" value="L" name="jk"
                                            wire:model.live='jk' id="jk1" checked>
                                        <label class="form-check-label " for="jk1">
                                            Laki-laki
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="P" name="jk"
                                            wire:model.live='jk' id="jk2">
                                        <label class="form-check-label" for="jk2">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div>@error('jk') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                        </div>
                        <div class="form-outline mb-4">
                            <label for="role_id">Role User<span class="text-danger">*</span></label>
                            <select class="form-control card-hover" id="role" wire:model.live='role_id'>
                                <option></option>
                                @foreach ($role as $r)
                                <option value="{{$r->id}}">{{$r->name}}</option>
                                @endforeach
                            </select>
                            <div>
                                @error('role_id') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>

                        </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary form-control"><i class="fas fa-save"></i> Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="deleteConfirm" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" style="color: black">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeDelete'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p>Apakah anda yakin ingin menghapus data user <b style="text-transform: capitalize">{{ $nama }}</b>?
                </p>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    wire:click='closeDelete'>Kembali</button>
                <form wire:submit.prevent='hapus'>
                    <button type="submit" class="btn btn-danger">Ya! Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="resetConfirm" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" style="color: black">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Reset Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeDelete'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p>Apakah anda yakin ingin reset password user <b style="text-transform: capitalize">{{ $nama }}</b>?
                </p>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    wire:click='closeDelete'>Kembali</button>
                <form wire:submit.prevent='resetPasswordUser'>
                    <button type="submit" class="btn btn-primary">Iya! Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="statusUser" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" style="color: black">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Status User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeDelete'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form wire:submit.prevent='ubahStatus'>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control card-hover" id="status" wire:model.live='status'>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    wire:click='closeDelete'>Kembali</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


@push('users')
<script>
    window.addEventListener('show-confirm-delete', event =>{
            $('#deleteConfirm').modal('show');
        });
    window.addEventListener('show-confirm-reset', event =>{
            $('#resetConfirm').modal('show');
        });
    window.addEventListener('hide-confirm-reset', event =>{
            $('#resetConfirm').modal('hide');
        });
    window.addEventListener('show-ubah-modal', event =>{
            $('#ubahUser').modal('show');
        });
    window.addEventListener('hide-ubah-modal', event =>{
            $('#ubahUser').modal('hide');
        });
    window.addEventListener('show-status-modal', event =>{
            $('#statusUser').modal('show');
        });
    window.addEventListener('confirm', event =>{
            $('#deleteConfirm').modal('hide');
        });
    window.addEventListener('close-status-modal', event =>{
            $('#statusUser').modal('hide');
        });
    
</script>
<script>
    document.addEventListener('livewire:initialized', () =>{
        @this.on('update',(event) => {
            const data=event
            swal.fire({
                toast: true,
                position: "top-end",
                icon:data[0]['icon'],
                title:data[0]['title'],
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
            })
    });

    document.addEventListener('livewire:initialized', () =>{
        @this.on('reset',(event) => {
            const data=event
            swal.fire({
                toast: true,
                position: "top-end",
                icon:data[0]['icon'],
                title:data[0]['title'],
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
            })
    });
</script>
@endpush