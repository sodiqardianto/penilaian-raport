@extends('layouts.main')
@section('title', 'Sikap dan Catatan')
@section('content')
<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">@yield('title')</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{ route('sikap.create') }}" class="btn btn-primary"><i class="fe fe-plus me-2"></i> Tambah Data Sikap dan Catatan</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered text-nowrap border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">No</th>
                                            <th class="border-bottom-0">Nama Murid</th>
                                            <th class="border-bottom-0">Semester</th>
                                            <th class="border-bottom-0">Kategori</th>
                                            <th class="border-bottom-0">Sikap</th>
                                            <th class="border-bottom-0">Deskripsi</th>
                                            {{-- <th class="border-bottom-0">Jenis Kelamin</th> --}}
                                            {{-- <th class="border-bottom-0">Status</th> --}}
                                            <th class="border-bottom-0">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--app-content closed-->
@endsection
@push('after-script')
<script>
    $('#example2').DataTable({
        responsive: true,
        destroy: true,
        processing: true,
        serverSide: true,
        language: {
            searchPlaceholder: "Cari ..."
        },
        ajax: {
            url: "{{ route('sikap.data') }}",
            type: "GET",
        },
        columns: [{
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false
            },
            {
                data: 'murid',
                name: 'murid'
            },
            {
                data: 'semesterstr',
                name: 'semesterstr'
            },
            {
                data: 'kategori',
                name: 'kategori'
            },
            {
                data: 'pelajaran',
                name: 'pelajaran'
            },
            {
                data: 'deskripsi',
                name: 'deskripsi'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
            
        ],
        order: [
            [0, 'desc']
        ],
    });

    $(document).on("click", ".delete", function(e) {
        var id = $(this).attr('data-id');
        Swal.fire({
            title: "Hapus Sikap?",
            icon: 'error',
            text: "Apakah kamu ingin menghapus Sikap! ",
            showCancelButton: !0,
            confirmButtonText: "Hapus",
            cancelButtonText: "Cancel",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                $.ajax({
                    url: "{{url('/sikap')}}/" + id,
                    type: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    dataType: 'json',
                    success: function (data) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Sikap berhasil dihapus!",
                            icon: "success",
                            confirmButtonText: "Ok"
                        }).then(function() {
                            $('#example2').DataTable().ajax.reload();
                        });
                    }
                });
            } else {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        }
    )});
</script>
@endpush