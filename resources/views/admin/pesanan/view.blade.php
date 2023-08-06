<div class="modal fade" id="ModalView{{ $dataPesanan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat Detail Pesanan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" value="{{ $dataPesanan->users->name }}">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Produk</label>
                            <input type="text" class="form-control" value="{{ $dataPesanan->product->product_name }}">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Jumlah Order</label>
                            <input type="text" class="form-control" value="{{ $dataPesanan->order_pcs }}">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Total Harga</label>
                            <input type="text" class="form-control"
                                value="{{ "Rp".number_format($dataPesanan->price_total,2,',','.') }}">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Merek Smartphone</label>
                            <input type="text" class="form-control" value="{{ $dataPesanan->merk_hp ?? '-' }}">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Tipe Smartphone</label>
                            <input type="text" class="form-control" value="{{ $dataPesanan->tipe_hp ?? '-' }}">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Waktu Pengambilan</label>
                            <input type="text" class="form-control"
                                value="{{ date('d M Y \J\a\m H:i', strtotime($dataPesanan->order_time)) }}">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Bukti Pembayaran</label><br>
                            @if ($dataPesanan->proof_of_payment == null)
                            -
                            @else
                            <div class="d-grid gap-2">
                                <a href="{{ asset('storage/'.$dataPesanan->proof_of_payment) }}"
                                    class="btn btn-primary w-full" target="_blank">Lihat Bukti</a>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-12 mt-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control">{{ $dataPesanan->notes }}</textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
