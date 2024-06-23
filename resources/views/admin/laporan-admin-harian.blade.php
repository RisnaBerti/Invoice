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
                <!--begin::Card toolbar-->
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                   

                    <form class="d-flex justify-content-between" action="{{ route('laporan-admin-harian') }}" method="GET">
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
                    </form>

                    <div id="kt_ecommerce_report_views_export_menu"
                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"
                        data-kt-menu="true">
                        
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
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_report_views_table">

                    <thead>
                        <tr class="text-start text-gray-400 fw-bold fs-4 text-uppercase gs-0">
                            <th>Tanggal Pemasukan</th>
                            <th>Debet</th>
                            <th>Kredit</th>
                            <th>Total Pendapatan</th>
                            <th>Total Piutang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        @foreach ($saldo as $total)
                            <tr>
                                <td>
                                    <span>{{ date('d-M-Y', strtotime($total->tgl_pemasukan)) }}</span>
                                </td>
                                <td>
                                    <span>Rp. {{ number_format($total->total_debet, 0, ',', '.') }}</span>
                                </td>
                                <td>
                                    <span>Rp. {{ number_format($total->total_kredit, 0, ',', '.') }}</span>
                                </td>
                                <td>
                                    <span>Rp. {{ number_format($total->total_semua - $total->total_piutang, 0, ',', '.') }}</span>
                                </td>
                                <td>
                                    <span>Rp. {{ number_format($total->total_piutang, 0, ',', '.') }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('sendNotifWhatsApp', ['tgl_pemasukan' => $total->tgl_pemasukan, 'saldo' => $saldo]) }}"
                                        class="btn btn-primary"><i class="ki-outline ki-send fs-2"></i>Kirim</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
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
