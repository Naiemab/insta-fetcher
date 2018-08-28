@extends('layouts.app')

@section('css')
    <style>
        .error-container {
            margin-left: 35%;
            margin-right: 43%;
            margin-top: 1%;
            margin-bottom: 0;
            display: block;
        }
    </style>
@endsection

@section('content')

    <div class="container-fluid">
        <p class="serif" style="font-size: 50px" align="center"><b><em>Enter Tag</em></b></p>
        {{ csrf_field() }}
        <ol>
            <form action="/tag" method="post">
                <div>

                    <div class="col-md-4" style="margin-left: 30%">
                        <label for="tag">Tag Name :</label>
                        <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
                        <input type="text" name="tag" id="tag" placeholder="Enter Tag" class="form-control">
                    </div>
                    <br><br><br>

                    @if ($errors->any())
                        <div class="alert alert-danger error-container">
                            <ul style="list-style: none; color: red;  ">
                                @foreach ($errors->all() as $error)
                                    <li><strong>{{ $error }}</strong></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session()->has('Message'))
                        <div class="alert alert-danger error-container">
                            <ul style="list-style: none; color: red;  ">
                                <li>{{ session('Message') }}</li>
                            </ul>
                        </div>
                    @endif

                    <input type="submit" class="btn btn-info" value="search"
                           style="margin-left:43%;margin-right:40%;display:block;margin-top:1%;margin-bottom:0%">
                </div>
            </form>

            <h1>{{ $campaign->name."'s tags" }}</h1>
            @foreach($campaign->tags as $tag)
                <ul style="font-size: 30px">
                    <li>
                        <a href="{{ route('tag.show' , $tag) }}">
                            {{ $tag->tag_name }}
                        </a>
                    </li>
                </ul>
            @endforeach

        </ol>
        <li style="font-size: 30px">
            <a href="{{ route('campaign.index') }}">
                Back
            </a>
        </li>
    </div>
@endsection
