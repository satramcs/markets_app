@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>Market</th>
                            <th>Price</th>
                            <th>24H Volume</th>
                        </tr>
                        @if(!empty($markets))
                        @foreach($markets as $value)
                        <tr>
                            <td>{{$value->currency}}</td>
                            <td id="{{$value->currency}}_price">0</td>
                            <td id="{{$value->currency}}_volume">0</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>

<script src="{{ asset('js/show_market.js') }}" defer></script>

<link href="{{ asset('css/show_market.css') }}" rel="stylesheet">