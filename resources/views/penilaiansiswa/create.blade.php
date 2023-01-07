@extends('layouts.main')
@section('title', 'Absen')
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
                        <li class="breadcrumb-item"><a href="{{ route('gurupelajaran.index') }}">@yield('title')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah @yield('title')</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-8 col-lg-12">
                    <form action="{{ route('absen.store') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Murid</label>
                                    <select name="idmurid" class="form-control form-select select2 select2-hidden-accessible @error('idmurid') is-invalid state-invalid @enderror" data-bs-placeholder="Pilih Kelas" tabindex="-1" aria-hidden="true">
                                        @foreach ($murid as $item)
                                        <option value="{{$item->idmurid}}">{{$item->murid->namamurid}}</option> 
                                        @endforeach
                                       
                                    </select> 
                                    @error('idmurid')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Semester</label>
                                    <select name="idsemester" class="form-control form-select select2 select2-hidden-accessible @error('idsemester') is-invalid state-invalid @enderror" data-bs-placeholder="Pilih Guru" tabindex="-1" aria-hidden="true">
                                        @foreach ($semester as $item)
                                        <option value="{{$item->id}}">{{$item->semester=='1'?'Ganjil '.$item->tahun:'Genap '.$item->tahun}}</option> 
                                        @endforeach
                                    </select> 
                                    @error('idsemester')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Izin</label>
                                    <input type="number" name="izin" class="form-control @error('izin') is-invalid state-invalid @enderror" placeholder="Masukan Izin" value="{{ old('izin') }}" autofocus>
                                    @error('izin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Alpha</label>
                                    <input type="number" name="alpha" class="form-control @error('alpha') is-invalid state-invalid @enderror" placeholder="Masukan Alpha" value="{{ old('alpha') }}" autofocus>
                                    @error('alpha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Sakit</label>
                                    <input type="number" name="sakit" class="form-control @error('sakit') is-invalid state-invalid @enderror" placeholder="Masukan Sakit" value="{{ old('sakit') }}" autofocus>
                                    @error('sakit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
                                <a href="{{ route('absen.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
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