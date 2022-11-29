

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
                <div class="card-header">{{ __('User List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



{{--                    Sould be hidden if guest--}}

                        @if ($notGuest)
                            <a class= "btn btn-primary" href="{{ route('posts.create') }}">Create New Post</a>
                        @endif



                        <table class="table">
                            <thead>
                            <tr>

                                <th > Name</th>

                                <th colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                            <tr>
                                        <td >{{$post->title}}</td>
                                        <td>

                                           @php {{
                                            $isPostCreator=false;
                                            if($notGuest &&  $post->created_by == $activeUser->id) {
                                               $isPostCreator=true;
                                            }

                                            }}@endphp

                                            @if ( $isModeratorOrCreator && $notGuest && $isPostCreator)
                                            <a class="btn btn-warning"href="{{ route('posts.edit',[ $post->id]) }}">Edit</a>
                                            @endif


                                        </td>
                                        <td>
                                            @if ( $isModeratorOrCreator && $notGuest && $isPostCreator)
                                            <form method="POST" action="{{ route('posts.destroy',$post->id)}}">


                                                @csrf
                                            @method('DELETE')

                                                <button type="submit" class=" btn btn-danger">Delete</button>
                                            </form>
                                            @endif
                                                @endforeach
                                        </td>
                                    </tr>


{{--                            </tr>--}}
                            </tbody>
                        </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
