{{--{{$errors}}--}}

{{--@error('flag_image_url')--}}
@extends('layouts.app')

{{--@error('name')--}}
{{--{{message}}--}}
{{--@enderror--}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users Create') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif




    <form action="{{  route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input name='name' type="text" class="form-control" id="name" value="{{old('name')}}" placeholder="Enter User Name">
        </div>
        @error('name')
        <div class="alert alert-danger">{{$message }}</div>
        @enderror


        <div class="form-group">
            <label for="email">Email Address</label>
            <input name='email' type="text" class="form-control" id="email" value="{{old('email')}}" placeholder="Enter Email Address">
        </div>
        @error('email')
        <div class="alert alert-danger">{{$message }}</div>
        @enderror

        <div class="form-group">
            <label for="password">password</label>
            <input name='password' type="text" class="form-control" id="password" value="{{old('password')}}" placeholder="Enter password">
        </div>
        @error('password')
        <div class="alert alert-danger">{{$message }}</div>
        @enderror


        <button class="btn btn-primary"  type="submit">Submit</button>
        <a class= "btn border-danger" href ="{{ route('users.index') }}">Cancel</a>
        @csrf
    </form>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
