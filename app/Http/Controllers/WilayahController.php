<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Province;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class WilayahController extends Controller
{
    public function provinsi(){
        $provinsi=Province::all();
        $response =[
            'message' => 'list transaction order by time',
            'data' => $provinsi
       ];
       return response()->json($response,Response::HTTP_OK);

    }
    public function kota(Request $request){
        $request->validate([
            'id' => 'required|string|max:255',
        ]);

        // Bisa Model Begini
        //$id_provinsi=$request->id;  
        //$kota=Regency::where('province_id', $id_provinsi)->get();

        // Kalau Mau Ringkas Bisa Model Begini
        $kota = Regency::where('province_id', $request->id)->get();
 
        // Bisa Tambah Validasi Juga Kalau Datanya Tidak Null
        if (sizeof($kota) > 0) {
            $response =[
                'message' => 'list transaction order by time',
                'data' => $kota
            ];
        } else {
            // Kurang Else Haha
            $response =[
                'message' => 'no data',
                'data' => null
            ];
        }

        return response()->json($response,Response::HTTP_OK);
        
    }

    // public function tes(Request $request){
    //     $response =[
    //         'message' => 'list transaction order by time',
    //         'data' => $request->all()
    //    ];
    //    return response()->json($response,Response::HTTP_OK);
    // }
   
}
