// Call the dataTables jQuery plugin
$(document).ready(function () {
    const title = 'Laporan SIMA';

    $('#dataTable').DataTable();
    $('#dataTableLaporan').DataTable({
        buttons: [{
            extend: 'copy',
            exportOptions: {
                columns: [0, 1, 2, 3],
            },
            title: title,
        },
        {
            extend: 'excel',
            exportOptions: {
                columns: [0, 1, 2, 3],
            },
            title: title,
        },
        {
            extend: 'pdf',
            exportOptions: {
                columns: [0, 1, 2, 3],
            },
            download: 'open',
            title: title,
        },
        {
            extend: 'print',
            exportOptions: {
                columns: [0, 1, 2, 3],
            },
            title: title,
        },
        ],
        dom: '<"row"<"col-12 col-md-8"B><"col-12 col-md-4"fr>><t><"row"<"col-12 col-sm-6"i><"col-12 col-sm-6"p>>',
    });
});
