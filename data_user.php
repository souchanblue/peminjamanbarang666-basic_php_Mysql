<?php
require_once('database.php');
$data = tampildata("SELECT * FROM user");
$nomor = 0;
?>

<?php
include_once("database.php");
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
            background-image: url("sou1.png");
            font-family: "poppins", sans-serif;
            font-size: 20px;
        }

        .table {
            margin-top: 20px;
            position: absolute;
            align-items: center;
            width: 161svh;
            height: 100px;
            margin-left: 24px;
            background-color: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(5px);
        }


        .table th,
        .td {
            background-color: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
        }

        .tables {
            margin-left: 70px;
            margin-bottom: 20px;
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
                        <a class="nav-link" href="Peminjam.php">Peminjaman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_user.php">Data User</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="tables">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah User
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form inside the modal -->
                                <form action="proses_user.php" method="post">
                                    <div class="form-group">
                                        <label for="noidentitas">No identitas :</label>
                                        <input type="text" class="form-control" id="noidentitas" name="no_identitas">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama :</label>
                                        <input type="text" class="form-control" id="nama" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status :</label>
                                        <input type="text" class="form-control" id="status" name="status">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username :</label>
                                        <input type="text" class="form-control" id="username" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password :</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role :</label>
                                        <input type="text" class="form-control" id="role" name="role">
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="button btn btn-primary" name="submit">
                                    Kirim
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-4  ">
                <div class="cobtainer">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">No identitas</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Status</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Role</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $note) : ?>
                                <?php $nomor++; ?>
                                <tr>
                                    <th scope="row"><?= $nomor; ?></th>
                                    <td><?= $note['no_identitas']; ?></td>
                                    <td><?= $note['nama']; ?></td>
                                    <td><?= $note['status']; ?></td>
                                    <td><?= $note['username']; ?></td>
                                    <td><?= $note['password']; ?></td>
                                    <td><?= $note['role']; ?></td>
                                    <td>
                                        <a role="button" class="btn btn-primary" href="edit_user.php?id=<?= $note['id']; ?>">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="javascript:hapusData(<?php echo $note['id']; ?>)" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script language="JavaScript" type="text/javascript">
        function hapusData(id) {
            if (confirm("Apakah anda yakin akan menghapus data ini?")) {
                window.location.href = 'delete_user.php?id=' + id;
            }
        }
    </script>
</body>

</html>