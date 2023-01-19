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
        <form class="container" method="post" action="./../../../mvc/index.php/admin/dashboard/objects/process">
            <input type="hidden" id="objectId" name="objectId" value="<?php echo $info['object']->getObjectId() ?>">
            <div class="form-group">
                <label for="objectName">Name*</label>
                <input type="text" class="form-control" id="objectName" aria-describedby="emailHelp"
                       placeholder="object name" required name="objectName" value="<?php echo $info['object']->getName() ?>">
                <small id="nameHelp" class="form-text text-muted">Name of the object</small>

            </div>
            <div class="form-group">
                <label for="objectLatitude">Latitude</label>
                <input type="number" step="any" class="form-control" id="objectLatitude" aria-describedby="latitudeHelp"
                       placeholder="-82.14" min="-90" max="90" name="objectLatitude" value="">
                <small id="latitudeHelp" class="form-text text-muted">Latitude of the object, optional.</small>
            </div>
            <div class="form-group">
                <label for="objectLongitude">Longitude</label>
                <input type="number" step="any" class="form-control" id="objectLongitude" aria-describedby="longitudeHelp"
                       placeholder="60" min="-180" max="180"  name="objectLongitude" value="">
                <small id="longitudeHelp" class="form-text text-muted">Longitude of the object, optional.</small>
            </div>
            <div class="form-group">
                <label for="objectPrice">Price*</label>
                <input type="number" step="any" class="form-control" id="objectPrice" aria-describedby="priceHelp"
                       placeholder="60" min="-180" max="180" required name="objectPrice" value="">
                <small id="priceHelp" class="form-text text-muted">Price of the object.</small>
            </div>
            <div class="form-group">
                <label for="object-cat">Category*</label>
                <input list="objectCategory" aria-describedby="catHelp" required class="form-control w-25" id="object-cat" name="object-cat" value="<?php echo $info['object']->getCatId()?>">
                <small id="catHelp" class="form-text text-muted">Select one category for the object</small>
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
                <input type="file" required name="objectImg1" onchange="previewFile(this,0)" accept="image/*" aria-describedby="imgHelp" class="form-control" id="objectImg1" value="<?php echo $info['object']->getImg1()?>">
                <div class="card">
                    <img src="<?php echo $info['object']->getImg1() ?>" alt="Image of the product" id="previewImg0" class="prev-img">
                </div>
            </div>
            <div class="form-group">
                <label for="objectImg2">Additional Image 2</label>
                <input type="file" name="objectImg2" onchange="previewFile(this,1)" accept="image/*" aria-describedby="imgHelp2" class="form-control" id="objectImg2" value="<?php if($info['object']->getImg2()!=NULL&&$info['object']->getImg2()!=''){echo $info['object']->getImg2();}?>">
                <div class="card">
                    <img src="<?php if($info['object']->getImg2()!=NULL&&$info['object']->getImg2()!=''){echo $info['object']->getImg2();}?>" alt='Image of the product' id='previewImg1' class="prev-img">
                </div>
            </div>
            <div class="form-group">
                <label for="objectImg3">Additional Image 3</label>
                <input type="file" name="objectImg3" onchange="previewFile(this,2)" accept="image/*" aria-describedby="imgHelp" class="form-control" id="objectImg3" value="<?php if($info['object']->getImg3()!=NULL&&$info['object']->getImg3()!=''){echo $info['object']->getImg3();}?>">
                <div class="card">
                    <img <?php if($info['object']->getImg3()!=NULL&&$info['object']->getImg3()!=''){echo "src='".$info['object']->getImg3()."'"; };?> alt='Image of the product' id='previewImg2' class="prev-img">
                </div>
            </div>
           <div class="form-group mt-3">
               <button type="submit" name="edit" class="btn-lg btn-primary mr-5 bt-fo" value="edit">Edit</button>
               <button type="submit" name="delete" class="btn-lg btn-danger ml-5 form-buttons" value="delete">Delete</button>
           </div>
        </form>
    </div>
</section>
<script type="text/javascript" src="../back-scripts/check-object.js">