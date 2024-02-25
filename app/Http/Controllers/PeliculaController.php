<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['peliculas']=Pelicula::paginate(5);
        return view('pelicula.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pelicula.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$datosPelicula = request()->all();
        $datosPelicula = request()->except('_token');
        if($request->hasFile('foto')){
            $datosPelicula['foto']=$request->file('foto')->store('uploads','public');
        }
        Pelicula::insert($datosPelicula);
        //return response()->json($datosPelicula);
        return redirect('pelicula')->with('mensaje','Pelicula agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show(Pelicula $pelicula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pelicula=Pelicula::findOrFail($id);
        return view('pelicula.edit', compact('pelicula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosPelicula = request()->except(['_token','_method']);

        if($request->hasFile('foto')){
            $pelicula=Pelicula::findOrFail($id);
            Storage::delete('public/'.$pelicula->foto);
            $datosPelicula['foto']=$request->file('foto')->store('uploads','public');
        }

        Pelicula::where('id','=',$id)->update($datosPelicula);
        $pelicula=Pelicula::findOrFail($id);
        return view('pelicula.edit', compact('pelicula'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //
    $pelicula = Pelicula::findOrFail($id);

    if (Storage::delete('public/'.$pelicula->foto)){
        Pelicula::destroy($id);
    }


    return redirect('pelicula')->with('mensaje','Pelicula eliminada');
    }
}
