<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><b style="color: green;"> Hotel</b></a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><b style="color: green;"> Paket</b></a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
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
                                    <a href="#" class="btn btn-success">Pesan Sekarang</a>
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
    <!-- Paket -->
    <?php foreach ($package_tbls as $package_tbl): ?>
    <div class="card col-lg-9 mx-auto" >
        <div class="card-header">
        <h4><b><?= $package_tbl['package_name']; ?></b></h4>
        </div>
        <div class="card-body">
        <?php if(isset($packages[$package_tbl['package_name']])): ?>
            <?php foreach ($packages[$package_tbl['package_name']] as $package_master_id => $package_data): ?>
                <h5 class="card-title"><?= $package_data['master']['master_package_name']; ?></h5>
                <!-- <p class="card-text">Detail:</p> -->
                <?php if(isset($package_data['details']) && is_array($package_data['details'])): ?>
                    <ul>
                        <?php foreach ($package_data['details'] as $detail): ?>
                            <li><?= $detail['name_detail_pack']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No details available</p>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No packages available</p>
        <?php endif; ?>
        <div style="text-align: right;">
            <a href="#" class="btn btn-success">Pesan Sekarang</a>
        </div>
        </div>
        
    </div>
    <?php endforeach; ?>
    <!-- end paket -->
</div>


  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">ccc</div>
</div>
