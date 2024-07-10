<?php
session_start();
include '../authentication/koneksi.php';
if (!isset($_SESSION['user'])) {
    header('location:../authentication/login-regis.php');
}

$id = $_SESSION['user']['id_costumer'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ataraxia</title>
    <link rel="stylesheet" href="../layout/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="../layout/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../layout/css/aos.css">

    <!-- Logo Title Bar -->
    <link rel="icon" href="../gambar/logo-title.png" type="image/icon">
</head>
<body>
<!-- Bootstrap JS-->
<script src="../layout/js/bootstrap.min.js"></script>
<script src="../layout/js/popper.min.js"></script>

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
                        <a class="nav-link active" aria-current="page" href="destination.php"><i class="fa-solid fa-location-dot"></i> Destination</a>
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

<div class="container py-5 page-content">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="true">All</button>
            <button class="nav-link" id="nav-africa-tab" data-bs-toggle="tab" data-bs-target="#nav-africa" type="button" role="tab" aria-controls="nav-africa" aria-selected="false">Africa</button>
            <button class="nav-link" id="nav-america-tab" data-bs-toggle="tab" data-bs-target="#nav-america" type="button" role="tab" aria-controls="nav-america" aria-selected="false">America</button>
            <button class="nav-link" id="nav-asia-tab" data-bs-toggle="tab" data-bs-target="#nav-asia" type="button" role="tab" aria-controls="nav-asia" aria-selected="false">Asia</button>
            <button class="nav-link" id="nav-australia-tab" data-bs-toggle="tab" data-bs-target="#nav-australia" type="button" role="tab" aria-controls="nav-australia" aria-selected="false">Australia</button>
            <button class="nav-link" id="nav-europe-tab" data-bs-toggle="tab" data-bs-target="#nav-europe" type="button" role="tab" aria-controls="nav-europe" aria-selected="false">Europe</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab" tabindex="0">
            <div class="destination">
                <div class="container py-5">
                <h1 class="judul-halaman text-center" data-aos="zoom-in" data-aos-duration="1000"><span>All</span></h1>
                <?php
                if(isset($_GET['search'])){
                    $search = $_GET['search'];
                    echo "<b>Hasil pencarian : ".$search."</b>";
                    $query = mysqli_query($koneksi, "SELECT * FROM destination WHERE destinasi LIKE '%".$search."%' OR negara LIKE '%".$search."%' OR benua LIKE '%".$search."%'");			
                }else{
                    $query = mysqli_query($koneksi, "SELECT*FROM destination");	
                }
                ?>
                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4 py-5">
                    <?php
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="card">
                                <img src="../gambar/destinasi/<?php echo $data['foto']; ?>" class="card-img" alt="<?php echo $data['destinasi']; ?>">
                                <p class="rating"><i class="fa-solid fa-star" style="color: rgb(255, 217, 0)"></i> <span>| 4.8</span></p>
                                <p class="favorite"><i class="fa-regular fa-heart"></i></p>
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo $data['destinasi']; ?></h3>
                                    <p class="location"><i class="fa-solid fa-location-dot" style="color: #000000;"></i> <?php echo $data['negara']; ?></p>
                                </div>
                                <a href="detail.php?id=<?php echo $data['id_destinasi'];?>" class="btn more-btn">More</a>
                            </div>
                        </div>
                        <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-africa" role="tabpanel" aria-labelledby="nav-africa-tab" tabindex="0">
            <div class="destination">
                <div class="container py-5">
                <h1 class="judul-halaman text-center" data-aos="zoom-in" data-aos-duration="1000"><span>Africa</span></h1>
                <?php
                if(isset($_GET['search'])){
                    $search = $_GET['search'];
                    echo "<h3>Hasil pencarian : ".$search."</h3>";
                    $query = mysqli_query($koneksi, "SELECT * FROM destination WHERE (destinasi LIKE '%".$search."%' OR negara LIKE '%".$search."%' OR benua LIKE '%".$search."%') AND benua='Africa'");
                }else{
                    $query = mysqli_query($koneksi, "SELECT*FROM destination WHERE benua='Africa'");	
                }
                ?>
                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4 py-5">
                    <?php
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="card">
                                <img src="../gambar/destinasi/<?php echo $data['foto']; ?>" class="card-img" alt="<?php echo $data['destinasi']; ?>">
                                <p class="rating"><i class="fa-solid fa-star" style="color: rgb(255, 217, 0)"></i> <span>| 4.8</span></p>
                                <p class="favorite"><i class="fa-regular fa-heart"></i></p>
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo $data['destinasi']; ?></h3>
                                    <p class="location"><i class="fa-solid fa-location-dot" style="color: #000000;"></i> <?php echo $data['negara']; ?></p>
                                </div>
                                <a href="detail.php?id=<?php echo $data['id_destinasi'];?>" class="btn more-btn">More</a>
                            </div>
                        </div>
                        <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-america" role="tabpanel" aria-labelledby="nav-america-tab" tabindex="0">
            <div class="destination">
                <div class="container py-5">
                    <h1 class="judul-halaman text-center" data-aos="zoom-in" data-aos-duration="1000"><span>America</span></h1>
                    <?php
                    if(isset($_GET['search'])){
                        $search = $_GET['search'];
                        echo "<h3>Hasil pencarian : ".$search."</h3>";
                        $query = mysqli_query($koneksi, "SELECT * FROM destination WHERE (destinasi LIKE '%".$search."%' OR negara LIKE '%".$search."%' OR benua LIKE '%".$search."%') AND benua='America'");		
                    }else{
                        $query = mysqli_query($koneksi, "SELECT*FROM destination WHERE benua='America'");	
                    }
                    ?>
                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4 py-5">
                    <?php
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="card">
                                <img src="../gambar/destinasi/<?php echo $data['foto']; ?>" class="card-img" alt="<?php echo $data['destinasi']; ?>">
                                <p class="rating"><i class="fa-solid fa-star" style="color: rgb(255, 217, 0)"></i> <span>| 4.8</span></p>
                                <p class="favorite"><i class="fa-regular fa-heart"></i></p>
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo $data['destinasi']; ?></h3>
                                    <p class="location"><i class="fa-solid fa-location-dot" style="color: #000000;"></i> <?php echo $data['negara']; ?></p>
                                </div>
                                <a href="detail.php?id=<?php echo $data['id_destinasi'];?>" class="btn more-btn">More</a>
                            </div>
                        </div>
                        <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-asia" role="tabpanel" aria-labelledby="nav-asia-tab" tabindex="0">
            <div class="destination">
                <div class="container py-5">
                    <h1 class="judul-halaman text-center" data-aos="zoom-in" data-aos-duration="1000"><span>Asia</span></h1>
                    <?php
                    if(isset($_GET['search'])){
                        $search = $_GET['search'];
                        echo "<h3>Hasil pencarian : ".$search."</h3>";
                        $query = mysqli_query($koneksi, "SELECT * FROM destination WHERE (destinasi LIKE '%".$search."%' OR negara LIKE '%".$search."%' OR benua LIKE '%".$search."%') AND benua='Asia'");		
                    }else{
                        $query = mysqli_query($koneksi, "SELECT*FROM destination WHERE benua='Asia'");	
                    }
                    ?>
                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4 py-5">
                    <?php
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="card">
                                <img src="../gambar/destinasi/<?php echo $data['foto']; ?>" class="card-img" alt="<?php echo $data['destinasi']; ?>">
                                <p class="rating"><i class="fa-solid fa-star" style="color: rgb(255, 217, 0)"></i> <span>| 4.8</span></p>
                                <p class="favorite"><i class="fa-regular fa-heart"></i></p>
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo $data['destinasi']; ?></h3>
                                    <p class="location"><i class="fa-solid fa-location-dot" style="color: #000000;"></i> <?php echo $data['negara']; ?></p>
                                </div>
                                <a href="detail.php?id=<?php echo $data['id_destinasi'];?>" class="btn more-btn">More</a>
                            </div>
                        </div>
                        <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-australia" role="tabpanel" aria-labelledby="nav-australia-tab" tabindex="0">
            <div class="destination">
                <div class="container py-5">
                    <h1 class="judul-halaman text-center" data-aos="zoom-in" data-aos-duration="1000"><span>Australia</span></h1>
                    <?php
                    if(isset($_GET['search'])){
                        $search = $_GET['search'];
                        echo "<h3>Hasil pencarian : ".$search."</h3>";
                        $query = mysqli_query($koneksi, "SELECT * FROM destination WHERE (destinasi LIKE '%".$search."%' OR negara LIKE '%".$search."%' OR benua LIKE '%".$search."%') AND benua='Australia'");		
                    }else{
                        $query = mysqli_query($koneksi, "SELECT*FROM destination WHERE benua='Australia'");	
                    }
                    ?>
                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4 py-5">
                    <?php
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="card">
                                <img src="../gambar/destinasi/<?php echo $data['foto']; ?>" class="card-img" alt="<?php echo $data['destinasi']; ?>">
                                <p class="rating"><i class="fa-solid fa-star" style="color: rgb(255, 217, 0)"></i> <span>| 4.8</span></p>
                                <p class="favorite"><i class="fa-regular fa-heart"></i></p>
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo $data['destinasi']; ?></h3>
                                    <p class="location"><i class="fa-solid fa-location-dot" style="color: #000000;"></i> <?php echo $data['negara']; ?></p>
                                </div>
                                <a href="detail.php?id=<?php echo $data['id_destinasi'];?>" class="btn more-btn">More</a>
                            </div>
                        </div>
                        <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-europe" role="tabpanel" aria-labelledby="nav-europe-tab" tabindex="0">
            <div class="destination">
                <div class="container py-5">
                    <h1 class="judul-halaman text-center" data-aos="zoom-in" data-aos-duration="1000"><span>Europe</span></h1>
                    <?php
                    if(isset($_GET['search'])){
                        $search = $_GET['search'];
                        echo "<h3>Hasil pencarian : ".$search."</h3>";
                        $query = mysqli_query($koneksi, "SELECT * FROM destination WHERE (destinasi LIKE '%".$search."%' OR negara LIKE '%".$search."%' OR benua LIKE '%".$search."%') AND benua='Europe'");		
                    }else{
                        $query = mysqli_query($koneksi, "SELECT*FROM destination WHERE benua='Europe'");	
                    }
                    ?>
                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4 py-5">
                    <?php
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="card">
                                <img src="../gambar/destinasi/<?php echo $data['foto']; ?>" class="card-img" alt="<?php echo $data['destinasi']; ?>">
                                <p class="rating"><i class="fa-solid fa-star" style="color: rgb(255, 217, 0)"></i> <span>| 4.8</span></p>
                                <p class="favorite"><i class="fa-regular fa-heart"></i></p>
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo $data['destinasi']; ?></h3>
                                    <p class="location"><i class="fa-solid fa-location-dot" style="color: #000000;"></i> <?php echo $data['negara']; ?></p>
                                </div>
                                <a href="detail.php?id=<?php echo $data['id_destinasi'];?>" class="btn more-btn">More</a>
                            </div>
                        </div>
                        <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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