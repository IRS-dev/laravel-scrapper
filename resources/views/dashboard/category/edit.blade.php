@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Update Category #{{$cat->id}}</h2>

            @if(session('error')!='')
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form method="post" action="{{ route('categories.update', ['id' => $cat->id]) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field("PUT") }}

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">

                            <strong>Title:</strong>

                            <input type="text" name="title" value="{{ $cat->title }}" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="submit" class="btn btn-primary" id="btn-save">Update</button>

                </div>

            </form>
        </div>
    </div>

@endsection