<h1> {{ $modo }} pelicula </h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach( $errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>

@endif

<div class="form-group">
<label for="nombre"> Nombre </label>
<input type="text" class="form-control" name="nombre" value="{{ isset($pelicula->nombre)?$pelicula->nombre:OLD('nombre') }}"  id="nombre">
</div>

<div class="form-group">
<label for="anioEstrno"> Año </label>
<input type="text" class="form-control" name="anioEstreno" value="{{ isset($pelicula->anioEstreno)?$pelicula->anioEstreno:old('anioEstreno') }}" id="anioEstreno">
</div>

<div class="form-group">
<label for="descripcion"> Descripcion </label>
<textarea name="descripcion" class="form-control" id="descripcion" rows="10" cols="40">{{ isset($pelicula->descripcion)?$pelicula->descripcion:old("descripcion") }}</textarea>
</dv>
<br/>

<div class="form-group">
@if(isset($pelicula->foto))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$pelicula->foto }}" width="200" alt="">
@endif
<input type="file" class="form-control" name="foto" value="" id="foto">
</idv>
<br/>
<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary"  href="{{ url('pelicula/') }}"> Regresar </a>

<br>