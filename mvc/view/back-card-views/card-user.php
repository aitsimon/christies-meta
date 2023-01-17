<?php

var_dump($info);
$roles= $info['possibleRoles'];
?>
<section class="content mb-3">
    <div class="container-fluid">
        <form class="container" method="post" action="./card-form">
            <div class="form-group">
                <label for="userEmail">Email</label>
                <input type="email" class="form-control" id="userEmail" readonly aria-describedby="emailHelp"
                       placeholder="user@mail.com" name="userEmail" value="<?php echo $info['user']->getEmail() ?>">
                <small id="emailHelp" class="form-text text-muted">Unique email adress of every user</small>
            </div>
            <div class="form-group">
                <label for="userEmail">Password</label>
                <input type="password" class="form-control" readonly id="userPassword" aria-describedby="passwordHelp"
                       placeholder="**********" name="userPassword" value="<?php echo $info['user']->getPassword() ?>">
                <small id="emailHelp" class="form-text text-muted">Password of the user</small>
            </div>
            <div class="">
                <label for="user-rol">Rol</label>
                <input list="userRol" class="form-control w-25" id="user-rol" name="user-rol" value="<?php echo $info['user']->getRol()?> ">
                <datalist id="userRol">
                    <?php
                        foreach ($info['possibleRoles'] as $role){
                            echo "<option value='".$role."'>";
                        }
                    ?>
                </datalist>
            </div>
            <div class="form-group">
                <label for="userTokens">Tokens</label>
                <input type="number" class="form-control" id="userTokens" aria-describedby="tokensHelp"
                       placeholder="123890.930" name="userTokens" value="<?php echo $info['user']->getTokens() ?>">
                <small id="tokensHelp" class="form-text text-muted">Amount of tokens of the user</small>
            </div>
            <div class="form-group">
                <label for="userTelph">Telephone</label>
                <input type="text" class="form-control" id="userTelph" aria-describedby="userTelph"
                       placeholder="+34 999 999 999" name="userTelph" value="<?php echo $info['user']->getTelph() ?>">
                <small id="userTelph" class="form-text text-muted">Telephone number of the user</small>
            </div>
           <div class="form-group mt-3">
               <button type="submit" name="btn-edit" class="btn-lg btn-primary mr-5" value="edit">Edit</button>
               <button type="submit" name="btn-delete" class="btn-lg btn-danger ml-5" value="delete">Delete</button>
           </div>

        </form>
    </div>
</section>