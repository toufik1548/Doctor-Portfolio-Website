<style type="text/css">
    #footer_roller {
        position: fixed;
        padding-top: 5px;
        bottom: 0; /* Add this to position the footer at the bottom of the page */
        width: 100%; /* Add this to make the footer full-width */
        background-color: yellowgreen; /* Add a background color for better visibility */
    }

    #footer_roller a {
        color: #333;
        text-decoration: none;
    }

    #footer_roller a:hover {
        text-decoration: underline;
    }
</style>

<div id="footer_roller">
    <marquee scrollamount="3" scrolldelay="10" style="margin-top: -20px;">
        <?php
        $qp = mysqli_query($con, "SELECT * FROM doctor_posts WHERE status=1 ORDER BY post_id DESC LIMIT 3");
        while ($rp = mysqli_fetch_assoc($qp)) { ?>
            <a href="<?php echo $site_url; ?>/post/<?php echo $rp['post_id']; ?>/"><b><?php echo $rp['post_title']; ?></b></a> &nbsp; / &nbsp;
        <?php } ?>
    </marquee>
</div>
