<?php

use App\Http\Controllers\Subscription\SubscriptionController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('assinar/checkout', [SubscriptionController::class, 'store'])->name('subscriptions.store'); 
Route::get('plano/basico', [SubscriptionController::class, 'index'])->name('subscriptions.checkout'); 
Route::get('plano/premium', [SubscriptionController::class, 'premium'])->name('subscriptions.premium')->middleware(['subscribed']); 
Route::get('minha-assinatura', [SubscriptionController::class, 'account'])->name('subscriptions.account'); 
Route::get('minha-assinatura/fatura/{invoice}', [SubscriptionController::class, 'downloadInvoice'])->name('subscriptions.invoice.download'); 
Route::get('minha-assinatura/cancelar', [SubscriptionController::class, 'unsubscribe'])->name('subscriptions.unsubscribe'); 
Route::get('minha-assinatura/reativar', [SubscriptionController::class, 'reactivateSubscription'])->name('subscriptions.reactivateSubscription'); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/***
 * SITE
 */
Route::get('/', [SiteController::class, 'index'])->name('site.home');


/*
Route::get('/', function () {
    return view('welcome');
});
*/



require __DIR__.'/auth.php';
