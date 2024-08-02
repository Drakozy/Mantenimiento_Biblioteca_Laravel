<!doctype html>
<html lang="en">
    <head>
        <title>Prestamos</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="//cdn.datatables.net/2.1.2/css/dataTables.dataTables.min.css">
        <style>
        .column {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }
        .modal-body {
            max-height: 60vh; /* Ajusta la altura máxima según sea necesario */
            overflow-y: auto; /* Agrega el scroll vertical */
        }
        </style>
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main class="container">
            <br>
            <div class="card">
                <div class="card-header h1 text-center">Sistema de Prestamos</div>
                <div class="card-body row">
                    <div class="col-md-3 column">
                    <form action="{{route('Prestamo.show')}}" method="get" class="modal-trigger">
                        <input type="submit" value="Libros prestados" class="btn btn-outline-success">
                    </form>

                    </div>

                    <div class="col-md-9 column">
                        <div class="table-responsive">
                            @if(session('alert'))
                            <div class="alert alert-danger" role="alert">
                                {{session('alert')}}
                            </div>                                
                            @endif
                            <table id="Datatable">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Registrar Préstamo</th>
                                        <th scope="col" class="text-center">Disponibilidad</th>
                                        <th scope="col" class="text-center">Libros</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($libros as $libro)
                                    <tr>
                                    <td class="text-center">
                                        <form action="{{ route('Prestamo.create', $libro->id) }}" method="get" class="modal-trigger">
                                            <input type="submit" value="Prestar" class="btn btn-outline-primary">
                                        </form>
                                    </td>
                                        <td class="text-center"> {{ $libro->disponibles }}/{{ $libro->Cantidad }} </td>
                                        <td>{{ $libro->Título}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <form action="{{route('Libro.index')}}" method="get">
                        <input type="submit" value="Regresar" class="btn btn-secondary">
                    </form>
                </div>
            </div>

            <!-- Modal Genérico -->
            <div class="modal fade" id="dynamicModal" tabindex="-1" aria-labelledby="dynamicModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="dynamicModalLabel"></h5><br>
                        </div>
                        <div class="modal-body" id="dynamicModalBody">
                            <!-- El contenido del modal se cargará aquí con AJAX -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <script src="//cdn.datatables.net/2.1.2/js/dataTables.min.js"></script>
        
        <script>//Databatles
            $(document).ready(function() {
                $('#Datatable').DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
                    }
                });
            });
        </script>

        <script>//Modal
            $(document).ready(function() {
                $('form.modal-trigger').submit(function(event) {
                    event.preventDefault(); 

                    var url = $(this).attr('action');

                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(response) {
                            $('#dynamicModalBody').html(response);
                            $('#dynamicModal').modal('show');
                        },
                        error: function(xhr) {
                            alert('Error al cargar el contenido del modal.');
                        }
                    });
                });
            });
        </script>
 
    </body>
</html>
