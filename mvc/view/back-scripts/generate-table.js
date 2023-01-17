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
        className: "dt-center",
        title: 'View-Card',
        defaultContent: '<a onclick="modifyHref(this)"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">\n' +
            '<i class="fas fa-eye deletee-btn" style="cursor:pointer;"></i></button></a>',
        orderable: false
    });
    let receivedString = JSON.stringify(response);
    let remocveKey = receivedString.substring(0, receivedString.indexOf(']'));
    let lastJson = remocveKey+','+stringdefault+']}';
    let arrColumns = [];
    for (let i = 0; i < response.columns.length; i++) {
        let element = response.columns[i];
        arrColumns.push(element.data);
    }
    ;
    $(document).ready(function () {
        $('#' + sessionStorage.getItem('table-used')).DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '../../../mvc/view/datatables-calls/call-db-table.php',
                data: {
                    'table-used': sessionStorage.getItem('table-used'),
                    'primaryKey': response.columns[0].data,
                    'columns-used': arrColumns,
                },
                type: 'POST',
                async: true,
            },
            columns: JSON.parse(lastJson).columns,
        });
    });
});
function modifyHref(a){
     let id = a.parentElement.parentElement.firstChild.innerText;
     let url = window.location.href;
     a.setAttribute('href',url+'/'+id);
}