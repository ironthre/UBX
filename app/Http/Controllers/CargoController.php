<?php

namespace App\Http\Controllers;

use App\Imports\CargoDetailsImport;
use App\Models\Cargo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;


class CargoController extends Controller
{
    public function import(Request $request){
       return DB::transaction(function() use ($request) {
            try {
                if($request->hasFile('file')){
                    $extension = File::extension($request->file->getClientOriginalName());
                    if($extension=='csv' || $extension=='xls' || $extension == "xlsx"){
                        $excel = $request->file('file');
                        Excel::import(new CargoDetailsImport, $excel);
                        return redirect('/')->with('Success', "Imported");
                    }else {
                        return redirect('/')->with('Failed', 'Choose a correct file format to import data');
                    }
                }
            } catch (\Exception $e) {
                DB::rollback();
            }
        });
    }

    public function showList(){
        $listOfItems = Cargo::all();
        return view('/cargo-lists', compact('listOfItems'));
    }

    public function pullData(){
        $listOfItems = Cargo::all();
        return response()->json($listOfItems);
    }
}
