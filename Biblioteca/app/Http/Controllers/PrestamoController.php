<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Libro;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::all(); // Obtener todos los libros

        foreach ($libros as $libro) {
            $prestamosActivos = $libro->prestamos()->whereNull('Fecha_Devolucion')->count();
            $libro->disponibles = $libro->Cantidad - $prestamosActivos;
        }
    
        return view('prestamos', ['libros' => $libros]); 
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $libro['libros'] = Libro::findOrFail($id);
        return view('prestar', $libro);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Poseedor' => 'required',
            'Fecha_Devolucion' => 'nullable',
            'libro_id' => 'required'
        ]);
    
        $prestamo=request()->all();
        $prestamo['Fecha_Prestamo']=Now();
        Prestamo::create($prestamo);
        return redirect()->route('Prestamo.index')->with('success', 'Préstamo registrado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $prestamo['prestamos'] = Prestamo::whereNull('Fecha_Devolucion')->with('libro')->get();
        return view('prestados', $prestamo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->Fecha_Devolucion = now();
        

        $libro = $prestamo->libro;
        $libro->save();
        
        $prestamo->save();
        
        return redirect()->route('Prestamo.index')->with('success', 'El libro ha sido recibido.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prestamo=Prestamo::findOrFail($id);
        $prestamo->delete();
        return redirect()->route('Prestamo.index')->with ('alert','Libro eliminado exitosamente');
    }
}
