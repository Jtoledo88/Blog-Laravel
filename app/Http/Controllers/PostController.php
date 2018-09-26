<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' =>'required',
            'image-file'=> 'image|mimes:png,jpg,bmp,svg',
        ]);

        $file_name = 'sinfoto.jpg';
        if($request->file('image-file')) {
            echo 1;
            $img = $request->file('image-file');
            $file_ext = $img->getClientOriginalExtension();
            $file_name = $request->input('slug').".".$file_ext;
            Storage::disk('imagesPosts')->put(
                $file_name,
                file_get_contents($img->getRealPath())
            );

        Post::create([
            'image-file'=> 'file_name',
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'resume' => $request->input('resume'),
            'content' => $request->input('content'),
            'author' => $request->input('author'),
            'post_date' => $request->input('post_date'),
            'status' => $request->input('status'),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()
        ->route('posts')
        ->with('status', 'Post Creado Satisfactoriamente');

       
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update([
            'image-file'=> 'file_name',
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'resume' => $request->input('resume'),
            'content' => $request->input('content'),
            'author' => $request->input('author'),
            'post_date' => $request->input('post_date'),
            'status' => $request->input('status'),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()
        ->route('posts')
        ->with('status', 'Post Modificado Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()
        ->route('posts')
        ->with('status', 'Post Eliminado Satisfactoriamente');
    }
}
