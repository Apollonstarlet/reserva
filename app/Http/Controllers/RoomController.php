<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\Rooms;

class RoomController extends Controller
{
    //
    public function index(Request $request)
    {
        $data = array();
        $data['room'] = $request->suite;
        $data['adultos'] = $request->adultos;
        $data['date'] = $request->fecha;
        if(isset($request->suite2)){
            if($request->adultos2 > 0){
                $data['room'] += $request->suite2;
                $data['adultos'] += $request->adultos2;
            }
        }
        if(isset($request->suite3)){
            if($request->adultos3 > 0){
                $data['room'] += $request->suite3;
                $data['adultos'] += $request->adultos3;
            }
        }
        if(isset($request->suite4)){
            if($request->adultos4 > 0){
                $data['room'] += $request->suite4;
                $data['adultos'] += $request->adultos4;
            }
        }
        if(isset($request->suite5)){
            if($request->adultos5 > 0){
                $data['room'] += $request->suite5;
                $data['adultos'] += $request->adultos5;
            }
        }
        $data['rooms'] = rooms::join('categories', 'rooms.id_categories', 'categories.id')->where('rooms.rooms', $data['room'])->where('rooms.max', $data['adultos'])->select('rooms.id','categories.name','rooms.description', 'rooms.image', 'rooms.price', 'rooms.max', 'rooms.rooms')->get();
        $data['categories'] = categories::orderBy('created_at', 'asc')->get();
        return view('/pages/search')->with('data', $data);
    }
}
