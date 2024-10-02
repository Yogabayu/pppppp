# Website Portofolio

Website ini dirancang untuk memberikan gambaran komprehensif tentang karya Anda, dari konsep awal hingga hasil akhir. Dengan desain yang modern dan responsif, Anda dapat dengan mudah menavigasi melalui proyek-proyek saya yang paling menonjol. Setiap proyek dilengkapi dengan detail yang rinci, termasuk deskripsi, gambar, dan contoh hasil yang dapat dilihat secara langsung.
Fitur Utama

🏠 Curriculum Vitae ✅

📊 Resume (Profil singkat, pengalaman kerja, pendidikan, keterampilan)✅

📝 Portofolio (Gambar, Deskripsi Project, Tautan Ke project)✅

📱 Desain responsif untuk akses mudah via desktop dan mobile✅


Dikembangkan menggunakan Laravel dan Bootstrap, project ini bertujuan untuk meningkatkan visibilitas dan profesionalisme dalam menampilkan karya-karya anda. Dengan memanfaatkan Laravel sebagai framework backend, saya dapat membangun aplikasi yang scalable dan aman, sementara Bootstrap memberikan desain yang responsif dan modern untuk antarmuka pengguna.

## Authors

- [@yogabayu.ap](https://www.instagram.com/yogabayu.ap) (admin panel)

- [@codewithsadee](https://github.com/codewithsadee/vcard-personal-portfolio) (design frontend)
## Deployment

Pertama, pastikan sudah mempunyai database 

```bash
    composer install

    cp .env.example .env

    php artisan key:generate

    --ganti sesuai konfigurasi database anda
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=testerporto
    DB_USERNAME=root
    DB_PASSWORD=

    php artisan migrate --seed
    php artisan storage:link
    php artisan optimize:clear
    php artisan serve
```

Kemudian anda bisa membuka web portofolio di alamat ``` localhost:8000 ```

Akun admin 
url:  ``` localhost:8000 ```
email: yogabayusbi@gmail.com
pass: 12345678
## Features

- Responsive on different screens
- Curriculum Vitae
- Resume
- Portofolio
- Support SEO 



## Feedback

If you have any feedback, please reach out to us at yogabayusbi@gmail.com or @yogabayu.ap 


## License

[MIT](https://choosealicense.com/licenses/mit/)


## Tech Stack

**Tech:** Laravel 10, ToastJs

