<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
       
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){

        if(auth()->user()->subscribed('default')){
            return redirect()->route('subscriptions.premium');
        }
            return view('subscriptions.index',[
                'intent' => auth()->user()->createSetupIntent(),
            ]); //[intencao de pagamento do stripe]
        
        
    }

    public function premium(){

        //Validação para saber se ele é usuário
        if(!auth()->user()->subscribed('default')){
            return redirect()->route('subscriptions.checkout');
        }

        return view('subscriptions.premium');
    }

    public function store(Request $request){

        $request->user()
                        ->newSubscription('default', 'price_1LLXkaBEGY88wy4LU07gCYAy')
                        ->create($request->token);

        return redirect()->route('subscriptions.premium');                
    }

    public function account(){
        $invoices = auth()->user()->invoices();
        return view('subscriptions.account', compact('invoices'));
    }

    public function downloadInvoice($invoiceId){
        
        return Auth::user()->downloadInvoice($invoiceId, [
                'vendor' => config('app.name'),
                'product' => 'Assinatura Premium'
            ]
         );

    }

    //cancelar assinatura
    public function unsubscribe(){
        Auth::user()->subscription('default')->cancel();
        return redirect()->route('subscriptions.account');

    }
    
    //reativar assinatura
    public function reactivateSubscription(){
        Auth::user()->subscription('default')->resume();
        return redirect()->route('subscriptions.account');

    }


}
