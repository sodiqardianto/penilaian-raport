@extends('layouts.main')
@section('title', 'Role Permission')
@section('content')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Tambah @yield('title')</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Role</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah @yield('title')</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-8 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Nama Role</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid state-invalid @enderror" placeholder="Nama Role" value="{{ old('name', $role->name) }}" readonly>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('roles.updateAccess', $role->id) }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <div class="row">
                                            @forelse ($permissions as $item)
                                                <div class="col-sm-12 col-md-3 col-lg-3">
                                                    @foreach ($item as $v)
                                                    <p class="mb-1">
                                                        <label>
                                                            <input type="checkbox" name="permissions[]" value="{{ $v->name }}" {{ in_array($v->name, $rolePermissions) ? "checked" : "" }}>
                                                            <span>{{ $v->name }}</span>
                                                        </label>
                                                    </p>
                                                    @endforeach
                                                    <br>
                                                </div>
                                                @empty
                                            </div>
                                                <span>Not Data Found</span>
                                            @endforelse
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
                                        <a href="{{ route('roles.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Row -->

        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>
@endsection