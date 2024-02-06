@extends('layout.main')
@section('content')
    
<div class="main-content-inner">
    <div class="row">
        <!-- seo fact area start -->
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-6 mt-5 mb-3">
                    <div class="card">
                        <div class="seo-fact sbg1">
                            <div class="p-4 d-flex justify-content-between align-items-center mb-3">
                                <div class="seofct-icon">
                                    <h2><i class="ti-wallet"></i>
                                       Topup</h2>
                                </div>
                                <h2>{{ count( $topup )}}</h2>
                            </div>
                          
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-5 mb-3">
                    <div class="card">
                        <div class="seo-fact sbg1">
                            <div class="p-4 d-flex justify-content-between align-items-center mb-3">
                                <div class="seofct-icon">
                                    <h2><i class="ti-wallet"></i>
                                       Withdraw</h2>
                                </div>
                                <h2>{{ count( $withdraw )}}</h2>
                            </div>
                           
                          
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
@endsection
