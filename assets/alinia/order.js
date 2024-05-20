var table_list_order_package = $('#table-list-order-package').DataTable({
    "columnDefs": [{
        "targets": [],
        "visible": false,
        "responsive": true,
        "bPaginate": false
    }],
    retrieve: false,
    paging: false,
    searching: false,
    info: false,
});

var table_list_check_order = $('#table-list-check-order').DataTable({
    "columnDefs": [{
        "targets": [],
        "visible": false,
        "responsive": true,
        "bPaginate": false
    }],
    retrieve: false,
    paging: false,
    searching: false,
    info: false,
});

var table_all_master_package = $('#table-all-master-package').DataTable({
    "columnDefs": [{
        "targets": [],
        "visible": false,
        "responsive": true,
    }],
    retrieve: false,
    paging: false,
    searching: false,
    info: false,
});


//VARIABLE
id_package_order_pub = '';
order_request_type = '';


if ($("#main-order-data").length) {
    var order_request_type = localStorage.getItem('order_request_type');
    if(order_request_type == 'package'){
        order_request_type = '';
        localStorage.setItem('order_request_type', order_request_type);
        $('#modalPackageOrder').modal('show');
    }else if(order_request_type == 'hotel'){
        order_request_type = '';
        localStorage.setItem('order_request_type', order_request_type);
        $('#modalHotelOrder').modal('show');
    }
    
}

function orderPackage(id_package){
    id_package_order_pub = id_package;
    localStorage.setItem('id_package_order_pub', id_package_order_pub);
    window.location.href = 'order/order';
    order_request_type = 'package'
    localStorage.setItem('order_request_type', order_request_type); 
}

$('#confirm_order_package').on('click', function() {
    checkHasOrder();
});

var publik_order_type = "";
function insertOrderPackage(){
    var order_type = $('#order_type').val();
    var type = $('#type').val();
    var date = $('#start_date').val();
    var user_id = $('#user_id').val();

    $.ajax({
        url: '../order/add_order_package',
        method: 'POST',
        data : {
            order_type : order_type,
            type : type,
            date : date,
            create_by : user_id,
            status : 1
        },
        success: function(response) {
                try {
                    var data = $.parseJSON(response);
                    if (data['status'] == '200') {
                        publik_order_type = order_type;
                        var id_package_order_pub = localStorage.getItem('id_package_order_pub');
                        getOrderStatusActive(id_package_order_pub);
                    }else{
                        alert('data gagal diinputkan')
                    }
                } catch (e) {
                    console.log(e);
                    alert("Terjadi Kesalahan =>" + e);
                }
        },
        error: function(response) {
            console.log(response);
            alert('Koneksi Error');
        }
    });
}


function getOrderStatusActive(id_package_order_pub){
    var user_id = $('#user_id').val();
    $.ajax({
        url: '../order/get_order_status_active',
        method: 'POST',
        data : {
            create_by : user_id,
        },
        success: function(response) {
            try {
                var data = $.parseJSON(response);
                var id_order = "";
                console.log(data);
                var array = [];
                $.each(data['Data'], function(index) {
                    array.push([
                        this['id_order'],
                    ])
                    id_order = this['id_order'];
                });
                orderPackageType(id_package_order_pub,id_order);
            } catch (e) {
                console.log(e);
                alert("Terjadi Kesalahan => 2" + e);
            }
        },
        error: function(response) {
            console.log(response);
            alert('koneksi salah');
        }
    });
}

function orderPackageType(Id_package,id_order){
    $('#modalPackageOrder').modal('hide');
    $('#detailOrderModal').modal('show');
    console.log(Id_package);
    $.ajax({
        url: '../order/get_detail_package',
        method: 'POST',
        data : {
            id_master_package : Id_package
        },
        success: function(response) {
                try {
                    var total = "";
                    var id_package_mas = "";
                    var data = $.parseJSON(response);
                    table_list_order_package.clear().draw();
                    console.log(data);
                    var array = [];
                    $.each(data['Data'], function(index) {
                       array.push([
                        this['master_package_name'],
                        this['package_price'],
                    ])
                    total = this['package_price'];
                    id_package_mas = this['Id_package_master'];
                    });
                    if(publik_order_type == '1'){
                        $('#order_total').val('1');
                        $('#total_order').val(total);
                        $('#btn_tambah_order').prop('disabled', true);
                        $('#btn_kurang_order').prop('disabled', true);
                    }
                    $('#harga_order').val(total);
                    $('#id_order').val(id_order);
                    $('#id_package_mas').val(id_package_mas);
                    table_list_order_package.rows.add(array).draw(); 
                } catch (e) {
                    console.log(e);
                    alert("Terjadi Kesalahan =>" + e);
                }
        },
        error: function(response) {
            console.log(response);
            alert('Koneksi Error');
        }
    });
}

$('#confirm_detail_package').on('click', function() {
    insertOrderDetailPackage();
});

function checkHasOrder(){
    var user_id = $('#user_id').val();
    $.ajax({
        url: '../order/check_has_order',
        method: 'POST',
        data : {
            create_by : user_id,
        },
        success: function(response) {
            try {
                var data = $.parseJSON(response);
                var has_order = "";
                console.log(data);
                var array = [];
                $.each(data['Data'], function(index) {
                    array.push([
                        this['total']
                    ]);
                    has_order = this['total'];
                });
                if(has_order != '0'){
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Masih ada proses Order yang berlangsung!"
                      });
                }else{
                    insertOrderPackage();
                }
                
            } catch (e) {
                console.log(e);
                alert("Terjadi Kesalahan => 2" + e);
            }
        },
        error: function(response) {
            console.log(response);
            alert('koneksi salah');
        }
    });
}

function insertOrderDetailPackage(){
    var order_total = $('#order_total').val(); //order_number
    var harga_order = $('#harga_order').val(); //order price
    var total_order = $('#total_order').val(); // total_price
    var id_package_mas = $('#id_package_mas').val(); //id_package_mas
    var id_order = $('#id_order').val(); //id_order
    var user_id = $('#user_id').val();
    $.ajax({
        url: '../order/insertOrderDetailPackage',
        method: 'POST',
        data : {
            order_total : order_total,
            harga_order : harga_order,
            total_order : total_order,
            id_package_mas : id_package_mas,
            id_order : id_order,
            create_by : user_id,
            status : 1
        },
        success: function(response) {
                try {
                    var data = $.parseJSON(response);
                    if (data['status'] == '200') {
                          Swal.fire({
                            title: "Berhasil di Proses",
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: "Oke",
                            text: "Success",
                            icon: "success"
                          }).then((result) => {
                            if (result.isConfirmed) {
                                order_request_type = '';
                                localStorage.setItem('order_request_type', order_request_type);
                                //window.location.href = 'order/order';
                                location.reload();
                            }
                          });
                    }else{
                        alert('data gagal diinputkan')
                    }
                } catch (e) {
                    console.log(e);
                    alert("Terjadi Kesalahan =>" + e);
                }
        },
        error: function(response) {
            console.log(response);
            alert('Koneksi Error');
        }
    });
}

var check = [];
$('#table-list-check-order tbody').on('click', 'tr', function() {
    if ($(this).hasClass('selected')) {
        $(this).removeClass('selected');
    } else {
        table_list_check_order.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
        check = table_list_check_order.row(this).data();
        var tipe_pesanan = $('#tipe_pesanan').val();
        $('#checkOrderModal').modal('hide');
        var validasi = check[0];
        if(validasi == 'Paket'){
            getAllPackageMaster();
        }else{
            if(tipe_pesanan == "Hotel"){
                $('#detailOrderModal').modal('show');
            }else{
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Tipe Pesanan Paket Tidak bisa menambahkan Hotel"
                  });
            }
            
        }
    }
});

function getAllPackageMaster() {
    $.ajax({ 
        url: '../order/getAllMasterPackage',
        method: 'GET',
        success: function(response) {
            try {
                var data = $.parseJSON(response);
                table_all_master_package.clear().draw();
                var array = [];
                $.each(data['Data'], function(index) {
                    array.push([
                        this['master_package_name'],
                        formatRupiah(this['package_price']),
                        this['Id_package_master'],
                    ])
                });
                table_all_master_package.rows.add(array).draw();
                $('#allPackageModal').modal('show');
                
            } catch (e) {
                console.log(e);
                alert("Terjadi Kesalahan => 2" + e);
            }
        },
        error: function(response) {
            console.log(response);
            alert('koneksi salah');
        }
    });
}

var publik_cek = "";
$('#table-all-master-package tbody').on('click', 'tr', function() {
    if ($(this).hasClass('selected')) {
        $(this).removeClass('selected');
    } else {
        table_all_master_package.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
        check = table_all_master_package.row(this).data();
        $('#allPackageModal').modal('hide');
        
        var paket_name = check[0];
        var paket_price = check[1];
        var paket_id = check[2]; 
        var id_order = $('#id_order_save').val();
        publik_order_type = $('#pub_order_type').val();
        orderPackageType(paket_id,id_order);

    }
});


$('#proses_order').on('click', function() {
    var bank_account = $('#bank_account').val();
    proses_order(bank_account);
});

function proses_order(bank_account){
    var user_id = $('#user_id').val();
    $.ajax({
        url: '../order/update_order',
        method: 'POST',
        data : {
            create_by : user_id,
            bank_code : bank_account
        },
        success: function(response) {
            try {
                var data = $.parseJSON(response);
                if (data['status'] == '200') {
                    Swal.fire({
                        title: "Berhasil di Proses",
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: "Oke",
                        text: "Success",
                        icon: "success"
                      }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../payment';
                        }
                      });
                }
            } catch (e) {
                console.log(e);
                alert("Terjadi Kesalahan => 2" + e);
            }
        },
        error: function(response) {
            console.log(response);
            alert('koneksi salah');
        }
    });
}