@extends('landing')

@section('content')
<style>
    
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

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .card {
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        background-image: url('https://i.pinimg.com/originals/c4/b9/a6/c4b9a66ea87c152498f3955ce24419bd.jpg');
        background-size: cover;
        background-position: center;
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-5px);
    }
</style>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: center;">
                <?php
                $qrData = "Guest Name:{$reservation->guest->name}, Room ID:{$reservation->room->id}, Check-in Date:{$reservation->check_in_date}, Check-out Date:{$reservation->check_out_date}, Number of Guests:{$reservation->num_of_guests}, Total Amount: ₱{$reservation->total_amount}";
                
                echo QrCode::encoding('UTF-8')->generate($qrData);
                ?>
            </div>
            <h1 class="font-bold text-blue-600 text-center">Reservation Details</h1>
            <h5 class="card-title text-center">Guest Name: {{ $reservation->guest->name }}</h5>
            <p class="card-text text-center">Room ID: {{ $reservation->room->id }}</p>
            <p class="card-text text-center">Check-in Date: {{ $reservation->check_in_date }}</p>
            <p class="card-text text-center">Check-out Date: {{ $reservation->check_out_date }}</p>
            <p class="card-text text-center">Number of Guests: {{ $reservation->num_of_guests }}</p>
            <p class="card-text text-center">Total Amount: ₱{{ $reservation->total_amount }}</p>
            
            <a href="{{ route('reservation.index') }}" class="btn btn-primary">Go Back</a>

        </div>
    </div>
</div>
@endsection
