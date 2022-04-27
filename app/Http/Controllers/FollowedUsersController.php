<?php

namespace App\Http\Controllers;

use App\Models\FollowedUsers;
use App\Models\User;
use Illuminate\Http\Request;

class FollowedUsersController extends Controller
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
        $newuser = User::orderBy('created_at', 'DESC')->get()->first();
        $oldusers = User::orderBy('created_at', 'ASC')->where('id','!=',$newuser->id)->get();
        foreach($oldusers as $olduser){
            FollowedUsers::create([
                'followeduser_id' => $olduser->id,
                'user_id' => $newuser->id
            ]);
            FollowedUsers::create([
                'followeduser_id' => $newuser->id,
                'user_id' => $olduser->id
            ]);
        }
        return redirect()->back()->with('signup-success','Signed Up Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  int  $userid
     * @return \Illuminate\Http\Response
     */
    public function followed($id,$userid){
        FollowedUsers::where('followeduser_id', $id)->where('user_id',$userid)->update([
            'followed' => 'Yes'
        ]);
        return redirect()->route('followerlikes',['id'=> $id, 'userid' =>$userid]);
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
