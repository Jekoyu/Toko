@extends('layouts.main')
@section('title', 'Edit Barang')
@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-7 text-center">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Barang</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('barang.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $data->nama) }}" placeholder="Masukkan Nama" required>
                            @error('nama')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga', $data->harga) }}" placeholder="Masukkan Harga" required min="0" step="0.01">
                            @error('harga')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok', $data->stok) }}" placeholder="Masukkan Stok" required min="0">
                            @error('stok')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kategori_id" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select name="kategori_id" id="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ $data->kategori_id == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama }}
                                </option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="distributor_id" class="col-sm-2 col-form-label">Distributor</label>
                        <div class="col-sm-10">
                            <select name="distributor_id" id="distributor_id" class="form-control @error('distributor_id') is-invalid @enderror" required>
                                <option value="">Pilih Distributor</option>
                                @foreach ($distributors as $distributor)
                                <option value="{{ $distributor->id }}" {{ $data->distributor_id == $distributor->id ? 'selected' : '' }}>
                                    {{ $distributor->nama }}
                                </option>
                                @endforeach
                            </select>
                            @error('distributor_id')
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