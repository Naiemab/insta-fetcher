

<html>
<head>
    <title>{{ $campaign->name }}</title>
</head>

<body>

<h1 style="margin-left:40%;margin-right:40%;display:block;margin-top:1%;margin-bottom:0%">Enter Tag</h1>
{{ csrf_field() }}
<ul>
    <form action="/tag" method="post">
        <input type="text" name="tag" placeholder="Enter Tag" style="margin-left:37%;margin-right:40%;display:block;margin-top:4%;margin-bottom:0%">
        <input type="submit" value="search" style="margin-left:41%;margin-right:40%;display:block;margin-top:1%;margin-bottom:0%">
    </form>
    <li>
            {{ $campaign->name }}
    </li>
    <a href="{{ route('campaigns.index') }}">
        Back
    </a>
</ul>

</body>
</html>