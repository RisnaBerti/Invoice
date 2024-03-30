@extends('layouts.main-admin')

@section('content')
    <div class="page-header invoices-page-header">
        <div class="row align-items-center">
            <div class="col">
                <ul class="breadcrumb invoices-breadcrumb">
                    <li class="breadcrumb-item invoices-breadcrumb-item">
                        <a href="{{ url('pemasukan-admin') }}">
                            <i class="fe fe-chevron-left"></i> Kembali
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-auto">
                <div class="invoices-create-btn">
                    <a class="invoices-preview-link" href="" data-bs-toggle="modal"
                        data-bs-target="#invoices_preview"><i class="fe fe-eye"></i> Preview</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card invoices-add-card">
                <div class="card-body">
                    <form action="#" class="invoices-form">
                        <div class="invoices-main-form">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-12 col-6">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input class="form-control" type="date" placeholder="Enter Reference Number">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 col-6">
                                    <div class="form-group">
                                        <label>Nama Perusahaan</label>
                                        <div class="multipleSelection">
                                            <div class="selectBox">
                                                <p class="mb-0">Select Customer</p>
                                                <span class="down-icon"><i class="fas fa-chevron-down"></i></span>
                                            </div>
                                            <div id="checkBoxes-one">
                                                <p class="checkbox-title">Customer Search</p>
                                                <div class="form-custom">
                                                    <input type="text" class="form-control bg-grey"
                                                        placeholder="Enter Customer Name">
                                                </div>
                                                <div class="selectBox-cont">
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Brian Johnson
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Russell Copeland
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Greg Lynch
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> John Blair
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Barbara Moore
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Hendry Evan
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Richard Miles
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn w-100 btn-primary">Apply</button>
                                                <button type="reset" class="btn w-100 btn-grey">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="invoice-add-table">
                            <h4>Item Details</h4>
                            <div class="table-responsive">
                                <table class="table table-center add-table-items">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Banyak - Pcs</th>
                                            <th>Harga Santuan</th>
                                            <th>Saldo</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="add-row">
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                            <td class="add-remove text-end">
                                                <a href="javascript:void(0);" class="add-btn me-2">
                                                    <i class="fas fa-plus-circle"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="remove-btn">
                                                    <i class="fe fe-trash-2"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary add-invoice-btn">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal Preview --}}
    <div class="modal custom-modal fade invoices-preview" id="invoices_preview" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card invoice-info-card">
                                <div class="card-body pb-0">
                                    <div class="invoice-item invoice-item-one">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="invoice-logo">
                                                    <img src="{{ url('') }}/assets/img/logo.png" alt="logo">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="invoice-info">
                                                    <div class="invoice-head">
                                                        <h2 class="text-primary">Pemasukan</h2>
                                                        <p>Number : 1</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="invoice-info">
                                                <strong class="customer-text-one">Detail Pemasukan</strong>
                                                <p class="invoice-details invoice-details-two">Nama Perusahaan</p>
                                                <p class="invoice-details invoice-details-two">Tanggal</p>                                             
                                            </div>
                                        </div>
                                    </div>

                                    <div class="invoice-item invoice-table-wrap">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="invoice-table table table-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama Barang</th>
                                                                <th>Banyak - Pcs</th>
                                                                <th>Harga Santuan</th>
                                                                <th>Saldo</th>
                                                                <th class="text-end">Sub Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Dell Laptop</td>
                                                                <td>Laptop</td>
                                                                <td>$1,110</td>
                                                                <th>2</th>
                                                                <td class="text-end">$400</td>
                                                            </tr>
                                                            <tr>
                                                                <td>HP Laptop</td>
                                                                <td>Laptop</td>
                                                                <td>$1,500</td>
                                                                <th>3</th>
                                                                <td class="text-end">$3,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Apple Ipad</td>
                                                                <td>Ipad</td>
                                                                <td>$11,500</td>
                                                                <th>1</th>
                                                                <td class="text-end">$11,000</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-6">
                                            <div class="invoice-total-card">
                                                <div class="invoice-total-box">
                                                    <div class="invoice-total-footer">
                                                        <h4>Total <span>$143,300.00</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
