<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Film;
use App\Models\Jadwal;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('jadwal.index')->with('jadwal', $jadwal);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $this->authorize('isAdmin');
        $film = Film::all();
        $cinema = Cinema::all();
        $jadwal = Jadwal::all();
        return view('jadwal.create')->with('film', $film)
            ->with('cinema', $cinema);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('isAdmin');
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'jam_tayang' => 'required|string',
            'id_film' => 'required|string',
            'id_cinema' => 'required|string',
            'harga' => 'required|integer',
        ]);
        $validatedData['id'] = uuid_create();

        $jadwal = Jadwal::create($validatedData);
        return redirect()->route('jadwal.index')->with("info", "Data Jadwal $jadwal->tanggal  berhasil disimpan ke database");
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        $this->authorize('isAdmin');
        $film = Film::all();
        $cinema = Cinema::all();
        return view('jadwal.edit')
            ->with('jadwal', $jadwal)
            ->with('film', $film)
            ->with('cinema', $cinema);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $this->authorize('isAdmin');
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'jam_tayang' => 'required|string',
            'id_film' => 'required|string',
            'id_cinema' => 'required|string',
            'harga' => 'required|integer',

        ]);
        $jadwal->update($validatedData);
        return redirect()->route('jadwal.index')
            ->with('success', 'Data Jadwal' . $validatedData['tanggal'] . ' Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        $this->authorize('isAdmin');
        // $this->authorize('delete',$cinema);
        $jadwal->delete();
        return back();
    }
}
