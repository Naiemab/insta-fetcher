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

    @if ($errors->any())
        <div class="error-container">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><strong>{{ $error }}</strong></li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ csrf_field() }}
    <img src="{{ $image_url }}">

@endsection