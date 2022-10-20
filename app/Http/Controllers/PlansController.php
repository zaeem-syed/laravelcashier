<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlansController extends Controller
{
    //

    public function createplan()
    {
        return view('Subscription.plans');
    }
}
