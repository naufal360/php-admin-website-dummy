<?php
session_start();
require 'functions.php';

// cek cookie
if (isset($_COOKIE['start']) && isset(($_COOKIE['key']))) {

    $start = $_COOKIE['start'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = '$start'");
    $row = mysqli_fetch_assoc($result);

    // cek cookie berdasarkan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

// cek apakah sudah login
if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}


if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // query
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // cek session
            $_SESSION['login'] = true;
            // cek remember me
            if (isset($_POST['remember'])) {
                setcookie('start', $row['id'], time() + 300);
                setcookie('key', hash('sha256', $row['username']), time() + 300);
            }
            // redirect
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/loginreg.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-light" style="background-color: #2A0944;">
        <div class="container-fluid">
            <a class="navbar-brand p-3 d-inline-flex" href="#">
                <h4 style="color: whitesmoke;">Universitas Guara-Guara</h4>
            </a>
        </div>
    </nav>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 my-3 p-3">
                    <div class="login_page">
                        <div class="form">
                            <form class="login_form" action="" method="POST">
                                <input type="text" placeholder="Username" name="username" autocomplete="off">
                                <input type="password" placeholder="Password" name="password">
                                <div class="d-inline-flex p-2 mt-1 mb-2">
                                    <input class="m-auto" style="width: 1rem" type="checkbox" id="remember" name="remember">
                                    <label class="text-start mx-2" style="width: 18rem; color:whitesmoke;" for="remember">Remember me</label>
                                </div>
                                <?php if (isset($error)) { ?>
                                    <p style="color: red; font-style: italic;">Username / Password salah!</p>
                                <?php } ?>
                                <button type="submit" name="login">login</button>
                                <p class="message">Not Registered? <a href="register.php">Register Now!</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer mt-auto bg-light">
        <div class="container-fluid p-3" style="background-color: #2A0944;">
            <span class="text-muted">Copyright 2021 @AhmadNaufalF</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>