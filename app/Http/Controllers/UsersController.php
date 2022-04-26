<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\FollowedUsers;
use App\Models\LikedPosts;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function signup(){
        return view('signup');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function confirmsignup(Request $request){
         $username = $request->input('name');
         $password = $request->input('password');
         $hashedpassword = Hash::make($password);
         $email = $request->input('email');
         request()->validate([
             'name' => 'required',
             'password' => 'required'
         ]);
         User::create([
             'name' => $username,
             'email' => $email,
             'password' => $hashedpassword
         ]);
         return redirect('/followedusers');
     }
    /**
     * Display the specified resource.
     *
     * @param  string $name  
     * @return \Illuminate\Http\Response
     */
    public function userlogin($name)
    {
        if(Auth::check()){
        $user = User::all()->where('name', $name)->first();
        $UsersNotFollowed = User::where('id','!=',$user->id)->skip(0)->take(5)->with('followeduser')->get();
        $posts = Post::orderBy('updated_at', 'DESC')->where('user_id',$user->id)->with('likedposts')->get();
        return view('index', compact('user', 'posts', 'UsersNotFollowed'));
        }
        else{
            Auth::logout();
            return redirect('/');
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id  
     * @return \Illuminate\Http\Response
     */
    public function userlogout($id){
        $user = User::where('id',$id);
        if($user){
            Auth::logout($user);
            return redirect('/');
        }
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
        
        // $password = Hash::make($password);
        // User::create([
        //     'name' => $name,
        //     'password' => $password
        // ]);
        //$users = User::all('id','name','password');
        $user = User::where('name', $name)
            ->first();
        // if($user){
        //     Auth::loginUsingId($user->id);
        //     return redirect('/Profile/'.$user->id)->with('user', $user->name);
        // }
        // Auth::logout($user);
        //foreach($users as $user){
        //dd(Hash::check($password,$user->password));
        //     // if($user->name === $name && $user->password === $password){
        //     //     $username = $user->name;
        //     //     $userid = $user->id;
        //     //     session('user', $username);
        //     //     session('id', $userid);
        //     //     return redirect('/Profile/'.$userid)->with('user', $username);
        //     // }
            if(Auth::attempt(['name'=>$name, 'password'=>$password])){
                return redirect()->intended('/Profile/'.$user->name)->with('user',$user->name);
            }
        //}
        return Redirect::to('/')->with('message', 'Incorrect Username/Password');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comment($id)
    {
        $post = Post::all()->where('id', $id)->first();
        $user = User::all()->where('id', $post->user_id)->first();
        $comments = Comments::all()->where('post_id',$id);
        return view('comments', compact('post', 'comments', 'user'));   
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
