@extends('layout2.layout')
@push('css')
<style>
.txt-left-side {
    text-align: right;
}
.error-jquery-validation {
    display: block;
    color: red;
    margin-top: 5px;
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
                        <form id="form-invoice" enctype="multipart/form-data">
                            <div class="card-header border-bottom">
                                <h4 class="mb-0">Invoice</h4>
                                <div class="card-options">
                                    <button type="submit" class="btn btn-outline-info">
                                        <i class="fe fe-file-minus"></i>
                                        Save & Generate
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0 invoice-create-main">
                                <div class="row p-2 border-bottom border-info">
                                    <div class="col-xl-12">
                                        <div class="row">
                                            <div class="col-xl-7 col-md-7 col-sm-12 border-x border-info">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <div class="card bg-primary text-white">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Bill From:</h3>
                                                                <div class="card-options" id="card-options-remove-supplier-dtl" style="display: none;">
                                                                    <a href="#"><i class="fe fe-x"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="card-body" style="padding-top: 5px; padding-bottom: 5px; padding-bottom: 5px; display: none;" id="supplierDtlHideShow">
                                                                <label class="fs-20" style="margin-bottom: 0rem">Name</label><br />
                                                                <label class="fs-12" style="margin-bottom: 0rem">address:</label><br />
                                                                <label class="fs-12" style="margin-bottom: 0rem">Phone No.:</label><br />
                                                                <label class="fs-12" style="margin-bottom: 0rem">GSTIN:</label><br />
                                                                <div class="row">
                                                                    <div class="col-md-12" style="text-align: right;">
                                                                        <label class="fs-12" style="margin-bottom: 0rem">Place Of Supply: <b>Jharkhand</b></label><br />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-body modal-effect" data-bs-effect="effect-slide-in-right" data-bs-toggle="modal" href="#modalShowSearchAddNewSupplier" style="cursor: pointer;" id="supplierAddOptionlHideShow">
                                                                <div class="d-flex">
                                                                    <p class="mb-0 number-font"> <i class="fa fa-plus"></i> Add Supplier</p>
                                                                    <div class="ms-auto"> <i class="fa fa-send-o fs-30 me-2 mt-2"></i> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" id="supplier_dtls_id" name="supplier_dtls_id" value="" />
                                                        <input type="text" class="form-control" id="supplier_intSupplyPlaceStateMstrsId" name="supplier_intSupplyPlaceStateMstrsId" value="" />
                                                        <input type="text" class="form-control" id="owner_intSupplyPlaceStateMstrsId" name="owner_intSupplyPlaceStateMstrsId" value="10" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-md-5 col-sm-12 border-y border-info">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="dtInvoiceDate">Purchase Invoice Date <span class="required">*</span></label>
                                                            <input type="date" class="form-control" id="dtInvoiceDate" name="dtInvoiceDate" placeholder="Purchase Invoice Date"  value="<?=Date("Y-m-d")?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="intPaymentTerms">Payment Terms <span class="required">*</span></label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Days</span>
                                                                <input type="text" class="form-control" id="intPaymentTerms" name="intPaymentTerms" value="0" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="dtDueDate">Due Date <span class="required">*</span></label>
                                                            <input type="date" class="form-control" id="dtDueDate" name="dtDueDate" placeholder="Due Date" value="<?=Date("Y-m-d")?>" required>
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
                                                    <table class="table text-nowrap text-md-nowrap table-bordered" id="myTable">
                                                        <thead>
                                                            <tr>
                                                                <th>ITEM GROUP&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                                                <th>ITEM&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                                                <th>SAC&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                                                <th>QTY&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                                                <th>PRICE/ITEM&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                                                <th>DISCOUNT&nbsp&nbsp&nbsp&nbsp</th>
                                                                <th>TAX&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                                                <th>AMOUNT&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                                                <th>
                                                                    <a href="javascript:void(0)" role="button" class="text-primary text-center add-invoice-item-btn mt-2" onclick="itemAppendFun();">
                                                                        <i class="fa fa-cart-plus fs-20"></i>
                                                                        Add
                                                                    </a>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="itemTBody">
                                                            <tr>
                                                                <td>
                                                                    <div wid>
                                                                        <select class="form-select" id="intItemMstrsId1" name="intItemMstrsId[]" onchange="ItemMstrChangeFun(this.id)">
                                                                            <option value="">select</option>
                                                                            {!! app('App\Http\Controllers\Common\CommonController')->showItemList() !!}
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <select class="select2 form-select select2-dropdown" id="intSubItemMstrsId1" name="intSubItemMstrsId[]" data-placeholder="SELECT" style="width:100%">
                                                                        <option value="">select item</option>
                                                                    </select>
                                                                    <textarea class="form-control varProductSerialNo" id="varProductSerialNo1" name="varProductSerialNo[]" placeholder="Product Serial No."></textarea>
                                                                </td>
                                                                <td style="width: 150px;">
                                                                    <input type="text" class="form-control varSAC" id="varSAC1" name="varSAC[]" placeholder="SAC" />
                                                                </td>
                                                                <td style="width: 120px;">
                                                                    <input type="text" class="form-control intQty" id="intQty1" name="intQty[]" placeholder="QTR" onkeyup="itemDtlCalc(1, 'intQty')" onkeypress="return isNum(event);"  maxlength="2" />
                                                                </td>
                                                                <td style="width: 150px;">
                                                                    <input type="text" class="form-control decSalesPrice" id="decSalesPrice1" name="decSalesPrice[]" placeholder="&#8377;" onkeyup="itemDtlCalc(1, 'decSalesPrice')" onkeypress="return isNumDot(event);"  maxlength="9"/>
                                                                </td>
                                                                <td style="width: 80px;">
                                                                    <input type="text" class="form-control decDiscountPer" id="decDiscountPer1" name="decDiscountPer[]" placeholder="%" onkeyup="itemDtlCalc(1, 'decDiscountPer')" onkeypress="return isNumDot(event);"  maxlength="5" />
                                                                    <input type="text" class="form-control decDiscountAmt" id="decDiscountAmt1" name="decDiscountAmt[]" placeholder="&#8377;" onkeyup="itemDtlCalc(1, 'decDiscountAmt')" onkeypress="return isNumDot(event);"  maxlength="5" />
                                                                </td>
                                                                <td style="width: 150px;">
                                                                    <input type="text" class="form-control decTaxAmt" id="decTaxAmt1" name="decTaxAmt[]" placeholder="&#8377;" readonly />
                                                                    <select class="form-select intGstPer" id="intGstPer1" name="intGstPer[]" onchange="itemDtlCalc(1, 'intGstPer')">
                                                                        <option value="0">0%</option>
                                                                        <option value="5">5%</option>
                                                                        <option value="12">12%</option>
                                                                        <option value="18">18%</option>
                                                                        <option value="28">28%</option>
                                                                    </select>
                                                                </td>
                                                                <td style="width: 150px;">
                                                                    <input type="text" class="form-control decAmount" id="decAmount1" name="decAmount[]" placeholder="&#8377;" readonly />
                                                                </td>
                                                                <th>
                                                                    <a href="javascript:void(0)" role="button" class="text-primary text-center add-invoice-item-btn mt-2">
                                                                        <i class="fa fa-recycle fs-30" onclick="removeSubItemDtlFun(1)"></i>
                                                                    </a>
                                                                </th>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="5" style="text-align: right;">SUBTOTAL</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="decTotalSubDiscount" name="decTotalSubDiscount" value="0" onkeypress="return isNumDot(event);" readonly />
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="decTotalSubTax" name="decTotalSubTax" value="0" onkeypress="return isNumDot(event);" readonly />
                                                                </td>
                                                                <td colspan="2">
                                                                    <input type="text" class="form-control" id="decSubTotalAmt" name="decSubTotalAmt" value="0" onkeypress="return isNumDot(event);" readonly />
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
                                                                <textarea class="form-control" id="varNotes" name="varNotes"></textarea>
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
                                                                <textarea class="form-control" id="varTermsNCondition" name="varTermsNCondition"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row border-bottom border-info" style="padding-bottom: 0.2rem!important;">
                                                    <div class="col-sm-12 col-md-12 col-xl-12">
                                                        <!-- <div class="row">
                                                            <div class="col-sm-12 col-md-12">
                                                                Upload Invoice Receipt
                                                            </div>
                                                        </div> -->
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="varBillReceiptNo">Bill Receipt No. {{ uniqid() }}</label>
                                                                    <input type="text" class="form-control" id="varBillReceiptNo" name="varBillReceiptNo" placeholder="Bill Receipt No." />
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="varBillRecceiptFilePath">Upload Bill Receipt</label>
                                                                    <div class="input-group mb-5 file-browser">
                                                                        <input type="text" class="form-control browse-file" placeholder="Choose" readonly>
                                                                        <label class="input-group-text btn btn-primary">
                                                                            Browse <input type="file" class="file-browserinput" id="varBillRecceiptFilePath" name="varBillRecceiptFilePath" style="display: none;">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-md-5 col-sm-12 border-x border-info">
                                                <div class="row border-bottom border-info" style="padding-bottom: 0.2rem!important;">
                                                    <div class="col-sm-12 col-md-12 col-xl-12">
                                                        <div class="row decTaxableAmtHideShow" style="display: none;">
                                                            <div class="col col-sm-6 col-md-6">
                                                                <input type="text" class="form-control" value="Taxable Amount" readonly />
                                                            </div>
                                                            <div class="col col-sm-6 col-md-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">&#8377;</span>
                                                                    <input type="text" class="form-control" id="decTaxableAmt" name="decTaxableAmt" value="0.00" style="text-align:right;" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row decIGSTAmtHideShow" style="margin-top: 2px; display: none;">
                                                            <div class="col col-sm-6 col-md-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">IGST @</span>
                                                                    <input type="text" class="form-control" id="intIGSTPer" name="intIGSTPer" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col col-sm-6 col-md-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">&#8377;</span>
                                                                    <input type="text" class="form-control" id="decIGSTAmt" name="decIGSTAmt" value="0.00" style="text-align:right;" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row decSGSTAmtHideShow" style="margin-top: 2px; display: none;">
                                                            <div class="col col-sm-6 col-md-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">SGST @</span>
                                                                    <input type="text" class="form-control" id="intSGSTPer" name="intSGSTPer" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col col-sm-6 col-md-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">&#8377;</span>
                                                                    <input type="text" class="form-control" id="decSGSTAmt" name="decSGSTAmt" value="0.00" style="text-align:right;" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row decCGSTAmtShowHide" style="margin-top: 2px; display: none;">
                                                            <div class="col col-sm-6 col-md-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">CGST @</span>
                                                                    <input type="text" class="form-control" id="intCGSTPer" name="intCGSTPer" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col col-sm-6 col-md-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">&#8377;</span>
                                                                    <input type="text" class="form-control" id="decCGSTAmt" name="decCGSTAmt" value="0.00" style="text-align:right;" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
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
                                                                    <input type="text" class="form-control" id="decAdditionalChargesAmt" name="decAdditionalChargesAmt" placeholder="0.00" value="0.00" style="text-align:right;" onkeyup="finalItemDtlCalc('decAdditionalChargesAmt');" onkeypress="return isNumDot(event);" />
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
                                                                    <input type="text" class="form-control" id="decExtraDiscountAmt" name="decExtraDiscountAmt" placeholder="0.00" value="0.00" style="text-align:right;" onkeyup="finalItemDtlCalc('decAdditionalChargesAmt');" onkeypress="return isNumDot(event);" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row border-bottom border-info" style="padding-bottom: 0.2rem!important; padding-top: 0.2rem!important;">
                                                    <div class="col-sm-12 col-md-12 col-xl-12">
                                                        <div class="row">
                                                            <div class="col col-sm-6 col-md-6">
                                                                <label class="custom-switch">
                                                                    <input type="checkbox" class="custom-switch-input" id="intIsRoundOff" name="intIsRoundOff" onchange="finalItemDtlCalc('intIsRoundOff');" />
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span class="custom-switch-description">Auto Round Off</span>
                                                                </label>
                                                            </div>
                                                            <div class="col col-sm-6 col-md-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">&#8377;</span>
                                                                    <input type="text" class="form-control" id="decRoundOffAmt" name="decRoundOffAmt" value="0.00" style="text-align:right;" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                                    <input type="text" class="form-control" id="decTotalAmt" name="decTotalAmt" value="0.00" style="text-align:right;" readonly />
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
                                                                    <input type="text" class="form-control" id="decReceiveAmt" name="decReceiveAmt" placeholder="0.00" style="text-align:right;" onkeyup="finalItemDtlCalc('decReceiveAmt');" onkeypress="return isNumDot(event);" />
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
                                                                    <input type="text" class="form-control" id="decBalanceAmt" name="decBalanceAmt" value="0.00" style="text-align:right;" readonly />
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
                        </form>
                    </div>
                </div>
            </div>
            <!--ROW CLOSED-->
        </div>
    </div>
</div>
<!-- CONTAINER CLOSED -->
<!-- MODAL Show Search and Add New Party EFFECTS -->
<div class="modal fade"  id="modalShowSearchAddNewSupplier">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <select class="form-select" id="vchSearchPartyDtl" name="vchSearchPartyDtl" data-placeholder="Search Supplier" style="width:100%">
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-16 col-lg-16 col-xl-16" style="margin-top: 20px;" onclick="callAddNewSupplierModal();">
                        <div class="card bg-primary img-card box-primary-shadow modal-effect" data-bs-effect="effect-slide-in-right" data-bs-toggle="modal" href="#modalAddNewSupplier" style="cursor: pointer;">
                            <div class="card-body" style="padding: 5px;">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <p class="mb-0 number-font"> <i class="fa fa-plus"></i> Create Supplier</p>
                                    </div>
                                    <div class="ms-auto"> <i class="fa fa-send-o text-white fs-30 me-2 mt-2"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL Add New Party EFFECTS -->
<div class="modal fade"  id="modalAddNewSupplier">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Create New Supplier</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form-supplier-dtl">
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label class="form-label">Supplier Name <span class="required">*</span></label>
                            <input type="text" class="form-control" id="varSupplierName" name="varSupplierName" placeholder="Supplier Name">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Mobile No <span class="required">*</span></label>
                            <input type="text" class="form-control" id="varMobileNo" name="varMobileNo" placeholder="Mobile No" maxlength="10">
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
                                {!! app('App\Http\Controllers\Common\CommonController')->showStateList(10) !!}
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">GSTIN</label>
                            <input type="text" class="form-control" id="varGstin" name="varGstin" placeholder="GSTIN">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary" id="btn-supplier-dtl-submit">Save & Change</button>
                        </div>
                    </div>
                    
                </form>
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
function callAddNewSupplierModal() {
    $("#modalShowSearchAddNewSupplier").modal("hide");
    $("#modalAddNewSupplier").modal("show");
}
function ItemMstrChangeFun(ID) {
    var ID = ID.split("intItemMstrsId")[1];
    $.ajax({
        url: '{{ route("Master.SubItem.getSubItemByItemId") }}',
        type: 'POST',
        dataType: 'json',
        data: { item_mstrs_id: $('#intItemMstrsId'+ID).val() }, // Send the selected value as a parameter
        beforeSend: function() {
            $("#intItemMstrsId"+ID).LoadingOverlay("show", {
                background  : "rgb(134, 168, 192, 0.5)"
            });
        },
        success: function (data) {
            $('#intSubItemMstrsId'+ID).empty(); // Clear the existing options in the second dropdown
            $.each(data.data, function (key, value) {
                $('#intSubItemMstrsId'+ID).append(new Option(value.varSubItem, value.id, false, false));
            });
            $('#intSubItemMstrsId'+ID).prop('disabled', false).trigger('change'); // Enable the second dropdown and trigger a change event
            $("#intItemMstrsId"+ID).LoadingOverlay("hide", true);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $("#intItemMstrsId"+ID).LoadingOverlay("hide", true);
        }
    });
}
$(document).ready(function () {
    $('#vchSearchPartyDtl').select2({
        ajax: {
            url: '{{ route("Supplier.Supplier.GetSupplierDtlWithNameNo") }}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.id,
                            text: item.varSupplierName + " ("+item.varMobileNo+")" // Adjust the property name as needed
                        }
                    })
                };
            },
            cache: true
        },
        placeholder: 'Search for a supplier name/mobile',
        minimumInputLength: 2
    });
    $('#vchSearchPartyDtl').on('change', function (e) {
        var supplier_dtls_id = $(this).val();
        try{
            $.ajax({
                type:"POST",
                url: '{{ route("Supplier.Supplier.getSupplierDtlForInvoiceById") }}',
                dataType: "json",
                data: {supplier_dtls_id:supplier_dtls_id},
                beforeSend: function() {
                    $("#vchSearchPartyDtl").LoadingOverlay("show", {
                        background  : "rgb(134, 168, 192, 0.5)"
                    });
                },
                success:function(data){
                    if(data.status==200){
                        $("#supplier_dtls_id").val(data.supplier_dtls_id);
                        $("#supplier_intSupplyPlaceStateMstrsId").val(data.supplier_intSupplyPlaceStateMstrsId);
                        $("#supplierDtlHideShow").html(data.html);
                        $("#supplierDtlHideShow").show();
                        $("#supplierAddOptionlHideShow").hide();
                        $("#modalShowSearchAddNewSupplier").modal("hide");
                        $("#card-options-remove-supplier-dtl").show();
                        finalItemDtlCalc("Others");
                    }
                    $("#vchSearchPartyDtl").LoadingOverlay("hide", true);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $("#vchSearchPartyDtl").LoadingOverlay("hide", true);
                }
            });
        }catch (err) {
            alert(err.message);
        }
    });
    $("#card-options-remove-supplier-dtl").click(function(){
        $("#supplier_dtls_id").val("");
        $("#supplier_intSupplyPlaceStateMstrsId").val("");
        $("#supplierAddOptionlHideShow").show();
        $("#supplierDtlHideShow").hide();
        $("#card-options-remove-supplier-dtl").hide();
        finalItemDtlCalc("others");
    });
    //$("#modalAddNewSupplier").modal("show");
    //$(".card-header > .card-options > .card-options-remove").hide();
    //infoNotify("asdsad");
});
var itemAppendCount = 1;
function itemAppendFun() {
    itemAppendCount++;
    var intQtySingleQuote = "'intQty'";
    var decSalesPriceSingleQuote = "'decSalesPrice'";
    var decDiscountPerSingleQuote = "'decDiscountPer'";
    var decDiscountAmtSingleQuote = "'decDiscountAmt'";
    var intGstPerSingleQuote = "'intGstPer'";

    var itemTBodyAppend = '<tr id="myTable-row-'+itemAppendCount+'">';
    itemTBodyAppend += '<td>';
    itemTBodyAppend += '<select class="form-select" id="intItemMstrsId'+itemAppendCount+'" name="intItemMstrsId[]" style="width:110%" onchange="ItemMstrChangeFun(this.id)">';
    itemTBodyAppend += '<option value="">select</option>';
    itemTBodyAppend += "{!! app('App\Http\Controllers\Common\CommonController')->showItemList() !!}";
    itemTBodyAppend += '</select>';
    itemTBodyAppend += '</td>';
    itemTBodyAppend += '<td style="width: 200px;">';
    itemTBodyAppend += '<select class="select2 form-select select2-dropdown" id="intSubItemMstrsId'+itemAppendCount+'" name="intSubItemMstrsId[]" data-placeholder="SELECT" style="width:100%">';
    itemTBodyAppend += '<option>select item</option>';
    itemTBodyAppend += '</select>';
    itemTBodyAppend += '<textarea class="form-control varProductSerialNo" id="varProductSerialNo'+itemAppendCount+'" name="varProductSerialNo[]" placeholder="Product Serial No."></textarea>';
    itemTBodyAppend += '</td>';
    itemTBodyAppend += '<td style="width: 150px;">';
    itemTBodyAppend += '<input type="text" class="form-control varSAC" id="varSAC'+itemAppendCount+'" name="varSAC[]" placeholder="SAC" />';
    itemTBodyAppend += '</td>';
    itemTBodyAppend += '<td style="width: 100px;">';
    itemTBodyAppend += '<input type="text" class="form-control intQty" id="intQty'+itemAppendCount+'" name="intQty[]" placeholder="QTR" onkeyup="itemDtlCalc('+itemAppendCount+', '+intQtySingleQuote+')" onkeypress="return isNum(event);"  maxlength="2" />';
    itemTBodyAppend += '</td>';
    itemTBodyAppend += '<td style="width: 150px;">';
    itemTBodyAppend += '<input type="text" class="form-control decSalesPrice" id="decSalesPrice'+itemAppendCount+'" name="decSalesPrice[]" placeholder="&#8377;" onkeyup="itemDtlCalc('+itemAppendCount+', '+decSalesPriceSingleQuote+')" onkeypress="return isNumDot(event);"  maxlength="9" />';
    itemTBodyAppend += '</td>';
    itemTBodyAppend += '<td style="width: 80px;">';
    itemTBodyAppend += '<input type="text" class="form-control decDiscountPer" id="decDiscountPer'+itemAppendCount+'" name="decDiscountPer[]" placeholder="%" onkeyup="itemDtlCalc('+itemAppendCount+', '+decDiscountPerSingleQuote+')" onkeypress="return isNumDot(event);"  maxlength="5" />';
    itemTBodyAppend += '<input type="text" class="form-control decDiscountAmt" id="decDiscountAmt'+itemAppendCount+'" name="decDiscountAmt[]" placeholder="&#8377;" onkeyup="itemDtlCalc('+itemAppendCount+', '+decDiscountAmtSingleQuote+')" onkeypress="return isNumDot(event);"  maxlength="5" />';
    itemTBodyAppend += '</td>';
    itemTBodyAppend += '<td style="width: 150px;">';
    itemTBodyAppend += '<input type="text" class="form-control decTaxAmt" id="decTaxAmt'+itemAppendCount+'" name="decTaxAmt[]" placeholder="&#8377;" readonly />';
    itemTBodyAppend += '<select class="form-select intGstPer" id="intGstPer'+itemAppendCount+'" name="intGstPer[]" onchange="itemDtlCalc('+itemAppendCount+', '+intGstPerSingleQuote+')">';
    itemTBodyAppend += '<option value="0">0%</option>';
    itemTBodyAppend += '<option value="5">5%</option>';
    itemTBodyAppend += '<option value="12">12%</option>';
    itemTBodyAppend += '<option value="18">18%</option>';
    itemTBodyAppend += '<option value="28">28%</option>';
    itemTBodyAppend += '</select>';
    itemTBodyAppend += '</td>';
    itemTBodyAppend += '<td style="width: 150px;">';
    itemTBodyAppend += '<input type="text" class="form-control decAmount" id="decAmount'+itemAppendCount+'" name="decAmount[]" placeholder="&#8377;" readonly />';
    itemTBodyAppend += '</td>';
    itemTBodyAppend += '<th>';
    itemTBodyAppend += '<a href="javascript:void(0)" role="button" class="text-primary text-center add-invoice-item-btn mt-2 ">';
    itemTBodyAppend += '<i class="fa fa-recycle fs-30" onclick="removeSubItemDtlFun('+itemAppendCount+')"></i>';
    itemTBodyAppend += '</a>';
    itemTBodyAppend += '</th>';
    itemTBodyAppend += '</tr>';
    $("#itemTBody").append(itemTBodyAppend);
    $('.select2-dropdown').last().select2();
}
function removeSubItemDtlFun(rowRemoveId) {
    $('#myTable-row-'+rowRemoveId).remove();
    finalItemDtlCalc("others");
}

function itemDtlCalc(id, keyName) {
    var intQty = $("#intQty"+id).val();
    if (intQty=="") intQty = 0;

    var decSalesPrice = $("#decSalesPrice"+id).val();
    if (decSalesPrice=="") decSalesPrice = 0;

    var decDiscountPer = $("#decDiscountPer"+id).val();
    if (decDiscountPer=="") decDiscountPer = 0;

    var decDiscountAmt = $("#decDiscountAmt"+id).val();
    if (decDiscountAmt=="") decDiscountAmt = 0;

    var intGstPer = $("#intGstPer"+id).val();
    //if (decTaxAmt=="") decTaxAmt = 0;

    var intGstPer = $("#intGstPer"+id).val();
    if (intGstPer=="") intGstPer = 0;

    var decAmountTemp = 0;
    var decAmount = 0;

    decAmountTemp = intQty*decSalesPrice;

    var decTaxAmt = 0;
    $("#decTaxAmt"+id).val("");
    if (intGstPer > 0) {
        decTaxAmt = parseFloat((decAmountTemp * intGstPer) / 100);
        $("#decTaxAmt"+id).val(decTaxAmt.toFixed(2));
    }
    //decAmountTemp = parseFloat(decAmountTemp+decTaxAmt);

    /* start discount calc*/
    var descDiscountPerTemp = 0;
    var descDiscountAmtTemp = 0;
    if (decDiscountAmt > 0 && decAmountTemp > 0 && keyName=="decDiscountAmt") {
        descDiscountAmtTemp = decDiscountAmt;
        descDiscountPerTemp = parseFloat((decDiscountAmt / decAmountTemp) * 100);
        $("#decDiscountPer"+id).val(descDiscountPerTemp.toFixed(2));
    } 
    if (decDiscountAmt == "" && keyName=="decDiscountAmt") {
        $("#decDiscountPer"+id).val("");
    }
    if (decDiscountPer > 0 && decAmountTemp > 0 && keyName=="decDiscountPer") {
        decDiscountAmt = parseFloat(decAmountTemp * decDiscountPer / 100);
        if (decDiscountPer > 90) {
            $("#decDiscountPer"+id).val("");
            decDiscountPer = 0;
            decDiscountAmt = 0;
            //$("#decDiscountAmt"+id).val("");
        }
        $("#decDiscountAmt"+id).val(decDiscountAmt.toFixed(2));
    }
    if (decDiscountPer == "" && keyName=="decDiscountPer") {
        $("#decDiscountAmt"+id).val("");
    }
    /* end discount calc*/
    decAmountTemp = parseFloat(decAmountTemp + decTaxAmt);
    decAmount = parseFloat(decAmountTemp - decDiscountAmt);
    $("#decAmount"+id).val(decAmount.toFixed(2));
    
    finalItemDtlCalc(keyName);
}
function finalItemDtlCalc(keyName) {
    var decSubTotalAmt = parseFloat($("#decSubTotalAmt").val());
    if ($("#decAdditionalChargesAmt").val()=="") {
        $("#decAdditionalChargesAmt").val(0.00);
    }
    var decAdditionalChargesAmt = parseFloat($("#decAdditionalChargesAmt").val());
    if (decAdditionalChargesAmt == "") {
        decAdditionalChargesAmt = 0;
    }
    if ($("#decExtraDiscountAmt").val()=="") {
        $("#decExtraDiscountAmt").val(0.00);
    }
    var decExtraDiscountAmt = parseFloat($("#decExtraDiscountAmt").val());
    if (decExtraDiscountAmt == "") {
        decExtraDiscountAmt = 0;
    }
    //var decTotalAmt = $("#decTotalAmt").val();
    var decReceiveAmt = $("#decReceiveAmt").val();

    /* start sub total culculation */
    var decTotalSubDiscount = 0;
    var decTotalSubTax = 0;
    var decSubTotalAmt = 0;
    $(".intQty").each(function() {
        var ID = this.id.split("intQty")[1];
        var decDiscountAmtTemp = $("#decDiscountAmt"+ID).val();
        var decTaxAmtTemp = $("#decTaxAmt"+ID).val();
        var decAmountTemp = $("#decAmount"+ID).val();

        var decDiscountAmt = 0;
        var decTaxAmt = 0;
        var decAmount = 0;

        if (decDiscountAmtTemp != "") 
            decDiscountAmt = parseFloat(decDiscountAmtTemp);
        if (decTaxAmtTemp != "") 
            decTaxAmt = parseFloat(decTaxAmtTemp);
        if (decAmountTemp != "") 
            decAmount = parseFloat(decAmountTemp);

        decTotalSubDiscount = parseFloat(decTotalSubDiscount+decDiscountAmt);
        decTotalSubTax = parseFloat(decTotalSubTax+decTaxAmt);
        decSubTotalAmt = parseFloat(decSubTotalAmt+decAmount);
    });
    $("#decTotalSubDiscount").val(decTotalSubDiscount.toFixed(2));
    $("#decTotalSubTax").val(decTotalSubTax.toFixed(2));
    $("#decSubTotalAmt").val(decSubTotalAmt.toFixed(2));
    /* end sub total culculation */
    /* start taxable total amount culculation */
    var totalTaxableAmt = 0;
    var totalDecTaxAmt = 0;
    var totalIntGstPer = 0;
    var totalCountOfPerImposed = 0;
    $(".decSalesPrice").each(function() {
        var ID = this.id.split("decSalesPrice")[1];
        var intQty = parseFloat($("#intQty"+ID).val());
        var decSalesPrice = parseFloat($("#decSalesPrice"+ID).val());
        var decTaxAmt = parseFloat($("#decTaxAmt"+ID).val());
        var intGstPer = parseFloat($("#intGstPer"+ID).val());
        
        if (intGstPer > 0) {
            totalCountOfPerImposed++;
            totalTaxableAmt = parseFloat(totalTaxableAmt + (decSalesPrice * intQty));
            totalDecTaxAmt = parseFloat(totalDecTaxAmt + decTaxAmt);
            totalIntGstPer = parseFloat(totalIntGstPer + intGstPer);
        }
    });
    /* end taxable total amount culculation */
    if (totalIntGstPer > 0) {
        var supplier_intSupplyPlaceStateMstrsId = $("#supplier_intSupplyPlaceStateMstrsId").val();
        var owner_intSupplyPlaceStateMstrsId = $("#owner_intSupplyPlaceStateMstrsId").val();
        $(".decTaxableAmtHideShow").show();
        if (supplier_intSupplyPlaceStateMstrsId == owner_intSupplyPlaceStateMstrsId) {
            $(".decIGSTAmtHideShow").hide();
            $(".decSGSTAmtHideShow").show();
            $(".decCGSTAmtShowHide").show();
        } else {
            $(".decIGSTAmtHideShow").show();
            $(".decSGSTAmtHideShow").hide();
            $(".decCGSTAmtShowHide").hide();    
        }
        
        

        $("#decTaxableAmt").val(totalTaxableAmt.toFixed(2));

        var intIGSTPer = parseFloat(totalIntGstPer/totalCountOfPerImposed);
        var intCGSTPer = parseFloat((totalIntGstPer/totalCountOfPerImposed)/2);
        var intSGSTPer = parseFloat((totalIntGstPer/totalCountOfPerImposed)/2);
        var decIGSTAmt = parseFloat(totalDecTaxAmt);
        var decSGSTAmt = parseFloat(totalDecTaxAmt/2);
        var decCGSTAmt = parseFloat(totalDecTaxAmt/2);

        $("#intIGSTPer").val(intIGSTPer.toFixed(2));
        $("#intCGSTPer").val(intCGSTPer.toFixed(2));
        $("#intSGSTPer").val(intSGSTPer.toFixed(2));
        $("#decIGSTAmt").val(decIGSTAmt.toFixed(2));
        $("#decSGSTAmt").val(decSGSTAmt.toFixed(2));
        $("#decCGSTAmt").val(decCGSTAmt.toFixed(2));
    } else {
        $(".decTaxableAmtHideShow").hide();
        $(".decIGSTAmtHideShow").hide();
        $(".decSGSTAmtHideShow").hide();
        $(".decCGSTAmtShowHide").hide();

        $("#decTaxableAmt").val(0.00);
        $("#intIGSTPer").val(0.00);
        $("#intCGSTPer").val(0.00);
        $("#intSGSTPer").val(0.00);
        $("#decIGSTAmt").val(0.00);
        $("#decSGSTAmt").val(0.00);
        $("#decCGSTAmt").val(0.00);
    }

    var decTotalAmt = parseFloat(decSubTotalAmt+(decAdditionalChargesAmt-decExtraDiscountAmt));
    

    var intIsRoundOffIsChecked = 0;
    if($("#intIsRoundOff").prop('checked') == true){
        intIsRoundOffIsChecked = 1;
    }
    $("#decRoundOffAmt").val(0.00);
    var decTotalAmtRoundOf = 0;
    if (intIsRoundOffIsChecked == 1) {
        decTotalAmtRoundOf = parseFloat(decTotalAmt);
        decTotalAmt = Math.round(decTotalAmt);
        decTotalAmtRoundOf = parseFloat(decTotalAmt-decTotalAmtRoundOf);
        $("#decRoundOffAmt").val(decTotalAmtRoundOf.toFixed(2));
    }
    $("#decTotalAmt").val(decTotalAmt.toFixed(2));
    var decReceiveAmt = $("#decReceiveAmt").val();
    if (decReceiveAmt == ""){ decReceiveAmt = 0; }
    var decBalanceAmt = parseFloat(decTotalAmt - decReceiveAmt);
    $("#decBalanceAmt").val(decBalanceAmt.toFixed(2));
}
function addFormSupplierDtl() {
    var formValues= $("#form-supplier-dtl").serialize();
    try{
        $.ajax({
            type:"POST",
            url: '{{ route("Supplier.Supplier.PostAdd") }}',
            dataType: "json",
            data: formValues,
            beforeSend: function() {
                $("#btn-supplier-dtl-submit").LoadingOverlay("show", {
                    background  : "rgb(134, 168, 192, 0.5)"
                });
            },
            success:function(data){
                if(data.status==200){
                    $("#supplier_dtls_id").val(data.supplier_dtls_id);
                    $("#supplier_intSupplyPlaceStateMstrsId").val(data.supplier_intSupplyPlaceStateMstrsId);
                    $("#supplierDtlHideShow").html(data.html);
                    $("#supplierDtlHideShow").show();
                    $("#supplierAddOptionlHideShow").hide();
                    infoNotify(data.msg);
                    $("#modalAddNewSupplier").modal("hide");
                    //$(".card-header > .card-options > .card-options-remove").shpw();
                    $("#card-options-remove-supplier-dtl").show();
                    finalItemDtlCalc("Others");
                }
                $("#btn-supplier-dtl-submit").LoadingOverlay("hide", true);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $("#btn-supplier-dtl-submit").LoadingOverlay("hide", true);
            }
        });
    }catch (err) {
        alert(err.message);
    }
}
$(document).ready(function () {
    jQuery.validator.addMethod("dateFormatYYYMMDD", function(value, element) {
        return this.optional(element) || /^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))+$/i.test(value);
    }, "Invalid format (YYYY-MM-DD)"); 

    jQuery.validator.addMethod("alphaSpace", function(value, element) {
        return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
    }, "Letters only please (a-z, A-Z )");

    jQuery.validator.addMethod("alphaNumSlashHyphenCommaSpace", function(value, element) {
        return this.optional(element) || /^[0-9a-zA-Z\/\-, ]+$/i.test(value);
    }, "Letters only please (a-z, A-Z, 0-9, /)");

    jQuery.validator.addMethod("alphaNumSlashHyphen", function(value, element) {
        return this.optional(element) || /^[0-9a-zA-Z\/-]+$/i.test(value);
    }, "Letters only please (a-z, A-Z, 0-9, -)"); 

    jQuery.validator.addMethod("onlyNum", function(value, element) {
        return this.optional(element) || /^[1-9]\d*$/i.test(value);
    }, "Letters only please (0-9)"); 

    jQuery.validator.addMethod("amountFormat", function(value, element) {
        return this.optional(element) || /^\d+(\.\d{1,2})?$/i.test(value);
    }, "Letters only please (0-9) or (0.00-9.99)"); 

    jQuery.validator.addMethod('min_greater_zero', function (value, element) {
        return value > 0;
    }, "Please enter a value greater than 0");

    $('.select2').on('change', function() {
        $(this).valid();
    });
    $("#form-supplier-dtl").validate({
        errorClass: "error-jquery-validation",
        rules: {
            "varSupplierName": {
                required: true,
                alphaSpace: true,
            },
            "varMobileNo": {
                required: true,
                digits: true,
            },
            "intSupplyPlaceStateMstrsId": {
                required: true
            },
        },
        errorPlacement: function(label, element) {
            if (element.hasClass('select2')) {
                label.insertAfter(element.next('.select2-container')).addClass('mt-2 text-danger');
            } else {
                label.addClass('mt-2 text-danger');
                label.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            addFormSupplierDtl(form);
        },
    });
    $("#form-invoice").validate({
        errorClass: "error-jquery-validation",
        rules: {
            "dtInvoiceDate": {
                required: true,
                dateFormatYYYMMDD: true,
            },
            "intItemMstrsId[]": {
                required: true
            },
            "intSubItemMstrsId[]": {
                required: true
            },
            "varProductSerialNo[]": {
                alphaNumSlashHyphen: true
            },
            "intQty[]": {
                required: true,
                onlyNum: true,
                range: [1,50]
            },
            "decSalesPrice[]": {
                required: true,
                amountFormat: true,
            },
            "decDiscountPer[]": {
                amountFormat: true,
                min: 0,
                max: 99
            },
            "decDiscountAmt[]": {
                amountFormat: true
            },
            "varNotes": {
                alphaNumSlashHyphenCommaSpace: true
            },
            "varTermsNCondition": {
                alphaNumSlashHyphenCommaSpace: true
            },
            "decAdditionalChargesAmt": {
                amountFormat: true,
            },
            "decExtraDiscountAmt": {
                amountFormat: true,
            },
            "decReceiveAmt": {
                amountFormat: true,
            },
            "varBillRecceiptFilePath": {
                required: true,
                extension: "mp3|mpeg|mp4"
            },
        },
        messages: {
            varBillReceiptNo: {
                required: "Please enter your email address",
            },
        },
        errorPlacement: function(label, element) {
            if (element.hasClass('select2')) {
                label.insertAfter(element.next('.select2-container')).addClass('mt-2 text-danger');
            } else {
                label.addClass('mt-2 text-danger');
                label.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            if(otherValidation() == false) return false; 
            submitForm(form);
        },
    });
    function submitForm(formData) {
        try {
            var form = $('#form-invoice')[0]; // Use standard JavaScript object here
            var formData = new FormData(form);
            $.ajax({
                type: "POST",
                enctype: "multipart/form-data",
                url: "{{ route('PostPurchasesInvoiceSubmit') }}",
                dataType: "json",
                data: formData,
                processData: false,  // Don't process the data
                contentType: false,  // Don't set content type
                beforeSend: function() {
                    // You can add loading overlay or any other pre-send logic here
                    infoNotify("Please wait, invoice is generating !!!");
                    $("#form-invoice").LoadingOverlay("show", {
                        background  : "rgb(134, 168, 192, 0.5)"
                    });
                },
                success: function(data) {
                    if (data.status == 200) {
                        infoNotify(data.msg);
                        window.location.replace("/Purchases/Invoice/GetInvoiceDtlById/"+data.data.intPurchasesId);
                    } else if (data.status == 400) {
                        jQuery.each(data.data, function(index, itemData) {
                            infoNotify(itemData);
                            return false;
                        });
                    }
                    $("#form-invoice").LoadingOverlay("hide", true);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("ERROR: ", errorThrown);
                    $("#form-invoice").LoadingOverlay("hide", true);
                }
            });
        } catch (err) {
            console.log(err);
        }
    }
});
function otherValidation() {
    var proccess = true;

    var supplier_dtls_id = $("#supplier_dtls_id").val();
    var supplier_intSupplyPlaceStateMstrsId = $("#supplier_intSupplyPlaceStateMstrsId").val();
    if (supplier_dtls_id == "" && supplier_intSupplyPlaceStateMstrsId == "") {
        infoNotify("You are not select the party detail. !!!"); proccess = false;
    }
    var decBalanceAmt = $("#decBalanceAmt").val();
    if (decBalanceAmt !="" && decBalanceAmt < 0) {
        $("#decBalanceAmt").focus();
        infoNotify("You don't pay advance amount. !!!"); proccess = false;
    }
    if (proccess) {
        if (decBalanceAmt !="" && decBalanceAmt > 0) {
            var confirmMsg = "You want to submit this invoice with balance amount. !!!";
            if (!confirm(confirmMsg) == true) {
                proccess = false;
            }
        }
    }
    return proccess;
}
</script>
@endpush