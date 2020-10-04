@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" />
@endsection

@section('navegacion')
    @include('ui.categoriasnav')
@endsection

@section('content')

<h1 class="text-2xl text-left mt-10 uppercase">{{ $vacante->titulo }}</h1>

<div class="mt-10 mb-20 md:flex items-start">

    <div class="md:w-3/5">
        <p class="block text-gray-700 font-bold my-4">
            Publicado: <span class="font-normal">{{ $vacante->created_at->diffForHumans() }}</span>
            por: <span class="font-normal">{{ $vacante->reclutador->name }}</span>
        </p>

        <p class="block text-gray-700 font-bold my-4">
            Categoria: <span class="font-normal">{{ $vacante->categoria->nombre }}</span>
        </p>

        <p class="block text-gray-700 font-bold my-4">
            Salario: <span class="font-normal">{{ $vacante->salario->nombre }}</span>
        </p>

        <p class="block text-gray-700 font-bold my-4">
            Ubicacion: <span class="font-normal">{{ $vacante->ubicacion->nombre }}</span>
        </p>

        <p class="block text-gray-700 font-bold my-4">
            Experiencia: <span class="font-normal">{{ $vacante->experiencia->nombre }}</span>
        </p>

        <h2 class="text-2xl text-left mt-10 text-gray-700 mb-4">Conocimientos y Tecnologias</h2>

        @php
            $arraySkills = explode(",", $vacante->skills)
            // $arraySkills = json_encode($arraySkills);
        @endphp

        @foreach ($arraySkills as $skill)
            <p class="inline-block border rounded border-gray-500 py-2 px-5 text-gray-700 my-2">
              {{ $skill }}
            </p>
        @endforeach

        <a href="/storage/vacantes/{{ $vacante->imagen }}" data-lightbox="imagen" data-title="Vacante {{ $vacante->titulo }}">
            <img src="/storage/vacantes/{{ $vacante->imagen }}" class="w-40 mt-10">
        </a>

        <h2 class="text-2xl text-left mt-10 text-gray-700 mb-3">Detalle de la busqueda</h2>

        <div class="descripcion mt-4 mb-5">
            {!!  $vacante->descripcion !!}
        </div>

    </div>

    @if ($vacante->activa == 1)
       @include('ui.contacto')
    @endif

</div>

@endsection
