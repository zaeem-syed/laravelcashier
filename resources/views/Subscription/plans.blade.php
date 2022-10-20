@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Plans
                </div>
                <div class="card-body">
                    <form action="/plan" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">plan</label>
                            <input type="text" name="plan" id="" class="form-control">


                        </div>
                        <div class="form-group">
                            <label for="name">Subscription</label>
                             <select name="sub" id="" class="form-control">
                                <option value="">Choose Billing Period</option>
                                <option value="week">weekly</option>
                                <option value="month">Monthly</option>
                             </select>

                        </div>

                        <div class="form-group">
                            <label for="">Amount</label>
                            <input type="number" name="amount" id="" class="form-control">

                        </div>
                        <div class="form-group">
                            <label for="">Currency</label>
                            <input type="text" name="currency" id="" class="form-control">

                        </div>
                        <div class="form-group">
                            <label for="">Interval Count</label>
                            <input type="number" name="interval_count" id="" class="form-control">

                        </div>

                        <div class="form-group">
                            <input type="submit" name="" id="" value="submit" class="btn btn-sm btn-success mt-1">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
