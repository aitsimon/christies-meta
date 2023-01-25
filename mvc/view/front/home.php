<link rel="stylesheet" href="view/front/styles/home.css">

<div id="welcome-msg" class="col-12 my-5">
    <h1 class="h1 display-1 text-center py-5">Welcome back to Christies & Meta</h1>
</div>
<div id="main-slider" class="my-5 pb-5">
    <!-- Flickity HTML init -->
    <div class="carousel js-flickity">
        <!-- images from unsplash.com -->
        <?php
        if(!isset($_SESSION['front-userId'])){
            $objectsIds = DBManagerObject::getTop10ObjectsByOverallPopularity('desc');
            $objects = array();
            foreach($objectsIds as $id){
                $objects[] = DBManagerObject::getObjectById($id[0]);
            }
        }else{
            if(count(DBManagerObject::getLast10ObjectsCommentedByUser($_SESSION['front-userId']))>0) {
                $objects = DBManagerObject::getLast10ObjectsCommentedByUser($_SESSION['front-userId']);
            }else{
                $objectsIds = DBManagerObject::getTop10ObjectsByOverallPopularity('desc');
                $objects = array();
                foreach($objectsIds as $id){
                    $objects[] = DBManagerObject::getObjectById($id[0]);
                }
            }
        }
        foreach ($objects as $object){
            echo '<div class="carousel-cell">';
            echo '<a class="text-decoration-none text-center text-white h4 mb-0" href="./index.php/list/'.$object->getObjectId().'"><img src="'.$object->getImg1().'" alt="'.$object->getName().'">'.$object->getName().'</a>';
            echo '</div>';
        }
        ?>
    </div>
</div>
