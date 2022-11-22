

@extends('layouts.app')

@section('content')
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

                    <a class= "btn btn-primary" href="{{ route('users.create') }}">Create New User</a>

                        <table class="table">
                            <thead>
                            <tr>

                                <th > Name</th>

                                <th colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                        <td >{{$user->name}}</td>

{{--                                        <td >{{$user->roles->name}}</td>--}}
                                <td>
                                   <ul>
                                       @foreach($user->roles as $role)
                                           <li>{{$role->name}}</li>
                                       @endforeach
                                   </ul>
                                </td>
{{--                                        <td >--}}
{{--                                            //$people->first()->languages->find(1)->name--}}

{{--                                        @foreach($person->languages as $language)--}}
{{--                                                @foreach($person->languges as $language)--}}
{{--                                                <li>{{$language->name}}</li>--}}
{{--                                            @endforeach--}}
{{--                                        </td>--}}
                                        <td>
                                            <a class="btn btn-warning"href="{{ route('users.edit',[ $user->id]) }}">Edit</a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('users.destroy',$user->id)}}">
                                                @csrf
                                            @method('DELETE')
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
