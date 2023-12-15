<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Anggota</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        body {
            background-color: #d2b48c; /* Light brown background color */
        }

        .container {
            background-color: #f5f5dc; /* Beige color for the container */
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
        }

        .form-group label {
            color: #8b4513; /* SaddleBrown text color for labels */
        }

        .btn-primary {
            background-color: #8b4513 !important; /* SaddleBrown button color */
            border-color: #8b4513 !important; /* SaddleBrown border color */
        }

        .btn-primary:hover {
            background-color: #cd853f !important; /* Darker brown on hover for buttons */
            border-color: #cd853f !important;
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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_pasien
    if (isset($_GET['id_pasien'])) {
        $id_pasien=input($_GET["id_pasien"]);

        $sql="select * from pasien where id_pasien=$id_pasien";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_pasien=htmlspecialchars($_POST["id_pasien"]);
        $nama=input($_POST["nama"]);
        $poli=input($_POST["poli"]);
        $alamat=input($_POST["alamat"]);
        $no_hp=input($_POST["no_hp"]);
        $keluhan=input($_POST["keluhan"]);

        //Query update data pada tabel anggota
        $sql="update pasien set
			nama='$nama',
			poli='$poli',
			alamat='$alamat',
			no_hp='$no_hp',
			keluhan='$keluhan'
			where id_pasien=$id_pasien";

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
            <label>poli:</label>
            <input type="text" name="poli" class="form-control" placeholder="Masukan Nama poli" required/>
        </div>
        <div class="form-group">
            <label>alamat :</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukan alamat" required/>
        </div>
        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required/>
        </div>
        <div class="form-group">
            <label>keluhan:</label>
            <textarea name="keluhan" class="form-control" rows="5"placeholder="Masukan keluhan" required></textarea>
        </div>

        <input type="hidden" name="id_pasien" value="<?php echo $data['id_pasien']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>