<?php

use App\Http\Controllers\PlansController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


route::middleware('auth')->group(function(){

route::get('subscribe',[SubscriptionController::class,'index']);
route::post('/sub',[SubscriptionController::class,'subscription']);


Route::get('/create/plan',[SubscriptionController::class,'showplan']);

Route::post('/plan',[SubscriptionController::class,'makeplan']);

route::get('/get/plans',[SubscriptionController::class,'allplans']);
route::get('/plan/checkout/{planid}',[SubscriptionController::class,'plancheckout']);
route::post('/plan/checkout',[SubscriptionController::class,'checkout']);
route::get('/subscription',[SubscriptionController::class,'userSubscription']);

route::get('/cancel',[SubscriptionController::class,'cancelSubscription']);
route::get('/resume',[SubscriptionController::class,'resumeSubscription']);



route::get('/new',[SubscriptionController::class,'newpayment']);
route::post('/pay',[SubscriptionController::class,'pay']);
// Route::get('/subscribe', 'SubscriptionController@showSubscription');
//       Route::post('/subscribe', 'SubscriptionController@processSubscription');
//       // welcome page only for subscribed users
//       Route::get('/welcome', 'SubscriptionController@showWelcome');
      //->middleware('subscribed');

});
