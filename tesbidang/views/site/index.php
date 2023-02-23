<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div>
        <center><h1>UMN Programmer Test</h1></center>
        <br>

        <div class="alert alert-warning">
        Halo. Terima kasih sudah mendownload. Untuk tes kali ini, hanya ada satu pertanyaan yang harus diselesaikan. 
        Kandidat diharapkan dapat mengerti setidaknya basic dari framework PHP Yii2. Oleh karena itu, jawaban anda harus dalam bentuk program Yii2.
        <b>Pengerjaan tidak membutuhkan koneksi database sama sekali.</b>
        </div>
        <b><u>Baca kasus dengan teliti :</u></b><br>
        PT XYZ merupakan franchise minimarket yang sudah memiliki ribuan cabang di Indonesia. Di periode 2018-2019, minimarket XYZ mengadakan promo
        besar-besaran, dimana setiap orang yang mendaftarkan nomor KTPnya pada aplikasi XYZ minimarket delivery akan menjadi member terverifikasi dan mendapatkan 
        voucher diskon sebesar 20% untuk delivery pembelian selanjutnya.
        <br><br>
        Namun, aplikasi ini memiliki celah. Sudah ada pengguna yang berhasil meverifikasi banyak akun berbeda tetapi dengan KTP yang sama. Membuat orang yang sama mendapatkan
        voucher diskon dalam jumlah banyak dan menghabiskan kuota. Celah ini sudah ditutup oleh programmer lain, tetapi menjadi tugas anda untuk menemukan KTP mana saja yang perlu dibanned dari aplikasi. 
        Berkolaborasi dengan programmer lain, anda diminta untuk membuat sebuah fungsi yang menerima Array berisi nomor KTP dan mengembalikan Array No KTP yang sudah melanggar peraturan bahwa 
        <b>satu orang (no KTP) hanya boleh digunakan untuk satu kali verifikasi</b>. Beri nama fungsi ini <b>temukanPelanggar()</b>.
        <br><br><b>Contoh array input (silahkan menambah data dummy sendiri jika perlu)</b> : <br> 
        [
            "3871921234567",
            "3871921198003",
            "3871929000092",
            "3871921234567",
            "3871929000092",
            "3871392900003",
            "3871392900075"
        ]<br>
        <br><b>Output adalah array KTP yang perlu di banned.</b>
        <br><br>
        Selain membuat fungsi PHP diatas, anda juga diminta untuk menyiapkan interface yang dapat digunakan untuk melihat dan mengetes hasil pengecekan, ikuti instruksi dibawah.<br><br>
        <div>
        <b><u>Instruksi Pengerjaan :</u></b><br>
        <ul>
            <li>Buatlah satu controller Yii2 yang bernama <b>jawaban</b> </li>
            <li>Sebagai interfacing, buatlah agar setiap kali <b>actionIndex</b> controller tersebut dijalankan muncul sebuah halaman (view) yang berisi : <br>
                <ol> 
                    <li> Satu buah <b>textarea</b> untuk menginput data KTP. Setiap No KTP akan dipisah dengan tanda koma. User menginputkan secara manual dan format yang diinput diasumsikan selalu benar</li>
                    <li> Satu buah <b>button</b> bertuliskan "Temukan KTP pelanggar" </li>
                    <li> Ketika button tersebut diklik, lakukan pengecekan : </li>
                        <ol>
                            <li>Jika textarea <b>kosong</b> tidak perlu melakukan apa-apa, <b>view index controller jawaban ditampilkan kembali tanpa hasil pengecekan</b></li>
                            <li>Jika <b>tidak kosong</b>, ubah format string pada text area menjadi Array lalu panggil function temukanPelanggar(Array). <b>Tampilkan hasil function pada halaman view index, tepat dibawah button.</b></li>
                        </ol>
                </ol>
            </li>
            <li>Pengerjaan harus dilakukan dengan memodifikasi program Yii2 ini, tidak usah mendownload dari situs Yii lagi</li>
            <li>Pastikan juga bahwa halaman jawaban dapat diakses melalui button dibawah</li>
        </ul>
        </div>
        <br>
        <a class="btn btn-lg btn-primary" href="http://localhost/tesbidang/web/jawaban">Menuju ke Halaman Jawaban</a></p>
    </div>
</div>
