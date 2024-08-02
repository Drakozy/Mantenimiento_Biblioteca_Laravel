<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
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
        <style>
            .small-text {
            font-size: 0.75rem;
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
                <div class="card-header text-center fs-4">Registros Nuevos</div>
                <div class="card-body row" >
                    <div class="col-md-6 column">
                    @if(session('succeslibro'))
                        <div class="alert alert-primary" role="alert">{{session('succeslibro')}}</div>
                    @endif
                    <h5 class="text-center"> Registro de Libros</h5>
                    <form action="{{ route('Libro.store') }}" method="post" class="form form-check flex align-items-center">
                        @csrf
                        <label for="Título" class="text-center w-25">Titulo</label>
                        <input type="text" name="Título" id="Título" class="w-50 rounded" value="{{ old('Título') }}">
                        @error('Título')
                            <div class="alert alert-danger small-text">{{ $message }}</div>
                        @enderror
                        <br><br>

                        <label for="Ubicacion" class="text-center w-25">Ubicacion</label>
                        <input type="text" name="Ubicacion" id="Ubicacion" class="w-50 rounded" value="{{ old('Ubicacion') }}">
                        @error('Ubicacion')
                            <div class="alert alert-danger small-text">{{ $message }}</div>
                        @enderror
                        <br><br>

                        <label for="Cantidad" class="text-center w-25">Cantidad</label>
                        <input type="number" name="Cantidad" id="Cantidad" class="w-25 rounded" min="1" value="{{ old('Cantidad') }}">
                        @error('Cantidad')
                            <div class="alert alert-danger small-text">{{ $message }}</div>
                        @enderror
                        <br><br>

                        <select name="autor_id" id="autor_id" class="form-select form-select-sm">
                        <option value="">Seleccione un Autor</option>
                        @foreach ($autors as $autor)
                            <option value="{{ $autor->id }}" {{ old('autor_id') == $autor->id ? 'selected' : '' }}>
                                {{ $autor->Nombre }}
                            </option>
                        @endforeach
                        </select>
                        @error('autor_id')
                            <div class="alert alert-danger small-text">{{ $message }}</div>
                        @enderror
                        <br>
                        <div class="text-center">
                            <input type="submit" value="Registrar Libro" class="btn btn-success align-items-center ">
                        </div>
                    </form>                   
                    </div> 
                    
                    <div class="col-md-6 column">
                    @if(session('successautor'))
                        <div class="alert alert-primary" role="alert">{{session('successautor')}}</div>
                    @endif
                    <h5 class="text-center">Registro de Autores</h5>
                    <form action="{{route('Autor.store')}}" method="post" class="form form-check justify-content-center">
                        @csrf
                        <label for="Nombre" class="text-center w-25">Nombre</label>
                        <input type="text" name="Nombre" id="Nombre" class="w-50 rounded">
                        @error('Nombre')
                            <div class="alert alert-danger small-text">{{ $message }}</div>
                        @enderror
                        <br><br>

                        <label for="Fecha_Nacimiento" class="text-center w-25">Nacimiento</label>
                        <input type="date" name="Fecha_Nacimiento" id="Fecha_Nacimiento" class="w-50 rounded">
                        @error('Fecha_Nacimiento')
                            <div class="alert alert-danger small-text">{{ $message }}</div>
                        @enderror
                        <br><br>
                        <div class="text-center">
                            <input type="submit" value="Registrar Autor" class="align-items-center btn btn-success">
                        </div>
                    </form>  
                    </div> 
                </div>
                
                <div class="card-footer text-muted">
                    <form action="{{route('Libro.index')}}" method="get">
                        <input type="submit" value="Regresar" class="btn btn-secondary">
                    </form>
                </div>
                
                
            </div>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
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
    </body>
</html>
