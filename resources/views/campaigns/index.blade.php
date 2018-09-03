@extends('layouts.app')

@section('css')
    <style>
        .error-container {
            margin: 1% 43% 0 35%;
            display: block;
        }
    </style>
@endsection

@section('content')

    <div class="container-fluid">
        <p class="serif" style="font-size: 50px" align="center"><b><em>Enter Your Campaign Name</em></b></p>

        <ol>
            <form action="{{ route('campaign.store') }}" method="post">
                {{ csrf_field() }}
                <div>

                    <div class="col-md-4" style="margin-left: 30%">
                        <label for="campaign">Campaign Name:</label>
                        <input type="text" name="name" id="campaign" placeholder="name" class="form-control">
                    </div>
                    <br><br><br>

                    @if($errors->any())
                        <div class="alert alert-danger error-container">
                            <ul style="list-style: none; color: red; ">
                                @foreach ($errors->all() as $error)
                                    <li><strong>{{ $error }}</strong></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <input type="submit" class="btn btn-info" value="add"
                           style="margin-left:41%;margin-right:40%;display:block;margin-top:1%;margin-bottom:0%; width: 10%; ">
                </div>
                <br>
            </form>

            <h1>Your Campaign's Names</h1>
            @foreach($campaigns as $campaign)
                @if($campaign != null)
                    <ul style="font-size: 30px;">
                        <li>
                            <a href="{{ route('campaign.show', $campaign) }}">
                                {{ $campaign->name }}
                            </a>
                        </li>
                    </ul>
                @endif
            @endforeach
            <br><br>
        </ol>

        <li style=";font-size: 30px;">
            <a href="{{ route('home') }}">Back</a>
        </li>

    </div>

@endsection