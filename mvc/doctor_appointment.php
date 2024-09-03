<section class="section-padding" id="booking">
    <div class="container">
        <div class="row">
        
            <div class="col-lg-8 col-12 mx-auto">
                <div class="booking-form">
                    
                    <h2 class="text-center mb-lg-3 mb-2">Book an appointment</h2>

                    <?php
                    if(isset($_POST['submit'])){
                        $patient_name       = trim($_POST['name']);
                        $patient_email      = trim($_POST['email']);
                        $patient_phone      = trim($_POST['phone']);
                        $patient_details    = trim($_POST['message']);
                        $add_date           = date('Y-m-d');

                        $err = array();

                        if($patient_name == ""){ 
                            $err[] = "Please type Patient Name";
                        }

                        if($patient_phone == ""){ 
                            $err[] = "Please type Patient Phone";
                        }

                        $n = count($err);

                        if($n > 0){
                            echo "<div class=\"alert alert-danger\" role=\"alert\"><ol>";
                            for($i = 0; $i < $n; $i++){ 
                                echo "<li>".$err[$i]."</li>"; 
                            }
                            echo "</ol></div>";

                        } else { 
                            $query = mysqli_query($con,"INSERT INTO `doctor_appointment` (
                            `patient_id`,
                            `patient_name`,
                            `patient_email`,
                            `patient_phone`,
                            `add_date`,
                            `patient_details`,
                            `status`
                            ) VALUES(
                            NULL, 
                            '$patient_name',
                            '$patient_email',
                            '$patient_phone',
                            '$add_date',
                            '$patient_details',
                            1
                            )"
                            );

                        if ($query) {
                            echo "<div class=\"alert alert-success message\" role=\"alert\">Booking Submitted Successfully!</div>";
                        } else {
                            echo "<div class=\"alert alert-danger message\" role=\"alert\">Sorry!!! Failed to update record! Please Try Again</div>";
                        }

                        }
                    }
                    ?>

                    <form role="form" action="#booking" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Full name" required>
                            </div>

                            <div class="col-lg-6 col-12">
                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>
                            </div>

                            <div class="col-lg-6 col-12">
                                <input type="tel" name="phone" id="phone" pattern="[0-9]{11}" class="form-control" placeholder="Phone: 11 digits only">
                            </div>

                            <div class="col-lg-6 col-12">
                                <input type="date" name="date" id="date" value="" class="form-control">
                            </div>

                            <div class="col-12">
                                <textarea class="form-control" rows="5" id="message" name="message" placeholder="Additional Message"></textarea>
                            </div>

                            <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                <button type="submit" class="form-control" name="submit" id="submit-button">Book Now</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>
