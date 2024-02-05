@extends('layout.main')

@section('content')
   
        <div class="main-content-inner">
            <div class="row">
                <!-- table dark start -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Keranjang</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-dark">
                                            <tr class="text-white">
                                                <th scope="col"></th>
                                                <th scope="col">Produk</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Total Harga</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($keranjangs as $keranjang)
                                                <tr class="text-center">
                                                    <td style="vertical-align: middle;"> <img width="100px"
                                                            src="{{ asset('storage/produk/' . $keranjang->produk->foto) }}"
                                                            alt=""></td>
                                                    <td style="vertical-align: middle;">
                                                        {{ $keranjang->produk->nama_produk }}</td>
                                                    <td style="vertical-align: middle;">
                                                        Rp.{{ number_format($keranjang->produk->harga, 0, ',', '.') }},00
                                                    </td>
                                                    <td style="vertical-align: middle;">{{ $keranjang->jumlah_produk }}
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        Rp.{{ number_format($keranjang->total_harga, 0, ',', '.') }},00
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <!-- Change the form method to DELETE -->
                                                        <form action="{{ route('keranjang.destroy', $keranjang->id) }}" method="POST" style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm" type="submit">delete</button>
                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="font-weight-bold">
                                                <td colspan="4" class="text-right">TOTAL SELURUH HARGA :
                                                </td>
                                                <td>Rp.{{ number_format($totalHarga, 0, ',', '.') }},00</td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                            </div>
                            <div class="text-right mt-3">
                                <form action="{{ route('checkout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-dark col-2">Beli</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- table dark end -->

            </div>
        </div>
    </div>
    <!-- main content area end -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkoutForm = document.getElementById('checkoutForm');
            const submitButton = document.getElementById('submitButton');

            submitButton.addEventListener('click', function() {
                // Lakukan submit form secara manual
                checkoutForm.submit();
            });
        });
    </script>
@endsection