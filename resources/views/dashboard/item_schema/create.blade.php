@extends('layouts.dashboardmain')
@section('containerfluid')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">Create New Item Schema</h5>
                </div>
                <div class="card">
                    <form class="form-horizontal" method="post" action="/dashboard/item-schema" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            {{-- Title --}}
                            <div class="form-group row">
                                <label for="title" class="col-sm-3 text-right control-label col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input required value="{{ old('title') }}" name="title" autofocus type="text" class="form-control  @error('title') is-invalid @enderror" id="title" placeholder="Title Here">
                                    @error('title')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- CSS Expression --}}
                            <div class="form-group row">
                                <label for="css_expression" class="col-sm-3 text-right control-label col-form-label">Css Expression</label>
                                <div class="col-sm-9">
                                    <input required value="{{ old('css_expression') }}" name="css_expression" autofocus type="text" class="form-control  @error('css_expression') is-invalid @enderror" id="css_expression" placeholder="css_expression Here">
                                    @error('css_expression')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- checkbox -->
                            <div class="form-group row">
                            <label for="Is Full Url To Article/Partial Url:" class="col-sm-3 text-right control-label col-form-label">Is Full Url To Article/Partial Url:</label>
                            <div class="col-sm-9">
                            <input type="checkbox" name="is_full_url" value="1" checked />
                            </div>
                            </div>

                            {{-- Full content selector: --}}
                            <div class="form-group row">
                                <label for="full_content_selector" class="col-sm-3 text-right control-label col-form-label">Full content selector</label>
                                <div class="col-sm-9">
                                    <input required value="{{ old('full_content_selector') }}" name="full_content_selector" autofocus type="text" class="form-control  @error('full_content_selector') is-invalid @enderror" id="full_content_selector" placeholder="full_content_selector Here">
                                    @error('full_content_selector')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                          
                            {{-- button --}}
                            <div class="card-body">
                                <button  type="submit" class="btn btn-primary">create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection