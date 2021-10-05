<?php
require 'functions.php';

if (isset($_POST['register'])) {
    if (register($_POST) > 0) {
        echo "
            <script>
                alert('Register Success! Silahkan Login');
                document.location.href = 'login.php';
            </script>
            ";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
                <div class="col-md-12 my-3">
                    <div class="login_page">
                        <div class="form">
                            <form class="register_form" action="" method="POST">
                                <input class="form-control" type="text" placeholder="Username" name="username" />
                                <input class="form-control" type="password" placeholder="Password" name="password" autocomplete="off" />
                                <input class="form-control" type="password" placeholder="Confirm Password" name="password2" autocomplete="off" />
                                <button type="submit" name="register">Register</button>
                                <p class="message">Already Registered? <a href="login.php">Login</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer mt-auto bg-light">
        <div class="container-fluid p-4" style="background-color: #2A0944;">
            <span class="text-muted">Copyright 2021 @AhmadNaufalF</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>