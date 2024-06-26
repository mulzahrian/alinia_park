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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Paket</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="<?php echo base_url('dashboard/das_hotel'); ?>"  class="dropdown-item">Hotel</a>
                                <a href="<?php echo base_url('dashboardtiket'); ?>" class="dropdown-item">Tiket</a>
                                <a href="property-agent.html" class="dropdown-item">Paket</a>
                            </div>
                        </div>
                        <a href="about.html" class="nav-item nav-link active">Fasilitas</a>
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
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">Regulasi</span> Pemesanan</h1>
                    <p class="animated fadeIn mb-4 pb-2">Berikut adalah Regulasi Pemesanan di Alinia Park And Resort.</p>
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

        <!-- regulasi -->

        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
            <div class="card_reg">
                <h2>ALINIA PARK & RESORT</h2>
                <h3>Waktu Check-in/Check-out</h3>
                <p><i class="fas fa-sign-in-alt"></i> <strong>Check-in:</strong> Dari 13:00</p>
                <p><i class="fas fa-sign-out-alt"></i> <strong>Check-out:</strong> Sebelum 12:00</p>
                <p><em>Hotel policy is not yet available.</em></p>

                <h3>Informasi Umum</h3>
                <p><i class="fas fa-concierge-bell"></i> <strong>Fasilitas Populer:</strong> AC, Restoran, Kolam Renang, Resepsionis 24 Jam, Parkir, WiFi</p>
                <p><i class="fas fa-clock"></i> <strong>Waktu Check-In/Check-Out:</strong> Dari 13:00 - Sebelum 12:00</p>
                <p><i class="fas fa-utensils"></i> <strong>Ketersediaan Sarapan:</strong> Ya, beberapa ruangan menyediakan sarapan.</p>

                <h3>Kebijakan Pembatalan dan Pembayaran</h3>
                <p><i class="fas fa-credit-card"></i> Kebijakan pembatalan dan pembayaran di muka bervariasi tergantung tipe akomodasi. Harap masukkan tanggal inap Anda dan periksa ketentuan dari kamar yang Anda butuhkan.</p>

                <h3>Anak-anak dan Tempat Tidur</h3>
                <p><i class="fas fa-child"></i> <strong>Kebijakan Anak:</strong> Anak-anak bisa menginap. Untuk melihat informasi harga dan okupansi yang tepat, mohon tambahkan jumlah dan usia anak dalam grup Anda di pencarian.</p>
                <p><i class="fas fa-bed"></i> <strong>Kebijakan Ranjang Bayi dan Tempat Tidur Ekstra:</strong> Tidak tersedia ranjang bayi dan tempat tidur ekstra di akomodasi ini.</p>

                <h3>Tanpa Batasan Usia</h3>
                <p><i class="fas fa-calendar-check"></i> Tidak ada persyaratan usia untuk check-in.</p>

                <h3>Hewan Peliharaan</h3>
                <p><i class="fas fa-paw"></i> Hewan peliharaan tidak diperbolehkan.</p>
        </div>
<p> </p>
        <div class="card_reg">
    <h2>Prosedur Pemesanan Tiket Digital</h2>

    <h3>Prosedur Pemesanan</h3>
    <p><i class="fas fa-ticket-alt"></i> Pemesanan tiket digital hanya dapat dilakukan melalui situs resmi Alinea dan Park atau aplikasi mobile resmi.</p>
    <p><i class="fas fa-user"></i> Pengunjung harus membuat akun pengguna dengan informasi yang valid dan akurat untuk melakukan pemesanan.</p>

    <h3>Metode Pembayaran</h3>
    <p><i class="fas fa-money-check-alt"></i> Pembayaran tiket digital dapat dilakukan menggunakan transfer bank.</p>

    <h3>Konfirmasi Pemesanan</h3>
    <p><i class="fas fa-envelope"></i> Setelah pembayaran berhasil, tiket digital akan dikirimkan ke email yang terdaftar atau dapat diakses melalui akun pengguna di aplikasi.</p>
    <p><i class="fas fa-search"></i> Pengunjung harus memeriksa kembali detail tiket yang diterima untuk memastikan semua informasi benar.</p>

    <h3>Penggunaan Tiket Digital</h3>
    <p><i class="fas fa-mobile-alt"></i> Tiket digital harus ditunjukkan pada saat masuk melalui perangkat mobile atau cetak tiket fisik dari tiket digital yang diterima.</p>
    <p><i class="fas fa-calendar-day"></i> Tiket digital hanya berlaku untuk satu kali masuk pada tanggal yang tertera dan tidak dapat digunakan kembali.</p>

    <h3>Ketentuan Umum</h3>
    <p><i class="fas fa-exchange-alt"></i> Tiket digital tidak dapat dialihkan kepada orang lain tanpa persetujuan resmi dari pihak manajemen Alinea dan Park.</p>
    <p><i class="fas fa-exclamation-circle"></i> Pihak manajemen berhak mengubah regulasi ini sewaktu-waktu tanpa pemberitahuan terlebih dahulu.</p>
  </div>
            </div>
        </div>


        <!-- end regulasi -->



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
    .card_reg {
      border: 1px solid #ccc;
      padding: 20px;
      border-radius: 10px;
      max-width: 500px;
      margin: auto;
      background-color: #fff;
    }
    .card_reg h2 {
      text-align: center;
    }
    .card_reg h3 {
      border-bottom: 1px solid #eee;
      padding-bottom: 10px;
    }
  </style>


</body>

</html>