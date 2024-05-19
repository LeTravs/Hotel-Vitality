@extends('layout')

@section('content')

<style>
    h1 {
        color: #333; /* Set the color to dark gray */
        font-family: Arial, sans-serif; /* Use Arial font */
        font-weight: bold; /* Bold font weight */
    }
    #content {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center; 
        background-image: url('https://i.pinimg.com/736x/9e/ed/2d/9eed2d1815cfd2343c8397d9303d93c7.jpg');
        background-size: cover;
        background-position: center;
    }

    /* Custom CSS for 3D effect */
    .card-container {
        display: flex;
        justify-content: space-around;
        margin-top: 50px;
    }

    .card {
        position: relative;
        width: 300px;
        height: 400px;
        background-color: #d4b3b3;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        transition: transform 0.5s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0px 20px 30px rgba(0, 0, 0, 0.3);
    }

    .card img {
        width: 100%;
        height: 60%;
        object-fit: cover;
        border-radius: 20px 20px 0 0;
    }

    .card-content {
        padding: 20px;
    }

    .card-title {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 16px;
        line-height: 1.5;
    }

    .btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .service-item {
        text-align: center; /* Center aligns the content */
        margin-bottom: 20px; /* Adds spacing between items */
    }

    /* Style for the images within the service items */
    .service-item img {
        width: 100px; /* Set a fixed width for all images */
        height: 100px; /* Set a fixed height for all images */
        display: block; /* Ensures images are centered horizontally */
        margin: 0 auto; /* Centers the images horizontally */
    }
</style>

<div>
    <h1>Welcome to Our Hotel Reservation System</h1>

    <div class="card-container">
        <div class="card">
            <img src="https://images.pexels.com/photos/338504/pexels-photo-338504.jpeg?cs=srgb&dl=pexels-thorsten-technoman-109353-338504.jpg&fm=jpg" alt="Hotel Image">
            <div class="card-content">
                <h3 class="card-title">Book Your Stay</h3>
                <p class="card-text">Plan your perfect getaway with us. Reserve your room now!</p>
                <a href="{{ route('special.index') }}" class="btn">Book Now</a>
            </div>
        </div>
        <div class="card">
            <img src="https://media.istockphoto.com/id/1448506100/photo/male-hotel-receptionist-assisting-female-guest.jpg?s=612x612&w=0&k=20&c=xXJn95XgzSA4_LgGczr7ce-FnpcWXwYIr-fGH9yN_z0=" alt="Services Image">
            <div class="card-content">
                <h3 class="card-title">Explore Our Services</h3>
                <p class="card-text">Explore our memorable services for an unforgettable stay.</p>
                <a href="{{ url('/qr') }}" class="btn">Learn More</a>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Why Choose Us?</h2>
            <p>Join us for an unforgettable stay where every detail is designed to make your experience extraordinary.</p>
        </div>
    </div>

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-3 service-item">
                <figure>
                    <img src="https://www.freepnglogos.com/uploads/logo-wifi-png/wifi-symbol-vector-graphic--29.png" class="img-fluid">
                    <figcaption>Free Wifi</figcaption>
                </figure>
            </div>
            <div class="col-md-3 service-item">
                <figure>
                    <img src="https://cdn.iconscout.com/icon/free/png-256/free-24-hour-room-service-1175645.png?f=webp" class="img-fluid">
                    <figcaption>24 Hour Room Service</figcaption>
                </figure>
            </div>
            <div class="col-md-3 service-item">
                <figure>
                    <img src="https://www.freeiconspng.com/thumbs/youtube-like-png/youtube-like-button-png-11.png" class="img-fluid">
                    <figcaption>4.9 Rating from 5000 Reviews</figcaption>
                </figure>
            </div>
            <div class="col-md-3 service-item">
                <figure>
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/017/196/606/small/money-bag-icon-transparent-background-free-png.png" class="img-fluid">
                    <figcaption>Affordable Price</figcaption>
                </figure>
            </div>
        </div>
    </div>

</div>

@endsection
