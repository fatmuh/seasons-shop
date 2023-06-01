@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Produk</div>

                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-plus me-1"></i> Tambah Produk
                    </button>

                    <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @method("put")
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="product_name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Harga</label>
                                <input type="number" class="form-control" name="price" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Foto</label>
                                <input class="form-control" type="file" name="image" accept="image/jpg,image/jpeg,image/png">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Tambah Produk</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
                    <table class="table table-striped" id="tabel-data">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nama</th>
                              <th scope="col">Harga</th>
                              <th scope="col">Deskripsi</th>
                              <th scope="col">Foto</th>
                              <th><i class="fas fa-gear me-1"></i></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($data as $dataProduct)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $dataProduct->product_name }}</td>
                              <td>{{ "Rp".number_format($dataProduct->price,2,',','.') }}</td>
                              <td>{{ $dataProduct->description}}</td>
                              <td>@if (old('image', $dataProduct->image))
                                <img src="{{ asset('storage/'. old('image', $dataProduct->image)) }}" width="70px" class="rounded-circle m-3">
                            @else
                                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                width="70px" class="rounded-circle m-3">
                            @endif</td>
                              <td><a href="" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $dataProduct->id }}" class="btn btn-outline-warning"><i class="fas fa-pencil"></i></a> <a href="" data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $dataProduct->id }}" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a></td>
                              @include('admin.product.edit')
                              @include('admin.product.delete')
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
