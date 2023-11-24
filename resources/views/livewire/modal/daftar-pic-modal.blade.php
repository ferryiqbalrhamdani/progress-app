<div wire:ignore.self class="modal fade" id="detail" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="text-center" style="text-transform: capitalize">{{ $name }}</h5>
                <hr>
                <table class="table table-bordered table-striped table-hover bg-body-tertiary rounded shadow-sm ">
                    <tbody>
                        <tr>
                            <th class="col-5">Jenis Kelamin</th>
                            <td>@if($jk == 'L') Laki-laki @else Perempuan @endif</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary form-control" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@push('daftar-pic')
<script>
    window.addEventListener('show-detail-modal', event =>{
            $('#detail').modal('show');
        });
</script>
@endpush