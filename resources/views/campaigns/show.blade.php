<html>
<head>
    <title>{{ $campaign->name }}</title>
    <style>
        input[type=text] {
            width: 15%;
            padding: 10px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid blue;
            border-radius: 10px;
        }

        input[type=button], input[type=submit], input[type=reset] {
            background-color: #00b359;
            border: none;
            color: white;
            padding: 14px 32px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }

        p.serif {
            font-family: "Times New Roman", Times, serif;
        }

        body {
            background-color: #8c8c8c;
        }
    </style>

</head>

<body>

<p class="serif" style="font-size: 50px; text-align: center; margin-left:35%;margin-right:44%; margin-bottom:0%">Enter Tag</p>
{{ csrf_field() }}
<ul>
    <form action="/tag" method="post">
        <input type="text" name="tag" placeholder="Enter Tag"
               style="margin-left:37%;margin-right:40%;display:block;margin-top:4%;margin-bottom:0%">
        <input type="submit" value="search"
               style="margin-left:41%;margin-right:40%;display:block;margin-top:1%;margin-bottom:0%">
    </form>
    <li style="font-size: 30px;">
        {{ $campaign->name }}
    </li>
    <a href="{{ route('campaigns.index') }}">
        Back
    </a>
</ul>

</body>
</html>