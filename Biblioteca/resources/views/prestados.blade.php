<h5 class="text-center">Libros Prestados</h5> 
<table class="table">
    <thead>
        <tr>
            <th scope="col" class="text-center">Regresar</th>
            <th scope="col" class="text-center">Libro</th>
            <th scope="col" class="text-center">Usuario</th>
        </tr>
    </thead>
    <tbody>
    @foreach($prestamos as $prestamo)
            <tr>
                <td class="text-center">
                    <form action="{{route('Prestamo.update',$prestamo->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="submit" value="Recibir Libro" class="btn btn-outline-info">
                    </form>     
                </td>
                <td class="text-center">{{ $prestamo->libro->Título }}</td> <!-- Mostrar el título del libro -->
                <td class="text-center">
                    {{ $prestamo->Poseedor }} <!-- Mostrar el usuario que sacó el libro -->
                </td>
            </tr>
        @endforeach
    </tbody>
</table>