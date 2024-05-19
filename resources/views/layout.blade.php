<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Vitality</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="icon" href="{{ asset('Logo.png') }}" type="Logo">
    
</head>
<body>
<div id="main">
    <div id="sidebar">
        <div id="branding">
            <img src="{{ asset('Logo.png') }}" alt="Logo">
            <h1>Hotel Vitality</h1>
        </div>
        <nav id="main-nav">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/qr') }}">QR Stay</a>
            <a href="{{ url('/reservations') }}">Reservation</a>
        </nav>
    </div>
    <div id="content">
        @yield('content')
    </div>
</div>
</body>
</html>
