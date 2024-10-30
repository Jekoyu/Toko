@extends('layouts.main')
@section('title', 'Detail Barang')
@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-7 text-center">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detail Barang</h6>
                <a href="{{ route('barang.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label font-weight-bold">Nama:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext">{{ $data->nama }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label font-weight-bold">Harga:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext">Rp. {{ number_format($data->harga, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label font-weight-bold">Stok:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext">{{ $data->stok }} Pcs</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label font-weight-bold">Kategori:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext">{{ $data->kategori->nama }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label font-weight-bold">Distributor:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext">{{ $data->distributor->nama }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection