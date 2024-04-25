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
//VARIABLE PUBLIC
var id_package_public = '';

if ($("#main-form-room").length) {
    get_room_data();
}
if ($("#main-form-master").length) {
    var id_package_public = localStorage.getItem('id_package_public');
    id_data = id_package_public;
    addDataMaster(id_data);
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
                        hapus_cek = '<a type="button" class="btn btn-primary btn-sm float-center" onclick="addMasterPackage1('+ this['id_package'] +')"><i class="fas fa-plus" style="color:green"></i></a>' + 
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