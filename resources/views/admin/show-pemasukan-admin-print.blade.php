<!DOCTYPE html>
<html>

<head>
    <title>Detail Pemasukan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2,
        h4 {
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <center>
        <h2>LAPORAN DETAIL PEMASUKAN <br /> {{ $pemasukan->mitra->nama_mitra }}</h2>
        <h4>{{ $pemasukan->tgl_pemasukan }}</h4>
    </center>

    <br />

    <div class="card">
        <!-- begin::Body-->
        <div class="card-body py-20">
            <!-- begin::Wrapper-->
            <div class="mw-lg-950px mx-auto w-100">
                <div class="d-flex justify-content-between flex-column flex-md-row mb-19">
                    {{-- <h4 class="fw-bolder text-gray-800 fs-2qx pe-5 pb-7">DETAIL PEMASUKAN</h4> --}}
                    <div class="row">
                        {{-- <div class="col-md-6">
                            <img src="{{ url('') }}/assets/logo.png" class="w-100" style="max-width: 150px;" />
                        </div> --}}
                        <div class="col-md-6">
                            <div class="fw-semibold fs-4">
                                <div>CV Toba Jaya Teknik Cilacap</div>
                                <div>JL MT. Haryono, No. 75, Donan, Prenca, Cilacap Tengah</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pb-12">
                    <div class="d-flex flex-column gap-7 gap-md-10">
                        <div class="fw-bold fs-2">
                            {{ $pemasukan->mitra->nama_mitra }} <br />
                            <span
                                class="text-muted fs-3">{{ date('d-M-Y', strtotime($pemasukan->tgl_pemasukan)) }}</span>
                            <br />
                            <span class="text-muted fs-5">Dibuat Oleh: {{ $pemasukan->user->nama }}</span>
                        </div>
                        <div class="separator"></div>
                        <div class="d-flex justify-content-between flex-column">
                            <div class="table-responsive border-bottom mb-9">
                                <table class="table">
                                    <thead>
                                        <tr class="border-bottom fs-6 fw-bold text-muted">
                                            <th class="text-dark">Nama Barang</th>
                                            <th class="text-dark">Harga Barang</th>
                                            <th class="text-dark">QTY</th>
                                            <th class="text-dark">Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($pemasukan->detail as $detail)
                                            <tr>
                                                <td>{{ $detail->produk->nama_produk }}</td>
                                                <td>{{ 'Rp ' . number_format($detail->harga_barang_masuk, 0, ',', '.') }}
                                                </td>
                                                <td>{{ $detail->jumlah_barang_masuk }}</td>
                                                <td>{{ 'Rp ' . number_format($detail->subtotal, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3" class="fs-5 text-dark fw-bold">Total</td>
                                            <td class="text-dark fs-5 fw-bolder">
                                                {{ 'Rp ' . number_format($pemasukan->total_harga, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="fs-5 text-dark fw-bold">Bayar</td>
                                            <td class="text-dark fs-5 fw-bolder">
                                                {{ 'Rp ' . number_format($pemasukan->bayar, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="fs-5 text-dark fw-bold">Jenis Bayar</td>
                                            <td class="text-dark fs-5 fw-bolder">{{ $pemasukan->jenis_bayar }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="fs-5 text-dark fw-bold">Keterangan</td>
                                            <td class="text-dark fs-5 fw-bolder">{{ $pemasukan->keterangan }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    window.print();
                </script>

            </div>
        </div>
    </div>
</body>

</html>
