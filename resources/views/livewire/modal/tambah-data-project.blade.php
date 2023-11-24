<!-- Modal -->
<div wire:ignore.self class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Project Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="form-outline mb-3">
                        <label class="form-label" for="no_up">No UP<span class="text-danger">*</span></label>
                        <input type="text" id="no_up" class="form-control card-hover @error('no_up') is-invalid @enderror" wire:model.live='no_up'>
                        <div>@error('no_up') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                    </div>
                    <div class="form-outline mb-3">
                        <label class="form-label" for="nama_pengadaan">Nama Pengadaan<span class="text-danger">*</span></label>
                        <input type="text" id="nama_pengadaan" class="form-control card-hover @error('nama_pengadaan') is-invalid @enderror" wire:model.live='nama'>
                        <div>@error('nama_pengadaan') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                    </div>
                    <div class="form-outline mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Nama PT<span class="text-danger">*</span></label>
                            <select class="form-control card-hover " id="exampleFormControlSelect1">
                                <option></option>
                                @foreach ($daftaPt as $dp)
                                    <option value="{{ $dp->id }}">{{ $dp->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-outline mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Instansi<span class="text-danger">*</span></label>
                            <select class="form-control card-hover " id="exampleFormControlSelect1">
                            <option></option>
                            @foreach ($daftarInstansi as $di)
                                    <option value="{{ $di->id }}">{{ $di->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-outline mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jenis Anggaran<span class="text-danger">*</span></label>
                            <select class="form-control card-hover " id="exampleFormControlSelect1">
                            <option></option>
                            <option>Rutin</option>
                            <option>Optimalisasi</option>
                            <option>Prioritas</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-outline mb-3">
                        <label class="form-label" for="no_up">Tahun Anggaran<span class="text-danger">*</span></label>
                        <input type="text" id="no_up" class="form-control card-hover @error('no_up') is-invalid @enderror" wire:model.live='nama'>
                        <div>@error('no_up') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                    </div>
                    <div class="form-outline mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">PIC<span class="text-danger">*</span></label>
                            <select class="form-control card-hover " id="exampleFormControlSelect1">
                                <option></option>
                                @foreach ($users as $u)
                                    <option style="text-transform: capitalize" value="{{$u->id}}">{{$u->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-outline mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Vendor<span class="text-danger">*</span></label>
                            <select class="form-control card-hover " id="exampleFormControlSelect1">
                            <option></option>
                             @foreach ($daftarVendor as $dv)
                                    <option style="text-transform: capitalize" value="{{$dv->id}}">{{$dv->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-outline mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                            <textarea class="form-control card-hover " id="exampleFormControlTextarea1" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="form-control btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>