<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition()
    {
        // Generate a random start date
        $startDate = date('Y-m-d', rand(strtotime('-1 month'), strtotime('+1 month')));
        
        // Generate a random end date that is after the start date
        $endDate = date('Y-m-d', rand(strtotime($startDate), strtotime($startDate . '+10 days')));

        return [
            'guest_id' => rand(1, 20), 
            'room_id' => rand(1, 10), 
            'check_in_date' => $startDate,
            'check_out_date' => $endDate,
            'num_of_guests' => rand(1, 4),
            'total_amount' => round(rand(50, 1000), 2),
        ];
    }
}
