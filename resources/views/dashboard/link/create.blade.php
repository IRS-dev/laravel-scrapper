@extends('layouts.dashboardmain')
@section('containerfluid')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">Create New Link</h5>
                </div>
                <div class="card">
                    <form class="form-horizontal" method="post" action="/dashboard/links" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            {{-- url --}}
                            <div class="form-group row">
                                <label for="url" class="col-sm-3 text-right control-label col-form-label">Url</label>
                                <div class="col-sm-9">
                                    <input required value="{{ old('url') }}" name="url" autofocus type="text" class="form-control  @error('url') is-invalid @enderror" id="url" placeholder="url Here">
                                    @error('url')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- main_filter_selector --}}
                            <div class="form-group row">
                                <label for="main_filter_selector" class="col-sm-3 text-right control-label col-form-label">Main Filter Selector</label>
                                <div class="col-sm-9">
                                    <input required value="{{ old('main_filter_selector') }}" name="main_filter_selector" autofocus type="text" class="form-control  @error('main_filter_selector') is-invalid @enderror" id="main_filter_selector" placeholder="main_filter_selector Here">
                                    @error('main_filter_selector')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                    <!-- Website -->
                    <div class="form-group row">
                                <label for="website" class="col-sm-3 text-right control-label col-form-label">Website</label>
                                <div class="col-sm-9">
                                <select name="website_id" class="form-control">
                                <option value="">select</option>

                                @foreach($websites as $website)
                                    <option value="{{ $website->id }}">{{ $website->title }}</option>
                                @endforeach
                            </select>
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="form-group row">
                                <label for="category" class="col-sm-3 text-right control-label col-form-label">Category</label>
                                <div class="col-sm-9">
                                <select name="category_id" class="form-control">
                                <option value="">select</option>

                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
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