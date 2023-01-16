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
                data: `user_id`,
                render: function (data, type, row) {
                    return '<input type="text" readonly name="password" value=' + data + '>';
                }
            },
            {
                data: 'email',
                render: function (data, type, row) {
                    return '<input type="text"  readonly name="password" value=' + data + '>';
                }
            },
            {
                data: 'password', render: function (data, type, row) {
                    return '<input type="text" name="password" value=' + data + '>';
                }
            },
            {
                data: 'rol',
                render: function (data, type, row) {
                    return '<input type="text" name="rol" value=' + data + '>';
                }
            },
            {
                data: 'tokens',
                render: function (data, type, row) {
                    return '<input type="text" name="tokens" value=' + data + '>';
                }
            },
            {
                data: 'telph',
                render: function (data, type, row) {
                    return '<input type="text" name="telph" value=' + data.replace(/\s/g, '&nbsp;') + '>';
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
    function updateDB(){
        let input =  event.target;

    }
    $('input').blur(function (){
        updateDB();
    })
});