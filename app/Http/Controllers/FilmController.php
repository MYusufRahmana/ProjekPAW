<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $film = Film::all();
        return view('film.index')->with('film',$film);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $this->authorize('isAdmin');
        $film = Film::all();
        return view('film.create')->with('film',$film);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $this->authorize('isAdmin');
        $validatedData = $request->validate([
            'judul'=>'required|string',
            'deskripsi' => 'required|string',
            'durasi' => 'required|string',
            'genre' => 'required|string',
            'foto'=>'image'
        ]);
        $validatedData['id']= uuid_create();

        $fileName = time() . $request->foto->getClientOriginalName();
        $request->foto->move(public_path('/images'), $fileName);
        $validatedData['foto'] = $fileName;
        $film = Film::create($validatedData);    
        return redirect()->route('film.index')->with("info","Data film $film->judul berhasil disimpan ke database");
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {  
         $this->authorize('isAdmin');
        return view('film.edit')->with('film', $film);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {   
        $this->authorize('isAdmin');
        $validatedData = $request->validate([
            'judul'=>'required|string',
            'deskripsi' => 'required|string',
            'durasi' => 'required|string',
            'genre' => 'required|string',
            'foto'=>'image'
        ]);


        // // upload foto
        if ($request->foto) {
            $image_path = public_path('images' . $film->foto);
            File::exists($image_path) && File::delete($image_path);

            $fileName = time() . $request->foto->getClientOriginalName();
            $request->foto->move(public_path('images'), $fileName);
            $validatedData['foto'] = $fileName;
            $newProduk = $film->update($validatedData);
        } else {
            $newProduk = $film->update($validatedData);
        }
        return redirect()->route('film.index')
        ->with('success','Data Film' . $validatedData['judul'] . ' Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {   
        $this->authorize('isAdmin');
        // $this->authorize('delete',$film);
        $film->delete();
        return back();
    }

    public function deskripsi($id)
{   
    $film = Film::find($id);
    return view('film.deskripsi', compact('film'));
}
}
