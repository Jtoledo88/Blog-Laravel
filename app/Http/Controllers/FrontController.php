<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class FrontController extends Controller
{
    public function home(){
        //$saludo = "hola desde pagina principal";
        //$nombre = "Jonathan";
        //return view('index, ['saludo' => $saludo, 'nombre' => $nombre]);

        $posts = Post::with('user')
            ->orderBy('created_at', 'DESC')
            ->limit(3)
            ->get();
        //var_dump($posts[0]->title);

        return view('index', compact('posts'));
    }

    public function blog(){
        $posts = Post::with('user')
            ->orderBy('created_at', 'DESC')
            ->paginate(2); //funcion paginate es de 15 registro por pagina
        return view('blog', compact('posts')); //
            }

    public function contact(){
         return view('contact');
              }

}