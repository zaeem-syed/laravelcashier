<?php

namespace App\Http\Controllers;
require_once('../vendor/autoload.php');
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;
use \Stripe\Stripe;

class SubscriptionController extends Controller
{
    //

    // protected $stripe;

    // public function __construct()
    // {
    //     $this->stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
    // }

    public function index()
    {
        $user=auth()->user();
        $intent=$user->createSetupIntent();
        return view('subscription.index',compact('intent'));
    }

    public function subscription(Request $request)
    {
        $data=$request->all();
        return $data;
    }
}

