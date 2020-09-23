<?php

namespace App\Http\Controllers;

use App\Models\Salario;
use App\Models\Vacante;
use App\Models\Categoria;
use App\Models\Ubicacion;
use App\Models\Experiencia;
use Illuminate\Http\Request;

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

        return view('vacantes.create')
            ->with('categorias', $categorias)
            ->with('experiencias', $experiencias)
            ->with('ubicaciones', $ubicaciones)
            ->with('salarios', $salarios);
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
}
