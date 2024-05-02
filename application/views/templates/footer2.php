            <!-- Footer -->
            <footer class="android-footer">
            <a href="#" class="android-footer-item">
            <i class="fas fa-home"></i>
            <span>Home</span>
            </a>
            <a href="#" type="button" class="android-footer-item" id="userDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
                <span>User</span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown1">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        My Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                        Edit Profile
                </a>
            </div>

            <a href="#" class="android-footer-item">
                <i class="fas fa-shopping-cart"></i>
                <span>Order</span>
            </a>
            <a href="#" class="android-footer-item">
                <i class="fas fa-history"></i>
                <span>History</span>
            </a>
            <a href="#" class="android-footer-item">
                <i class="fas fa-credit-card"></i>
                <span>Payment</span>
            </a>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            

            <!-- Bootstrap core JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

            <!-- Add datatable -->
            <!-- table 0 -->
             <!-- <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
             <!-- table 1 -->
            <!-- <script src="<?= base_url('assets/'); ?>DataTables/datatables.min.js"></script>
            <script src="<?= base_url('assets/'); ?>DataTables/datatables.js"></script> -->
            <script src="<?= base_url('assets/'); ?>Dtbels/datatables.min.js"></script> 
            <!-- table 2 -->
            <!-- <script src="<?= base_url('assets/'); ?>datatable/js/dataTables.bootstrap.min.js"></script> 
            <script src="<?= base_url('assets/'); ?>datatable/js/dataTables.bootstrapp.min.js"></script> 
            <script src="<?= base_url('assets/'); ?>datatable/js/dataTables.checkboxes.min.js"></script> 
            <script src="<?= base_url('assets/'); ?>datatable/js/dataTables.fixedColumns.min.js"></script> 
            <script src="<?= base_url('assets/'); ?>datatable/js/datatables.min.js"></script> 
            <script src="<?= base_url('assets/'); ?>datatable/js/dataTables.responsive.js"></script> 
            <script src="<?= base_url('assets/'); ?>datatable/js/dataTables.select.min.js"></script> 
            <script src="<?= base_url('assets/'); ?>datatable/js/jquery.dataTables.min.js"></script> 
            <script src="<?= base_url('assets/'); ?>datatable/js/jquery.dataTabless.min.js"></script>  -->
            <!-- table testing no css -->
            <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
            <!-- <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
            <script src="<?= base_url('assets/'); ?>detatabledatatables.min.js"></script> -->

            <!-- Coding Process JavaScript -->
            <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/alinia/room.js?v=<?php echo $this->config->item('version'); ?>"></script> -->
            <!-- <script src="<?= base_url('assets/'); ?>alinia/room.js"></script> -->
            <script src="<?php echo base_url(); ?>assets/alinia/room.js"></script>
           

            <!-- <script>
                $(document).ready(function() {
                    $('#table-list-room').DataTable();
                });
            </script> -->

            <script>
                $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });



                $('.form-check-input').on('click', function() {
                    const menuId = $(this).data('menu');
                    const roleId = $(this).data('role');

                    $.ajax({
                        url: "<?= base_url('admin/changeaccess'); ?>",
                        type: 'post',
                        data: {
                            menuId: menuId,
                            roleId: roleId
                        },
                        success: function() {
                            document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                        }
                    });

                });
            </script>

<style>
    .android-footer {
    display: flex;
    justify-content: space-around;
    align-items: center;
    background-color: #fff;
    border-top: 1px solid #ccc;
    padding: 10px 0;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
}

.android-footer-item {
    text-decoration: none;
    color: #333;
    text-align: center;
    flex: 1;
}

.android-footer-item i {
    font-size: 24px;
    margin-bottom: 5px;
}

.android-footer-item span {
    font-size: 12px;
    display: block;
}

  </style>

            </body>

            </html> 