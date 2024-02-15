@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Adding Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Main</a></li>
                            <li class="breadcrumb-item active">Adding Users</li>
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

                        <form action="{{route('admin.user.store')}}" method="post" class="W-25 mt-2">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control col-6" name="name" placeholder="Name of user">
                                @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control col-6" name="email" placeholder="Email">
                                @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Select Role</label>
                                <select name="role" class="form-control col-2">
                                    @foreach($roles as $id => $role)
                                        <option value="{{$id}}"
                                            {{$id == old('role_id') ? 'selected' : ''}}
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
