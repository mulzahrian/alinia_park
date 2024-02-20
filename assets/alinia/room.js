
// var table_list_room = $('#table-list-room').DataTable({
//     "columnDefs": [{
//         'bSortable': true,
//         "targets": [],
//         "visible": false,
//         "scrollX": true,
//         "responsive": true,
//     }]
// });

// if ($("#main-form-room").length) {
//     get_room_data();
// }

$('#btn-submit-revise').on('click', function() {
    get_room_data();
});

// function get_room_data() {
//     $.ajax({  
//         'url':'<?= base_url("management/get_room_data"); ?>',
//         'type': 'GET',
//         success: function(response) {
//             try {
//                 var data = $.parseJSON(response);
//                 data1 = $.parseJSON(data);
//                 table_list_room.clear().draw();
//                 console.log(data1);
//                 var array = [];
//                 $.each(data1['Data'], function(index) {
//                     array.push([
//                         this['npwp_name']
//                     ])
//                 });
//                 table_list_room.rows.add(array).draw();
//             } catch (e) {
//                 console.log(e);
//                 alert_error("Terjadi Kesalahan => 2" + e);
//             }
//         },
//         error: function(response) {
//             alert_error('Error Connection');
//         }
//     });
// }
