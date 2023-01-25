<?php
$url = '';
if(!isset($_SERVER['HTTP_REFERER'])) {
    $_SERVER['HTTP_REFERER']='http://localhost/christies-meta/mvc';
}
$component = explode('/', $_SERVER['HTTP_REFERER']);
for ($i = 0, $iMax = count($component); $i < $iMax; $i++) {
        if ($component[$i] === 'index.php') {
            break;
        }else{
            $url .= $component[$i] . '/';
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <base href="<?php echo $url?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $info['title'] ?></title>
    <meta charset="utf-8">
    <link rel="icon" type="image/*" href="view/media/logos/favicon-16x16.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.0/css/all.css">
    <!-- Jquery -->
    <script src="view/admin/plugins/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- Datatables.net CSS + JS -->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.css"/>
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.js"></script>
    <!-- Bootsrap 5 CSS + JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="view/front/styles/template-front.css">
    <!-- CSS Flicikty -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <!-- JavaScript Flicikty-->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <!-- CSS LeafletMaps-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
          integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
          crossorigin=""/>
    <!-- JS LeafletMaps-->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
            integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
            crossorigin=""></script>
    <!-- Google Captcha-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="wrapper">
    <?php
        require_once 'view/front/nav.php';
    ?>
    <div id="content" class="container">
        <?php 
            require_once $content;
        ?>
    </div>
    <div>
        <?php
        require 'view/front/footer.php';
        ?>
    </div>
    <script src="view/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
</body>
</html>