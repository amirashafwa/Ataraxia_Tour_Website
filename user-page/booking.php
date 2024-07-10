<?php
session_start();
include '../authentication/koneksi.php';
if (!isset($_SESSION['user'])) {
    header('location:../authentication/login-regis.php');
}

$id_destinasi = $_GET['id'];

$id = $_SESSION['user']['id_costumer'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Ataraxia</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="../layout/css/style.css" />
<link rel="stylesheet" href="../layout/css/bootstrap.min.css" rel="stylesheet"/>

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
                        <a class="btn" href="../authentication/logout.php" role="button"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a>
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

<form action="payment.php" method="post">
<section class="booking page-content">
    <div class="container py-5">
    <h1 class="judul-halaman text-center">Booking</h1>
        <div class="row">
            <div class="col mb-5">
                <div class="card p-3">
                    <h6>Booking Details</h6>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Asal</label>
                            <select class="form-select" aria-label="Default select example" name="asal" required>
                            <?php
                            $d = mysqli_query($koneksi, "SELECT*FROM destination");
                            while ($destinasi = mysqli_fetch_array($d)) {
                                ?>
                            <option value="<?php echo $destinasi['id_destinasi']; ?>"><?php echo $destinasi['destinasi']; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tujuan</label>
                            <select class="form-select" aria-label="Default select example" name="tujuan" required>
                            <?php
                            $d = mysqli_query($koneksi, "SELECT*FROM destination WHERE id_destinasi=$id_destinasi");
                            while ($destinasi = mysqli_fetch_array($d)) {
                                ?>
                            <option value="<?php echo $destinasi['id_destinasi']; ?>"><?php echo $destinasi['destinasi']; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Departure</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="berangkat" required>
                        </div>
                        <div class="col mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Return</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="pulang" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Guest</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Jumlah tamu" name="tamu" required>
                        </div>
                        <div class="col mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Category</label>
                            <select class="form-select" aria-label="Default select example" name="kategori">
                                <option value="VIP">VIP</option>
                                <option value="Regular">Regular</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Special Request</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="request"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Flight</label>
                            <select class="form-select" aria-label="Default select example" name="transport" id="transport" required>
                            <?php
                                $query = mysqli_query($koneksi, "SELECT*FROM transport WHERE id_destinasi=$id_destinasi");
                                while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?php echo $data['id']; ?>" data-img_src="../gambar/transport/<?php echo $data['logo']; ?>"><?php echo $data['nama_transport']; ?> - <?php echo $data['wkt_berangkat']; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Villa</label>
                            <select class="form-select" aria-label="Default select example" name="villa" id="villa" required>
                            <?php
                                $query = mysqli_query($koneksi, "SELECT*FROM villa WHERE id_destinasi=$id_destinasi");
                                while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?php echo $data['id_villa']; ?>" data-img_src="../gambar/villa/<?php echo $data['foto_villa']; ?>"><?php echo $data['nama_villa']; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card p-3">
                    <div class="row">
                        <div class="col">
                            <h6>Travelers Details</h6>
                            <label for="" class="form-label">Title</label>
                            <select class="form-select" aria-label="Default select example" name="title" required>
                                <option selected></option>
                                <option value="1">Mr.</option>
                                <option value="2">Mrs.</option>
                                <option value="3">Ms.</option>
                            </select>                      
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ex. Lee Jeno" name="nama" required>
                        </div>
                        <div class="col mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Born Date</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="tgl_lahir" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="ex. 085612543759" name="phone" required>
                        </div>
                        <div class="col mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="ex. email@example.com" name="email" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3" name="book-btn">Booking</button>
    </div>
</section>
</form>

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
</body>
</html>
