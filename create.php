<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran pasien</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        body {
            background-color: #add8e6; /* Soft blue background color */
        }

        .container {
            background-color: #f0f8ff; /* AliceBlue color for the container */
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
        }

        .form-group label {
            color: #000080; /* Navy text color for labels */
        }

        .btn-primary {
            background-color: #4682b4 !important; /* SteelBlue button color */
            border-color: #4682b4 !important; /* SteelBlue border color */
        }

        .btn-primary:hover {
            background-color: #5f9ea0 !important; /* Darker SteelBlue on hover for buttons */
            border-color: #5f9ea0 !important;
        }
    </style>
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
        $poli=input($_POST["poli"]);
        $alamat=input($_POST["alamat"]);
        $no_hp=input($_POST["no_hp"]);
        $keluhan=input($_POST["keluhan"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into pasien (nama,poli,alamat,no_hp,keluhan) values
		('$nama','$poli','$alamat','$no_hp','$keluhan')";

        //Mengeksekusi/menjalankan query diatas
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
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

        </div>
        <div class="form-group">
            <label>poli:</label>
            <input type="text" name="poli" class="form-control" placeholder="Masukan Nama poli" required/>
        </div>
       <div class="form-group">
            <label>alamat :</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukan alamat" required/>
        </div>
                </p>
        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required/>
        </div>
        <div class="form-group">
            <label>keluhan:</label>
            <textarea name="keluhan" class="form-control" rows="5"placeholder="Masukan keluhan" required></textarea>
        </div>       

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>