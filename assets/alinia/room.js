
// var table_list_room = $('#table-list-room').DataTable({
//     "columnDefs": [{
//         'bSortable': true,
//         "targets": [],
//         "visible": false,
//         "scrollX": true,
//         "responsive": true,
//     }]
// });

//$(document).ready(function() {
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
//});

// $(document).ready(function() {
//     $('#datatable1').DataTable();
// });

// if ($("#main-form-room").length) {
//     get_room_data();
// }

// $('#btn-submit-revise').on('click', function() {
//     get_room_data();
// });

if ($("#main-form-room").length) {
    get_room_data();
    // $('#notif-pengajuan').hide();
    // $('#pilihan-tab').val('5');
    // validasi_branch();
    // getChannleType();
    // getTagProgram();
    // send_nik();
    // $('#btn-proses-submit').prop('disabled', true);
    // $('#btn-proses-export').prop('disabled', true);

}

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
                    array.push([
                        this['tipe_kamar'],
                        this['tipe_kamar'],
                        this['tipe_kamar'],
                        this['tipe_kamar'],
                        this['tipe_kamar'],
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
