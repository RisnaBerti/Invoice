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
        <h2>LAPORAN DETAIL PENGELUARAN </h2>
        <h4>{{ $pengeluaran->tgl_pengeluaran }}</h4>
    </center>

    <br />


    <!-- begin::Invoice 3-->
    <div class="card">
        <!-- begin::Body-->
        <div class="card-body py-20">
            <!-- begin::Wrapper-->
            <div class="mw-lg-950px mx-auto w-100">
                <!-- begin::Header-->
                <div class="d-flex justify-content-between flex-column flex-sm-row mb-19">
                    {{-- <h4 class="fw-bolder text-gray-800 fs-2qx pe-5 pb-7">DETAIL PENGELUARAN</h4> --}}
                    <!--end::Logo-->
                    <div class="text-sm-end">
                        <!--begin::Logo-->
                        {{-- <a href="" class="d-block mw-150px ms-sm-auto">
                            <img alt="Logo" src="{{ url('') }}/assets/logo.png" class="w-100" />
                        </a> --}}
                        <!--end::Logo-->
                        <!--begin::Text-->
                        <div class="text-sm-end fw-semibold fs-4  mt-7">
                            <div>CV Toba Jaya Teknik Cilacap</div>
                            <div>JL MT. Haryono, No. 75, Donan,Prenca, Cilacap Tengah</div>
                        </div>
                        <!--end::Text-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="pb-12">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column gap-7 gap-md-10">
                        <!--begin::Message-->
                        <div class="fw-bold fs-2">{{ $pengeluaran->nama_perusahaan }}
                            <br />
                            <span class="text-muted fs-3">{{ date('d-M-Y', strtotime($pengeluaran->tgl_pengeluaran)) }}
                            </span>
                            <br />
                            <span class="text-muted fs-5">Dibuat Oleh: {{ $pengeluaran->user->nama }} </span>
                        </div>
                        <!--begin::Message-->
                        <!--begin::Separator-->
                        <div class="separator"></div>
                        <!--begin::Separator-->
                        <!--begin:Order summary-->
                        <div class="d-flex justify-content-between flex-column">
                            <!--begin::Table-->
                            <div class="table-responsive border-bottom mb-9">
                                <table class="table">
                                    <thead>
                                        <tr class="border-bottom fs-6 fw-bold text-muted">
                                            {{-- <th class="text-dark">Jenis Barang</th> --}}
                                            <th class="text-dark">Nama Barang</th>
                                            <th class="text-dark">QTY</th>
                                            <th class="text-dark">Harga Satuan</th>
                                            <th class="text-dark">Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($pengeluaran->detail as $detail)
                                            <tr>
                                                {{-- <td>
                                                    {{ $detail->jenis_pengeluaran }}
                                                </td> --}}
                                                <td>
                                                    <ul>
                                                        {{ $detail->nama_barang_keluar }}
                                                    </ul>
                                                <td>
                                                    {{ $detail->jumlah_barang_keluar }}
                                                </td>
                                                <td>
                                                    {{ 'Rp ' . number_format($detail->harga_satuan, 0, ',', '.') }}
                                                </td>
                                                <td>
                                                    {{ 'Rp ' . number_format($detail->subtotal, 0, ',', '.') }}

                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3" class="fs-5 text-dark fw-bold">Total</td>
                                            <td class="text-dark fs-5 fw-bolder">
                                                {{ 'Rp ' . number_format($pengeluaran->total_harga, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end:Order summary-->
                    </div>
                    <!--end::Wrapper-->
                </div>
               
            </div>
            <!-- end::Wrapper-->
        </div>
        <!-- end::Body-->
    </div>
    <!-- end::Invoice 1-->

    <script>
        window.print();
    </script>

    </div>
</body>

</html>
