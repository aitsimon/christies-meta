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
            </div>
            <div class="form-group">
                <label for="objectPassword">Latitude</label>
                <input type="number" step="0.0001" class="form-control" id="objectPassword" aria-describedby="passwordHelp"
                       placeholder="-82.14" min="-90" max="90" name="objectPassword" value="">
                <small id="emailHelp" class="form-text text-muted">Latitude of the object, optional.</small>
            </div>
            <div class="form-group">
                <label for="objectPassword">Longitude</label>
                <input type="number" step="0.0001" class="form-control" id="objectPassword" aria-describedby="passwordHelp"
                       placeholder="60" min="-180" max="180" required name="objectPassword" value="">
                <small id="emailHelp" class="form-text text-muted">Longitude of the object, optional.</small>
            </div>
            <div class="form-group">
                <label for="object-cat">Category*</label>
                <input list="objectCategory" aria-describedby="catHelp" required class="form-control w-25" id="object-cat" name="object-cat" value="<?php echo $info['object']->getCatId()?>">
                <small id="catHelp" class="form-text text-muted">Select one category for the object</small>
                <datalist id="objectCategory">
                    <?php

                        foreach ($info['possibleCategories'] as $role){
                            echo "<option value='".$role."'>";
                        }
                    ?>
                </datalist>

            </div>
            <div class="form-group">
                <label for="objectTokens">Price*</label>
                <input type="number" step="any" required class="form-control" id="objectTokens" aria-describedby="tokensHelp"
                       placeholder="123890.930" name="objectTokens" value="">
                <small id="tokensHelp" class="form-text text-muted">Amount of tokens of the object</small>
            </div>
            <div class="form-group">
                <label for="objectTelph">Telephone*</label>
                <input type="text" required class="form-control" id="objectTelph" aria-describedby="objectTelph"
                       placeholder="+34 999 999 999" name="objectTelph" value="">
                <small id="objectTelph" class="form-text text-muted">Telephone number of the object with international prefix.</small>
            </div>
           <div class="form-group mt-3">
               <button type="submit" name="edit" class="btn-lg btn-primary mr-5 bt-fo" value="edit">Edit</button>
               <button type="submit" name="delete" class="btn-lg btn-danger ml-5 form-buttons" value="delete">Delete</button>
           </div>
        </form>
    </div>
</section>
<script type="text/javascript" src="../back-scripts/check-objects.js">