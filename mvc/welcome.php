    <style type="text/css">
        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
            background: #fff; /* Ensure card background is white */
            transition: transform 0.2s; /* Smooth hover effect */
        }

        .card:hover {
            transform: scale(1.02); /* Slightly increase the size on hover */
        }

        .card-body {
            flex: 1;
        }

        .card-img-top {
            object-fit: cover;
            height: 200px; /* Set a fixed height for the images */
        }

        .gallery, .video-gallery {
            background: #fff; /* Set a white background for the sections */
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        .heroLinks .custom-link {
            color: #007bff; /* Bootstrap primary color */
        }

        .heroLinks .custom-link:hover {
            text-decoration: underline;
        }
    </style>

<section class="hero pb-5" id="hero">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM doctor_user WHERE status = 1");
                        $r = mysqli_fetch_assoc($q);
                        $user_id        = $r["user_id"];
                        $user_photo     = $r["user_photo"];
                        $user_mobile    = $r["user_mobile"];
                        ?>
                        <div class="carousel-item active">
                            <img src="<?php echo $site_url; ?>/images/<?php echo $user_photo; ?>" class="img-fluid" alt="Doctor Photo">
                        </div>
                    </div>
                </div>
                <div class="heroText d-flex flex-column justify-content-center">
                    <h1 class="mt-auto mb-2">
                        Better
                        <div class="animated-info">
                            <span class="animated-item">health</span>
                            <span class="animated-item">days</span>
                            <span class="animated-item">lives</span>
                        </div>
                    </h1>
                    <p class="mb-4">Specialist in blood medicine, thalassemia and blood cancer.</p>
                    <div class="heroLinks d-flex flex-wrap align-items-center">
                        <a class="custom-link me-4" href="<?php echo $site_url; ?>/about/" data-hover="Learn More">Learn More</a>
                        <p class="contact-phone mb-0"><i class="bi-phone"></i> <?php echo $user_mobile; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="gallery pt-3 pb-3 mt-2 mb-3 shadow" style="background-color: whitesmoke;">
    <div class="container">
        <h2 class="text-center mb-5">Latest News</h2>
        <div class="row d-flex flex-wrap">
            <?php
            $q = mysqli_query($con, "SELECT * FROM doctor_posts WHERE user_id='$user_id' AND status = 1 ORDER BY post_id DESC LIMIT 4");
            while ($r = mysqli_fetch_assoc($q)) {
                $post_id        = $r["post_id"];
                $post_title     = $r["post_title"];
                $post_details   = $r["post_details"];
                $post_photo     = $r["post_photo"];
                $views          = $r["views"];
            ?>
                <div class="col-lg-3 col-md-6 col-sm-12 d-flex align-items-stretch p-2">
                    <div class="card">
                        <a href="<?php echo $site_url; ?>/post/<?php echo $post_id; ?>">
                            <img src="<?php echo $site_url; ?>/images/<?php echo $post_photo; ?>" class="card-img-top img-fluid galleryImage" alt="get a vaccine" title="<?php echo $post_title; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $post_title; ?></h5>
                                <p class="card-text"><?php echo substr($post_details, 0, 150); ?>...</p>
                                <a href="<?php echo $site_url; ?>/post/<?php echo $post_id; ?>" class="btn btn-primary">See More</a>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


<section class="video-gallery pt-3 pb-3 mt-2 mb-2 shadow" style="background-color: whitesmoke;">
    <div class="container">
        <h2 class="text-center mb-5">Latest Videos</h2>
        <div class="row d-flex flex-wrap">
            <?php
            mysqli_query($con, "UPDATE doctor_video SET views=views+1 WHERE user_id='$user_id'");
            $q = mysqli_query($con, "SELECT * FROM doctor_video WHERE user_id='$user_id' AND status = 1 ORDER BY video_id DESC LIMIT 4");
            while ($r = mysqli_fetch_assoc($q)) {
                $video_name  = $r["video_name"];
                $video_title = $r["video_title"];
                $views = $r["views"];
                $video_platform = $r["video_platform"];
            ?>
                <div class="col-lg-3 col-md-6 col-sm-12 d-flex align-items-stretch p-2">
                    <div class="card">
                        <?php if ($video_platform == 'youtube') { ?>
                            <iframe class="card-img-top" width="100%" height="auto" src="https://www.youtube.com/embed/<?php echo $video_name; ?>" frameborder="0" allowfullscreen></iframe>
                        <?php } else if ($video_platform == 'facebook') { ?>
                            <iframe class="card-img-top" width="100%" height="auto" src="https://www.facebook.com/plugins/video.php?href=<?php echo urlencode($video_name); ?>" frameborder="0" allowfullscreen></iframe>
                        <?php } ?>
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 15px;"><?php echo $video_title; ?></h5>
                            <p class="card-text" style="font-size: 15px;">Views: <?php echo $views; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>