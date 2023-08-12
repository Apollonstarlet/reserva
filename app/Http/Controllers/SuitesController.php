<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suites;
use DateTime;

class SuitesController extends Controller
{
    //
    public function index(Request $request)
    {
        $data = array();
        $data['suites'] = $request->suite;
        $data['adults'] = $request->adultos;
        $data['date'] = $request->fecha;
        $fecha = explode(" - ",$data['date']);
        $from = explode("/",$fecha[0]);
        $to = explode("/",$fecha[1]);
        $data['from'] = $from[2].'-'.$from[1].'-'.$from[0];
        $data['to'] = $to[2].'-'.$to[1].'-'.$to[0];
        $earlier = new DateTime($data['from']);
        $later = new DateTime($data['to']);
        $data['dates'] = $later->diff($earlier)->format("%a");
        if(isset($request->suite2)){
            if($request->adultos2 > 0){
                $data['suites'] += $request->suite2;
                $data['adults'] += $request->adultos2;
            }
        }
        if(isset($request->suite3)){
            if($request->adultos3 > 0){
                $data['suites'] += $request->suite3;
                $data['adults'] += $request->adultos3;
            }
        }
        if(isset($request->suite4)){
            if($request->adultos4 > 0){
                $data['suites'] += $request->suite4;
                $data['adults'] += $request->adultos4;
            }
        }
        if(isset($request->suite5)){
            if($request->adultos5 > 0){
                $data['suites'] += $request->suite5;
                $data['adults'] += $request->adultos5;
            }
        }
        $data['suite'] = Suites::where('guests', '>=', $data['adults'])->get();
        return view('/pages/search')->with('data', $data);
    }
}
