<div class="container  d-flex align-items-center justify-content-center">
    <?php
    if(isset($_SESSION['error-message-front'])){
        echo "<small style='color:red'>".$_SESSION['error-message']."</small>";
    };
    ?>
    <div id="formLogin">
        <form class="row g-3" method="post" action="">
            <div class="form-group">
                <label for="userEmail" class="form-label">Email</label>
                <input type="email" class="form-control w-50" id="userEmail" name="userEmail">
            </div>
            <div class="form-group">
                <label for="userPassword" class="form-label ">Password</label>
                <input type="password" class="form-control w-50" id="userPassword" name="userPassword">
            </div>
            <div class="form-group">
                <label for="userRol" class="form-label">Role</label>
                <input type="text" class="form-control w-25" id="userRol" value="user" readonly>
            </div>
            <div class="form-group">
                <label for="userTelph" class="form-label">Telephone Number</label>
                <input type="text" class="form-control w-50" id="userTelph">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Sign up</button>
            </div>
        </form>
    </div>
</div>