<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Salario;
use App\Models\Vacante;
use App\Models\Categoria;
use App\Models\Ubicacion;
use App\Models\Experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VacanteController extends Controller
{
    public function __construct()
    {
        // Validar que el usuario este autenticado y verificado
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return view('vacantes.index');
    }


    public function create()
    {
        // Consultas
        $categorias   = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones  = Ubicacion::all();
        $salarios     = Salario::all();
        $skills       = Skill::all();

        return view('vacantes.create')
            ->with('categorias', $categorias)
            ->with('experiencias', $experiencias)
            ->with('ubicaciones', $ubicaciones)
            ->with('salarios', $salarios)
            ->with('skills', $skills);
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Vacante $vacante)
    {
        //
    }


    public function edit(Vacante $vacante)
    {
        //
    }


    public function update(Request $request, Vacante $vacante)
    {
        //
    }


    public function destroy(Vacante $vacante)
    {
        //
    }

    public function imagen(Request $request)
    {
        $imagen = $request->file('file');
        $nombreImagen = time() . '.' . $imagen->extension();
        $imagen->move(public_path('storage/vacantes'), $nombreImagen);
        return response()->json(['correcto' => $nombreImagen]);
    }

    public function borrarimagen(Request $request)
    {
        if($request->ajax()) {
            $imagen = $request->get('imagen');

            if(File::exists('storage/vacantes/' . $imagen)) {
                File::delete('storage/vacantes/' . $imagen);
                return response('Imagen eliminada', 200);
            }
        }

    }

}
