@extends('layouts.web')
@section('content')

<div class="col-md-8">
    
                 <h1 class="page-header">
                     Listado de Posts
                      <small>Modulo de Posts</small>
                  </h1>

             @if(session('status'))
             <div class="alert alert-success alert-dismissible" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <strong>Info!</strong> {{ session('status') }}
            </div>
              @endif

                <a href="{{ route('posts.create') }}" class="btn btn-success">
                <i class="glyphicon glyphicon-list"></i> New Post
                </a>

             <hr>

        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Resume</th>
                <th>Post Date</th>
                <th>Author</th>
                <th>Created At</th>
                <th colspan="2">Actions</th>
            </tr>

            @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->resume }}</td>
            <td>{{ $post->post_date->format('d/m/Y') }}</td>
            <td>{{ $post->author }}</td>
            <td>{{ $post->created_at->format('d-m-Y h:i:s') }}</td>
            <td>
                <!-- <a href="{{ url('/posts/',$post->id.'/edit')}}" class="btn btn-primary"> -->
                <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>
            </td>
            <td>
                <button class="btn btn-danger" data-action="{{ route('posts.destroy', $post->id) }}" data-name="{{ $post->title }}" data-toggle="modal"
                 data-target="#confirm-delete">
                     <i class="glyphicon glyphicon-trash"></i>
                </button>
                              
            </td>
        </tr>

        @endforeach
        
        <tr>
            <td colspan="8"> {{ $posts->links() }} </td>
        </tr>
        </table>
</div>
<div class="modal fade" id="confirm-delete" tabindex="-1"
                 role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                        </div>
                        <div class="modal-body">
                            <p>¿Seguro que desea eliminar este
                                registro?</p>
                            <p class="nombre"></p>
                        </div>
                        <div class="modal-footer">
                            <form class="form-inline form-delete"
                                  role="form"
                                  method="POST"
                                  action="">
                                {!! method_field('DELETE') !!}
                                {!! csrf_field() !!}
                                <button type="button"
                                        class="btn btn-default"
                                        data-dismiss="modal">Cancelar
                                </button>
                                <button id="delete-btn"
                                        class="btn btn-danger"
                                        title="Eliminar">Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
              </div>  
@endsection