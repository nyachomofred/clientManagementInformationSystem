<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disneyplus;
use App\Exports\DisneyplusExport;
use Maatwebsite\Excel\Facades\Excel;

class DisneyplusController extends Controller
{
    //
    public function index()
    {
            $shows = Disneyplus::all();

            return view('list', compact('shows'));
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'show_name' => 'required|max:255',
            'series' => 'required|max:255',
            'lead_actor' => 'required|max:255',
        ]);
        Disneyplus::create($validatedData);
   
        return redirect('/disneyplus')->with('success', 'Disney Plus Show is successfully saved');
    }

    public function export() 
    {
            return Excel::download(new DisneyplusExport, 'disney.pdf');
    }

}
