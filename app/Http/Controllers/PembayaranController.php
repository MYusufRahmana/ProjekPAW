<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   

        $pembayaran = Pembayaran::all();
        return view('pembayaran.index')->with('pembayaran',$pembayaran);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('isAdmin');
        $pembayaran = Pembayaran::all();
        return view('pembayaran.create')->with('pembayaran',$pembayaran);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('isAdmin');
        $validatedData = $request->validate([
            'metode_pembayaran' => 'required|string',
        ]);
        $validatedData['id_user'] =Auth::user()->id;

        $pembayaran = Pembayaran::create($validatedData);
        return redirect()->route('pembayaran.index')->with("info", "Data Jadwal $pembayaran->jumlah berhasil disimpan ke database");
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        $this->authorize('isAdmin');
        return view('pembayaran.edit')->with('pembayaran', $pembayaran);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $this->authorize('isAdmin');
        $validatedData = $request->validate([
            'metode_pembayaran' => 'required|string'


        ]);
        $pembayaran->update($validatedData);
        return redirect()->route('pembayaran.index')
            ->with('success', 'Data Pembayaran' . $validatedData['metode_pembayaran'] . ' Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $this->authorize('isAdmin');
        $pembayaran->delete();
        return back();
    }
}
