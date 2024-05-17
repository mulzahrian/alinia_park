var table_list_order_hotel = $('#table-list-order-hotel').DataTable({
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
id_hoteL_order_pub = "";



function orderHotel(id_hotel){
    id_hoteL_order_pub = id_hotel;
    localStorage.setItem('id_hoteL_order_pub', id_hoteL_order_pub);
    window.location.href = 'order/order';
    order_request_type = 'hotel'
    localStorage.setItem('order_request_type', order_request_type); 
}

$('#confirm_order_hotel').on('click', function() {
    checkHasOrder2();
});

function checkHasOrder2(){
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
                    insertOrderHotel();
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


function insertOrderHotel(){
    var order_type = $('#order_type_hotel').val();
    var type = $('#type_hotel').val();
    var date = $('#start_date1').val();
    var end_date = $('#end_date').val();
    var user_id = $('#user_id').val();
    $.ajax({
        url: '../order/add_order_hotel',
        method: 'POST',
        data : {
            order_type : order_type,
            type : type,
            date : date,
            end_date : end_date,
            create_by : user_id,
            status : 1
        },
        success: function(response) {
                try {
                    var data = $.parseJSON(response);
                    if (data['status'] == '200') {
                        publik_order_type = order_type;
                        var id_hoteL_order_pub = localStorage.getItem('id_hoteL_order_pub');
                        getOrderStatusActive2(id_hoteL_order_pub);
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

function getOrderStatusActive2(id_hoteL_order_pub){
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
                orderHotelType(id_hoteL_order_pub,id_order);
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

function orderHotelType(Id_hotel,id_order){
    $('#modalHotelOrder').modal('hide');
    $('#detailOrderHotelModal').modal('show');
    console.log(Id_hotel);
    $.ajax({
        url: '../order/get_detail_hotel',
        method: 'POST',
        data : {
            id_hotel : Id_hotel
        },
        success: function(response) {
                try {
                    var total = "";
                    var id_hotel_mas = "";
                    var data = $.parseJSON(response);
                    table_list_order_hotel.clear().draw();
                    console.log(data);
                    var array = [];
                    $.each(data['Data'], function(index) {
                       array.push([
                        this['hotel_name'],
                        this['price'],
                    ])
                    total = this['price'];
                    id_hotel_mas = this['Id_hotel'];
                    });
                    if(publik_order_type == '1'){
                        $('#order_total_hotel').val('1');
                        $('#total_order_hotel').val(total);
                        $('#btn_tambah_order_hotel').prop('disabled', true);
                        $('#btn_kurang_order_hotel').prop('disabled', true);
                    }
                    $('#harga_order_hotel').val(total);
                    $('#id_order_hotel').val(id_order);
                    $('#id_hotel_mas').val(id_hotel_mas);
                    table_list_order_hotel.rows.add(array).draw(); 
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

$('#confirm_detail_hotel').on('click', function() {
    insertOrderDetailHotel();
});

function insertOrderDetailHotel(){
    var order_total = $('#order_total_hotel').val(); //order_number
    var harga_order = $('#harga_order_hotel').val(); //order price
    var total_order = $('#total_order_hotel').val(); // total_price
    var id_hotel_mas = $('#id_hotel_mas').val(); //id_package_mas
    var id_order = $('#id_order_hotel').val(); //id_order
    var user_id = $('#user_id').val();
    $.ajax({
        url: '../order/insertOrderDetailHotel',
        method: 'POST',
        data : {
            order_total : order_total,
            harga_order : harga_order,
            total_order : total_order,
            id_hotel_mas : id_hotel_mas,
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