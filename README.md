# Penilaian Raport Siswa

Pada web app ini kita membuat penilaian raport siswa, dimana sistem dibuat secara terstruktur. Mulai dari semester hingga akhir laporan raport.

Web apps ini dibuat untuk kebutuhan tugas akhir/skripsi. Dibuat dengan Laravel 8, dan MySQL.

## Features

- Login
- Dashboard
- Management User
- Menu Master
    - Murid
    - Guru
    - Pelajaran
    - Semester
    - Kelas
- Mapping Data
    - Wali Kelas
    - Kelas Muris
    - Guru Pelajaran
    - Kelas Pelajaran
- Raport
- Laporan

## Installation

```sh
composer install
```

### Create .env file, and configure
```sh
cp .env.example .env
```

### Generate key
```sh
php artisan key:generate
```

### Drop table, and migration
```sh
php artisan migrate:fresh --seed
```

### Running Server
```sh
php artisan serve
```
