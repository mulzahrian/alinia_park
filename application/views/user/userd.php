    <!-- Begin Page Content -->
    <div class="container-fluid" id="main-user-data">
        <div class="row">
            <div class="col-lg-10 mx-auto">
            
            <!-- content -->
                    <!-- Illustrations -->
                <div class="card shadow mb-12">
                    <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-success"><?= $title; ?></h4>
                </div>
                    <!-- <div class="card-body">
                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?> -->

                <!-- content -->
                <div class="text-center">
				<!-- <h2><b>Pesanan Anda Telah Selesai Check History Untuk ticket</b></h2> -->
                <p> </p>
                    <!-- <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;" src="<?= base_url('assets/img/undraw_done.svg') ?>" alt=""> -->
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" style="width: 150px; height:140px; z-index: 1">

					<h3 class="card-title"><b><?= $user['name']; ?></b></h3>
                    <p><?= $user['email']; ?></p>
                    <a type="button" id="finalOrderProses" class="btn btn-success" ><b style="color: white;">edit profile</b></a>
				<h5 class="card-title"></h5>
            </div>

        
                <!-- end content -->

                    
            </div>
        </div>
    </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<style>

</style>


