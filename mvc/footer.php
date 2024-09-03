<style>
    .large-icon {
        font-size: 2rem; /* Adjust this value to increase/decrease the size */
        display: inline-block;
        width: 3rem; /* Ensure the width matches the font-size for consistency */
        height: 3rem; /* Ensure the height matches the font-size for consistency */
    }
    .site-footer {
        background-color: red;
        color: white; /* Ensure the text is readable against the red background */
        padding: 20px; /* Add padding if needed */
    }
    .site-footer a {
        color: white; /* Ensure links are readable */
        text-decoration: none; /* Optional: Remove underline from links */
    }

    .site-footer a:hover {
        color: black;
    }
</style>


<footer class="site-footer section-padding" id="contact">
    <section>
        <div class="container">
            <div class="row">

                <?php
                    $q = mysqli_query($con, "SELECT user_mail, user_hospital FROM doctor_user WHERE status = 1");
                    $r = mysqli_fetch_assoc($q);
                    $user_mail = $r["user_mail"];
                    $user_hospital = $r["user_hospital"];
                ?>

                <div class="col-lg-2 col-md-6 col-12 my-4 my-lg-0 me-auto text-center">
                    <h5 class="mb-lg-4 mb-3">Contact</h5>

                    <p><a href="mailto:<?php echo $user_mail; ?>"><?php echo $user_mail; ?></a></p>

                    <p class="text-white"><?php echo $user_hospital; ?></p>
                </div>

                <div class="col-lg-5 col-12 pb-5 text-center">
                    <div class="pb-1"><h5 class="mb-lg-4 text-center mb-3">Menu</h5></div>
                    <div class="pb-1"><a href="<?php echo $site_url; ?>">Home</a></div>
                    <div class="pb-1"><a href="<?php echo $site_url; ?>/about/">About</a></div>
                    <div class="pb-1"><a href="<?php echo $site_url; ?>/doctor_appointment/">Doctor Appointment</a></div>
                    <div class="pb-1"><a href="<?php echo $site_url; ?>/contact/">Contact</a></div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 ms-auto text-center">
                    <h5 class="mb-lg-4 mb-2">Socials</h5>

                    <ul class="social-icon">
                        <li><a href="https://www.facebook.com/profile.php?id=100064170545445&mibextid=JRoKGi" class="social-icon-link bi-facebook large-icon"></a></li>
                        <li><a href="https://www.youtube.com/@Dr.marufhasan4954" class="social-icon-link bi-youtube large-icon"></a></li>
                    </ul>

                    <div>
                        <p class="copyright-text text-white">Dr. Maruf Al Hasan © 2024 ALL RIGHT RESERVED</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
</footer>
