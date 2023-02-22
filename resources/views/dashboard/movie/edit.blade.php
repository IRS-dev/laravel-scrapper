@extends('layouts.dashboardmain')
@section('containerfluid')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">Edit Movie</h5>
                </div>
                <div class="card">
                    <form class="form-horizontal" method="post" action="/dashboard/movies" enctype="multipart/form-data">
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
                            {{-- Genre --}}
                            <div class="form-group row">
                                <label for="genre" class="col-sm-3 text-right control-label col-form-label">genre</label>
                                <div class="col-sm-9">
                                    <input required value="{{ old('genre') }}" name="genre" autofocus type="text" class="form-control  @error('genre') is-invalid @enderror" id="genre" placeholder="genre Here">
                                    @error('genre')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                          {{-- actor --}}
                          <div class="form-group row">
                            <label for="actor" class="col-sm-3 text-right control-label col-form-label">actor</label>
                            <div class="col-sm-9">
                                <input required value="{{ old('actor') }}" name="actor" autofocus type="text" class="form-control  @error('actor') is-invalid @enderror" id="actor" placeholder="actor Here">
                                @error('actor')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                        </div>
                          {{-- trailer --}}
                          <div class="form-group row">
                            <label for="trailer" class="col-sm-3 text-right control-label col-form-label">trailer</label>
                            <div class="col-sm-9">
                                <input required value="{{ old('trailer') }}" name="trailer" autofocus type="text" class="form-control  @error('trailer') is-invalid @enderror" id="trailer" placeholder="trailer Here">
                                @error('trailer')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                        </div>

                            {{-- FILE input --}}
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label form-label" for="formFile">Poster</label>
                                <div class="mb-2 col-sm-9">

                                    <input class="form-control" type="file" id="formFile" name="image" onchange="previewImage()">
                                    <img src="" class="img-preview img-fluid">
                                    @error('image')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Synopsis --}}
                            <div class="form-group row">
                                <label for="synopsis" class="col-sm-3 text-right control-label col-form-label">Synopsis</label>
                                <div class="col-sm-9">
                                    <input id="synopsis" type="hidden" name="synopsis" required value="{{ old('synopsis') }}">
                                    <trix-editor input="synopsis"></trix-editor>
                                    @error('synopsis')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- button --}}
                            <div class="card-body">
                                <button  type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection