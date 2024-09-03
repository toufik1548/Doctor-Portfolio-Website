<?php
$post_id = $slug2;

if ($post_id > 0) {
    $r = mysqli_query($con, "SELECT * FROM `doctor_posts` WHERE `post_id` = $post_id");
    $q = mysqli_fetch_assoc($r);
}

// Handle form submission
if (isset($_POST['submit'])) {
    $category_id    = $_POST['category_id'];
    $post_title     = trim($_POST['post_title']);
    $post_details   = trim($_POST['post_details']);
    $add_date       = $_POST['add_date'];
    $status         = isset($_POST['status']) ? $_POST['status'] : 'Inactive';

    // Handle file upload
    if (!empty($_FILES["post_photo"]["tmp_name"])) {
        $tmp_name = $_FILES["post_photo"]["tmp_name"];
        $post_photo = time() . "-" . $_FILES["post_photo"]["name"];
        move_uploaded_file($tmp_name, "../images/" . $post_photo);

        $image_path = "../images/" . $post_photo;
        $image = imagecreatefromstring(file_get_contents($image_path));

        $new_width = 200;
        $new_height = 150;
        $resized_image = imagecreatetruecolor($new_width, $new_height);
        imagealphablending($resized_image, false);
        imagesavealpha($resized_image, true);
        imagecopyresampled($resized_image, $image, 0, 0, 0, 0, $new_width, $new_height, imagesx($image), imagesy($image));
        imagejpeg($resized_image, $image_path . ".jpg", 100);
        imagedestroy($image);
        imagedestroy($resized_image);
        $post_photo .= ".jpg";
    } else {
        $post_photo = $q['post_photo'];
    }

    $err = array();
    if ($post_title == "") { 
        $err[] = "Please type Title Name";
    }
    if ($post_details == "") { 
        $err[] = "Please type Details";
    }

    $n = count($err);

    if ($n > 0) {
        echo "<div class=\"alert alert-danger\" role=\"alert\"><ol>";
        for ($i = 0; $i < $n; $i++) { 
            echo "<li>" . $err[$i] . "</li>"; 
        }
        echo "</ol></div>";
    } else { 
        $query = mysqli_query($con, "UPDATE `doctor_posts` SET 
            `category_id`   = '$category_id',
            `post_title` 	= '$post_title',
            `post_details` 	= '$post_details',
            `post_photo` 	= '$post_photo',
            `add_date` 		= '$add_date',
            `status` 		= '$status'
            WHERE `post_id` = $post_id");

        if ($query) {
            echo "<div class=\"alert alert-success message\" role=\"alert\">Post Updated Successfully</div>";
            $q['post_photo'] = $post_photo; // Update the photo path for display
            $q['status'] = $status; // Update the status for display
        } else {
            echo "<div class=\"alert alert-danger message\" role=\"alert\">Sorry!!! Failed to update record! Please Try Again</div>";
        }
    }
}
?>

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
    .button-container {
        margin-top: 20px;
        text-align: center;
    }
    .button-container a {
        margin: 0 10px;
    }
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
</style>

<div class="container p-3">
    <h4 class="text-center form-title">Edit Post</h4>
    <form method="POST" action="" class="pt-2 mb-2 form-container" enctype="multipart/form-data">
        <div class="table-responsive">
            <table class="table table-borderless">
                <tr class="form-group">
                    <td><label for="category_id">Category</label></td>
                    <td>
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="0">Select Category</option>
                            <?php 
                                $category_query = mysqli_query($con, "SELECT category_id, category_name FROM post_categories WHERE status = 1");
                                while ($category = mysqli_fetch_assoc($category_query)) {
                                    $selected = ($category['category_id'] == $q['category_id']) ? 'selected' : ''; ?>
                                    <option value="<?php echo $category['category_id']; ?>" <?php echo $selected; ?>><?php echo $category['category_name']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr class="form-group">
                    <td><label for="post_title">Post Title</label></td>
                    <td><textarea class="form-control" name="post_title" id="post_title" rows="2"><?php echo htmlspecialchars($q['post_title']); ?></textarea></td>
                </tr>
                <tr class="form-group">
                    <td><label for="post_details">Post Details</label></td>
                    <td><textarea class="form-control" name="post_details" id="post_details" rows="4"><?php echo htmlspecialchars($q['post_details']); ?></textarea></td>
                </tr>
                <tr class="form-group">
                    <td><label for="add_date">Post Title</label></td>
                    <td><input class="form-control" type="date" name="add_date" value="<?php echo $q['add_date']; ?>" id="add_date"></td>
                </tr>
                <tr class="form-group">
                    <td><label for="post_photo">Add Photo</label></td>
                    <td>
                        <input type="file" class="form-control-file" name="post_photo" id="post_photo">
                        <?php if (!empty($q['post_photo'])): ?>
                            <img src="<?php echo $site_url; ?>/images/<?php echo $q['post_photo']; ?>" alt="Post Photo" style="max-width: 200px; margin-top: 10px;" id="currentPhoto">
                        <?php endif; ?>
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
        <a href="<?php echo $cp_url; ?>/post-list/" class="btn btn-primary">Post List</a>
        <a href="<?php echo $cp_url; ?>/add-post/" class="btn btn-warning">Post Add</a>
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
