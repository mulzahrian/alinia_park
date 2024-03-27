<!-- Begin Page Content -->
<div class="container-fluid" id="main-form-room">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <!-- <input type="button" class="btn btn-inline btn-primary" id="btn-submit-revise" value="Submit"> -->

            <a href="" id="btn_tekan" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPackageModal">Add Package</a>

            <table id="table-list-room" class="mdl-data-table" style="width:100%">
								<thead>
                                <tr>
									<th>Nama Paket</th>
                                    <th>Nama Paket</th>
                                    <th>Nama Paket</th>
                                    <th>Nama Paket</th>
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


<script>
// $('#btn-submit-revise').on('click', function() {
//     get_room_data();
// });

function get_room_data() {
    $.ajax({  
        'url':'<?= base_url("management/get_room_data"); ?>',
        'type': 'GET',
        success: function(response) {
            try {
                console.log(response);
                var data = $.parseJSON(response);
                // data1 = $.parseJSON(data);
                // console.log(data1);
                // table_list_room.clear().draw();
                console.log(data);
                var array = [];
                $.each(data1['Data'], function(index) {
                    array.push([
                        this['npwp_name']
                    ])
                });
                table_list_room.rows.add(array).draw();
            } catch (e) {
                console.log(e);
                alert_error("Terjadi Kesalahan => 2" + e);
            }
        },
        error: function(response) {
            alert_error('Error Connection');
        }
    });
}                
</script>