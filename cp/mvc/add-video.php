<style>
    .form-container {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        background: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
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
</style>

<?php
if (isset($_POST['submit'])) {
    $video_name     = trim($_POST['video_name']);
    $video_title    = trim($_POST['video_title']);
    $video_platform = trim($_POST['video_platform']);
    $add_date       = date('Y-m-d H:i:s');
    $views          = 0;

    $err = array();
    if ($video_name == "") { 
        $err[] = "Please type Video Name";
    }
    if ($video_platform == "") { 
        $err[] = "Please select Video Platform";
    }

    $n = count($err);

    if ($n > 0) {
        echo "<div class=\"alert alert-danger\" role=\"alert\"><ol>";
        for ($i = 0; $i < $n; $i++) { 
            echo "<li>" . $err[$i] . "</li>"; 
        }
        echo "</ol></div>";
    } else { 
        $query = mysqli_query($con, "INSERT INTO `doctor_video` (
            `video_id`,
            `user_id`,
            `video_name`,
            `video_title`,
            `video_platform`,
            `add_date`,
            `views`,
            `status`
        ) VALUES (
            NULL, 
            1,
            '$video_name',
            '$video_title',
            '$video_platform',
            '$add_date',
            '$views',
            1
        )");

        if ($query) {
            echo "<div class=\"alert alert-success message\" role=\"alert\">Video Added Successfully</div>";
        } else {
            echo "<div class=\"alert alert-danger message\" role=\"alert\">Sorry!!! Failed to add record! Please Try Again</div>";
        }
    }
}
?>

<div class="container p-3">
    <h4 class="text-center form-title">Add Video</h4>
    <form method="POST" action="" class="pt-2 form-container">
        <div class="form-group">
            <label for="video_platform">Video Platform</label>
            <select class="form-control" name="video_platform" id="video_platform">
                <option value="">Select Platform</option>
                <option value="youtube">YouTube</option>
                <option value="facebook">Facebook</option>
            </select>
        </div>
        <div class="form-group">
            <label for="video_title">Video Title</label>
            <textarea class="form-control" type="text" name="video_title" cols="50" rows="2"></textarea>
        </div>
        <div class="form-group">
            <label for="video_name">Video ID/URL</label>
            <input class="form-control" type="text" name="video_name" id="video_name">
            <p class="form-text text-muted"><Font style="color: green;">Follow this (https://www.youtube.com/watch?v=<font style="color:red;">*</font>Video ID<font style="color:red;">*</font>)</Font> OR <font style="color: green;"><font style="color:red;">*</font>Just copy the facebook link and paste here</font></p>
        </div>
        <div class="text-center">
            <button type="submit" name="submit" class="btn submit-btn">Submit</button>
        </div>
    </form>
</div>
