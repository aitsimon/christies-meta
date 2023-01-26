<link rel="stylesheet" href="view/front/styles/loginForm.css">
    <div id="formLogin" class=" d-flex align-items-center justify-content-center align-items-center rounded">
        <form class="row g-3 mx-auto" method="post" action="./index.php/login/process">
            <div class="form-group my-2 mx-2">
                <label for="userEmail" class="form-label h4">Email</label>
                <input type="email" maxlength="25" class="form-control w-100" id="userEmail" placeholder="user@mail.com" name="userEmail">
                <small></small>
            </div>
            <div class="form-group my-2 mx-2">
                <label for="userPassword" class="form-label h4">Password</label>
                <input type="password" maxlength="35" class="form-control w-100" placeholder="*************" id="userPassword" name="userPassword">
                <small></small>
            </div>
            <div class="form-group my-2 mx-2">
                <?php
                if(isset($_SESSION['error-message-front'])){
                    echo "<small style='color:red'>".$_SESSION['error-message-front']."</small>";
                };
                ?>
            </div>
            <div class="form-group d-flex align-items-center justify-content-center">
                <button type="submit" name="login" id="login" class="btn btn-primary btn-lg">Log in</button>
            </div>
        </form>
    </div>
<script type="text/javascript" src="view/front/front-scripts/login-check.js"></script>