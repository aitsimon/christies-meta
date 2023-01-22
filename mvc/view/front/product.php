<link rel="stylesheet" href="view/front/styles/product.css">
<!-- CSS Flickity-->
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<!-- JavaScript Flickity-->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

<div id="productWrapper" class="d-flex flex-column justify-content-center align-items-center ">
    <div id="productInfo" class="col-12 d-flex flex-column flex-md-row justify-content-md-around">
        <div id="productSlider" class="container-md mb-5 col-xs-12 col-md-5  justify-content-md-start">
            <!-- Flickity HTML init -->
            <div class="carousel" data-flickity='{ "lazyLoad": 1 }'>
                <?php
                $obj = $info['object'];
                echo '<div class="carousel-cell">';
                echo '<img class="carousel-cell-image"
                         data-flickity-lazyload="' . $obj->getImg1() . '" />';
                echo '</div>';
                if ($obj->getImg2() != null) {
                    echo '<div class="carousel-cell">';
                    echo '<img class="carousel-cell-image"
                         data-flickity-lazyload="' . $obj->getImg2() . '" />';
                    echo '</div>';
                }
                if ($obj->getImg3() != null) {
                    echo '<div class="carousel-cell">';
                    echo '<img class="carousel-cell-image"
                         data-flickity-lazyload="' . $obj->getImg2() . '" />';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <div id="productSpecs" class="container  col-md-5 ml-lg-5 d-flex flex-column justify-content-between">
            <div id="productHeader"
                 class="col-12 container d-flex flex-row  justify-content-start justify-content-md-start align-items-center">
                <h1 class="col-9"><?php
                    echo $info['object']->getName();
                    ?></h1>
                <div class="col-3">
                    <div>
                        <button class="btn btn-dark pe-none">
                            <i class="fas fa-heart fa-lg text-danger"></i>
                            <span class="h4 text-white align-middle m-0">
                                <?php
                                    $score = DBMScore::getScoreProductById($info['object']->getObjectId());
                                    echo $score;
                                ?>
                            </span>
                        </button>

                    </div>
                </div>
            </div>
            <div id="productInfo" class=" container d-flex flex-column align-items-between">
                <?php
                if ($info['object']->getLat() !== null && $info['object']->getLon() !== null) {
                    echo '<p><strong>Latitude: </strong>' . $info['object']->getLat() . '</p>';
                    echo '<p><strong>Longitude: </strong>' . $info['object']->getLon() . '</p>';
                    echo '<p id="objectDescription"><strong>Description: </strong>Lorem ipsum dolor sit amet consectetur adipiscing elit, at imperdiet cum nostra interdum justo, vulputate habitasse iaculis odio nec faucibus. Augue feugiat posuere phasellus quisque urna magnis pulvinar nullam pretium euismod congue, litora ligula fermentum conubia aliquet platea hendrerit ridiculus facilisi curae</p>';
                }
                ?>
            </div>
            <?php
            echo '<div class="d-flex justify-content-center  align-items-center">';
            echo '<button class="btn btn-primary d-flex flex-row justify-content-between align-items-center text-white"><span class="me-4 h4 mt-0 mb-0">Buy</span><i class="fas fa-cart-plus fa-lg"></i></button>';
            echo '</div>';
            ?>
        </div>
    </div>
    <div id="productComments" class="d-flex flex-column container">

        <?php
        foreach ($info['commentsOfObject'] as $comment) {
            echo '<div class="review">';

        }
        ?>
    </div>
</div>
