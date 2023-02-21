@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Websites</h2>

            <a href="{{ route('websites.create') }}" class="btn btn-warning pull-right">Add new</a>
                <table class="table table-bordered">
                    <tr>
                        <td>Title</td>
                        <td>Logo</td>
                        <td>Url</td>
                        <td>Actions</td>
                    </tr>
                    @foreach($websites as $website)
                        <tr>
                            <td>{{ $website->title }}</td>
                            <td><img width="150" src="{{ url('uploads/' . $website->logo) }}" /></td>
                            <td><a href="{{ $website->url }}">{{ $website->url }}</a> </td>
                            <td>
                                <a href="{{ url('dashboard/websites/' . $website->id . '/edit') }}"><i class="glyphicon glyphicon-edit"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </table>



        </div>
    </div>

@endsection