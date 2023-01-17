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
        title: 'Erase',
        defaultContent: '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">\n' +
            '<i class="fas fa-trash deletee-btn" style="cursor:pointer;"></i></button>',
        orderable: false
    });
    let stringdefault2 = JSON.stringify({
        data: null,
        title: 'Edit',
        className: "dt-center ",
        defaultContent: '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">\n' +
            '<i class="fas fa-pen" style="cursor:pointer;"></i></button>',
        orderable: false
    });
    let receivedString = JSON.stringify(response);
    let remocveKey = receivedString.substring(0, receivedString.indexOf(']'));
    let lastJson = remocveKey + ',' + stringdefault + ',' + stringdefault2 + ']}';
    let arrColumns = [];
    for (let i = 0; i < response.columns.length; i++) {
        let element = response.columns[i];
        arrColumns.push(element.data);
    };
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
       let btnDelete = document.getElementsByClassName('deletee-btn');
       console.log(btnDelete);
        for (let k = 0; k < btnDelete.length; k++) {
            btnDelete[k].addEventListener('click',openModal);
        }
        function openModal(e){
            let element = e.target;
            if(element.classList.contains('deletee-btn')){

            }else{

            }

        }
    });
});