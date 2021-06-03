<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Traceability;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;


class TraceabilityController extends Controller
{
    // public function import() 
    // {
    //     Excel::import(new UsersImport,request()->file('file'));
           
    //     return back();
    // }

    // public function importExportView()
    // {
    //    return view('users.testimport');
    // }
    public function index()
    {
        $traces = Traceability::get();
        return view('admins.tracea.index',compact('traces'));
    }

    public function create()
    {
        return view('admins.tracea.create_trace');
    }

    public function store(Request $request)
    {
        $request->validate([
            'farm_code' => 'required',
            'farm_address' => 'required',
            'harvest_date' => 'required',
            'tank_code' => 'required',
            'packing_date' => 'required',
            'lot_code' => 'required',
            'approval_number' => 'required',
        ]);

        $data = $request->all();

        $trace = new Traceability();
        $trace->traceacode = str_replace( ' ', '', $data['tank_code'] ).'-'.str_replace( ' ', '', $data['lot_code'] ).'-'.str_replace( '-', '', $data['harvest_date'] ).'-'.str_replace( '-', '', $data['packing_date'] );
        $trace->farm_code = $data['farm_code'];
        $trace->farm_address = $data['farm_address'];
        $trace->harvest_date = $data['harvest_date'];
        $trace->tank_code = $data['tank_code'];
        $trace->packing_date = $data['packing_date'];
        $trace->lot_code = $data['lot_code'];
        $trace->approval_number = $data['approval_number'];
        $trace->save();

        Session::flash('success_message','Tracea has been added successfully!');

        return redirect()->route('admin.tracea.index');

    }

    public function delete($id)
    {
        $trace = Traceability::where('id',$id)->delete();

        Session::flash('success_message','Tracea has been deleted successfully!');

        return redirect()->route('admin.tracea.index');
    }
}
