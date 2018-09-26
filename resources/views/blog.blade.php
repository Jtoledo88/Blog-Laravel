@extends('layouts.web')     
@section('content') 
   <!-- Blog Entries Column -->
   <div class="col-md-8">
    
                 <h1 class="page-header">
                     Page Heading
                      <small>Secondary Text</small>
                  </h1>
           
            <!-- First Blog Post -->

        @foreach($posts as $post)
               <h2>
             <a href="#">{{ $post->title}}</a>
                    </h2>
                <p class="lead">
                     by <a href="index.php">{{$post->author}}</a>
                          </p>
                           <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
                           <hr>
                           <img class="img-responsive" src="{{ asset('images/posts/' . $post->image_name) }} " alt="">
                           <hr>
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
                           <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
           
                           <hr>
           
         @endforeach   

         <!-- Pager -->
         <ul class="pager">
                      <li class="previous">
                            <a href="{{ "?page=" . ($posts->currentPage() + 1) }}">&larr; Older</a>
                               </li>
                               @if($posts->currentPage() > 1)
                               <li class="next">
                                   <a href="{{ "?page=" . ($posts->currentPage() - 1) }}">Newer &rarr;</a>
                               </li>
                               @endif
                           </ul>


                           {{-- $posts->links() --}}  

           
              </div>
@endsection