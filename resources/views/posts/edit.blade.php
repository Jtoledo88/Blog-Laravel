@extends('layouts.web')
@section('content')
<div class="col-md-8">
    <h1 class="page-header">
            Creacion de Posts
                      <small>Modulo de Post (Create)</small>
    </h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
    {!! csrf_field() !!} <!--  asi evitamos que un robot use nuestro formulario se utiliza put para poder editar el otro controlador que ya fue creado -->
    {!! method_field('PUT') !!}
    <div class="form-group has-feedback">
        <input type="text" class="form-control" id="title" name="title" placeholder="Ingresa Titulo" value="{{ $post->title }}">
    </div>

    <div class="form-group has-feedback">
        <input type="text" class="form-control" id="slug" name="slug" placeholder="Ingresa Slug" value="{{ $post->slug }}">
    </div>

    <div class="form-group has-feedback">
        <input type="text" class="form-control" id="resume" name="resume" placeholder="Ingresa Resumen" value="{{ $post->resume }}">
    </div>

    <div class="form-group has-feedback">
        <textarea class="form-control" id="content" name="content" placeholder="Ingresa Contenido">{{ $post->content }}</textarea>
    </div>

    <div class="form-group has-feedback">
        <input type="text" class="form-control" id="author" name="author" placeholder="Ingresa Autor" value="{{ $post->author }}">
    </div>

    <div class="form-group has-feedback">
        <input type="date" class="form-control" id="post_date" name="post_date" placeholder="Ingresa Fecha" value="{{ $post->post_date->format('Y-m-d h:i:s') }}">
    </div>

    <div class="form-group has-feedback">
        <select class="form-control" id="status" name="status">
        <option value="">SELECCIONE</option>
        <option value="1" @if($post->status==1) selected @endif>Publicado</option>
        <option value="0" @if($post->status==0) selected @endif>Borrador</option>
        </select>
    </div>

    <button class="form-control btn btn-warning">
    Guardar
    </button>
    </form>

</div>
@endsection