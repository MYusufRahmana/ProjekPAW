<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Film;
use App\Models\Jadwal;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $film=Film::all();
        //  $cinema =Cinema::all();
        $jadwal =Jadwal::all();
        $pembayaran = Pembayaran::all();
        $pesanan = Pesanan::all();
        return view('pesanan.index')->with('pesanan',$pesanan)
        ->with('jadwal',$jadwal);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $film =Film::all();
        $cinema =Cinema::all();
        $jadwal =Jadwal::all();
        $pembayaran = Pembayaran::all();

        return view('pesanan.create')->with('film',$film)
        ->with('cinema',$cinema)
        ->with('jadwal',$jadwal)
        ->with('pembayaran',$pembayaran);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_jadwal' => 'required|string',
            'jumlah' => 'required|integer',
            'id_pembayaran' => 'required|string'
        ]);
        $validatedData['id'] = uuid_create();

        if($validatedData) {
            $pesanan = Pesanan::create($validatedData);
            return redirect()->route('pesanan.index')->with("info", "Data Jadwal $pesanan->jumlah berhasil disimpan ke database");
        }
        else {
            return back()->with("info","Error");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        $this->authorize('isAdmin');
        $jadwal = Jadwal::all();
        $pembayaran = Pembayaran::all();
        return view('pesanan.edit')
        ->with('pesanan', $pesanan)
        ->with('jadwal', $jadwal)
        ->with('pembayaran', $pembayaran);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $this->authorize('isAdmin');
        $validatedData = $request->validate([
            'id_jadwal' => 'required|string',
            'jumlah' => 'required|integer',
            'id_pembayaran' => 'required|string',


        ]);
        $pesanan->update($validatedData);
        return redirect()->route('pesanan.index')
            ->with('success', 'Data Pesanan' . $validatedData['jumlah'] . ' Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        $this->authorize('isAdmin');
        $pesanan->delete();
        return back();
    }
}
