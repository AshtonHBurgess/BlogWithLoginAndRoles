
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Post Edit') }}</div>

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


    <form action="{{  route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input name='title' type="text" class="form-control" id="title" value="{{ old('title')??$post->title }}" placeholder="Enter Title ">
        </div>
        @error('title')
        <div class="alert alert-danger">{{$message }}</div>
        @enderror




        <div class="form-group">
            <label for="image_url">Image Url</label>
            <input name='image_url' type="text" class="form-control" id="image_url" value="{{old('image_url')??$post->image_url}}" placeholder="enter Image Url" >
            @error('image_url')
            <div class="alert alert-danger">{{$message }}</div>
            @enderror





        <div class="form-group">
            <label for="content">Content</label>
            <input name='content' type="text" class="form-control" id="content" value="{{ old('content')??$post->content }}" placeholder="Enter Content ">
        </div>
        @error('content')
        <div class="alert alert-danger">{{$message }}</div>
        @enderror
        @csrf

        <button class="btn btn-primary"  type="submit">Submit</button>
        <a class= "btn border-danger" href ="{{ route('posts.index') }}">Cancel</a>

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
