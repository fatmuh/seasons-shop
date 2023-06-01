@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change Profile') }}</div>

                <div class="card-body">
                    <form class="row g-3" action="{{ route('user.updateUser') }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="col-12">
                          <label class="form-label">Nama</label>
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name">

                          @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="col-12">
                          <label for="inputAddress2" class="form-label">Nomor Telepon</label>
                          <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->phone) }}" required autocomplete="name">

                          @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="col-12">
                          <label for="inputAddress" class="form-label">Alamat</label>
                          <textarea class="form-control @error('address') is-invalid @enderror" name="address">{{ $user->address }}</textarea>
                          @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="col-12">
                          <button type="submit" class="btn btn-primary">Change</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
