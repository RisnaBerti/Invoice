<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        th,
        td {
            text-align: center;
            /* Center align text in th and td */
        }
    </style>
</head>

<body onload="window.print()">

    <div class="text-center mb-4">
        <h5>LAPORAN PENGELUARAN</h5>
        <h6>CV</h6>
        <h6>{{ request()->get('tgl_awal') }} - {{ request()->get('tgl_akhir') }}</h6>
    </div>

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
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1;
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
                                <td>{{ $detail->harga_barang_masuk }}</td>
                                <td>{{ $detail->jumlah_barang_masuk }}</td>
                                <td>{{ $subtotal }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                    <tr>
                        <td colspan="6" class="text-end fw-bold">Total</td>
                        <td>{{ $total_harga }}</td>
                    </tr>
                    @php
                        $index++;
                    @endphp
                @endforeach
            </tbody>
        </table>
        <!--end::Table-->
    </div>

</body>

</html>
