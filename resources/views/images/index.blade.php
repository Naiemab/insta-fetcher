@extends('layouts.app')

@section('content')
    <div>
        @foreach($media as $key => $value)
            <img src="{{  $value['media_path']  }}">
        @endforeach
    </div>

@endsection