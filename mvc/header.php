    <style>
        .navbar.bg-light {
            background-color: red !important;
        }
        .navbar-nav .nav-link {
            color: white !important;
        }
        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link:hover {
            color: black !important;
        }
        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link:focus {
            color: black !important;
        }
    </style>

            <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
                <div class="container">
                    <a class="navbar-brand mx-auto d-lg-none" href="<?php echo $site_url; ?>">
                        <img src="<?php echo $site_url; ?>/images/logo.png" width="120">
                        <strong class="d-block text-white">Blood Cancer Specialist</strong>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo $site_url; ?>">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $site_url; ?>/about/">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $site_url; ?>/doctor_appointment/">Doctor Appointment</a>
                            </li>

                            <a class="navbar-brand d-none d-lg-block" href="<?php echo $site_url; ?>">
                                <img src="<?php echo $site_url; ?>/images/logo.png" width="150">
                                <strong class="d-block text-white">Blood Cancer Specialist</strong>
                            </a>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $site_url; ?>/contact/">Contact</a>
                            </li>
                            <script async src="https://cse.google.com/cse.js?cx=60aa0da200b844e2f" width="200">
                            </script>
                            <div class="gcse-search"></div>
                        </ul>
                    </div>

                </div>
            </nav>