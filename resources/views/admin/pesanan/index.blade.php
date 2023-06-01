@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Pesanan</div>

                <div class="card-body">

                    <table class="table table-striped" id="tabel-data">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nama</th>
                              <th scope="col">Produk</th>
                              <th scope="col">Jumlah Order</th>
                              <th scope="col">Total Harga</th>
                              <th scope="col">Tanggal Pengambilan</th>
                              <th scope="col">Tipe Pembayaran</th>
                              <th scope="col">Bukti Pembayaran</th>
                              <th scope="col">Status</th>
                              <th scope="col">Notes</th>
                              <th><i class="fas fa-gear me-1"></i></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($data as $dataPesanan)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $dataPesanan->users->name }}</td>
                              <td>{{ $dataPesanan->product->product_name }}</td>
                              <td>{{ $dataPesanan->order_pcs }}</td>
                              <td>{{ "Rp".number_format($dataPesanan->price_total,2,',','.') }}</td>
                              <td>{{ date('d M Y \J\a\m H:i', strtotime($dataPesanan->order_time)) }}</td>
                              <td>{{ $dataPesanan->type_of_payment}}</td>
                              <td>
                                @if ($dataPesanan->proof_of_payment == null)
                                    -
                                @else
                                    <a href="{{ asset('storage/'.$dataPesanan->proof_of_payment) }}" class="btn btn-primary" target="_blank">Lihat Bukti</a>
                                @endif
                                </td>

                                <td>@if ($dataPesanan->status == 'Pending')
                                        <span class="badge text-bg-warning">Pending</span>
                                    @elseif ($dataPesanan->status == 'Processing')
                                        <span class="badge text-bg-primary">Processing</span>
                                    @elseif ($dataPesanan->status == 'Completed')
                                        <span class="badge text-bg-success">Completed</span>
                                    @endif
                                </td>
                                <td>{{ $dataPesanan->notes }}</td>
                              <td><a href="" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $dataPesanan->id }}" class="btn btn-outline-warning"><i class="fas fa-pencil"></i></a> <a href="" data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $dataPesanan->id }}" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a></td>
                              @include('admin.pesanan.edit')
                              @include('admin.pesanan.delete')
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
