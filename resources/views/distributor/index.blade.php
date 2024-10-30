@extends('layouts.main')
@section('title', 'Distributor')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Distributor</h6>
        <a href="{{ route('distributor.create') }}" class="btn btn-primary btn-sm">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">NAMA</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Telepon</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $index => $datas)
                    <tr>
                        <td class="text-center">{{$index+1}}</td>
                        <td>{{$datas->nama}}</td>
                        <td>{{$datas->alamat}}</td>
                        <td>{{$datas->telepon}}</td>
                        <td class="text-center">
                            @php
                            // Enkripsi ID
                            $encryptedId = Crypt::encrypt($datas->id);
                            @endphp
                            <form id="delete-form-{{ $encryptedId }}" action="{{ route('distributor.destroy', $encryptedId) }}" method="POST" style="display: inline;">
                                <a href="{{ route('distributor.edit', $encryptedId) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('{{ $encryptedId }}')">HAPUS</button>
                            </form>
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