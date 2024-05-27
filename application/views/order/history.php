    <!-- Begin Page Content -->
    <div class="container-fluid" id="main-history-data">
        <div class="row">
            <div class="col-lg-10 mx-auto">
            
            <!-- content -->
                    <!-- Illustrations -->
                <div class="card shadow mb-12">
                    <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-success"><?= $title; ?></h4>
                </div>
                    <div class="card-body">
                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>

                        <?php if (!empty($payments)) : ?>
                            
                            <?php foreach ($payments as $payments) : ?>
                                <div class="card">
                                    <h5 class="card-header"><?php echo $payments->type; ?></h5>
                                        <div class="card-body">
                                            <div class="d-flex">
                                            <?php if ($payments->type == 'Paket') : ?>
                                                <div>
                                                    <img src="<?= base_url('assets/img/undraw_amusement.svg') ?>" alt="Image" class="mr-3" style="width: 150px;">
                                                </div>
                                            <?php else : ?>
                                                <img src="<?= base_url('assets/img/undraw_hotel.svg') ?>" alt="Image" class="mr-3" style="width: 150px;">
                                            <?php endif; ?>
                                                <div>
                                                    <p><?php echo $payments->formatted_create_date; ?></p>
                                                    <h5 class="card-title"><?php echo $payments->status_order; ?></h5>
                                                    <p class="card-text"><?php echo "Rp " . number_format($payments->total_order, 0, ",", ".");  ?></p>
                                                    <p>Order id : <?php echo $payments->orderId; ?></p>
                                                    <?php if ($payments->status == 0) : ?>
                                                    <div>
                                                        <p></p>
                                                        <a type="button" id="get_detail_hist" class="btn btn-success" onclick="getDetailHistory(<?php echo $payments->id_order; ?>)"><b style="color: white;">Detail</b></a>
                                                    </div>
                                                    <?php else : ?>
                                                        <p><i class="fas fa-check"></i> Pesanan Selesai</p>
                                                        <button type="button" class="btn btn-success" disabled><b style="color: white;">Detail</b></button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="card-footer text-muted">
                                            </div>
                                </div>
                                <p class="card-text"></p>
                            <?php endforeach; ?>
                            <div class="card">
                                        <h5 class="card-header"></h5>
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <p class="card-text"></p>
                                        <a href="#" class="btn btn-primary"></a>
                                    </div>
                                </div>
                        <?php else : ?>
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= base_url('assets/img/order_undraw.svg') ?>" alt="">
                                    <h2><b>Belum ada History</b></h2>
                            </div>
                        <?php endif; ?>

                    </div>
                    <!-- end content -->
            </div>
        </div>
    </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->


