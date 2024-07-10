<?php
session_start();
include '../authentication/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ataraxia</title>
    <link rel="stylesheet" href="../layout/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="../layout/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Logo Title Bar -->
    <link rel="icon" href="../gambar/logo-title.png" type="image/icon" />
</head>
<body>
<!-- Bootstrap JS-->
<script src="../layout/js/bootstrap.min.js"></script>
<script src="../layout/js/popper.min.js"></script>
<script src="../layout/js/sweetalert2.all.min.js"></script>




<!-- Section: Design Block -->
<section class="">
<!-- Jumbotron -->
<div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
        <div class="row gx-lg-5 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h1 class=" display-3 fw-bold ls-tight">
                    Welcome to <br />
                    <span class="text-primary">Ataraxia</span>
                </h1>
                <p style="color: hsl(217, 10%, 50.8%)">
                    Get experience like on heaven. Come join trip with us!
                </p>
                <ul class="nav nav-pills mb-4 row" id="pills-tab" role="tablist">
                    <li class="nav-item col-md-6" role="presentation">
                        <button class="nav-link active form-control" id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login" type="button" role="tab" aria-controls="pills-login" aria-selected="true">Login</button>
                    </li>
                    <li class="nav-item col-md-6" role="presentation">
                        <button class="nav-link form-control" id="pills-register-tab" data-bs-toggle="pill" data-bs-target="#pills-register" type="button" role="tab" aria-controls="pills-register" aria-selected="false">Register</button>
                    </li>
                </ul>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="card">
                    <div class="card-body py-5 px-md-5">
                        <img src="../gambar/logo.png" class="rounded mx-auto d-block mb-3" alt="Logo" height="70">
                        <div class="tab-content" id="pills-tabContent">
                        <?php
                        if (isset($_POST['blogin'])) {
                            $username = $_POST['username'];
                            $password = md5($_POST['password']);

                            $cek_admin = mysqli_query($koneksi, "SELECT*FROM admin WHERE username = '$username' AND password = '$password'");

                            if (mysqli_num_rows($cek_admin) > 0) {
                                $_SESSION['user'] = mysqli_fetch_array($cek_admin);
                                echo '<script>Swal.fire({
                                                title: "Login Berhasil!",
                                                text: "Selamat datang, '.$_SESSION['user']['name'].'!",
                                                icon: "success"
                                            }).then((result) => {if (result.value){
                                                window.location="../admin-page/admin.php";
                                            }
                                        });
                                    </script>';
                            } else {
                                $cek_costumer = mysqli_query($koneksi, "SELECT*FROM costumer WHERE username = '$username' AND password = '$password'");

                                if (mysqli_num_rows($cek_costumer) > 0) {
                                
                                    $_SESSION['user'] = mysqli_fetch_array($cek_costumer);
                                    echo '<script>Swal.fire({
                                        title: "Login Berhasil!",
                                        text: "Selamat datang, '.$_SESSION['user']['username'].'!",
                                        icon: "success"
                                    }).then((result) => {if (result.value){
                                        window.location="../index.php";
                                    }
                                });
                            </script>';
                                } else {
                                    echo '<script>Swal.fire({
                                        icon: "error",
                                        title: "Oops...",
                                        text: "Username/Password Salah!"
                                    });</script>';
                                }
                            }
                        }
                        ?>
                            <p class="text-center text-body-tertiary"><small>Please enter your details</small></p>
                            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab" tabindex="0">
                                <form method="post">
                                    <!-- Email input -->
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
                                        <label for="floatingInput">Username</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                                        <label for="floatingPassword">Password</label>
                                    </div>
        
                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary btn-block form-control mb-4" name="blogin">
                                    Log In
                                    </button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab" tabindex="0">
                            <?php
                            if (isset($_POST['bregis'])) {
                                $firstname = $_POST['firstname'];
                                $lastname = $_POST['lastname'];
                                $email = $_POST['email'];
                                $username = $_POST['username'];
                                $password = md5($_POST['password']);

                                $user_check = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM costumer WHERE username='$username'"));

                                $email_check = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM costumer WHERE email='$email'"));

                                if ($user_check > 0) {
                                    echo '<script>Swal.fire({
                                        icon: "error",
                                        title: "Oops...",
                                        text: "Username telah digunakan!"
                                    });</script>';
                                } elseif ($email_check > 0) {
                                    echo '<script>Swal.fire({
                                        icon: "error",
                                        title: "Oops...",
                                        text: "Email telah digunakan!"
                                    });</script>';
                                } else {
                                    $query = mysqli_query($koneksi, "INSERT INTO costumer (first_name, last_name, username, email, password) values ('$firstname', '$lastname', '$username', '$email', '$password')");
                                    if ($query) {
                                        echo '<script>Swal.fire({
                                            title: "Register Berhasil!",
                                            text: "Silahkan login!",
                                            icon: "success"
                                        });
                                        </script>';
                                    } else {
                                        echo '<script>Swal.fire({
                                            icon: "error",
                                            title: "Oops...",
                                            text: "Register gagal!"
                                        });</script>';
                                    }
                                }

                            }
                            ?>
                                <form method="post">
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Jeno" name="firstname">
                                                <label for="floatingInput" required>First & Middle Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Lee" name="lastname">
                                                <label for="floatingInput" required>Last Name</label>
                                            </div>
                                        </div>
                                    </div>
        
                                    <!-- Email input -->
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="username" name="username">
                                        <label for="floatingInput" required>Username</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                                        <label for="floatingInput" required>Email address</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                                        <label for="floatingPassword" required>Password</label>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary btn-block form-control mb-4" name="bregis">
                                    Register
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Jumbotron -->
</section>
<!-- Section: Design Block -->



</body>
</html>
