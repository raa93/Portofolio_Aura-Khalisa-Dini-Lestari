<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<style>
        body {
            background-color: #ffe6e6; /* Soft red background color */
        }

        .container {
            background-color: #f2dede; /* Light red color for the container */
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
        }

        .navbar {
            background-color: #d9534f !important; /* Darker red for the navbar */
        }

        .table-danger {
            background-color: #f2dede; /* Light red color for the table header */
        }

        .table-primary th {
            background-color: #d9534f; /* Darker red color for the table header cells */
            color: white;
        }

        .btn-danger {
            background-color: #d9534f !important; /* Darker red color for the delete button */
            border-color: #d9534f !important;
        }

        .btn-danger:hover {
            background-color: #c9302c !important; /* Darker shade on hover */
            border-color: #ac2925 !important;
        }
    </style>
</head>
<title>
    UJIAN PRAKTIKUM PWEB</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">MOHON MASUKKAN DATA DIRI ANDA DENGAN BENAR !</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>DAFTAR DATA PASIEN</center></h4>
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_pasien'])) {
        $id_pasien=htmlspecialchars($_GET["id_pasien"]);

        $sql="delete from pasien where id_pasien='$id_pasien' ";
        $hasil=mysqli_query($kon,$sql);

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
            <th>No</th>
            <th>Nama</th>
            <th>poli</th>
            <th>alamat</th>
            <th>No Hp</th>
            <th>keluhan</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from pasien order by id_pasien desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["poli"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td><?php echo $data["no_hp"];   ?></td>
                <td><?php echo $data["keluhan"];   ?></td>
                <td>
                    <a href="update.php?id_pasien=<?php echo htmlspecialchars($data['id_pasien']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_pasien=<?php echo $data['id_pasien']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>