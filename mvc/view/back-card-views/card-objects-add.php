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
        <form class="container" enctype="multipart/form-data" method="post" action="./../../../mvc/index.php/admin/dashboard/products/process">
            <input type="hidden" id="objectId" name="objectId" value="">
            <div class="form-group">
                <label for="objectName">Name*</label>
                <input type="text" class="form-control vfI" id="objectName" aria-describedby="emailHelp"
                       placeholder="object name" maxlength="15" required name="objectName" value="">
                <small id="nameHelp" class="form-text text-muted">Name of the object</small>
            </div>
            <div class="form-group">
                <label for="objectLatitude">Latitude</label>
                <input type="number" step="any" class="form-control" id="objectLatitude" aria-describedby="latitudeHelp"
                       placeholder="-82.14" maxlength="10" min="-90" max="90" name="objectLatitude" value="">
                <small id="latitudeHelp" class="form-text">Latitude of the object, optional.</small>
            </div>
            <div class="form-group">
                <label for="objectLongitude">Longitude</label>
                <input type="number" step="any" class="form-control" id="objectLongitude" aria-describedby="longitudeHelp"
                       placeholder="60" maxlength="10" min="-180" max="180"  name="objectLongitude" value="">
                <small id="longitudeHelp" class="form-text">Longitude of the object, optional.</small>
            </div>
            <div class="form-group">
                <label for="objectPrice">Price*</label>
                <input type="number" step="any" class="form-control vfI" id="objectPrice" aria-describedby="priceHelp"
                       placeholder="60" maxlength="12" required name="objectPrice" value="">
                <small id="priceHelp" class="form-text text-muted">Price of the object.</small>
            </div>
            <div class="form-group">
                <label for="object-cat">Category*</label>
                <input list="objectCategory" aria-describedby="catHelp" required class="form-control w-25" id="object-cat" name="object-cat" value="">
                <small id="catHelp" class="form-text">Select one category for the object</small>
                <datalist id="objectCategory">
                    <?php
                    foreach ($info['possibleCategories'] as $category){
                        echo "<option value='".$category."'>";
                    }
                    ?>
                </datalist>
            </div>
            <div class="form-group">
                <label for="objectImg1">Principal Image*</label>
                <input type="file"  name="objectImg1" required onchange="previewFile(this,0)" accept="image/*" aria-describedby="imgHelp" class="form-control" id="objectImg1" value="">
                <div class="card container col-4">
                    <img src="" alt="Image of the product" id="previewImg0" class="prev-img img-fluid">
                </div>
            </div>
            <div class="form-group">
                <label for="objectImg2">Additional Image 2</label>
                <input type="file" name="objectImg2" onchange="previewFile(this,1)" accept="image/*" aria-describedby="imgHelp2" class="form-control" id="objectImg2" value="">
                <div class="container col-4">
                    <img src="" alt='Image of the product' id='previewImg1' class="prev-img img-fluid">
                </div>
            </div>
            <div class="form-group ">
                <label for="objectImg3">Additional Image 3</label>
                <input type="file" name="objectImg3" onchange="previewFile(this,2)" accept="image/*" aria-describedby="imgHelp" class="form-control" id="objectImg3" value="">
                <div class="container col-4">
                    <img alt='Image of the product' id='previewImg2' class="prev-img img-fluid">
                </div>
            </div>
            <div class="form-group mt-3">
                <button type="submit" name="add" class="btn-lg btn-primary mr-5 bt-fo" value="add">Add</button>
            </div>
        </form>
    </div>
</section>
<script type="text/javascript" src="../back-scripts/check-object.js">