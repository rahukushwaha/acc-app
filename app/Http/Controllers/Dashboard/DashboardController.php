<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Traits\UserUtility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    use UserUtility;
    public function index(Request $request)
    {
        $this->makeMenuInJson();
        
        return view('dashboard');
    }
}
