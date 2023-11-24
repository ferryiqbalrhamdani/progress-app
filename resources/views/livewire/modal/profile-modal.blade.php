<div wire:ignore.self class="modal fade" id="ubahUser" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" style="color: black">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeUbah'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='ubahData'>
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


                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary form-control"><i class="fas fa-save"></i> Save</button>
            </div>
            </form>
        </div>
    </div>
</div>


@push('profile')
<script>
    window.addEventListener('show-ubah-modal', event =>{
            $('#ubahUser').modal('show');
        });
    
</script>
@endpush