# Backend HRD
Project ini merupakan aplikasi RESTfull API untuk mengelola data pegawai pada Human Resource Development (HRD)

## Schema Database
Di project ini terdapat schema database seperti gambar dibawah ini
<img src="https://github.com/abdullahalwafi/backend-HRD/blob/main/public/erd-backendHRD.png" alt="ERD" width="70%"/>


## Instalasi

Berikut adalah langkah-langkah untuk menginstal dan menjalankan aplikasi ini:

1. Clone repositori dari GitHub:

    ```shell
    git clone https://github.com/abdullahalwafi/backend-HRD.git
    ```

2. Pindah ke direktori projek:

    ```shell
    cd backend-HRD
    ```

3. Instal semua dependensi menggunakan Composer:

    ```shell
    composer install
    ```

4. Salin file `.env.example` menjadi `.env`:

    ```shell
    cp .env.example .env
    ```

5. Generate kunci aplikasi:

    ```shell
    php artisan key:generate
    ```

6. Konfigurasi koneksi database pada file `.env` sesuai dengan lingkungan lokal Anda.

7. Migrasikan database:
   jika sudah ada database nya ketikan
    ```shell
    php artisan migrate:fresh --seed
    ```
   jika tidak ada database nya ketikan
    ```shell
    php artisan migrate --seed
    ```

8. Jalankan server pengembangan:

    ```shell
    php artisan serve
    ```

Aplikasi sudah dapat digunakan

Terimakasih:)