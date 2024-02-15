@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Main</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Users</a></li>
                            <li class="breadcrumb-item active">{{$user->name}}</li>
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

                        <form action="{{route('admin.user.update', $user->id)}}" method="POST" class="W-25 mt-2">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input type="text" class="form-control col-6" value="{{$user->name}}" name="name">
                                @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control col-6" value="{{$user->email}}" name="email">
                                @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Select Role</label>
                                <select name='role' class="form-control col-2">
                                    @foreach($roles as $id => $role)
                                        <option value="{{$id}}"
                                            {{$id == $user->role ? 'selected' : ''}}
                                        >
                                            {{$role}}
                                        </option>
                                    @endforeach
                                    @error('role')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Editing">
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
