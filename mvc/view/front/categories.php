<link rel="stylesheet" href="view/front/styles/categories.css">
<div>
    <div id="filters">
        <div class="container">
            <div class="row pt-5">
                <div class="col-12">
                    <h3 class="text-uppercase mb-4">Categories</h3>
                </div>
            </div>
            <div class="container d-flex flex-row flex-wrap justify-content-around align-items-center">
                <div class="col-6 col-md-4 d-flex flex-row  align-items-center">
                    <label for="categoryName " class=" h5 mb-0 me-3">Name:</label>
                    <input type="text" id="filterCategoryName">
                </div>
                <div class="col-6 col-md-4 d-flex flex-row align-items-center">
                    <label for="categoryDescription" class=" h5 mb-0 me-3">Description:</label>
                    <input type="text" id="filterCategoryDescription">
                </div>
                <div class="col-4 col-md-3">
                    <label for="categoryPopularity" class=" h5 mb-0">Score:</label>
                    <button class="btn btn-primary" id="filterPopularityBtn"><i class="fas fa-arrow-alt-circle-down"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div id="categories">
            <div class="row justify-content-center" id="divCards">
                <?php
                foreach ($info['categories'] as $category) {
                    echo '<div class="btn cardCat text-decoration-none col-lg-6 d-flex flex-wrap my-5 align-items-around">';
                            echo '<input type="hidden" name="idCat" value="'.$category->getCatId().'" />';
                            echo '<div class="card">';
                                echo '<img src="'.$category->getImg().'" >';
                                echo '<div class="card-body d-flex flex-column">';
                                    echo '<h5 class="card-title text-dark text-uppercase text-start">'.$category->getName().'</h5>';
                                    echo '<p class="card-text text-secondary mb-4">'.$category->getDescription().'</p>';
                                echo '</div>';
                            echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script src="view/front/front-scripts/categoryRedirect.js" ></script>
