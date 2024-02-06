@extends('layout.main')

@section('content')
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">{{$title}}</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Isiiiii -->
                    <div class="sales-report-area sales-style-two">
                        <div class="row">
                            <!-- data table start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Detail Laporan Top Up</h4>
                                        <div class="data-tables">
                                            <table id="table1" class="table table-bordered table-hover">
                                                <thead class="bg-light text-capitalize">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Rekening</th>
                                                        <th>Nama</th>
                                                        <th>tanggal</th>
                                                        <th>Nominal</th>
                                                        <th>Kode Unik</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($topups as $i => $topup)
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $topup->wallet->rekening }}</td>
                                                            <td>{{ $topup->wallet->user->name }}</td>
                                                            <td>{{ $topup->wallet->user->created_at}}</td>
                                                            <td>Rp. {{ number_format($topup->nominal, 0, ',', '.') }},00</td>
                                                            <td>{{ $topup->kode_unik }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- data table end -->
                        </div>
                    </div>
                </div>
                
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    window.print();
            
                    window.addEventListener('afterprint', function() {
            
                        window.location.href = '{{ route(auth()->user()->role . '.index') }}';
                    });
            
                });
            </script>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            @endsection