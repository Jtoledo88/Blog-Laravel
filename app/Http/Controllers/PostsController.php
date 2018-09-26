<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
        echo "Invocando metodo index // devuelve una vista (listado)";
    }
    public function create(){
        echo "Invocando metodo create // devuelve una vista (formulario)";
    }
    public function store(Request $request){
        echo "Invocando metodo store // devuelve formulario por metodo post";
        echo "Redireccionando a index o pagina principal";
    }
    public function show($id){
        echo "Invocando metodo show // devuelve una vista con el detalle del objeto";
    }
    public function edit($id){
        echo "Invocando metodo show // devuelve una vista con el detalle del objeto";
    }
    public function update(Request $request, $id){
        echo "Invocando metodo update // Procesa Formulario por metodo POST";
        echo "Redireccionando a index o pagina principal";
    }
    public function destroy($id){
        echo "Invocando metodo update // Procesa Formulario por metodo por metodo POST";
        echo "Redireccionando a index o pagina principal";
    }
}