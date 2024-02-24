<label for="nombre"> Nombre </label>
<input type="text" name="nombre" value="{{ $pelicula->nombre }}"  id="nombre">
<br>
<label for="anioEstrno"> Año </label>
<input type="text" name="anioEstreno" value="{{ $pelicula->anioEstreno }}" id="anioEstreno">
<br>
<label for="descripcion"> Descripcion </label>
<textarea name="descripcion" id="descripcion" rows="10" cols="40">{{ $pelicula->descripcion }}</textarea>
<br>
<label for="foto"> Foto </label>
{{ $pelicula->foto }}
<input type="file" name="foto" value="" id="foto">
<br>
<input type="submit" value="Guardar datos">
<br>