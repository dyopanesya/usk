@extends('layout.main')
@section('content')
    <!-- main content area end --> 
    @extends('layout.main')

@section('content')
    <!-- main content area start -->
    <div class="main-content">
        <!-- header area start -->
        <div class="header-area">
            <div class="row align-items-center">
                <!-- nav and search button -->
                <div class="col-md-6 col-sm-8 clearfix">
                    <div class="nav-btn pull-left">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- header area end -->
        <!-- page title area start -->
        
        <!-- page title area end -->
        <div class="main-content-inner">
            <!-- sales report area start -->
            <div class="sales-report-area sales-style-two">
                <div class="row">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Permintaan Withdraw</h4>
                                <div class="data-tables">
                                    <table id="table1" class="table table-bordered table-hover">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>No.</th>
                                                <th>Customer</th>
                                                <th>Rekening</th>
                                                <th>Nominal</th>
                                                <th>Kode Unik</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($withdrawals as $i => $withdraw)
                                                <tr>
                                                    <td>{{ $i + 1 }}</td>
                                                    <td>{{ $withdraw->wallet->user->name }}</td>
                                                    <td>{{ $withdraw->rekening }}</td>
                                                    <td>Rp. {{ number_format($withdraw->nominal, 0, ',', '.') }},00</td>
                                                    <td>{{ $withdraw->kode_unik }}</td>
                                                    <td>{{ $withdraw->status }}</td>
                                                    <td class="col-2">
                                                        @if ($withdraw->status === 'menunggu')
                                                            <form action="{{ route('konfirmasi.withdrawal', $withdraw->id) }}"
                                                                method="post" style="display: inline;">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-sm">Konfirmasi</button>
                                                            </form>

                                                            <form action="{{ route('tolak.withdrawal', $withdraw->id) }}"
                                                                method="post" style="display: inline;">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Tolak</button>
                                                            </form>
                                                        @elseif($withdraw->status === 'dikonfirmasi')
                                                            <button type="submit"
                                                                class="btn btn-success btn-sm col-12">{{ $withdraw->status }}</button>
                                                        @else
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm col-12">{{ $withdraw->status }}</button>
                                                        @endif
                                                    </td>
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
            <!-- sales report area end -->
        </div>
    </div>
    <!-- main content area end -->
@endsection
