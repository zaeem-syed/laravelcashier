@extends('layouts.app')
<style>
    .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My subscriptions</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>quantity</th>
                            <th>Price</th>
                            <th>Trial Start At</th>
                            <th>Trial Ends At</th>
                            <th>Auto Renew</th>

                        </tr>
                        <tbody>
                            @foreach($subscription as $sub)
                            <tr>

                                <td>{{$sub->plan->name}}</td>
                                <td>{{$sub->stripe_status}}</td>
                                <td>{{$sub->quantity}}</td> b
                                <td>{{$sub->plan->price}}</td>

                                <td>{{$sub->created_at}}</td>
                                <td>{{$sub->trial_ends_at}}</td>
                                <td><label class="switch">
                                    @if($sub->ends_at == NULL)
                                    <input type="checkbox" class="round" id="switch" value="{{$sub->name}}" checked>

                                    @else

                                    <input type="checkbox" class="round" id="switch" value="{{$sub->name}}" >

                                    @endif

                                    <span class="slider round"></span>
                                  </label></td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
@section('scripts')
<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
        $('#switch').click(function(){
            var sub_name=$('#switch').val();

            if($(this).is(':checked')){
                $.ajax({
                    url:'/resume',
                    data:{sub_name},
                    type:'get',
                    success:function(response){
                        console.log(response)
                    },
                    error:function(response){

                    }


                });
            }else{
                $.ajax({
                    url:'/cancel',
                    data:{sub_name},
                    type:'get',
                    success:function(response){
                        console.log(response);

                    },
                    error:function(response){

                    }


                });
            }
        });
    });
  </script>

@endsection
