var table_list_room = $('#table-list-room').DataTable({
        "columnDefs": [{
            "targets": [],
            "visible": false,
            "responsive": true,
        }],
        retrieve: false,
        paging: true,
        searching: true,
});

var table_list_master = $('#table-list-master').DataTable({
            "columnDefs": [{
                "targets": [],
                "visible": false,
                "responsive": true,
            }],
            retrieve: false,
            paging: true,
            searching: true,
});

var table_list_detail = $('#table-list-detail').DataTable({
    "columnDefs": [{
        "targets": [],
        "visible": false,
        "responsive": true,
    }],
    retrieve: false,
    paging: true,
    searching: true,
});

var table_list_type = $('#table-list-type').DataTable({
    "columnDefs": [{
        "targets": [],
        "visible": false,
        "responsive": true,
    }],
    retrieve: false,
    paging: true,
    searching: true,
});

var table_list_hotel = $('#table-list-hotel').DataTable({
    "columnDefs": [{
        "targets": [],
        "visible": false,
        "responsive": true,
    }],
    retrieve: false,
    paging: true,
    searching: true,
});

//VARIABLE PUBLIC
var id_package_public = '';
var id_package_master_public = '';

if ($("#main-form-room").length) {
    get_room_data();
}
if ($("#main-form-master").length) {
    var id_package_public = localStorage.getItem('id_package_public');
    id_data = id_package_public;
    addDataMaster(id_data);
}
if ($("#main-type-data").length) {
    getTypeData();
}

if ($("#main-form-hotel").length) {
    getHotelData();
}


function get_room_data() {
    $.ajax({ 
        url: 'management/get_room_data',
        method: 'GET',
        success: function(response) {
            try {
                var data = $.parseJSON(response);
                //data1 = $.parseJSON(data);
                table_list_room.clear().draw();
                console.log(data);
                var array = [];
                $.each(data['Data'], function(index) {
                    var action = '';
                    hapus_cek = '<a type="button" class="btn btn-primary btn-sm float-center" onclick="addMasterPackage('+ this['Id_package'] +')"><i class="fas fa-plus" style="color:green"></i></a>' + 
                    '<a type="button" class="btn btn-warning btn-sm float-center "><i class="fas fa-pen" style="color:green"></i></a>' +
                    '<a type="button" class="btn btn-danger btn-sm float-center"><i class="fas fa-trash-alt" style="color:green"></i></a>';
                    array.push([
                        this['package_name'],
                        this['name'],
                        hapus_cek
                    ])
                });
                table_list_room.rows.add(array).draw();
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


function addMasterPackage(id_package) {
    id_package_public = id_package;
    localStorage.setItem('id_package_public', id_package_public);
    window.location.href = 'management/master_package';
}

function addDataMaster(id_package){
    console.log(id_package);
    $.ajax({
        url: '../management/get_master_package',
        method: 'POST',
        data : {
            id_package : id_package
        },
        success: function(response) {
                try {
                    var data = $.parseJSON(response);
                    table_list_master.clear().draw();
                    console.log(data);
                    var array = [];
                    $.each(data['Data'], function(index) {
                        hapus_cek = '<a type="button" class="btn btn-primary btn-sm float-center" onclick="addDetailPackage('+ this['Id_package_master'] +')"><i class="fas fa-plus" style="color:green"></i></a>' + 
                        '<a type="button" class="btn btn-warning btn-sm float-center "><i class="fas fa-pen" style="color:green"></i></a>' +
                        '<a type="button" class="btn btn-danger btn-sm float-center"><i class="fas fa-trash-alt" style="color:green"></i></a>';    
                       //cek_Data = this['employee_no']
                       array.push([
                        this['master_package_name'],
                        this['package_price'],
                        hapus_cek
                    ])
                    });
                    table_list_master.rows.add(array).draw(); 
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

function addDetailPackage(id_master_package){
    $('#detailPaketModal').modal('show');
    console.log(id_master_package);
    id_package_master_public = id_master_package;
    $.ajax({
        url: '../management/get_detail_package',
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

$('#submit_detail').on('click', function() {
    insertDetailPackage();
});

function insertDetailPackage(){
    var Id_package_master = id_package_master_public;
    var name_detail_pack = $('#detail_paket').val();
    var user_id = $('#user_id').val();
    $.ajax({
        url: '../management/add_package_detail',
        method: 'POST',
        data : {
            Id_package_master : Id_package_master,
            name_detail_pack : name_detail_pack,
            create_by : user_id,
            status : 1
        },
        success: function(response) {
                try {
                    var data = $.parseJSON(response);
                    if (data['status'] == '200') {
                        alert('data berhasil diinputkan')
                        var id_master_package = id_package_master_public;
                        addDetailPackage(id_master_package);
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

function getTypeData() {
    $.ajax({ 
        url: '../management/get_type_data',
        method: 'GET',
        success: function(response) {
            try {
                var data = $.parseJSON(response);
                table_list_type.clear().draw();
                console.log(data);
                var array = [];
                $.each(data['Data'], function(index) {
                    hapus_cek = '<a type="button" class="btn btn-warning btn-sm float-center "><i class="fas fa-pen" style="color:green"></i></a>' +
                    '<a type="button" class="btn btn-danger btn-sm float-center"><i class="fas fa-trash-alt" style="color:green"></i></a>';
                    array.push([
                        this['type_name'],
                        this['name'],
                        hapus_cek
                    ])
                });
                table_list_type.rows.add(array).draw();
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

function getHotelData() {
    $.ajax({ 
        url: '../management/get_hotel_data',
        method: 'GET',
        success: function(response) {
            try {
                var data = $.parseJSON(response);
                table_list_hotel.clear().draw();
                console.log(data);
                var array = [];
                $.each(data['Data'], function(index) {
                    hapus_cek = '<a type="button" class="btn btn-info btn-sm float-center" onclick="seeImage('+ this['Id_hotel'] +')"><i class="fas fa-image" style="color:green"></i></a>' + 
                    '<a type="button" class="btn btn-primary btn-sm float-center" onclick="addDetailPackage('+ this['Id_hotel'] +')"><i class="fas fa-plus" style="color:green"></i></a>' + 
                    '<a type="button" class="btn btn-warning btn-sm float-center "><i class="fas fa-pen" style="color:green"></i></a>' +
                    '<a type="button" class="btn btn-danger btn-sm float-center"><i class="fas fa-trash-alt" style="color:green"></i></a>';
                    array.push([
                        this['hotel_name'],
                        this['price'],
                        this['name'],
                        hapus_cek
                    ])
                });
                table_list_hotel.rows.add(array).draw();
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

function seeImage(Id_hotel){
    console.log(Id_hotel);
    $.ajax({
        url: '../management/get_image_hotel',
        method: 'POST',
        data : {
            Id_hotel : Id_hotel
        },
        success: function(response) {
                try {
                    $('#gambar_hotel').attr('src', response);
                    $('#imageHotelModal').modal('show');
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


function addDetailHotel(id_master_package){
    $('#detailPaketModal').modal('show');
    console.log(id_master_package);
    id_package_master_public = id_master_package;
    $.ajax({
        url: '../management/get_detail_package',
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