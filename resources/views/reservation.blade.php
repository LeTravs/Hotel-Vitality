@extends('landing')

@section('content')
<style>
    #content {
        background-image: url('https://i.pinimg.com/736x/9e/ed/2d/9eed2d1815cfd2343c8397d9303d93c7.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    .container {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: flex-start;
        margin-left: 20px;
    }

    .container1 {
        text-align: center;
        margin: 20px;
    }

    .camera-wrapper, .result-wrapper {
        margin: 20px;
    }

    .camera-wrapper {
        width: 30%;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .result-wrapper {
        width: 20%;
    }

    .card {
        background-size: cover;
        border-radius: 10px;
        padding: 20px;
        color: #fff;
        margin-bottom: 20px;
    }

    #generatedData {
        border: 1px solid #e29898;
        background-color: aliceblue;
        margin-top: 0px;
        padding: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        transform: rotateY(-10deg) rotateX(10deg);
        transition: transform 0.5s ease;
        width: 100%;
        text-align: center;
        margin-top: 20px;
    }
</style>

<script src="/node_modules/html5-qrcode/html5-qrcode.min.js"></script>
<script src="/public/jquery.min.js"></script>
<script src="/public/qrcode.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const config = {
            fps: 30,
            qrbox: 200
        };
        const scanner = new Html5QrcodeScanner("reader", config);

        scanner.render((data) => {
            document.getElementById("generatedData").innerHTML = "<p>Scanned data: " + data + "</p>";
        });

        const qrcode = new QRCode("qrcode", {
            width: 200,
            height: 200,
            colorDark: "#000000",
        });

        document.getElementById('generate').addEventListener('click', function() {
            qrcode.makeCode(document.getElementById('data').value);
        });
    });
</script>

<div class="container">
    <div class="camera-wrapper">
        <div id="reader"></div>
        <div id="generatedData"></div>
    </div>

    <div class="result-wrapper">
        <div id="qrcode"></div>
    </div>
</div>

<div class="container1">
    <h1 class="font-bold text-blue-600">Reservations</h1>
    <a href="{{ route('reservation.create') }}" class="btn btn-primary mb-4">Create Reservation</a>

    <form action="{{ route('reservations.import.csv') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="csv_file" class="mb-2">
        <button type="submit" class="btn btn-primary">Import CSV</button>
    </form>
    
    <div class="mb-4" style="display: flex; justify-content: space-between;">
        <a href="{{ route('reservations.pdf') }}" class="text-xl hover:bg-blue-600 p-2" style="background-color: #f3c79e; color: #000; text-decoration: none;">Export to PDF</a>
        <a href="{{ route('reservations.csv') }}" class="text-xl hover:bg-blue-600 p-2" style="background-color: #b2cff0; color: #000; text-decoration: none;">Export to CSV</a>
    </div>

    <div class="row">
        @foreach ($reservations as $reservation)
        <div class="col-md-4 mb-4">
            <div class="card" style="background-image: url('https://i.pinimg.com/originals/c4/b9/a6/c4b9a66ea87c152498f3955ce24419bd.jpg');">
                <div class="card-body">
                    <div class="reservation-info">
                        {{ QrCode::generate($reservation->id) }}
                        <p class="card-text">Guest Name: {{ $reservation->guest->name }}</p>
                        <a href="{{ route('reservation.show', $reservation->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4">
        <h2 class="font-bold text-xl mb-2">Delete All Reservations</h2>
        <form action="{{ route('reservations.deleteAll') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete all reservations?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete All Reservations</button>
        </form>
    </div>
</div>
@endsection
