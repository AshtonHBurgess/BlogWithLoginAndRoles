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
                <div class="card-header">{{ __('Themes Details') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif






        <div class="form-group">
            <p>Name: {{$theme->name}}</p>
            <p>CDN_URL: <a href="{{$theme->cdn_url}}" target="new">{{$theme->cdn_url}}</a></p>
            <p>Created By: {{$theme->createdBy->name}}</p>
            <p>Updated Last By: {{$theme->updatedBy ? $theme->updatedBy->name : ''}}</p>

        </div>



        <button class="btn btn-primary"  type="submit">Submit</button>
        <a class= "btn border-danger" href ="{{ route('themes.index') }}">Back</a>






                </div>
            </div>
        </div>
    </div>
</div>
@endsection
