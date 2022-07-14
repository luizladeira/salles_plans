<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        return view('subscriptions.index');
    }

    public function premium(){
        return view('subscriptions.premium');
    }

    public function store(Request $request){
        $request->user()
                        ->newSubscription('default', 'price_1LLXkaBEGY88wy4LU07gCYAy' )
                        ->create($request->token);

        return redirect()->route('subscriptions.premium');                
    }

}
