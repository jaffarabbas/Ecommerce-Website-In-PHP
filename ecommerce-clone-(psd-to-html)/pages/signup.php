<?php include("header.php") ?>

<?php

include_once("./backend/connecter.php");

$result1 = $operations->getData(Queries::$getAllAccountType);
$result2 = $operations->getData(Queries::$getAllType);

?>


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
                    <form action="./backend/signup_bakend.php" method="POST">
                        <h1>Signup</h1>
                        <?php
                        if (isset($_SESSION['error']) && $_SESSION['error'] != "") {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }elseif(isset($_SESSION['success']) && $_SESSION['success'] != ""){
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        }
                        ?>
                        <div class="act">
                            <p>Create</p>
                            <select name="actype" class="contactInput">
                                <option hidden="true">Select Account</option>
                                <option disabled="disabled" default="true">Select Account</option>
                                <?php
                                foreach ($result1 as $value) {
                                    echo "<option value='" . $value['id'] . "'>" . $value['name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <input name="email" class="contactInput" type="email" placeholder="Email Address"><br>
                        <input name="passowrd" class="contactInput" type="text" placeholder="Password"><br>
                        <input name="repassword" class="contactInput" type="text" placeholder="Re type Password"><br>
                        <input name="firstname" class="contactInput" type="text" placeholder="Firstname"><br>
                        <input name="lastname" class="contactInput" type="text" placeholder="Lastname"><br>
                        <select name="type" class="contactInput">
                            <option hidden="true">Select Type</option>
                            <?php
                            foreach ($result2 as $value) {
                                echo "<option value='" . $value['id'] . "'>" . $value['name'] . "</option>";
                            }
                            ?>
                        </select>
                        <div class="cbi">
                            <input name="termCheck" type="checkbox">&nbsp;
                            <p>By registering you agree our <b><a href="termsandcondition.php">Terms of user</a></b></p>
                        </div>
                        <input type="submit" name="submit" class="btnStyle" value="Signup">
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