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
                <div class="col-lg-8">
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
                                    <select name="status" class="form-control form-select select2">
                                        <option value="" selected disabled>-- Pilih Status --</option>
                                        <option value="1" {{ old('status', $user->status) == 1 ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ old('status', $user->status) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                    {{-- <input type="email" name="email" class="form-control @error('email') is-invalid state-invalid @enderror" placeholder="Email" value="{{ old('email', $user->email) }}"> --}}
                                    @error('email')
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
                <div class="col-lg-4">
                    <form action="{{ route('users.changePassword', $user->id) }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="panel-group1" id="accordion1">
                                    <div class="panel panel-default">
                                        <div class="panel-heading1 ">
                                            <h4 class="panel-title1">
                                                <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapseFour" aria-expanded="false">Ganti Password</a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="form-label">Current Password</label>
                                                    <input type="password" name="current_password" class="form-control @error('current_password') is-invalid state-invalid @enderror" placeholder="Current Password">
                                                    @error('current_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">New Password</label>
                                                    <input type="password" name="new_password" class="form-control @error('new_password') is-invalid state-invalid @enderror" placeholder="Confirm Password">
                                                    @error('new_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Confirm New Password</label>
                                                    <input type="password" name="conf_new_password" class="form-control @error('conf_new_password') is-invalid state-invalid @enderror" placeholder="Confirm Password">
                                                    @error('conf_new_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-unlock-alt"></i> Ganti Password</button>
                                                </div>
                                            </div>
                                        </div>
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