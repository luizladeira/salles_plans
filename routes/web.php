<?php

use App\Http\Controllers\Subscription\SubscriptionController;
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
Route::get('planos/basic', [SubscriptionController::class, 'index'])->name('subscriptions.checkout'); 
Route::get('planos/premium', [SubscriptionController::class, 'premium'])->name('subscriptions.premium'); 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
