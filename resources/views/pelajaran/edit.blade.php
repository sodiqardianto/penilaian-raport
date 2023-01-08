@extends('layouts.main')
@section('title', 'Pelajaran')
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
                        <li class="breadcrumb-item"><a href="{{ route('guru.index') }}">@yield('title')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah @yield('title')</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('pelajaran.update', $pelajaran->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Nama Mata Pelajaran</label>
                                    <input type="text" name="namamatapelajaran" class="form-control @error('namamatapelajaran') is-invalid state-invalid @enderror" placeholder="Nama Mata Pelajaran" value="{{ old('namamatapelajaran',$pelajaran->namamatapelajaran) }}" autofocus>
                                    @error('namamatapelajaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label class="form-label">No Telepon</label>
                                    <input type="number" name="notelp" class="form-control @error('notelp') is-invalid state-invalid @enderror" placeholder="No Telepon" value="{{ old('notelp',$guru->notelp) }}" autofocus>
                                    @error('notelp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div> --}}
                                <div class="form-group">
                                    <label class="form-label">Muatan</label>
                                    <select name="muatan" class="form-control form-select select2 select2-hidden-accessible @error('muatan') is-invalid state-invalid @enderror" data-bs-placeholder="Pilih Jenis Kelamin" tabindex="-1" aria-hidden="true">
                                        <option value="sikap" {{$pelajaran->muatan == 'sikap'?'selected':''}}>Sikap</option> 
                                        <option value="pelajaran" {{$pelajaran->muatan == 'pelajaran'?'selected':''}}>Pelajaran</option> 
                                        <option value="lokal" {{$pelajaran->muatan == 'lokal'?'selected':''}}>Lokal</option> 
                                        <option value="Ekstrakulikuler" {{$pelajaran->muatan == 'Ekstrakulikuler'?'selected':''}}>Ekstrakulikuler</option> 
                                    </select> 
                                    @error('muatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                
                            </div>

                                
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-warning"><i class="fa fa-plus"></i> Perbarui</button>
                                <a href="{{ route('pelajaran.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
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