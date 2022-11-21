<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $users =User::with('roles')->get();
        $users = User::orderBy('name')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
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
//
//        save the data as a new country
////        dd($request);
/// //            'name'=>'Susan ThemeAdmin',
//            'email'=>'susan@example.com',
//            'password'=>'$2a$12$cpC8wo9MCDafTYy1.3E7uemqKLvkUBBnrTo8q9uhmndsElwItFnd2',
//            'created_at' => Carbon::now(),
        User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> $request->password,
        ]);
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
        //
//

        return view('users.edit',compact('user'));
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
        //

//        $request->validate(
//            [
//                'name'=>['required','unique:countries,name,'.$user->id,'max:100'],
//                'flag_image_url'=>['required','unique:countries,flag_image_url,'.$user->id,'url', 'ends_with:jpg,jpeg,png,tiff,gif','max:255']
//            ]
//        );
        $request->validate(
            [
                'name'=>['required','unique:users,name,'.$user->id,'max:100','max:100'],
                'email'=>['required','unique:users,email,'.$user->id,'email','max:255'],
                'password'=>['required','max:255']
            ]
        );


        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;


        //            'name' => $request->name,
        //            'email'=> $request->email,
        //            'password'=> $request->password,
//        $user->flag_image_url = $request->flag_image_url;
        //        save the data as a new country

        //        dd($request);
        $user->save();//perform update

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
