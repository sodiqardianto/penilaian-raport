@extends('layouts.main')
@section('title', 'Guru')
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
                            <li class="breadcrumb-item"><a href="{{ route('guru.index') }}">@yield('title')</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah @yield('title')</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-8 col-lg-12">
                        <form action="{{ route('guru.store') }}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Nama Guru</label>
                                        <input type="text" name="namaguru"
                                            class="form-control @error('namaguru') is-invalid state-invalid @enderror"
                                            placeholder="Nama Guru" value="{{ old('namaguru') }}" autofocus>
                                        @error('namaguru')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">No Telepon</label>
                                        <input type="number" name="notelp"
                                            class="form-control @error('notelp') is-invalid state-invalid @enderror"
                                            placeholder="No Telepon" value="{{ old('notelp') }}" autofocus>
                                        @error('notelp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Username</label>
                                        <select name="iduser"
                                            class="form-control form-select select2 select2-hidden-accessible @error('iduser') is-invalid state-invalid @enderror"
                                            data-bs-placeholder="Pilih Jenis Kelamin" tabindex="-1" aria-hidden="true">
                                            @foreach ($user as $item)
                                                <option value="{{ $item->id }}">{{ $item->username }}</option>
                                            @endforeach
                                        </select>
                                        @error('iduser')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="card-footer text-end">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                                        Tambah</button>
                                    <a href="{{ route('guru.index') }}" class="btn btn-default"><i
                                            class="fa fa-chevron-left"></i> Kembali</a>
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
