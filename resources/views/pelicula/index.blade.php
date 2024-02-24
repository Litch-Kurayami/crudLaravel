Mostrar la lista de las peliculas
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
            <td>{{ $pelicula->foto }}</td>
            <td>{{ $pelicula->nombre }}</td>
            <td>{{ $pelicula->anioEstreno }}</td>
            <td>{{ $pelicula->descripcion }}</td>
            <td>Editar | Borrar </td>
        </tr>
        @endforeach
    </tbody>
</table>