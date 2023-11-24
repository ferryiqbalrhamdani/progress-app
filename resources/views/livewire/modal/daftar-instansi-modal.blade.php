<div wire:ignore.self class="modal fade" id="tambahData" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Instansi Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit='storeData'>
                <div class="modal-body">
                    <div class="container">
                        <div class="form-outline mb-3">
                            <label class="form-label" for="name">Nama Instansi<span class="text-danger">*</span></label>
                            <input type="text" id="name" class="form-control card-hover @error('name') is-invalid @enderror" wire:model.live='name'>
                            <div>@error('name') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="form-control btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="UbahData" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Instansi Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeModal()'>
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit='storeData'>
                <div class="modal-body">
                    <div class="container">
                        <div class="form-outline mb-3">
                            <label class="form-label" for="name">Nama Instansi<span class="text-danger">*</span></label>
                            <input type="text" id="name" class="form-control card-hover @error('name') is-invalid @enderror" wire:model.live='name'>
                            <div>@error('name') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="form-control btn btn-primary" wire:click='update()'>Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="hapus" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeModal'>
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="text-center">Apakah anda yakin ingin menghapus data {{ $name }}?</h6>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal" aria-label="Close" wire:click='closeModal()'>Batalkan</button>
                <button type="submit" class="btn btn-danger" wire:click='destroy()'>Yes! hapus data</button>
            </div>
        </div>
    </div>
</div>

@push('daftar-pt')
    <script>
        window.addEventListener('show-delete-modal', event =>{
            $('#hapus').modal('show');
        });
        window.addEventListener('show-ubah-modal', event =>{
            $('#UbahData').modal('show');
        });
    </script>
@endpush