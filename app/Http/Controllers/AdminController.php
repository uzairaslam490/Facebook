<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Comments;
use App\Models\Post;
use App\Models\User;
use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('adminlogin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirmlogin(Request $request)
    {
        $adminname = $request->input('name');
        $adminpassword = $request->input('password');
        $hashedadminpassword = Hash::make($adminpassword);
        $admin = Admin::where('name', $adminname)->get()->first();
        if(Auth::attempt(['name' => $adminname, 'password' => $adminpassword])){
            return redirect('/dashboard/'.$admin->name);
        }
        return redirect('/admin')->with('message', 'Incorrect Username/Password');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function addadmin($name)
    {
        $admin = Admin::where('name', $name)->get()->first();
        return view('addadmin', compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newadmin(Request $request)
    {
        $request->validate([
            'Username' => 'required',
            'Email' => 'required',
            'Password' => 'required'
        ]);
        $adminname = $request->input('Username');
        $adminemail = $request->input('Email');
        $adminpassword = $request->input('Password');
        $confirmpassword = $request->input('ConfirmPassword');
        $hashedadminpassword = Hash::make($adminpassword);
        if($adminpassword!== $confirmpassword){
            return redirect()->back()->with('confirm_password', 'Password and Confirm Password field must match');
        }
        else {
            Admin::create([
                'name' => $adminname,
                'email' => $adminemail,
                'password' => $hashedadminpassword
            ]);
            return redirect()->back()->with('adminadded', 'Admin added Successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function dashboard($name)
    {
        $admin = Admin::where('name', $name)->get()->first();
        $posts = Post::all()->skip(0)->take(5);
        $users = User::all();
        $totalposts = count($posts);
        $admins = Admin::all();
        $totaladmins = count($admins);
        $comments = Comments::all();
        $totalcomments = count($comments);
        return view('dashboard', compact('admin','admins','posts','users','totalposts','totaladmins','totalcomments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminlogout($id)
    {
        $admin = Admin::where('id', $id)->get()->first();
        Auth::logout($admin);
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function posts($name)
    {
        $admin = Admin::where('name', $name)->get()->first();
        $posts = Post::all();
        $users = User::all();
        return view('posts',compact('admin','users','posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function comments($name)
    {
        $admin = Admin::where('name', $name)->get()->first();
        $comments = Comments::all();
        $posts = Post::all();
        $users = User::all();
        return view('tablecomments',compact('admin','comments','posts','users'));
    }


    /**
     * Display the specified resource.
     *
     * @param  string  $adminid
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fullpost($adminid,$id)
    {
        $post = Post::where('id',$id)->with('user')->get()->first();
        $comments = Comments::where('post_id', $post->id)->get();
        return view('fullpost',compact('post','comments'));
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
