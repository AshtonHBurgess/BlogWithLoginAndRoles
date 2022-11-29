

@extends('layouts.app')

@section('content')


    @php
        {{


            $roles =\Illuminate\Support\Facades\Auth::user()->roles;
             $isModeratorOrCreator=false;
        foreach($roles as $role) {
            if ($role->id == 3) {
                $isModeratorOrCreator = true;
            }
        }

        }}
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
                    <a class= "btn btn-primary" href="{{ route('posts.create') }}">Create New Post</a>

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

{{--                                        <td >{{$user->roles->name}}</td>--}}
{{--                                <td>--}}
{{--                                   <ul>--}}
{{--                                       @foreach($user->roles as $role)--}}
{{--                                           <li>{{$role->name}}</li>--}}
{{--                                       @endforeach--}}
{{--                                   </ul>--}}
{{--                                </td>--}}
{{--                                        <td >--}}
{{--                                            //$people->first()->languages->find(1)->name--}}

{{--                                        @foreach($person->languages as $language)--}}
{{--                                                @foreach($person->languges as $language)--}}
{{--                                                <li>{{$language->name}}</li>--}}
{{--                                            @endforeach--}}
{{--                                        </td>--}}
                                        <td>


                                            @if ( $isModeratorOrCreator )
                                            <a class="btn btn-warning"href="{{ route('posts.edit',[ $post->id]) }}">Edit</a>
                                            @endif


                                        </td>
                                        <td>
                                            @if ( $isModeratorOrCreator )
                                            <form method="POST" action="{{ route('posts.destroy',$post->id)}}">
                                                @csrf
                                            @method('DELETE')
                                                @endif
                                                <button type="submit" class=" btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                            @endforeach

{{--                            </tr>--}}
                            </tbody>
                        </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
