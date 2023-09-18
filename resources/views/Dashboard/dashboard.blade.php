@extends('layout2.layout')
@push('css')
@endpush
@section('content')
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- PAGE-HEADER -->
            <div class="page-header">
            </div>
            <!-- PAGE-HEADER END -->
            <!-- ROW-1 OPEN -->
            <div class="row" id="getDashboardSubCalcProfitForCardView">
                
            </div>
            <div class="row" id="getDashboardSubWeekDayPurchaseSaleLineChart">
            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
@push('js')
<script>
function DashboardSubCalcProfitForCardView() {
    try{
        $.ajax({
            type:"GET",
            url: '{{ route("getDashboardSubCalcProfitForCardView") }}',
            dataType: "html",
            beforeSend: function() {
                var loader = '<div class="card"><div class="card-body text-center"><div class="lds-hourglass"></div></div></div>';
                $("#getDashboardSubCalcProfitForCardView").html(loader);
            },
            success:function(data){
                $("#getDashboardSubCalcProfitForCardView").html(data);
                //$("#btn-supplier-dtl-submit").LoadingOverlay("hide", true);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                //$("#btn-supplier-dtl-submit").LoadingOverlay("hide", true);
            }
        });
    }catch (err) {
        alert(err.message);
    }
}
function DashboardSubWeekDayPurchaseSaleLineChart() {
    try{
        $.ajax({
            type:"GET",
            url: '{{ route("getDashboardSubWeekDayPurchaseSaleLineChart") }}',
            dataType: "html",
            beforeSend: function() {
                var loader = '<div class="card"><div class="card-body text-center"><div class="lds-hourglass"></div></div></div>';
                $("#getDashboardSubWeekDayPurchaseSaleLineChart").html(loader);
            },
            success:function(data){
                $("#getDashboardSubWeekDayPurchaseSaleLineChart").html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
            }
        });
    }catch (err) {
        alert(err.message);
    }
}
$(document).ready(function () {
    DashboardSubCalcProfitForCardView();
    DashboardSubWeekDayPurchaseSaleLineChart();
});
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@endpush