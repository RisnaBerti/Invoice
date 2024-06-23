@extends('layouts.index')
@section('content')
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Products-->
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Export buttons-->
                    <div id="kt_ecommerce_report_views_export" class="d-none"></div>
                    <!--end::Export buttons-->
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_report_views_table">
                    <thead>
                        @php
                            $totalPemasukan = 0;
                            $totalPengeluaran = 0;
                            $labaRugi = 0;
                            foreach ($pemasukan as $data) {
                                $totalPemasukan += $data->total_pemasukan;
                            }
                            foreach ($pengeluaran as $data) {
                                $totalPengeluaran += $data->harga_satuan * $data->jumlah_barang_keluar;
                            }
                            $labaRugi = $totalPemasukan - $totalPengeluaran;
                        @endphp
                        <tr>
                            <th>Nama Pemasukan</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        @foreach ($pemasukan as $data)
                            <tr>
                                <td>{{ $data->mitra->nama_mitra }}</td>
                                <td>{{ 'Rp ' . number_format($data->total_pemasukan) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="text-end fw-bold">Total Pemasukan</td>
                            <td>{{ 'Rp ' . number_format($totalPemasukan) }}</td>
                        </tr>
                    </tbody>
                </table>

                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_report_views_table">
                    <thead>
                        <tr>
                            <th>Nama Pengeluaran</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        @foreach ($pengeluaran as $data)
                            <tr>
                                <td>{{ $data->nama_barang_keluar }}</td>
                                <td>{{  'Rp ' . number_format($data->harga_satuan) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="text-end fw-bold">Total Pengeluaran</td>
                            <td>{{ 'Rp ' . number_format($totalPengeluaran) }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="text fw-bold fs-2 mt-5">Total Laba / Rugi: {{ 'Rp ' . number_format($labaRugi) }}</div>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
            <div class="my-1 me-5">
                {{-- tombol kembali ke route laporan-pemasukan-admin --}}
                <button type="button" class="btn btn-light-success my-1"
                    onclick="window.location.href='{{ route('laporan-laba-rugi-admin') }}'">Kembali</button>
            </div>
        </div>
        <!--end::Products-->
    </div>
    <!--end::Content container-->




    {{-- <span>{{ \Carbon\Carbon::parse($total->tgl_pemasukan)->translatedFormat('l, d-M-Y') }}</span> --}}
@endsection
