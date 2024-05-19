<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Guest;
use App\Models\Room;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservation', compact('reservations'));
    }

    public function deleteAll()
    {
        Reservation::truncate(); 
    
        return redirect()->route('reservation.index')->with('success', 'All reservations have been deleted successfully.');
    }
    

    public function create()
    {
        $rooms = Room::all();
        return view('reservation-create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guest_name' => 'required|string',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'num_of_guests' => 'required|integer|min:1',
        ]);

        // Create or find guest
        $guest = Guest::firstOrCreate(['name' => $request->guest_name]);

        // Create reservation
        $reservation = new Reservation();
        $reservation->guest_id = $guest->id;
        $reservation->room_id = $request->room_id;
        $reservation->check_in_date = $request->check_in_date;
        $reservation->check_out_date = $request->check_out_date;
        $reservation->num_of_guests = $request->num_of_guests;
        $reservation->total_amount = $this->calculateTotalAmount($request->room_id, $request->check_in_date, $request->check_out_date);
        $reservation->save();

        return redirect()->route('reservation.index')->with('success', 'Reservation created successfully.');
    }

    protected function calculateTotalAmount($room_id, $check_in_date, $check_out_date)
    {
        $room = Room::findOrFail($room_id);
        $price_per_night = $room->price;
        $check_in = new \DateTime($check_in_date);
        $check_out = new \DateTime($check_out_date);
        $interval = $check_in->diff($check_out);
        $num_of_nights = $interval->days;
        $total_amount = $price_per_night * $num_of_nights;
        return $total_amount;
    }

    public function pdf()
    {
        $reservations = Reservation::all();

        foreach ($reservations as $reservation) {
            // Generate QR code for each reservation
            $reservation->qrCode = QrCode::size(100)->generate($reservation->id);
        }

        $pdf = PDF::loadView('reservation-list', compact('reservations'));
        return $pdf->download('reservation-list.pdf');
    }

    public function exportToCsv()
    {
        $reservations = Reservation::all();

        // Set up CSV headers
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="reservations.csv"',
        ];

        // Initialize output buffer
        $output = fopen('php://output', 'w');

        // Write CSV headers
        fputcsv($output, [
            'Guest Name',
            'Room ID',
            'Check-in Date',
            'Check-out Date',
            'Number of Guests',
            'Total Amount',
        ]);

        // Write CSV rows
        foreach ($reservations as $reservation) {
            fputcsv($output, [
                $reservation->guest->name,
                $reservation->room->id,
                $reservation->check_in_date,
                $reservation->check_out_date,
                $reservation->num_of_guests,
                $reservation->total_amount,
            ]);
        }

        // Close the output buffer
        fclose($output);

        // Return the CSV file as a response
        return Response::make('', 200, $headers);
    }

    public function importCsv(Request $request)
    {
        // Validate the uploaded CSV file
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);
    
        // Process the CSV file
        $file = $request->file('csv_file');
    
        // Read CSV data
        $csvData = array_map('str_getcsv', file($file));
    
        foreach ($csvData as $row) {
            // Assuming CSV structure is guest_name, room_id, check_in_date, check_out_date, num_of_guests
            $guestName = $row[0];
            $roomId = $row[1];
            $checkInDate = $row[2];
            $checkOutDate = $row[3];
            $numOfGuests = $row[4];
    
            // Find or create guest
            $guest = Guest::firstOrCreate(['name' => $guestName]);
    
            // Find room by room ID
            $room = Room::find($roomId);
    
            if ($room && $guest) {
                // Create reservation
                $reservation = new Reservation();
                $reservation->guest_id = $guest->id;
                $reservation->room_id = $room->id;
                $reservation->check_in_date = $checkInDate;
                $reservation->check_out_date = $checkOutDate;
                $reservation->num_of_guests = $numOfGuests;
                // Calculate total amount
                $reservation->total_amount = $this->calculateTotalAmount($room->id, $checkInDate, $checkOutDate);
                $reservation->save();
            }
        }
    
        // Redirect or return a response as needed
        return redirect()->route('reservation.index')->with('success', 'Reservations imported successfully.');
    }
    
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservation-show', compact('reservation'));
    }
}