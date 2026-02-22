<?php
    include 'koneksi.php';
    date_default_timezone_set("Asia/Jakarta");

    $identitas = mysqli_query($conn,"SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
    $d = mysqli_fetch_object($identitas);
?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="uploads/identitas/<?= $d->favicon ?>" >
        <title> Website <?= $d->nama ?></title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    </head>
    <body>
        <!-- bagian header -->
        <div class="header">
            <div class="container">

                <div class="header-logo">
                    <img src="uploads/identitas/<?= $d->logo ?>" width="70" >
                    <h2><a href=""><?= $d->nama ?></a></h2>
                </div>

                <ul class="header-menu">
                    <li> <a href="">Beranda</a></li>
                    <li> <a href="">Tentang Sekolah</a></li>
                    <li> <a href="">Guru</a></li>
                    <li> <a href="">Galeri</a></li>
                    <li> <a href="">Informasi</a></li>
                    <li> <a href="">Kontak</a></li>
                </ul>

            </div>
        </div>

        <!-- bagian banner-->
        <div class="banner" style="background-image: url('uploads/identitas/<?= $d->foto_sekolah ?>');">
            <div class="banner-text">
                <div class="container">
                    <h3>Selamat Datang di <?= $d-> nama ?></h3>
                    <p>Madrasah Ibtidaiyah Swasta Al-Ikhlasiah 
                        Bertaqwa, Berilmu Pengetahuan, Berakhlak Mulia Serta Berwawasan.</p>
                </div>
            </div>
        </div>

        <!--bagian sambutan -->
        <div class="section">
            
        <div class="container text-center">
            <h3> Kepala Madrasah </h3>
            <img src="uploads/identitas/<?= $d->foto_kepsek ?>" width="100px">
            <h4><?= $d->nama_kepsek ?></h4>
            <p><?= $d->sambutan_kepsek ?></p>
        </div>
        </div>

        <!--bagian guru -->
        <div class="section" id="guru">
            <div class="container text-center">
            <h3> Guru </h3>

            <?php
                $guru = mysqli_query($conn, "SELECT * FROM guru ORDER BY id DESC");
                if(mysqli_num_rows($guru) > 0 ){
                    while($g = mysqli_fetch_array($guru)){
            ?>

            <div class="col-4">
                        <a href="#" class="thumbnail-link">

                        <div class="thumbnail-box">
                        <div class="thumbnail-img" style="background-image: url('uploads/guru/<?= $g['gambar'] ?>');">


                        </div>


                        <div class="thumbnail-text" >

                            <?= $g['nama'] ?>

                        </div>
                        </div>
                        </a>
            </div>


            <?php }}else{ ?>


                    Tidak ada Data


                <?php } ?>
            </div>

        </div>

    </body>

</html>