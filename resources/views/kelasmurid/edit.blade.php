@extends('layouts.main')
@section('title', 'Kelas Murid')
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
                        <li class="breadcrumb-item"><a href="{{ route('kelasmurid.index') }}">@yield('title')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah @yield('title')</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('kelasmurid.update', $kelasmurid->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Kelas</label>
                                    <select name="idkelas" class="form-control form-select select2 select2-hidden-accessible @error('idkelas') is-invalid state-invalid @enderror" data-bs-placeholder="Pilih Kelas" tabindex="-1" aria-hidden="true">
                                        @foreach ($kelas as $item)
                                        <option value="{{$item->id}}" {{$item->id == $kelasmurid->idkelas ? 'selected' : '' }}>{{$item->kelas}}</option> 
                                        @endforeach
                                       
                                    </select> 
                                    @error('idkelas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Murid</label>
                                    <select name="idmurid" class="form-control form-select select2 select2-hidden-accessible @error('idmurid') is-invalid state-invalid @enderror" data-bs-placeholder="Pilih Guru" tabindex="-1" aria-hidden="true">
                                        @foreach ($murid as $item)
                                        <option value="{{$item->id}}" {{$item->id == $kelasmurid->idmurid ? 'selected' : '' }}>{{$item->namamurid}}</option> 
                                        @endforeach
                                    </select> 
                                    @error('idmurid')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                            </div>

                                
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-warning"><i class="fa fa-plus"></i> Perbarui</button>
                                <a href="{{ route('kelasmurid.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
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