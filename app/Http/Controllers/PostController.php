<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\LikedPosts;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request->validate([
            'post' => 'required',
            'image' => 'required',
        ]);
        $newImageName = uniqid() . '-' . 'PostImage' . '.' . 
        $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        Post::create([
            'post' => $request->input('post'),
            'image' => $newImageName,
            'user_id' =>  $id    
        ]);
        return redirect('/likes/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('id', $id)->first();
        $comments = Comments::where('post_id', $id);
        $likes = LikedPosts::where('post_id', $id);
        unlink("images/".$post->image);
        $likes->delete();
        $comments->delete();
        $post->delete();
        return Redirect::back()->with('postdeleted_success','Post Deleted Successfully!');
    }
}
