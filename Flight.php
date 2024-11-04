<?php
class Flight
{

    public function __construct() {}

    public function searchFlights($from, $to, $departureDate, $returnDate = null)
    {
        return [
            [
                'airline' => 'GoTrip Airways',
                'from' => $from,
                'to' => $to,
                'departure_time' => '10:00 AM',
                'arrival_time' => '12:00 PM',
                'price' => 5000
            ],
            [
                'airline' => 'Sky High Airlines',
                'from' => $from,
                'to' => $to,
                'departure_date' => $departureDate,
                'departure_time' => '2:00 PM',
                'arrival_time' => '4:00 PM',
                'price' => 6969
            ]
        ];
    }

   
}
