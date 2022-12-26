<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
class carController extends Controller
{
    function list(){

        return view('recs.carlist');
    }
    function data(){
        $data = car::all();
        return response()->json($data);
    }
    function form(){
        return view('recs.form');
    }
    function getdata($carname,$company,$stock,$city){
        $getdata = new car;
        $getdata->model = $carname;
        $getdata->company = $company;
        $getdata->stock = $stock;
        $getdata->city = $city;
        $getdata->save();
        return response()->json($getdata);
    }
    function edit($id){
        return view('recs.editform');
    }
    function send($id){
        $data= car::where('id', $id)->first();
        // $data=json_decode($user);
        return response()->json($data);
    }
    function change($id,$crnm,$cmpnm,$stknm,$ctnm){
        $data= car::where('id', $id)->first();
        $data->model = $crnm;
        $data->company = $cmpnm;
        $data->stock = $stknm;
        $data->city = $ctnm;
        $data->save();
        return redirect('/carlist');
        
    }
    function del($id){
        $data= car::where('id', $id)->first();
        $data->delete();
        return response()->json(["data" => "deleted"]); 
    }

}
