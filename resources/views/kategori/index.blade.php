@extends('layouts.main')
@section('title', 'Kategori')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Kategori</h6>
        <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">NAMA</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $index => $datas)
                    <tr>
                        <td class="text-center">{{$index+1}}</td>
                        <td>{{$datas->nama}}</td>
                        <td class="text-center">
                            <form id="delete-form-{{ $datas->id }}" action="{{ route('kategori.destroy', $datas->id) }}" method="POST" style="display: inline;">
                                <a href="{{ route('kategori.edit', $datas->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $datas->id }})">HAPUS</button>
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