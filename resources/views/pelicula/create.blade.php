Formulario de cracion de pelicula
<form action="{{ url('/pelicula') }}" method="post" enctype="multipart/form-data">
@csrf

<label for="nombre"> Nombre </label>
<input type="text" name="nombre" id="nombre">
<br>

<label for="descripcion"> Descripcion </label>
<textarea name="descripcion" id="descripcion" rows="10" cols="40" ></textarea>
<br>

<label for="anioEstrno"> Año </label>
<input type="text" name="anioEstreno" id="anioEstreno">
<br>

<label for="foto"> Foto </label>
<input type="file" name="foto" id="foto">
<br>

<input type="submit" value="Guardar datos">
<br>
</form>