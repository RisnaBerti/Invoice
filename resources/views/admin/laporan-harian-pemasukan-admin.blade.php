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
            {{-- <h1 class="text-center">{{ $title }}</h1> --}}
            <form method="GET" action="{{ route('laporan-harian-pemasukan-admin') }}" class="mb-4">
                <div class="row">
                    <div class="col-2">
                        <label for="tgl_awal" class="form-label">Tanggal Awal</label>
                        <input type="date" class="form-control" id="tgl_awal" name="tgl_awal"
                            value="{{ request()->get('tgl_awal') }}">
                    </div>
                    <div class="col-2">
                        <label for="tgl_akhir" class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir"
                            value="{{ request()->get('tgl_akhir') }}">
                    </div>
                    <div class="col-sm-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary mr-2">Filter</button>
                        <a href="{{ route('laporan-harian-pemasukan-admin') }}" class="btn btn-danger mr-2">Reset</a>
                        <a href="{{ route('laporan-harian-pemasukan-admin-print', ['tgl_awal' => request()->get('tgl_awal'), 'tgl_akhir' => request()->get('tgl_akhir')]) }}"
                            target="_blank" class="btn btn-success">Print</a>
                    </div>
                </div>
            </form>

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
