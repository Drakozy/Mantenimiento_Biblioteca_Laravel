<?php

namespace App\Http\Controllers;

use App\Models\Libro;
Use App\Models\Autor;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libro['libros']=Libro::all();
        return view('index',$libro);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $autor['autors']=Autor::all();
        return view('crear',$autor);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Título'=>'required|unique:libros,Título',
            'Ubicacion'=>'required',
            'Cantidad'=>'required|integer|min:1',
            'autor_id'=>'required'
        ]);
        $libro=request()->all();
        Libro::create($libro);
        return redirect()->route('Libro.create')->with ('succeslibro','Libro registrado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $libro['libros']=Libro::with('autor')->findOrFail($id);
        return view('detalles',$libro);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $libro['libros']=Libro::with('autor')->findOrFail($id);
        $autor['autors']=Autor::all();
        return view('actualizar',$libro,$autor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Título'=>'required',
            'Ubicacion'=>'required',
            'Cantidad'=>'required|integer|min:1',
            'autor_id'=>'required|exists:autors,id'
        ]);
        $libro=Libro::findOrFail($id);
        $libro->update($request->all());
        return redirect()->route('Libro.index')->with ('updatelibro','Libro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $libro=Libro::findOrFail($id);
        $libro->delete();
        return redirect()->route('Libro.index')->with ('alert','Libro eliminado exitosamente');
    }
}
