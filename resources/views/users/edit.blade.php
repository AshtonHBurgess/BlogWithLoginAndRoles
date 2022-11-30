
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users Edit') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

    <form action="{{  route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input name='name' type="text" class="form-control" id="name" value="{{ old('name')??$user->name }}" placeholder="Enter User Name">
        </div>
        @error('name')
        <div class="alert alert-danger">{{$message }}</div>
        @enderror


        <div class="form-group">
            <label for="email">Email Address</label>
            <input name='email' type="text" class="form-control" id="email" value="{{ old('email')??$user->email }}" placeholder="Enter Email Address">
        </div>
        @error('email')
        <div class="alert alert-danger">{{$message }}</div>
        @enderror

        <label for="user_id" class="form-label">Roles</label>
        @foreach($roles as $role)

            <div class="form-check">

                @php  $checked = '' @endphp

                @if(old('role_ids'))
                    @if(in_array($role->id, old('role_ids')))
                        @php $checked = 'checked' @endphp
                    @endif
                @else
                    @if($user->roles->contains($role))
                        @php $checked = 'checked' @endphp
                    @endif
                @endif

                <input {{$checked}} class="form-check-input" type="checkbox" value="{{$role->id}}" id="role-{{$role->id}}" name="role_ids[]">
                <label class="form-check-label" for="role-{{$role->id}}">
                    {{$role->name}}
                </label>
            </div>
        @endforeach

        @csrf

        <button class="btn btn-primary"  type="submit">Submit</button>
        <a class= "btn border-danger" href ="{{ route('users.index') }}">Cancel</a>

    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
