<!-- Begin Page Content -->
<div class="container-fluid" id="main-order-data">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->



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

                    <a href="" id="btn_tekan" class="btn btn-success mb-3 btn-lg rounded-circle" data-toggle="modal" data-target="#modalPackageOrder"> + </a>
                  <!-- CONTENT -->
                  <?php if (!empty($orders)) : ?>
                      <?php foreach ($orders as $order) : ?>
                          <?php if ($order['order_type'] == "2") : ?>
                            <a href="" id="btn_tekan" class="btn btn-success mb-3 btn-lg rounded-circle" data-toggle="modal" data-target="#modalPackageOrder"> + </a>
                              <div class="card">
                                  <h5 class="card-header">Order Type</h5>
                                  <div class="card-body">
                                      <h5 class="card-title"><?= $order['type']; ?></h5>
                                      <p class="card-text"><?= $order['type']; ?></p>
                                      <a href="#" class="btn btn-primary">Go somewhere</a>
                                  </div>
                              </div>
                          <?php endif; ?>
                      <?php endforeach; ?>
                      <?php else : ?>
                          <div class="text-center">
                              <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= base_url('assets/img/order_undraw.svg') ?>" alt="">
                              <h2><b>Tidak Ada Pesanan</b></h2>
                          </div>
                  <?php endif; ?>


                  <!-- CONTENT -->
                </div>
              </div>
            <!-- end content -->
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

