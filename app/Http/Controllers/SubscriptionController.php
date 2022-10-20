<?php

namespace App\Http\Controllers;
require_once('../vendor/autoload.php');
use Stripe\Plan;
use \Stripe\Stripe;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        //dd($intent);
        return view('subscription.index',compact('intent'));
    }

    public function subscription(Request $request)
    {

         //dd($request->all());
         $amount=$request->amount*100;
         //dd($amount);
         $payment_method=$request->payment_method;

         $user=auth()->user();
         $user->createorGetStripeCustomer();
         $payment_method=$user->addPaymentMethod($payment_method);
         $stripecharge=$user->charge($amount,$payment_method->id);
         return redirect()->back();
    }


    public function showplan()
    {
        return view('subscription.plans');
    }

    public function makeplan(Request $request)
    {
        //dd($request->all());
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
       try{
        $data=Plan::create([
            'amount' => $request->amount*100,
            'interval'=> $request->sub,
            'currency' => $request->currency,
            'interval_count' => $request->interval_count,
            'product' => [
                'name' => $request->plan,

            ]

        ]);
        //$plandata=$data->toarray();
        //dd($plandata);
        //dd($data);
        DB::Table('plans')->insert([
            'plan_id' => $data->id,
            'billing_method' => $data->interval,
            'interval_count' => $data->interval_count,
            'price'=> $request->amount,
            'currency' => $data->currency,
            'name' => $request->plan,
        ]);

       }
       catch(\Exception $e){
         dd($e->getmessage());
       }

       return dd("this is done");
    }


    public function allplans()
    {
        $summer=DB::Table('plans')->where('name','LIKE','%'.'summer'.'%')->first();
        //dd($summer);
        return view('Subscription.showplans',compact('summer'));
    }
}

