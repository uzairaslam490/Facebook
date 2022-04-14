<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id  
     * @return \Illuminate\Http\Response
     */
    public function userlogin($id)
    {
        $user = User::all()->where('id', $id);
        $posts = Post::orderBy('updated_at', 'DESC')->get()->where('user_id',$id);
        return view('index', compact('user', 'posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirmlogin(Request $request)
    {
        $name = $request->input('name');
        $password = $request->input('password');
        $users = User::all('id','name','password');
        foreach($users as $user){
            if($user->name === $name && $user->password === $password){
                $username = $user->name;
                $userid = $user->id;
                session('user', $username);
                session('id', $userid);
                return redirect('/Profile/'.$userid)->with('user', $username);
            }
        }
        return redirect('/')->with('message', 'Incorrect Username/Password');
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
        $user = User::all()->where('id', $id);
        return view('createpost', compact('user'));   
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
