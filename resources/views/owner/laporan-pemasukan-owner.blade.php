@extends('layouts.index-owner')
@section('content')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <style>
        th,
        td {
            text-align: center;
        }
    </style>

    <div class="container my-4">
        {{-- <form method="GET" action="{{ route('laporan-pemasukan-admin') }}" class="mb-4">
            <div class="row">
                <div class="col-2">
                    <label for="nama_mitra" class="form-label">Nama Mitra</label>
                    <select class="form-select" id="nama_mitra" name="nama_mitra">
                        <option value="">-- Pilih Mitra --</option>
                        @foreach ($mitra as $item)
                            <option value="{{ $item->id }}" @if (request()->get('nama_mitra') == $item->id) selected @endif>
                                {{ $item->nama_mitra }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <label for="tgl_awal" class="form-label">Tanggal Awal</label>
                    <input type="date" class="form-control" id="tgl_awal" name="tgl_awal"
                        value="{{ request()->get('tgl_awal') }}">
                </div>
                <div class="col-2">
                    <label for="tgl_akhir" class="form-label">Tanggal Akhir</label>
                    <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir"
                        value="{{ request()->get('tgl_akhir') }}">
                </div>
                <div class="col-sm-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary mr-2">Filter</button>
                    <a href="{{ route('laporan-pemasukan-admin') }}" class="btn btn-danger mr-2">Reset</a>
                    <a href="{{ route('laporan-pemasukan-admin-print', ['nama_mitra' => request()->get('nama_mitra'), 'tgl_awal' => request()->get('tgl_awal'), 'tgl_akhir' => request()->get('tgl_akhir')]) }}"
                        target="_blank" class="btn btn-success">Print</a>
                </div>
            </div>
        </form> --}}
        <div class="card-body py-4">
            <div class="container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>MITRA</th>
                            <th>TOTAL DEBET</th>
                            <th>TOTAL KREDIT</th>
                            <th>SUB TOTAL</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $index = 1;
                            $totalKeseluruhan = 0;
                        @endphp
                        @foreach ($mitraTotals as $totals)
                            <tr>
                                <td>{{ $index }}</td>
                                <td>{{ $totals['mitra'] }}</td>
                                <td>{{ 'Rp ' . number_format($totals['totalDebet']) }}</td>
                                <td>{{ 'Rp ' . number_format($totals['totalKredit']) }}</td>
                                <td>{{ 'Rp ' . number_format($totals['subtotal']) }}</td>
                                <td>
                                    <a href="{{ route('laporan-pemasukan-admin-show', $totals['mitra']) }}" class="btn btn-primary">Detail</a>
                                </td>
                            </tr>
                            @php
                                $index++;
                                $totalKeseluruhan += $totals['subtotal'];
                            @endphp
                        @endforeach
                        <tr>
                            <td colspan="4" class="text-end fw-bold">Total Keseluruhan</td>
                            <td>{{ 'Rp ' . number_format($totalKeseluruhan) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
