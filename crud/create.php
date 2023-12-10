<!DOCTYPE html>
<html>
<head>
    <title>Sewa Kios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
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
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $alamat=input($_POST["alamat"]);
        $harga=input($_POST["harga"]);
        $status=input($_POST["status"]);
        $no_hp=input($_POST["no_hp"]);

        //Query input menginpu$no_hpt data kedalam tabel anggota
        $sql="insert into sewa (nama,alamat,harga,no_hp,status) values
        ('$nama','$alamat','$harga','$no_hp','$status')";

        //Mengeksekusi/menjalankan query diatas
        $hasil = mysqli_query($kon, $sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
        }
    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
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
                </p>
        <div class="form-group">
            <label>Status:</label>
            <input type="text" name="status" class="form-control" placeholder="Masukan Status" required/>
        </div>
        <div class="form-group">
            <label>No HP:</label>
            <textarea name="no_hp" class="form-control" rows="5"placeholder="Masukan No HP" required></textarea>
        </div>       

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>