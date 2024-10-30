@extends('layouts.main')
@section('title', 'Distributor')
@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-7 text-center">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Distributor</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('distributor.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama">
                            @error('nama')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" placeholder="Masukkan Alamat">
                            @error('alamat')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ old('telepon') }}" placeholder="Masukkan Nomor">
                            @error('telepon')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection