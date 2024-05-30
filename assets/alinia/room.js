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

var table_list_detail_hotel = $('#table-list-detail-hotel').DataTable({
    "columnDefs": [{
        "targets": [],
        "visible": false,
        "responsive": true,
    }],
    retrieve: false,
    paging: true,
    searching: true,
});

var table_list_manage_hotel = $('#table-list-manage-hotel').DataTable({
    "columnDefs": [{
        "targets": [],
        "visible": false,
        "responsive": true,
    }],
    retrieve: false,
    paging: true,
    searching: true,
});

var table_list_hotel_type = $('#table-list-hotel-type').DataTable({
    "columnDefs": [{
        "targets": [],
        "visible": false,
        "responsive": true,
    }],
    retrieve: false,
    paging: true,
    searching: true,
});

var table_list_view_package = $('#table-list-view-package').DataTable({
    "columnDefs": [{
        "targets": [],
        "visible": false,
        "responsive": true,
    }],
    retrieve: false,
    paging: true,
    searching: true,
});

var table_list_approval = $('#table-list-approval').DataTable({
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
var id_hotel_public = '';

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

if ($("#main-type-hotel").length) {
    getTypeHotelData();
}

if ($("#main-approval").length) {
    getApprovalData();
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
                    hapus_cek = '<a type="button" class="btn btn-warning btn-sm float-center "><i class="fas fa-pen" style="color:green" onclick="reloadPage('+ this['Id_type_package'] +')"></i></a>' +
                    '<a type="button" class="btn btn-danger btn-sm float-center"><i class="fas fa-trash-alt" style="color:green" onclick="deleteTypePackage('+ this['Id_type_package'] +')"></i></a>';
                    array.push([
                        this['name'],
                        this['type_name'],
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

function deleteTypePackage(Id_type_package){
    var Id_type_package = Id_type_package;
    $.ajax({
        url: '../management/delete_type',
        method: 'POST',
        data : {
            Id_type_package : Id_type_package,
        },
        success: function(response) {
                try {
                    var data = $.parseJSON(response);
                    if (data['status'] == '200') {
                        Swal.fire({
                            title: "Berhasil di hapus",
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: "Oke",
                            text: "Success",
                            icon: "success"
                          }).then((result) => {
                            if (result.isConfirmed) {
                                getTypeData();
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

function reloadPage(Id_type_package){
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
                    hapus_cek = '<a type="button" class="btn btn-warning btn-sm float-center "><i class="fas fa-pen" style="color:green" onclick="reloadPage('+ this['Id_type_package'] +')"></i></a>' +
                    '<a type="button" class="btn btn-danger btn-sm float-center"><i class="fas fa-trash-alt" style="color:green" onclick="deleteTypePackage('+ this['Id_type_package'] +')"></i></a>';
                    form = '<div class="input-group div-kode-prg" id="div-kode-prg' + this['Id_type_package'] + '">' +
                    '<input maxlength = "50" style="width: 100%;" type="text" class="form-control input-sm " id="input-type-name' + this['Id_type_package'] + '" value ="' + this['type_name'] + '" >' +
                    '</div>'
                    save_edit = '<a type="button" class="btn btn-success btn-sm float-center "><i class="fas fa-check" style="color:green" onclick="saveEditType('+ this['Id_type_package'] +')"></i>Edit</a>'
                    if(this['Id_type_package'] != Id_type_package){
                    array.push([
                        this['name'],
                        this['type_name'],
                        hapus_cek
                    ])
                    }else{
                        //hapus_cek = 'test';
                    array.push([
                        this['name'],
                        form,
                        save_edit
                    ])
                    }
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

function saveEditType(Id_type_package){
    var Id_type_package = Id_type_package;
    var type_name = $('#input-type-name' + Id_type_package).val();
    var user_id = $('#user_id').val();
    $.ajax({
        url: '../management/update_type',
        method: 'POST',
        data : {
            Id_type_package : Id_type_package,
            type_name : type_name,
            create_by : user_id
        },
        success: function(response) {
                try {
                    var data = $.parseJSON(response);
                    if (data['status'] == '200') {
                        Swal.fire({
                            title: "Berhasil di Edit",
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: "Oke",
                            text: "Success",
                            icon: "success"
                          }).then((result) => {
                            if (result.isConfirmed) {
                                getTypeData();
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

$('#btn-insert-type').on('click', function() {
    insertTypePackage();
});

function insertTypePackage(){
    var input_type_package = $('#input-type-package').val();
    var user_id = $('#user_id').val();
    $.ajax({
        url: '../management/add_type_package',
        method: 'POST',
        data : {
            input_type_package : input_type_package,
            create_by : user_id,
            status : 1
        },
        success: function(response) {
                try {
                    var data = $.parseJSON(response);
                    if (data['status'] == '200') {
                        $('#newPackageTypeModal').modal('hide');
                        Swal.fire({
                            title: "data berhasil ditambahkan",
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: "Oke",
                            text: "Success",
                            icon: "success"
                          }).then((result) => {
                            if (result.isConfirmed) {
                                getTypeData();
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
                    hapus_cek = '<a type="button" class="btn btn-info btn-sm float-center" onclick="seeImage('+ this['Id_hotel'] +')"><i class="fas fa-image" style="color:white"></i></a>' + 
                    '<a type="button" class="btn btn-primary btn-sm float-center" onclick="addDetailHotel('+ this['Id_hotel'] +')"><i class="fas fa-plus" style="color:white"></i></a>' + 
                    '<a type="button" class="btn btn-success btn-sm float-center" onclick="addManageHotel('+ this['Id_hotel'] +')"><i class="fas fa-dollar-sign" style="color:white"></i></a>' + 
                    '<a type="button" class="btn btn-warning btn-sm float-center "><i class="fas fa-pen" style="color:white"></i></a>' +
                    '<a type="button" class="btn btn-danger btn-sm float-center"><i class="fas fa-trash-alt" style="color:white"></i></a>';
                    array.push([
                        this['hotel_name'],
                        formatRupiah(this['price']),
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

function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join('');
    var ribuan = reverse.match(/\d{1,3}/g);
    var hasil = ribuan.join('.').split('').reverse().join('');
    return 'Rp ' + hasil;
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


function addDetailHotel(id_hotel){
    $('#detailHotelModal').modal('show');
    console.log(id_hotel);
    id_hotel_public = id_hotel;
    $.ajax({
        url: '../management/get_hotel_detail',
        method: 'POST',
        data : {
            id_hotel : id_hotel
        },
        success: function(response) {
                try {
                    var data = $.parseJSON(response);
                    table_list_detail_hotel.clear().draw();
                    console.log(data);
                    var array = [];
                    $.each(data['Data'], function(index) {
                        hapus_cek = '<a type="button" class="btn btn-warning btn-sm float-center "><i class="fas fa-pen" style="color:white"></i></a>' +
                        '<a type="button" class="btn btn-danger btn-sm float-center"><i class="fas fa-trash-alt" style="color:white"></i></a>';    
                       //cek_Data = this['employee_no']
                       array.push([
                        this['hotel_detail'],
                        this['name'],
                        hapus_cek
                    ])
                    });
                    table_list_detail_hotel.rows.add(array).draw(); 
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

function addManageHotel(id_hotel){
    $('#manageHotelModal').modal('show');
    console.log(id_hotel);
    id_hotel_public = id_hotel;
    $.ajax({
        url: '../management/get_hotel_manage',
        method: 'POST',
        data : {
            id_hotel : id_hotel
        },
        success: function(response) {
                try {
                    var data = $.parseJSON(response);
                    table_list_manage_hotel.clear().draw();
                    console.log(data);
                    var array = [];
                    $.each(data['Data'], function(index) {
                        hapus_cek = '<a type="button" class="btn btn-warning btn-sm float-center "><i class="fas fa-pen" style="color:white"></i></a>' +
                        '<a type="button" class="btn btn-danger btn-sm float-center"><i class="fas fa-trash-alt" style="color:white"></i></a>';    
                       array.push([
                        this['room_avail'],
                        this['people'],
                        this['name'],
                        hapus_cek
                    ])
                    });
                    table_list_manage_hotel.rows.add(array).draw(); 
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

function getTypeHotelData() {
    $.ajax({ 
        url: '../management/get_type_hotel',
        method: 'GET',
        success: function(response) {
            try {
                var data = $.parseJSON(response);
                table_list_hotel_type.clear().draw();
                console.log(data);
                var array = [];
                $.each(data['Data'], function(index) {
                    hapus_cek = '<a type="button" class="btn btn-warning btn-sm float-center "><i class="fas fa-pen" style="color:green"></i></a>' +
                    '<a type="button" class="btn btn-danger btn-sm float-center"><i class="fas fa-trash-alt" style="color:green"></i></a>';
                    array.push([
                        this['hotel_type'],
                        this['name'],
                        hapus_cek
                    ])
                });
                table_list_hotel_type.rows.add(array).draw();
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


function getApprovalData() {
    $.ajax({ 
        url: '../management/get_approval',
        method: 'GET',
        success: function(response) {
            try {
                var data = $.parseJSON(response);
                table_list_approval.clear().draw();
                console.log(data);
                var array = [];
                $.each(data['Data'], function(index) {
                    hapus_cek = '<a type="button" class="btn btn-warning btn-sm float-center" onclick="appData('+ this['id_order'] +')"><b style="color: white;">Approve</b></a>' +
                    '<a type="button" class="btn btn-danger btn-sm float-center"><b style="color: white;">Reject</b></a>';
                    array.push([
                        this['name'],
                        this['type'],
                        this['bank_name'],
                        this['account_no'],
                        this['phone'],
                        this['email'],
                        hapus_cek
                    ])
                });
                table_list_approval.rows.add(array).draw();
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

function appData(id_order){
    console.log(id_order);
    $.ajax({
        url: '../management/update_flag_app',
        method: 'POST',
        data : {
            id_order : id_order
        },
        success: function(response) {
                try {
                    var data = $.parseJSON(response);
                    
                    if (data['status'] == '200') {
                        //alert
                        Swal.fire({
                            title: "Berhasil di Approve",
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: "Oke",
                            text: "Success",
                            icon: "success"
                          }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                          });
                    }else{
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                            });
                            Toast.fire({
                            icon: "warning",
                            title: "Pemesanan gagal di approve tedapat kesalahan"
                            });
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