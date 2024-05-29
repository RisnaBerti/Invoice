@extends('layouts.index')
@section('content')
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!-- begin::Invoice 3-->
        <div class="card">
            <!-- begin::Body-->
            <div class="card-body py-20">
                <!-- begin::Wrapper-->
                <div class="mw-lg-950px mx-auto w-100">
                    <!-- begin::Header-->
                    <div class="d-flex justify-content-between flex-column flex-sm-row mb-19">
                        <h4 class="fw-bolder text-gray-800 fs-2qx pe-5 pb-7">DETAIL PEMASUKAN</h4>
                        <!--end::Logo-->
                        <div class="text-sm-end">
                            <!--begin::Logo-->
                            <a href="" class="d-block mw-150px ms-sm-auto">
                                <img alt="Logo" src="{{ url('') }}/assets/logo.png" class="w-100" />
                            </a>
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
                            <div class="fw-bold fs-2">{{ $pemasukan->mitra->nama_mitra }}
                                <br />
                                <span class="text-muted fs-3">{{ date('d-M-Y', strtotime($pemasukan->tgl_pemasukan)) }}
                                </span>
                                <br />
                                <span class="text-muted fs-5">Dibuat Oleh: {{ $pemasukan->user->nama }}</span>
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
                                                <th class="text-dark">Harga Barang</th>
                                                <th class="text-dark">QTY</th>
                                                <th class="text-dark">Bayar</th>
                                                <th class="text-dark">Saldo</th>
                                                <th class="text-dark">Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            @foreach ($pemasukan->detail as $detail)
                                                <tr>
                                                    {{-- <td>
                                                    {{ $detail->jenis_pemasukan }}
                                                </td> --}}
                                                    <td>
                                                        {{ $detail->produk->nama_produk }}
                                                    </td>
                                                    <td>
                                                        {{ 'Rp ' . number_format($detail->harga_barang_masuk, 0, ',', '.') }}
                                                    </td>
                                                    <td>
                                                        {{ $detail->jumlah_barang_masuk }}
                                                    </td>
                                                    <td>
                                                        {{ 'Rp ' . number_format($detail->bayar, 0, ',', '.') }}
                                                    </td>
                                                    <td>
                                                        {{ $detail->saldo }}
                                                    </td>
                                                    <td>
                                                        {{ 'Rp ' . number_format($detail->subtotal, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="5" class="fs-5 text-dark fw-bold">Total</td>
                                                <td class="text-dark fs-5 fw-bolder">
                                                    {{ 'Rp ' . number_format($pemasukan->total_harga, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="fs-5 text-dark fw-bold">keterangan</td>
                                                <td class="text-dark fs-5 fw-bolder">{{ $pemasukan->keterangan }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end:Order summary-->
                        </div>
                        <!--end::Wrapper-->
                        <!-- begin::Actions-->
                        <div class="my-1 me-5">
                            <!-- begin::Pint-->
                            {{-- tombol print redirect ke route print-pemasukan --}}
                            <button type="button" class="btn btn-success my-1 me-4"
                                onclick="window.open('{{ route('show-pemasukan-owner-print', $pemasukan->id_pemasukan) }}', '_blank')">Print
                                Detail</button>

                            {{-- <button type="button" class="btn btn-success my-1 me-4" >Print
                                Detail</button> --}}
                            <button type="button" class="btn btn-light-success my-1"
                                onclick="window.location.href='{{ route('pemasukan-owner') }}'">Kembali</button>
                            <!-- end::Pint-->
                            <!-- begin::Download-->
                            {{-- <button type="button" class="btn btn-light-success my-1">Download</button> --}}
                            <!-- end::Download-->
                        </div>
                        <!-- end::Actions-->
                    </div>
                    <!--end::Body-->
                    <!-- begin::Footer-->
                    {{-- <div class="d-flex flex-stack flex-wrap mt-lg-20 pt-13"> --}}
                    <!-- begin::Actions-->
                    {{-- <div class="my-1 me-5"> --}}
                    <!-- begin::Pint-->
                    {{-- <button type="button" class="btn btn-success my-1 me-12" onclick="window.print();">Print
                                Detail</button> --}}
                    <!-- end::Pint-->
                    <!-- begin::Download-->
                    {{-- <button type="button" class="btn btn-light-success my-1">Download</button> --}}
                    <!-- end::Download-->
                    {{-- </div> --}}
                    <!-- end::Actions-->
                    <!-- begin::Action-->
                    {{-- <a href="{{ route('pemasukan-owner') }}" class="btn btn-primary my-1">Tambah Pemasukan</a> --}}
                    <!-- end::Action-->
                    {{-- </div> --}}
                    <!-- end::Footer-->
                </div>
                <!-- end::Wrapper-->
            </div>
            <!-- end::Body-->
        </div>
        <!-- end::Invoice 1-->
    </div>
    <!--end::Content container-->
@endsection
