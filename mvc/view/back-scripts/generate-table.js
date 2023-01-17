$.ajax({
    url: "../../../mvc/view/datatables-calls/getColumns.php",
    type: "POST",
    dataType: 'json',
    data: {
        'table-used': sessionStorage.getItem('table-used'),
    },
    async: true
}).done((response) => {
    let stringdefault = JSON.stringify({
        data: null,
        title: 'Eliminar',
        className: "dt-center fas fa-eraser",
        defaultContent: '<i></i>',
        orderable: false
    })
    let receivedString = JSON.stringify(response);
    let remocveKey = receivedString.substring(0, receivedString.indexOf(']'));
    let lastJson = remocveKey + ',' + stringdefault + ']}';
    let arrColumns = [];
    for (let i = 0; i < response.columns.length; i++) {
        let element = response.columns[i];
        arrColumns.push(element.data);
    }
    $(document).ready(function () {
        $('#user').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '../../../mvc/view/datatables-calls/call-users.php',
                data: {
                    'table-used': sessionStorage.getItem('table-used'),
                    'primaryKey': response.columns[0].data,
                    'columns-used': arrColumns,
                },
                type: 'POST',
            },
            columns: JSON.parse(lastJson).columns,
        });
    });
});