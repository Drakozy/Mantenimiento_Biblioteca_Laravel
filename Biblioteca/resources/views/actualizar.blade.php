<div>
    @if(session('updatelibro'))
        <div class="alert alert-primary" role="alert">{{ session('updatelibro') }}</div>
    @endif
    <h5 class="text-center">Actualizar Libro</h5>
    <form action="{{ route('Libro.update', $libros->id) }}" method="post" class="form form-check flex align-items-center">
        @csrf
        @method('PUT')

        <label for="Título" class="text-center w-25">Titulo</label>
        <input type="text" name="Título" id="Título" class="w-50 rounded" value="{{ old('Título', $libros->Título) }}">
        @error('Título')
            <div class="alert alert-danger small-text">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="Ubicacion" class="text-center w-25">Ubicacion</label>
        <input type="text" name="Ubicacion" id="Ubicacion" class="w-50 rounded" value="{{ old('Ubicacion', $libros->Ubicacion) }}">
        @error('Ubicacion')
            <div class="alert alert-danger small-text">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="Cantidad" class="text-center w-25">Cantidad</label>
        <input type="number" name="Cantidad" id="Cantidad" class="w-25 rounded" min="1" value="{{ old('Cantidad', $libros->Cantidad) }}">
        @error('Cantidad')
            <div class="alert alert-danger small-text">{{ $message }}</div>
        @enderror
        <br><br>

        <select name="autor_id" id="autor_id" class="form-select form-select-sm">
            @foreach ($autors as $autor)
                <option value="{{ $autor->id }}" {{ old('autor_id', $libros->autor_id) == $autor->id ? 'selected' : '' }}>
                    {{ $autor->Nombre }}
                </option>
            @endforeach
        </select>
        @error('autor_id')
            <div class="alert alert-danger small-text">{{ $message }}</div>
        @enderror
        <br>
        <div class="text-center">
            <input type="submit" value="Actualizar Libro" class="btn btn-success align-items-center ">
        </div>
    </form>                   
</div>
