@if(Session::has('mensaje'))
{{Session::get('mensaje') }}

@endif

<a href="{{ url('pelicula/create') }}"> Registrar nueva pelicula</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
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
                <img src="{{ asset('storage').'/'.$pelicula->foto }}" width="100" alt="">
            </td>
            <td>{{ $pelicula->nombre }}</td>
            <td>{{ $pelicula->anioEstreno }}</td>
            <td>{{ $pelicula->descripcion }}</td>
            <td>
                
            <a href="{{ url('/pelicula/'.$pelicula->id.'/edit') }}">
                Edititar
            </a>
            | 
                
            <form action="{{ url('/pelicula/'.$pelicula->id) }}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" onclick="return confirm('¿Quieres borrar la pelicula?')" value="Borrar">

            </form>
        
            </td>
        </tr>
        @endforeach
    </tbody>
</table>