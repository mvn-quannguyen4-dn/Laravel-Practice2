<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
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
        $profile = \App\Models\Profile::create([
            'address' => $request->address,
            'tel' => $request->tel,
            'user_id' =>$user->id,
            'province' => $request->province,
        ]);
        return response()->json([$user, $profile], 200);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $user->toArray();
        if($request->hasFile('avatar')){
            $data['avatar'] = 'storage/'.$request->file('avatar')->store(
                'image/avatar', 'public'
            );
        }        
        if($request->has('name')){
            $data['name'] = $request->name;
        }
        if($request->has('birthday')){
            $data['birthday'] = $request->birthday;
        }
        if($request->has('age')){
            $data['age'] = $request->age;
        }
        $user = $user->update([     
            'name' => $data['name'],
            'age' => $data['age'],
            'birthday' => $data['birthday'],
            'status' => rand(0,1),
            'avatar' => $data['avatar'],
        ]);
        return response()->json([$user], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
    }
}
