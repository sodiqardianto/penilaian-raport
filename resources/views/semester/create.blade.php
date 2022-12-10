@extends('layouts.main')
@section('title', 'Semester')
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
                        <li class="breadcrumb-item"><a href="{{ route('murid.index') }}">@yield('title')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah @yield('title')</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-8 col-lg-12">
                    <form action="{{ route('semester.store') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Semester</label>
                                    <select name="semester" class="form-control form-select select2 select2-hidden-accessible @error('semester') is-invalid state-invalid @enderror" data-bs-placeholder="Pilih Semester" tabindex="-1" aria-hidden="true">
                                        <option value="1">Semester 1</option> 
                                        <option value="2">Semester 2</option> 
                                    </select> 
                                    @error('semester')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tahun</label>
                                    <input type="number" name="tahun" class="form-control @error('tahun') is-invalid state-invalid @enderror" placeholder="Tahun" value="{{ old('tahun') }}" autofocus>
                                    @error('tahun')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
                                <a href="{{ route('semester.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
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