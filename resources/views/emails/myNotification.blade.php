<!DOCTYPE html>
<html>

<head>
    <title>gatecitybardirectory.org</title>
</head>

<body>
    <h1>{{ $details['title'] }}</h1>
    <p>From {{$details['email']}}
    </p>
    <p>{{ $details['body'] }}</p>
    <a href="{{ route('view.pending') }}">check it out to approve, please.</a>
    <p>Thank you</p>
</body>

</html>