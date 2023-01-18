<?php
$url = '';
if(!isset($_SERVER['HTTP_REFERER'])) {
    $_SERVER['HTTP_REFERER']='http://localhost/christies-meta/mvc/index.php/admin/';
}
$component = explode('/', $_SERVER['HTTP_REFERER']);
for ($i = 0, $iMax = count($component); $i < $iMax; $i++) {
    if ($component[$i] !== 'index.php') {
        if ($component[$i] === 'admin') {
            $url .= 'view/';
            $url .= $component[$i] . '/';
            break;
        }
        $url .= $component[$i] . '/';
    }
}
?>
<section class="content mb-3">
    <div class="container-fluid">
        <?php
        if(isset($_SESSION['error-message'])){
            echo "<small style='color:red'>".$_SESSION['error-message']."</small>";
        };
        ?>
        <form class="container" method="post" action="./../../../mvc/index.php/admin/dashboard/categories/process">
            <input type="hidden" id="categoryId" name="categoryId" value="<?php echo $info['category']->getCatId() ?>">
            <div class="form-group">
                <label for="categoryName">Name</label>
                <input type="text" class="form-control" id="categoryName" aria-describedby="nameHelp"
                       placeholder="virtual_name" required name="categoryName" value="<?php echo $info['category']->getName() ?>">
                <small id="nameHelp" class="form-text text-muted">Name of the category</small>

            </div>
            <div class="form-group">
                <label for="categoryDescription">Password*</label>
                <input type="password" class="form-control" id="categoryDescription" aria-describedby="descriptionHelp"
                       placeholder="Lorem ipsum..." required name="categoryDescription" value="<?php echo $info['category']->getDescription() ?>">
                <small id="descriptionHelp" class="form-text text-muted">Description of the category</small>
            </div>
            <div class="">
                <label for="categoryImg">Img*</label>
                <input type="file" name="categoryImg" accept="image/jpeg" aria-describedby="imgHelp" required class="form-control w-25" id="category-rol" name="category-rol" value="<?php echo $info['category']->getRol()?>">
                <small id="imgHelp" class="form-text text-muted">Image for the category</small>
            </div>
            <div class="form-group mt-3">
                <button type="submit" name="edit" class="btn-lg btn-primary btn-disa mr-5 " value="edit">Edit</button>
                <button type="submit" name="delete" class="btn-lg btn-danger ml-5 form-buttons" value="delete">Delete</button>
            </div>
        </form>
    </div>
</section>
<script type="text/javascript" src="../back-scripts/check-category.js">