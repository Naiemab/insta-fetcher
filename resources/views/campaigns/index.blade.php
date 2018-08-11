<html>

<head>
    <title> Campaign </title>
</head>

<body>
    <h1 align="center">Enter Your Campaign Name</h1>

<ol>
    <form action="{{ route('campaigns.store') }}" method="post">
        {{ csrf_field() }}
        <div>
            <input type="text" name="name" placeholder="name" style="margin-left:40%;margin-right:40%;display:block;margin-top:4%;margin-bottom:0%">
            <input type="submit" value="add" style="margin-left:45%;margin-right:40%;display:block;margin-top:1%;margin-bottom:0%">
        </div>
    </form>

    @foreach($campaigns as $campaign)
        @if($campaign != null)
            <li>
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