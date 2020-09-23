@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />
@endsection

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')

    <h1 class="text-2xl text-center mt-10">Nueva Vacante</h1>

    <form class="max-w-lg mx-auto my-10" action="">

        {{-- Titulo --}}
        <div class="mb-3">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">
                Vacante:
            </label>
            <input id="titulo"
                   type="text"
                   class="p-3 bg-white rounded form-input w-full @error('titulo') is-invalid @enderror"
                   name="titulo" value="{{ old('titulo') }}"
                   autocomplete="titulo" autofocus>
        </div>

        {{-- Categoria --}}
        <div class="mb-3">
            <label for="categoria" class="block text-gray-700 text-sm mb-2">
                Categoria:
            </label>
            <select name="categoria"
                    id="categoria"
                    class="block appearance-none w-full border
                          border-gray-200 text-gray-700
                          rounded leading-tight focus:outline-none
                          focus:bg-white focus:border-gray-500
                          p-3 bg-gray-100">
                          <option disabled selected value="">- Selecciona -</option>

                          @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">
                                {{ $categoria->nombre }}
                            </option>
                          @endforeach
            </select>
        </div>

        {{-- Experiencia --}}
        <div class="mb-3">
            <label for="experiencia" class="block text-gray-700 text-sm mb-2">
                Experiencia:
            </label>
            <select name="experiencia"
                    id="experiencia"
                    class="block appearance-none w-full border
                          border-gray-200 text-gray-700
                          rounded leading-tight focus:outline-none
                          focus:bg-white focus:border-gray-500
                          p-3 bg-gray-100">
                          <option disabled selected value="">- Selecciona -</option>

                          @foreach ($experiencias as $experiencia)
                            <option value="{{ $experiencia->id }}">
                                {{ $experiencia->nombre }}
                            </option>
                          @endforeach
            </select>
        </div>

        {{-- Ubicacion --}}
        <div class="mb-3">
            <label for="ubicacion" class="block text-gray-700 text-sm mb-2">
                Ubicación:
            </label>
            <select name="ubicacion"
                    id="ubicacion"
                    class="block appearance-none w-full border
                          border-gray-200 text-gray-700
                          rounded leading-tight focus:outline-none
                          focus:bg-white focus:border-gray-500
                          p-3 bg-gray-100">
                          <option disabled selected value="">- Selecciona -</option>

                          @foreach ($ubicaciones as $ubicacion)
                            <option value="{{ $ubicacion->id }}">
                                {{ $ubicacion->nombre }}
                            </option>
                          @endforeach
            </select>
        </div>

        {{-- Salario --}}
        <div class="mb-3">
            <label for="salario" class="block text-gray-700 text-sm mb-2">
                Salario:
            </label>
            <select name="salario"
                    id="salario"
                    class="block appearance-none w-full border
                          border-gray-200 text-gray-700
                          rounded leading-tight focus:outline-none
                          focus:bg-white focus:border-gray-500
                          p-3 bg-gray-100">
                          <option disabled selected value="">- Selecciona -</option>

                          @foreach ($salarios as $salario)
                            <option value="{{ $salario->id }}">
                                {{ $salario->nombre }}
                            </option>
                          @endforeach
            </select>
        </div>

        {{-- Editor --}}
        <div class="mb-3">
            <label for="salario" class="block text-gray-700 text-sm mb-2">
                Descripción del Puesto:
            </label>

            <div class="editable"></div>
        </div>

        <button type="submit"
                class="bg-teal-500 w-full hover:bg-teal-700
                text-gray-100 p-3 mt-4 focus:outline-none
                focus:shadow-outline uppercase font-bold">
            Publicar Vacante
        </button>

    </form>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.js" integrity="sha512-aCPwYkaP9S5CeLKGxJDPs1soJuQd+Dza60RzTsXRDzexppY0U25fSyCuPlOo8HH9kIuVS6uSunEMI4OG96+4gg==" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editor = new MediumEditor('.editable');
        });
    </script>

@endsection
