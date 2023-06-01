<div class="modal fade" id="ModalEdit{{ $dataPesanan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Status Pesanan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ url('/admin/pesanan/update/'.$dataPesanan->id) }}" method="POST" enctype="multipart/form-data">
                    @method("put")
                    @csrf
                    <div class="col-md-12 mt-3">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status" aria-label="Default select example">
                            <option value="{{ $dataPesanan->status }}">{{ $dataPesanan->status }} (Current)</option>
                            <option value="Pending">Pending</option>
                            <option value="Processing">Processing</option>
                            <option value="Completed">Completed</option>
                          </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Edit Status</button>
            </div>
            </form>
        </div>
    </div>
</div>
