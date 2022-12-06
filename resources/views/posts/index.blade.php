

@extends('layouts.app')

@section('content')

    @php
        $isModeratorOrCreator=false;
                $notGuest=false;
              if(!\Illuminate\Support\Facades\Auth::user() == null){
                  $activeUser=\Illuminate\Support\Facades\Auth::user();
              $notGuest=true;
                $roles =$activeUser->roles;
            foreach($roles as $role) {
                if ($role->id == 3) {
                    $isModeratorOrCreator = true;
                }
            }
            }





        @endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Post List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @if ($notGuest)
                            <a class= "btn btn-primary" href="{{ route('posts.create') }}">Create New Post</a>
                        @endif
                        <table class="table"   >
                            <thead>
                            <tr>
                                <th >Posts</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <div class="card" style="width: 18rem; border-color: #1a1e21">
                                    <img class="card-img-top" src="{{$post->image_url}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><h2>{{$post->title}} </h2></h5>
                                        <p class="card-text">{{$post->content}}</p>
                                        <p class="card-text">Author: {{$post->createdBy->name}}</p>
                                        <p class="card-text">Created at:{{$post->created_at}}</p>
{{--                                        <p class="card-text">{{$post->content}}</p>--}}
                                    </div>
                                    @auth
                                        <div class="card-body">


                                           @php
                                                $isPostCreator=false;
                                                if($post->created_by == $activeUser->id) {
                                                   $isPostCreator=true;
                                                }
                                           @endphp

                                            @if ( $isPostCreator )
    {{--                                            @if ( $isModeratorOrCreator || $isPostCreator && $notGuest )--}}
                                                <a class="btn btn-warning"href="{{ route('posts.edit',[ $post->id]) }}">Edit</a>
                                            @endif

                                            @if ( $isModeratorOrCreator || $isPostCreator )
                                                <form method="POST" action="{{ route('posts.destroy',$post->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class=" btn btn-danger">Delete</button>
                                                </form>
                                            @endif
                                        </div>
                                    @endauth
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
