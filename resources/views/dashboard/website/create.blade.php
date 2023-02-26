@extends('layouts.dashboardmain')
@section('containerfluid')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">Create New Movie</h5>
                </div>
                <div class="card">
                    <form class="form-horizontal" method="post" action="/dashboard/websites" enctype="multipart/form-data">
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
                            {{-- url --}}
                            <div class="form-group row">
                                <label for="url" class="col-sm-3 text-right control-label col-form-label">url</label>
                                <div class="col-sm-9">
                                    <input required value="{{ old('url') }}" name="url" autofocus type="text" class="form-control  @error('url') is-invalid @enderror" id="url" placeholder="url Here">
                                    @error('url')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- FILE input --}}
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label form-label" for="formFile">Logo</label>
                                <div class="mb-2 col-sm-9">

                                    <input class="form-control" type="file" id="formFile" name="logo" onchange="previewImage()">
                                    <img src="" class="img-preview img-fluid">
                                    @error('logo')
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