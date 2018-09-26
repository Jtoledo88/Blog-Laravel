@extends('layouts.web')
@section('content')
<div class="col-md-8">
    <h1 class="page-header">
            Creacion de Posts
                      <small>Modulo de Post (Create)</small>
    </h1>

    <form action="{{ route('posts') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!} <!--  asi evitamos que un robot use nuestro formulario -->
    {!! method_field('POST') !!}


    <div class="form-group has-feedback {{ $errors->has('image-file') ? 'has-error' : '' }}">
    <input type="file" class="form-control" id="image-file" name="image-file">
    @if($errors->has('image-file'))
            <span class="help-block">
                <strong>{{ $errors->first('image-file') }}</strong>
            </span>

        @endif
    
    </div>

    <div class="form-group has-feedback {{ $errors->has('title') ? 'has-error' : '' }}">
        <input type="text" class="form-control" id="title" name="title" placeholder="Ingresa Titulo" value="{{ old('title') }}">
        @if($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>

        @endif
    </div>

    <div class="form-group has-feedback">
        <input type="text" class="form-control" id="slug" name="slug" placeholder="Ingresa Slug" value="{{ old('slug') }}">
    </div>

    <div class="form-group has-feedback">
        <input type="text" class="form-control" id="resume" name="resume" placeholder="Ingresa Resumen" value="{{ old('resume') }}">
    </div>

    <div class="form-group has-feedback">
        <textarea class="form-control" id="content" name="content" placeholder="Ingresa Contenido">{{ old('content') }}</textarea>
    </div>

    <div class="form-group has-feedback">
        <input type="text" class="form-control" id="author" name="author" placeholder="Ingresa Autor" value="{{ old('author') }}">
    </div>

    <div class="form-group has-feedback">
        <input type="date" class="form-control" id="post_date" name="post_date" placeholder="Ingresa Fecha" value="{{ old('post_date') }}">
    </div>

    <div class="form-group has-feedback">
        <select class="form-control" id="status" name="status">
        <option value="">SELECCIONE</option>
        <option value="1">Publicado</option>
        <option value="0">Borrador</option>
        </select>
    </div>

    <button class="form-control btn btn-primary">
    Enviar
    </button>
    </form>

</div>
@endsection