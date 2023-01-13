<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.0/css/all.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://localhost/christies-meta/mvc/repositories/adminlte/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/summernote/summernote-bs4.min.css">
    <script src="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/jquery/jquery.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <?php
        require_once 'view/back/nav.php';
        ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <?php
        echo $info;
        require_once $content;
        require_once 'view/back/footer.php';
        ?>
    </div>
</div>
<!-- jQuery -->
<script src="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/moment/moment.min.js"></script>
<script src="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="https://localhost/christies-meta/mvc/repositories/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="https://localhost/christies-meta/mvc/repositories/adminlte/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://localhost/christies-meta/mvc/repositories/adminlte/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="https://localhost/christies-meta/mvc/repositories/adminlte/dist/js/pages/dashboard.js"></script>
</body>
</html>