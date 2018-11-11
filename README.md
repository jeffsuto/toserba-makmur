# toserba-makmur
Web admin untuk toko online Toserba Makmur yang terintegrasi dengan mobile app. Web ini dibangun dengan menggunakan framework Codeigniter yang terintegrasi dengan Eloquent ORM dan Blade dari Laravel. Dilengkapi dengan notifikasi email customer dan di aplikasi mobile customer

Mobile app Toserba Makmur :
https://github.com/aditnanda/toserba-makmur-app

# TODO
1.	Konfigurasi Email untuk notifikasi email customer ada di application/libraries/MY_Email.php
2.	Konfigurasi Notifikasi untuk mobile ada di application/libraries/Notification.php
3.	Buat database baru dengan nama db_toserbamakmur lalu import file db_toserbamakmur.sql

# Menu
1.  Barang
2.  Supplier
3.  Kategori
4.  Pengiriman
5.  Penjualan
6.  Pegawai
7.  Laporan Pengiriman (harian,bulanan, tahunan dan konversi ke .PDF)
8.  Laporan Pembelian (harian,bulanan, tahunan dan konversi ke .PDF)
9.  Laporan Penjualan (harian,bulanan, tahunan dan konversi ke .PDF)
#

Jika ingin merubah base_url, jangan lupa untuk merubah "let base_url" di assets/js/custom.js
