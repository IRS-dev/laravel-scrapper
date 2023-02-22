@extends('layouts.dashboardmain')
@section('containerfluid')
 <div class="container-fluid">
     <div class="row">
         <div class="col-lg-6">
             <div class="card">
                 @if($movie->poster)
                 <img src="{{ asset('storage/' . $movie->poster) }}" class="card-img-top" alt="...">
                     @else
                     <img src="https://source.unsplash.com/random/600x680" class="card-img-top" alt="...">
                 @endif
                
                 <div class="card-body">
                     <div class="my-3">
                    <a href="/dashboard/movies/" class="badge btn-default">Back to All movie</a>
                    <a href="/dashboard/movies/{{ $movie->id }}/edit" class="badge btn-warning">Edit</a>
                    <form action="/dashboard/movies/{{ $movie->id }}" method="movie" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge btn-danger border-0" onclick="return confirm('Are you sure delete this movie?')">Delete</button>
                        </form>
                    </div>
                    <h1 class="card-title m-b-0 mb-3">{{ $movie->title }}</h1>
                    <p>{{ $movie->genre }}</p>
                    <p>{{ $movie->duration }}</p>
                    <p>{{ $movie->actor }}</p>
                    <p>{{ $movie->trailer }}</p>
                    <p>{{ $movie->review }}</p>
                    <p>{!! $movie->synopsis !!} </p>
                </div>
             </div>
         </div>
     </div>
 </div>
@endsection
