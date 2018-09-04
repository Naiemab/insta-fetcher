@extends('layouts.app')

@section('css')

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .w3-modal-content {
            background: none;
            display: flex;
            justify-content: center;
            align-content: center;
        }
    </style>
@endsection

@section('content')

    <div class="w3-row-padding">
        @foreach($media as $key => $value)
            <div class="w3-container w3-third">
                <img src="{{  $value['media_path']  }}" style="width:100%;cursor:pointer;margin-top: 10px;"
                     onclick="onClick(this)" class="w3-hover-opacity">
                <a href="{{ $value['url'] }}"><input type="button" value="go to instagram" class="btn btn-success"
                                                     style="display: flex; margin: auto; margin-top: 10px;"></a>
            </div>
        @endforeach
    </div>

    <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
        <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
        <div class="w3-modal-content w3-animate-zoom">
            <img id="img01" style="width:auto">
        </div>
    </div>

    <script>
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
        }
    </script>

@endsection





