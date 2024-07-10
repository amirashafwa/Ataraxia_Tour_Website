<?php
session_start();
include 'authentication/koneksi.php';
if (!isset($_SESSION['user'])) {
    header('location:authentication/login-regis.php');
}

$id = $_SESSION['user']['id_costumer'];
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ataraxia</title>
<link rel="stylesheet" href="layout/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="layout/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="layout/css/aos.css">

<!-- Logo Title Bar -->
<link rel="icon" href="gambar/logo-title.png" type="image/icon">
</head>
<body>
<!-- Bootstrap JS-->
<script src="layout/js/bootstrap.min.js"></script>
<script src="layout/js/popper.min.js"></script>


<!-- Navbar -->
<nav class="navbar fixed-top">
<div class="container">
    <a class="navbar-brand" href="#">
        <img src="gambar/logo.png" alt="Bootstrap" height="50">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <img class="offcanvas-title" id="offcanvasNavbarLabel" src="gambar/logo.png" alt="Bootstrap" height="50">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link" href="user-page/profile.php?id=<?php echo $id; ?>"><i class="fa-solid fa-user"></i> My Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="user-page/index.php"><i class="fa-solid fa-house-user"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user-page/destination.php"><i class="fa-solid fa-location-dot"></i> Destination</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user-page/testimoni.php"><i class="fa-solid fa-face-smile"></i> testimoni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user-page/contact.php"><i class="fa-solid fa-id-card"></i> Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user-page/service.php"><i class="fa-solid fa-user-gear"></i> Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user-page/about.php"><i class="fa-solid fa-building"></i> About</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="https://ataraxianews.000webhostapp.com/"><i class="fa-solid fa-newspaper"></i> News</a>
                    </li>
                <div class="navbar-nav nav-item nav-link nav-btn">
                    <a class="btn" href="authentication/logout.php" role="button"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a>
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


<!-- Home Section Open -->
<section class="banner" id="banner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="banner-content" data-aos="fade-up" data-aos-duration="1000">
                    <h1 class="text-banner-bold fw-bold text-dark mt-1">
                        Discover vacation of your <span class="text-banner">dream</span>
                    </h1>
                    <h4 class="text-home-reguler fw-normal text-secondary">
                        Let's make your dream come true with Ataraxia.
                    </h4>
                    <div class="banner-btn mt-5">
                        <a href="user-page/booking.php" class="btn btn-banner shadow-none">Book now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="home-img" data-aos="fade-up" data-aos-duration="2000">
                    <img src="gambar/banner.png" class="w-100" data-aos="zoom-in-down" data-aos-duration="3000" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Search -->
<section class="search" data-aos="fade-up" data-aos-duration="1000">
<div class="container">
<div class="row justify-content-center">
<div class="col-10 search-panel">
    <h2 class="text-center">Find Your Best Destination</h2>
    <form action="user-page/destination.php" method="get">
    <div class="row">
        <div class="col-lg col-md">
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-location-dot" style="color: #000000;"></i></span>
                <input type="text" class="form-control" placeholder="Where to go?" name="search">
            </div>
        </div>
        <div class="col-lg col-md">
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-calendar" style="color: #000000;"></i></span>
                <input type="date" class="form-control">
            </div>
        </div>
        <div class="col-lg col-md">
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-user-group" style="color: #000000;"></i></span>
                <input type="number" class="form-control" placeholder="Add Guest">
            </div>
        </div>
        <div class="col-lg col-md-12">
            <div class="input-group mb-3 search-btn">
                <button type="submit" class="btn form-control">Find Option</button>
            </div>
        </div>
    </div>
    </form>
</div>
</div>
</div>
</section>

<!-- Popular -->
<section class="destination" >
    <div class="container py-5">
        <div class="popular-title d-flex justify-content-between">
            <h1>Popular Destination</h1>
                <a href="destination.php" class="btn icon-link-hover">Explore <i class="bi fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4 py-5">
        <?php
            $query = mysqli_query($koneksi, "SELECT*FROM destination LIMIT 4");
            while ($data = mysqli_fetch_array($query)) {
        ?>
            <div class="col">
                <div class="card" data-aos="fade-up">
                    <img src="gambar/destinasi/<?php echo $data['foto']; ?>" class="card-img" alt="<?php echo $data['destinasi']; ?>">
                    <p class="rating"><i class="fa-solid fa-star" style="color: rgb(255, 217, 0)"></i> <span>| 4.8</span></p>
                    <p class="favorite"><i class="fa-regular fa-heart"></i></p>
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $data['destinasi']; ?></h3>
                        <p class="location"><i class="fa-solid fa-location-dot" style="color: #000000;"></i> <?php echo $data['negara']; ?></p>
                    </div>
                    <a href="user-page/detail.php?id=<?php echo $data['id_destinasi'];?>" class="btn more-btn">More</a>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>


<!-- Statistic -->
<section class="statistic">
<div class="container py-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card" data-aos="zoom-in">
                <div class="card-body text-center">
                    <i class="fa-solid fa-map-location-dot"></i>
                    <h5 class="card-title" data-toggle="counterUp">
                        <?php
                            $destinasi    ="SELECT * FROM destination";
                            $query    =mysqli_query($koneksi, $destinasi);
                            $count    =mysqli_num_rows($query);
                            echo "$count";
                        ?>
                    </h5>
                    <p class="card-text">Destination</p>
                </div>
            </div>
        </div>
        <div class="col" data-aos="zoom-in">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fa-solid fa-house-chimney"></i>
                    <h5 class="card-title" data-toggle="counterUp">
                        <?php
                            $villa    ="SELECT * FROM villa";
                            $query    =mysqli_query($koneksi, $villa);
                            $count    =mysqli_num_rows($query);
                            echo "$count";
                        ?>
                    </h5>
                    <p class="card-text">Villa</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" data-aos="zoom-in">
                <div class="card-body text-center">
                    <i class="fa-solid fa-users"></i>
                    <h5 class="card-title" data-toggle="counterUp">
                    <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM booking");
                        while ($data = mysqli_fetch_array($query)){
                            $eksplorers[] = $data['tamu'];
                        }
                        $jumlah_eksplorers = array_sum($eksplorers);
                        echo "$jumlah_eksplorers";
                    ?>
                    </h5>
                    <p class="card-text">Explorers</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- jQuery Library -->
<script src="layout/js/jquery.min.js"></script>

<!-- Counts JS -->
<script src="layout/js/jquery.waypoints.js"></script>
<script src="layout/js/jquery.counterup.min.js"></script>

<script type="text/javascript">
    // jQuery counterUp
    $('[data-toggle="counterUp"]').counterUp({
        delay: 15,
        time: 1000
    });
</script>

<!--Section: FAQ-->
<section class="faq" data-aos="fade-up">
    <div class="container my-5">
    <h3 class="text-center fw-bold" style="color: #1C3946">FAQ</h3>
    <p class="text-center mb-5">
        Find the answers for the most frequently asked questions below
    </p>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Mengapa harus memesan di ATARAXIA?
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>ATARAXIA</strong> dapat menghilangkan semua kerumitan dalam merencanakan perjalanan dan menangani hampir semua aspek perjalanan Anda, tanpa biaya tambahan. Pengalaman yang digabungkan dari tim dan umpan balik ribuan <i>travelers</i> kami menjadi sumber daya yang tak ternilai bagi <i>travelers</i> yang merencanakan perjalanan penting.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Bagaimana saya dapat memastikan keamanan penyedia perjalanan ini?
            </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <strong>ATARAXIA</strong> sangat berhati-hati dalam memilih mitra bisnis dan penyedia perjalanan. Proses pengecekan pemasok perjalanan dan dukungan terhadap 'mereka yang baik' selama lebih dari 50 tahun terakhir telah memberikan akses istimewa kepada kami ke penyedia terpercaya teratas di dunia. Sebagai imbalannya, mereka mempercayai kami untuk mewakili dan menjaga reputasi yang telah mereka raih selama bertahun-tahun, serta memberikan standar perawatan yang sama tingginya kepada klien bersama kami.
            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Perjalanan seperti apa yang ditawarkan?
            </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                Apakah Anda mencari pengalaman di mana Anda dapat santai berbaring di tempat tidur gantung dan menikmati jam koktail tanpa banyak gerakan? Atau mungkin Anda lebih tertarik pada petualangan menantang di sisi gunung yang tinggi? Tak perlu khawatir, <strong>ATARAXIA,</strong> memiliki perjalanan yang sesuai untuk setiap preferensi.
            </div>
            </div>
        </div>
        </div>
    </div>
</section>
<!--Section: FAQ-->

<!-- testimoni -->
<section class="review-highlight" data-aos="fade-in">
<div class="container py-5">
    <div class="row row-cols-1 row-cols-md-3 g-4 align-items-center">
        <div class="col">
            <h5 class="card-title">Words From Our Explorers</h5>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eveniet officiis consequuntur fuga fugit pariatur deserunt aperiam a.</p>
            <a href="testimoni.php" class="btn btn-primary">View All testimoni</a>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="rating">
                        <i class="fa-solid fa-star" style="color: rgb(255, 157, 0);"></i>
                        <i class="fa-solid fa-star" style="color: rgb(255, 157, 0);"></i>
                        <i class="fa-solid fa-star" style="color: rgb(255, 157, 0);"></i>
                        <i class="fa-solid fa-star" style="color: rgb(255, 157, 0);"></i>
                        <i class="fa-solid fa-star" style="color: rgb(255, 157, 0);"></i>
                    </p>
                    <p class="words">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam, incidunt reiciendis voluptatem corporis quis doloremque est laboriosam sapiente iusto ullam nobis eaque odit ut provident.
                    </p>
                    <p class="name">Jake</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="rating">
                        <i class="fa-solid fa-star" style="color: rgb(255, 157, 0);"></i>
                        <i class="fa-solid fa-star" style="color: rgb(255, 157, 0);"></i>
                        <i class="fa-solid fa-star" style="color: rgb(255, 157, 0);"></i>
                        <i class="fa-solid fa-star" style="color: rgb(255, 157, 0);"></i>
                        <i class="fa-solid fa-star" style="color: rgb(255, 157, 0);"></i>
                    </p>
                    <p class="words">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam, incidunt reiciendis voluptatem corporis quis doloremque est laboriosam sapiente iusto ullam nobis eaque odit ut provident.
                    </p>
                    <p class="name">Jake</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<!-- Reason -->
<section class="reason" data-aos="fade-up">
<div class="container py-5">
    <div class="reason-highlight">
        <h1 class="text-center">Why Chose Us?</h1>
        <div class="reason-content d-flex justify-content-evenly">
            <p><i class="fa-solid fa-star"></i> Best Services</p>
            <p class="relation"><i class="fa-solid fa-angle-right"></i></p>
            <p><i class="fa-solid fa-route"></i> Travel Anywhere</p>
            <p class="relation"><i class="fa-solid fa-angle-right"></i></p>
            <p><i class="fa-solid fa-list-check"></i> Complete Facilities</p>          
        </div>
    </div>
</div>
</section>

<!-- Contact -->
<section class="contact-highlight" data-aos="fade-up">
<div class="container py-5">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col">
                    <h2>Do you have any questions?</h2>
                    <h3>Feel free to contact us</h3>
                </div>
                <div class="col text-center">
                    <a href="user-page/contact.php" class="btn px-5">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<section class="footer" data-aos="fade-up" data-aos-duration="500">
    <div class="footer-top">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            <img src="gambar/logo.png" alt="" style="height: 50px" />
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
                <li><a href="user-page/destination.php">Africa</a></li>
                <li><a href="user-page/destination.php">America</a></li>
                <li><a href="user-page/destination.php">Asia</a></li>
                <li><a href="user-page/destination.php">Australia</a></li>
                <li><a href="user-page/destination.php">Europe</a></li>
            </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="footer-content">
            <h5>Company</h5>
            <ul>
                <li><a href="user-page/about.php">About Us</a></li>
                <li><a href="user-page/team.php">Our Team</a></li>
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

<script src="layout/js/aos.js"></script>
<script>
    AOS.init();
</script>

</body>
</html>