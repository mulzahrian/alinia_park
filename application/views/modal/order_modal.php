<!-- Modal -->
<div class="modal fade" id="modalPackageOrder" tabindex="-1" role="dialog" aria-labelledby="newOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newOrderModalLabel">Pesanan Anda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post">
                <div class="modal-body">
                <div class="form-group row">
                    <div class="col-sm-12" id='div-order_type'>
                        <select id="order_type" class="form-control res-select">
                            <option value="1">Personal</option>
                            <option value="2">Group</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12" id='div-drpdw-tgprogram'>
                        <input type="text" class="form-control" id="type" name="type" value="Paket" placeholder="Pesanan_anda" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                            <span></span>
                            <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Password">
                    </div>
                    <!-- <div class="col-sm-6">
                            <input type="date" class="form-control " id="end_date" name="password2" placeholder="Repeat Password">
                    </div> -->
                </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a type="button" class="btn btn-success" id="confirm_order_package"><b style="color: white;">Confirm</b></a>
                </div>
            </form>
        </div>
    </div>
</div> 