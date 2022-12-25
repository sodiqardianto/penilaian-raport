@extends('layouts.main')
@section('title', 'Kelas Pelajaran')
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
                        <li class="breadcrumb-item"><a href="{{ route('kelaspelajaran.index') }}">@yield('title')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah @yield('title')</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-8 col-lg-12">
                    <form action="{{ route('kelaspelajaran.store') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Kelas</label>
                                    <select name="idkelas" class="form-control form-select select2 select2-hidden-accessible @error('idkelas') is-invalid state-invalid @enderror" data-bs-placeholder="Pilih Kelas" tabindex="-1" aria-hidden="true">
                                        @foreach ($kelas as $item)
                                        <option value="{{$item->id}}">{{$item->kelas}}</option> 
                                        @endforeach
                                       
                                    </select> 
                                    @error('idkelas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Guru Pelajaran</label>
                                    <select name="idgurupelajaran" class="form-control form-select select2 select2-hidden-accessible @error('idgurupelajaran') is-invalid state-invalid @enderror" data-bs-placeholder="Pilih Murid" tabindex="-1" aria-hidden="true">
                                        @foreach ($gurupelajaran as $item)
                                        <option value="{{$item->id}}">{{$item->guru->namaguru . ' - '.$item->pelajaran->namamatapelajaran}}</option> 
                                        @endforeach
                                    </select> 
                                    @error('idgurupelajaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
                                <a href="{{ route('kelaspelajaran.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
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