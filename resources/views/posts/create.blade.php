{{--{{$errors}}--}}

{{--@error('flag_image_url')--}}
@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Posts Create') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    @php
                        $notGuest=false;
                         if(!\Illuminate\Support\Facades\Auth::user() == null)
                         {
                             $activeUser=\Illuminate\Support\Facades\Auth::user();
                         $notGuest=true;
                         }
                        @endphp

@if($notGuest)
    <form action="{{  route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input name='title' type="text" class="form-control" id="title" value="{{old('title')}}" placeholder="Enter Post Title">
        </div>
        @error('title')
        <div class="alert alert-danger">{{$message }}</div>
        @enderror


        <div class="form-group">
            <label for="content">Content</label>
            <input name='content' type="text" class="form-control" id="content" value="{{old('content')}}" placeholder="Enter content ">
        </div>
        @error('content')
        <div class="alert alert-danger">{{$message }}</div>
        @enderror


        <button class="btn btn-primary"  type="submit">Submit</button>
        <a class= "btn border-danger" href ="{{ route('posts.index') }}">Cancel</a>
        @csrf
    </form>

                        @else
                            <a class= "btn border-danger" href ="{{ route('posts.index') }}">Return</a>

                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
