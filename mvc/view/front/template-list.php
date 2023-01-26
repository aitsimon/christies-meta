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
    <link rel="stylesheet" href="view/front/styles/list.css">
</head>
<body class="wrapper">
    <?php
        require_once 'view/front/nav.php';
    ?>
    <div id="content" class="container">
        <div id="list">
            <div id="filters" class="container">
                <div class="filter col-12 d-flex flex-row flex-wrap justify-content-around align-items-center">
                    <div id="catFilter" class="col-6 col-md-4">
                        <label for="categoryId" class=" h4 mb-0">Category:</label>
                        <select id="filterCategory">
                            <option value="none" selected></option>
                            <?php
                            /** @var Category $info */
                            foreach ($info['possibleCategories'] as $category){
                                echo "<option value='".$category[0]."'>".$category[1]."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div id="filterComments" class="col-6 col-lg-2">
                        <label for="categoryId" class=" h4 mb-0 mr-1">Likes:</label>
                        <button class="btn btn-primary" id="filterCommentsbtn"><i class="fas fa-arrow-alt-circle-down"></i></button>
                    </div>
                    <div id="filterPurchases" class="col-6 col-lg-2">
                        <label for="categoryId" class=" h4 mb-0">Purchases:</label>
                        <button class="btn btn-primary" id="filterPurchasesBtn"><i class="fas fa-arrow-alt-circle-down"></i></button>
                    </div>
                    <div id="filterName" class="col-6 col-lg-2">
                        <form class="col-12 col-lg-auto mb-3 mb-0 me-lg-3" role="search" id="navSearchForm" method="post">
                            <input type="search" name="search" id="searchFilter" class="form-control searchInputNav" placeholder="Search by name..." aria-label="Search">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="results">
            <div class="accordion col-12" id="accordionObjects">
                <?php
                    require_once 'view/front/list.php';
                ?>
            </div>
            <script src="view/front/front-scripts/filters.js"></script>
            <script src="view/front/front-scripts/generateItemsFromSession.js"></script>

        </div>
    </div>
    <div>
        <?php
        require 'view/front/footer.php';
        ?>
    </div>
    <script src="view/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- ChartJS -->
    <script src="view/admin/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="view/admin/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="view/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="view/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="view/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="view/admin/plugins/moment/moment.min.js"></script>
    <script src="view/admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="view/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="view/admin/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="view/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
</body>
</html>