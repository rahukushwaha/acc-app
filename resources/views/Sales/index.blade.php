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
            <div class="page-header"></div>
            <!-- PAGE-HEADER END -->
            <!--ROW OPENED-->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="mb-0">Invoice</h4>
                        </div>
                        <div class="card-body p-0 invoice-create-main">
                            <div class="row p-2 border-bottom border-info">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-7 col-md-7 col-sm-12 border-x border-info">
                                            <div class="form-group">
                                                <label class="form-label text-muted mb-2 text-dark">Bill To:</label>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <div class="card bg-primary img-card box-primary-shadow modal-effect" data-bs-effect="effect-slide-in-right" data-bs-toggle="modal" href="#modaldemo8" style="cursor: pointer;">
                                                            <div class="card-body">
                                                                <div class="d-flex">
                                                                    <div class="text-white">
                                                                        <p class="mb-0 number-font"> <i class="fa fa-plus"></i> Add Party</p>
                                                                    </div>
                                                                    <div class="ms-auto"> <i class="fa fa-send-o text-white fs-30 me-2 mt-2"></i> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-md-5 col-sm-12 border-y border-info">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="card-name">Sales Invoice No. <span class="required">*</span> </label>
                                                        <input class="form-control" id="card-name" type="text" placeholder="Sale Invoice No" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="card-name">Sales Invoice Date <span class="required">*</span></label>
                                                        <input class="form-control" id="card-name" type="date" placeholder="Sales Invoice Date" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="ssnMask-card">Payment Terms (Days) <span class="required">*</span></label>
                                                        <div class="main-parent">
                                                            <input class="form-control" id="ssnMask-card" placeholder="xxxx" type="text" required>
                                                            <!-- <div class="d-flex main-child">
                                                                Days
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="card-name">Due Date <span class="required">*</span></label>
                                                        <input class="form-control" id="card-name" type="date" placeholder="Due Date" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-2 border-bottom border-info">
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
                            <div class="row p-2 border-bottom border-info">
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
<!-- MODAL EFFECTS -->
<div class="modal fade"  id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Create New Party</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-8">
                        <label class="form-label">Party Name <span class="required">*</span></label>
                        <input type="text" class="form-control" id="varPartyName" name="varPartyName" placeholder="Party Name">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Mobile No <span class="required">*</span></label>
                        <input type="text" class="form-control" id="varMobileNo" name="varMobileNo" placeholder="Mobile No">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="form-label">Billing Address</label>
                        <textarea class="form-control" id="varBillingAddress" name="varBillingAddress" placeholder="Billing Address"></textarea>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-auto">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input bitShippingAdrSame" id="bitShippingAdrSame" name="bitShippingAdrSame" value="1" checked onchange="bitShippingAdrSameOnChanged();">
                            <span class="custom-control-label">Shipping address same as billing address</span>
                        </label>
                    </div>
                </div>
                <div class="row" style="display: none;" id="varShippingAddressHideShow">
                    <div class="form-group col-md-12">
                        <label class="form-label">Shipping Address</label>
                        <textarea class="form-control" id="varShippingAddress" name="varShippingAddress" placeholder="Shipping Address"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Place of Supply (STATE) <span class="required">*</span></label>
                        <select class="select2 form-select" id="intSupplyPlaceStateMstrsId" name="intSupplyPlaceStateMstrsId" data-placeholder="== SELECT ==" style="width:100%">
                            <option label="Choose one"></option>
                            <option value="AZ">Arizona</option>
                            <option value="CO">Colorado</option>
                            <option value="ID">Idaho</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NM">New Mexico</option>
                            <option value="ND">North Dakota</option>
                            <option value="UT">Utah</option>
                            <option value="WY">Wyoming</option>
                            <option value="AL">Alabama</option>
                            <option value="AR">Arkansas</option>
                            <option value="IL">Illinois</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="OK">Oklahoma</option>
                            <option value="SD">South Dakota</option>
                            <option value="TX">Texas</option>
                            <option value="TN">Tennessee</option>
                            <option value="WI">Wisconsin</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">GSTIN</label>
                        <input type="text" class="form-control" id="varGstin" name="varGstin" placeholder="GSTIN">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" >Save changes</button> <button class="btn btn-light" data-bs-dismiss="modal" >Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
function bitShippingAdrSameOnChanged() {
    if($('.bitShippingAdrSame').is(":checked"))   
        $("#varShippingAddressHideShow").hide();
    else
        $("#varShippingAddressHideShow").show();
}
</script>
@endpush