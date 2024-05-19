<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation List</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Reservation List</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Reservation ID</th>
                <th>Guest Name</th>
                <th>Room ID</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Number of Guests</th>
                <th>Total Amount</th>
                <th>Qr Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->guest->name }}</td>
                    <td>{{ $reservation->room->id }}</td>
                    <td>{{ $reservation->check_in_date }}</td>
                    <td>{{ $reservation->check_out_date }}</td>
                    <td>{{ $reservation->num_of_guests }}</td>
                    <td>${{ $reservation->total_amount }}</td>
                    <td><img src="data:image/png;base64,{{ base64_encode($reservation->qrCode) }}" alt="QR Code"></td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
