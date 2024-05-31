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
        <h5>LAPORAN PEMASUKAN</h5>
        <h6>CV Toba Jaya Teknik Cilacap</h6>
        <h6>{{ request()->get('tgl_awal') }} - {{ request()->get('tgl_akhir') }}</h6>
    </div>

    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th rowspan="2">NO</th>
                    <th rowspan="2">TANGGAL</th>
                    <th colspan="4">DETAIL PEMASUKAN</th>
                </tr>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php
                    function formatRupiah($angka)
                    {
                        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
                        return $hasil_rupiah;
                    }
                    $index = 1;
                    $totalKeseluruhan = 0;
                @endphp
                @foreach ($groupedPengeluaran as $tgl_pemasukan => $items)
                    @php
                        $first = true;
                        $total_harga = 0;
                        $total_rows = $items->reduce(function ($carry, $item) {
                            return $carry + $item->detail->count();
                        }, 0);
                    @endphp
                    @foreach ($items as $item)
                        @foreach ($item->detail as $detail)
                            <tr>
                                @if ($first)
                                    <td rowspan="{{ $total_rows }}">{{ $index }}</td>
                                    <td rowspan="{{ $total_rows }}">{{ $tgl_pemasukan }}</td>
                                    @php $first = false; @endphp
                                @endif
                                <td>{{ $detail->nama_barang_keluar }}</td>
                                <td>{{ formatRupiah($detail->harga_satuan) }}</td>
                                <td>{{ $detail->jumlah_barang_keluar }}</td>
                                <td>{{ formatRupiah($detail->subtotal) }}</td>
                            </tr>
                            @php $total_harga += $detail->subtotal; @endphp
                        @endforeach
                    @endforeach
                    <tr>
                        <td colspan="5" class="text-end fw-bold">Total</td>
                        <td>{{ formatRupiah($total_harga) }}</td>
                    </tr>
                    @php
                        $index++;
                        $totalKeseluruhan += $total_harga;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="5" class="text-end fw-bold">Total Keseluruhan</td>
                    <td>{{ formatRupiah($totalKeseluruhan) }}</td>
                </tr>
            </tbody>
        </table>
    </div>


</body>

</html>
