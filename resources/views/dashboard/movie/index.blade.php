@extends('layouts.dashboardmain')
@section('containerfluid')
 <!-- Container fluid -->
 <div class="container-fluid">
     <div class="row">
         <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">Movies Data</h5>
                </div>
                @if(session()->has('success'))
                <div class="alert alert-success col-6 lg-6" role="alert">{{ session('success') }}</div>
                @endif
                <div class="col-6 lg-6">
                    <a  class=" btn-success btn-rounded" href="/dashboard/movies/create">Create New movie</a>
                    <a  class=" btn-info btn-rounded" href="/dashboard/movies/create">Export Movie</a>
                    <a  class=" btn-primary btn-rounded" href="/dashboard/movies/create">Import Movie</a>
                </div>
                    <table class="table mt-3">
                      <thead>
                        <tr>
                          <th scope="col">Title</th>
                          <th scope="col">Genre</th>
                          <th scope="col">Rating</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($movies as $movie)
                          <tr>
                            {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                            <td>{{ $movie->title }}</td>
                            <td>{{ $movie->genre }}</td>
                            <td>{{ $movie->rating }}</td>
                            <td>
                                <a href="/dashboard/movies/{{ $movie->id }}" class="badge btn-info">Detail</a>
                                <a href="/dashboard/movies/{{ $movie->id }}/edit" class="badge btn-warning">Edit</a>
                                <form action="/dashboard/movies/{{ $movie->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge btn-danger border-0" onclick="return confirm('Are you sure delete this movie?')">Delete</button>
                                </form>
                            </td>
                          </tr>
                          @endforeach
                      </tbody>
                </table>
            </div>
         </div>
     </div>
</div>
@endsection
