<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
    }

</style>


<?php
// Assuming $con is your database connection
$q = mysqli_query($con, "SELECT * FROM doctor_user WHERE status = 1");
$r = mysqli_fetch_assoc($q);

$user_name = $r["user_name"];
$user_about = $r["user_about"];

  // Calculate the current year
    $current_year = date('Y');

    // Assuming 20 is the initial year of experience
    $start_year_of_experience = 2019; // Changed to a valid year

    // Calculate the years of experience based on the current year
    $years_of_experience = $current_year - $start_year_of_experience;


?>
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <h2 class="mb-lg-3 mb-3">Meet <?php echo $user_name; ?></h2>
                <p style="text-align: justify;"><?php echo $user_about; ?></p>
            </div>
            <div class="col-lg-4 col-md-5 col-12 mx-auto">
                <div class="featured-circle bg-white shadow-lg d-flex justify-content-center align-items-center">
                    <p class="featured-text"><span class="featured-number"><?php echo $years_of_experience; ?>+</span> Years<br> of Experience</p>
                </div>
            </div>
        </div>
    </div>


    <div class="container pt-5 mb-5 col-12">
        <h5 class="mb-lg-4 text-center p-2 shadow-lg mb-3">Post Categories</h5>

        <div class="row">
            <div class="col-lg-3 col-6 mb-3">
                <a href="<?php echo $site_url; ?>/blood-cancer/" class="text-decoration-none">
                    <div class="box box1 d-flex justify-content-center align-items-center ml-2 shadow-lg rounded-lg">
                        <div class="pb-2 pt-2 text-center">
                            <div class="stat_title" style="font-size: 17px"><b>Blood Cancer</b></div>
                            <img src="<?php echo $site_url; ?>/images/blood-cancer.png" width="80" height="80" class="img-fluid">
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-6 mb-3">
                <a href="<?php echo $site_url; ?>/thalassemia/" class="text-decoration-none">
                    <div class="box box2 d-flex justify-content-center align-items-center ml-2 shadow-lg rounded-lg">
                        <div class="pb-2 pt-2 text-center">
                            <div class="stat_title" style="font-size: 17px"><b>Thalassemia</b></div>
                            <img src="<?php echo $site_url; ?>/images/thalassemia.png" width="80" height="80" class="img-fluid">
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-6 mb-3">
                <a href="<?php echo $site_url; ?>/hemophilia/" class="text-decoration-none">
                    <div class="box box4 d-flex justify-content-center align-items-center ml-2 shadow-lg rounded-lg">
                        <div class="pb-2 pt-2 text-center">
                            <div class="stat_title" style="font-size: 17px"><b>Hemophilia</b></div>
                            <img src="<?php echo $site_url; ?>/images/hemophilia.png" width="80" height="80" class="img-fluid">
                        </div>                  
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-6 mb-3">
                <a href="<?php echo $site_url; ?>/anemia/" class="text-decoration-none">
                    <div class="box box3 d-flex justify-content-center align-items-center ml-2 shadow-lg rounded-lg">
                        <div class="pb-2 pt-2 text-center">
                            <div class="stat_title" style="font-size: 17px"><b>Anemia</b></div>
                            <img src="<?php echo $site_url; ?>/images/anemia.png" width="80" height="80" class="img-fluid">
                        </div>                  
                    </div>
                </a>
            </div>

        </div>
    </div>


    <div class="container pt-5 mb-5 col-12">
        <h5 class="mb-lg-4 text-center p-2 shadow-lg mb-3">Opening Hours</h5>
        <table class="shadow-lg">
            <tr>
                <th class="text-center">Day of Week</th>
                <th class="text-center">Start Time</th>
                <th class="text-center">End Time</th>
                <th class="text-center">Notes</th>
            </tr>
            <?php
                $qt = mysqli_query($con, "SELECT * FROM doctor_timetable WHERE status = 1");
                while($rt = mysqli_fetch_assoc($qt)) {
                    $day_of_week = $rt["day_of_week"];
                    $start_time = $rt["start_time"];
                    $end_time = $rt["end_time"];
                    $notes = $rt["notes"];
            ?>
            <tr>
                <td class="text-center"><?php echo $day_of_week; ?></td>
                <td class="text-center"><?php echo $start_time; ?></td>
                <td class="text-center"><?php echo $end_time; ?></td>
                <td class="text-center"><?php echo $notes; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>