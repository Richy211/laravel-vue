<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thought;

class ThoughtController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Método para obtener los pensamientos del usuario autenticado
    public function index()
    {
        return Thought::where('user_id', auth()->id())->get();
    }

    // Método para guardar un nuevo pensamiento
    public function store(Request $request)
    {
        // Muestra los datos que están llegando (para depuración)
      /*   dd($request->all()); */

        // Corrección: Asegúrate de usar el nombre correcto de la variable
        $thought = new Thought();
        $thought->description = $request->description;  // Uso de $thought correctamente
        $thought->user_id = auth()->id();  // Asignación del user_id
        $thought->save();  // Guardar el pensamiento

        return $thought;
    }

    // Método para actualizar un pensamiento existente
    public function update(Request $request, $id)
    {
        $thought = Thought::find($id);
        $thought->description = $request->description;
        $thought->save();

        return $thought;
     
    }

    // Método para eliminar un pensamiento
    public function destroy($id)
    {
        $thought = Thought::find($id);
        $thought->delete();
    }
}
