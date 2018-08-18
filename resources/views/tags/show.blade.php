<html>

<head>
    <meta charset="UTF-8">
    <style>
        .container {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .container input:checked ~ .checkmark {
            background-color: #2196F3;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .container input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .container .checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        p.serif {
            font-family: "Times New Roman", Times, serif;
            font-size: 50px;
            text-align: center;
            margin-left: 35%;
            margin-right: 44%;
            margin-bottom: 0%
        }

        img {

        }

        input {
            padding: 10px 20px;
        }

        body {
            background-color: #8c8c8c;
        }

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .image-link {
            margin-right: 50px;
        }
        .image {
            width: 250px;
        }
    </style>
</head>


<body>
@foreach($images as $image)
    <div class="image-container">
        <a class="image-link" href="{{ $image['link']  }}">
            <img class="image" src="{{  $image['image']  }}">
        </a>
        <form action="{{  route("tag.save")  }}">
            <label class="container">Save
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
        </form>
    </div>
@endforeach
<ul>
    <li>
        <a href="{{ route('campaign.index') }}">
            Back
        </a>
    </li>
</ul>

</body>

</html>