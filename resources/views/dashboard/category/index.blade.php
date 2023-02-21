
@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Categories</h2>

            <a href="{{ route('categories.create') }}" class="btn btn-warning pull-right">Add new</a>
                <table class="table table-bordered">
                    <tr>
                        <td>Title</td>
                        {{-- <td>Actions</td> --}}
                    </tr>
                    @foreach($cats as $cat)
                        <tr>
                            <td>{{ $cat->title }}</td>
                            {{-- <td>
                                <a href="dashboard/categories/{{ $cat->id }}/edit"><i class="glyphicon glyphicon-edit"></i> </a>
                            </td> --}}
                        </tr>
                    @endforeach
                </table>

        </div>
    </div>

@endsection