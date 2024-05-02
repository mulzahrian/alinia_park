<!-- Begin Page Content -->
<div class="container-fluid" id="main-form-hotel">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <!-- <input type="button" class="btn btn-inline btn-primary" id="btn-submit-revise" value="Submit"> -->

            <a href="" id="btn_tekan" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newHotelModal">Add new Hotel</a>

            
            <table id="table-list-hotel" class="mdl-data-table" style="width:100%" cellspacing="0">
								<thead>
                                <tr>
									<th>Hotel Name</th>
                                    <th>Price</th>
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
<div class="modal fade" id="newHotelModal" tabindex="-1" role="dialog" aria-labelledby="newHotelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newHotelModalLabel">Add new Hotel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form <?= form_open_multipart('management/insertHotel'); ?>>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="hotel_name" name="hotel_name" placeholder="Hotel Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="hotel_price" name="hotel_price" placeholder="Price">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="hotel_type" name="hotel_type" placeholder="Type">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="user_id_hotel" name="user_id_hotel" placeholder="user_id_hotel" value="<?= $user['id']; ?>">
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image_hotel" name="image_hotel">
                                <label class="custom-file-label" for="image">Choose file</label>
                        </div>
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
<!-- modal image -->
<div class="modal fade" id="imageHotelModal" tabindex="-1" role="dialog" aria-labelledby="imageHotelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-body text-center">
        <img id="gambar_hotel" src="" alt="gambar_hotel" class="img-thumbnail" style="max-width: 100%; height: auto;">
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                </div>
        </div>
    </div>
</div>