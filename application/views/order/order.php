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

                    <!-- content test -->
            <?php if (!empty($orders)) : ?>
                  <main class="page payment-page">
                    <section class="payment-form dark">
                      <div class="container">
                        <div class="block-heading">
                          <h2>Order</h2>
                          <p>Berikut terlampir pesanan pesana anda</p>
                        </div>
                        <form>
                          <div class="products">
                          <a href="" id="btn__add_all" class="btn btn-success mb-3 btn-lg rounded-circle" data-toggle="modal" data-target="#checkOrderModal"> + </a>
                            <h3 class="title">Checkout</h3>
                            <!-- <a href="" id="btn_delete_all" class="btn btn-danger mb-3 btn-lg rounded-circle"> - </a>
                            <a href="" id="btn_tekan" class="btn btn-success mb-3 btn-lg rounded-circle" data-toggle="modal" data-target="#modalPackageOrder"> + </a> -->
                      <?php
                      $total_harga = 0; 
                      $id_order = "";
                      $tipe = "";
                      $order_type = "";
                      foreach ($orders as $order) : ?>
                        <?php if ($order['type'] == "Paket") : 
                          $total_harga += $order['total_price'];
                          $id_order = $order['id_order'];
                          $tipe = $order['type'];
                          $order_type = $order['order_type']?>
                            <div class="item"> 
                              <span class="price">
                                <?= 
                                "Rp " . number_format($order['total_price'], 0, ",", "."); 
                                ?></span>
                              <p class="item-name"><?= $order['master_package_name']; ?></p>
                              <p class="item-description">Pembayaran di dalam proses</p>
                            </div>
                      <?php elseif($order['type'] == "Hotel") : 
                        $total_harga += $order['total_price'];
                        $id_order = $order['id_order'];
                        $tipe = $order['type'];
                        $order_type = $order['order_type']?>
                         <div class="item"> 
                              <span class="price">
                                <?= 
                                "Rp " . number_format($order['total_price'], 0, ",", "."); 
                                ?></span>
                              <p class="item-name"><?= $order['hotel_name']; ?></p>
                              <p class="item-description">Pembayaran di dalam proses</p>
                            </div>
                          <?php endif; ?>
                        <?php endforeach; ?>
                            <div class="total">Total<span class="price"><?= "Rp " . number_format($total_harga, 0, ",", "."); ?></span></div>
                            <input type="hidden" class="form-control" id="id_order_save" name="id_order_save" value="<?= $id_order; ?>">
                            <input type="hidden" class="form-control" id="tipe_pesanan" name="tipe_pesanan" value="<?= $tipe; ?>">
                            <input type="hidden" class="form-control" id="pub_order_type" name="pub_order_type" value="<?= $order_type; ?>">
                          </div>
                          <div class="card-details">
                            <h3 class="title">Payment Account</h3>
                            <div class="row">
                              <div class="form-group col-sm-12">
                                <label for="card-holder">Bank Account</label>
                                <select id="bank_account" class="form-control res-select">
                                          <option value="0976213123">Bank Bca</option>
                                          <option value="8219873193">Bank Mandiri</option>
                                          <option value="7765723198">Bank Bri</option>
                                      </select>
                              </div>
                              <div class="form-group col-sm-12">
                                <a type="button" id="proses_order" class="btn btn-primary btn-block"><b style="color: white;">Proses</b></a>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </section>
                  </main>
            <?php else : ?>
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= base_url('assets/img/order_undraw.svg') ?>" alt="">
                            <h2><b>Tidak Ada Pesanan</b></h2>
                      </div>
            <?php endif; ?>

                    <!-- end content test -->

                    <!-- <a href="" id="btn_tekan" class="btn btn-success mb-3 btn-lg rounded-circle" data-toggle="modal" data-target="#modalPackageOrder"> + </a>
                    <a href="" id="btn_tekan" class="btn btn-danger mb-3 btn-lg rounded-circle" data-toggle="modal" data-target="#detailOrderModal"> + </a> -->
                  
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

<style>
  .payment-form{
	padding-bottom: 50px;
	font-family: 'Montserrat', sans-serif;
}

.payment-form.dark{
	background-color: #f6f6f6;
}

.payment-form .content{
	box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
	background-color: white;
}

.payment-form .block-heading{
    padding-top: 50px;
    margin-bottom: 40px;
    text-align: center;
}

.payment-form .block-heading p{
	text-align: center;
	max-width: 420px;
	margin: auto;
	opacity:0.7;
}

.payment-form.dark .block-heading p{
	opacity:0.8;
}

.payment-form .block-heading h1,
.payment-form .block-heading h2,
.payment-form .block-heading h3 {
	margin-bottom:1.2rem;
	color: #3b99e0;
}

.payment-form form{
	border-top: 2px solid #5ea4f3;
	box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
	background-color: #ffffff;
	padding: 0;
	max-width: 600px;
	margin: auto;
}

.payment-form .title{
	font-size: 1em;
	border-bottom: 1px solid rgba(0,0,0,0.1);
	margin-bottom: 0.8em;
	font-weight: 600;
	padding-bottom: 8px;
}

.payment-form .products{
	background-color: #f7fbff;
    padding: 25px;
}

.payment-form .products .item{
	margin-bottom:1em;
}

.payment-form .products .item-name{
	font-weight:600;
	font-size: 0.9em;
}

.payment-form .products .item-description{
	font-size:0.8em;
	opacity:0.6;
}

.payment-form .products .item p{
	margin-bottom:0.2em;
}

.payment-form .products .price{
	float: right;
	font-weight: 600;
	font-size: 0.9em;
}

.payment-form .products .total{
	border-top: 1px solid rgba(0, 0, 0, 0.1);
	margin-top: 10px;
	padding-top: 19px;
	font-weight: 600;
	line-height: 1;
}

.payment-form .card-details{
	padding: 25px 25px 15px;
}

.payment-form .card-details label{
	font-size: 12px;
	font-weight: 600;
	margin-bottom: 15px;
	color: #79818a;
	text-transform: uppercase;
}

.payment-form .card-details button{
	margin-top: 0.6em;
	padding:12px 0;
	font-weight: 600;
}

.payment-form .date-separator{
 	margin-left: 10px;
    margin-right: 10px;
    margin-top: 5px;
}

@media (min-width: 576px) {
	.payment-form .title {
		font-size: 1.2em; 
	}

	.payment-form .products {
		padding: 40px; 
  	}

	.payment-form .products .item-name {
		font-size: 1em; 
	}

	.payment-form .products .price {
    	font-size: 1em; 
	}

  	.payment-form .card-details {
    	padding: 40px 40px 30px; 
    }

  	.payment-form .card-details button {
    	margin-top: 2em; 
    } 
}
</style>

