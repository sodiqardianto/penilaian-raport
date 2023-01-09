@extends('layouts.main')
@section('title', 'Raport')
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
                        <li class="breadcrumb-item"><a href="{{ route('raport.kelas',$id) }}">Kelas</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah @yield('title')</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('raport.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="idraport" value={{$id}}>
                        <input type="hidden" name="idpelajaran" value={{$pelajaran->idpelajaran}}>
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
                                    <label class="form-label">Kategori</label>
                                    <select name="idkategorinilai" class="form-control form-select select2 select2-hidden-accessible @error('idkategorinilai') is-invalid state-invalid @enderror" data-bs-placeholder="Pilih Kategori" tabindex="-1" aria-hidden="true">
                                        @foreach ($kategori as $item)
                                        <option value="{{$item->id}}">{{$item->namakategorinilai}}</option> 
                                        @endforeach
                                    </select> 
                                    @error('idkategorinilai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nilai</label>
                                    <input type="number" name="nilai" class="form-control @error('nilai') is-invalid state-invalid @enderror" placeholder="Masukan Nilai" value="{{ old('nilai') }}" autofocus>
                                    @error('nilai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid state-invalid @enderror" placeholder="Masukan Deskripsi" value="{{ old('deskripsi') }}" autofocus></textarea>
                                    @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                                
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-warning"><i class="fa fa-plus"></i> Simpan</button>
                                <a href="{{ route('raport.kelas',$id) }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
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