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
                <div class="card-header">{{ __('Themes Create') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

    <form action="{{  route('themes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input name='name' type="text" class="form-control" id="name" value="{{old('name')}}" placeholder="Enter Theme Name">
        </div>
        @error('name')
        <div class="alert alert-danger">{{$message }}</div>
        @enderror

        <div class="form-group">
            <label for="cdn_url">cdn_url</label>
            <input name='cdn_url' type="text" class="form-control" id="cdn_url" value="{{old('cdn_url')}}" placeholder="Enter Theme cdn_url">
        </div>
        @error('cdn_url')
        <div class="alert alert-danger">{{$message }}</div>
        @enderror


        <button class="btn btn-primary"  type="submit">Submit</button>
        <a class= "btn border-danger" href ="{{ route('themes.index') }}">Cancel</a>
        @csrf
    </form>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
