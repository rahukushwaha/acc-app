@extends('layout2.layout')
@push('css')
<style>
.txt-left-side {
    text-align: right;
}
</style>
@endpush
@section('content')
<!--app-content open-->
<div class="app-content main-content mt-0">
    <div class="side-app">
        <!-- CONTAINER -->
        <div class="main-container container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Create Invoice</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Apps</li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Invoices</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Invoice</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!--ROW OPENED-->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="mb-0">Invoice</h4>
                        </div>
                        <div class="card-body p-0 invoice-create-main">
                            <div class="row p-5 border-bottom border-info">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-8 col-md-8 col-sm-12 border-x border-info">
                                            <div class="form-group">
                                                <label class="form-label text-muted mb-2 text-dark">Bill To:</label>
                                                <div class="d-flex flex-wrap d-flex align-items-center justify-content-center justify-content-sm-start">
													<div class="p-7 w-40 m-1 mb-2 border border-success" style="border: 1px dashed #13bfa6!important; cursor: pointer;">
                                                        <i class="fa fa-plus"></i> Add Party
                                                    </div>
												</div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4 col-sm-12 border-y border-info">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="card-name">Sales Invoice No.</label>
                                                        <input class="form-control" id="card-name" type="text" placeholder="Sale Invoice No" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="card-name">Sales Invoice Date</label>
                                                        <input class="form-control" id="card-name" type="date" placeholder="Sales Invoice Date" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="ssnMask-card">Payment Terms</label>
                                                        <div class="main-parent">
                                                            <input class="form-control" id="ssnMask-card" placeholder="xxxx" type="text" required>
                                                            <div class="d-flex main-child">
                                                                Days
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="card-name">Due Date</label>
                                                        <input class="form-control" id="card-name" type="date" placeholder="Due Date" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-5 border-bottom">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12">
                                            <div class="table-responsive">
												<table class="table text-nowrap text-md-nowrap table-bordered">
													<thead>
														<tr>
															<th style="width: 20px;">NO</th>
															<th>ITEM GROUP</th>
                                                            <th>ITEM</th>
															<th>SAC</th>
															<th>QTY</th>
                                                            <th>PRICE/ITEM</th>
                                                            <th>DISCOUNT</th>
                                                            <th>TAX</th>
                                                            <th>AMOUNT</th>
                                                            <th style="width: 100px;">
                                                                <a href="javascript:void(0)" role="button" class="text-primary text-center add-invoice-item-btn mt-2">
                                                                    <i class="fa fa-plus"></i>
                                                                    Add Item
                                                                </a>
                                                            </th>
														</tr>
													</thead>
													<tbody>
														
													</tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="6" style="text-align: right;">SUBTOTAL</td>
                                                            <td>0</td>
                                                            <td>0</td>
                                                            <td colspan="2">0</td>
                                                        </tr>
                                                    </tfoot>
												</table>
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-0 pb-5 px-5 border-bottom">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-sm-12 border-x border-info">asdasd
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12 border-x border-info">
                                            <div class="row pt-0 pb-5 px-5 border-bottom">
                                                <div class="col-xl-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Taxable Amount
                                                        </div>
                                                        <div class="col-md-6 txt-left-side">
                                                            0.00
                                                        </div>
                                                        <div class="col-md-6">
                                                            SGST @9
                                                        </div>
                                                        <div class="col-md-6 txt-left-side">
                                                            0.00
                                                        </div>
                                                        <div class="col-md-6">
                                                            CGST @9
                                                        </div>
                                                        <div class="col-md-6 txt-left-side">
                                                            0.00
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pt-0 pb-5 px-5 border-bottom">
                                                <div class="col-xl-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            + Add Additional Chargers
                                                        </div>
                                                        <div class="col-md-6 txt-left-side">
                                                            0.00
                                                        </div>
                                                        <div class="col-md-6">
                                                            + Add Discount
                                                        </div>
                                                        <div class="col-md-6 txt-left-side">
                                                            0.00
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pt-0 pb-5 px-5 border-bottom">
                                                <div class="col-xl-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="ckbox" for="ckbox-unchecked">
                                                                <input type="checkbox" id="ckbox-unchecked"><span>Auto Round Off</span>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-6 txt-left-side">
                                                            0.00
                                                        </div>
                                                        <div class="col-md-6">
                                                            Total Amount
                                                        </div>
                                                        <div class="col-md-6 txt-left-side">
                                                            0.00
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pt-0 pb-5 px-5 border-bottom">
                                                <div class="col-xl-12">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            
                                                        </div>
                                                        <div class="col-md-4 txt-left-side border">
                                                            <div>
                                                                <label class="ckbox" for="ckbox-Auto-Round-Off">
                                                                    <input type="checkbox" id="ckbox-Auto-Round-Off"><span>Auto Round Off</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-8">
                                                            Amount Received
                                                        </div>
                                                        <div class="col-md-4 txt-left-side">
                                                            0.00
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-5">
                                <div class="btn-list text-end">
                                    <button class="btn btn-outline-danger">
                                        <i class="fe fe-x-circle"></i>
                                        Cancel
                                    </button>
                                    <button class="btn btn-info">
                                        <i class="fe fe-file-minus"></i>
                                        Save As Draft
                                    </button>
                                    <button class="btn btn-primary me-sm-0 me-2">
                                        <i class="fe fe-check-circle"></i>
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--ROW CLOSED-->
        </div>
    </div>
</div>
<!-- CONTAINER CLOSED -->
@endsection
@push('js')
@endpush