<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Traits\UserUtility;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    use UserUtility;
    public function index(Request $request)
    {
        //$this->makeMenuInJson();
        return view('Dashboard.dashboard');
    }

    public function CalcProfitForCardView() {

        $now = Carbon::now(); // 30 May 2022 $endWeek = Carbon::now()->subWeek()->endOfWeek();
        $monthStartDate = $now->format('Y-m-01');
        $weekStartDate = $now->startOfWeek()->format('Y-m-d');
        $todayDate = $now->format('Y-m-d');

        /* purchase */
        $totalPurchase = DB::table('tbl_purchases as tp')
                ->join('tbl_purchase_dtls as tpd', function($join) {
                    $join->on('tpd.intPurchasesId', '=', 'tp.id')
                        ->where('tpd.bitDeletedFlag', 0);
                })->where('tp.bitDeletedFlag', 0)
                ->sum('tp.decTotalAmt');

        $totalPurchaseQty = DB::table('tbl_purchases as tp')
                ->join('tbl_purchase_dtls as tpd', function($join) {
                    $join->on('tpd.intPurchasesId', '=', 'tp.id')
                        ->where('tpd.bitDeletedFlag', 0);
                })->where('tp.bitDeletedFlag', 0)
                ->sum('tpd.intQty');

        $totalPurchaseWeeklyQty = DB::table('tbl_purchases as tp')
                ->join('tbl_purchase_dtls as tpd', function($join) {
                    $join->on('tpd.intPurchasesId', '=', 'tp.id')
                        ->where('tpd.bitDeletedFlag', 0);
                })->where('tp.bitDeletedFlag', 0)
                ->whereBetween('tp.dtInvoiceDate', [$weekStartDate, $todayDate])
                ->sum('tpd.intQty');

        $totalPurchaseMonthlyQty = DB::table('tbl_purchases as tp')
                ->join('tbl_purchase_dtls as tpd', function($join) {
                    $join->on('tpd.intPurchasesId', '=', 'tp.id')
                        ->where('tpd.bitDeletedFlag', 0);
                })->where('tp.bitDeletedFlag', 0)
                ->whereBetween('tp.dtInvoiceDate', [$monthStartDate, $todayDate])
                ->sum('tpd.intQty');
        

        /* end purchase */
        /* Sales */
        $totalSale = DB::table('tbl_sales as sp')
                ->join('tbl_sale_dtls as spd', function($join) {
                    $join->on('spd.intSalesId', '=', 'sp.id')
                        ->where('spd.bitDeletedFlag', 0);
                })->where('sp.bitDeletedFlag', 0)
                ->sum('sp.decTotalAmt');

        $totalSaleQty = DB::table('tbl_sales as sp')
                ->join('tbl_sale_dtls as spd', function($join) {
                    $join->on('spd.intSalesId', '=', 'sp.id')
                        ->where('spd.bitDeletedFlag', 0);
                })->where('sp.bitDeletedFlag', 0)
                ->sum('spd.intQty');

        $totalSaleWeeklyQty = DB::table('tbl_sales as sp')
                ->join('tbl_sale_dtls as spd', function($join) {
                    $join->on('spd.intSalesId', '=', 'sp.id')
                        ->where('spd.bitDeletedFlag', 0);
                })->where('sp.bitDeletedFlag', 0)
                ->whereBetween('sp.dtInvoiceDate', [$weekStartDate, $todayDate])
                ->sum('spd.intQty');

        $totalSaleMonthlyQty = DB::table('tbl_sales as sp')
                ->join('tbl_sale_dtls as spd', function($join) {
                    $join->on('spd.intSalesId', '=', 'sp.id')
                        ->where('spd.bitDeletedFlag', 0);
                })->where('sp.bitDeletedFlag', 0)
                ->whereBetween('sp.dtInvoiceDate', [$monthStartDate, $todayDate])
                ->sum('spd.intQty');
        /* end sales */
        /* percentage calculation */
        $totalProfitPercentageTemp = round((($totalSale - $totalPurchase)/$totalPurchase)*100);
        $a = (int)($totalProfitPercentageTemp / 10) * 10; // Larger multiple 
        $b = ($a + 10); // Return of closest of two 
        $totalProfitPercentage = ($totalProfitPercentageTemp - $a > $b - $totalProfitPercentageTemp) ? $b : $a; 
        $totalProfitPercentage = $totalProfitPercentage > 100 ? 100 : $totalProfitPercentage;
        /* end percentage calculation */
        return view('Dashboard.Sub.CalcProfitForCardView', [
            "totalPurchase" => $totalPurchase,
            "totalPurchaseQty" => $totalPurchaseQty,
            "totalPurchaseWeeklyQty" => $totalPurchaseWeeklyQty,
            "totalPurchaseMonthlyQty" => $totalPurchaseMonthlyQty,
            "totalSale" => $totalSale,
            "totalSaleQty" => $totalSaleQty,
            "totalSaleWeeklyQty" => $totalSaleWeeklyQty,
            "totalSaleMonthlyQty" => $totalSaleMonthlyQty,
            "totalProfit" => $totalSale - $totalPurchase,
            "totalProfitPercentage" => $totalProfitPercentage
        ]);
    }

    public function WeekDayPurchaseSaleLineChart() {
        $now = Carbon::now();
        $currentDate = $now->format('Y-m-d');
        $weekEndDate = $now->subDays($now->dayOfWeek)->subWeek()->format('Y-m-d');
        $whereCond = "AND dtInvoiceDate BETWEEN '".$weekEndDate."' AND '".$currentDate."'";
        $results = DB::table(DB::raw('(SELECT 
                                        dtInvoiceDate, SUM(decTotalAmt) as totalPurchase, 0 as totalSale 
                                    FROM tbl_purchases 
                                    WHERE bitDeletedFlag = 0 '.$whereCond.' 
                                    GROUP BY dtInvoiceDate 
                                    UNION ALL 
                                    SELECT 
                                        dtInvoiceDate, 0 as totalPurchase, SUM(decTotalAmt) as totalSale 
                                    FROM tbl_sales 
                                    WHERE bitDeletedFlag = 0 '.$whereCond.' 
                                    GROUP BY dtInvoiceDate) as tempTable'))
            ->select('dtInvoiceDate', 
                        DB::raw('SUM(totalPurchase) as totalPurchase'), 
                        DB::raw('SUM(totalSale) as totalSale')
                    )
            ->groupBy('dtInvoiceDate')
            ->get();
        
            if ($results) {
                foreach ($results as $key => $value) {
                    $yyyy = date("Y", strtotime($value->dtInvoiceDate));
                    $mm = (date("m", strtotime($value->dtInvoiceDate))-1);
                    $dd = date("d", strtotime($value->dtInvoiceDate));
                    $results[$key]->invoiceDate = $yyyy.",".$mm.",".$dd;
                }
            }
        return view('Dashboard.Sub.WeekDayPurchaseSaleLineChart', ["result" => $results]);
    }
}
