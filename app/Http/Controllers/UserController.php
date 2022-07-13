<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userList = DB::table('users')->get();
        return view('user.index', compact('userList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $image = "/avatar/avatar.jfif";
        if($request->hasFile('avatar')){
            $image =  $request->file('avatar')->store(
                'image/avatar', 'public'
            );
        }
        $id = DB::table('users')->insertGetId([
            'name' => $request->name,
            'age' => $request->age,
            'email' => $request->email, 
            'password' => Hash::make($request->password),
            'birthday' => $request->birthday,
            'status' => rand(0,1),
            'avatar' => $image,
        ]);
        DB::table('profiles')->insert([
            'address' => $request->address,
            'tel' => $request->tel,
            'user_id' =>$id
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $comments = DB::table('comments')
                    ->where('user_id','=',$user->id)
                    ->get();
        $posts = DB::table('posts')
                    ->where('user_id','=',$user->id)
                    ->get();
        $profile = DB::table('profiles')
                    ->where('user_id','=',$user->id)
                    ->first();
        return view('user.show',compact('user','comments','posts','profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    
    /**
     * Display a listing of comment of specific user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function Comment(User $user)
    {
        $comments = DB::table('comments')
        ->where('user_id', '=', $user->id)
        ->get();
        return view('user.comment',compact('comments'));
    }

    /**
     * Display a listing of comment of specific user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function Post(User $user)
    {
        $posts = DB::table('posts')
        ->where('user_id', '=', $user->id)
        ->get();
        return view('user.post',compact('posts','user'));
    }
}
