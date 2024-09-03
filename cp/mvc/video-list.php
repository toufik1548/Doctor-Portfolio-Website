<?php
    // Check if the form is submitted for video deletion
    if(isset($_POST['video_id']) && !empty($_POST['video_id'])) {
        // Sanitize the input to prevent SQL injection
        $video_id = mysqli_real_escape_string($con, $_POST['video_id']);

        // Delete the video from the database
        $delete_query = "DELETE FROM `doctor_video` WHERE `video_id` = '$video_id'";
        $delete_result = mysqli_query($con, $delete_query);

        // Check if the deletion was successful
        if($delete_result) {
            // Set a success message
            $success_message = "<div class=\"alert alert-success message\" role=\"alert\">Successfully deleted the Video.</div>";
        } else {
            // Handle deletion failure
            $error_message = "<div class=\"alert alert-success message\" role=\"alert\">Error deleting Video.</div>";
        }
    }

    // Fetch data for displaying in the table
    $q = mysqli_query($con, "SELECT * FROM `doctor_video` WHERE `status` = 1 ORDER BY `video_id` DESC LIMIT 20");
?>


<style>
    .form-title {
        margin-bottom: 20px;
        font-weight: bold;
        color: #333;
    }
    .form-group label {
        font-weight: bold;
    }
    .submit-btn {
        background-color: #28a745;
        color: white;
    }
    .submit-btn:hover {
        background-color: #218838;
    }
    .message {
        margin-top: 20px;
    }
    .table-container {
        overflow: auto; /* Enable scrolling */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
    .table-container table {
        width: 100%; /* Ensure the table takes up full width */
    }
    .table-container th,
    .table-container td {
        padding: 8px;
    }
    .table-container .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }
</style>


<h3 class="form-title text-center mb-3">Video List</h3>

<?php
    // Display success or error message if set
    if(isset($success_message)) {
        echo '<p style="color: green;">' . $success_message . '</p>';
    } elseif(isset($error_message)) {
        echo '<p style="color: red;">' . $error_message . '</p>';
    }
?>

<p><font style="color:red;">*</font><font style="color:blueviolet;">Scroll more to see the table</font></p>

<div class="table-container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="text-center">Video ID</th>
                <th scope="col" class="text-center">Video Title</th>
                <th scope="col" class="text-center">Video Platform</th>
                <th scope="col" class="text-center">Video</th>
                <th scope="col" class="text-center">Add Date</th>
                <th scope="col" class="text-center">Views</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($r = mysqli_fetch_assoc($q)) {
                    $video_id       = $r['video_id'];
                    $video_title    = $r['video_title'];
                    $video_platform   = $r['video_platform']; // Assuming 'video_platform' field indicates the video source, e.g., 'youtube' or 'facebook'
                    $video_name     = $r['video_name'];
                    $add_date       = $r['add_date'];
                    $views          = $r['views'];

                    // Check if the video source is YouTube or Facebook
                    if ($video_platform == 'youtube') {
                        // If it's a YouTube video, embed using YouTube embed code
                        $video_embed_code = '<iframe width="180" src="https://www.youtube.com/embed/' . $video_name . '" frameborder="0" allowfullscreen></iframe>';
                    } elseif ($video_platform == 'facebook') {
                        // If it's a Facebook video, embed using Facebook embed code
                        $video_embed_code = '<iframe src="https://www.facebook.com/plugins/video.php?href=' . urlencode($video_name) . '" width="180" height="180" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>';
                    }
            ?>
            <tr>
                <td class="text-center"><?php echo $video_id; ?></td>
                <td class="text-center"><?php echo $video_title; ?></td>
                <td class="text-center"><?php echo $video_platform; ?></td>
                <td class="text-center"><?php echo $video_embed_code; ?></td>
                <td class="text-center"><?php echo $add_date; ?></td>
                <td class="text-center"><?php echo $views; ?></td>
                <td class="text-center">
                    <a href="<?php echo $cp_url; ?>/video-edit/<?php echo $video_id; ?>/"><button type="button" class="btn btn-outline-info btn-primary btn-sm">Edit</button></a>
                    <!-- Delete button -->
                    <form method="post" action="">
                        <input type="hidden" name="video_id" value="<?php echo $video_id; ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
