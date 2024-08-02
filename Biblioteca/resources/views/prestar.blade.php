<div>
    <h5 class="text-center">Prestar Libro {{$libros->Título}}</h5>
    <form action="{{ route('Prestamo.store') }}" method="post" class="form form-check">
        @csrf
        <input type="hidden" name="libro_id" value="{{ $libros->id }}">
        <div class="mb-3">
            <label for="Poseedor" class="form-label">Usuario</label>
            <input type="text" id="Poseedor" name="Poseedor" class="form-control" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Registrar Préstamo">
    </form>               
</div>