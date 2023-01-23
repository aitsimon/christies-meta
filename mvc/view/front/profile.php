<link rel="stylesheet" href="view/front/styles/list.css">
<div id="profileWrpaper" class="container">
    <div id="userInfo" class=" d-flex flex-column my-5 py-5 justify-content-center align-items-start">
        <h1><?php echo $info['user']->getEmail() ?></h1>
        <span class="text-success h5"><strong
                    class="text-dark">Wallet: </strong><?php echo $info['user']->getTokens() ?> ₣</span>
        <span class="h5"><strong>Telephone: </strong><?php echo $info['user']->getTelph() ?></span>
    </div>
    <div id="userPurchases" class="d-flex flex-column my-5 py-5 justify-content-center align-items-start">
        <h2>Purchased Products: </h2>
        <div id="userPurchasedProducts">
            <?php
            $objectsPurchased = DBManagerObject::getAllPurchasedObjectsByUser($_SESSION['front-userId']);
            if ($objectsPurchased != false) {
                foreach ($objectsPurchased as $object) {
                    echo '<div class="accordion-item">';
                    echo '<h2 class="accordion-header col-12 w-100" id="heading' . $object->getObjectId() . '">';
                    echo '<button class="btn collapsed py-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $object->getObjectId() . '" >';
                    echo '<div class="products d-flex justify-content-around align-items-center w-100 col-12">';
                    echo '<div class="col-4 h-100 pl-2 productsNamePrice d-flex flex-column flex-wrap align-items-center justify-content-around">';
                    echo '<h4 class="h4 my-3 text-break">' . $object->getName() . '</h4>';
                    echo '<a class="btn price-tag my-3">' . $object->getPrice() . '₣</a>';
                    echo '</div>';
                    echo '<img class="col-8" src="' . $object->getImg1() . '">';
                    echo '</div>';
                    echo '</button>';
                    echo '</h2>';
                    echo '<div id="collapse' . $object->getObjectId() . '" class="accordion-collapse collapse" aria-labelledby="heading' . $object->getObjectId() . '" data-bs-parent="#accordionObjects">';
                    echo '<div class="accordion-body d-flex justify-content-center align-content-center">';
                    echo '<a href="./index.php/list/' . $object->getObjectId() . '" class="btn price-label text-white mb-4">View Product <i class="fas fa-object-group"></i></a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
        <div id="userComments" class="col-12">
            <h2>Commented products: </h2>
            <div id="userCommentedProducts" >
                <?php
                $comments = DBManagerComments::getCommentsByUserId($_SESSION['front-userId']);
                if (count($comments) > 0) {
                    foreach ($comments as $comment) {
                        echo '<div class=" review d-flex flex-row  justify-content-center align-items-center flex-wrap border border-dark rounded">';
                            echo '<div class="d-flex flex-row col-12 justify-content-center justify-content-md-start align-items-center">
                                      <img class="" width="50" height="50" src="https://cdn.pixabay.com/photo/2021/06/07/13/45/user-6318003__340.png">
                                      <span class="col-6 col-md-9">' . (DBManagerUsers::getUserById($comment->getUserId()))->getEmail() . '</span>';
                                echo '<span class="col-3 col-md-2 text-black-50">' . $comment->getDate() . '</span>';
                            echo '</div>';
                            echo '<div class="col-12 d-flex flex-row justify-content-start col-12">';
                                echo '<span class="col-12">' . $comment->getContent() . '</span>';
                            echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div>

    </div>
</div>