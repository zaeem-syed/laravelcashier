<?php

namespace App\Http\Controllers;
require_once('../vendor/autoload.php');
use Exception;
use Stripe\Plan;
use Carbon\Carbon;
use \Stripe\Stripe;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Subscription;
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


    public function plancheckout($planid)
    {
        try{
            $plan=DB::table('plans')->where('plan_id',$planid)->first();
            if($plan==NULL){
                throw new Exception('plan id is not valid');
            }else{
                $intent=auth()->user()->createSetupIntent();
                return view('Subscription.checkout',compact('plan','intent'));
            }
        }catch(\Exception $e){
              $messsage=$e->getMessage();
             // dd($messsage);
              return redirect()->back()->with('errors',$e->getMessage());
        }



    }

    public function checkout(Request $request)
    {
        $user=auth()->user();
        $user->createorGetStripeCustomer();
        $payment_method=$request->payment_method;
        if(!$payment_method)
        {
            dd($payment_method);
        }
        else{
             try{
                $paymentmethod=$user->addPaymentMethod($payment_method);
            $user->newSubscription('default',$request->plan_id)->trialDays(14)->create($paymentmethod->id);

            dd("this is done");
             }catch(\Exception $ex)
             {
                dd($ex->getMessage());
             }



        }
    }

    public function userSubscription()
    {
        //$subscription=DB::Table('subscriptions')->where('user_id',auth()->user()->id)->get();
        $subscription=auth()->user()->subscriptions;
        $all=Subscription::all();

        return view('subscription.usersubscription',compact('subscription'));
    }


    public function cancelSubscription(Request $request)
    {
        $subscription=$request->sub_name;
        if($subscription)
        {
            $user=auth()->user();
            $user->subscription($subscription)->cancel();
            return "susbscription is canceld";
        }
        else{
            return "subscription has some error while canceling";
        }
    }
    public function resumeSubscription(Request $request)
    {
         //return $request->all();
        $subscription=$request->sub_name;
        if($subscription)
        {
            $user=auth()->user();
            if ($user->subscription($subscription)->onGracePeriod()) {
                $user->subscription($subscription)->resume();
                return "susbscription is resumed";
                //
            }
            else{
                return "you are not in grace period";
            }

        }
        else{
            return "subscription has some error while resuming";
        }
    }


    public function newpayment()
    {
        $user=auth()->user();
        $intent=$user->createSetupIntent();
        //dd($intent);
        return view('subscription.newpayment',compact('intent'));
    }

    public function pay(Request $request)
    {
        dd($request->all());
    }
}

