@extends('layouts.dashboardmain')
@section('containerfluid')
 <!-- Container fluid -->
 <div class="container-fluid">
     <div class="row">
         <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">Item Schema</h5>
                </div>
                @if(session()->has('success'))
                <div class="alert alert-success col-6 lg-6" role="alert">{{ session('success') }}</div>
                @endif
                <div class="col-6 lg-6">
                    <a  class=" btn-success btn-rounded" href="/dashboard/item-schema/create">Create New </a>
                    <!-- <a  class=" btn-info btn-rounded" href="/dashboard/movies/export_excel" target="_blank">Export Movie</a>
                    <a  class=" btn-primary btn-rounded" href="/dashboard/movies/import" target ="_blank">Import Movie</a> -->
                </div>
                    <table class="table mt-3">
                      <thead>
                        <tr>
                          <th scope="col">Title</th>
                          <th scope="col">CSS Expression</th>
                          <th scope="col">Is Full Url To Article</th>
                          <th scope="col">Full content selector</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($itemSchemas as $item)
                          <tr>
                          <td>{{ $item->title }}</td>
                            <td>{{ $item->css_expression }}</td>
                            <td>{{ $item->is_full_url==1?"Yes":"No" }}</td>
                            <td>{{ $item->full_content_selector }}</td>
                            <td>
                                <a href="{{ url('dashboard/item-schema/' . $item->id . '/edit') }}"><i class="glyphicon glyphicon-edit"></i> </a>
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
