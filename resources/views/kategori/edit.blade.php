@extends('layouts.main')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="m-0 font-weight-bold text-primary">Data Kategori</div></div>
        <div class="card-body">
        <div class="table-responsive">
            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Kategori :</label>
                <input type="text" autocomplete="off" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" placeholder="Masukkan Kategori">
            
                <!-- error message untuk title -->
                @error('nama_kategori')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
            <a class="btn btn-secondary" href="{{ route('kategori.index') }}"> Back</a>

        </form> 
    </div>
</div>

@endsection