<?php
$video_id = $slug2;

if ($video_id > 0) {
    $r = mysqli_query($con, "SELECT * FROM `doctor_video` WHERE `video_id` = $video_id");
    $q = mysqli_fetch_assoc($r);
}

// Handle form submission
if (isset($_POST['submit'])) {
    $video_name         = trim($_POST['video_name']);
    $video_title        = trim($_POST['video_title']);
    $video_platform     = trim($_POST['video_platform']);
    $status             = isset($_POST['status']) ? $_POST['status'] : 'Inactive';

    $err = array();
    if ($video_title == "") { 
        $err[] = "Please type Video Title";
    }
    if ($video_name == "") { 
        $err[] = "Please type Video Name";
    }

    $n = count($err);

    if ($n > 0) {
        echo "<div class=\"alert alert-danger\" role=\"alert\"><ol>";
        for ($i = 0; $i < $n; $i++) { 
            echo "<li>" . $err[$i] . "</li>"; 
        }
        echo "</ol></div>";
    } else { 
        $query = mysqli_query($con, "UPDATE `doctor_video` SET
            `video_name`        = '$video_name', 
            `video_title`       = '$video_title',
            `video_platform`    = '$video_platform',
            `status`            = '$status'
            WHERE `video_id` = $video_id");

        if ($query) {
            echo "<div class=\"alert alert-success message\" role=\"alert\">Post Updated Successfully</div>";
            $q['status'] = $status; // Update the status for display
        } else {
            echo "<div class=\"alert alert-danger message\" role=\"alert\">Sorry!!! Failed to update record! Please Try Again</div>";
        }
    }
}
?>

<style>
    /* Your existing styles */
</style>

<div class="container p-3">
    <h4 class="text-center form-title">Edit Video</h4>
    <form method="POST" action="" class="pt-2 mb-2 form-container" enctype="multipart/form-data">
        <div class="table-responsive">
            <table class="table table-borderless">
                <tr class="form-group">
                    <td><label for="video_title">Video Title</label></td>
                    <td><textarea class="form-control" name="video_title" id="video_title" rows="2"><?php echo htmlspecialchars($q['video_title']); ?></textarea></td>
                </tr>
                <tr class="form-group">
                    <td><label for="video_platform">Video Platform</label></td>
                    <td>
                        <select class="form-control" name="video_platform" id="video_platform">
                            <option value="">Select Platform</option>
                            <option value="youtube" <?php echo ($q['video_platform'] ?? '') == 'youtube' ? 'selected' : ''; ?>>YouTube</option>
                            <option value="facebook" <?php echo ($q['video_platform'] ?? '') == 'facebook' ? 'selected' : ''; ?>>Facebook</option>
                        </select>
                    </td>
                </tr>
                <tr class="form-group">
                    <td><label for="video_name">Video Name</label></td>
                    <td><input type="text" name="video_name" style="width: 300px;" value="<?php echo htmlspecialchars($q['video_name']); ?>">

                        <p class="form-text text-muted"><Font style="color: green;">Follow this (https://www.youtube.com/watch?v=<font style="color:red;">*</font>Video ID<font style="color:red;">*</font>)</Font> OR <font style="color: green;"><font style="color:red;">*</font>Just copy the facebook link and paste here</font></p>
                    </td>
                </tr>
                <tr class="form-group">
                    <td><label>Status</label></td>
                    <td>
                        <div>
                            <input type="radio" name="status" value="1" <?php echo ($q['status'] ?? '0') == '1' ? 'checked' : ''; ?>> Active
                        </div>
                        <div>
                            <input type="radio" name="status" value="0" <?php echo ($q['status'] ?? '0') == '0' ? 'checked' : ''; ?>> Inactive
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="text-center">
            <button type="submit" name="submit" class="btn submit-btn">Submit</button>
        </div>
    </form>
    <div class="button-container">
        <!-- Your existing button links -->
    </div>
</div>

<script>
    document.getElementById('post_photo').addEventListener('change', function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('currentPhoto').src = event.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
