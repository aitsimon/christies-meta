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
        <form class="container" enctype="multipart/form-data" method="post" action="./../../../mvc/index.php/admin/dashboard/categories/process">
            <input type="hidden" id="categoryId" name="categoryId" value="<?php echo $info['category']->getCatId() ?>">
            <div class="form-group">
                <label for="categoryName">Name</label>
                <input type="text" class="form-control" id="categoryName" aria-describedby="nameHelp"
                       placeholder="virtual_name" required name="categoryName" value="<?php echo $info['category']->getName() ?>">
                <small id="nameHelp" class="form-text text-muted">Name of the category</small>
            </div>
            <div class="form-group">
                <label for="categoryDescription">Description*</label>
                <textarea name="categoryDescription"  class="form-control" id="categoryDescription" cols="30" rows="10"><?php echo $info['category']->getDescription() ?></textarea>
                <small id="descriptionHelp" class="form-text text-muted">Description of the category</small>
            </div>
            <div class="form-group">
                <label for="categoryImg">Image*</label>
                <input type="file" name="categoryImg" onchange="previewFile(this)" accept="image/*" aria-describedby="imgHelp" class="form-control" id="categoryImg" value="<?php echo $info['category']->getImg()?>">
                <div class="card">
                    <img src="<?php echo $info['category']->getImg() ?>" alt="Image of the category" id="previewImg">
                </div>
            </div>
            <div class="form-group">
                <label for="category-Upper">Category Upper Id*</label>
                <input type="hidden" id="categoryImgR" name="categoryImgR" value="<?php echo $info['category']->getImg() ?>">
                <input list="categoryUpper" aria-describedby="categoryUpperHelp" required class="form-control w-25" id="category-Upper" name="category-Upper" value="<?php echo $info['category']->getCatId()?>">
                <datalist id="categoryUpper">
                <?php
                    foreach ($info['possibleCategories'] as $possibleCategory) {
                            echo "<option value='".$possibleCategory."'>";
                        }
                ?>
                </datalist>
            </div>
            <div class="form-group mt-3">
                <button type="submit" name="edit" class="btn-lg btn-primary btn-disa mr-5 bt-fo" value="edit">Edit</button>
                <button type="submit" name="delete" class="btn-lg btn-danger ml-5 form-buttons" value="delete">Delete</button>
            </div>
        </form>
    </div>
</section>
<script type="text/javascript" src="../back-scripts/check-category.js">