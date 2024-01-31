@extends('layout.main')

@section('content')

<button type="button" class="btn btn-sm btn-success col-2" data-bs-target="#tambah" data-bs-toggle="modal">Tambah Data</button>
<table class="table text-center">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Produk</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Stok</th>
            <th scope="col">Kategori</th>
            <th scope="col">Desc</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produks as $i => $produk)
            <tr>
                <th scope="row">{{ $i + 1 }}</th>
                <td> <img src="{{ asset('./storage/produk/'. $produk->foto) }}"
                        alt="{{ $produk->nama_produk }}" style="width: 100px;"></td>
                <td>{{ $produk->nama_produk }}</td>
                <td>{{ $produk->harga }}</td>
                <td>{{ $produk->stok }}</td>
                <td>{{ $produk->kategori->nama_kategori }}</td>
                <td>{{ $produk->desc }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#editModal{{ $produk->id }}">Edit</button>                   
                     <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="nama_produk" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input class="form-control" type="file" id="formFile" name="foto">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" id="" class="form-control">
                        @foreach ($kategoris as $kategori)
                            <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="desc" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="harga">
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" class="form-control" name="stok">
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

@foreach ($produks as $produk)
<div class="modal fade" id="editModal{{$produk->id}}" tabindex="-1" aria-labelledby="editModal{{$produk->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal{{$produk->id}}Label">Edit Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('produk.update', $produk->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="nama_produk" value="{{$produk->nama_produk}}" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input class="form-control" type="file" id="formFile" name="foto">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" id="" class="form-control">
                        @foreach ($kategoris as $kategori)
                            <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="desc" value="{{$produk->desc}}" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" value="{{$produk->harga}}" name="harga">
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" class="form-control" value="{{$produk->stok}}" name="stok">
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




