## Sistem Monitoring Sebaran Covid-19

### PANDUAN SINGKAT INSTALASI DAN PENGGUNAAN PROGRAM

*Pastikan terlebih dahulu XAMPP sudah terinstal. Kebutuhan lain adalah browser.
Versi PHP yang digunakan dalam pengembangan sistem adalah PHP versi 5.6, akan optimal bila menggunakan XAMPP / Web Server yang telah include dengan PHP 5.6.

1) Mengaktifkan Xampp
   a. Buka Xampp-Control Panel
   b. Klik Start pada Module Apache dan MySql

2) Import Database MySql
   a. Buka Browser, lalu ketikkan
      localhost/phpmyadmin
   b. Kemudian klik Database
   c. Pada Create Database, memasukkan nama Database yang diinginkan. Disini saya membuat db_monitoringcovid19, pastikan bahwa tidak ada spasi saat pembuatan nama database
   d. Kemudian klik Create
   e. Kemudian klik pada database yang baru dibuat (db_monitoringcovid19)
   f. klik Import
   g. klik Choose file, lalu arahkan kepada file database. biasa memiliki extensi (.sql) (db_monitoringcovid19)
   h. Kemudian klik Go (Posisi berada paling bawah halaman browser)
   i. Import database selesai.

3) Pindahkan PHP ke htdocs dan atur koneksi ke database
   a. Copy folder project PHP (monitoring_covid19) yang mau dipindahkan, kemudian paste pada C:\xampp\htdocs
   b. Sesuaikan pengaturan XAMPP untuk config host laptop pribadi dengan file koneksi.php yang ada pada folder admin_panel > config
   c. Pastikan pada koneksi menggunakan nama database yang baru dibuat, yaitu db_monitoringcovid19. saya biasa membuat file koneksi tersendiri yang saya beri nama koneksi.php.

4) Menjalankan Program 
   a. Buka browser
   b. Ketikkan localhost/monitoring_covid19
   c. Program telah dapat digunakan
