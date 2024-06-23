@extends('layouts.index')
@section('content')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}
    <style>
        th,
        td {
            text-align: center;
            /* Center align text in th and td */
        }
    </style>

    <body>
        <div class="container my-4">
            <div class="card-body py-4">
                <!--begin::Table-->
                <div class="container">
                    <!--begin::Table-->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2">NO</th>
                                <th rowspan="2">TANGGAL</th>
                                <th rowspan="2">MITRA</th>
                                <th colspan="4">DETAIL PEMASUKAN</th>
                            </tr>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                function formatRupiah($angka)
                                {
                                    $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
                                    return $hasil_rupiah;
                                }
                                $index = 1;
                                $totalKeseluruhan = 0;
                            @endphp
                            @foreach ($groupedPemasukan as $tgl_pemasukan => $items)
                                @php
                                    $total_harga = 0;
                                @endphp
                                @foreach ($items as $item)
                                    @foreach ($item->detail as $detail)
                                        @php
                                            $subtotal = $detail->harga_barang_masuk * $detail->jumlah_barang_masuk;
                                            $total_harga += $subtotal;
                                        @endphp
                                        <tr>
                                            <td>{{ $index }}</td>
                                            <td>{{ $tgl_pemasukan }}</td>
                                            <td>{{ $item->mitra->nama_mitra }}</td>
                                            <td>{{ $detail->produk->nama_produk }}</td>
                                            <td>{{ formatRupiah($detail->harga_barang_masuk) }}</td>
                                            <td>{{ $detail->jumlah_barang_masuk }}</td>
                                            <td>{{ formatRupiah($subtotal) }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                <tr>
                                    <td colspan="6" class="text-end fw-bold">Total</td>
                                    <td>{{ formatRupiah($total_harga) }}</td>
                                </tr>
                                @php
                                    $index++;
                                    $totalKeseluruhan += $total_harga;
                                @endphp
                            @endforeach
                            <tr>
                                <td colspan="6" class="text-end fw-bold">Total Keseluruhan</td>
                                <td>{{ formatRupiah($totalKeseluruhan) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <!--end::Table-->
                </div>

                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
    </body>
@endsection
