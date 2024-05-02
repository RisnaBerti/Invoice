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
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                        <input type="text" data-kt-user-table-filter="search"
                            class="form-control form-control-solid w-250px ps-13" placeholder="Mencari data" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <!--begin::Filter-->
                        <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                            <i class="ki-outline ki-filter fs-2"></i>Filter</button>
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bold">Filter Options</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Separator-->
                            <!--begin::Content-->
                            <div class="px-7 py-5" data-kt-user-table-filter="form">
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <label class="form-label fs-6 fw-semibold">Role:</label>
                                    <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                        data-placeholder="Select option" data-allow-clear="true"
                                        data-kt-user-table-filter="role" data-hide-search="true">
                                        <option></option>
                                        <option value="Administrator">Administrator</option>
                                        <option value="Analyst">Analyst</option>
                                        <option value="Developer">Developer</option>
                                        <option value="Support">Support</option>
                                        <option value="Trial">Trial</option>
                                    </select>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <label class="form-label fs-6 fw-semibold">Two Step Verification:</label>
                                    <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                        data-placeholder="Select option" data-allow-clear="true"
                                        data-kt-user-table-filter="two-step" data-hide-search="true">
                                        <option></option>
                                        <option value="Enabled">Enabled</option>
                                    </select>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="d-flex justify-content-end">
                                    <button type="reset"
                                        class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                        data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                                    <button type="submit" class="btn btn-primary fw-semibold px-6"
                                        data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Menu 1-->
                        <!--end::Filter-->
                        <!--begin::Export-->
                        <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_export_users">
                            <i class="ki-outline ki-exit-up fs-2"></i>Export</button>
                        <!--end::Export-->
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
                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                        <div class="fw-bold me-5">
                            <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                        </div>
                        <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete
                            Selected</button>
                    </div>
                    <!--end::Group actions-->
                    <!--begin::Modal - Adjust Balance-->
                    <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bold">Export</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                        data-kt-users-modal-action="close">
                                        <i class="ki-outline ki-cross fs-1"></i>
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                    <!--begin::Form-->
                                    <form id="kt_modal_export_users_form" class="form" action="#">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">Select Roles:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select name="role" data-control="select2" data-placeholder="Select a role"
                                                data-hide-search="true" class="form-select form-select-solid fw-bold">
                                                <option></option>
                                                <option value="Administrator">Administrator</option>
                                                <option value="Analyst">Analyst</option>
                                                <option value="Developer">Developer</option>
                                                <option value="Support">Support</option>
                                                <option value="Trial">Trial</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold form-label mb-2">Select Export
                                                Format:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select name="format" data-control="select2"
                                                data-placeholder="Select a format" data-hide-search="true"
                                                class="form-select form-select-solid fw-bold">
                                                <option></option>
                                                <option value="excel">Excel</option>
                                                <option value="pdf">PDF</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="text-center">
                                            <button type="reset" class="btn btn-light me-3"
                                                data-kt-users-modal-action="cancel">Discard</button>
                                            <button type="submit" class="btn btn-primary"
                                                data-kt-users-modal-action="submit">
                                                <span class="indicator-label">Submit</span>
                                                {{-- <span class="indicator-progress">Please wait...
                                                    <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span> --}}
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                            <!--end::Modal content-->
                        </div>
                        <!--end::Modal dialog-->
                    </div>
                    <!--end::Modal - New Card-->


                    <!--begin::Modal - Tambah Data -->
                    <div class="modal fade" id="kt_modal_new_target" tabindex="-1" data-bs-backdrop="static"
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
                                    <form id="kt_modal_new_target_form" class="form"
                                        action="{{ route('store-pengeluaran-admin') }}" method="POST"
                                        id="pengeluaranForm">
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
                                            <label>Detail Pemasukan:</label>
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
                                                        <th><input type="text" id="total" class="form-control"
                                                                readonly></th>
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
                                                                <i class="bi bi-trash text-danger"></i>
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
                                            <label>Detail Pemasukan:</label>
                                            <table id="detailBarisTabel" class="table">
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
                                                        <th><input type="text" id="total_edit" class="form-control"
                                                                readonly></th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody id="detailTableEdit" >
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
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                        data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                                </div>
                            </th>
                            <th class="min-w-125px">No</th>
                            <th class="min-w-125px">Tanggal</th>
                            <th class="min-w-125px">Jenis Barang</th>
                            <th class="min-w-125px">QTY</th>
                            <th class="min-w-125px">Harga Satuan</th>
                            <th class="min-w-125px">Subtotal</th>
                            <th class="text-end min-w-100px">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        @foreach ($pengeluaran as $index => $item)
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->tgl_pengeluaran }}</td>
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
                                            <li>{{ $detail->harga_satuan }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        @foreach ($item->detail as $detail)
                                            <li>{{ $detail->subtotal }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="text-end">
                                    <a href="#"
                                        class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            {{-- <a href="{{ url('edit-pengeluaran-admin/' . $item->id_pengeluaran) }}" id="edit-row" name="edit-row"
                                                class="menu-link px-3" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_edit_data">Edit</a> --}}
                                            <a href="#" class="menu-link px-3 edit-row" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_edit_data"
                                                data-id="{{ $item->id_pengeluaran }}">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-users-table-filter="delete_row">Delete</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                                {{-- <td>
                                    <a href="{{ url('/pengeluaran-admin/' . $item->id . 'edit/{id}') }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ url('/pengeluaran-admin' . $item->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                    </form>Hapus</button>
                                </td> --}}
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
                    '<i class="bi bi-trash text-danger"></i>' +
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
                            '<a href="#" class="add-btn-edit me-2">' +
                            '<i class="fas fa-plus-circle text-success"></i>' +
                            '</a>' +
                            '<a href="#" class="remove-btn-edit">' +
                            '<i class="fas fa-trash text-danger"></i>' +
                            '</a>' +
                            '</td>';
                        $('#detailTableEdit').append(row);
                    });
                    $("#kt_modal_edit_data").modal("show");
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
