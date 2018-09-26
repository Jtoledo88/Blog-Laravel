@extends('layouts.web')
@section('content')
<div class="col-md-8">
    <h1 class="page-header">
            Registro de Usuario
                      <small>Modulo de Registro</small>
    </h1>
    <form action="{{ route('register') }}" method="POST">
    {!! csrf_field() !!} <!--  asi evitamos que un robot use nuestro formulario -->
    {!! method_field('POST') !!}
   

    <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
    <input type="text" class="form-control" id="name" name="name" placeholder="Ingresa Nombre" value="{{ old('name') }}">
    @if($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>

    @endif
    </div>

    <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
    <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa Email" value="{{ old('email') }}">
    @if($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>

    @endif
    </div>
    <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
    <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa Password" value="{{ old('password') }}">
    @if($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>

    @endif
    </div>

    <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ingresa Password Confirmation">
    @if($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>

    @endif
    </div>

    <button class="form-control btn btn-primary">
    Registrar
    </button>
    </form>

</div>
@endsection