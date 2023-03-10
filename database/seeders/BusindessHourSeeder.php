<?php

namespace Database\Seeders;

use App\Models\BusindessHour;
use Illuminate\Database\Seeder;

class BusindessHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = config('apoinment.days');
        foreach($days as $day){
            BusindessHour::create([
                'day'=>$day,
                'from'=>'9:30',
                'to'=>'6:00',
                'step'=>'60'
            ]);
        }
    }
}
