<!-- Begin Page Content -->
<div class="container-fluid" id="main-type-data">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <!-- <input type="button" class="btn btn-inline btn-primary" id="btn-submit-revise" value="Submit"> -->

            <a href="" id="btn_tekan" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPackageTypeModal">Add Type</a>

            
            <table id="table-list-type" class="mdl-data-table" style="width:100%" cellspacing="0">
								<thead>
                                <tr>
									<th>Type Name</th>
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
<div class="modal fade" id="newPackageTypeModal" tabindex="-1" role="dialog" aria-labelledby="newPackageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPackageModalLabel">Add new Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <form action="<?= base_url('menu'); ?>" method="post"> -->
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="input-type-package" name="input-type-package" placeholder="New Type...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a type="button" id="btn-insert-type" class="btn btn-primary" style="color:white">Add</a>
                </div>
            <!-- </form> -->
        </div>
    </div>
</div> 