@extends('layouts.app')

@section('navegacion')
@endsection

@section('content')

    <div class="flex lg:flex-row shadow bg-white">

        <div class="lg:w-1/2 px-8 lg:px-12 py-12 lg:py-24">
            <p class="text-2xl text-gray-700">
                dev<span class="font-bold">Jobs</span>
            </p>
            <h1 class="mt-2 sm:mt-4 text-3xl font-bold text-gray-700 leading-tight">
                Encuentra un trabajo remoto o en tu país
                <span class="text-teal-500 block">Para desarrolladores y Diseñadores Web</span>
            </h1>
        </div>

        <div class="block lg:w-1/2">
            <img class="inset-0 h-full w-full object-cover"
                 src="{{ asset('img/4321.jpg') }}" alt="devjobs">
        </div>

    </div>

    <div class="my-10 bg-gray-100 p-10 shadow">
        <h1 class="text-3xl text-gray-700 m-0">
            Nuevas
            <span class="font-bold">Vacantes</span>
        </h1>

        <ul class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach ($vacantes as $vacante)
                <li class="p-10 border border-gray-300 bg-white shadow">
                    <h2 class="text-2xl font-bold text-teal-500">{{ $vacante->titulo }}</h2>

                    <p class="block text-gray-700 font-normal my-2">
                        {{ $vacante->categoria->nombre }}
                    </p>

                    <p class="block text-gray-700 font-normal my-2">
                        Ubicación:
                        <span class="font-bold">{{ $vacante->ubicacion->nombre }}</span>
                    </p>

                    <p class="block text-gray-700 font-normal my-2">
                        Experiencia:
                        <span class="font-bold">{{ $vacante->experiencia->nombre }}</span>
                    </p>

                    <a class="bg-teal-500 text-gray-100 mt-2 px-4 py-2 inline-block rounded font-bold text-sm"
                       href="{{ route('vacantes.show', ['vacante' => $vacante->id]) }}">
                        Ver Vacante
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
