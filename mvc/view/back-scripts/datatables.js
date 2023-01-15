$(document).ready(function() {
    var dataTable = $('#datos_usuario').DataTable({
        "processing":true,
        "serverside":true,
        "ajax":{
            url: "./get_data",
            type: "POST"
        },
        "columnsDefs":[
            {
                "targets":[0,3,4],
                "orderable":true,
            }
        ]
    })
})