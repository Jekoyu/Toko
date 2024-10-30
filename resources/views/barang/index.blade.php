@extends('layouts.main')
@section('title', 'Barang')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Barang</h6>
        <a href="{{ route('barang.create') }}" class="btn btn-primary btn-sm">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">NAMA</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Stok</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Distributor</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $index => $datas)
                    <tr>
                        <td class="text-center">{{$index+1}}</td>
                        <td>{{$datas->nama}}</td>
                        <td>Rp. {{ number_format($datas->harga, 0, ',', '.') }}</td>
                        <td>{{$datas->stok}} Pcs</td>
                        <td>{{$datas->kategori->nama}}</td>
                        <td>{{$datas->distributor->nama}}</td>
                        <td class="text-center">
                            @php
                            // Enkripsi ID
                            $encryptedId = Crypt::encrypt($datas->id);
                            @endphp
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('barang.show', $encryptedId) }}">Show</a>
                                    <a class="dropdown-item" href="{{ route('barang.edit', $encryptedId) }}">Edit</a>
                                    <form id="delete-form-{{ $encryptedId }}" action="{{ route('barang.destroy', $encryptedId) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="dropdown-item" onclick="confirmDelete('{{ $encryptedId }}')">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </td>


                    </tr>
                    @empty
                    <div class="alert alert-danger">
                        Data belum Tersedia.
                    </div>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection