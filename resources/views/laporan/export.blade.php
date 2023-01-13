<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico') }}" />

    <!-- TITLE -->
    <title>Eksport – {{ config('app.name') }} </title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/colors/color1.css') }}" />

</head>

<style>
    

table.table-bordered{
    border:1px solid black;
    margin-top:20px;
}

table.table-bordered > thead > tr > th{
    border:1px solid black;
}

table.table-bordered > tbody > tr > td{
    border:1px solid black;
}

.gambar {
    margin-right: -100px;
}


.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#0C9;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
}

.my-float{
	margin-top:22px;
}

@media print {
    .float {
        display: none;
    }

    .gambar {
        marglin-right: -500px;
    }
}
</style>

<body class="app sidebar-mini ltr light-mode">

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">
            {{-- <div class="text-center">
                <h2>LAPORAN HASIL BELAJAR SEMESTER GANJIL</h2>
                <h2>SD KUMNAMU</h2>
                <h2>TAHUN PELAJARAN 2022/2023</h2>
            </div> --}}

            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-2 gambar">
                        <a class="header-brand" href="">
                            <img src="../assets/images/brand/kumnamu-logo.png" class="header-brand-img logo-3" alt="Kumnamu logo">
                        </a>
                    </div>
                    <div class="col-lg-10 text-end border-bottom border-lg-0 tengah">
                        <div class="text-center">
                            <h2>LAPORAN HASIL BELAJAR SEMESTER GANJIL</h2>
                            <h2>SD KUMNAMU</h2>
                            <h2>TAHUN PELAJARAN 2022/2023</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-around bd-highlight">
                <div class="p-2 bd-highlight">
                    <table>
                        <tr>
                            <td>Nama Siswa</td>
                            <td class="px-2">:</td>
                            <td>{{ucwords($murid->namamurid)}}</td>
                        </tr>
                        <tr>
                            <td>Nomor Induk Siswa</td>
                            <td class="px-2">:</td>
                            <td>1522489387</td>
                        </tr>
                        <tr>
                            <td>Nomor Induk Siswa Nasional</td>
                            <td class="px-2">:</td>
                            <td>15224893871</td>
                        </tr>
                        <tr>
                            <td>Kecamatan</td>
                            <td class="px-2">:</td>
                            <td>Kumnamu</td>
                        </tr>
                        <tr>
                            <td>Nama Sekolah</td>
                            <td class="px-2">:</td>
                            <td>SD KUMNAMU</td>
                        </tr>
                    </table>
                </div>
                <div class="p-2 bd-highlight">
                    <table>
                        <tr>
                            <td>Alamat Sekolah</td>
                            <td class="px-2">:</td>
                            <td>JALAN PALEM RAJA III NO 6, KOMPLEK PALEM SEMI</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>{{$muridkelas->kelas}} (<?php 
                            if($muridkelas->kelas==1){
                                echo 'SATU';
                            }else if($muridkelas->kelas==2){
                                echo 'DUA';
                            }else{
                                echo 'TIGA';
                            }
                            ?>)</td>
                        </tr>
                        <tr>
                            <td>Semester</td>
                            <td>:</td>
                            <td> {{$semester->semester}} ({{$semester->semester==1?'SATU':'DUA'}})</td>
                        </tr>
                        <tr>
                            <td>Tahun Pelajaran</td>
                            <td>:</td>
                            <td><?php
                            if($semester->semester==1){
                                echo ($semester->tahun-1).'/'.$semester->tahun;
                            }else{
                                echo $semester->tahun.'/'.($semester->tahun+1);
                            }
                            ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="container mt-4">
                <h3 >A. SIKAP</h3>
                <table class="table table-bordered">
                    <tr class="text-center">
                        <td width="40px">No</td>
                        <td colspan="2">DESKRIPSI</td>
                    </tr>
                    <?php
                    $i=1;
                    ?>
                    @foreach ($sikap as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td width="200px">{{$item->pelajaran->namamatapelajaran}}</td>
                            <td>{{$item->deskripsi}}</td>
                        </tr> 
                    @endforeach
                </table>
                <?php 
                function predikat($nilai){
                    if ($nilai > 89 && $nilai <= 100) {
                        return 'A';
                    } else if ($nilai > 79 && $nilai <= 89) {
                        return 'B';
                    } else if ($nilai > 69 && $nilai <= 79) {
                        return 'C';
                    } else if ($nilai > 59 && $nilai <= 69) {
                        return 'D';
                    } else if ($nilai <= 59) {
                        return 'E';
                    }
                }
                ?>
                <h3>B. PENGETAHUAN</h3>
                <table class="table table-bordered">
                    <tr class="text-center">
                        <td width="40px">No</td>
                        <td>MUATAN PELAJARAN</td>
                        <td>NILAI</td>
                        <td>PREDIKAT</td>
                        <td>DESKRIPSI</td>
                    </tr>
                    <?php
                    $i=1;
                    ?>
                    @foreach ($pengetahuanpelajaran as $item)
                    <?php if(($item->idmurid==$murid->id||$item->idmurid==null)&&($item->idkategorinilai==2||$item->idkategorinilai==null)) { ?>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->namamatapelajaran}}</td>
                            <td>{{$item->nilai}}</td>
                            <?php 
                            if($item->nilai!=null&&$item->idmurid==$murid->id&&$item->idsemester==$semester->id){
                                echo '<td>'.predikat($item->nilai).'</td>';
                            }else{
                                echo '<td>-</td>';
                            }

                            if($item->deskripsi!=null&&$item->idmurid==$murid->id&&$item->idsemester==$semester->id){
                                echo '<td>'.$item->deskripsi.'</td>';
                            }else{
                                echo '<td>-</td>';
                            }
                            ?>
                        </tr> 
                        <?php } ?>
                    @endforeach
                    
                    {{-- MUATAN LOKAL --}}
                    <tr>
                        <td colspan="5">MUATAN LOKAL</td>
                    </tr>
                    <?php
                    $i=1;
                    ?>
                    @foreach ($pengetahuanlokal as $item)
                    <?php if(($item->idmurid==$murid->id||$item->idmurid==null)&&($item->idkategorinilai==2||$item->idkategorinilai==null)) { ?>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->namamatapelajaran}}</td>
                            <td>{{$item->nilai}}</td>
                            <?php 
                            if($item->nilai!=null&&$item->idmurid==$murid->id&&$item->idsemester==$semester->id){
                                echo '<td>'.predikat($item->nilai).'</td>';
                            }else{
                                echo '<td>-</td>';
                            }

                            if($item->deskripsi!=null&&$item->idmurid==$murid->id&&$item->idsemester==$semester->id){
                                echo '<td>'.$item->deskripsi.'</td>';
                            }else{
                                echo '<td>-</td>';
                            }
                            ?>
                        </tr> 
                        <?php } ?>
                    @endforeach
                </table>

                <h3>C. KETERAMPILAN</h3>
                <table class="table table-bordered">
                    <tr class="text-center">
                        <td width="40px">No</td>
                        <td>MUATAN PELAJARAN</td>
                        <td>NILAI</td>
                        <td>PREDIKAT</td>
                        <td>DESKRIPSI</td>
                    </tr>
                    <?php
                    $i=1;
                    ?>
                    @foreach ($pengetahuanpelajaran as $item)
                    <?php if(($item->idmurid==$murid->id||$item->idmurid==null)&&($item->idkategorinilai==3||$item->idkategorinilai==null)) { ?>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->namamatapelajaran}}</td>
                            <td>{{$item->nilai}}</td>
                            <?php 
                            if($item->nilai!=null&&$item->idmurid==$murid->id&&$item->idsemester==$semester->id){
                                echo '<td>'.predikat($item->nilai).'</td>';
                            }else{
                                echo '<td>-</td>';
                            }

                            if($item->deskripsi!=null&&$item->idmurid==$murid->id&&$item->idsemester==$semester->id){
                                echo '<td>'.$item->deskripsi.'</td>';
                            }else{
                                echo '<td>-</td>';
                            }
                            ?>
                        </tr> 
                        <?php } ?>
                    @endforeach
                    {{-- MUATAN LOKAL --}}
                    <tr>
                        <td colspan="5">MUATAN LOKAL</td>
                    </tr>
                    <?php
                    $i=1;
                    ?>
                    @foreach ($pengetahuanlokal as $item)
                    <?php if(($item->idmurid==$murid->id||$item->idmurid==null)&&($item->idkategorinilai==3||$item->idkategorinilai==null)) { ?>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->namamatapelajaran}}</td>
                            <td>{{$item->nilai}}</td>
                            <?php 
                            if($item->nilai!=null&&$item->idmurid==$murid->id&&$item->idsemester==$semester->id){
                                echo '<td>'.predikat($item->nilai).'</td>';
                            }else{
                                echo '<td>-</td>';
                            }

                            if($item->deskripsi!=null&&$item->idmurid==$murid->id&&$item->idsemester==$semester->id){
                                echo '<td>'.$item->deskripsi.'</td>';
                            }else{
                                echo '<td>-</td>';
                            }
                            ?>
                        </tr> 
                        <?php } ?>
                    @endforeach
                </table>

                <h3>D. EKSTRAKULIKULER</h3>
                <table class="table table-bordered">
                    <tr class="text-center">
                        <td width="40px">No</td>
                        <td>NAMA KEGIATAN</td>
                        <td>PREDIKAT</td>
                        <td>DESKRIPSI</td>
                    </tr>
                    <?php
                    $i=1;
                    ?>
                    @foreach ($ekstrakulikuler as $item)
                    <?php if($item->idmurid==$murid->id||$item->idmurid==null) {?>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->namamatapelajaran}}</td>
                            <?php 
                            if($item->nilai!=null&&$item->idmurid==$murid->id&&$item->idsemester==$semester->id){
                                echo '<td>'.predikat($item->nilai).'</td>';
                            }else{
                                echo '<td>-</td>';
                            }

                            if($item->deskripsi!=null&&$item->idmurid==$murid->id&&$item->idsemester==$semester->id){
                                echo '<td>'.$item->deskripsi.'</td>';
                            }else{
                                echo '<td>-</td>';
                            }
                            ?>
                        
                        </tr> 
                    <?php } ?>
                            
                    @endforeach
                </table>

                <h3>E. KETIDAKHADIRAN</h3>
                <table class="table table-bordered">
                    <tr class="text-center">
                        <td width="40px">No</td>
                        <td>KETERANGAN</td>
                        <td>JUMLAH</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>SAKIT</td>
                        <td>{{$absen!=null?$absen->sakit:'-'}}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>IZIN</td>
                        <td>{{$absen!=null?$absen->izin:'-'}}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>ALPHA</td>
                        <td>{{$absen!=null?$absen->alpha:'-'}}</td>
                    </tr>
                </table>

                <table class="table table-bordered">
                    <tr class="text-center">
                        <td>CATATAN UNTUK DIPERHATIKAN ORANG TUA / WALI SISWA</td>
                    </tr>
                    <tr>
                        <td>{{$catatan!=null?$catatan->deskripsi:'-'}}</td>
                    </tr>
                </table>

                <div class="row">
                    <div class="col-3">
                        Diberikan di
                    </div>
                    <div class="col-9">
                        : Tangerang
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-3">
                        Tanggal
                    </div>
                    <div class="col-9">
                        : {{date('d M Y')}}
                    </div>
                </div>

                <table class="table text-center mt-5">
                    <tr>
                        <td>Orang Tua / Wali Siswa</td>
                        <td>Kepala Sekolah</td>
                        <td>Wali Kelas</td>
                    </tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>
                    <tr>
                        <td>(_________________________)</td>
                        <td>SETYOWATO PURBANDINI, S.Pd.</td>
                        <td>{{$muridkelas->guru->namaguru}}</td>
                    </tr>
                </table>
            </div>

        </div>
    </div>

    <a type="button" onclick="window.print()" class="float">
        <i class="fa fa-print my-float"></i>
    </a>

    @stack('before-script')
    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
    @if(session()->has('success'))
        notif({
            msg: "{{ session('success') }}",
            type: "success",
        })
    @elseif(session()->has('error'))
        notif({
            msg: "{{ session('error') }}",
            type: "error",
        })
    @endif

    $('.select2').select2({
        minimumResultsForSearch: Infinity,
        width: '100%'
    });
    </script>
    
    @stack('after-script')
</body>

</html>