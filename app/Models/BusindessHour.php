<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusindessHour extends Model
{
    use HasFactory;
    protected $guarded =['*'];

    public function getTimePeriodAttribute()
    {
        return CarbonInterval::minutes($this->step)->toPeriod($this->from,$this->to)->toArray();
        // return $times;
    }
}
