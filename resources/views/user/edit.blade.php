@extends('layouts.main')
@section('title', 'Users')
@section('content')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Ubah @yield('title')</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">@yield('title')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah @yield('title')</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-8 col-lg-12">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid state-invalid @enderror" placeholder="Nama" value="{{ old('name', $user->name) }}" autofocus>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control @error('username') is-invalid state-invalid @enderror" placeholder="Username" value="{{ old('username', $user->username) }}" autofocus>
                                    @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid state-invalid @enderror" placeholder="Email" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control form-select">
                                        <option value="" selected disabled>-- Pilih Status --</option>
                                        <option value="1" {{ old('status', $user->status) == 1 ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ old('status', $user->status) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                    {{-- <input type="email" name="email" class="form-control @error('email') is-invalid state-invalid @enderror" placeholder="Email" value="{{ old('email', $user->email) }}"> --}}
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid state-invalid @enderror" placeholder="Password">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid state-invalid @enderror" placeholder="Confirm Password">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-warning"><i class="fa fa-plus"></i> Perbarui</button>
                                <a href="{{ route('users.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
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