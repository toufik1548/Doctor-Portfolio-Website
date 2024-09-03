<style>
    .post-details {
        white-space: pre-wrap; /* This ensures that the text will wrap and preserve line breaks */
        word-wrap: break-word; /* This allows long words to break and wrap to the next line */
    }

    .description {
        padding: 10px;
    }

    .post img {
        max-width: 100%;
        height: auto;
    }

    @media (max-width: 768px) {
        .post-details {
            font-size: 14px; /* Adjust font size for smaller screens */
        }

        .description h3 {
            font-size: 18px; /* Adjust heading size for smaller screens */
        }
    }
</style>


<div class="container pt-5">
    <?php
    $post_id = $slug2;

    $q = mysqli_query($con, "SELECT * FROM doctor_posts WHERE post_id='$post_id' AND status = 1 ORDER BY post_id DESC LIMIT 4");
    $r = mysqli_fetch_assoc($q);

    $post_id = $r["post_id"];
    $post_title = $r["post_title"];
    $post_details = $r["post_details"];
    $post_photo = $r["post_photo"];
    $views = $r["views"];

    mysqli_query($con, "UPDATE doctor_posts SET views=views+1 WHERE post_id='$post_id'");
    ?>
    <div class="col-12">
        <div class="post">
            <img src="<?php echo $site_url; ?>/images/<?php echo $post_photo; ?>" class="img-fluid galleryImage" alt="get a vaccine" width="400" title="<?php echo $post_title; ?>"><br>
            <div class="description">
                <h3><?php echo $post_title; ?></h3><br>
                <div class="post-details">
                    <?php echo nl2br($post_details); ?>
                </div><br><br>
                <p style="font-size: 15px;">Views: <?php echo $views; ?></p>
            </div>
        </div>
    </div>
</div>
