@section('page-title')
Register
@endsection
<div>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5">

                            <h3 class="text-center">Progress App Register</h3>
                            <hr class="mb-5">
                            <form wire:submit.prevent='register'>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="username">Username<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="username"
                                        class="form-control form-control-lg card-hover card-shadow @error('username') is-invalid @enderror"
                                        wire:model.live='username'>
                                    <div>@error('username') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-outline">
                                    <label class="form-label" for="password">Password<span
                                            class="text-danger">*</span></label>
                                    <input @if($showpassword==false) type="password" @else type="text" @endif
                                        id="password" wire:model.live='password'
                                        class="form-control form-control-lg card-hover card-shadow @error('password') is-invalid @enderror" />
                                    <div>@error('password') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>

                                </div>

                                <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-start mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="form1Example3"
                                        wire:click='openPas()' />
                                    <label class="form-check-label" for="form1Example3"> Show password </label>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="nama">Nama<span class="text-danger">*</span></label>
                                    <input type="text" id="nama"
                                        class="form-control form-control-lg card-hover card-shadow @error('nama') is-invalid @enderror"
                                        wire:model.live='nama'>
                                    <div>@error('nama') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                                </div>

                                <div class="form-outline mb-4">
                                    <label for="nama_pt" class="form-label">Nama PT<span
                                            class="text-danger">*</span></label>
                                    <select
                                        class="form-select form-select-lg card-hover card-shadow @error('nama_pt') is-invalid @enderror"
                                        id="nama_pt" wire:model.live='nama_pt'>
                                        <option></option>
                                        @foreach ($daftarPT as $dp)
                                        <option>{{$dp->name}}</option>
                                        @endforeach
                                    </select>
                                    <div>@error('nama_pt') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-outline mb-4">
                                    <label for="divisi" class="form-label">Divisi<span
                                            class="text-danger">*</span></label>
                                    <select
                                        class="form-select form-select-lg card-hover card-shadow @error('divisi') is-invalid @enderror"
                                        id="divisi" wire:model.live='divisi'>
                                        <option></option>
                                        @foreach ($role as $r)
                                        @if ($r->id > 1)
                                        <option value="{{$r->id}}">{{$r->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <div>@error('divisi') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-outline mb-4">
                                    <label for="" class="form-label">Jenis Kelamin<span
                                            class="text-danger">*</span></label>
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



                                <button class="btn btn-primary btn-lg btn-block form-control card-hover card-shadow"
                                    type="submit">Save</button>
                            </form>
                            <hr class="my-4">

                            <div class="d-flex justify-content-center">
                                <span class="">Sudah punya akun? <a href="/login">login</a></span>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
            
        }
    }
</script>