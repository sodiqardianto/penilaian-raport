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

## Screen capture

![App Screenshot](https://raw.githubusercontent.com/sodiqardianto/penilaian-raport/main/public/image/pic-1.png)

![App Screenshot](https://raw.githubusercontent.com/sodiqardianto/penilaian-raport/main/public/image/pic-2.png)

![App Screenshot](https://raw.githubusercontent.com/sodiqardianto/penilaian-raport/main/public/image/pic-3.png)

