<link rel="stylesheet" href="view/front/styles/contact.css">
<div class="" id="contactForm">
    <form method="post" action="./index.php/contact/process" name="contactForm" class="d-flex flex-column justify-content-center align-items-center form-floating">
        <div class="d-flex flex-column justify-content-center align-items-start col-10">
            <div class="form-floating mt-5 mb-2 col-10 col-md-6">
                <input type="text" class="form-control col-8 col-md-6" name="userName" id="userName" maxlength="20" placeholder="Your name" required>
                <label for="userName">Name</label>
                <div class="invalid-feedback">
                    Please provide a valid name.
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="form-floating col-10 my-2 col-md-6">
                <input type="email" class="form-control" name="userEmail" id="userEmail" maxlength="40" placeholder="example@mail.com" required>
                <label for="userEmail">Email</label>
                <div class="invalid-feedback">
                    Please provide a valid email. Example: example@example.com .
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="form-floating mt-2 col-10">
                <textarea class="form-control" name="userComment" maxlength="400" placeholder="Leave a comment here" id="userComment" required></textarea>
                <label for="userComment">Comments</label>
                <div class="invalid-feedback">
                    Please enter your comment above.
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="form-floating col-10 my-2 col-md-6">
                <div class="g-recaptcha" data-sitekey="6LfhaigkAAAAAMoFCCcR16EBvg4gL2GMgtrqPEB2"></div>
            </div>
            <?php
                if(isset($_SESSION['error-message'])){
                    echo '<div class="msgError text-danger">'.$_SESSION['error-message'].'</div>';
                }
            ?>
            <div class="d-flex justify-content-center align-items-center my-5">
                <button class="btn btn-lg btn-primary" id="submitBtn" type="submit">Submit form</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="view/front/front-scripts/contact-check.js"></script>