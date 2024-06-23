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
                            {{-- <div class="fw-bold fs-2">{{ $pemasukan->mitra->nama_mitra }}
                                <br />
                                <span class="text-muted fs-5">Dibuat Oleh: {{ $pemasukan->user->nama }}</span>
                            </div> --}}
                            <!--begin::Message-->
                            <!--begin::Separator-->
                            <div class="separator"></div>
                            <!--begin::Separator-->
                            <!--begin:Order summary-->
                            <div class="d-flex justify-content-between flex-column">
                                <!--begin::Table-->
                                <div class="table-responsive border-bottom mb-9">
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
                                                            $subtotal =
                                                                $detail->harga_barang_masuk *
                                                                $detail->jumlah_barang_masuk;
                                                            $total_harga += $subtotal;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $index }}</td>
                                                            <td>{{ $tgl_pemasukan }}</td>
                                                            <td>{{ $item->mitra->nama_mitra }}</td>
                                                            <td>{{ $detail->produk->nama_produk }}</td>
                                                            <td>{{ 'Rp ' . number_format($detail->harga_barang_masuk) }}</td>
                                                            <td>{{ $detail->jumlah_barang_masuk }}</td>
                                                            <td>{{ 'Rp ' . number_format($subtotal) }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" class="text-end fw-bold">Total Harga</td>
                                                    <td>{{ 'Rp ' . number_format($total_harga) }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" class="text-end fw-bold">Sudah dibayarkan</td>
                                                    <td>{{ 'Rp ' . number_format($item->bayar) }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" class="text-end fw-bold">Keterangan</td>
                                                    <td>{{ $item->jenis_bayar }} ({{ $item->keterangan }})</td>
                                                </tr>
                                                @php
                                                    $index++;
                                                    $totalKeseluruhan += $total_harga;
                                                @endphp
                                            @endforeach
                                            <tr>
                                                <td colspan="6" class="text-end fw-bold">Total Keseluruhan</td>
                                                <td>{{ 'Rp ' . number_format($totalKeseluruhan) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end:Order summary-->
                        </div>
                        <!--end::Wrapper-->
                        <!-- begin::Actions-->
                        <div class="my-1 me-5">
                            {{-- tombol kembali ke route laporan-pemasukan-admin --}}
                            <button type="button" class="btn btn-light-success my-1"
                                onclick="window.location.href='{{ route('laporan-pemasukan-admin') }}'">Kembali</button>
                        </div>
                        <!-- end::Actions-->
                    </div>
                    <!--end::Body-->
                </div>
                <!-- end::Wrapper-->
            </div>
            <!-- end::Body-->
        </div>
        <!-- end::Invoice 1-->
    </div>
    <!--end::Content container-->
@endsection
