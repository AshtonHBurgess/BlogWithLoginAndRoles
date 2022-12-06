
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Theme Edit') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

    <form action="{{  route('themes.update', $theme->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">name</label>
            <input name='name' type="text" class="form-control" id="name" value="{{ old('name')??$theme->name }}" placeholder="Enter Theme Name">
        </div>
        @error('name')
        <div class="alert alert-danger">{{$message }}</div>
        @enderror


        <div class="form-group">
            <label for="cdn_url">cdn_url</label>
            <input name='cdn_url' type="text" class="form-control" id="cdn_url" value="{{ old('cdn_url')??$theme->cdn_url }}" placeholder="Enter cdn_url">
        </div>
        @error('cdn_url')
        <div class="alert alert-danger">{{$message }}</div>
        @enderror


        @csrf

        <button class="btn btn-primary"  type="submit">Submit</button>
        <a class= "btn border-danger" href ="{{ route('themes.index') }}">Cancel</a>

    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
