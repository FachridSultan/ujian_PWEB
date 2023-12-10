<!DOCTYPE html>
<html>
<head>
    <title>Sewa Kios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" Aintegrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_sewa
    if (isset($_GET['id_sewa'])) {
        // Update query
        $sql = "update sewa set
        ...
        where id_sewa=$id_sewa";

        $id_sewa = input($_GET["id_sewa"]);
        $sql = "select * from sewa where id_sewa=$id_sewa";

        $hasil = mysqli_query($kon, $sql);
        $data = mysqli_fetch_assoc($hasil);

    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_sewa=htmlspecialchars($_POST["id_sewa"]);
        $nama=input($_POST["nama"]);
        $alamat=input($_POST["alamat"]);
        $harga=input($_POST["harga"]);
        $status=input($_POST["status"]);
        $no_hp=input($_POST["no_hp"]);

        //Query update data pada tabel anggota
        $sql="update sewa set
			nama='$nama',
			alamat='$alamat',
			harga='$harga',
			status='$status',
			no_hp='$no_hp'
			where id_sewa=$id_sewa";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

        </div>
        <div class="form-group">
        <label>Alamat:</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" required/>
        </div>
        <div class="form-group">
        <label>Harga :</label>
            <input type="text" name="harga" class="form-control" placeholder="Masukan Harga" required/>
        </div>
        <div class="form-group">
        <label>Status:</label>
            <input type="text" name="status" class="form-control" placeholder="Masukan Status" required/>
        </div>
        <div class="form-group">
        <label>No HP:</label>
            <textarea name="no_hp" class="form-control" rows="5"placeholder="Masukan No HP" required></textarea>
        </div>

        <input type="hidden" name="id_sewa" value="<?php echo $data['id_sewa']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>