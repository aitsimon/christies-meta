<link rel="stylesheet" href="view/front/styles/product.css">

<div id="productWrapper" class="d-flex flex-column justify-content-md-center align-items-center ">
    <div id="productInfo" class="col-12 mt-5 d-flex flex-column flex-md-row justify-content-md-around">
        <div id="productSlider" class="container-md mb-5 mb-md-0 col-xs-12 col-md-5  justify-content-md-start">
            <!-- Flickity HTML init -->
            <div class="carousel" data-flickity='{ "lazyLoad": 1 }'>
                <?php
                $obj = $info['object'];

                echo '<div class="carousel-cell">';
                echo '<img class="carousel-cell-image" data-flickity-lazyload="'. $obj->getImg1() .'" />';
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
                                    if(!$score){
                                        $score = 0;
                                    }
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
                if(isset($_SESSION['front-login'])){
                echo '<div class="d-flex justify-content-around my-5 my-md-3 align-items-center col-12">';
                    echo '<span class="h4 price-label mb-0 text-white border rounded p-1">'.$info['object']->getPrice().' ₣</span>';
                    echo '<a class="" href="./index.php/list/buy/'.$info['object']->getObjectId().'"><button class="btn btn-primary d-flex flex-row justify-content-between align-items-center text-white"><span class="me-4 h4 mt-0 mb-0">Buy</span><i class="fas fa-cart-plus fa-lg"></i></button></a>';
                    echo '</div>';
                if(isset($_SESSION['error-message-purchase'])){
                    echo '<span class="text-danger">'.$_SESSION['error-message-purchase'].'</span>';
                }
            }else{
                    echo '<div class="d-flex justify-content-around my-5 my-md-3 align-items-center col-12">';
                    echo '<span class="h4 price-label mb-0 text-white border rounded p-1">'.$info['object']->getPrice().' ₣</span>';
                    echo '</div>';

                }

            ?>
        </div>
    </div>
    <div id="productComments" class="d-flex flex-column container mt-5 ">
        <div class="d-flex flex-row justify-content-start align-items-center my-5 my-md-3">
            <h2 class="me-2">Comments</h2>
            <button class="btn btn-primary" <?php
            $check = true;
            foreach ($info['commentsOfObject'] as $comment){
                if(!isset($_SESSION['front-login'])||$comment->getUserId()==$_SESSION['front-userId']){
                    $check = false;
                    break;
                }
            }
            if(!$check){
                echo 'disabled';
            }
            ?> data-bs-toggle="modal" data-bs-target="#commentForm">
                <i class="fas fa-comment"></i>
            </button>
            <div class="modal fade" id="commentForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Insert a new comment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="index.php/list/comment" method="post">
                                <input type="hidden" name="commentUserId" value="<?php echo $_SESSION['front-userId']?>">
                                <input type="hidden" name="commentObjectId" value="<?php echo $info['object']->getObjectId()?>">
                                <div class="form-group d-flex flex-column">
                                    <label for="commentContent">Comment text: </label>
                                    <textarea class="mt-1" name="commentContent" id="commentContent" cols="30" rows="10" placeholder="Write your comment here.."></textarea>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <button type="submit" class="btn btn-lg mt-2 btn-primary" data-bs-dismiss="modal">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        foreach ($info['commentsOfObject'] as $comment) {
            echo '<div class=" review d-flex flex-row py-2 mb-2 px-1 justify-content-center align-items-center flex-wrap border border-dark rounded">';
                    echo '<div class="d-flex flex-row col-12 justify-content-center justify-content-md-start align-items-center">
                              <img class="" width="50" height="50" src="https://cdn.pixabay.com/photo/2021/06/07/13/45/user-6318003__340.png">
                              <span class="col-6 col-md-9">'.(DBManagerUsers::getUserById($comment->getUserId()))->getEmail().'</span>';
                              echo '<span class="col-3 col-md-2 text-black-50">'.$comment->getDate().'</span>';
                     echo '</div>';
                    echo '<div class="col-12 d-flex flex-row justify-content-start col-12">';
                        echo '<span class="col-12">'.$comment->getContent().'</span>';
                    echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>
