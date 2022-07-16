<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        return view('subscriptions.index',[
            'intent' => auth()->user()->createSetupIntent(),
        ]); //[intencao de pagamento do stripe]
    }

    public function premium(){
        return view('subscriptions.premium');
    }

    public function store(Request $request){
        $request->user()
                        ->newSubscription('default', 'price_1LLXmSBEGY88wy4LCsFdeUPe' )
                        ->create($request->token);

        return redirect()->route('subscriptions.premium');                
    }

}
