<div class="col-xl-4 col-md-12 col-lg-6">
	<div class="card">
		<div class="card-body text-center">
			<h6 class=""><span class="text-primary"><i class="fe fe-file-text me-2 fs-20 text-primary-shadow"></i></span>Total Purchase</h6>
			<h3 class="text-dark counter mt-0 mb-3 number-font">&#8377;{{$totalPurchase}}</h3>
			<!-- <div class="progress h-1 mt-0 mb-2">
				<div class="progress-bar progress-bar-striped bg-primary w-70" role="progressbar"></div>
			</div> -->
			<div class="row mt-4">
				<div class="col text-center"> <span class="text-muted">Weekly</span>
					<h4 class="fw-normal mt-2 mb-0 number-font1">{{$totalPurchaseWeeklyQty}}</h4>
				</div>
				<div class="col text-center"> <span class="text-muted">Monthly</span>
					<h4 class="fw-normal mt-2 mb-0 number-font2">{{$totalPurchaseMonthlyQty}}</h4>
				</div>
				<div class="col text-center"> <span class="text-muted">Total</span>
					<h4 class="fw-normal mt-2 mb-0 number-font3">{{$totalPurchaseQty}}</h4>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-xl-4 col-md-12 col-lg-6">
	<div class="card">
		<div class="card-body text-center">
			<h6 class="">
				<span class="text-success">
					<i class="fa fa-cart-plus me-2 fs-20 text-success-shadow"></i>
				</span>
				Total Sale
			</h6>
			<h3 class="text-dark counter mt-0 mb-3 number-font">&#8377;{{$totalSale}}</h3>
			<!-- <div class="progress h-1 mt-0 mb-2">
				<div class="progress-bar progress-bar-striped bg-primary w-70" role="progressbar"></div>
			</div> -->
			<div class="row mt-4">
				<div class="col text-center"> <span class="text-muted">Weekly</span>
					<h4 class="fw-normal mt-2 mb-0 number-font1">{{$totalSaleWeeklyQty}}</h4>
				</div>
				<div class="col text-center"> <span class="text-muted">Monthly</span>
					<h4 class="fw-normal mt-2 mb-0 number-font2">{{$totalSaleMonthlyQty}}</h4>
				</div>
				<div class="col text-center"> <span class="text-muted">Total</span>
					<h4 class="fw-normal mt-2 mb-0 number-font3">{{$totalSaleQty}}</h4>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-xl-4 col-md-12 col-lg-6">
	<div class="card">
		<div class="card-body text-center">
			<h6 class="">
				<span class="text-info">
					<i class="fa fa-pie-chart me-2 fa-2x text-info-shadow"></i>
				</span>
				Total Profit
			</h6>
			<h3 class="text-dark counter mt-0 mb-3 number-font">&#8377;{{$totalProfit}}</h3>
			<div class="progress h-1 mt-0 mb-2">
				<div class="progress-bar progress-bar-striped bg-info w-{{$totalProfitPercentage}}" role="progressbar"></div>
			</div>
			<div class="row mt-4">
				<div class="col text-center">
					<button class="btn btn-sm btn-primary" onclick="DashboardSubCalcProfitForCardView();"><i class="fa fa-refresh mb-0"></i></button>
				</div>
			</div>
		</div>
	</div>
</div>