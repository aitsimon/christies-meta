<link rel="stylesheet" href="view/front/styles/list.css">
<div id="list">
    <div id="filters" class="container">
        <div class="filter col-3 d-flex ">
            <label for="categoryId" class="mx-3 h4">Category:</label>
            <select id="categoryId">
                <?php
                /** @var Category $info */
                foreach ($info['possibleCategories'] as $category){
                    echo "<option value='".$category[0]."'>".$category[1]."</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div id="results" class=" d-flex justify-content-center align-items-center  my-5">
        <div class="accordion col-12" id="accordionObjects"><?php
            if(isset($_SESSION['objects-to-show'])){
                foreach ($_SESSION['objects-to-show'] as $object){
                    echo '<div class="accordion-item">';
                        echo '<h2 class="accordion-header col-12 w-100" id="heading'.$object->getObjectId().'">';
                            echo '<button class="btn collapsed py-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$object->getObjectId().'" >';
                                echo '<div class="products d-flex justify-content-around align-items-center w-100 col-12">';
                                    echo '<div class="col-4 h-100 pl-2 productsNamePrice d-flex flex-column flex-wrap align-items-center justify-content-around">';
                                        echo '<h4 class="h4 my-3 text-break">'.$object->getName().'</h4>';
                                        echo '<a class="btn price-tag my-3">'.$object->getPrice().'₣</a>';
                                    echo '</div>';
                                    echo '<img class="col-8" src="'.$object->getImg1().'">';
                                echo '</div>';
                            echo '</button>';
                        echo '</h2>';
                        echo '<div id="collapse'.$object->getObjectId().'" class="accordion-collapse collapse" aria-labelledby="heading'.$object->getObjectId().'" data-bs-parent="#accordionObjects">';
                            echo '<div class="accordion-body d-flex justify-content-center align-content-center">';
                                echo '<a href="./index.php/list/'.$object->getObjectId().'" class="btn price-label text-white mb-4">View Product <i class="fas fa-object-group"></i></a>';
                            echo '</div>';
                        echo '</div>';
                    echo'</div>';
                }
            }
        ?></div>
    </div>
</div>