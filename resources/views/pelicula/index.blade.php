@extends('layouts.app')
@section('content')
<div class="container">


<div id="alertContainer">
    <div class="alert alert-warning" role="alert">
        @if(Session::has('mensaje'))
            {{ Session::get('mensaje') }}
        @endif
    </div>
</div>

<script>
    // Espera a que el documento esté completamente cargado
    document.addEventListener("DOMContentLoaded", function() {
        var alertContainer = document.getElementById('alertContainer');

        // Verificar si hay un mensaje
        if (alertContainer.querySelector('.alert').innerText.trim() === '') {
            alertContainer.style.display = 'none'; // Ocultar el contenedor si no hay mensaje
        } else {
            // Mostrar el contenedor
            alertContainer.style.display = 'block';

            // Ocultar el mensaje después de 5 segundos
            setTimeout(function() {
                alertContainer.style.display = 'none';
            }, 5000); // 5000 milisegundos = 5 segundos
        }
    });
</script>



<a href="{{ url('pelicula/create') }}" class="btn btn-success"> Registrar nueva pelicula</a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Portada</th>
            <th>Nombre</th>
            <th>Año</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $peliculas as $pelicula )
        <tr>
            <td>{{ $pelicula->id }}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$pelicula->foto }}" width="200" alt="">
            </td>
            <td>{{ $pelicula->nombre }}</td>
            <td>{{ $pelicula->anioEstreno }}</td>
            <td>{{ $pelicula->descripcion }}</td>
            <td>
                
            <a  href="{{ url('/pelicula/'.$pelicula->id.'/edit') }}" class="btn btn-warning" >
                Edititar
            </a>
            <br/>
            <br/>
            <form action="{{ url('/pelicula/'.$pelicula->id) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar la pelicula?')" value="Borrar">

            </form>
        
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection