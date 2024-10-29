@extends('layouts.main')
@section('title', 'Kategori')
@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-7 text-center">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Kategori</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('kategori.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="NISN" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Kategori">
                            @error('nama')
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