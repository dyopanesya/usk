@extends('layout.main')

@section('content')
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="sales-report-area sales-style-two">
            <div class="row">
                <!-- laporan -->
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Riwayat Topup</h4>
                            <div class="list-group list-group-flush">
                                @foreach ($topups as $topup)
                                <a href="{{route ('cetak.topup.all')}}" class="btn btn-success">Cetak Seluruh</a>
                                    <h6 class="bg-body-tertiary p-2 border-top border-bottom">
                                        {{ $topup->tanggal }}
                                        <span class="float-end">Rp.
                                            {{ number_format($topup->nominal, 2, ',', '.') }}</span>
                                    </h6>
                                    @php
                                        $topupList = App\Models\TopUp::where(DB::raw('DATE(created_at)'), $topup->tanggal)
                                            ->where('rekening', $wallet->rekening)
                                            ->orderBy('created_at', 'desc')
                                            ->get();
                                    @endphp

                                    <ul class="list-group list-group-light mb-4">
                                        @foreach ($topupList as $list)
                                        <a href="{{route('cetak.topup', $topup->tanggal)}}">
                                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center col-12">
                                                        <div class="ms-3 col-12">
                                                            <p class="fw-bold mb-1">{{ $list->kode_unik}} <span
                                                                    class="float-end">{{ $list->created_at }}</span>
                                                            </p>
                                                            <p class="text-muted mb-0">Rp.
                                                                {{ number_format($list->nominal, 2, ',', '.') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </a>
                                        @endforeach
                                    </ul>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <!-- laporan -->
            </div>
            </div>
            </div>
            @endsection