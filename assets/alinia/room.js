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

if ($("#main-form-room").length) {
    get_room_data();
}

//VARIABLE PUBLIC
var id_package_public = '';
function get_room_data() {
    $.ajax({ 
        url: 'management/get_room_data',
        method: 'GET',
        //'url':'<?= base_url("management/get_room_data"); ?>',
        // 'url':'<?= base_url("management/get_room_data"); ?>',
        // 'type': 'GET',
        success: function(response) {
            try {
                var data = $.parseJSON(response);
                //data1 = $.parseJSON(data);
               // table_list_room.clear().draw();
                console.log(data);
                var array = [];
                $.each(data['Data'], function(index) {
                    var action = '';
                    hapus_cek = '<a type="button" class="btn btn-primary btn-sm float-center" onclick="addMasterPackage('+ this['id_package'] +')"><i class="fas fa-plus" style="color:green"></i></a>' + 
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
                alert_error("Terjadi Kesalahan => 2" + e);
            }
        },
        error: function(response) {
            alert_error('Error Connection');
        }
    });
}


function addMasterPackage(id_package) {
    id_package_public = id_package;
    
}
