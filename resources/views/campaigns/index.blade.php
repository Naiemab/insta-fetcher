<html>

<head>
    <title>Campaign</title>
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
<p class="serif" style="font-size: 50px" align="center"><b><em>Enter Your Campaign Name</em></b></p>

<ol>
    <form action="{{ route('campaign.store') }}" method="post">
        {{ csrf_field() }}
        <div>
            <input type="text" name="name" placeholder="name"
                   style="margin-left:40%;margin-right:40%;display:block;margin-top:4%;margin-bottom:0%">
            @if($errors->any())
                <div class="alert alert-danger">
                    <div class="alert alert-danger"
                         style="margin-left:35%;margin-right:43%;display:block;margin-top:1%;margin-bottom:0%;">
                        <ul style="list-style: none; color: red; margin-left: 25px;  ">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <li><strong>{{ $error }}</strong></li>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <input type="submit" value="add"
                   style="margin-left:45%;margin-right:40%;display:block;margin-top:1%;margin-bottom:0%">
        </div>
    </form>

    @foreach($campaigns as $campaign)
        @if($campaign != null)
            <ul style="font-size: 30px;">
                <a href="{{ route('campaign.show', $campaign) }}">
                    {{ $campaign->id }}. {{ $campaign->name }}
                </a>
            </ul>
        @endif
    @endforeach
    <br><br>
</ol>

<li style="font-size: 30px;">
    <a href="{{ route('home') }}">Back</a>
</li>
</body>
</html>