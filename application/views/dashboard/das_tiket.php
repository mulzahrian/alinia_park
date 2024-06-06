<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Alinia Park</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="assets/img/alinia-logo.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">Alinia Park & Resort</h1>
                </a>
                
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="<?php echo base_url('dashboard'); ?>" class="nav-item nav-link">Reservasi</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link active dropdown-toggle" data-bs-toggle="dropdown">Paket</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="<?php echo base_url('dashboard/das_hotel'); ?>"  class="dropdown-item">Hotel</a>
                                <a href="property-type.html" class="dropdown-item active">Tiket</a>
                                <a href="property-agent.html" class="dropdown-item">Paket</a>
                            </div>
                        </div>
                        <a href="about.html" class="nav-item nav-link">Fasilitas</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Ketentuan</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="testimonial.html" class="dropdown-item">Regulasi</a>
                                <a href="404.html" class="dropdown-item">Pembayaran</a>
                                <a href="404.html" class="dropdown-item">Kontak</a>
                            </div>
                        </div>
                        <!-- <a href="contact.html" class="nav-item nav-link">null</a> -->
                    </div>
                    <a href="" class="btn btn-primary px-3 d-none d-lg-flex">Login</a>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->


        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">List</span> Tiket</h1>
                    <p class="animated fadeIn mb-4 pb-2">Berikut adalah list tiket tiket yang tersedia di Alinia Park And Resort.</p>
                    <a href="<?= base_url('auth'); ?>" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Reservasi</a>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="assets/img/slide-1.png" alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="assets/img/slide-2.png" alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="assets/img/slide-3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <input type="text" class="form-control border-0 py-3" placeholder="Cari....">
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0 py-3">
                                    <option selected>Paket</option>
                                    <option value="1">Paket 1</option>
                                    <option value="2">Paket 2</option>
                                    <option value="3">Paket 3</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0 py-3">
                                    <option selected>Hotel</option>
                                    <option value="1">Hotel 1</option>
                                    <option value="2">Hotel 2</option>
                                    <option value="3">Hotel 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark border-0 w-100 py-3">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search End -->

        <!-- Property List Start -->
        <div class="container-xxl py-5">
            <!-- HTML -->
    <?php foreach ($tickets as $tickets): ?>
    <div class="card col-lg-9 bg-light mx-auto" >
        <article class="card_ticket">
            <section class="date_ticket">
                <time datetime="23th feb"> 
                    <span><?= $tickets['current_month']; ?></span><span><?= $tickets['master_package_name']; ?></span>
                </time>
            </section>
            <section class="card-cont_ticket">
                <small><?= $tickets['package_name']; ?></small>
                <h3><?= $tickets['master_package_name']; ?></h3>
                <div class="even-date_ticket">
                    <i class="fa fa-"></i>
                    <time>
                        <span> Alinia Park </span>
                        <span> 07:00pm to 19:00 am </span>
                    </time>
                </div>
                <div class="even-info_ticket"  style="color: orange;">
                    <i class="fa fa-money-bill"> </i>
                    <p><?= "Rp " . number_format($tickets['package_price'], 0, ",", "."); ?></p>
                </div>
                <a type="button" onclick="orderPackage(<?= $tickets['Id_package_master']; ?>)"><b style="color: white;">Pesan</b></a>
                <!-- <a href="#">Pesan</a> -->
            </section>
        </article>    
    </div>
    <?php endforeach; ?>
    <!-- content -->
        </div>
        <!-- Property List End -->


        <!-- Call to Action Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded p-3">
                    <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                <img class="img-fluid rounded w-100" src="assets/img/slide-1.png" alt="">
                            </div>
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="mb-4">
                                    <h1 class="mb-3">Mempunyai Pertanyaan ? Hubungi Customer Service Kami</h1>
                                    <p>Customer Service kami aktif 24 jam siap melayani semua keluhan dan pertanyaan dengan response yang cepat.</p>
                                </div>
                                <a href="" class="btn btn-primary py-3 px-4 me-2"><i class="fa fa-phone-alt me-2"></i>Hubungi Kami</a>
                                <!-- <a href="" class="btn btn-dark py-3 px-4"><i class="fa fa-calendar-alt me-2"></i>Get Appoinment</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->
        
        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Get In Touch</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"> Kec. Sitiung, Kabupaten Dharmasraya, Sumatera Barat 27678</i></p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 852657146</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@aliniapark.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Photo Gallery</h5>
                        <div class="row g-2 pt-2">
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="assets/img/slide-1.png" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="assets/img/slide-2.png" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="assets/img/slide-3.png" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="assets/img/slide-1.png" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="assets/img/slide-2.png" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="assets/img/slide-3.png" alt="">
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Alinia Park & Resort</a>, All Right Reserved.
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/wow/wow.min.js"></script>
    <script src="assets/lib/easing/easing.min.js"></script>
    <script src="assets/lib/waypoints/waypoints.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="assets/js/main.js"></script>
    

<style>
/* CSS */
@import url('https://fonts.googleapis.com/css?family=Oswald');

.fl-left {
    float: center
}

.fl-right {
    float: right
}

h1 {
    text-transform: uppercase;
    font-weight: 900;
    border-left: 10px solid #fec500;
    padding-left: 10px;
    margin-bottom: 30px
}

.row {
    overflow: hidden
}

.card_ticket {
    display: block;
    width: 60%;
    background-color: #fff;
    color: #989898;
    margin-bottom: 10px;
    font-family: 'Oswald', sans-serif;
    text-transform: uppercase;
    border-radius: 4px;
    margin-left: auto; /* Geser elemen ke tengah */
    margin-right: auto; /* Geser elemen ke tengah */
    position: relative
}

.card_ticket+.card_ticket {
    margin-left: 2%
}

.date_ticket {
    display: table-cell;
    width: 25%;
    position: relative;
    text-align: center;
    border-right: 2px dashed #dadde6;
    background-color: #1cc88a; /* Warna hijau */
    color: white; /* Warna teks putih */
}

.date_ticket:before,
.date_ticket:after {
    content: "";
    display: block;
    width: 30px;
    height: 30px;
    background-color: #ffffff;
    position: absolute;
    top: -15px;
    right: -15px;
    z-index: 1;
    border-radius: 50%
}

.date_ticket:after {
    top: auto;
    bottom: -15px
}

.date_ticket time {
    display: block;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%)
}

.date_ticket time span {
    display: block
}

.date_ticket time span:first-child {
    color: #2b2b2b;
    font-weight: 600;
    font-size: 250%
}

.date_ticket time span:last-child {
    text-transform: uppercase;
    font-weight: 600;
    margin-top: -10px
}

.card-cont_ticket {
    display: table-cell;
    width: 75%;
    font-size: 85%;
    padding: 10px 10px 30px 50px
}

.card-cont_ticket h3 {
    color: #1cc88a;
    font-size: 130%
}

.row:last-child .card_ticket:last-of-type .card-cont_ticket h3 {
    text-decoration: line-through
}

.card-cont_ticket>div {
    display: table-row
}

.card-cont_ticket .even-date_ticket i,
.card-cont_ticket .even-info_ticket i,
.card-cont_ticket .even-date_ticket time,
.card-cont_ticket .even-info_ticket p {
    display: table-cell
}

.card-cont_ticket .even-date_ticket i,
.card-cont_ticket .even-info_ticket i {
    padding: 5% 5% 0 0
}

.card-cont_ticket .even-info_ticket p {
    padding: 30px 50px 0 0
}

.card-cont_ticket .even-date_ticket time span {
    display: block
}

.card-cont_ticket a {
    display: block;
    text-decoration: none;
    width: 80px;
    height: 30px;
    background-color: #1cc88a;
    color: #fff;
    text-align: center;
    line-height: 30px;
    border-radius: 2px;
    position: absolute;
    right: 10px;
    bottom: 10px
}

.row:last-child .card_ticket:first-child .card-cont_ticket a {
    background-color: #037FDD
}

.row:last-child .card_ticket:last-child .card-cont_ticket a {
    background-color: #F8504C
}

@media screen and (max-width: 860px) {
    .card_ticket {
        display: block;
        float: none;
        width: 100%;
        margin-bottom: 10px
    }
    .card_ticket+.card_ticket {
        margin-left: 0
    }
    .card-cont_ticket .even-date_ticket,
    .card-cont_ticket .even-info_ticket {
        font-size: 75%
    }
}
</style>
</body>

</html>