<?php

namespace App\Http\Controllers;

use App\Models\FollowedUsers;
use App\Models\LikedPosts;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class LikedPostsController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function likes($id)
    {
        $post = Post::orderBy('created_at', 'DESC')->get()->first();
        $followedusers = FollowedUsers::where('user_id', $id)->where('followed', 'Yes')->get();
        LikedPosts::create([
            'user_id' => $id,
            'post_id' => $post->id
        ]);
        foreach($followedusers as $followeduser){
         LikedPosts::create([
             'user_id' => $followeduser->followeduser_id,
             'post_id' => $post->id
         ]);   
        }
        return redirect()->back()->with('post_success','Post Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $userid
     * @return \Illuminate\Http\Response
     */
    public function likepost($id, $userid)
    {
        $post = Post::where('id',$id)->first();
        Post::find($id)->increment('likes');
        LikedPosts::where('post_id',$post->id)->where('user_id', $userid)
        ->update([
            'Liked' => 'Yes'
        ]);
        return redirect()->back();
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function followerlikes($id,$userid)
    {
        $followeduser = User::where('id',$id)->first();
        $posts = Post::where('user_id', $id)->get();
        foreach($posts as $post){
            LikedPosts::create([
                'user_id' => $userid,
                'post_id' => $post->id
            ]);
        }
        return redirect()->back()->with('followeduser_success', 'You followed '.$followeduser->name);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
