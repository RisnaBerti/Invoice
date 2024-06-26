@extends('layouts.index-owner')

@section('content')
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    {{-- <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                        <input type="text" data-kt-user-table-filter="search"
                            class="form-control form-control-solid w-250px ps-13" placeholder="Mencari data" />
                    </div> --}}
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end gap-2 gap-lg-3" data-kt-user-table-toolbar="base">
                        <!--begin::Export button -->
                        {{-- <div class="btn-group">
                            <button type="button" class="btn btn-light-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <span class="svg-icon svg-icon-md">
                                    <!-- Icon -->
                                </span><i class="ki-outline ki-exit-up fs-2"></i> Export
                            </button>
                            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                <!-- Navigation -->
                                <li class="nav-item">
                                    <a href="#" class="dropdown-item">
                                        <span class="nav-icon"><i class="la la-file-pdf-o"></i></span>
                                        <span class="nav-text">PDF</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="dropdown-item">
                                        <span class="nav-icon"><i class="la la-file-excel-o"></i></span>
                                        <span class="nav-text">Excel</span>
                                    </a>
                                </li>
                                <!--end::Navigation-->
                            </ul>
                        </div> --}}
                        <!--end::Export button-->

                        <!--begin::Add Data-->
                        {{-- <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_pemasukan"><i class="ki-outline ki-plus fs-2"></i>Tambah
                            Data</a> --}}
                        <!--end::Add Data-->
                    </div>
                    <!--end::Toolbar-->

                    <!--begin::Modal - Tambah Data -->
                    <div class="modal fade" id="kt_modal_add_pemasukan" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <!--begin::Modal content-->
                            <div class="modal-content rounded">
                                <!--begin::Modal header-->
                                <div class="modal-header pb-0 border-0 justify-content-end">
                                    <!--begin::Close-->
                                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                        <i class="ki-outline ki-cross fs-1"></i>
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--begin::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                    <!--begin:Form-->
                                    <form id="kt_modal_add_pemasukan_form" class="form"
                                        action="{{ route('store-pemasukan-owner') }}" method="POST" id="pemasukanForm">
                                        @csrf
                                        <!--begin::Heading-->
                                        <div class="mb-13 text-center">
                                            <!--begin::Title-->
                                            <h1 class="mb-3">FORM PEMASUKAN</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-muted fw-semibold fs-5">Detail Pemasukan
                                                <a href="" class="fw-bold link-primary">CV Toba Jaya Teknik
                                                    Cilacap</a>.
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Input group-->
                                        <div class="row g-9 mb-8">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">Tanggal Pemasukan</label>
                                                <!--begin::Input-->
                                                <div class="position-relative d-flex align-items-center">
                                                    <!--begin::Icon-->
                                                    <i class="ki-outline ki-calendar-8 fs-2 position-absolute mx-4"></i>
                                                    <!--end::Icon-->
                                                    <!--begin::Datepicker-->
                                                    <input type="date" name="tgl_pemasukan" id="tgl_pemasukan"
                                                        value="{{ now()->format('Y-m-d') }}"
                                                        class="form-control form-control-solid ps-12"
                                                        placeholder="Select a date" name="due_date" />
                                                    <!--end::Datepicker-->
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">Nama Perusahaan</label>
                                                <!--begin::Input-->
                                                <div class="position-relative d-flex align-items-center">
                                                    <select name="id_mitra" class="form-control id_mitra" id="id_mitra">
                                                        @foreach ($mitra as $item)
                                                            <option value="{{ $item->id_mitra }}">{{ $item->nama_mitra }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->

                                        <div class="form-group">
                                            <label>Detail Pemasukan:</label>
                                            <table id="detailTable" class="table">
                                                <thead>
                                                    <tr>
                                                        {{-- <th>Jenis Barang</th> --}}
                                                        <th>Nama Barang</th>
                                                        <th>QTY</th>
                                                        <th>Harga Satuan</th>
                                                        <th>Sub Total</th>
                                                        <th>Bayar</th>
                                                        <th>Saldo (Debet/Kredit)</th>
                                                        <th class="text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="5" class="text-end">Total:</th>
                                                        <th class="flex justify-between">
                                                            <input type="text" id="total_harga" name="total_harga"
                                                                class="form-control" required readonly>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="5" class="text-end">Keterangan:</th>
                                                        <td>
                                                            <select name="keterangan" class="form-control keterangan"
                                                                id="keterangan">
                                                                <option value="Belum Lunas">Belum Lunas</option>
                                                                <option value="Lunas">Lunas</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <select name="detail[0][id_produk]"
                                                                class="form-control id_produk" id="detail_0_id_produk"
                                                                onchange="updateHarga(0)">
                                                                <option value="" disabled selected>Pilih Produk
                                                                </option>
                                                                @foreach ($produk as $item)
                                                                    <option value="{{ $item->id_produk }}"
                                                                        data-harga="{{ $item->harga_produk }}">
                                                                        {{ $item->nama_produk }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="detail[0][jumlah_barang_masuk]"
                                                                id="detail[0][jumlah_barang_masuk]"
                                                                class="form-control jumlah_barang_masuk" required>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="detail[0][harga_barang_masuk]"
                                                                id="detail_0_harga_barang_masuk"
                                                                class="form-control harga_barang_masuk" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="detail[0][subtotal]"
                                                                id="detail[0][subtotal]" class="form-control subtotal"
                                                                required readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="detail[0][bayar]"
                                                                id="detail[0][bayar]" class="form-control bayar" required>
                                                        </td>
                                                        <td>
                                                            <select name="detail[0][saldo]" class="form-control saldo"
                                                                id="saldo">
                                                                <option value="Debet">Debet</option>
                                                                <option value="Kredit">Kredit</option>
                                                            </select>
                                                        </td>
                                                        <td class="add-remove text-end">
                                                            <a href="javascript:void(0);" class="add-btn me-2">
                                                                <i class="fas fa-plus-circle text-success"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" class="remove-btn">
                                                                <i class="fas fa-trash text-danger"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!--begin::Actions-->
                                        <div class="text-center">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" id="kt_modal_add_pemasukan_submit"
                                                class="btn btn-primary">
                                                <span class="indicator-label">Submit</span>
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end:Form-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                            <!--end::Modal content-->
                        </div>
                        <!--end::Modal dialog-->
                    </div>
                    <!--end::Modal - Tambah Data -->

                    <!--begin::Modal - Edit Data -->
                    <div class="modal fade" id="kt_modal_edit_data" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <!--begin::Modal content-->
                            <div class="modal-content rounded">
                                <!--begin::Modal header-->
                                <div class="modal-header pb-0 border-0 justify-content-end">
                                    <!--begin::Close-->
                                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                        <i class="ki-outline ki-cross fs-1"></i>
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--begin::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                    <!--begin:Form-->
                                    <form id="kt_modal_edit_data_form" class="form"
                                        action="{{ route('update-pemasukan-owner') }}" method="POST"
                                        id="editPemasukanForm">
                                        @csrf
                                        {{-- @method('PUT') --}}
                                        <!--begin::Heading-->
                                        <div class="mb-13 text-center">
                                            <!--begin::Title-->
                                            <h1 class="mb-3">FORM PEMASUKAN</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-muted fw-semibold fs-5">Detail Pemasukan
                                                <a href="" class="fw-bold link-primary">CV Toba Jaya Teknik
                                                    Cilacap</a>.
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <input type="hidden" name="id_pemasukan_edit" id="id_pemasukan_edit">
                                        <!--begin::Input group-->
                                        <div class="row g-9 mb-8">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">Tanggal Pemasukan</label>
                                                <!--begin::Input-->
                                                <div class="position-relative d-flex align-items-center">
                                                    <!--begin::Icon-->
                                                    <i class="ki-outline ki-calendar-8 fs-2 position-absolute mx-4"></i>
                                                    <!--end::Icon-->
                                                    <!--begin::Datepicker-->
                                                    <input type="date" name="tgl_pemasukan_edit"
                                                        id="tgl_pemasukan_edit"
                                                        class="form-control form-control-solid ps-12" />
                                                    <!--end::Datepicker-->
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">Nama Perusahaan</label>
                                                <div class="position-relative d-flex align-items-center">
                                                    <select class="form-control form-control-solid" id="id_mitra_edit"
                                                        name="id_mitra_edit" required>
                                                        <!-- Options will be populated by JavaScript -->
                                                        {{-- @foreach ($jurusan as $item)
                                                            <option value="{{ $item->id_jurusan }}"
                                                                {{ $alumni->id_jurusan == $item->id_jurusan ? 'selected' : '' }}>
                                                                {{ $item->nama_jurusan }}</option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Detail Pemasukan-->
                                        <div class="form-group">
                                            <label>Detail Pemasukan:</label>
                                            <table id="detailTableEdit" class="table">
                                                <thead>
                                                    <tr>
                                                        {{-- <th>Jenis Barang</th> --}}
                                                        <th>Nama Barang</th>
                                                        <th>QTY</th>
                                                        <th>Harga Satuan</th>
                                                        <th>Sub Total</th>
                                                        <th>Pembayaran</th>
                                                        <th>Saldo (Debet/Kredit)</th>
                                                        <th class="text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="5" class="text-end">Total:</th>
                                                        <th class="flex justify-between">
                                                            <input type="text" id="total_harga_edit"
                                                                name="total_harga_edit" class="form-control" required
                                                                readonly>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="5" class="text-end">Keterangan:</th>
                                                        <td>
                                                            <select name="keterangan_edit"
                                                                class="form-control keterangan_edit" id="keterangan_edit">

                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" name="detail[0][id_produk_edit]"
                                                                id="detail[0][id_produk_edit]"
                                                                class="form-control id_produk_edit" required></td>
                                                        <td><input type="number"
                                                                name="detail[0][jumlah_barang_masuk_edit]"
                                                                id="detail[0][jumlah_barang_masuk_edit]"
                                                                class="form-control jumlah_barang_masuk_edit" required>
                                                        </td>
                                                        <td><input type="text"
                                                                name="detail[0][harga_barang_masuk_edit]"
                                                                id="detail[0][harga_barang_masuk_edit]"
                                                                class="form-control harga_barang_masuk_edit" required>
                                                        </td>
                                                        <td><input type="text" name="detail[0][subtotal_edit]"
                                                                id="detail[0][subtotal_edit]"
                                                                class="form-control subtotal_edit" required readonly></td>
                                                        <td>
                                                            <input type="text" name="detail[0][bayar_edit]"
                                                                id="detail[0][bayar_edit]" class="form-control bayar_edit"
                                                                required>
                                                        </td>
                                                        <td>
                                                            <select name="detail[0][saldo_edit]"
                                                                class="form-control saldo_edit" id="saldo_edit">
                                                                {{-- <option value="Debet"></option> --}}
                                                                {{-- <option value="Kredit">Kredit</option> --}}
                                                            </select>
                                                        </td>
                                                        <td class="add-remove text-end">
                                                            <a href="javascript:void(0);" class="add-btn-edit me-2">
                                                                <i class="fas fa-plus-circle text-success"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" class="remove-btn-edit">
                                                                <i class="fas fa-trash text-danger"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Detail Pemasukan-->

                                        <!--begin::Actions-->
                                        <div class="text-center">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" id="kt_modal_add_pemasukan_submit_edit"
                                                class="btn btn-primary">
                                                <span class="indicator-label">Submit</span>
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end:Form-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                            <!--end::Modal content-->
                        </div>
                        <!--end::Modal dialog-->
                    </div>
                    <!--end::Modal - Edit Data -->

                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Table-->
                <table class="table table-hover align-middle table-row-dashed fs-6 gy-5"
                    id="kt_table_users" name="kt_table_users">

                    <thead>
                        <tr class="table-light fw-bold fs-7 text-uppercase gs-0">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Perusahaan</th>
                            <th>Total</th>
                            <th>Produk</th>
                            <th>Jumlah Barang</th>
                            <th>Harga Barang</th>
                            <th>Subtotal</th>
                            <th>Saldo</th>
                            <th>Bayar</th>
                            <th>Keterangan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">

                    </tbody>
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->

        </div>
        <!--end::Card-->
    </div>
    <!--end::Content container-->

    <!-- Memuat jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        function updateHarga(index) {
            var selectProduk = document.getElementById('detail_' + index + '_id_produk');
            var selectedOption = selectProduk.options[selectProduk.selectedIndex];
            var harga = selectedOption.getAttribute('data-harga');

            var inputHarga = document.getElementById('detail_' + index + '_harga_barang_masuk');
            inputHarga.value = formatRupiah(harga);
        }

        function formatRupiah(angka) {
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return 'Rp ' + rupiah;
        }

        // // Fungsi untuk menghitung subtotal
        // function calculateTotal(row) {
        //     var jumlah_barang_masuk = parseInt(row.find('.jumlah_barang_masuk').val()) || 0;
        //     var harga_barang_masuk = parseInt(row.find('.id_produk option:selected').data('harga')) || 0; // Ambil harga dari opsi yang dipilih
        //     var total_harga = jumlah_barang_masuk * harga_barang_masuk;
        //     row.find('.subtotal').val(formatRupiah(total_harga));
        // }

        // // Panggil fungsi calculateTotal saat ada perubahan pada jumlah barang masuk
        // $(document).on('change', '.jumlah_barang_masuk', function() {
        //     var row = $(this).closest('tr');
        //     calculateTotal(row);
        // });

        // // Fungsi untuk menghitung total_harga keseluruhan
        // function calculateGrandTotal() {
        //     var grandTotal = 0;
        //     $('.subtotal').each(function() {
        //         var subtotal = parseFloat($(this).val().replace(/\./g, '').replace('Rp ', '')) || 0;
        //         grandTotal += subtotal;
        //     });
        //     // Periksa apakah elemen dengan id 'total_harga' ada
        //     if ($('#total_harga').length > 0) {
        //         $('#total_harga').val(formatRupiah(grandTotal));
        //     }
        // }

        // // Panggil fungsi calculateGrandTotal saat ada perubahan pada subtotal
        // $(document).on('change', '.subtotal', function() {
        //     calculateGrandTotal();
        // });

        // // Panggil fungsi calculateGrandTotal saat menambah atau menghapus baris
        // $(document).on('click', '.remove-btn, .add-btn', function() {
        //     calculateGrandTotal();
        // });
    </script>

    <script>
        $(document).ready(function() {
            $('#kt_table_users').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('pemasukan-owner') }}",
                columns: [{
                        data: 'id_pemasukan',
                        name: 'id_pemasukan'
                    },
                    {
                        data: 'tgl_pemasukan',
                        name: 'tgl_pemasukan',
                        render: function(data) {
                            return moment(data).format('DD-MM-YYYY');
                        }
                    },
                    {
                        data: 'nama_mitra',
                        name: 'nama_mitra'
                    },
                    {
                        data: 'total_harga',
                        name: 'total_harga',
                        render: function(data) {
                            return 'Rp ' + parseInt(data).toLocaleString();
                        }
                    },
                    {
                        data: 'nama_produk',
                        name: 'nama_produk'
                    },
                    {
                        data: 'jumlah_barang_masuk',
                        name: 'jumlah_barang_masuk'
                    },
                    {
                        data: 'harga_barang_masuk',
                        name: 'harga_barang_masuk',
                        // render: function(data) {
                        //     return 'Rp ' + parseInt(data).toLocaleString();
                        // }
                    },
                    {
                        data: 'subtotal',
                        name: 'subtotal',
                        // render: function(data) {
                        //     return 'Rp ' + parseInt(data).toLocaleString();
                        // }
                    },
                    {
                        data: 'saldo',
                        name: 'saldo'
                    },
                    {
                        data: 'bayar',
                        name: 'bayar',
                        render: function(data) {
                            return 'Rp ' + parseInt(data).toLocaleString();
                        }
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

        });
    </script>

    {{-- // Memuat DataTable --}}
    {{-- <script>
        $(document).ready(function() {
            $('#kt_table_users').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('pemasukan-owner') }}"
                },
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            // Menggunakan meta.row untuk mendapatkan nomor urut
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'tgl_pemasukan',
                        name: 'tgl_pemasukan',
                        render: function(data) {
                            // Memformat tanggal menggunakan Moment.js
                            return moment(data).format('DD-MM-YYYY');
                        }
                    },
                    {
                        data: 'id_mitra',
                        name: 'id_mitra'
                    },
                    {
                        data: 'total_harga',
                        name: 'total_harga',
                        render: function(data) {
                            // Memformat harga menggunakan Number.prototype.toLocaleString()
                            return 'Rp ' + parseInt(data).toLocaleString();
                        }
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });
        });
    </script> --}}

    {{-- //Modal Untuk Tambah Data Pemasukan --}}
    <script>
        $(document).ready(function() {
            $(document).on('click', '.add-btn', function() {
                var rowCount = $('#detailTable tbody tr').length;
                var row = '<tr>' +
                    '<td>' +
                    '<select name="detail[' + rowCount +
                    '][id_produk]" class="form-control id_produk" id="detail_' + rowCount +
                    '_id_produk" onchange="updateHarga(' + rowCount + ')">' +
                    '<option value="" disabled selected>Pilih Produk</option>' +
                    '@foreach ($produk as $item)' +
                    '<option value="{{ $item->id_produk }}" data-harga="{{ $item->harga_produk }}">{{ $item->nama_produk }}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '</td>' +
                    '<td><input type="number" name="detail[' + rowCount +
                    '][jumlah_barang_masuk]" class="form-control jumlah_barang_masuk" required></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][harga_barang_masuk]" id="detail_' + rowCount +
                    '_harga_barang_masuk" class="form-control harga_barang_masuk" readonly></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][subtotal]" class="form-control subtotal" required readonly></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][bayar]" class="form-control bayar" required></td>' +
                    '<td><select name="detail[' + rowCount +
                    '][saldo]" class="form-control saldo" required>' +
                    '<option value="Debet">Debet</option>' +
                    '<option value="Kredit">Kredit</option>' +
                    '</select></td>' +
                    '<td class="add-remove text-end">' +
                    '<a href="javascript:void(0);" class="add-btn me-2">' +
                    '<i class="fas fa-plus-circle text-success"></i>' +
                    '</a>' +
                    '<a href="javascript:void(0);" class="remove-btn">' +
                    '<i class="fas fa-trash text-danger"></i>' +
                    '</a>' +
                    '</td>' +
                    '</tr>';
                $('#detailTable tbody').append(row);
            });

            function updateHarga(index) {
                var selectProduk = document.getElementById('detail_' + index + '_id_produk');
                var selectedOption = selectProduk.options[selectProduk.selectedIndex];
                var harga = selectedOption.getAttribute('data-harga');

                var inputHarga = document.getElementById('detail_' + index + '_harga_barang_masuk');
                inputHarga.value = formatRupiah(harga);

                var row = $(selectProduk).closest('tr');
                calculateTotal(row);
            }

            function formatRupiah(angka) {
                var number_string = angka.toString().replace(/[^,\d]/g, ''),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return 'Rp ' + rupiah;
            }

            function calculateTotal(row) {
                var jumlah_barang_masuk = parseInt(row.find('.jumlah_barang_masuk').val()) || 0;
                var harga_barang_masuk = parseInt(row.find('.harga_barang_masuk').val().replace(/\./g, '').replace(
                    'Rp ', '')) || 0;
                var total_harga = jumlah_barang_masuk * harga_barang_masuk;
                row.find('.subtotal').val(formatRupiah(total_harga));
            }

            $(document).on('change', '.jumlah_barang_masuk', function() {
                var row = $(this).closest('tr');
                calculateTotal(row);
            });

            function calculateGrandTotal() {
                var grandTotal = 0;
                $('.subtotal').each(function() {
                    var subtotal = parseFloat($(this).val().replace(/\./g, '').replace('Rp ', '')) || 0;
                    grandTotal += subtotal;
                });

                if ($('#total_harga').length > 0) {
                    $('#total_harga').val(formatRupiah(grandTotal));
                }
            }

            $(document).on('change', '.subtotal', function() {
                calculateGrandTotal();
            });

            $(document).on('click', '.remove-btn, .add-btn', function() {
                calculateGrandTotal();
            });



            // Hitung total_harga keseluruhan
            function calculateGrandTotal() {
                var grandTotal = 0;
                $('.subtotal').each(function() {
                    var subtotal = parseFloat($(this).val().replace(/\./g, '').replace('Rp ', '')) || 0;
                    grandTotal += subtotal;
                });
                // Periksa apakah elemen dengan id 'total_harga' ada
                // row.find('.total_harga').val(formatRupiah(grandTotal));
                if ($('#total_harga').length > 0) {
                    $('#total_harga').val(formatRupiah(grandTotal));
                }
            }

            // Panggil fungsi calculateGrandTotal saat ada perubahan pada subtotal
            $(document).on('change', '.subtotal', function() {
                calculateGrandTotal();
            });

            // Panggil fungsi calculateGrandTotal saat menambah atau menghapus baris
            $(document).on('click', '.remove-btn, .add-btn', function() {
                calculateGrandTotal();
            });

            // Hapus baris pada tabel
            $(document).on('click', '.remove-btn', function() {
                $(this).closest('tr').remove();
            });

            // Hitung total_harga saat jumlah_barang_masuk atau harga_barang_masuk berubah
            $(document).on('change', '.jumlah_barang_masuk, .harga_barang_masuk', function() {
                calculateTotal($(this).closest('tr'));
            });

            // Fungsi untuk menghitung total_harga
            function calculateTotal(row) {
                var jumlah_barang_masuk = parseInt(row.find('.jumlah_barang_masuk').val()) || 0;
                var harga_barang_masuk = parseInt(row.find('.harga_barang_masuk').val().replace(/\./g, '').replace(
                    'Rp ',
                    '')) || 0; // Menghapus titik dan 'Rp' dari harga_barang_masuk
                var total_harga = jumlah_barang_masuk * harga_barang_masuk;
                row.find('.subtotal').val(formatRupiah(total_harga));
            }

            // Format Rupiah saat mengetikkan angka
            $(document).on('keyup', '.harga_barang_masuk', function() {
                $(this).val(formatRupiah($(this).val().replace(/\./g, '')));
            });

            // Format Rupiah
            function formatRupiah(angka) {
                var number_string = angka.toString().replace(/[^,\d]/g, ''),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/g);

                // tambahkan titik jika yang diinput sudah menjadi angka ribuan
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return 'Rp ' + rupiah;
            }

            // Submit form
            $('#pemasukanForm').submit(function() {
                $(this).find('button[type="submit"]').prop('disabled', true);
            });

        });
    </script>

    {{-- //Modal Untuk Edit Data Pemasukan --}}
    {{-- <script>
        $(document).ready(function() {
            // Menampilkan data dalam modal saat tombol "Edit" pada baris tabel diklik
            $('#kt_table_users').on('click', '.edit-row', function() {
                var id = $(this).data('id');
                var url = "{{ route('edit-pemasukan-owner', ':id') }}";
                url = url.replace(':id', id);
                $.get(url, function(data) {
                    $('#id_pemasukan_edit').val(data.id_pemasukan);
                    $('#tgl_pemasukan_edit').val(data.tgl_pemasukan);
                    $('#id_mitra_edit').val(data.id_mitra);
                    $('#total_harga_edit').val(data.total_harga);

                    // Isi dropdown dengan data yang diterima dari server
                    var keteranganDropdown = $("#keterangan_edit");
                    keteranganDropdown.empty(); // Kosongkan opsi sebelum mengisi ulang

                    // Tambahkan opsi dari data yang diterima
                    keteranganDropdown.append('<option value="Belum Lunas"' + (data.keterangan === 'Belum Lunas' ? ' selected' : '') + '>Belum Lunas</option>');
                    keteranganDropdown.append('<option value="Lunas"' + (data.keterangan === 'Lunas' ? ' selected' : '') + '>Lunas</option>');
                    
                   
                    // $('#keterangan_edit').val(data.keterangan);
                   
                    $('#detailTableEdit tbody').empty();
                    data.detail.forEach(function(detail, index) {
                        var row = '<tr>' +
                            '<td><input type="text" name="detail[' + index +'][id_produk_edit]" class="form-control id_produk_edit" value="' +detail.id_produk + '" required></td>' +
                            '<td><input type="number" name="detail[' + index +'][jumlah_barang_masuk_edit]" class="form-control jumlah_barang_masuk_edit" value="' +detail.jumlah_barang_masuk + '" required></td>' +
                            '<td><input type="text" name="detail[' + index + '][harga_barang_masuk_edit]" class="form-control harga_barang_masuk_edit" value="' + detail.harga_barang_masuk + '" required></td>' +
                            '<td><input type="text" name="detail[' + index +'][subtotal_edit]" class="form-control subtotal_edit" value="' +detail.subtotal + '" required readonly></td>' +
                            '<td><input type="text" name="detail[' + index +'][bayar_edit]" class="form-control bayar_edit" value="' +detail.bayar +'" required></td>' +
                            '<td>' +
                            '<select name="detail[' + index +'][saldo_edit]" class="form-control saldo_edit" required>' +
                            '<option value="Debet"' + (detail.saldo === 'Debet' ? ' selected' : '') + '>Debet</option>' +
                            '<option value="Kredit"' + (detail.saldo === 'Kredit' ? ' selected' : '') + '>Kredit</option>' +
                            '</select>' +
                            '</td>' +
                            // '<td><select name="detail[' + index +'][saldo_edit]" class="form-control saldo_edit" required ><option value="Debet">Debet</option><option value="Kredit">Kredit</option></select></td>' +
                            '<td class="add-remove text-end">' +
                            '<a href="javascript:void(0);" class="add-btn-edit me-2"><i class="fas fa-plus-circle text-success"></i></a>' +
                            '<a href="javascript:void(0);" class="remove-btn-edit"><i class="fas fa-trash text-danger"></i></a>' +
                            '</td>' + '</tr>';
                        $('#detailTableEdit').append(row);
                    });

                    //vardump data get
                    console.log(data);
                    die();
                    $("#kt_modal_edit_data").modal("show");
                });
            });

            //save data edit post controller update
            $('#kt_modal_add_pemasukan_submit_edit').click(function() {
                // var id_pemasukan = $('#id_pemasukan').val();
                var tgl_pemasukan = $('#tgl_pemasukan_edit').val();
                var id_mitra = $('#id_mitra_edit').val();
                var keterangan = $('#keterangan_edit').val();
                var detail = [];
                $('#detailTableEdit tbody tr').each(function() {
                    detail.push({
                        // jenis_pemasukan: $(this).find('.jenis_pemasukan_edit').val(),
                        id_produk: $(this).find('.id_produk_edit').val(),
                        jumlah_barang_masuk: $(this).find('.jumlah_barang_masuk_edit')
                            .val(),
                        harga_barang_masuk: $(this).find('.harga_barang_masuk_edit').val(),
                        subtotal: $(this).find('.subtotal_edit').val(),
                        bayar: $(this).find('.bayar_edit').val(),
                        total_harga: $(this).find('.total_harga_edit').val(),
                        saldo: $(this).find('.saldo_edit').val(),
                        // keterangan: $(this).find('.keterangan_edit').val()
                    });
                });
                $.ajax({
                    url: "{{ route('update-pemasukan-owner') }}",
                    type: "POST",
                    data: {
                        // id_pemasukan: id_pemasukan,
                        tgl_pemasukan: tgl_pemasukan_edit,
                        id_mitra: id_mitra,
                        keterangan: keterangan,
                        detail: detail
                    },
                    success: function(response) {
                        console.log(response);
                        $('#kt_modal_edit_data').modal('hide');
                        location.reload();
                    }
                });
            });

            // Hapus baris pada tabel Detail Barang Masuk
            $("#detailTableEdit").on('click', '.remove-btn-edit', function() {
                $(this).closest('tr').remove();
                calculateGrandTotal();
            });

            //klik add button pada tabel
            $(document).on('click', '.add-btn-edit', function() {
                var rowCount = $('#detailTableEdit tbody tr').length;
                var row = '<tr>' +
                    // '<td><input type="hidden" name="detail[' + rowCount +
                    // '][jenis_pemasukan_edit]" class="form-control jenis_pemasukan_edit" ></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][id_produk_edit]" class="form-control id_produk_edit" required></td>' +
                    '<td><input type="number" name="detail[' + rowCount +
                    '][jumlah_barang_masuk_edit]" class="form-control jumlah_barang_masuk_edit" required></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][harga_barang_masuk_edit]" class="form-control harga_barang_masuk_edit" required></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][subtotal_edit]" class="form-control subtotal_edit" required readonly></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][bayar_edit]" class="form-control bayar_edit" required></td>' +
                    '<td><select name="detail[' + rowCount +
                    '][saldo_edit]" class="form-control saldo_edit" required><option value="Debet">Debet</option><option value="Kredit">Kredit</option></select></td>' +
                    // '<td><input type="text" name="detail[' + rowCount +
                    // '][keterangan_edit]" class="form-control keterangan_edit" required></td>' +
                    '<td class="add-remove text-end">' +
                    '<a href="javascript:void(0);" class="add-btn-edit me-2"><i class="fas fa-plus-circle text-success"></i></a>' +
                    '<a href="javascript:void(0);" class="remove-btn-edit"><i class="fas fa-trash text-danger"></i></a>' +
                    '</td>' + '</tr>';
                $('#detailTableEdit tbody').append(row);
            });

            // Hapus baris pada tabel
            $(document).on('click', '.remove-btn-edit', function() {
                $(this).closest('tr').remove();
            });

            // Hitung total_harga keseluruhan
            function calculateGrandTotal() {
                var grandTotal = 0;
                $('.subtotal_edit').each(function() {
                    var subtotal_edit = parseFloat($(this).val().replace(/\./g, '').replace('Rp ', '')) ||
                        0;
                    grandTotal += subtotal_edit;
                });
                $('#total_harga_edit').val(formatRupiah(grandTotal));
            }

            // Panggil fungsi calculateGrandTotal saat ada perubahan pada subtotal_edit
            $(document).on('change', '.subtotal_edit', function() {
                calculateGrandTotal();
            });

            // Panggil fungsi calculateGrandTotal saat menambah atau menghapus baris
            $(document).on('click', '.remove-btn-edit, .add-btn-edit', function() {
                calculateGrandTotal();
            });


            // Hitung total_harga saat jumlah_barang_masuk atau harga_barang_masuk_edit berubah
            $(document).on('change', '.jumlah_barang_masuk_edit, .harga_barang_masuk_edit', function() {
                calculateTotal($(this).closest('tr'));
            });

            // Fungsi untuk menghitung total_harga
            function calculateTotal(row) {
                var jumlah_barang_masuk_edit = parseInt(row.find('.jumlah_barang_masuk_edit').val()) || 0;
                var harga_barang_masuk_edit = parseInt(row.find('.harga_barang_masuk_edit').val().replace(/\./g, '')
                    .replace(
                        'Rp ',
                        '')) || 0; // Menghapus titik dan 'Rp' dari harga_barang_masuk_edit
                var total_harga = jumlah_barang_masuk_edit * harga_barang_masuk_edit;
                row.find('.subtotal_edit').val(formatRupiah(total_harga));
            }

            // Format Rupiah saat mengetikkan angka
            $(document).on('keyup', '.harga_barang_masuk_edit', function() {
                $(this).val(formatRupiah($(this).val().replace(/\./g, '')));
            });

            // Format Rupiah
            function formatRupiah(angka) {
                var number_string = angka.toString().replace(/[^,\d]/g, ''),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/g);

                // tambahkan titik jika yang diinput sudah menjadi angka ribuan
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return 'Rp ' + rupiah;
            }

            // Submit form
            $('#editPemasukanForm').submit(function() {
                $(this).find('button[type="submit"]').prop('disabled', true);
            });

        });
    </script> --}}
    <script>
        $(document).ready(function() {
            var allMitra = [];
            var allProduk = [];

            // $('#kt_table_users').on('click', '.edit-row', function() {
            //     var id = $(this).data('id');
            //     var url = "{{ route('edit-pemasukan-owner', ':id') }}";
            //     url = url.replace(':id', id);
            //     $.get(url, function(response) {
            //         var data = response.pemasukan;
            //         allMitra = response.all_mitra;
            //         allProduk = response.all_produk;

            //         console.log("Loaded allProduk: ", allProduk);
            //         console.log("Loaded allMitra: ", allMitra);

            //         $('#id_pemasukan_edit').val(data.id_pemasukan);
            //         $('#tgl_pemasukan_edit').val(data.tgl_pemasukan);

            //         var mitraSelect = $('#id_mitra_edit');
            //         mitraSelect.empty(); // Clear the select box

            //         $.each(allMitra, function(index, item) {
            //             var selected = pemasukan.id_mitra == item.id_mitra ? 'selected' : '';
            //             mitraSelect.append('<option value="' + item.id_mitra + '" ' + selected + '>' + item.nama_mitra + '</option>');
            //         });

            //         // var mitraDropdown = $("#id_mitra_edit");
            //         // mitraDropdown.empty();
            //         // allMitra.forEach(function(mitra) {
            //         //     mitraDropdown.append('<option value="' + mitra.id_mitra + '"' + (mitra.id_mitra == data.id_mitra ? ' selected' : '') + '>' + mitra.nama_mitra + '</option>');
            //         // });

            //         var keteranganDropdown = $("#keterangan_edit");
            //         keteranganDropdown.empty();
            //         keteranganDropdown.append('<option value="Belum Lunas"' + (data.keterangan === 'Belum Lunas' ? ' selected' : '') + '>Belum Lunas</option>');
            //         keteranganDropdown.append('<option value="Lunas"' + (data.keterangan === 'Lunas' ? ' selected' : '') + '>Lunas</option>');

            //         $('#detailTableEdit tbody').empty();
            //         data.detail.forEach(function(detail, index) {
            //             var row = '<tr>' +
            //                 '<td><select name="detail[' + index + '][id_produk_edit]" class="form-control id_produk_edit" required>';
            //             allProduk.forEach(function(produk) {
            //                 row += '<option value="' + produk.id_produk + '"' + (produk.id_produk == detail.id_produk ? ' selected' : '') + '>' + produk.nama_produk + '</option>';
            //             });
            //             row += '</select></td>' +
            //                 '<td><input type="number" name="detail[' + index + '][jumlah_barang_masuk_edit]" class="form-control jumlah_barang_masuk_edit" value="' + detail.jumlah_barang_masuk + '" required></td>' +
            //                 '<td><input type="text" name="detail[' + index + '][harga_barang_masuk_edit]" class="form-control harga_barang_masuk_edit" value="' + detail.harga_barang_masuk + '" required readonly></td>' +
            //                 '<td><input type="text" name="detail[' + index + '][subtotal_edit]" class="form-control subtotal_edit" value="' + detail.subtotal + '" required readonly></td>' +
            //                 '<td><input type="text" name="detail[' + index + '][bayar_edit]" class="form-control bayar_edit" value="' + detail.bayar + '" required></td>' +
            //                 '<td><select name="detail[' + index + '][saldo_edit]" class="form-control saldo_edit" required>' +
            //                 '<option value="Debet"' + (detail.saldo === 'Debet' ? ' selected' : '') + '>Debet</option>' +
            //                 '<option value="Kredit"' + (detail.saldo === 'Kredit' ? ' selected' : '') + '>Kredit</option>' +
            //                 '</select></td>' +
            //                 '<td class="add-remove text-end">' +
            //                 '<a href="javascript:void(0);" class="add-btn-edit me-2"><i class="fas fa-plus-circle text-success"></i></a>' +
            //                 '<a href="javascript:void(0);" class="remove-btn-edit"><i class="fas fa-trash text-danger"></i></a>' +
            //                 '</td>' + '</tr>';
            //             $('#detailTableEdit').append(row);
            //         });

            //         $("#kt_modal_edit_data").modal("show");
            //     });
            // });

            $('#kt_table_users').on('click', '.edit-row', function() {
                var id = $(this).data('id');
                var url = "{{ route('edit-pemasukan-owner', ':id') }}";
                url = url.replace(':id', id);
                $.get(url, function(response) {
                    var data = response.pemasukan;
                    allMitra = response.all_mitra;
                    allProduk = response.all_produk;

                    console.log("Loaded allProduk: ", allProduk);
                    console.log("Loaded allMitra: ", allMitra);

                    $('#id_pemasukan_edit').val(data.id_pemasukan);
                    $('#tgl_pemasukan_edit').val(data.tgl_pemasukan);

                    var mitraSelect = $('#id_mitra_edit');
                    mitraSelect.empty(); // Clear the select box

                    $.each(allMitra, function(index, item) {
                        var selected = data.id_mitra == item.id_mitra ? 'selected' : '';
                        mitraSelect.append('<option value="' + item.id_mitra + '" ' +
                            selected + '>' + item.nama_mitra + '</option>');
                    });

                    // var keteranganDropdown = $("#keterangan_edit");
                    // keteranganDropdown.val(data.keterangan);
                    var keteranganDropdown = $("#keterangan_edit");
                    keteranganDropdown.empty();
                    keteranganDropdown.append('<option value="Belum Lunas"' + (data.keterangan ===
                        'Belum Lunas' ? ' selected' : '') + '>Belum Lunas</option>');
                    keteranganDropdown.append('<option value="Lunas"' + (data.keterangan ===
                        'Lunas' ? ' selected' : '') + '>Lunas</option>');

                    $('#detailTableEdit tbody').empty(); // Clear existing rows

                    data.detail.forEach(function(detail, index) {
                        var row = '<tr>' +
                            '<td><select name="detail[' + index +
                            '][id_produk_edit]" class="form-control id_produk_edit" required>';
                        allProduk.forEach(function(produk) {
                            row += '<option value="' + produk.id_produk + '"' + (
                                    produk.id_produk == detail.id_produk ?
                                    ' selected' : '') + '>' + produk.nama_produk +
                                '</option>';
                        });
                        row += '</select></td>' +
                            '<td><input type="number" name="detail[' + index +
                            '][jumlah_barang_masuk_edit]" class="form-control jumlah_barang_masuk_edit" value="' +
                            detail.jumlah_barang_masuk + '" required></td>' +
                            '<td><input type="text" name="detail[' + index +
                            '][harga_barang_masuk_edit]" class="form-control harga_barang_masuk_edit" value="' +
                            detail.harga_barang_masuk + '" required readonly></td>' +
                            '<td><input type="text" name="detail[' + index +
                            '][subtotal_edit]" class="form-control subtotal_edit" value="' +
                            detail.subtotal + '" required readonly></td>' +
                            '<td><input type="text" name="detail[' + index +
                            '][bayar_edit]" class="form-control bayar_edit" value="' +
                            detail.bayar + '" required></td>' +
                            '<td><select name="detail[' + index +
                            '][saldo_edit]" class="form-control saldo_edit" required>' +
                            '<option value="Debet"' + (detail.saldo === 'Debet' ?
                                ' selected' : '') + '>Debet</option>' +
                            '<option value="Kredit"' + (detail.saldo === 'Kredit' ?
                                ' selected' : '') + '>Kredit</option>' +
                            '</select></td>' +
                            '<td class="add-remove text-end">' +
                            '<a href="javascript:void(0);" class="add-btn-edit me-2"><i class="fas fa-plus-circle text-success"></i></a>' +
                            '<a href="javascript:void(0);" class="remove-btn-edit"><i class="fas fa-trash text-danger"></i></a>' +
                            '</td>' + '</tr>';
                        $('#detailTableEdit').append(row);
                    });


                    $("#kt_modal_edit_data").modal("show");
                });
            });


            // Event listener untuk update harga barang berdasarkan produk yang dipilih
            $(document).on('change', '.id_produk_edit', function() {
                var selectedProductId = $(this).val();
                var hargaBarangInput = $(this).closest('tr').find('.harga_barang_masuk_edit');

                console.log("Selected Product ID: ", selectedProductId);

                var selectedProduct = allProduk.find(function(produk) {
                    return produk.id_produk == selectedProductId;
                });

                console.log("Selected Product: ", selectedProduct);
                console.log("Selected Product Structure: ", JSON.stringify(selectedProduct, null, 2));

                if (selectedProduct && selectedProduct.harga_produk !== undefined) {
                    hargaBarangInput.val(selectedProduct.harga_produk);
                    console.log("Updated harga barang: ", selectedProduct.harga_produk);
                } else {
                    hargaBarangInput.val('');
                    console.log("No product found or harga_produk is undefined for ID: ",
                        selectedProductId);
                }
            });

            // Submit form update data
            // $('#kt_modal_add_pemasukan_submit_edit').click(function(e) {
            //     e.preventDefault();
            //     var tgl_pemasukan = $('#tgl_pemasukan_edit').val();
            //     var id_mitra = $('#id_mitra_edit').val();
            //     var keterangan = $('#keterangan_edit').val();
            //     var detail = [];
            //     $('#detailTableEdit tbody tr').each(function() {
            //         detail.push({
            //             id_produk: $(this).find('.id_produk_edit').val(),
            //             jumlah_barang_masuk: $(this).find('.jumlah_barang_masuk_edit')
            //             .val(),
            //             harga_barang_masuk: $(this).find('.harga_barang_masuk_edit').val(),
            //             subtotal: $(this).find('.subtotal_edit').val().replace(/\./g, '')
            //                 .replace('Rp ', '') || 0,
            //             // subtotal: $(this).find('.subtotal_edit').val(),
            //             bayar: $(this).find('.bayar_edit').val(),
            //             saldo: $(this).find('.saldo_edit').val(),
            //         });
            //     });
            //     $.ajax({
            //         url: "{{ route('update-pemasukan-owner') }}",
            //         type: "POST",
            //         data: {
            //             _token: "{{ csrf_token() }}",
            //             tgl_pemasukan: tgl_pemasukan,
            //             id_mitra: id_mitra,
            //             keterangan: keterangan,
            //             detail: detail
            //         },
            //         success: function(response) {
            //             console.log(response);
            //             $('#kt_modal_edit_data').modal('hide');
            //             location.reload();
            //         }
            //     });
            // });

            // Submit form update data
            $('#kt_modal_add_pemasukan_submit_edit').click(function(e) {
                e.preventDefault();
                var tgl_pemasukan = $('#tgl_pemasukan_edit').val();
                var id_mitra = $('#id_mitra_edit').val();
                var keterangan = $('#keterangan_edit').val();
                var detail = [];
                $('#detailTableEdit tbody tr').each(function() {
                    detail.push({
                        id_produk: $(this).find('.id_produk_edit').val(),
                        jumlah_barang_masuk: $(this).find('.jumlah_barang_masuk_edit')
                            .val(),
                        harga_barang_masuk: $(this).find('.harga_barang_masuk_edit').val(),
                        subtotal: $(this).find('.subtotal_edit').val().replace(/\./g, '')
                            .replace('Rp ', '') || 0,
                        bayar: $(this).find('.bayar_edit').val(),
                        saldo: $(this).find('.saldo_edit').val(),
                    });
                });
                $.ajax({
                    url: "{{ route('update-pemasukan-owner') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id_pemasukan_edit: $('#id_pemasukan_edit').val(),
                        tgl_pemasukan_edit: tgl_pemasukan,
                        id_mitra_edit: id_mitra,
                        keterangan_edit: keterangan,
                        detail: detail
                    },
                    success: function(response) {
                        console.log(response);
                        $('#kt_modal_edit_data').modal('hide');
                        location.reload();
                    }
                });
            });


            // Hapus baris pada tabel Detail Barang Masuk
            $("#detailTableEdit").on('click', '.remove-btn-edit', function() {
                $(this).closest('tr').remove();
                calculateGrandTotal();
            });

            // Klik tombol tambah baris
            $(document).on('click', '.add-btn-edit', function() {
                var rowCount = $('#detailTableEdit tbody tr').length;
                var row = '<tr>' +
                    '<td><select name="detail[' + rowCount +
                    '][id_produk_edit]" class="form-control id_produk_edit" required>';
                allProduk.forEach(function(produk) {
                    row += '<option value="' + produk.id_produk + '">' + produk.nama_produk +
                        '</option>';
                });
                row += '</select></td>' +
                    '<td><input type="number" name="detail[' + rowCount +
                    '][jumlah_barang_masuk_edit]" class="form-control jumlah_barang_masuk_edit" required></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][harga_barang_masuk_edit]" class="form-control harga_barang_masuk_edit" required readonly></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][subtotal_edit]" class="form-control subtotal_edit" required readonly></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][bayar_edit]" class="form-control bayar_edit" required></td>' +
                    '<td><select name="detail[' + rowCount +
                    '][saldo_edit]" class="form-control saldo_edit" required>' +
                    '<option value="Debet">Debet</option>' +
                    '<option value="Kredit">Kredit</option>' +
                    '</select></td>' +
                    '<td class="add-remove text-end">' +
                    '<a href="javascript:void(0);" class="add-btn-edit me-2"><i class="fas fa-plus-circle text-success"></i></a>' +
                    '<a href="javascript:void(0);" class="remove-btn-edit"><i class="fas fa-trash text-danger"></i></a>' +
                    '</td>' + '</tr>';
                $('#detailTableEdit').append(row);
            });

            // Hapus baris pada tabel
            $(document).on('click', '.remove-btn-edit', function() {
                $(this).closest('tr').remove();
            });

            // Hitung total_harga keseluruhan
            function calculateGrandTotal() {
                var grandTotal = 0;
                $('.subtotal_edit').each(function() {
                    var subtotal_edit = parseFloat($(this).val().replace(/\./g, '').replace('Rp ', '')) ||
                        0;
                    grandTotal += subtotal_edit;
                });
                $('#total_harga_edit').val(formatRupiah(grandTotal));
            }

            // Panggil fungsi calculateGrandTotal saat ada perubahan pada subtotal_edit
            $(document).on('change', '.subtotal_edit', function() {
                calculateGrandTotal();
            });

            // Panggil fungsi calculateGrandTotal saat menambah atau menghapus baris
            $(document).on('click', '.remove-btn-edit, .add-btn-edit', function() {
                calculateGrandTotal();
            });


            // Hitung total_harga saat jumlah_barang_masuk atau harga_barang_masuk_edit berubah
            $(document).on('change', '.jumlah_barang_masuk_edit, .harga_barang_masuk_edit', function() {
                calculateTotal($(this).closest('tr'));
            });

            // Fungsi untuk menghitung total_harga
            function calculateTotal(row) {
                var jumlah_barang_masuk_edit = parseInt(row.find('.jumlah_barang_masuk_edit').val()) || 0;
                var harga_barang_masuk_edit = parseInt(row.find('.harga_barang_masuk_edit').val().replace(/\./g, '')
                    .replace(
                        'Rp ',
                        '')) || 0; // Menghapus titik dan 'Rp' dari harga_barang_masuk_edit
                var total_harga = jumlah_barang_masuk_edit * harga_barang_masuk_edit;
                row.find('.subtotal_edit').val(formatRupiah(total_harga));
            }

            // Format Rupiah saat mengetikkan angka
            $(document).on('keyup', '.harga_barang_masuk_edit', function() {
                $(this).val(formatRupiah($(this).val().replace(/\./g, '')));
            });

            // Format Rupiah
            function formatRupiah(angka) {
                var number_string = angka.toString().replace(/[^,\d]/g, ''),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/g);

                // tambahkan titik jika yang diinput sudah menjadi angka ribuan
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return 'Rp ' + rupiah;
            }

            // Submit form
            $('#editPemasukanForm').submit(function() {
                $(this).find('button[type="submit"]').prop('disabled', true);
            });
        });
    </script>
    {{-- //Modal Untuk Edit Data Pemasukan --}}
@endsection
