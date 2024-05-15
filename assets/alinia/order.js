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


//VARIABLE
id_package_order_pub = '';
order_request_type = '';

if ($("#main-order-data").length) {
    var order_request_type = localStorage.getItem('order_request_type');
    if(order_request_type == 'package'){
        order_request_type = '';
        localStorage.setItem('order_request_type', order_request_type);
        $('#modalPackageOrder').modal('show');
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
    insertOrderPackage();
});

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
    $.ajax({ 
        url: '../order/get_order_status_active',
        method: 'GET',
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
                        // var id_package_order_pub = localStorage.getItem('id_package_order_pub');
                        // getOrderStatusActive(id_package_order_pub);
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