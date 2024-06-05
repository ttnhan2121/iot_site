<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ChartController extends Controller
{
    public function getView(){
        return view('chart');
    }

    public function getTemp(Request $request){
         $sql = "SELECT * FROM temp t ORDER BY id_temp DESC LIMIT 1";
         $data = DB::select($sql);
         Log::info($data);
         return response()->json($data);
    }
    public function getHumi(Request $request){
        $sql = "SELECT * FROM humi ORDER BY id_humi DESC LIMIT 1";
        $data = DB::select($sql);
        Log::info($data);
        return response()->json($data);
    }

}
