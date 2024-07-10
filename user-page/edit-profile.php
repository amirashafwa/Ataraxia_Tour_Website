<?php
session_start();
include '../authentication/koneksi.php';
if (!isset($_SESSION['user'])) {
    header('location:../authentication/login-regis.php');
}
$id = $_SESSION['user']['id_costumer'];
$query = mysqli_query($koneksi, "SELECT*FROM costumer WHERE id_costumer=$id");
$data = mysqli_fetch_array($query);
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
<link rel="stylesheet" href="../layout/css/aos.css">

<!-- Logo Title Bar -->
<link rel="icon" href="../gambar/logo-title.png" type="image/icon" />
</head>
<body>
<!-- Bootstrap JS-->
<script src="../layout/js/bootstrap.min.js"></script>
<script src="../layout/js/popper.min.js"></script>

<!-- Navbar -->
<nav class="navbar fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../gambar/logo.png" alt="Bootstrap" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <img class="offcanvas-title" id="offcanvasNavbarLabel" src="../gambar/logo.png" alt="Bootstrap" height="50">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php?id=<?php echo $id; ?>"><i class="fa-solid fa-user"></i> My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php"><i class="fa-solid fa-house-user"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="destination.php"><i class="fa-solid fa-location-dot"></i> Destination</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="testimoni.php"><i class="fa-solid fa-face-smile"></i> Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php"><i class="fa-solid fa-id-card"></i> Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.php"><i class="fa-solid fa-user-gear"></i> Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php"><i class="fa-solid fa-building"></i> About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://ataraxianews.000webhostapp.com/"><i class="fa-solid fa-newspaper"></i> News</a>
                    </li>
                    <div class="navbar-nav nav-item nav-link nav-btn">
                        <a class="btn" href="../authentication/login.php" role="button"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a>
                    </div>
                </ul>
            </div>
        </div>
    </div>
    </nav>
    <script>
        const navEl = document.querySelector('.navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 56) {
                navEl.classList.add('navbar-scrolled');
            } else if (window.scrollY < 56) {
                navEl.classList.remove('navbar-scrolled');
            }
        });
    </script>

<section class="profile page-content">
    <div class="container py-5">
    <h1 class="judul-halaman text-center">Edit <span>Profile</span></h1>
        <?php
        $query = mysqli_query($koneksi, "SELECT*FROM costumer WHERE id_costumer=$id");
        $data = mysqli_fetch_array($query);

        if(isset($_POST['first_name'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $username = $_POST['username'];
            $bio = $_POST['bio'];
            $password = md5($_POST['password']);
            $query=mysqli_query($koneksi, "UPDATE costumer SET first_name='$first_name', last_name='$last_name', username='$username', bio='$bio'  WHERE id_costumer =$id");

            $foto = $_FILES['foto'];
            $nama_foto = $foto['name'];


            if ($nama_foto != "") {
                if ($data['profile_img'] != "") {
                    unlink("../gambar/profile-img/".$data['profile_img']);
                }
                move_uploaded_file($foto['tmp_name'], "../gambar/profile-img/".$foto['name']);
                $query = mysqli_query($koneksi, "UPDATE costumer SET profile_img='$nama_foto' WHERE id_costumer=$id ");
            }

            if ($_POST['password'] != "") {
                $query = mysqli_query($koneksi, "UPDATE costumer SET password='$password' WHERE id_costumer=$id");
            }
            
            if ($query) {
                echo "<script>alert('Ubah data berhasil');document.location='profile.php?id=".$data['id_costumer']."';</script>";
            } else {
                echo '<script>alert("Ubah data gagal")</script>';
            }
        }
        ?>
            <section>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <table class="table">
                                        <tr>
                                            <td>Profile Image</td>
                                            <td>:</td>
                                            <td>
                                                <?php
                                                if ($data['profile_img'] != "") {
                                                    echo '<img src="../gambar/profile-img/' . $data['profile_img'] . '" class="rounded" alt="..." width="150">';
                                                } else {
                                                    echo '<img src="../gambar/profile-img/default.jpg" class="rounded" alt="..." width="150">';
                                                }
                                                ?>
                                                <input type="file" name="foto" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>First Name</td>
                                            <td>:</td>
                                            <td><input type="text" class="form-control" name="first_name" id="" value="<?php echo $data['first_name'];?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Last Name</td>
                                            <td>:</td>
                                            <td><input type="text" class="form-control" name="last_name" id="" value="<?php echo $data['last_name'];?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td>:</td>
                                            <td><input type="text" class="form-control" name="username" id="" value="<?php echo $data['username'];?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td>:</td>
                                            <td>
                                                <input type="password" class="form-control" name="password" id="">
                                                <small>*) Jika password tidak diganti maka kosongkan saja</small>
                                            </td>
                                        </tr>
                                            <td>Bio</td>
                                            <td>:</td>
                                            <td>
                                                <textarea name="bio" rows="3" class="form-control"><?php echo $data['bio'];?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </div>
</section>


<section class="footer" data-aos="fade-up" data-aos-duration="500">
    <div class="footer-top">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            <img src="../gambar/logo.png" alt="" style="height: 50px" />
        </div>
        <div class="socials">
        <a href="https://www.instagram.com/ataraxia/" class="link-dark"><i class="fa-brands fa-instagram"></i></a>
        <a href="" class="link-dark"><i class="fa-brands fa-twitter"></i></a>
        <a href="" class="link-dark"><i class="fa-brands fa-facebook"></i></a>
        <a href="" class="link-dark"><i class="fa-brands fa-tiktok"></i></a>
        </div>
    </div>
    </div>
    <div class="footer-bottom">
    <div class="container">
        <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1144.5442376490184!2d105.30875159237162!3d-5.113965569563431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1692791627973!5m2!1sid!2sid"
                width="400"
                height="300"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="footer-content">
            <h5>Destination</h5>
            <ul>
                <li><a href="destination.php">Africa</a></li>
                <li><a href="destination.php">America</a></li>
                <li><a href="destination.php">Asia</a></li>
                <li><a href="destination.php">Australia</a></li>
                <li><a href="destination.php">Europe</a></li>
            </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="footer-content">
            <h5>Company</h5>
            <ul>
                <li><a href="about.php">About Us</a></li>
                <li><a href="team.php">Our Team</a></li>
            </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="footer-content">
            <h5>Contact Information</h5>
            <ul>
                <li>
                <a href="https://www.whatsapp.com/?lang=id"><i class="fa-solid fa-phone"></i> +62 851 5684 5840</a>
                </li>
                <li>
                <a href="https://mail.google.com/"><i class="fa-solid fa-envelope"></i> ataraxia@gmail.com</a>
                </li>
                <li>
                <a href=""><i class="fa-solid fa-globe"></i> http://ataraxia.com</a>
                </li>
            </ul>
            <h5>We Accect</h5>
            <div class="card-area">
                <span class="link-light"><i class="fa-brands fa-cc-visa"></i></span>
                <span class="link-light"><i class="fa-solid fa-credit-card"></i></span>
                <span class="link-light"><i class="fa-brands fa-cc-mastercard"></i></span>
                <span class="link-light"><i class="fa-brands fa-cc-paypal"></i></span>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>

<script src="../layout/js/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
