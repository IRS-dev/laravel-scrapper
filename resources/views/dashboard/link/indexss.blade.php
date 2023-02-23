@extends('layouts.dashboardmain')
@section('containerfluid')
 <!-- Container fluid -->
 <div class="container-fluid">
     <div class="row">
         <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">Website</h5>
                </div>
                @if(session()->has('success'))
                <div class="alert alert-success col-6 lg-6" role="alert">{{ session('success') }}</div>
                @endif
                <div class="col-6 lg-6">
                    <a  class=" btn-success btn-rounded" href="/dashboard/websites/create">Create New Website</a>
                    <!-- <a  class=" btn-info btn-rounded" href="/dashboard/movies/export_excel" target="_blank">Export Movie</a>
                    <a  class=" btn-primary btn-rounded" href="/dashboard/movies/import" target ="_blank">Import Movie</a> -->
                </div>
                    <table class="table mt-3">
                      <thead>
                        <tr>
                          <th scope="col">Url</th>
                          <th scope="col">Main Filter Selector</th>
                          <th scope="col">Website</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($websites as $website)
                          <tr>
                            {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                            <td>{{ $website->title }}</td>
                            <td>{{ $website->logo }}</td>
                            <td>{{ $website->url }}</td>
                            <!-- <td>
                                <a href="/dashboard/websites/{{ $website->id }}" class="badge btn-info">Detail</a>
                                <a href="/dashboard/websites/{{ $website->id }}/edit" class="badge btn-warning">Edit</a>
                                <form action="/dashboard/websites/{{ $website->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge btn-danger border-0" onclick="return confirm('Are you sure delete this movie?')">Delete</button>
                                </form>
                            </td> -->
                          </tr>
                          @endforeach
                      </tbody>
                </table>
            </div>
         </div>
     </div>
</div>
@endsection
