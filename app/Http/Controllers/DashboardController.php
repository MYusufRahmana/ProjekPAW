<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\cr;
use App\Models\Film;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $data['pesanan'] = Pesanan::all()->count();
        $data['film'] = Film::all()->count();
        $data['cinema'] = Cinema::all()->count();
        $data['pembayaran'] = Pembayaran::all()->count();
        $data['pesananfilm'] = DB::select
        ('SELECT judul, SUM(pesanans.jumlah) AS jumlah_tiket FROM pesanans 
        JOIN jadwals ON jadwals.id = pesanans.id_jadwal 
        JOIN films ON films.id = jadwals.id_film 
        GROUP BY judul');
        // dd($data['pesananfilm']);
        return view('dashboard', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cr $cr)
    {
        //
    }
}
