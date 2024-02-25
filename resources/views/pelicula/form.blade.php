<label for="nombre"> Nombre </label>
<input type="text" name="nombre" value="{{ isset($pelicula->nombre)?$pelicula->nombre:'' }}"  id="nombre">
<br>
<label for="anioEstrno"> Año </label>
<input type="text" name="anioEstreno" value="{{ isset($pelicula->anioEstreno)?$pelicula->anioEstreno:'' }}" id="anioEstreno">
<br>
<label for="descripcion"> Descripcion </label>
<textarea name="descripcion" id="descripcion" rows="10" cols="40">{{ isset($pelicula->descripcion)?$pelicula->descripcion:'' }}</textarea>
<br>
<label for="foto"> Foto </label>
@if(isset($pelicula->foto))
<img src="{{ asset('storage').'/'.$pelicula->foto }}" width="100" alt="">
@endif
<input type="file" name="foto" value="" id="foto">
<br>
<input type="submit" value="Guardar datos">
<br>