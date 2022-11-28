<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
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

        $users = User::orderBy('name')->get();
        $roles = Role::orderBy('name')->get();
        $posts = Post::orderBy('title')->get();
//        foreach($roles as $role){echo $role->name;}

//        $users =  User::with('roles')->get();

        return view('users.index', compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $roles = Role::orderBy('name')->get();
        return view('users.create',compact(['roles']));
//        return view('users.create');
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
        $request->validate(
            [
                'name'=>['required','unique:users,name','max:100'],
                'email'=>['required','unique:users,email','email','max:255'],
                  'password'=>['required','max:255']
            ]
        );

        User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> Hash::Make($request->password),
        ])->roles()->sync($request->role_ids);
        return redirect(route('users.index'))->with('status', 'has been added!');

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
    public function edit(User $user)
    {
//        $countries = Country::orderBy('name')->get();
//        $languages = Language::orderBy('name')->get();
//        return view('people.edit',compact(['person','countries','languages']));


        $roles = Role::orderBy('name')->get();
        return view('users.edit',compact(['user','roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $request->validate(
            [
                'name'=>['required','unique:users,name,'.$user->id,'max:100','max:100'],
                'email'=>['required','unique:users,email,'.$user->id,'email','max:255'],
//                'password'=>['required','max:255']
            ]
        );



        $user->name= $request->name;
        $user->email= $request->email;
//        $user->password= $request->password;
        $user->save();
        $user->roles()->sync($request->role_ids);


        return redirect(route('users.index'))->with('status', 'has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect(route('users.index'))->with('status', 'has been deleted!');
    }
}
