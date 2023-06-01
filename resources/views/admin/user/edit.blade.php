<div class="modal fade" id="ModalEdit{{ $dataAdmin->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ url('/admin/user/update/'.$dataAdmin->id) }}" method="POST">
                    @method("put")
                    @csrf
                    <div class="col-md-12 mt-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $dataAdmin->name) }}">
                    </div>
                    <div class="col-md-12 mt-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ old('email', $dataAdmin->email) }}">
                    </div>
                    <div class="col-md-12 mt-3">
                        <label class="form-label">Role</label>
                        <select class="form-control" name="role" aria-label="Default select example">
                            <option value="{{ $dataAdmin->role }}">{{ $dataAdmin->role }} (Current)</option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                          </select>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone', $dataAdmin->phone) }}">
                    </div>
                    <div class="col-md-12 mt-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="{{ old('address', $dataAdmin->address) }}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Edit User</button>
            </div>
            </form>
        </div>
    </div>
</div>
