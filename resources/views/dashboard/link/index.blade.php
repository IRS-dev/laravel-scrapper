@extends('layouts.dashboardmain')
@section('containerfluid')
 <!-- Container fluid -->
 <div class="container-fluid">
     <div class="row">
         <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">Link</h5>
                </div>
                @if(session()->has('success'))
                <div class="alert alert-success col-6 lg-6" role="alert">{{ session('success') }}</div>
                @endif
                <div class="col-6 lg-6">
                    <a  class=" btn-success btn-rounded" href="/dashboard/links/create">Create New Links</a>
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
                          <th scope="col">Assigned To Category</th>
                        <th scope="col">Item Schema</th>
                        <th scope="col">Scrape Link</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($links as $link)
                          <tr>
                          <td>{{ $link->url }}</td>
                            <td>{{ $link->main_filter_selector }}</td>
                            <td>{{ $link->website->title }} </td>
                            <td><strong><span class="label label-info">{{ $link->category->title }}</span></strong> </td>
                            <td>
                                <select class="item_schema" data-id="{{ $link->id }}" data-original-schema="{{$link->item_schema_id}}">
                                    <option value="" disabled selected>Select</option>
                                    @foreach($itemSchemas as $item)
                                        <option value="{{$item->id}}" {{ $item->id==$link->item_schema_id?"selected":"" }}>{{$item->title}}</option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-info btn-sm btn-apply" style="display: none">Apply</button>
                            </td>
                            <td>
                                @if($link->item_schema_id != "" && $link->main_filter_selector != "")
                                    <button type="button" class="btn btn-primary btn-scrape" title="pull the latest items">Scrape <i class="glyphicon glyphicon-repeat fast-right-spinner" style="display: none"></i></button>
                                @else
                                    <span style="color: red">fill main filter selector and item schema first</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('dashboard/links/' . $link->id . '/edit') }}"><i class="glyphicon glyphicon-edit"></i> </a>
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
@section('script')
    <script>
        $(function () {
           $("select.item_schema").change(function () {
              if($(this).val() != $(this).attr("data-original-schema")) {
                  $(this).siblings('.btn-apply').show();
              }
           });
           
           $('.btn-apply').click(function () {

               var btn = $(this);

               var tRowId = $(this).parents("tr").attr("data-id");
               var schema_id = $(this).siblings('select').val();

               $.ajaxSetup({
                   headers: {
                       'X-XSRF-TOKEN': "{{ csrf_token() }}"
                   }
               });

               $.ajax({
                  url: "{{ url('dashboard/links/set-item-schema') }}",
                  data: {link_id: tRowId, item_schema_id: schema_id, _token: "{{ csrf_token() }}", _method: "patch"},
                  method: "post",
                  dataType: "json",
                  success: function (response) {
                      alert(response.msg);

                      btn.hide();
                  }
               });
           });
           
           $(".btn-scrape").click(function () {
               var btn = $(this);

               btn.find(".fast-right-spinner").show();

               btn.prop("disabled", true);

               var tRowId = $(this).parents("tr").attr("data-id");

               $.ajaxSetup({
                   headers: {
                       'X-XSRF-TOKEN': "{{ csrf_token() }}"
                   }
               });

               $.ajax({
                   url: "{{ url('dashboard/links/scrape') }}",
                   data: {link_id: tRowId, _token: "{{ csrf_token() }}"},
                   method: "post",
                   dataType: "json",
                   success: function (response) {

                       if(response.status == 1) {
                           $(".alert").removeClass("alert-danger").addClass("alert-success").text(response.msg).show();
                       } else {
                           $(".alert").removeClass("alert-success").addClass("alert-danger").text(response.msg).show();
                       }

                       btn.find(".fast-right-spinner").hide();
                   }
               });
           });
        });
    </script>
@endsection