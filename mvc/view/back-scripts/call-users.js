$.ajax({
    url: "../../../mvc/view/datatables-calls/getColumns.php",
    type: "POST",
    dataType: 'json',
    data: {
        'table-used': sessionStorage.getItem('table-used'),
    },
    async: true
}).done((response) =>{
    console.log(JSON.stringify(response))
});
JSON.parse(response);
$(document).ready(function () {
    $('#user').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '../../../mvc/view/datatables-calls/call-users.php',
            type: 'POST',
        },
        columns: [
            {
                data: 'user_id'
            },
            {
                data: 'email'
            },
            {
                data: 'password'
            },
            {
                data: 'rol',
            },
            {
                data: 'tokens',
            },
            {
                data: 'telph',
                render: function (data, type, row) {
                    return data.replace(/\s/g, '&nbsp;');
                }
            },
            {
                data: null,
                className: "dt-center fas fa-eraser",
                defaultContent: '<i></i>',
                orderable: false
            }
        ],
    });

    function updateDB() {
        let input = event.target;

    }

    $('input').blur(function () {
        updateDB();
    })
});