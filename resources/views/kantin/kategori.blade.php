@extends('layout.main')

@section('content')
<button type="button" class="btn btn-sm btn-success col-2" data-bs-target="#tambahKategori" data-bs-toggle="modal">Tambah Data</button>
<table class="table text-center">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Kategori</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($kategoris as $i => $kategori)
    <tr>
      <th scope="row">{{$i + 1}}</th>
      <td>{{$kategori->nama_kategori}}</td>
      <td>
        <form action="{{route('kategori.destroy', $kategori->id)}}" method="POST" style="display: inline-block;">
          @csrf 
          @method('DELETE')
            <button class="btn btn-danger btn-sm" type="submit">delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="modal fade" id="tambahKategori" tabindex="-1" aria-labelledby="tambahKategoriLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKategoriLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('kategori.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori"autocomplete="off">
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($kategoris as $kategori)
<div class="modal fade" id="editModal{{$kategori->id}}" tabindex="-1" aria-labelledby="editModal{{$kategori->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal{{$kategori->id}}Label">Edit Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('kategori.update', $kategori->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_kategori">Name</label>
                        <input type="text" class="form-control" name="nama_kategori" value="{{$kategori->nama_produk}}" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach


@endsection