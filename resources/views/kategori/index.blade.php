@extends('layouts.main')

@section('content')
<div class="card shadow mb-4">
<div class="card-header py-3">
<div class="m-0 font-weight-bold text-primary">Data Kategori
<a href="{{ route('kategori.create') }}" class="btn btn-md btn-success mb-3 float-right"> Input Kategori</a></div>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th class="text-center">Action</th>
    </tr>
</thead>
<tbody>
    @forelse ($kategori as $data)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $data->nama_kategori }}</td>
            <td class="text-center">
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kategori.destroy', $data->id) }}" method="POST">
                    <a href="{{ route('kategori.edit', $data->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <div class="alert alert-danger">
            Data Kategori belum Tersedia.
        </div>
    @endforelse
</tbody>
</div> 
</table>

</div>
</div>
</div>

@endsection