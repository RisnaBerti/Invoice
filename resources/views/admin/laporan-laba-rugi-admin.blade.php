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

                    {{-- filter bulan dan tahun --}}
                    {{-- <form method="GET" action="{{ route('laporan-laba-rugi-admin') }}" class="mb-4">
                        <div class="row">
                            <div class="col-2">
                                <label for="bulan" class="form-label">Bulan</label>
                                <select class="form-select" id="bulan" name="bulan">
                                    <option value="">-- Pilih Bulan --</option>
                                    @foreach (range(1, 12) as $m)
                                        <option value="{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}"
                                            @if (request()->get('bulan') == str_pad($m, 2, '0', STR_PAD_LEFT)) selected @endif>
                                            {{ date('F', mktime(0, 0, 0, $m, 10)) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="tahun" class="form-label">Tahun</label>
                                <select class="form-select" id="tahun" name="tahun">
                                    <option value="">-- Pilih Tahun --</option>
                                    @foreach ($bulanTahun as $item)
                                        <option value="{{ $item->tahun }}"
                                            @if (request()->get('tahun') == $item->tahun) selected @endif>
                                            {{ $item->tahun }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary mr-2">Filter</button>
                                <a href="{{ route('laporan-laba-rugi-admin') }}" class="btn btn-danger mr-2">Reset</a>
                                <a href="{{ route('laporan-laba-rugi-admin-print', ['bulan' => request()->get('bulan'), 'tahun' => request()->get('tahun')]) }}"
                                    target="_blank" class="btn btn-success">Print</a>
                            </div>
                        </div>
                    </form> --}}



                    {{-- end filter bulan dan tahun --}}
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_report_views_table">
                    <thead>
                        <tr class="text-start text-gray-400 fw-bold fs-4 text-uppercase gs-0">
                            <th>No</th>
                            <th>Bulan dan Tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        @foreach ($bulanTahun as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->bulan_tahun }}</td>
                                <td>
                                    <a href="{{ route('laporan-laba-rugi-admin-detail', ['bulan_tahun' => $item->bulan_tahun]) }}"
                                        class="btn btn-primary">Lihat Detail</a>
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
