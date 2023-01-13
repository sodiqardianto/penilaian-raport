@extends('layouts.main')
@section('title', 'Murid')
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
                        <li class="breadcrumb-item"><a href="{{ route('murid.index') }}">@yield('title')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah @yield('title')</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('murid.update', $murid->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Nama Murid</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid state-invalid @enderror" placeholder="Nama" value="{{ old('name',$murid->namamurid) }}" autofocus>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nomor Induk Siswa</label>
                                    <input type="text" name="nis" class="form-control @error('nis') is-invalid state-invalid @enderror" placeholder="Nomor Induk Siswa" value="{{ old('nis',$murid->nis) }}" autofocus>
                                    @error('nis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nomor Induk Siswa Nasional</label>
                                    <input type="text" name="nisn" class="form-control @error('nisn') is-invalid state-invalid @enderror" placeholder="Nomor Induk Siswa Nasional" value="{{ old('nisn',$murid->nisn) }}" autofocus>
                                    @error('nisn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">No Telepon</label>
                                    <input type="number" name="notelp" class="form-control @error('notelp') is-invalid state-invalid @enderror" placeholder="No Telepon" value="{{ old('notelp',$murid->notelp) }}" autofocus>
                                    @error('notelp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select name="jk" class="form-control form-select select2 select2-hidden-accessible @error('jk') is-invalid state-invalid @enderror" data-bs-placeholder="Pilih Jenis Kelamin" tabindex="-1" aria-hidden="true">
                                        <option value="1" {{$murid->jeniskelamin==1? 'checked':''}}>Laki-Laki</option> 
                                        <option value="0" {{$murid->jeniskelamin==0? 'checked':''}}>Perempuan</option> 
                                    </select> 
                                    @error('jk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                
                            </div>

                                
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-warning"><i class="fa fa-plus"></i> Perbarui</button>
                                <a href="{{ route('murid.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
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