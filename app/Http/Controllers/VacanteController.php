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
    public function index()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(10);

        return view('vacantes.index', compact('vacantes'));
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
        // Validacion
        $data = $request->validate([
            'titulo'      => 'required|min:10',
            'categoria'   => 'required',
            'experiencia' => 'required',
            'ubicacion'   => 'required',
            'salario'     => 'required',
            'descripcion' => 'required',
            'imagen'      => 'required',
            'skills'      => 'required|min:3',
        ]);

        // Almacenar en la base de datos
        auth()->user()->vacantes()->create([
            'titulo'         => $data['titulo'],
            'imagen'         => $data['imagen'],
            'descripcion'    => $data['descripcion'],
            'skills'         => $data['skills'],
            'categoria_id'   => $data['categoria'],
            'experiencia_id' => $data['experiencia'],
            'ubicacion_id'   => $data['ubicacion'],
            'salario_id'     => $data['salario'],
        ]);

        return redirect()->action('VacanteController@index');

    }


    public function show(Vacante $vacante)
    {
        return view('vacantes.show')->with('vacante', $vacante);
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
