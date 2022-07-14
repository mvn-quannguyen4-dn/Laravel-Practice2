<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dflydev\DotAccessData\Data;
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
        $userList = User::withCount('comments','posts')->sortable()->simplePaginate(10);
        return view('user.index', compact('userList'));
    }

    /**
     * Display a listing of the searched resource with key.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $data = $request->only(['name','posts','comments']);
        if($request->name){
            $userList = User::withCount('comments','posts')
            ->where('name','like',"%".$data['name']."%")->get();
        }
        else{
            $userList = User::withCount('comments','posts')->get();
        }
        if($request->posts){
            $userList = $userList->filter(function($user) use ($data){
                return $user->posts_count == $data['posts'];
            });
        }
        if($request->comments){
            $userList = $userList->filter(function($user) use ($data){
                return $user->comments_count == $data['comments'];
            });
            
        }
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
        // dd($request);
        $data = $request->all();
        $image = "/avatar/avatar.jfif";
        if($request->hasFile('avatar')){
            $image =  'storage/'.$request->file('avatar')->store(
                'image/avatar', 'public'
            );
            $data['avatar'] = $image;
        }
        $user = User::create([     
            'name' => $data['name'],
            'age' => $data['age'],
            'email' => $data['email'], 
            'password' => Hash::make($data['password']),
            'birthday' => $data['birthday'],
            'status' => rand(0,1),
            'avatar' => $data['avatar'],
        ]);
        \App\Models\Profile::create([
            'address' => $request->address,
            'tel' => $request->tel,
            'user_id' =>$user->id,
            'province' => $request->province,
        ]);
        return redirect()->to('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->load('posts','profile','comments');
        return view('user.show',compact('user'));
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
        $user->load('comments');
        return view('user.comment',compact('user'));
    }

    /**
     * Display a listing of comment of specific user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function Post(User $user)
    {
        $user->load('posts');
        return view('user.post',compact('user'));
    }
}
