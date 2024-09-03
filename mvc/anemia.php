<?php
    $category_slug = $slug;
    $category_id = get_info("post_categories","category_id","WHERE category_slug='$category_slug' AND status=1");
?>

<section class="gallery pt-3 pb-3 mt-2 mb-3 shadow" style="background-color: whitesmoke;">
    <div class="container">
        <h2 class="text-center mb-5">Anemia Newses</h2>
        <div class="row d-flex flex-wrap">
            <?php
            $q = mysqli_query($con, "SELECT * FROM doctor_posts WHERE category_id='$category_id' AND status = 1");
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