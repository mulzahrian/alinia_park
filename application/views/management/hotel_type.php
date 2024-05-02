<!-- Begin Page Content -->
<div class="container-fluid" id="main-type-hotel">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            
            <a href="" id="btn_tekan" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPackageModal">Add Type</a>
            
                <table id="table-list-hotel-type" class="mdl-data-table" style="width:100%" cellspacing="0">
					<thead>
                        <tr>
							<th>Type Hotel</th>
                            <th>Creator</th>
							<th>Action</th>		
						</tr> 
					</thead>
						<tbody>
						</tbody>
						<tfoot></tfoot>
				</table>
        </div>
    </div>



</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="newPackageModal" tabindex="-1" role="dialog" aria-labelledby="newPackageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPackageModalLabel">Tambah Paket Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div> 