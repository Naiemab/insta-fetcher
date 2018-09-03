@extends('layouts.app')

@section('css')
    <style>

        .material-switch > input[type="checkbox"] {
            display: none;
        }

        .material-switch > label {
            cursor: pointer;
            height: 0px;
            position: relative;
            width: 40px;
        }

        .material-switch > label::before {
            background: rgb(0, 0, 0);
            box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            content: '';
            height: 16px;
            margin-top: -8px;
            position: absolute;
            opacity: 0.3;
            transition: all 0.4s ease-in-out;
            width: 40px;
        }

        .material-switch > label::after {
            background: rgb(255, 255, 255);
            border-radius: 16px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
            content: '';
            height: 24px;
            left: -4px;
            margin-top: -8px;
            position: absolute;
            top: -4px;
            transition: all 0.3s ease-in-out;
            width: 24px;
        }

        .material-switch > input[type="checkbox"]:checked + label::before {
            background: inherit;
            opacity: 0.5;
        }

        .material-switch > input[type="checkbox"]:checked + label::after {
            background: inherit;
            left: 20px;
        }

        .image-container {
            display: flex;
            justify-content: center;
            margin-left: auto;
            margin-bottom: 20px;
        }

        .image {
            display: block;
            margin-right: auto;
            margin-left: auto;
            width: 200px;
        }

        .check-form {
            display: flex;
            align-items: center;
        }

        .button {
            display: flex;
            margin-left: auto;
            margin-right: auto;
        }

        .message {
            display: flex;
            margin: 15px auto auto;
            justify-content: center;
        }

    </style>

@endsection

@section('content')
    <div class="container-fluid">
        <?php $counter = 1; ?>
        <form action="{{  route("tag.save")  }}">
            <input type="hidden" name="tag_id" value="{{  $tag->id  }}">
            @foreach($images as $image)
                <div class="image-container col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <a class="image-link" href="{{ $image['link']  }}">
                        <img class="image" src="{{  $image['image']  }}">
                    </a>
                    <div class="check-form">
                        <input type="hidden" name="link-{{ $counter }}" value="{{ $image['link'] }}">
                        <input type="hidden" name="image-{{ $counter }}" value="{{ $image['image'] }}">
                        <li class="list-group-item" style="margin-left: 20px">
                            <span style="margin-right: 15px">Save</span>
                            <div class="material-switch pull-right">
                                <input id="save-{{ $counter }}" name="save-{{ $counter }}" type="checkbox"/>
                                <label for="save-{{ $counter }}" class="label-primary"></label>
                            </div>
                        </li>
                    </div>
                </div>
                <?php $counter++; ?>
            @endforeach
            <div class="clearfix"></div>
            <input class="btn btn-success button" value="Submit" type="submit"/>
        </form>

        @if(session()->has('Message'))
            <div class="alert alert-success col-xl-6 col-lg-12 col-md-6 col-sm-12 message">
                <ul style="list-style: none; ">
                    <li style="display: flex; justify-content: center;">{{ session('Message') }}</li>
                </ul>
            </div>
        @endif
        <div class="clearfix"></div>
        <ul>
            <li>
                <a href="{{ route('campaign.index') }}" style="font-size: 30px">
                    Back
                </a>
            </li>
        </ul>
    </div>
@endsection