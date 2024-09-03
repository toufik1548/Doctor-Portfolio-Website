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

            $category_id    = $_POST['category_id'];
            $post_title     = trim($_POST['post_title']);
            $post_details   = trim($_POST['post_details']);
            $add_date       = date('Y-m-d H:i:s');
            $views          = 0;

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
                $query = mysqli_query($con, "INSERT INTO `doctor_posts` (
                    `post_id`,
                    `user_id`,
                    `category_id`,
                    `post_title`,
                    `post_details`,
                    `post_photo`,
                    `add_date`,
                    `views`,
                    `status`
                ) VALUES (
                    NULL, 
                    1,
                    '$category_id',
                    '$post_title',
                    '$post_details',
                    '$post_photo',
                    '$add_date',
                    '$views',
                    1
                )");

                if ($query) {
                    echo "<div class=\"alert alert-success message\" role=\"alert\">Post Added Successfully</div>";
                } else {
                    echo "<div class=\"alert alert-danger message\" role=\"alert\">Sorry!!! Failed to add record! Please Try Again</div>";
                }
            }
        }
        ?>
        
<div class="container p-3">
    <h4 class="text-center form-title">Add Post</h4>
    <form method="POST" action="" class="pt-2 form-container" enctype="multipart/form-data">

        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" name="category_id" id="category_id">

                <option value="0">Select Category</option>
                <?php 
                    $category_query = mysqli_query($con, "SELECT category_id, category_name FROM post_categories WHERE status = 1");
                    while ($category = mysqli_fetch_assoc($category_query)) { ?>
                        <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                <?php } ?>

            </select>
        </div>
        <div class="form-group">
            <label for="post_title">Post Title</label>
            <textarea class="form-control" name="post_title" id="post_title" rows="2"></textarea>
        </div>
        <div class="form-group">
            <label for="post_details">Post Details</label>
            <textarea class="form-control" name="post_details" id="post_details" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label for="post_photo">Add Photo</label>
            <input type="file" class="form-control-file" name="post_photo" id="post_photo">
        </div>
        <div class="text-center">
            <button type="submit" name="submit" class="btn submit-btn">Submit</button>
        </div>
    </form>
</div>
