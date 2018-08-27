@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li><strong>{{ $error }}</strong></li>
            @endforeach
        </ul>
    </div>
@endif

<html>
<head>
    <style>
        body {
            background-color: #8c8c8c;
        }

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
{{ csrf_field() }}
<img src="{{ $image_url }}">
</body>
</html>