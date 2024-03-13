<?php
include_once("database.php");
$data_edit = edit('barang', $_GET['id']);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta name="view-transition" content="same-origin" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Cabin+Sketch:wght@700&family=Nanum+Brush+Script&family=Nanum+Pen+Script&display=swap');

        body {
            background-image: url("sou1.png");
            font-family: "poppins", sans-serif;
            font-size: 20px;
        }

        .card {
            margin-left: 349px;
        }

        .sidebar {
            border: 1px solid #333;
            background-color: #f8f9fa;
            /* Bootstrap's default sidebar color */
            height: 100vh;
            /* Full height */
            position: fixed;
            /* Fixed Sidebar */
            top: 0;
            left: 0;
            padding-top: 4rem;
            /* Adjust the top padding to align with Bootstrap's navbar height */
        }

        .sidebar ul.nav {
            padding-left: 0;
            /* Remove default padding */
        }

        .sidebar .nav-link {
            padding: 0.5rem 1rem;
            /* Adjust the padding */
            color: #333;
            /* Text color */
        }

        .sidebar .nav-link:hover {
            background-color: #e9ecef;
            /* Hover color */
        }

        /* Adjust main content to make space for the fixed sidebar */
        .col-md-9 {
            margin-left: 25%;
            /* Same width as the sidebar */
            padding-left: 15px;
        }


        header {
            border-bottom: 1px solid #333;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if ($_SESSION['status'] != "login") {
        header("location:login.php?msg=belumlogin");
    }
    ?>
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                <use xlink:href="#bootstrap"></use>
            </svg>
        </a>

        <div class="col-md-3 text-end">
            <a role="button" class="btn btn-primary" href="logout.php">Logout</a>
        </div>
    </header>


    <div class="container">
        <div class="row">
            <div class="col-lg-2 sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_barang.php">Data Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Peminjam.php">Peminjaman Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_user.php">Data user</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="card" style="width: 40rem;">
                    <div class="card-header">
                        <h3>
                            Edit data barang
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php while ($datas = mysqli_fetch_assoc($data_edit)) : ?>
                            <form action="update.php" method="post">
                                <input type="hidden" name="id" value="<?= $datas['id'] ?>">
                                <div class="form-group">
                                    <label for="kodebarang">Kode Barang :</label>
                                    <input type="text" class="form-control" id="kodebarang" name="kode_barang" value="<?= $datas['kode_barang'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="namabarang">Nama Barang :</label>
                                    <input type="text" class="form-control" id="namabarang" name="nama_barang" value="<?= $datas['nama_barang'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori :</label>
                                    <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $datas['kategori'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="merk">Merk :</label>
                                    <input type="text" class="form-control" id="merk" name="merk" value="<?= $datas['merk'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah :</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $datas['jumlah'] ?>">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="button btn btn-primary" name="submit">
                                        Kirim
                                    </button>
                                </div>
                            </form>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>