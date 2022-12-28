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

    //METODO DE SESSÃO DO PLANO ESCOLHIDO
    public function createSessionPlan(Plan $plan, $urlPlan){

        $plan_query =  $plan->where('url',$urlPlan)->first();

        if(!$plan_query){
            return redirect()->route('site.home');
        }

       session()->put('plan', $plan_query); //criando sessão e inserindo o plano selecionado pelo usuario
       return redirect()->route('subscriptions.checkout');

    }
}
