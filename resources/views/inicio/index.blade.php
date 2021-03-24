@extends('layouts.app')

@section('navegacion')
    @include('ui.categoriasnav')
@endsection

@section('content')

    <div class="flex lg:flex-row shadow bg-white">

        <div class="lg:w-1/2 px-8 lg:px-12 py-4 lg:py-10">
            <h1 class="mt-2 sm:mt-4 text-4xl font-bold text-gray-700 leading-tight">
                Encuentra un trabajo remoto o en tu país
                <span class="text-teal-500 mt-3 block">Para desarrolladores y Diseñadores Web</span>
            </h1>

            @include('ui.buscar')
        </div>

        <div class="hidden sm:block lg:w-1/2">
            <img class="inset-0 h-full w-full object-cover"
                 src="{{ asset('img/4321.jpg') }}" alt="devjobs">
        </div>

    </div>

    <div class="my-10 bg-gray-100 p-10 shadow">
        <h1 class="text-3xl text-gray-700 m-0">
            Nuevas
            <span class="font-bold">Vacantes</span>
        </h1>

        @include('ui.listadovacantes')
    </div>

@endsection
