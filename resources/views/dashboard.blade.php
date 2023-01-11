@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">@yield('title')</h1>
                <div>
                    <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->


            <div class="row"> 
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3"> 
                <div class="card bg-primary img-card box-primary-shadow"> 
                <div class="card-body"> 
                <div class="d-flex"> 
                <div class="text-white"> 
                <h2 class="mb-0 number-font">{{$murid}}</h2> 
                <p class="text-white mb-0">Total Murid </p></div> 
            <div class="ms-auto"> 
                <i class="fa fa-user-o text-white fs-30 me-2 mt-2"></i> 
            </div> 
        </div> 
        </div> 
        </div> 
        </div> 
            <!-- COL END --> 
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3"> 
                <div class="card bg-secondary img-card box-secondary-shadow"> 
                <div class="card-body"> 
                <div class="d-flex"> 
                <div class="text-white"> 
                <h2 class="mb-0 number-font">{{$guru}}</h2> 
                <p class="text-white mb-0">Total Guru</p></div> 
            <div class="ms-auto"> 
                <i class="fa fa-users text-white fs-30 me-2 mt-2"></i> 
            </div> 
        </div> 
        </div> 
        </div> 
        </div> 
            <!-- COL END --> 
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3"> 
                <div class="card  bg-success img-card box-success-shadow"> 
                <div class="card-body"> 
                <div class="d-flex"> 
                <div class="text-white"> 
                <h2 class="mb-0 number-font">{{$pelajaran}}</h2> 
                <p class="text-white mb-0">Total Pelajaran</p></div> 
            <div class="ms-auto"> 
                <i class="fa fa-book text-white fs-30 me-2 mt-2"></i> 
            </div> 
        </div> 
        </div> 
        </div> 
        </div> 
            <!-- COL END --> 
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3"> 
                <div class="card bg-info img-card box-info-shadow"> 
                <div class="card-body"> 
                <div class="d-flex"> 
                <div class="text-white"> 
                <h2 class="mb-0 number-font">{{$ekstrakulikuler}}</h2> 
                <p class="text-white mb-0">Total Ekstrakulikuler</p></div> 
            <div class="ms-auto"> 
                <i class="fa fa-bullseye text-white fs-30 me-2 mt-2"></i> 
            </div> 
        </div> 
        </div> 
        </div> 
        </div> 
            <!-- COL END --> </div>
            
        </div>
        <!-- CONTAINER END -->
    </div>
</div>
@endsection