@extends('layout2.layout')
@push('css')
<style>
.txt-left-side {
    text-align: right;
}
.dataTables_processing {
    z-index: 200;
}
</style>
@endpush
@section('content')
<!--app-content open-->
<div class="app-content mt-0">
    <div class="side-app">
        <!-- CONTAINER -->
        <div class="main-container">
            <!-- PAGE-HEADER -->
            <div class="page-header"></div>
            <!-- PAGE-HEADER END -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sale List</h3>
                    <div class="card-options">
                        <a href="#" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body border-bottom">
                    <form>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dtFromDate" class="form-label">From Date</label>
                                    <input type="date" class="form-control" id="dtFromDate" name="dtFromDate" value="<?=date("Y-m-d");?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dtToDate" class="form-label">To Date</label>
                                    <input type="date" class="form-control" id="dtToDate" name="dtToDate" value="<?=date("Y-m-d");?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="vchPartyNameMobileNo" class="form-label">Party Name/Mobile No</label>
                                    <input type="text" class="form-control" id="vchPartyNameMobileNo" name="vchPartyNameMobileNo" placeholder="Party Name/Moile No">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="varInvoiceNo" class="form-label">Invoice No</label>
                                    <input type="text" class="form-control" id="varInvoiceNo" name="varInvoiceNo" placeholder="Invoice No">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="varProductSerialNo" class="form-label">Product Serial No</label>
                                    <input type="text" class="form-control" id="varProductSerialNo" name="varProductSerialNo" placeholder="Product Serial No">
                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-2" style="text-align: right;">
                                <div class="form-group">
                                        <label for="btn-Search" class="form-label">&nbsp;</label>
                                        <button type="button" class="btn btn-primary btn-block mb-0" id="btn-Search">Search</button>
                                    </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="table-responsive">
                        <table class="table text-nowrap text-md-nowrap table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Invoice Date</th>
                                    <th>Invoice No.</th>
                                    <th>Name</th>
                                    <th>Mobile No.</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTAINER CLOSED -->
@endsection
@push('js')
<script>
$(document).ready(function () {
    loadDatatable();
});
$('#btn-Search').click(function () {
    loadDatatable();
});
function loadDatatable() {
    var dataTable = $('#myTable').dataTable( {
        "ajax": {
            url: "{{ route('PostSalesInvoiceListDatatable') }}",
            "type": "POST",
            "data": function (payload) {
                // Add any additional data you need to send to the server
                payload.dtFromDate = $("#dtFromDate").val(),
                payload.dtToDate = $("#dtToDate").val()
                payload.vchPartyNameMobileNo = $("#vchPartyNameMobileNo").val(),
                payload.varInvoiceNo = $("#varInvoiceNo").val(),
                payload.varProductSerialNo = $("#varProductSerialNo").val()
            },
        },
        processing: true,
        serverSide: true,
        responsive: true,
        searching: false,
        ordering: false,
        destroy: true,
        displayStart: 0,
        lengthChange: true,
        autoWidth: false,
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        dom: 'lBfrtip',
        buttons: [
        ],
        'columns': [
            { data: 'sno' },
            { data: 'dtInvoiceDate' },
            { data: 'varInvoiceNo' },
            { data: 'varPartyName' },
            { data: 'varMobileNo' },
            { data: 'decTotalAmt' },
            { data: 'actions' },
        ],
    });
}
</script>
@endpush