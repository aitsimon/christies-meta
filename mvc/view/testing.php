<?php
include_once 'model/DBAdmin.php';
$dbadmin = new DBAdmin();
//$columns = $dbadmin->getColumns('user');
//var_dump($columns);

?>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css"
      href="https://cdn.datatables.net/v/bs4/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.css"/>
<script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.js"></script>
<table id="example" class="display" style="width:100%">
    <thead>
    <tr>
        <th>User_id</th>
        <th>Email</th>
        <th>Password</th>
        <th>Rol</th>
        <th>Tokens</th>
        <th>Telephone</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>User_id</th>
        <th>Email</th>
        <th>Password</th>
        <th>Rol</th>
        <th>Tokens</th>
        <th>Telephone</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </tfoot>
</table>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            processing: true,
            serverSide: true,
            columnDefs: [{
                className: 'custom',
            }],
            ajax: {
                url: '../../../view/test.php',
                type: 'POST',
            },
            columns: [
                {
                    data: 'user_id',
                    render: function (data,type,row){
                        return '<input type="text" name="user_id" value='+data+'>';
                    }
                },
                {data: 'email'},
                {data: 'password'},
                {data: 'rol'},
                {data: 'tokens'},
                {data: 'telph'},
                {
                    data: null,
                    className: "dt-center editor-edit",
                    defaultContent: 'E',
                    orderable: false
                },
                {
                    data: null,
                    className: "dt-center editor-delete",
                    defaultContent: 'X',
                    orderable: false
                }
            ],
        });
    });
</script>
