@extends('layout.main')
@section('content')
    
<div class="main-content-inner">
    <div class="row">
        <!-- seo fact area start -->
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-7 mt-5 mb-3">
                    <div class="card">
                        <div class="seo-fact sbg1">
                            <div class="p-4 d-flex justify-content-between align-items-center mb-3">
                                <div class="seofct-icon">
                                    <h2><i class="ti-wallet"></i>
                                        Saldo</h2>
                                </div>
                                <h2>Rp. {{ number_format($wallet->saldo, 0, ',', '.') }},00</h2>
                            </div>
                            <div class="float-right">
                                <button type="button" class="btn btn-light my-3 mr-3" data-bs-toggle="modal"
                                data-bs-target="#topupModal"><i class="ti-plus"></i> Top
                                    Up</button>

                                <button type="button" class="btn btn-light my-3 mr-3" data-bs-toggle="modal"
                                    data-bs-target="#tariktunaiModal"><i class="ti-archive"></i> Tarik Tunai</button>
                            </div>
                            {{-- <canvas id="seolinechart1" height="50"></canvas> --}}
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-5 mt-5 mb-3">
                    <div class="card">
                        <div class="seo-fact sbg2">
                            <div class="p-4 d-flex justify-content-between align-items-center mb-3">
                                <div class="seofct-icon">
                                    <h2><i class="ti-wallet"></i>
                                        Rekening</h2>
                                </div>
                            </div>
                            <div class="ml-4 my-3 center">
                                <h2>{{ $wallet->rekening }}</h2>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
</div>
<!-- main content area end -->

<div class="modal fade" id="topupModal" tabindex="-1" role="dialog" aria-labelledby="topupModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="topupModalLabel">Top Up</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span>&times;</span>
            </button>
        </div>
        <form action="{{ route('customer.topup') }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="rekening">Rekening</label>
                    <input id="rekening" name="rekening" type="text" placeholder="" class="form-control"
                    required value="{{ $wallet->rekening}}">
                </div>

                <div class="form-group">
                    <label for="nominal">Nominal</label>
                    <input type="text" id="nominal" class="form-control" placeholder="" name="nominal"
                        required>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Batal</span>
                </button>
                <button type="submit" class="btn btn-primary ms-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Top Up</span>
                </button>
            </div>
        </form>
    </div>
</div>
</div>

<div class="modal fade" id="tariktunaiModal" tabindex="-1" role="dialog" aria-labelledby="tariktunaiModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="tariktunaiModalLabel">Tarik Tunai</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span>&times;</span>
            </button>
        </div>
        <form action="{{ route('withdrawal.request') }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input id="rekening" name="rekening" type="hidden" placeholder="" class="form-control"
                    required value="{{ $wallet->rekening }}">
                </div>
                
                <div class="form-group">
                    <label for="nominal">Nominal</label>
                    <input type="text" id="nominal" class="form-control" placeholder="" name="nominal"
                    required>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Batal</span>
                </button>
                <button type="submit" class="btn btn-primary ms-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Tarik Tunai</span>
                </button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
