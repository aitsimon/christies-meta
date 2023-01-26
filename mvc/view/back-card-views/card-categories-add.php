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
            <input type="hidden" id="categoryId" name="categoryId" value="<?php echo DBManagerCategories::getNewMaxId() ?>">
            <div class="form-group">
                <label for="categoryName">Name</label>
                <input type="text" class="form-control" id="categoryName" aria-describedby="nameHelp"
                       placeholder="virtual_name" maxlength="20" required name="categoryName" value="">
                <small id="nameHelp" class="form-text text-muted">Name of the category</small>
            </div>
            <div class="form-group">
                <label for="categoryDescription">Description*</label>
                <textarea name="categoryDescription" maxlength="600" class="form-control" id="categoryDescription" cols="30" rows="10"></textarea>
                <small id="descriptionHelp" class="form-text text-muted">Description of the category</small>
            </div>
            <div class="form-group">
                <label for="categoryImg">Img*</label>
                <input type="file" required name="categoryImg" onchange="previewFile(this)" accept="image/*" aria-describedby="imgHelp" class="form-control" id="categoryImg" value="">
                <div class="card">
                    <img src="" id="previewImg">
                </div>
            </div>
            <div class="form-group mt-3">
                <button type="submit" name="add" class="btn-lg btn-primary mr-5 bt-fo" value="add">Add</button>
            </div>
        </form>
    </div>
</section>
<script type="text/javascript" src="../back-scripts/check-category.js">