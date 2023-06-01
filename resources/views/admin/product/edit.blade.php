<div class="modal fade" id="ModalEdit{{ $dataProduct->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ url('/admin/product/update/'.$dataProduct->id) }}" method="POST" enctype="multipart/form-data">
                    @method("put")
                    @csrf
                    <div class="col-md-12 mt-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="product_name" value="{{ old('product_name', $dataProduct->product_name) }}">
                    </div>
                    <div class="col-md-12 mt-3">
                        <label class="form-label">Harga</label>
                        <input type="number" class="form-control" name="price" value="{{ old('price', $dataProduct->price) }}">
                    </div>
                    <div class="col-md-12 mt-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description">{{ old('description', $dataProduct->description) }}</textarea>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label class="form-label">Foto</label>
                        <input type="hidden" name="oldFoto" value="{{ $dataProduct->image }}">
                        <input class="form-control" type="file" name="image" accept="image/jpg,image/jpeg,image/png">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Edit Produk</button>
            </div>
            </form>
        </div>
    </div>
</div>
