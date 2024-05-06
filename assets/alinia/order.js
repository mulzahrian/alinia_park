


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
                        var order_request_type = localStorage.getItem('order_request_type');
                        orderPackageType(order_request_type);
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

function orderPackageType(Id_package){
    $('#detailPaketModal').modal('show');
    console.log(id_master_package);
    id_package_master_public = id_master_package;
    $.ajax({
        url: '../order/get_detail_package',
        method: 'POST',
        data : {
            id_master_package : id_master_package
        },
        success: function(response) {
                try {
                    var data = $.parseJSON(response);
                    table_list_detail.clear().draw();
                    console.log(data);
                    var array = [];
                    $.each(data['Data'], function(index) {
                        hapus_cek = '<a type="button" class="btn btn-warning btn-sm float-center "><i class="fas fa-pen" style="color:white"></i></a>' +
                        '<a type="button" class="btn btn-danger btn-sm float-center"><i class="fas fa-trash-alt" style="color:white"></i></a>';    
                       //cek_Data = this['employee_no']
                       array.push([
                        this['name_detail_pack'],
                        this['name'],
                        hapus_cek
                    ])
                    });
                    table_list_detail.rows.add(array).draw(); 
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