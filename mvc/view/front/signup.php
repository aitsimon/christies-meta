<div class="container  d-flex align-items-center justify-content-center">
    <div id="formLogin">
        <form class="row g-3" method="post" action="./index.php/signup/process">
            <div class="form-group">
                <label for="userEmail" class="form-label">Email</label>
                <input type="email" class="form-control w-50" id="userEmail" placeholder="user@mail.com" name="userEmail">
                <small></small>
            </div>
            <div class="form-group">
                <label for="userPassword" class="form-label ">Password</label>
                <input type="password" class="form-control w-50" placeholder="*************" id="userPassword" name="userPassword">
                <small></small>
            </div>
            <div class="form-group">
                <label for="userRol" class="form-label">Role</label>
                <input type="text" class="form-control w-25 is-valid" name="userRol" id="userRol" value="user" readonly>
                <small></small>
            </div>
            <div class="form-group">
                <label for="userTelph" class="form-label">Telephone Number</label>
                <input type="text" class="form-control w-50"  placeholder="+34 678890890" id="userTelph" name="userTelph">
                <small></small>
            </div>
            <div class="form-group">
                <?php
                if(isset($_SESSION['error-message-front'])){
                    echo "<small style='color:red'>".$_SESSION['error-message-front']."</small>";
                };
                ?>
            </div>
            <div>
                <button type="submit" name="signup" id="signup" class="btn btn-primary">Sign up</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="view/front/front-scripts/signup-check.js">