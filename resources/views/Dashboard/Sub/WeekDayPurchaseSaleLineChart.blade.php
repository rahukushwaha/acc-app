
<div class="col-xl-12 col-md-12 col-lg-12">
	<div class="card">
		<div class="card-body text-center">
			<div id="WeekDayPurchaseSaleLineChart"></div>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['line']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {//from  ww  w  . jav a2  s .c  om
	var data = new google.visualization.DataTable();
	data.addColumn('date', 'Days');
	data.addColumn('number', 'Purchase');
	data.addColumn('number', 'Sale');
	data.addRows([
	<?php foreach ($result as $key => $value) {?>
		[new Date(<?=$value->invoiceDate?>), <?=$value->totalPurchase;?>, <?=$value->totalSale;?>],
	<?php } ?>
	]);
	var options = {
		axes: {
		}
	};
	var chart = new google.charts.Line(document.getElementById('WeekDayPurchaseSaleLineChart'));
	chart.draw(data, options);
}
$(window).resize(function(){
	drawChart();
});

</script>