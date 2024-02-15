@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Adding Posts</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Main</a></li>
                            <li class="breadcrumb-item active">Adding Posts</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">

                        <form action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data" class="W-25 mt-2">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control col-6" value="{{old('title')}}" name="title" placeholder="Title of post">
                                @error('title')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror

                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="content" >{{old('content')}}</textarea>
                                @error('content')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="input-group mb-1" >
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image">
                                    <label class="custom-file-label" >Choose preview</label>

                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>

                                </div>
                            </div>
                            <div class="mb-3">
                                @error('preview_image')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>


                            <div class="input-group mb-1" >
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_image">
                                    <label class="custom-file-label" >Choose image</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            <div class="mb-2">
                                @error('main_image')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Select category</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                        {{$category->id == old('category_id') ? 'selected' : ''}}
                                        >
                                            {{$category->title}}
                                        </option>
                                    @endforeach
                                        @error('category_id')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <select name = "tag_ids[]" class="select2" multiple="multiple" data-placeholder="Select tags" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option
                                            {{is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : ''}}
                                            value="{{$tag->id}}">{{$tag->title}}</option>
                                    @endforeach
                                        @error('tag_ids')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Adding">
                            </div>

                        </form>
                    </div>

                    <!-- ./col -->
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
