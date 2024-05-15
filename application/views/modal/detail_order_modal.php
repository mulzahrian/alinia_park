<div class="modal fade" id="detailOrderModal" tabindex="-1" role="dialog" aria-labelledby="newdetailOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newdetailOrderModalLabel">Detail Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <table id="table-list-order-package" class="mdl-data-table" style="width:100%" cellspacing="0">
				<thead>
                    <tr>
						<th>Paket Name</th>
                        <th>Price</th>	
					</tr> 
				</thead>
					<tbody>
					</tbody>
				<tfoot></tfoot>
			</table>
            <form>
            <div class="modal-body">
                <div class="form-group d-flex align-items-center">
                    <p class="mb-0 mr-3">Jumlah</p>
                    <input type="number" class="form-control mr-2 equal-width" id="order_total" name="order_total" placeholder="Jumlah" min="0" value="0" onchange="updateTotal()">
                    <button type="button" class="btn btn-primary btn-circle btn-sm" onclick="decrement()">-</button>
                    <button type="button" class="btn btn-primary btn-circle btn-sm ml-2" onclick="increment()">+</button>
                </div>
                <input type="hidden" class="form-control" id="harga_order" name="harga_order"> <!-- Contoh nilai harga_order -->
                <input type="hidden" class="form-control" id="id_package_mas" name="id_package_mas">
                <input type="hidden" class="form-control" id="id_order" name="id_order">
                <div class="form-group d-flex align-items-center mt-3">
                    <p class="mb-0 mr-4">Total </p>
                    <input type="text" class="form-control equal-width" id="total_order" name="total_order" placeholder="Total" readonly>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a type="button" class="btn btn-success" id="confirm_detail_package"><b style="color: white;">Proses</b></a>
                    <!-- <button type="submit" class="btn btn-primary">Add</button> -->
                </div>
            </form>
        </div>
    </div>
</div> 

<style>
        .btn-circle {
            width: 30px;
            height: 30px;
            padding: 6px 0;
            border-radius: 15px;
            text-align: center;
            font-size: 12px;
            line-height: 1.42857;
        }
        .btn-circle.btn-sm {
            width: 24px;
            height: 24px;
            padding: 2px 0;
            border-radius: 12px;
            font-size: 10px;
            line-height: 1.5;
        }
        .equal-width {
            width: calc(100% - 120px); /* Sesuaikan jika perlu */
        }
</style>

<script>
        function decrement() {
            var input = document.getElementById('order_total');
            var value = parseInt(input.value, 10);
            if (!isNaN(value) && value > 0) {
                input.value = value - 1;
                updateTotal();
            }
        }

        function increment() {
            var input = document.getElementById('order_total');
            var value = parseInt(input.value, 10);
            if (!isNaN(value)) {
                input.value = value + 1;
                updateTotal();
            }
        }

        function updateTotal() {
            var orderTotal = parseInt(document.getElementById('order_total').value, 10);
            var hargaOrder = parseInt(document.getElementById('harga_order').value, 10);
            var totalOrder = document.getElementById('total_order');

            if (!isNaN(orderTotal) && !isNaN(hargaOrder)) {
                totalOrder.value = orderTotal * hargaOrder;
            } else {
                totalOrder.value = 0;
            }
        }

        // Inisialisasi total saat halaman dimuat
        window.onload = updateTotal;
    </script>