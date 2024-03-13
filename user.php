<?php
require_once('database.php');
$data = tampildata("SELECT * FROM barang");
$nomor = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="view-transition" content="same-origin" />
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
            font-family: "Nanum Pen Script", sans-serif;
            font-size: 30px;
            margin: 0;
            padding: 0;
        }



        @font-face {
            font-family: "denne-skets";
            src: url("DENNE-SKETCHY.ttf") format("truetype");
        }

        h1 {
            font-family: "denne-skets", sans-serif;
            font-size: 79px;
            background-size: cover;
            background-position-y: 400px;
            position: relative;
            text-align: center;
            font-size: 100px;
        }

        .container {
            margin: 50px auto;
            width: 100%;
            max-width: 1000px;
        }

        table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 5px rgba(0, 0, 0, 1);
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:hover {
            background-color: rgba(255, 255, 255, 0.9);
            /* Adjust hover transparency here */
        }

        .btn {
            font-size: 25px;
        }

        header {
            text-align: right;
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
    <h1>Data Barang Yang Tersedia</h1>
    <header>
        <div class="col-md-3 text-end">
            <a role="button" class="btn btn-primary" href="logout.php">Logout</a>
        </div>
    </header>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $note) : ?>
                    <?php $nomor++; ?>
                    <tr>
                        <th scope="row"><?= $nomor; ?></th>
                        <td><?= $note['kode_barang']; ?></td>
                        <td><?= $note['nama_barang']; ?></td>
                        <td><?= $note['kategori']; ?></td>
                        <td><?= $note['merk']; ?></td>
                        <td><?= $note['jumlah']; ?></td>
                        <td>
                            <?php
                            if ($note['jumlah'] == 0) {
                                echo "
                                                            <button class='btn btn-danger'>tidak tersedia</button>
                                                        ";
                            } else {
                                echo "
                                                            <a class='btn btn-success'>Tersedia</a>
                                                        ";
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>