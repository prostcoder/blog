@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Adding Tags</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Main</a></li>
                        <li class="breadcrumb-item active">Adding Tags</li>
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

                    <form action="{{route('admin.tag.store')}}"  method="post" class="W-25 mt-2">
                        @csrf
                        <div class="form-group">

                                <input type="text" class="form-control col-6" name = "title" placeholder="Title of tag">
                                @error('title')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror

                        </div>
                        <input type="submit" class="btn btn-primary" value="Adding">
                    </form>
                </div>

                <!-- ./col -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
