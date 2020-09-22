<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
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
        return 'Hola';
    }


    public function create()
    {
        //
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
