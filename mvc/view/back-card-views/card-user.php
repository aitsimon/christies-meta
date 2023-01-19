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
        <form class="container" method="post" action="./../../../mvc/index.php/admin/dashboard/users/process">
            <input type="hidden" id="userId" name="userId" value="<?php echo $info['user']->getUserId() ?>">
            <div class="form-group">
                <label for="userEmail">Email</label>
                <input type="email" class="form-control" id="userEmail" readonly aria-describedby="emailHelp"
                       placeholder="user@mail.com" required name="userEmail" value="<?php echo $info['user']->getEmail() ?>">
            </div>
            <div class="form-group">
                <label for="userPassword">Password*</label>
                <input type="password" class="form-control" id="userPassword" aria-describedby="passwordHelp"
                       placeholder="**********" required name="userPassword" value="<?php echo $info['user']->getPassword() ?>">
                <small id="emailHelp" class="form-text text-muted">Password of the user</small>
            </div>
            <div class="">
                <label for="user-rol">Rol*</label>
                <input list="userRol" aria-describedby="rolHelp" required class="form-control w-25" id="user-rol" name="user-rol" value="<?php echo $info['user']->getRol()?>">
                <small id="rolHelp" class="form-text text-muted">Select one role for the user</small>
                <datalist id="userRol">
                    <?php

                        foreach ($info['possibleRoles'] as $role){
                            echo "<option value='".$role."'>";
                        }
                    ?>
                </datalist>

            </div>
            <div class="form-group">
                <label for="userTokens">Tokens*</label>
                <input type="number" step="any" required class="form-control" id="userTokens" aria-describedby="tokensHelp"
                       placeholder="123890.930" name="userTokens" value="<?php echo $info['user']->getTokens() ?>">
                <small id="tokensHelp" class="form-text text-muted">Amount of tokens of the user</small>
            </div>
            <div class="form-group">
                <label for="userTelph">Telephone*</label>
                <input type="text" required class="form-control" id="userTelph" aria-describedby="userTelph"
                       placeholder="+34 999 999 999" name="userTelph" value="<?php echo $info['user']->getTelph() ?>">
                <small id="userTelph" class="form-text text-muted">Telephone number of the user with international prefix.</small>
            </div>
           <div class="form-group mt-3">
               <button type="submit" name="edit" class="btn-lg btn-primary mr-5 bt-fo" value="edit">Edit</button>
               <button type="submit" name="delete" class="btn-lg btn-danger ml-5 form-buttons" value="delete">Delete</button>
           </div>
        </form>
    </div>
</section>
<script type="text/javascript" src="../back-scripts/check-users.js">