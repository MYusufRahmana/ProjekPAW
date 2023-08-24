<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cinema = Cinema::all();
        return view('cinema.index')->with('cinema',$cinema);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('isAdmin');
        $cinema = Cinema::all();
        return view('cinema.create')->with('cinema',$cinema);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('isAdmin');
        $validatedData = $request->validate([
            'nama_ruangan'=>'required|string',
            'kategori' => 'required|string',
        ]);
        $validatedData['id']= uuid_create();

        $cinema = Cinema::create($validatedData);    
        return redirect()->route('cinema.index')->with("info","Data Cinema $cinema->nama_ruangan berhasil disimpan ke database");
    }

    /**
     * Display the specified resource.
     */
    public function show(Cinema $cinema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cinema $cinema)
    {
        $this->authorize('isAdmin');
        return view('cinema.edit')->with('cinema', $cinema);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cinema $cinema)
    {
        $this->authorize('isAdmin');
        $validatedData = $request->validate([
            'nama_ruangan'=>'required|string',
            'kategori' => 'required|string',

        ]);
        $cinema->update($validatedData);
        return redirect()->route('cinema.index')
        ->with('success','Data Cinema' . $validatedData['nama_ruangan'] . ' Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cinema $cinema)
    {
        $this->authorize('isAdmin');
        // $this->authorize('delete',$cinema);
        $cinema->delete();
        return back();
    }
}
