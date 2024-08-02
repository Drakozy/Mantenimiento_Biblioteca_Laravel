<h5 class="text-center">Detalles</h5> 
<div class="table-responsive">
    <table
        class="table table-striped"
    >
        <tbody>
            <tr class="">
                <td scope="row">Título</td>
                <td scope="row">{{$libros -> Título}}</td>
            </tr>
            <tr class="">
                <td scope="row">Ubicacion</td>
                <td scope="row">{{$libros -> Ubicacion}}</td>
            </tr>
            <tr class="">
                <td scope="row">Cantidad</td>
                <td scope="row">{{$libros -> Cantidad}} Disponibles</td>
            </tr>
            <tr class="">
                <td scope="row">Autor</td>
                <td scope="row">{{$libros -> autor->Nombre}}</td>
            </tr>
        </tbody>
    </table>
</div>