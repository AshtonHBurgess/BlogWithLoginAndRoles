<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

//        $users = User::orderBy('name')->get();
//        $roles = Role::orderBy('name')->get();
        $posts = Post::orderBy('created_at','DESC')->get();
//        foreach($roles as $role){echo $role->name;}

//        $users =  User::with('roles')->get();

        return view('posts.index', compact('posts'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $user = User::orderBy('name')->get();
        return view('posts.create',compact(['user']));
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
        $userId = Auth::id();
        $request->validate(
            [
                'title'=>['required','unique:posts,title','max:100'],
                'image_url'=>['url', 'ends_with:jpg,jpeg,png,tiff,gif','max:255'],
                'content'=>['required','max:1500']

            ]
        );

        Post::create([



        'title' => $request->title,
            'content'=> $request->content,
            'updated_at' => Carbon::now(),
        'created_by' =>  $userId,
            'image_url'=> $request->image_url
        ]);
        return redirect(route('posts.index'))->with('status', 'Post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
//                $roles = Role::orderBy('name')->get();
                return view('posts.edit',compact(['post']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $request->validate(
            [
                'title'=>['required','unique:posts,title,'.$post->id,'max:100','max:100'],
                'image_url'=>['url', 'ends_with:jpg,jpeg,png,tiff,gif','max:255'],
                'content'=>['required','max:100'],
//                'password'=>['required','max:255']
            ]
        );


//        $userId = Auth::id();

        $post->title= $request->title;
        $post->image_url = $request->image_url;
        $post->content= $request->content;
//        $post->updated_by= $request->$userId;
        $post->updated_at= Carbon::now()->toDateTimeString();
        $post->save();
//        $post->roles()->sync($request->role_ids);


        return redirect(route('posts.index'))->with('status', 'Post has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect(route('posts.index'))->with('status', 'Post has been deleted!');

    }
}
