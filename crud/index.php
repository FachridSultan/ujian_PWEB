<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" Sintegrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>
    Fachridt Sultan</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">FACHRIDT SULTAN</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>Sewa Kios</center></h4>
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_sewa'])) {
        $id_sewa = htmlspecialchars($_GET["id_sewa"]);
    

        $sql = "DELETE FROM sewa WHERE id_sewa='$id_sewa'";
        $hasil = mysqli_query($kon, $sql);
        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>id</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Harga</th>
                <th>Status</th>
                <th>No_Hp</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql = "SELECT * FROM sewa ORDER BY id_sewa DESC";
        
        $hasil = mysqli_query($kon, $sql);
        $no = 0;
        
        while ($row = mysqli_fetch_array($hasil)) {
            $no++;
          
            // Use $row within the loop
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row["nama"]; ?></td>
              <td><?php echo $row["alamat"]; ?></td>
              <td><?php echo $row["harga"]; ?></td>
              <td><?php echo $row["status"]; ?></td>
              <td><?php echo $row["no_hp"]; ?></td>
              <td>
                <a href="update.php?id_sewa=<?php echo htmlspecialchars($row['id_sewa']); ?>" class="btn btn-warning" role="button">Update</a>
                <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_sewa=<?php echo $row['id_sewa']; ?>" class="btn btn-danger" role="button">Delete</a>
              </td>
            </tr>
            <?php
          }
          
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>