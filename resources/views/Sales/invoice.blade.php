@extends('layout2.layout')
@push('css')
<style>
.txt-left-side {
    text-align: right;
}
.form-control {
    border: 0px solid #eaedf1;
    color: #151618;
}
</style>
@endpush
@section('content')
<!--app-content open-->
<div class="app-content">
    <div class="side-app">
        <!-- CONTAINER -->
        <div class="main-container" style="margin-top: 10px;">
            <!--ROW OPENED-->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="mb-0">Invoice</h4>
                            <div class="card-options">
                                <button type="button" class="btn btn-outline-info" onclick="javascript:window.print();">
                                    <i class="si si-printer"></i>
                                    print
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0 invoice-create-main" id="printable-content">
                            <div class="row p-2 border-bottom border-info">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-7 col-md-7 col-sm-12 border-x border-info">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="card">
                                                        <div class="card-body" style="padding-top: 5px; padding-bottom: 5px;">
                                                            <label class="fs-25 border-bottom border-info" style="margin-bottom: 0rem">Invoice To:</label><br />
                                                            <label class="fs-20" style="margin-bottom: 0rem">{{ $purDtl->varPartyName }}</label><br />
                                                            <?php if ($purDtl->varBillingAddress!="") { ?>
                                                            <label class="fs-12" style="margin-bottom: 0rem">address: {{ $purDtl->varBillingAddress }}</label><br />
                                                            <?php } ?>
                                                            <label class="fs-12" style="margin-bottom: 0rem">Phone No.: {{ $purDtl->varMobileNo }}</label><br />
                                                            <?php if ($purDtl->varGstin!="") { ?>
                                                                <label class="fs-12" style="margin-bottom: 0rem">GSTIN: {{ $purDtl->varGstin }}</label><br />
                                                            <?php } ?>
                                                            <div class="row">
                                                                <div class="col-md-12" style="text-align: right;">
                                                                    <label class="fs-12" style="margin-bottom: 0rem">Place Of Supply: <b>{{ $purDtl->varSupplyPlaceStateName }}</b></label><br />
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
                                                        <label class="form-label">Invoice No </label>
                                                        <input type="text" class="form-control" value="{{ $purDtl->varInvoiceNo }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Sale Date </label>
                                                        <input type="text" class="form-control" value="{{ date('d-m-Y', strtotime($purDtl->dtInvoiceDate)) }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Payment Terms </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Days</span>
                                                            <input type="text" class="form-control" value="{{ $purDtl->intPaymentTerms }}" readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Due Date </label>
                                                        <input type="text" class="form-control" value="{{ ($purDtl->dtDueDate=='')?'NA':date('d-m-Y', strtotime($purDtl->dtDueDate)) }}" readonly>
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
                                                            <th>ITEM GROUP&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                                            <th>ITEM&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                                            <th>SAC&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                                            <th>QTY&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                                            <th>PRICE/ITEM&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                                            <th>DISCOUNT&nbsp&nbsp&nbsp&nbsp</th>
                                                            <th>TAX&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                                            <th>AMOUNT&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="itemTBody">
                                                    <?php 
                                                    if (isset($purDtl->purListDtl)) {
                                                        foreach ($purDtl->purListDtl as $key => $purList) {
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <input type="text" class="form-control" value="{{ $purList->varItem }}" readonly />
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" value="{{ $purList->varSubItem }}" readonly />
                                                                <?php if ($purList->varProductSerialNo!="") { ?>
                                                                    <input type="text" class="form-control border-top border-bottom border-info" value="{{ $purList->varProductSerialNo }}" readonly />
                                                                <?php } ?>
                                                            </td>
                                                            <td style="width: 150px;">
                                                                <input type="text" class="form-control" value="{{ ($purList->varSAC=='')?'NA':$purList->varSAC }}" readonly />
                                                            </td>
                                                            <td style="width: 120px;">
                                                                <input type="text" class="form-control" value="{{ $purList->intQty }}" readonly />
                                                            </td>
                                                            <td style="width: 150px;">
                                                                <input type="text" class="form-control" value="{{ $purList->decSalesPrice }}" readonly />
                                                            </td>
                                                            <td style="width: 80px;">
                                                                <input type="text" class="form-control" value="{{ $purList->decDiscountPer }}" readonly />
                                                                <input type="text" class="form-control" value="{{ $purList->decDiscountAmt }}" readonly />
                                                            </td>
                                                            <td style="width: 150px;">
                                                                <input type="text" class="form-control" value="{{ $purList->decTaxAmt }}" readonly />
                                                                <input type="text" class="form-control" value="{{ $purList->intGstPer }}" readonly />
                                                            </td>
                                                            <td style="width: 150px;">
                                                                <input type="text" class="form-control" value="{{ $purList->decAmount }}" readonly />
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                    }
                                                    ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="5" style="text-align: right;">SUBTOTAL</td>
                                                            <td>
                                                                <input type="text" class="form-control" value="{{ $purDtl->decSubTotalDiscount }}" readonly />
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" value="{{ $purDtl->decSubTotalTax }}" readonly />
                                                            </td>
                                                            <td colspan="2">
                                                                <input type="text" class="form-control" value="{{ $purDtl->decSubTotalAmt }}" readonly />
                                                            </td>
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
                                        <div class="col-xl-7 col-md-7 col-sm-12 border-x border-info">
                                            <div class="row mt-3">
                                                <div class="col-sm-12 col-md-12 col-xl-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <label class="form-label">Notes</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <textarea class="form-control" readonly>{{ ($purDtl->varNotes=="")?"NA":$purDtl->varNotes }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row border-bottom border-info" style="padding-bottom: 0.2rem!important;">
                                                <div class="col-sm-12 col-md-12 col-xl-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <label class="form-label">Terms and Conditions</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <textarea class="form-control" readonly>{{ ($purDtl->varTermsNCondition=="")?"NA":$purDtl->varTermsNCondition }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-md-5 col-sm-12 border-x border-info">
                                            <div class="row border-bottom border-info" style="padding-bottom: 0.2rem!important;">
                                                <div class="col-sm-12 col-md-12 col-xl-12">
                                            <?php if ($purDtl->decSubTotalTax > 0) { ?>
                                                    <div class="row">
                                                        <div class="col col-sm-6 col-md-6">
                                                            <input type="text" class="form-control" value="Taxable Amount" readonly />
                                                        </div>
                                                        <div class="col col-sm-6 col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-text">&#8377;</span>
                                                                <input type="text" class="form-control" value="{{ $purDtl->decTaxableAmt }}" style="text-align:right;" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php if ($purDtl->intSupplyPlaceStateMstrsId != 10) { ?>
                                                    <div class="row" style="margin-top: 2px;">
                                                        <div class="col col-sm-6 col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-text">IGST @</span>
                                                                <input type="text" class="form-control" value="{{ $purDtl->intIGSTPer }}" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col col-sm-6 col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-text">&#8377;</span>
                                                                <input type="text" class="form-control" value="{{ $purDtl->decIGSTAmt }}" style="text-align:right;" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <?php if ($purDtl->intSupplyPlaceStateMstrsId == 10) { ?>
                                                    <div class="row" style="margin-top: 2px;">
                                                        <div class="col col-sm-6 col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-text">SGST @</span>
                                                                <input type="text" class="form-control" value="{{ $purDtl->intSGSTPer }}" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col col-sm-6 col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-text">&#8377;</span>
                                                                <input type="text" class="form-control" value="{{ $purDtl->decSGSTAmt }}" style="text-align:right;" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <?php if ($purDtl->intSupplyPlaceStateMstrsId == 10) { ?>
                                                    <div class="row" style="margin-top: 2px;">
                                                        <div class="col col-sm-6 col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-text">CGST @</span>
                                                                <input type="text" class="form-control" value="{{ $purDtl->intCGSTPer }}" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col col-sm-6 col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-text">&#8377;</span>
                                                                <input type="text" class="form-control" value="{{ $purDtl->decCGSTAmt }}" style="text-align:right;" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>
                                                </div>
                                            </div>
                                            <div class="row border-bottom border-info" style="padding-bottom: 0.2rem!important; padding-top: 0.2rem!important;">
                                                <div class="col-sm-12 col-md-12 col-xl-12">
                                                    <div class="row">
                                                        <div class="col col-sm-6 col-md-6">
                                                            <input type="text" class="form-control" value="+ Additional Chargers" readonly />
                                                        </div>
                                                        <div class="col col-sm-6 col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-text">&#8377;</span>
                                                                <input type="text" class="form-control" value="{{ $purDtl->decAdditionalChargesAmt }}" readonly style="text-align:right;" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-top: 4px;">
                                                        <div class="col col-sm-6 col-md-6">
                                                            <input type="text" class="form-control" value="- Extra Discount" readonly />
                                                        </div>
                                                        <div class="col col-sm-6 col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-text">&#8377;</span>
                                                                <input type="text" class="form-control" value="{{ $purDtl->decExtraDiscountAmt }}" readonly style="text-align:right;" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($purDtl->intIsRoundOff == 1) { ?>
                                            <div class="row border-bottom border-info" style="padding-bottom: 0.2rem!important; padding-top: 0.2rem!important;">
                                                <div class="col-sm-12 col-md-12 col-xl-12">
                                                    <div class="row">
                                                        <div class="col col-sm-6 col-md-6" style="text-align: right;">
                                                            <label class="form-label">Round Off</label>
                                                        </div>
                                                        <div class="col col-sm-6 col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-text">&#8377;</span>
                                                                <input type="text" class="form-control" value="{{ $purDtl->decRoundOffAmt }}" style="text-align:right;" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="row border-bottom border-info" style="padding-bottom: 0.2rem!important; padding-top: 0.2rem!important;">
                                                <div class="col-sm-12 col-md-12 col-xl-12">
                                                    <div class="row">
                                                        <div class="col col-sm-6 col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-text">Total Amount</span>
                                                                <input type="text" class="form-control" value="" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col col-sm-6 col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-text">&#8377;</span>
                                                                <input type="text" class="form-control" value="{{ $purDtl->decTotalAmt }}" style="text-align:right;" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row border-bottom border-info" style="padding-bottom: 0.2rem!important; padding-top: 0.2rem!important;">
                                                <div class="col-xl-12">
                                                    <div class="row">
                                                        <div class="col col-sm-6 col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-text">Amount Received</span>
                                                                <input type="text" class="form-control" value="" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col col-sm-6 col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-text">&#8377;</span>
                                                                <input type="text" class="form-control" value="{{ $purDtl->decReceiveAmt }}" readonly style="text-align:right;" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row border-bottom border-info" style="padding-bottom: 0.2rem!important; padding-top: 0.2rem!important;">
                                                <div class="col-xl-12">
                                                    <div class="row">
                                                        <div class="col col-sm-6 col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-text">Balance Amount</span>
                                                                <input type="text" class="form-control" value="" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col col-sm-6 col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-text">&#8377;</span>
                                                                <input type="text" class="form-control" value="{{ $purDtl->decBalanceAmt }}" style="text-align:right;" readonly />
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
            <!--ROW CLOSED-->
        </div>
    </div>
</div>
<!-- CONTAINER CLOSED -->
@endsection
@push('js')
@endpush