<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use App\Photo;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view ('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:65535',
            'body' => 'required|max:65535',
            'photo' => 'mimes:jpeg,png,jpg'
        ]);
        $user = Auth::user();
        $validatedData['user_id'] = $user->id;
        if(isset($validatedData['photo'])) {
            $filename = date('Y-m-d')."_".$validatedData['photo']->getClientOriginalName();
            $result = $validatedData['photo']->move('images',$filename);
            $photo = Photo::create(['file' => $filename]);
            $validatedData['photo_id'] = $photo->id;
        }
        Post::create($validatedData);
        return redirect()->route('admin.posts.index');
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
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('categories','post'));
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
        $post = Post::findOrFail($id);
        $validatedData = $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:65535',
            'body' => 'required|max:65535',
            'photo' => 'mimes:jpeg,png,jpg'
        ]);
        if(isset($validatedData['photo'])) {
            $filename = date('Y-m-d')."_".$validatedData['photo']->getClientOriginalName();
            $result = $validatedData['photo']->move('images',$filename);
            $photo = Photo::create(['file' => $filename]);
            $validatedData['photo_id'] = $photo->id;
        }
        $result = $post->update($validatedData);
        // return [$request,$validatedData,$result];
        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if($post->photo) {
            unlink(public_path('images/'.$post->photo->file));
        }
        $post->delete();
        return redirect(route('admin.posts.index'));
    }
}
