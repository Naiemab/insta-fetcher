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