

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Themes List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class= "btn btn-primary" href="{{ route('themes.create') }}">Create New Theme</a>

                        <table class="table">
                            <thead>
                            <tr>

                                <th > Name</th>
                                <th > Created By</th>
                                <th > Updated By</th>
                                <th colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($themes as $theme)
                            <tr>
                                        <td >{{$theme->name}}</td>
                                <td >{{$theme->createdBy->name}}</td>


                                <td >{{$theme->updatedBy ? $theme->updatedBy->name : ''}}</td>
{{--                                <a class="btn btn-primary" href="{{ route('themes.show',[ $themes->id]) }}">Details</a>--}}
                                <td>  <a class="btn btn-primary"href="{{ route('themes.show',[ $theme->id]) }}">Show</a></td>
                                @if($theme->id !=1)
                                        <td>
                                            <a class="btn btn-warning"href="{{ route('themes.edit',[ $theme->id]) }}">Edit</a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('themes.destroy',$theme->id)}}">

                                                @csrf
                                            @method('DELETE')
                                                <button type="submit" class=" btn btn-danger">Delete</button>

                                            </form>
                                        </td>
                                @endif
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
