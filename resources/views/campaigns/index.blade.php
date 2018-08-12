<html>

<head>
    <title> Campaign </title>
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
<p class="serif" style="font-size: 50px" align="center">Enter Your Campaign Name</p>

<ol>
    <form action="{{ route('campaigns.store') }}" method="post">
        {{ csrf_field() }}
        <div>
            <input type="text" name="name" placeholder="name"
                   style="margin-left:40%;margin-right:40%;display:block;margin-top:4%;margin-bottom:0%">
            <input type="submit" value="add"
                   style="margin-left:45%;margin-right:40%;display:block;margin-top:1%;margin-bottom:0%">
        </div>
    </form>

    @foreach($campaigns as $campaign)
        @if($campaign != null)
            <li style="font-size: 30px;">
                <a href="{{ route('campaigns.show', $campaign) }}">
                    {{ $campaign->id }} {{ $campaign->name }}
                </a>
            </li>
        @endif
    @endforeach
    <br><br>
</ol>
</body>
</html>