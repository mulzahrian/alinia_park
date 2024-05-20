    <!-- Begin Page Content -->
    <div class="container-fluid" id="main-payment-data">
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
                <?php if (!empty($payments)) : ?>
					<div class="card">
					<?php foreach ($payments as $payments) : ?>
							<?php if ($payments['status'] == "2") : ?>
								<div class="card-body">
									<h5 class="card-title">Nomor Rekening</h5>
									<p class="card-text" id="bank_name_pay"><h4><b><?= $payments['bank_name']; ?></b></h4></p>
									<p class="card-text" id="account-number"><?= $payments['account_no']; ?></p>
									<button class="btn btn-primary copy-btn" onclick="copyToClipboard()">
									<i class="fas fa-copy"></i> Copy
									</button>
								</div>
								<div class="col-sm-9">
									<h5 class="card-title">Upload Bukti Pembayaran</h5>
                            	<div class="custom-file">
									<input type="file" class="custom-file-input" id="payment_image" name="payment_image">
									<label class="custom-file-label" for="image">Choose file</label>
                            	</div>
                        		</div>
								<div class="col-sm-3">
									<h5 class="card-title"></h5>
									<button class="btn btn-primary copy-btn">Proses Pembayaran</button>
									<h5 class="card-title"></h5>
						</div>
					
							<?php elseif($payments['status'] == "3") :?>
								<div class="text-center">
									<h2><b>Pemesanan anda di reject</b></h2>
                            		<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= base_url('assets/img/undraw_cancel_.svg') ?>" alt="">
									<h5 class="card-title"></h5>
									<h5 class="card-title"></h5>
                        		</div>
					<?php endif; ?>
					<?php endforeach; ?>
                    <!-- <p>ADA DATA</p> -->
					</div>
                <?php else : ?>
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= base_url('assets/img/undraw_payment.svg') ?>" alt="">
                                <h2><b>Tidak Ada Payment Proses</b></h2>
                        </div>
                <?php endif; ?>
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

<script>
    function copyToClipboard() {
      var copyText = document.getElementById("account-number").innerText;
      var textArea = document.createElement("textarea");
      textArea.value = copyText;
      document.body.appendChild(textArea);
      textArea.select();
      document.execCommand("Copy");
      textArea.remove();
		//alert
		const Toast = Swal.mixin({
		toast: true,
		position: "top-end",
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.onmouseenter = Swal.stopTimer;
			toast.onmouseleave = Swal.resumeTimer;
		}
		});
		Toast.fire({
		icon: "success",
		title: "Nomor rekening berhasil disalin:" + copyText
		});

		//end alert
    }
  </script>

<style>
    .copy-btn {
      cursor: pointer;
    }
</style>

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

