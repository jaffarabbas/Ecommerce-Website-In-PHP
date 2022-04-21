<?php include("header.php") ?>

<!-- banner start -->
<section class="login_banner">
    <div class="container">
        <div class="row mini_banner_row">
            <div class="col-md-6 col-md-offset-3">
                <div class="mini_banner_center text-center">
                    <h1>Signup</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner end -->

<!-- product start -->
<section class="authPage">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                <div class="auth">
                    <form>
                        <h1>Signup</h1>
                        <div class="act">
                            <p>Create</p>
                            <select class="contactInput">
                                <option hidden="true">Select Account</option>
                                <option disabled="disabled" default="true">Select Account</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <input class="contactInput" type="email" placeholder="Email Address"><br>
                        <input class="contactInput" type="text" placeholder="Password"><br>
                        <input class="contactInput" type="text" placeholder="Re type Password"><br>
                        <input class="contactInput" type="text" placeholder="Firstname"><br>
                        <input class="contactInput" type="text" placeholder="Lastname"><br>
                        <select class="contactInput">
                            <option hidden="true">Select Type</option>
                            <option disabled="disabled" default="true">Select Type</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <div class="cbi">
                            <input type="checkbox">&nbsp;
                            <p>By registering you agree our <b><a href="termsandcondition.php">Terms of user</a></b></p>
                        </div>
                        <input type="submit" class="btnStyle" value="Signup">
                        <br>
                        <br>
                        <a href="login.php">Already have a account ?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product end -->

<?php include("footer.php") ?>