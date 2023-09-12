<?php

namespace App\Http\Controllers\Purchases;

use Exception;
use App\Http\Controllers\Controller;
use App\Traits\UserUtility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PurchaseInvoiceController extends Controller
{
    use UserUtility;
    public function Index()
    {
        //Session::flash('infoNotify', 'alert-danger');
        return view('Purchases.index');
    }
}
