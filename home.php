<?php
require_once('database.php');
$data = tampildata("SELECT * FROM barang");
$nomor = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Cabin+Sketch:wght@700&family=Nanum+Brush+Script&family=Nanum+Pen+Script&display=swap');

        body {
            /* background-image: url("sou1.png"); */
            font-family: "poppins",
                sans-serif;
            font-size: 20px;
        }

        img {
            height: 91vh;
            position: absolute;
            left: 840px;
            top: 71px;
        }

        @font-face {
            font-family: "denne-skets";
            src: url("DENNE-SKETCHY.ttf") format("truetype");
        }

        h1 {
            font-family: "denne-skets", sans-serif;
            margin: 25% 10%;
            display: table;
            font-size: 60px;
        }

        header {
            background-color: #f8f9fa;
        }

        .table {
            margin-left: 200px;
            width: 100%;
        }

        .tambah {
            margin-left: 20px;
        }

        .sidebar {
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
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_barang.php">Data Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="peminjam.php">Peminjaman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_user.php">Data User</a>
                    </li>
                </ul>
            </div>
            <h1>Peminjaman Barang</h1>
            <img src="yu.png" alt="q">

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


            <script language="JavaScript" type="text/javascript">
                function hapusData(id) {
                    if (confirm("Apakah anda yakin akan menghapus data ini?")) {
                        window.location.href = 'delete.php?id=' + id;
                    }
                }
            </script>
</body>

</html>