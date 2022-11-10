<?php
session_start();
require 'connect.php';

if (isset($_POST["loginAD"])) {
    $username = $_POST["usernameAD"];
    $password = $_POST["passwordAD"];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
    $cek = mysqli_num_rows($result);
    while ($results = mysqli_fetch_array($result)) {
        $id_admin = $results['id_admin'];
        $nama = $results['nama'];
    }

    if ($cek > 0) {
        $_SESSION["LoginAD"] = true;
        $_SESSION["id"] = $id_admin;
        $_SESSION["nama"] = $nama;
        header("Location: AdminService.php");
        exit;
    }
    $error = true;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SeBengkel</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="styles.css" rel="stylesheet" />
    <link href="styles2.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="banner row align-items-center ">
            <form class="loginAdmin" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">User Name</label>
                    <input name="usernameAD" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="User Name" type="text">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="passwordAD" type="password" class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button name="loginAD" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>