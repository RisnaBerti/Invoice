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
                    <form action="{{ route('pengeluaran-admin') }}" method="GET">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                            <input type="text" class="form-control form-control-solid w-250px ps-13" name="q"
                                id="q" placeholder="Mencari data" value="" />
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </form>

                    {{-- <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                        <input type="text" data-kt-user-table-filter="search"
                            class="form-control form-control-solid w-250px ps-13" name="q" id="q"
                            placeholder="Mencari data" value="" />
                    </div> --}}
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end gap-2 gap-lg-3" data-kt-user-table-toolbar="base">
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
                            data-bs-target="#kt_modal_new_target"><i class="ki-outline ki-plus fs-2"></i>Tambah Data</a>
                        <!--end::Add Data-->
                        <!--begin::Add user-->
                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_user">
                            <i class="ki-outline ki-plus fs-2"></i>Tambah Data</button> --}}
                        <!--end::Add user-->
                    </div>
                    <!--end::Toolbar-->
                   
                   


                    <!--begin::Modal - Tambah Data -->
                    <div class="modal fade" id="kt_modal_new_target" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-lg modal-dialog-centered">
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
                                    <form id="kt_modal_new_target_form" class="form"
                                        action="{{ route('store-pengeluaran-admin') }}" method="POST" id="pengeluaranForm">
                                        @csrf
                                        <!--begin::Heading-->
                                        <div class="mb-13 text-center">
                                            <!--begin::Title-->
                                            <h1 class="mb-3">FORM PENGELUARAN</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-muted fw-semibold fs-5">Detail Pengeluaran
                                                <a href="" class="fw-bold link-primary">CV. Smart Thec</a>.
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <label class="required fs-6 fw-semibold mb-2">Tanggal Pengeluaran</label>
                                            <!--begin::Input-->
                                            <div class="position-relative d-flex align-items-center">
                                                <!--begin::Icon-->
                                                <i class="ki-outline ki-calendar-8 fs-2 position-absolute mx-4"></i>
                                                <!--end::Icon-->
                                                <!--begin::Datepicker-->
                                                <input type="date" name="tgl_pengeluaran" id="tgl_pengeluaran"
                                                    value="{{ now()->format('Y-m-d') }}"
                                                    class="form-control form-control-solid ps-12"
                                                    placeholder="Select a date" name="due_date" />
                                                <!--end::Datepicker-->
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                        <div class="form-group">
                                            <label>Detail Pengeluaran:</label>
                                            <table id="detailTable" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Barang</th>
                                                        <th>Jumlah Barang</th>
                                                        <th>Harga Satuan</th>
                                                        <th>Sub Total</th>
                                                        <th class="text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="3" class="text-end">Total:</th>
                                                        <th><input type="text" id="total" name="total"
                                                                class="form-control" readonly></th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" name="detail[0][nama_barang_keluar]"
                                                                class="form-control" required></td>
                                                        <td><input type="number" name="detail[0][jumlah_barang_keluar]"
                                                                class="form-control jumlah_barang_keluar" required></td>
                                                        <td><input type="text" name="detail[0][harga_satuan]"
                                                                class="form-control harga_satuan" required>
                                                        </td>
                                                        {{-- <td>
                                                            <select name="detail[0][tipe_saldo]" class="form-control tipe-saldo">
                                                                <option value="debet">Debet</option>
                                                                <option value="kredit">Kredit</option>
                                                            </select>
                                                        </td> --}}

                                                        {{-- <td><input type="text" name="detail[0][saldo]" class="form-control saldo" required></td> --}}
                                                        <td><input type="text" name="detail[0][subtotal]"
                                                                class="form-control subtotal" required readonly></td>
                                                        <td class="add-remove text-end">
                                                            <a href="javascript:void(0);" class="add-btn me-2">
                                                                <i class="fas fa-plus-circle text-success"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" class="remove-btn">
                                                                <i class="fas fa-trash text-danger"></i>
                                                            </a>
                                                        </td>


                                            </table>
                                        </div>

                                        <!--begin::Actions-->
                                        <div class="text-center">
                                            <button type="reset" id="kt_modal_new_target_cancel"
                                                class="btn btn-light me-3">Cancel</button>
                                            <button type="submit" id="kt_modal_new_target_submit"
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
                        <div class="modal-dialog modal-dialog-centered mw-650px">
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
                                        action="{{ route('update-pengeluaran-admin') }}" method="POST"
                                        id="editPengeluaranForm">
                                        @csrf
                                        {{-- @method('PUT') --}}
                                        <!--begin::Heading-->
                                        <div class="mb-13 text-center">
                                            <!--begin::Title-->
                                            <h1 class="mb-3">FORM PENGELUARAN</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-muted fw-semibold fs-5">Detail Pengeluaran
                                                <a href="" class="fw-bold link-primary">CV. Smart Thec</a>.
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <input type="hiddes" name="id_pengeluaran_edit" id="id_pengeluaran_edit">
                                        {{-- <input type="hidden" name="id_user" id="id_user"  value="{{ Auth::user()->id }}"> --}}
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <label class="required fs-6 fw-semibold mb-2">Tanggal Pengeluaran</label>
                                            <!--begin::Input-->
                                            <div class="position-relative d-flex align-items-center">
                                                <!--begin::Icon-->
                                                <i class="ki-outline ki-calendar-8 fs-2 position-absolute mx-4"></i>
                                                <!--end::Icon-->
                                                <!--begin::Datepicker-->
                                                <input type="date" name="tgl_pengeluaran_edit"
                                                    id="tgl_pengeluaran_edit"
                                                    class="form-control form-control-solid ps-12"
                                                    placeholder="Select a date" required />
                                                <!--end::Datepicker-->
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Detail Pemasukan-->
                                        <div class="form-group">
                                            <label>Detail Pengeluaran:</label>
                                            <table id="detailTableEdit" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Barang</th>
                                                        <th>Jumlah Barang</th>
                                                        <th>Harga Satuan</th>
                                                        <th>Sub Total</th>
                                                        <th class="text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="3" class="text-end">Total:</th>
                                                        <th><input type="text" id="total_edit" name="total_edit"
                                                                class="form-control" readonly></th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text"
                                                                name="detail[0][nama_barang_keluar_edit]"
                                                                id="detail[0][nama_barang_keluar_edit]"
                                                                class="form-control nama_barang_keluar_edit" required></td>
                                                        <td><input type="number"
                                                                name="detail[0][jumlah_barang_keluar_edit]"
                                                                id="detail[0][jumlah_barang_keluar_edit]"
                                                                class="form-control jumlah_barang_keluar_edit" required>
                                                        </td>
                                                        <td><input type="text" name="detail[0][harga_satuan_edit]"
                                                                id="detail[0][harga_satuan_edit]"
                                                                class="form-control harga_satuan_edit" required>
                                                        </td>
                                                        {{-- <td>
                                                         <select name="detail[0][tipe_saldo]" class="form-control tipe-saldo">
                                                             <option value="debet">Debet</option>
                                                             <option value="kredit">Kredit</option>
                                                         </select>
                                                     </td> --}}



                                                        {{-- <td><input type="text" name="detail[0][saldo]" class="form-control saldo" required></td> --}}
                                                        <td><input type="text" name="detail[0][subtotal_edit]"
                                                                id="detail[0][subtotal_edit]"
                                                                class="form-control subtotal_edit" required readonly></td>
                                                        <td class="add-remove text-end">
                                                            <a href="javascript:void(0);" class="add-btn-edit me-2">
                                                                <i class="fas fa-plus-circle text-success"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" class="remove-btn-edit">
                                                                <i class="bi bi-trash text-danger"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Detail Pemasukan-->
                                        <!--begin::Actions-->
                                        <div class="text-center">
                                            <button type="reset" id="kt_modal_new_target_cancel"
                                                class="btn btn-light me-3">Cancel</button>
                                            <button type="submit" id="kt_modal_new_target_submit_edit"
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
            <div class="card-body py-4">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>QTY</th>
                            <th>Harga Satuan</th>
                            <th>Subtotal</th>
                            <th>Total Harga</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        @foreach ($pengeluaran as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ date('d-M-Y', strtotime($item->tgl_pengeluaran)) }}</td>

                                <td>
                                    <ul>
                                        @foreach ($item->detail as $detail)
                                            <li>{{ $detail->nama_barang_keluar }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        @foreach ($item->detail as $detail)
                                            <li>{{ $detail->jumlah_barang_keluar }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        @foreach ($item->detail as $detail)
                                            <li>Rp. {{ number_format($detail->harga_satuan, 0, ',', '.') }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        @foreach ($item->detail as $detail)
                                            <li>Rp. {{ number_format($detail->subtotal, 0, ',', '.') }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    Rp. {{ number_format($item->total_harga, 0, ',', '.') }}
                                </td>
                                <td>
                                    <a href="#" class="menu-link px-1 edit-row" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_edit_data" data-id="{{ $item->id_pengeluaran }}"><i
                                            class="fas fa-edit text-warning"></i></a>
                                    <form
                                        action="{{ route('delete-pengeluaran-admin', ['id' => $item->id_pengeluaran]) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="menu-link px-1"
                                            data-kt-users-table-filter="delete_row"
                                            style="border:none; background:none; padding:0; cursor:pointer;"><i
                                                class="fas fa-trash-alt text-danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

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
        //Modal Untuk Tambah Data Pengeluaran
        $(document).ready(function() {
            // Hitung total keseluruhan
            function calculateGrandTotal() {
                var grandTotal = 0;
                $('.subtotal').each(function() {
                    var subtotal = parseFloat($(this).val().replace(/\./g, '').replace('Rp ', '')) || 0;
                    grandTotal += subtotal;
                });
                $('#total').val(formatRupiah(grandTotal));
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
                var row = '<tr>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][nama_barang_keluar]" class="form-control" required></td>' +
                    '<td><input type="number" name="detail[' + rowCount +
                    '][jumlah_barang_keluar]" class="form-control jumlah_barang_keluar" required></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][harga_satuan]" class="form-control harga_satuan" required></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][subtotal]" class="form-control subtotal" required readonly></td>' +
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



            // Hapus baris pada tabel
            $(document).on('click', '.remove-btn', function() {
                $(this).closest('tr').remove();
            });


            // Hitung total saat jumlah_barang_keluar atau harga_satuan berubah
            $(document).on('change', '.jumlah_barang_keluar, .harga_satuan', function() {
                calculateTotal($(this).closest('tr'));
            });

            // Fungsi untuk menghitung total
            function calculateTotal(row) {
                var jumlah_barang_keluar = parseInt(row.find('.jumlah_barang_keluar').val()) || 0;
                var harga_satuan = parseInt(row.find('.harga_satuan').val().replace(/\./g, '').replace('Rp ',
                    '')) || 0; // Menghapus titik dan 'Rp' dari harga_satuan
                var total = jumlah_barang_keluar * harga_satuan;
                row.find('.subtotal').val(formatRupiah(total));
            }

            // Format Rupiah saat mengetikkan angka
            $(document).on('keyup', '.harga_satuan', function() {
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
            $('#pengeluaranForm').submit(function() {
                $(this).find('button[type="submit"]').prop('disabled', true);
            });

        });
    </script>

    <script>
        //Modal Untuk Edit Data Pengeluaran
        $(document).ready(function() {
            //Modal Untuk Edit Data Pengeluaran
            // Menampilkan data dalam modal saat tombol "Edit" pada baris tabel diklik
            $('#kt_table_users').on('click', '.edit-row', function() {
                var id = $(this).data('id');
                var url = "{{ route('edit-pengeluaran-admin', ':id') }}";
                url = url.replace(':id', id);
                $.get(url, function(data) {
                    $('#id_pengeluaran_edit').val(data.id_pengeluaran);
                    $('#tgl_pengeluaran_edit').val(data.tgl_pengeluaran);
                    $('#total_edit').val(data.total);
                    $('#detailTableEdit tbody').empty();
                    data.detail.forEach(function(detail, index) {
                        var row = '<tr>' +
                            '<td><input type="text" name="detail[' + index +
                            '][nama_barang_keluar_edit]" class="form-control" value="' +
                            detail.nama_barang_keluar +
                            '" required></td>' +
                            '<td><input type="number" name="detail[' + index +
                            '][jumlah_barang_keluar_edit]" class="form-control jumlah_barang_keluar_edit" value="' +
                            detail.jumlah_barang_keluar + '" required></td>' +
                            '<td><input type="text" name="detail[' + index +
                            '][harga_satuan_edit]" class="form-control harga_satuan_edit" value="' +
                            detail.harga_satuan +
                            '" required></td>' +
                            '<td><input type="text" name="detail[' + index +
                            '][subtotal_edit]" class="form-control subtotal_edit" value="' +
                            detail.subtotal +
                            '" required readonly></td>' +
                            '<td class="add-remove text-end">' +
                            '<a href="javascript:void(0);" class="add-btn-edit me-2">' +
                            '<i class="fas fa-plus-circle text-success"></i>' +
                            '</a>' +
                            '<a href="javascript:void(0);" class="remove-btn-edit">' +
                            '<i class="fas fa-trash text-danger"></i>' +
                            '</a>' +
                            '</td>';
                        $('#detailTableEdit').append(row);
                    });

                    //vardump data get
                    console.log(data);
                    die();
                    $("#kt_modal_edit_data").modal("show");
                });
            });

            //save data edit post controller update
            $('#kt_modal_new_target_submit_edit').click(function() {
                // var id_pengeluaran = $('#id_pengeluaran').val();
                var tgl_pengeluaran = $('#tgl_pengeluaran_edit').val();
                // var total = $('#total_edit').val();
                var detail = [];
                $('#detailTableEdit tbody tr').each(function() {
                    var nama_barang_keluar_edit = $(this).find('.nama_barang_keluar_edit').val();
                    var jumlah_barang_keluar_edit = $(this).find('.jumlah_barang_keluar_edit')
                        .val();
                    var harga_satuan_edit = $(this).find('.harga_satuan_edit').val();
                    var subtotal_edit = $(this).find('.subtotal_edit').val();
                    detail.push({
                        nama_barang_keluar_edit: nama_barang_keluar_edit,
                        jumlah_barang_keluar_edit: jumlah_barang_keluar_edit,
                        harga_satuan_edit: harga_satuan_edit,
                        subtotal_edit: subtotal_edit
                    });
                });
                $.ajax({
                    url: "{{ route('update-pengeluaran-admin') }}",
                    type: "POST",
                    data: {
                        // id_pengeluaran: id_pengeluaran,
                        tgl_pengeluaran: tgl_pengeluaran_edit,
                        // total: total,
                        detail: detail
                    },
                    success: function(response) {
                        console.log(response);
                        $('#kt_modal_edit_data').modal('hide');
                        location.reload();
                    }
                });
            });

            // Hapus baris pada tabel Detail Barang Keluar
            $("#detailTableEdit").on('click', '.remove-btn-edit', function() {
                $(this).closest('tr').remove();
                calculateGrandTotal();
            });

            //klik add button pada tabel
            $(document).on('click', '.add-btn-edit', function() {
                var rowCount = $('#detailTableEdit tbody tr').length;
                var row = '<tr>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][nama_barang_keluar_edit]" class="form-control" required></td>' +
                    '<td><input type="number" name="detail[' + rowCount +
                    '][jumlah_barang_keluar_edit]" class="form-control jumlah_barang_keluar_edit" required></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][harga_satuan_edit]" class="form-control harga_satuan_edit" required></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][subtotal_edit]" class="form-control subtotal_edit" required readonly></td>' +
                    '<td class="add-remove text-end">' +
                    '<a href="javascript:void(0);" class="add-btn-edit me-2">' +
                    '<i class="fas fa-plus-circle text-success"></i>' +
                    '</a>' +
                    '<a href="javascript:void(0);" class="remove-btn-edit">' +
                    '<i class="fas fa-trash text-danger"></i>' +
                    '</a>' +
                    '</td>' +
                    '</tr>';
                $('#detailTableEdit tbody').append(row);
            });

            // Hapus baris pada tabel
            $(document).on('click', '.remove-btn-edit', function() {
                $(this).closest('tr').remove();
            });

            // Hitung total keseluruhan
            function calculateGrandTotal() {
                var grandTotal = 0;
                $('.subtotal_edit').each(function() {
                    var subtotal_edit = parseFloat($(this).val().replace(/\./g, '').replace('Rp ', '')) ||
                        0;
                    grandTotal += subtotal_edit;
                });
                $('#total_edit').val(formatRupiah(grandTotal));
            }

            // Panggil fungsi calculateGrandTotal saat ada perubahan pada subtotal_edit
            $(document).on('change', '.subtotal_edit', function() {
                calculateGrandTotal();
            });

            // Panggil fungsi calculateGrandTotal saat menambah atau menghapus baris
            $(document).on('click', '.remove-btn-edit, .add-btn-edit', function() {
                calculateGrandTotal();
            });


            // Hitung total saat jumlah_barang_keluar atau harga_satuan_edit berubah
            $(document).on('change', '.jumlah_barang_keluar_edit, .harga_satuan_edit', function() {
                calculateTotal($(this).closest('tr'));
            });

            // Fungsi untuk menghitung total
            function calculateTotal(row) {
                var jumlah_barang_keluar_edit = parseInt(row.find('.jumlah_barang_keluar_edit').val()) || 0;
                var harga_satuan_edit = parseInt(row.find('.harga_satuan_edit').val().replace(/\./g, '').replace(
                    'Rp ',
                    '')) || 0; // Menghapus titik dan 'Rp' dari harga_satuan_edit
                var total = jumlah_barang_keluar_edit * harga_satuan_edit;
                row.find('.subtotal_edit').val(formatRupiah(total));
            }

            // Format Rupiah saat mengetikkan angka
            $(document).on('keyup', '.harga_satuan_edit', function() {
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
            $('#editPengeluaranForm').submit(function() {
                $(this).find('button[type="submit"]').prop('disabled', true);
            });

        });
    </script>
@endsection
