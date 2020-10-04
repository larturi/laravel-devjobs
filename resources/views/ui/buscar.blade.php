<h2 class="my-10 text-2xl text-gray-700">Busca una Vacante</h2>

<form
    method="POST"
    action="{{ route('vacantes.buscar') }}">

    @csrf

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
                        <option
                            {{ old('categoria') == $categoria->id ? 'selected' : '' }}
                            value="{{ $categoria->id }}"
                            >
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
        </select>

        @error('categoria')
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-2 text-sm">
                <span class="block">{{ $message }}</span>
            </div>
        @enderror
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
                        <option
                           {{ old('ubicacion') == $ubicacion->id ? 'selected' : '' }}
                            value="{{ $ubicacion->id }}">
                            {{ $ubicacion->nombre }}
                        </option>
                      @endforeach
        </select>

        @error('ubicacion')
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-2 text-sm">
                <span class="block">{{ $message }}</span>
            </div>
        @enderror
    </div>

    <button type="submit"
            class="bg-teal-500 w-full hover:bg-teal-600 text-gray-100 font-bold
                  p-3 focus:outline-none focus:shadow-outline uppercase mt-10">
        Buscar Vacantes
    </button>

</form>
