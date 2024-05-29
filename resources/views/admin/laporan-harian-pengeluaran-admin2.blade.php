@extends('layouts.index')
@section('content')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            /* border: 1px solid black;
                    padding: 8px; */
            text-align: center;
            /* Center align text in th and td */
        }

        th {
            background-color: #f2f2f2;
        }

        .title {
            text-align: center;
            margin-top: 20px;
        }
    </style>
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Products-->
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <!--begin::Card title-->
                <div class="card-title">
                    <form method="GET" action="{{ route('laporan-harian-pengeluaran-admin') }}" class="mb-4">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="tgl_awal" class="form-label">Tanggal Awal</label>
                                <input type="date" class="form-control" id="tgl_awal" name="tgl_awal"
                                    value="{{ request()->get('tgl_awal') }}">
                            </div>
                            <div class="col-md-5">
                                <label for="tgl_akhir" class="form-label">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir"
                                    value="{{ request()->get('tgl_akhir') }}">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>

                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        {{-- <i class="ki-outline ki-magnifier fs-2 position-absolute ms-4"></i>
                        <input type="text" data-kt-ecommerce-order-filter="search"
                            class="form-control form-control-solid w-250px ps-12" placeholder="Search Report" /> --}}
                    </div>
                    <!--end::Search-->
                    <!--begin::Export buttons-->
                    <div id="kt_ecommerce_report_views_export" class="d-none"></div>
                    <!--end::Export buttons-->
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">


                    {{-- <form class="d-flex justify-content-between" action="{{ route('laporan-admin-harian') }}"
                        method="GET">
                        <div class="col">
                            <!--begin::Select2-->
                            <select id="bulan" name="bulan" class="form-select form-select-solid"
                                data-control="select2" data-hide-search="true" data-placeholder="Rating"
                                data-kt-ecommerce-order-filter="rating">
                                <option selected>Pilih Bulan</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <!--end::Select2-->
                        </div>
                        <div class="col">
                            <!--begin::Select2-->
                            <select id="tahun" name="tahun" class="form-select form-select-solid"
                                data-control="select2" data-hide-search="true" data-placeholder="Rating"
                                data-kt-ecommerce-order-filter="rating">
                                <option selected>Pilih Tahun</option>
                                @foreach ($tahun as $data)
                                    {
                                    <option value="{{ $data->tahun }}">{{ $data->tahun }}</option>
                                    }
                                @endforeach
                            </select>
                            <!--end::Select2-->
                        </div>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form> --}}

                    <!--begin::Export dropdown-->
                    {{-- <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        <i class="ki-outline ki-exit-up fs-2"></i>Export Laporan</button> --}}
                    <!--begin::Menu-->
                    <div id="kt_ecommerce_report_views_export_menu"
                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        {{-- <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-ecommerce-export="excel">Export as Excel</a>
                        </div> --}}
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-ecommerce-export="pdf">Export as PDF</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                    <!--end::Export dropdown-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <table class="table table-bordered align-middle table-row-dashed fs-6 gy-5" ">
                        <thead>
                            <tr class="text-center fw-bold fs-5 text-uppercase gs-0">
                                <th rowspan="2">NO</th>
                                <th rowspan="2">TANGGAL</th>
                                <th colspan="4">DETAIL PENGELUARAN</th>
                            </tr>
                            <tr class="text-center fw-bold fs-5 text-uppercase gs-0">
                                <th>Nama Barang</th>
                                <th>QTY</th>
                                <th>Harga Satuan</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                             @foreach ($pengeluaran as $key=> $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->tgl_pengeluaran }}</td>
                        @foreach ($item->detail as $detail)
                            <td>{{ $detail->nama_barang_keluar }}</td>
                            <td>{{ $detail->jumlah_barang_keluar }}</td>
                            <td>{{ $detail->harga_satuan }}</td>
                            <td>{{ $detail->subtotal }}</td>
                        @endforeach
                        <td>{{ $item->total_harga }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">Total</td>
                            <td>{{ $item->total_harga }}</td>
                        </tr>
                    </tfoot>
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Products-->
    </div>
    <!--end::Content container-->




    {{-- <span>{{ \Carbon\Carbon::parse($total->tgl_pemasukan)->translatedFormat('l, d-M-Y') }}</span> --}}
@endsection
