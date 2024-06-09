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
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">

                        <!--begin::Export-->
                        {{-- <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_export_users">
                            <i class="ki-outline ki-exit-up fs-2"></i>Export</button> --}}
                        <!--end::Export-->
                        <!--begin::Add Data-->
                        <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_mitra"><i class="ki-outline ki-plus fs-2"></i>Tambah Data</a>
                        <!--end::Add Data-->
                        <!--begin::Add user-->
                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_user">
                            <i class="ki-outline ki-plus fs-2"></i>Tambah Data</button> --}}
                        <!--end::Add user-->
                    </div>
                    <!--end::Toolbar-->


                    <!--begin::Modal - Tambah Data -->

                    <div class="modal fade" id="kt_modal_add_mitra" tabindex="-1" data-bs-backdrop="static"
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
                                    <form id="kt_modal_add_mitra_form" class="form"
                                        action="{{ route('store-mitra-admin') }}" method="POST" id="mitraForm">
                                        @csrf
                                        <!--begin::Heading-->
                                        <div class="mb-13 text-center">
                                            <!--begin::Title-->
                                            <h1 class="mb-3">FORM MITRA</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-muted fw-semibold fs-5">Data Mitra
                                                <a href="" class="fw-bold link-primary">CV Toba Jaya Teknik
                                                    Cilacap</a>.
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                <span class="required">Nama Mitra</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter Target Title" name="nama_mitra" id="nama_mitra" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                <span class="required">Alamat</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter Target Title" name="alamat_mitra" id="alamat_mitra" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                <span class="required">No Telphone</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter Target Title" name="no_telp_mitra" id="no_telp_mitra" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                <span class="required">Email</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="email" class="form-control form-control-solid"
                                                placeholder="Enter Target Title" name="email_mitra" id="email_mitra" />
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Actions-->
                                        <div class="text-center">
                                            <button type="reset" id="kt_modal_add_mitra_cancel"
                                                class="btn btn-light me-3">Cancel</button>
                                            <button type="submit" id="kt_modal_add_mitra_submit" class="btn btn-primary">
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
                                    <form id="kt_modal_edit_data_form" class="form"
                                        action="{{ route('update-mitra-admin') }}" method="POST" id="editMitraForm">
                                        @csrf

                                        <!--begin::Heading-->
                                        <div class="mb-13 text-center">
                                            <!--begin::Title-->
                                            <h1 class="mb-3">FORM MITRA</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-muted fw-semibold fs-5">Data Mitra
                                                <a href="" class="fw-bold link-primary">CV Toba Jaya Teknik
                                                    Cilacap</a>.
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Heading-->

                                        <input type="hidden" name="id_mitra_edit" id="id_mitra_edit">

                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                <span class="required">Nama Mitra</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter Target Title" name="nama_mitra_edit"
                                                id="nama_mitra_edit" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                <span class="required">Alamat</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter Target Title" name="alamat_mitra_edit"
                                                id="alamat_mitra_edit" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                <span class="required">No Telphone</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter Target Title" name="no_telp_mitra_edit"
                                                id="no_telp_mitra_edit" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                <span class="required">Email</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="email" class="form-control form-control-solid"
                                                placeholder="Enter Target Title" name="email_mitra_edit"
                                                id="email_mitra_edit" />
                                        </div>
                                        <!--end::Input group-->



                                        <!--begin::Actions-->
                                        <div class="text-center">
                                            <button type="reset" id="kt_modal_add_mitra_cancel"
                                                class="btn btn-light me-3">Cancel</button>
                                            <button type="submit" id="kt_modal_add_mitra_submit_edit"
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
                <table class="table table-hover align-middle table-row-dashed fs-6 gy-5" id="kt_table_mitra">
                    <thead>
                        <tr class="text-start fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                        data-kt-check-target="#kt_table_mitra .form-check-input" value="1" />
                                </div>
                            </th>
                            <th>Nama Mitra</th>
                            <th>Alamat</th>
                            <th>No Tlp</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        {{-- @foreach ($mitra as $index => $item)
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_mitra }}</td>
                                <td>{{ $item->alamat_mitra }}</td>
                                <td>{{ $item->no_telp_mitra }}</td>
                                <td>{{ $item->email_mitra }}</td>
                                <td>
                                    <a href="#" class="menu-link px-1 edit-row" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_edit_data" data-id="{{ $item->id_mitra }}"><i
                                            class="fas fa-edit text-warning"></i></a>
                                    <form action="{{ route('delete-pengeluaran-admin', ['id' => $item->id_mitra]) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="menu-link px-1"
                                            data-kt-users-table-filter="delete_row"
                                            style="border:none; background:none; padding:0; cursor:pointer;"><i
                                                class="fas fa-trash-alt text-danger"></i></button>
                                    </form>
                                    <a href="{{ route('show-pengeluaran-admin', ['id' => $item->id_mitra]) }}"  class="menu-link px-1 show-row"><i class="fas fa-eye text-success"></i></a>
                                </td>
                            </tr>
                        @endforeach --}}
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
        //Modal Untuk Tambah Data Mitra
        $(document).ready(function() {
            // Hitung total_harga keseluruhan
            function calculateGrandTotal() {
                var grandTotal = 0;
                $('.subtotal').each(function() {
                    var subtotal = parseFloat($(this).val().replace(/\./g, '').replace('Rp ', '')) || 0;
                    grandTotal += subtotal;
                });
                $('#total_harga').val(formatRupiah(grandTotal));
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
                    '][jenis_mitra]" class="form-control jenis_mitra" required></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][id_mitra]" class="form-control id_mitra" required></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][nama_barang_masuk]" class="form-control nama_barang_masuk" required></td>' +
                    '<td><input type="number" name="detail[' + rowCount +
                    '][jumlah_barang_masuk]" class="form-control jumlah_barang_masuk" required></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][harga_barang_masuk]" class="form-control harga_barang_masuk" required></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][subtotal]" class="form-control subtotal" required readonly></td>' +
                    '<td><input type="text" name="detail[' + rowCount +
                    '][total_harga]" class="form-control total_harga" required readonly></td>' +
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
            $('#mitraForm').submit(function() {
                $(this).find('button[type="submit"]').prop('disabled', true);
            });

        });
    </script>

    <script>
        //Modal Untuk Edit Data Mitra
        $(document).ready(function() {
            $('#kt_table_mitra').on('click', '.edit-row', function() {
                var id = $(this).data('id');
                var url = "{{ route('edit-mitra-admin', ':id') }}";
                url = url.replace(':id', id);
                $.get(url, function(data) {
                    $('#id_mitra_edit').val(data.id_mitra);
                    $('#nama_mitra_edit').val(data.nama_mitra);
                    $('#alamat_mitra_edit').val(data.alamat_mitra);
                    $('#no_telp_mitra_edit').val(data.no_telp_mitra);
                    $('#email_mitra_edit').val(data.email_mitra);
                });

                //vardump data get
                // console.log(data);
                // die();
                $("#kt_modal_edit_data").modal("show");
            });

            //save data edit post controller update
            $('#kt_modal_add_mitra_submit_edit').click(function() {
                // var id_mitra = $('#id_mitra').val();
                var nama_mitra = $('#nama_mitra_edit').val();
                var alamat_mitra = $('#alamat_mitra_edit').val();
                var no_telp_mitra = $('#no_telp_mitra_edit').val();
                var email_mitra = $('#email_mitra_edit').val();

                $.ajax({
                    url: "{{ route('update-mitra-admin') }}",
                    type: "POST",
                    data: {
                        // id_mitra: id_mitra,
                        nama_mitra: nama_mitra,
                        alamat_mitra: alamat_mitra,
                        no_telp_mitra: no_telp_mitra,
                        email_mitra: email_mitra
                    },
                    success: function(response) {
                        console.log(response);
                        $('#kt_modal_edit_data').modal('hide');
                        location.reload();
                    }
                });

            });

            // Submit form
            $('#editMitraForm').submit(function() {
                $(this).find('button[type="submit"]').prop('disabled', true);
            });

        });
    </script>

    {{-- // Memuat DataTable --}}
    <script>
        $(document).ready(function() {
            $('#kt_table_mitra').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('mitra-admin') }}"
                },
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            // Menggunakan meta.row untuk mendapatkan nomor urut
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'nama_mitra',
                        name: 'nama_mitra'
                    },
                    {
                        data: 'alamat_mitra',
                        name: 'alamat_mitra'
                    },
                    {
                        data: 'no_telp_mitra',
                        name: 'no_telp_mitra'
                    },
                    {
                        data: 'email_mitra',
                        name: 'email_mitra'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });
        });
    </script>
@endsection
