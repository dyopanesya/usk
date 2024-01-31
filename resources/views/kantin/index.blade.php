@extends('layout.main')

@section('content')
<table class="table text-center">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Produk</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Harga</th>
      <th scope="col">Stok</th>
      <th scope="col">Desc</th>
    </tr>
  </thead>
  <tbody>
    @foreach($produks as $i => $produk)
    <tr>
      <th scope="row">{{$i + 1}}</th>
      <td> <img src="{{asset('storage/produk/'. $produk->foto)}}" alt="{{$produk->nama_produk}}" style="width: 100px;"></td>
      <td>{{$produk->nama_produk}}</td>
      <td>{{$produk->harga}}</td>
      <td>{{$produk->stok}}</td>
      <td>{{$produk->desc}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection