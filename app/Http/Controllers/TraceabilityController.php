<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;


class TraceabilityController extends Controller
{
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
           
        return back();
    }

    public function importExportView()
    {
       return view('users.testimport');
    }
}
