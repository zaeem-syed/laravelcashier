<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Education App landing page">
    <meta name="keywords" content="HTML,CSS,Bootstrap,JavaScript">
    <meta name="author" content="Template.net">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Annual Saas Pricing Page Template</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
</head>

<body>
    <div class="main">
        <section class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @if (session()->has('errors'))
                        <div class="row">
                         <div class="col-md-8">
                        <div class="alert alert-danger">
                         <ul>
                    {{-- @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach --}}
                    {{session('errors')}}
                        </ul>
                        </div>

                        </div>
                        </div>

                        @endif
                        <div class="pricing-header">
                            <h1>The Best Pricing<br>for Everyone.</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisi porta lorem mollis erat imperdiet sed euismod nisi. Tellus rutrum tellus...</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pricing">
           <div class="gradient"></div>
            <div class="container">
                <div class="row flex-items-xs-middle flex-items-xs-center nogap">

                    <!-- Table #1  -->
                    <div class="col-lg-6 col-12 col">
                        <div class="card">
                           <h3 style="background-color: #f69679;">Basic</h3>
                           {{-- @foreach($summer as $plan1) --}}

                            <div class="card-header">
                                <h4><span class="currency">{{$summer->price}}</span> <span>{{$summer->currency}}</span></h4>
                                <p class="card-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                            </div>
                            <div class="card-block">
                                <ul class="list-group">
                                    <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>Core subscription metrics</li>
                                    <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>Free Cohort analysis </li>
                                    <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>Google Maps</li>
                                    <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>Filters and segments</li>
                                    <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>Custom tags and attributes</li>
                                    <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>Custom charts</li>
                                </ul>
                            </div>
                            <a type="button" href="{{url('/plan/checkout',$summer->plan_id)}}" class="btn btn-info">{{$summer->name}}</a>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                    <!-- Table #2  -->
                    <div class="col-lg-6 col-12 col">
                        <div class="card parttwo">
                           <h3 style="background-color: #acd373;">pro</h3>
                            <div class="card-header">
                                <h4><span class="currency">19.00</span></h4>
                                <p class="card-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                            </div>
                            <div class="card-block">
                                <ul class="list-group">
                                    <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>Core subscription metrics</li>
                                    <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>Free Cohort analysis </li>
                                    <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>Google Maps</li>
                                    <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>Filters and segments</li>
                                    <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>Custom tags and attributes</li>
                                    <li class="list-group-item"><i class="fa fa-check-circle" aria-hidden="true"></i>Custom charts</li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-info">Subscribe Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pricing-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Or, Try for 30 Days Free Trial</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisi porta lorem mollis erat imperdiet sed euismod nisi. Tellus rutrum tellus...</p>
                        <button type="button" class="btn btn-info">signup for free trial</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
</body></html>
