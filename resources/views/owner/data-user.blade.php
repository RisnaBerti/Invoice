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
                    <form action="{{ route('data-user') }}" method="GET">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                            <input type="text" class="form-control form-control-solid w-250px ps-13" name="q"
                                id="q" placeholder="Mencari data" value="" />
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </form>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <!--begin::Add Data-->
                        <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_user"><i class="ki-outline ki-plus fs-2"></i>Tambah Data</a>
                        <!--end::Add Data-->
                        <!--begin::Add user-->
                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_user">
                            <i class="ki-outline ki-plus fs-2"></i>Tambah Data</button> --}}
                        <!--end::Add user-->
                    </div>
                    <!--end::Toolbar-->



                    <!--begin::Modal - Tambah Data -->
                    <div class="modal fade" id="kt_modal_add_user" tabindex="-1" data-bs-backdrop="static"
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
                                    <form id="kt_modal_add_user_form" class="form" action="{{ route('store-data-user') }}"
                                        method="POST" id="userForm">
                                        @csrf
                                        <!--begin::Heading-->
                                        <div class="mb-13 text-center">
                                            <!--begin::Title-->
                                            <h1 class="mb-3">FORM DATA PENGGUNA</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-muted fw-semibold fs-5">Data Pengguna
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
                                                <span class="required">Nama </span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Nama User" name="nama" id="nama" />
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
                                                placeholder="Email" name="email" id="email" />
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <!--begin::Label-->
                                            {{-- <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                <span class="required">Password</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                </span>
                                            </label> --}}
                                            <!--end::Label-->
                                            {{-- <input type="password" class="form-control form-control-solid"
                                                placeholder="Password" name="password" id="password" value=""
                                                /> --}}
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        {{-- <div class="d-flex flex-column mb-8 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                <span class="required">Jabatan </span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Jabatan" name="jabatan" id="jabatan" />
                                        </div> --}}
                                        <!--end::Input group-->

                                        <!--begin::Actions-->
                                        <div class="text-center">
                                            <button type="reset" id="kt_modal_add_user_cancel"
                                                class="btn btn-light me-3">Cancel</button>
                                            <button type="submit" id="kt_modal_add_user_submit" class="btn btn-primary">
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
                                        action="{{ route('update-data-user') }}" method="POST" id="editDataForm">
                                        @csrf

                                        <!--begin::Heading-->
                                        <div class="mb-13 text-center">
                                            <!--begin::Title-->
                                            <h1 class="mb-3">FORM DATA PENGGUNA</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-muted fw-semibold fs-5">Data Pengguna
                                                <a href="" class="fw-bold link-primary">CV Toba Jaya Teknik
                                                    Cilacap 2</a>.
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Heading-->

                                        {{-- id mitra hide --}}
                                        <input type="hidden" class="form-control form-control-solid" name="id_user_edit"
                                            id="id_user_edit" />

                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                <span class="required">Nama </span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Nama User" name="nama_edit" id="nama_edit" />
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
                                                placeholder="Email" name="email_edit" id="email_edit" readonly />
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                <span class="required">Jabatan</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Jabatan" name="jabatan_edit" id="jabatan_edit" readonly />
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        {{-- <div class="d-flex flex-column mb-8 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                <span class="required">Password</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Specify a target name for future usage and reference">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="password" class="form-control form-control-solid"
                                                placeholder="Password" name="password_edit" id="password_edit" />
                                        </div> --}}
                                        <!--end::Input group-->

                                        <!--begin::Actions-->
                                        <div class="text-center">
                                            <button type="reset" id="kt_modal_add_user_cancel"
                                                class="btn btn-light me-3">Cancel</button>
                                            <button type="submit" id="kt_modal_add_user_submit_edit"
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
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_user">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">

                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Reset Password</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        @foreach ($user as $index => $item)
                            <tr>

                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>
                                    <a href="{{ route('edit-akun-user', ['id' => $item->id_user]) }}"
                                        class="menu-link px-1"><i class="fas fa-key text-primary"></i>
                                        {{-- tombol ganti password --}}
                                        Reset Password

                                    </a>
                                </td>
                                @if ($item->id_role == 2)
                                <td>
                                    <a href="#" class="menu-link px-1 edit-row" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_edit_data" data-id="{{ $item->id_user }}"><i
                                            class="fas fa-edit text-warning"></i></a>
                                    {{-- <form action="{{ route('delete-data-user', ['id' => $item->id_user]) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="menu-link px-1" data-kt-users-table-filter="delete_row"
                                            style="border:none; background:none; padding:0; cursor:pointer;"><i
                                                class="fas fa-trash-alt text-danger"></i></button>
                                    </form> --}}
                                </td>
                            @else
                                <td>
                                    <a href="#" class="menu-link px-1 edit-row" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_edit_data" data-id="{{ $item->id_user }}"><i
                                        class="fas fa-edit text-warning"></i></a>
                                </td> 
                            @endif
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
        //Modal Untuk Tambah Data Pemasukan
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
                    '][id_user]" class="form-control id_user" required></td>' +
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
            $('#userForm').submit(function() {
                $(this).find('button[type="submit"]').prop('disabled', true);
            });

        });
    </script>

    <script>
        //Modal Untuk Edit Data Pemasukan
        $(document).ready(function() {
            //Modal Untuk Edit Data Pemasukan
            // Menampilkan data dalam modal saat tombol "Edit" pada baris tabel diklik
            $('#kt_table_user').on('click', '.edit-row', function() {
                var id = $(this).data('id');
                var url = "{{ route('edit-data-user', ':id') }}";
                url = url.replace(':id', id);
                $.get(url, function(data) {
                    $('#id_user_edit').val(data.id_user);
                    $('#nama_edit').val(data.nama);
                    $('#email_edit').val(data.email);
                    $('#jabatan_edit').val(data.jabatan);
                    //    $('#password_edit').val(data.password);
                });

                //vardump data get
                console.log(data);
                // die();
                $("#kt_modal_edit_data").modal("show");
            });

            //save data edit post controller update
            $('#kt_modal_add_user_submit_edit').click(function() {
                var id_user = $('#id_user_edit').val();
                var nama = $('#nama_edit').val();
                var email = $('#email_edit').val();
                var jabatan = $('#jabatan_edit').val();
                // var password = $('#password_edit').val();

                $.ajax({
                    url: "{{ route('update-data-user') }}",
                    type: "POST",
                    data: {
                        // id_user: id_user,
                        nama: nama_edit,
                        email: email_edit,
                        jabatan: jabatan_edit,
                        // password: password_edit,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);
                        $('#kt_modal_edit_data').modal('hide');
                        location.reload();
                    }
                });

            });

            // Submit form
            $('#editDataForm').submit(function() {
                $(this).find('button[type="submit"]').prop('disabled', true);
            });

        });
    </script>
@endsection
