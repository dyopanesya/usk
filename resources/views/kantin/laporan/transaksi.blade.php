@extends('layout.main')

@section('content')
    

<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">{{ $title }}</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('kantin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Kategori</h4>
                    <div class="table-responsive">
                        <table class="table user-table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Invoice</th>
                                    <th class="border-top-0">Customer</th>
                                    <th class="border-top-0">Produk</th>
                                    <th class="border-top-0">Harga</th>
                                    <th class="border-top-0">Qty</th>
                                    <th class="border-top-0">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksis as $i => $transaksi)
                                        <tr>
                                            <td class="align-middle">{{$i + 1}}</td>
                                            <td class="align-middle">{{$transaksi->invoice}}</td>
                                            <td class="align-middle">{{$transaksi->user->nama }}</td>
                                            <td class="align-middle">{{$transaksi->produk->nama_produk}}</td>
                                            <td class="align-middle">Rp. {{ number_format ($transaksi->harga, 0,',','.')}}</td>
                                            <td class="align-middle">{{$transaksi->kuantitas}}</td>
                                            <td class="align-middle">Rp. {{ number_format ($transaksi->total_harga, 0,',','.')}}</td>
                                        </tr>
                                        @endforeach
                            </tbody>
                        </table>
                        <div class="text-right mt-3">
                            <a href="{{ route('kantin.laporan')}}" class="btn btn-danger">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
@endsection