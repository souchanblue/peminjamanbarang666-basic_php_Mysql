<?php
include_once("database.php");
session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['usernames'];
    if (cek_login($_POST['usernames'], $_POST['passwords'])) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        if ($_SESSION['role'] == "admin") {
            header("location:home.php");
        } else {
            header("location:user.php");
        }
    } else {
        header("location:login.php?msg=gagal");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cabin+Sketch:wght@700&family=Nanum+Brush+Script&family=Nanum+Pen+Script&display=swap');

        body {
            background-image: url(bg1.png);
            background-repeat: no-repeat;
            background-position-y: -40px;
            background-size: cover;


        }

        @font-face {
            font-family: "denne-skets";
            src: url("DENNE-SKETCHY.ttf") format("truetype");
        }

        /* Optional custom styles */
        .login-form {
            color: #0c0c0c;
            background: rgba(229, 231, 244, 0.4);
            backdrop-filter: blur(10px);
            padding: 20px;
            font-family: "Nanum Brush Script", cursive;
            font-size: 30px;
            width: 550px;
            margin: auto;
            padding: 30px;
            border: 2px dashed black;
            margin-top: 60px;

        }

        h1 {
            font-family: "denne-skets", sans-serif;
            text-align: center;
            display: block;
            margin: auto;
            margin-top: 60px;
        }

        .background-text {
            font-size: 79px;
            background-size: cover;
            background-position-y: 400px;
            -webkit-background-clip: text;
            background-clip: text;
        }

        h2 {
            font-family: "denne-skets", sans-serif;
            font-size: 50px;
        }

        .form-group {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        input {
            height: 50px;
            font-size: 30px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            color: black;
            width: 490px;
            height: 50px;
            font-size: 30px;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid black;
        }


        .form-control {
            border: 2px solid black;
        }

        .btn:hover {
            border: 2px solid black;
            background: white;
            color: black;
        }

        .btn {
            font-family: "denne-skets", sans-serif;
            font-size: 25px;
            border: 2px solid black;
            background: black;
            color: white;
        }
    </style>
</head>

<body>
    <h1 class="background-text">Selamat Datang Di peminjaman barang</h1>
    <div class="container">
        <div class="login-form">
            <h2 class="text-center mb-4">Login</h2>
            <form method="post">
                <div class="form-group">
                    <label for="username"><b>Username</b></label>
                    <input type="text" class="form-control" id="username" placeholder="Masukan Username" name="usernames">
                </div>
                <div class="form-group">
                    <label for="password"><b>Password</b></label>
                    <input type="password" class="form-control" id="password" placeholder="Masukan Password" name="passwords">
                </div>
                <button type="submit" class="btn btn-dark btn-block mt-4" name="submit">Login</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>