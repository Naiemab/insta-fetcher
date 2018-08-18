<html>
<head>
    <title>{{ $campaign->name."'s tags" }}</title>
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
            font-size: 50px;
            text-align: center;
            margin-left: 35%;
            margin-right: 44%;
            margin-bottom: 0%
        }

        body {
            background-color: #8c8c8c;
        }
    </style>

</head>

<body>

<p class="serif"><b><em>Enter Tag</em></b></p>
{{ csrf_field() }}
<ul>
    <form action="/tag" method="post">
        <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
        <input type="text" name="tag" placeholder="Enter Tag"
               style="margin-left:37%;margin-right:40%;display:block;margin-top:4%;margin-bottom:0%">
        @if ($errors->any())
            <div class="alert alert-danger"
                 style="margin-left:35%;margin-right:43%;display:block;margin-top:1%;margin-bottom:0%;">
                <ul style="list-style: none; color: red;  ">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('Message'))
            <p style="color: red; margin-left: 40%">{{ session('Message') }}</p>
        @endif
        <input type="submit" value="search"
               style="margin-left:41%;margin-right:40%;display:block;margin-top:1%;margin-bottom:0%">
    </form>
    <ul style="font-size: 30px;">
        {{ $campaign->name."'s tags" }}

        @foreach($campaign->tags as $tag)
            <ul>
                <li>
                    <a href="{{ route('tag.show' , $tag) }}">
                        {{ $tag->tag_name }}
                    </a>
                </li>
            </ul>
        @endforeach
    </ul>
    <a href="{{ route('campaign.index') }}">
        Back
    </a>
</ul>

</body>
</html>