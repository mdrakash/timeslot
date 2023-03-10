<?php

namespace App\Http\Controllers;

use App\Models\BusindessHour;
use Illuminate\Http\Request;

class BusinessHourController extends Controller
{
    public function index()
    {
        $businessHours=BusindessHour::first()->timePeriod;
        dd($businessHours);
        return view('businesshour',compact('businessHours'));
    }
    public function update(Request $request)
    {
        $data= array_values($request->all()['data']);
        // dd($data);
        $response = BusindessHour::upsert($data,'day');
        return back();
    }
}
