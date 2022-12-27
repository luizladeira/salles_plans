<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function index(Plan $plan){
        $plans = $plan->with('features')->get();
        return view('site.index', compact('plans'));
    }
}
