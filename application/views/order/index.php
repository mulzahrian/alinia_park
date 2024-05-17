<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><b style="color: green;"> Hotel</b></a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><b style="color: green;"> Paket</b></a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><b style="color: green;"> Tiket</b></a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
<!-- hotel -->

<!-- Begin Page Content -->
<div class="container-fluid" id="main-order">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    

    <?php foreach ($hotel_types as $hotel_type): ?>
        <div class="card mb-3 col-lg-9 mx-auto">
            <div class="card-header">
                <h4><b><?= $hotel_type['hotel_type']; ?></b></h4>
            </div>

            <?php if (isset($hotels[$hotel_type['hotel_type']])): ?>
                <?php foreach ($hotels[$hotel_type['hotel_type']] as $hotel): ?>
                    <div class="card mb-3 col-lg-15">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                            <img class="card-img-top" src="<?= base_url('assets/img/profile/') . $hotel['image_hotel']; ?>" alt="Card image cap" style="border: 1px solid #ccc; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <div class="card-body" style="border: 1px solid #ccc; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <a><i class="fas fa-home"></i><?= $hotel['ukuran']; ?></a>
                            <?php if ($hotel['ac'] == 'AC'): ?>
                                <p><a class="btn btn-success btn-sm disabled" role="button" aria-disabled="true" style="color: white;"><i class="fas fa-air-freshener"></i><?= $hotel['ac']; ?></a></p>
                            <?php else: ?>
                                <p><a class="btn btn-danger btn-sm disabled" role="button" aria-disabled="true" style="color: white;"><i class="fas fa-air-freshener"></i><?= $hotel['ac']; ?></a></p>
                            <?php endif; ?>
                            <div style="text-align: center;">
                                <a href="#" class="btn btn-success">Lihat Detail Kamar</a>
                            </div>

                            </div>
                            </div>
                            <div class="col-md-8">
                            <div class="card-body row">
                                <h5 class="card-header col-md-12"><?= $hotel['hotel_name']; ?></h5>
                                
                                <div class="col-md-4">
                                    <p class="card-text">
                                        <a><i class="fas fa-bed"></i> <?=$hotel['jumlah_bed'] . $hotel['type_bed']; ?></a>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="card-text">
                                        <a><i class="fas fa-people-carry"></i> <?=$hotel['people'] . " Orang/Kamar"; ?></a>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="card-text" style="color: red;">
                                        <a><?= "Sisa " . $hotel['room_avail'] . " Kamar!"; ?></a>
                                    </p>
                                </div> 
                                <div class="col-md-4">
                                    <p class="card-text" style="color: green;">
                                        <a><i class="fas fa-utensils"></i> Tersedia Sarapan Gratis</a>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="card-text">
                                        <a><i class="fas fa-exclamation-circle"></i><?= $hotel['service']; ?></a>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="card-text" style="color: orange;">
                                        <a><i class="fas fa-money-bill"></i><b><?= 
                                        "Rp " . number_format($hotel['price'], 0, ",", "."); 
                                        ?></b></a>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="card-text" style="color: green;">
                                        <a><i class="fas fa-wifi"></i> Wifi Gratis</a>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="card-text" style="color: blue;">
                                        <a><i class="fas fa-question"></i> Baca Kebijakan Pembatalan</a>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div style="text-align: right;">
                                <!-- <a data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-sm" type="button" onclick="orderPackage(<?php echo $package_data['master']['Id_package_master']; ?>)"><b style="color: white;">Pesan Sekarang</b></a> -->
                                    <a class="btn btn-success" type="button" onclick="orderHotel(<?php echo $hotel['Id_hotel']; ?>)"><b style="color: white;">Pesan Sekarang</b></a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="card mb-3 col-lg-8 mx-auto">
                    <div class="card-body">
                        <p>Tidak ada data hotel untuk tipe <?= $hotel_type['hotel_type']; ?></p>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    <?php endforeach; ?>
    <div class="card mb-3 col-lg-9 mx-auto">
            <div class="card-header">
                <h4><b>blank</b></h4>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- end hotel -->
  </div>


  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">


  <!-- content -->
  <?php foreach ($package_tbls as $package_tbl): ?>
  <div class="card col-lg-9 mx-auto" >
    <div class="card-header">
    <h4><b><?= $package_tbl['package_name']; ?></b></h4>
    </div>
    <div class="row justify-content-center mb-3">
      <div class="col-md-12 col-xl-12">
        <div class="card shadow-0 border rounded-3">
          <div class="card-body">
          <?php if(isset($packages[$package_tbl['package_name']])): ?>
            <?php foreach ($packages[$package_tbl['package_name']] as $package_master_id => $package_data): ?>
                <div class="row">
                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                    <img src="<?= base_url('assets/img/profile/') . $package_data['master']['package_image']; ?>"
                        class="w-100" style="border: 1px solid #ccc; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"/>
                    <a href="#!">
                        <div class="hover-overlay">
                        <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                        </div>
                    </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <h5><?= $package_data['master']['master_package_name']; ?></h5>
                    <div class="d-flex flex-row">
                    <div class="text-danger mb-1 me-2">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <!-- <span>310</span> -->
                    </div>
                    <?php if(isset($package_data['details']) && is_array($package_data['details'])): ?>
                    <ul>
                        <?php foreach ($package_data['details'] as $detail): ?>
                            <li><?= $detail['name_detail_pack']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No details available</p>
                <?php endif; ?>
                    <div class="mt-1 mb-0 text-muted small">
                    <!-- <span>100% cotton</span> -->
                    <span class="text-primary"> • </span>
                    <span>Tidak Bisa Refund</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                    <div class="d-flex flex-row align-items-center mb-1">
                    <h4 class="mb-1 me-1"><b><?= 
                                "Rp " . number_format($package_data['master']['package_price'], 0, ",", "."); 
                            ?></b></h4>
                    <!-- <span class="text-danger"><s>$20.99</s></span> -->
                    </div>
                    <h6 class="text-success">Baca kebijakan Pembatalan</h6>
                    <div class="d-flex flex-column mt-4">
                    <a data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-sm" type="button" onclick="orderPackage(<?php echo $package_data['master']['Id_package_master']; ?>)"><b style="color: white;">Pesan Sekarang</b></a>
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-success btn-sm mt-2" type="button">
                        Tambah ke Favorite
                    </button>
                    <h6 class="text-success"></h6>
                    </div>
                </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="card mb-3 col-lg-8 mx-auto">
                    <div class="card-body">
                    <p>No packages available</p>
                    </div>
                </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

  </div>
  <?php endforeach; ?>
  

  <!-- content -->
    <div class="card col-lg-9 mx-auto" >
        <div class="card-header">
            <h4><b>blank</b></h4>
        </div>
    </div>
</div>


  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <!-- conten -->
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
</div>

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