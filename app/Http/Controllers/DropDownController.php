<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Country,City,State, User}; // import model 
use ProtoneMedia\LaravelCrossEloquentSearch\Search;
 
class DropDownController extends Controller
{
    public function index()
    {
        $counteries = Country::get(['name','id']);
 
        return view('dropdown',compact('counteries'));
    }
 
    public function fatchState(Request $request)
    {
        $data['states'] = State::where('country_id',$request->country_id)->get(['name','id']);
 
        return response()->json($data);
    }
 
    public function fatchCity(Request $request)
    {
        $data['cities'] = City::where('state_id',$request->state_id)->get(['name','id']);
 
        return response()->json($data);
    }

    public function autosearch(Request $request)
    {
        if ($request->ajax()) {
            $rmstrc= ['\'', '"', ',' , ';', '<', '>'];
            $terms = str_replace($rmstrc, ' ', $request->name);
            $data = Search::add(Country::class, 'name','id')
            ->add(State::with('country'), 'name','id')
            ->add(City::with('state'), 'name','id')
            // ->beginWithWildcard()
            ->includeModelType()
            ->orderByModel([
                City::class, State::class, Country::class,
            ])
            ->search($terms);
            // dd($data);
            $output = '';
            if (count($data)>0) {
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                foreach ($data as $row) {
                    if($row->type == 'Country'){
                        $output .= '<li class="list-group-item" data-country='.$row->id.'>'.$row->name.'</li>';
                    }
                    if($row->type == 'State'){
                        $output .= '<li class="list-group-item" data-state='.$row->id.' data-country='.$row->country->id.'>'
                        .$row->name.',<strong> '.$row->country->name.'</strong></li>';
                    }
                    if($row->type == 'City'){
                        $output .= '<li class="list-group-item" data-city='.$row->id.' data-state='.$row->state->id.' data-country='.$row->state->country->id.'>'
                        .$row->name.',<em> '.$row->state->name.'</em> ,<strong>'.$row->state->country->name.'</strong></li>';
                    }
                    
                }
                $output .= '</ul>';
            }else {
                $output .= '<li class="list-group-item">'.'No Data Found'.'</li>';
            }
            return $output;
        }
        return view('autosearch');  
    }

    public function get_user(Request $request)
    {
        $data = $request->data;
        $user= User::Search($data);
        dd($user);
    }
}
