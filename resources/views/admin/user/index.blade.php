@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data User</div>

                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-plus me-1"></i> Tambah User
                    </button>

                    <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Admin</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="{{ route('user.store') }}" method="POST">
                            @method("put")
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label">Nama Admin</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Role</label>
                                <select class="form-control" name="role" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                  </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Tambah User</button>
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
                              <th scope="col">Email</th>
                              <th scope="col">Role</th>
                              <th scope="col">Phone</th>
                              <th scope="col">Address</th>
                              <th><i class="fas fa-gear me-1"></i></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($data as $dataAdmin)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $dataAdmin->name}}</td>
                              <td>{{ $dataAdmin->email}}</td>
                              <td>{{ $dataAdmin->role}}</td>
                              <td>{{ $dataAdmin->phone}}</td>
                              <td>{{ $dataAdmin->address}}</td>
                              <td><a href="" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $dataAdmin->id }}" class="btn btn-outline-warning"><i class="fas fa-pencil"></i></a> <a href="" data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $dataAdmin->id }}" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a></td>
                              @include('admin.user.edit')
                              @include('admin.user.delete')
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
