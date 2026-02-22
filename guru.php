<?php include 'header.php' ?>


<!--content-->
<div class="content">

    <div class="container">
        <div class="box">


        <div class="box-header">
           Guru
        </div>

        <div class="box-body">
            <a href="tambah-guru.php" class="text-purple"><i class="fa fa-plus"> </i> Tambah </a>
            
            <?php
                if(isset($_GET['success'])){
                    echo "<div class= 'alert-success'>".$_GET['success']."</div>";

                }

            ?>


            
            <form action="">
                <div class="input-group">
                    <input type="text" name="key" placeholder="Pencarian">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
                
           
            <table class="table" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;

                    $where = "WHERE 1=1 ";
                    if(isset($_GET['key'])){
                        $where .= " AND nama LIKE '%".addslashes($_GET['key'])."%' ";
                    }
                        $guru = mysqli_query($conn, "SELECT * FROM guru $where ORDER BY id DESC");
                        if(mysqli_num_rows($guru) > 0){
                                while($p = mysqli_fetch_array($guru)) {

                    ?>
                    <tr>

                    <td><?= $no++ ?> </td>
                    <td><?= $p['nama'] ?> </td>
                    <td><?= $p['keterangan'] ?> </td>
                    <td><img src="../uploads/guru/<?= $p['gambar'] ?>" width="100px"> </td>
                    <td>
                        <a href="edit-guru.php?id=<?= $p['id'] ?>" title="Edit Data"class="text-orange"><i class="fa fa-edit"></i></a>
                        <a href="hapus.php?idguru=<?= $p['id'] ?>" onclick="return confirm('Yakin ingin hapus pengguna ini?')"title="Hapus Data" class="text-red"><i class="fa fa-times"></i></a>
                    </td>

                   </tr>

                   <?php }}else{ ?>
                    <tr>
                        <td colspan="5">Data Tidak Ada  </td>

                   </tr>
                    <?php } ?>
                </tbody>
            </table>



        </div>

    </div>

</div>
<?php include 'footer.php' ?>
