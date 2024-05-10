@extends('layouts.index')

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

                        <button type="button" class="btn btn-light-primary font-weight-bolder" id="daterange"
                            class="float-end" style="text-align:center">
                            <i class="ki-outline ki-calendar fs-1"></i></i>&nbsp;
                            <span></span>
                        </button>

                        <!--begin::Export button -->
                        <div class="btn-group">
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
                        </div>
                        <!--end::Export button-->

                        <!--begin::Add Data-->
                        <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_pemasukan"><i class="ki-outline ki-plus fs-2"></i>Tambah
                            Data</a>
                        <!--end::Add Data-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                        <div class="fw-bold me-5">
                            <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                        </div>
                        <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete
                            Selected</button>
                    </div>
                    <!--end::Group actions-->

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
                                        action="{{ route('store-pemasukan-admin') }}" method="POST" id="pemasukanForm">
                                        @csrf
                                        <!--begin::Heading-->
                                        <div class="mb-13 text-center">
                                            <!--begin::Title-->
                                            <h1 class="mb-3">FORM PEMASUKAN</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-muted fw-semibold fs-5">Detail Pemasukan
                                                <a href="" class="fw-bold link-primary">CV. Smart Thec</a>.
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
                                                    <!--begin::Datepicker-->
                                                    <input class="form-control form-control-solid" id="nama_perusahaan"
                                                        name="nama_perusahaan" placeholder="Nama perusahaan" required />
                                                    <!--end::Datepicker-->
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
                                                        <th>Jenis Barang</th>
                                                        <th>Nama Barang</th>
                                                        <th>QTY</th>
                                                        <th>Harga Satuan</th>
                                                        <th>Sub Total</th>
                                                        <th>Pembayaran</th>
                                                        <th>Saldo</th>
                                                        <th>Keterangan</th>
                                                        <th class="text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="7" class="text-end">Total:</th>
                                                        <th><input type="text" id="total_harga" name="total_harga"
                                                                class="form-control" required readonly></th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="detail[0][jenis_pemasukan]"
                                                                id="detail[0][jenis_pemasukan]"
                                                                class="form-control jenis_pemasukan" required>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="detail[0][nama_barang_masuk]"
                                                                id="detail[0][nama_barang_masuk]"
                                                                class="form-control nama_barang_masuk" required>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="detail[0][jumlah_barang_masuk]"
                                                                id="detail[0][jumlah_barang_masuk]"
                                                                class="form-control jumlah_barang_masuk" required>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="detail[0][harga_barang_masuk]"
                                                                id="detail[0][harga_barang_masuk]"
                                                                class="form-control harga_barang_masuk" required>
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
                                                                <option value="debet">Debet</option>
                                                                <option value="kredit">Kredit</option>
                                                            </select>
                                                        </td>
                                                        <td><input type="text" name="detail[0][keterangan]"
                                                                id="detail[0][keterangan]" class="form-control keterangan"
                                                                required>
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
                                                {{-- <span class="indicator-progress">Please wait...
                                                    <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span> --}}
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
                                        action="{{ route('update-pemasukan-admin') }}" method="POST"
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
                                                <a href="" class="fw-bold link-primary">CV. Smart Thec</a>.
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
                                                        class="form-control form-control-solid ps-12"
                                                        placeholder="Select a date" required />
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
                                                    <!--begin::Datepicker-->
                                                    <input class="form-control form-control-solid"
                                                        id="nama_perusahaan_edit" name="nama_perusahaan_edit"
                                                        placeholder="Nama perusahaan" required />
                                                    <!--end::Datepicker-->
                                                </div>
                                                <!--end::Input-->
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
                                                        <th>Jenis Barang</th>
                                                        <th>Nama Barang</th>
                                                        <th>QTY</th>
                                                        <th>Harga Satuan</th>
                                                        <th>Sub Total</th>
                                                        <th>Pembayaran</th>
                                                        <th>Saldo</th>
                                                        <th>Keterangan</th>
                                                        <th class="text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="7" class="text-end">Total:</th>
                                                        <th><input type="text" id="total_harga_edit"
                                                                name="total_harga_edit"
                                                                class="form-control total_harga_edit" readonly></th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="detail[0][jenis_pemasukan_edit]"
                                                                id="detail[0][jenis_pemasukan_edit]"
                                                                class="form-control jenis_pemasukan_edit" required>
                                                        </td>
                                                        <td><input type="text" name="detail[0][nama_barang_masuk_edit]"
                                                                id="detail[0][nama_barang_masuk_edit]"
                                                                class="form-control nama_barang_masuk_edit" required></td>
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
                                                            <select name="detail[0][saldo]" class="form-control saldo"
                                                                id="saldo">
                                                                {{-- <option value="debet"></option> --}}
                                                                {{-- <option value="kredit">Kredit</option> --}}
                                                            </select>
                                                        </td>
                                                        <td><input type="text" name="detail[0][keterangan_edit]"
                                                                id="detail[0][keterangan_edit]"
                                                                class="form-control keterangan_edit" required>
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
                <table class="table table-bordered table-hover align-middle table-row-dashed fs-6 gy-5"
                    id="kt_table_users" name="kt_table_users">
                    <thead>
                        <tr class="table-light text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Perusahaan</th>
                            <th>Total</th>
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
        // Memuat DataTable
        $(document).ready(function() {
            var start_date = moment().subtract(1, 'M');

            var end_date = moment();

            $('#daterange span').html(start_date.format('MMMM D, YYYY') + ' - ' + end_date.format('MMMM D, YYYY'));

            $('#daterange').daterangepicker({
                startDate: start_date,
                endDate: end_date
            }, function(start_date, end_date) {
                $('#daterange span').html(start_date.format('MMMM D, YYYY') + ' - ' + end_date.format(
                    'MMMM D, YYYY'));

                table.draw();
            });

            $('#kt_table_users').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('pemasukan-admin') }}",
                    data: function(data) {
                        data.from_date = $('#daterange').data('daterangepicker').startDate.format(
                            'YYYY-MM-DD');
                        data.to_date = $('#daterange').data('daterangepicker').endDate.format(
                            'YYYY-MM-DD');
                    }
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
                        data: 'nama_perusahaan',
                        name: 'nama_perusahaan'
                    },
                    {
                        data: 'total_harga',
                        name: 'total_harga'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });
        });
    </script>

    <script>
        //Modal Untuk Tambah Data Pemasukan
        $(document).ready(function() {
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

            $(document).on('click', '.add-btn', function() {
                var rowCount = $('#detailTable tbody tr').length;
                var row = '<tr>' + '<td><input type="text" name="detail[' + rowCount +
                    '][jenis_pemasukan]" class="form-control jenis_pemasukan" required></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][nama_barang_masuk]" class="form-control nama_barang_masuk" required></td>' +
                    '<td><input type="number" name="detail[' + rowCount +
                    '][jumlah_barang_masuk]" class="form-control jumlah_barang_masuk" required></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][harga_barang_masuk]" class="form-control harga_barang_masuk" required></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][subtotal]" class="form-control subtotal" required readonly></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][bayar]" class="form-control bayar" required></td>' +
                    '<td><select name="detail[' + rowCount +
                    '][saldo]" class="form-control saldo" required><option value="debet">Debet</option><option value="kredit">Kredit</option></select></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][keterangan]" class="form-control keterangan" required></td>' +
                    '<td class="add-remove text-end">' +
                    '<a href="javascript:void(0);" class="add-btn me-2">' +
                    '<i class="fas fa-plus-circle text-success"></i>' +
                    '</a>' +
                    '<a href="javascript:void(0);" class="remove-btn">' +
                    '<i class="fas fa-trash text-danger"></i>' +
                    '</a>' +
                    '</td>';
                $('#detailTable tbody').append(row);
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

    <script>
        //Modal Untuk Edit Data Pemasukan
        $(document).ready(function() {
            //Modal Untuk Edit Data Pemasukan
            // Menampilkan data dalam modal saat tombol "Edit" pada baris tabel diklik
            $('#kt_table_users').on('click', '.edit-row', function() {
                var id = $(this).data('id');
                var url = "{{ route('edit-pemasukan-admin', ':id') }}";
                url = url.replace(':id', id);
                $.get(url, function(data) {
                    $('#id_pemasukan_edit').val(data.id_pemasukan);
                    $('#tgl_pemasukan_edit').val(data.tgl_pemasukan);
                    $('#nama_perusahaan_edit').val(data.nama_perusahaan);
                    $('#total_harga_edit').val(data.total_harga);
                    $('#detailTableEdit tbody').empty();
                    data.detail.forEach(function(detail, index) {
                        var row = '<tr>' + '<td><input type="text" name="detail[' + index +
                            '][jenis_pemasukan_edit]" class="form-control jenis_pemasukan_edit" value="' +
                            detail.jenis_pemasukan + '" required></td>' +
                            '<td><input type="text" name="detail[' + index +
                            '][nama_barang_masuk_edit]" class="form-control nama_barang_masuk_edit" value="' +
                            detail.nama_barang_masuk + '" required></td>' +
                            '<td><input type="number" name="detail[' + index +
                            '][jumlah_barang_masuk_edit]" class="form-control jumlah_barang_masuk_edit" value="' +
                            detail.jumlah_barang_masuk + '" required></td>' +
                            '<td><input type="text" name="detail[' + index +
                            '][harga_barang_masuk_edit]" class="form-control harga_barang_masuk_edit" value="' +
                            detail.harga_barang_masuk + '" required></td>' +
                            '<td><input type="text" name="detail[' + index +
                            '][subtotal_edit]" class="form-control subtotal_edit" value="' +
                            detail.subtotal +
                            '" required readonly></td>' +
                            '<td><input type="text" name="detail[' + index +
                            '][bayar_edit]" class="form-control bayar_edit" value="' +
                            detail.bayar +
                            '" required></td>' +
                            '" required readonly></td>' +
                            '<td><select name="detail[' + index +
                            '][saldo_edit]" class="form-control saldo_edit" required ><option value="debet">Debet</option><option value="kredit">Kredit</option></select></td>' +
                            '<td><input type="text" name="detail[' + index +
                            '][keterangan_edit]" class="form-control keterangan_edit" value="' +
                            detail.keterangan +
                            '" required></td>' +
                            '<td class="add-remove text-end">' +
                            '<a href="javascript:void(0);" class="add-btn-edit me-2"><i class="fas fa-plus-circle text-success"></i></a>' +
                            '<a href="javascript:void(0);" class="remove-btn-edit"><i class="bi bi-trash text-danger"></i></a>' +
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
                var nama_perusahaan = $('#nama_perusahaan_edit').val();
                var detail = [];
                $('#detailTableEdit tbody tr').each(function() {
                    detail.push({
                        jenis_pemasukan: $(this).find('.jenis_pemasukan_edit').val(),
                        nama_barang_masuk: $(this).find('.nama_barang_masuk_edit').val(),
                        jumlah_barang_masuk: $(this).find('.jumlah_barang_masuk_edit')
                            .val(),
                        harga_barang_masuk: $(this).find('.harga_barang_masuk_edit').val(),
                        subtotal: $(this).find('.subtotal_edit').val(),
                        bayar: $(this).find('.bayar_edit').val(),
                        total_harga: $(this).find('.total_harga_edit').val(),
                        saldo: $(this).find('.saldo_edit').val(),
                        keterangan: $(this).find('.keterangan_edit').val()
                    });
                });
                $.ajax({
                    url: "{{ route('update-pemasukan-admin') }}",
                    type: "POST",
                    data: {
                        // id_pemasukan: id_pemasukan,
                        tgl_pemasukan: tgl_pemasukan_edit,
                        nama_perusahaan: nama_perusahaan,
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
                    '<td><input type="text" name="detail[' + rowCount +
                    '][jenis_pemasukan_edit]" class="form-control jenis_pemasukan_edit" required></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][nama_barang_masuk_edit]" class="form-control nama_barang_masuk_edit" required></td>' +
                    '<td><input type="number" name="detail[' + rowCount +
                    '][jumlah_barang_masuk_edit]" class="form-control jumlah_barang_masuk_edit" required></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][harga_barang_masuk_edit]" class="form-control harga_barang_masuk_edit" required></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][subtotal_edit]" class="form-control subtotal_edit" required readonly></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][bayar_edit]" class="form-control bayar_edit" required></td>' +
                    '<td><select name="detail[' + rowCount +
                    '][saldo_edit]" class="form-control saldo_edit" required><option value="debet">Debet</option><option value="kredit">Kredit</option></select></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][keterangan_edit]" class="form-control keterangan_edit" required></td>' +
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
    </script>
@endsection
