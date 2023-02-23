<?php

namespace App\Http\Controllers;

use App\Models\Concerts;
use Illuminate\Http\Request;

class ConcertsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $concerts = Concerts::all();
        return view('welcome', ['concerts' => $concerts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('concerts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Concerts::create($data);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Concerts $concerts)
    {
        //
        $concert = Concerts::find($concert->id);
        return view('concerts.show', ['concert' =>$concert]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Concerts $concerts)
    {
        //
        return view('concerts.edit', ['concert' => $concert]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Concerts $concerts)
    {
        //
        $data = $request->all();
        $concerts->update($data);
        return redirect('/concerts/' + $concerts->id);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Concerts $concerts)
    {
        //
        $concerts->delete();

        return redirect('/');
    }
}
