<?php include("header.php") ?>

<!-- banner start -->
<section class="contact_banner">
    <div class="container">
        <div class="row mini_banner_row">
            <div class="col-md-6 col-md-offset-3">
                <div class="mini_banner_center text-center">
                    <h1>Contact Us</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner end -->

<!-- about start -->
<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="about_side_1">
                            <h3 class="primaryHeading">Contact us</h3>
                            <h1 class="secondaryHeading">Any Query</br>Please Tell Us</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                            if (isset($_SESSION['error']) && $_SESSION['error'] != "") {
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            } elseif (isset($_SESSION['success']) && $_SESSION['success'] != "") {
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                            }
                        ?>
                        <div class="maincontactfeilds">
                            <form action="./backend/contact_backend.php" method="POST"> 
                                <input name="name" class="contactInput" type="text" placeholder="Please enter your name"><br>
                                <input name="email" class="contactInput" type="email" placeholder="Please enter your email address"></br>
                                <div class="minicontactfeilds">
                                    <input name="phone" class="minicontactInput" type="text" placeholder="Please enter your phone">
                                    <input name="address" class="minicontactInput" type="text" placeholder="Please enter your address">
                                </div>
                                <textarea name="message" class="contactInput" placeholder="Please enter your Message" name="" rows="3"></textarea><br>
                                <input name="submit" type="submit" class="btnStyle" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <class class="contact_side_2">
                    <div class="map">
                        <iframe src="https://maps.google.com/maps?q=rizvia&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                </class>
            </div>
        </div>
    </div>
</section>
<!-- about end -->

<?php include("footer.php") ?>