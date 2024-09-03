<?php


    // Check if the form is submitted
    if(isset($_POST['post_id']) && !empty($_POST['post_id'])) {
        // Sanitize the input to prevent SQL injection
        $post_id = mysqli_real_escape_string($con, $_POST['post_id']);

        // Delete the post from the database
        $query = "DELETE FROM `doctor_posts` WHERE `post_id` = '$post_id'";
        $result = mysqli_query($con, $query);

        // Check if the deletion was successful
        if($result) {
            // Set a success message
            $success_message = "<div class=\"alert alert-success message\" role=\"alert\">Successfully deleted the post.</div>";
        } else {
            // Handle deletion failure
            $error_message = "<div class=\"alert alert-success message\" role=\"alert\">Error deleting post.</div>";
        }
    }

    // Fetch data for displaying in the table
    $q = mysqli_query($con, "SELECT * FROM `doctor_posts` WHERE `status` = 1 ORDER BY `post_id` DESC");
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

    .table-container {
        overflow: auto; /* Make the container scrollable */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
    .table-container .table {
        width: 100%;
    }
    .table-container .table th,
    .table-container .table td {
        white-space: nowrap; /* Prevent line breaks in table cells */
    }
    .table-container .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }
</style>



<h3 class="form-title text-center mb-3">Post List</h3>
<?php
    // Display success or error message if set
    if(isset($success_message)) {
        echo '<p style="color: green;">' . $success_message . '</p>';
    } elseif(isset($error_message)) {
        echo '<p style="color: red;">' . $error_message . '</p>';
    }
?>
<p><font style="color:red;">*</font><font style="color:blueviolet;">Scroll more to see the table</font></p><br>

<div class="table-container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="text-center">Post ID</th>
                <th scope="col" class="text-center">Category</th>
                <th scope="col" class="text-center">Title</th>
                <th scope="col" class="text-center">Photo</th>
                <th scope="col" class="text-center">Add Date</th>
                <th scope="col" class="text-center">Views</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Fetching and displaying table rows
                while ($r = mysqli_fetch_assoc($q)) {
                    $post_id        = $r['post_id'];
                    $category_id    = $r['category_id'];
                    $post_title     = $r['post_title'];
                    $post_details   = $r['post_details'];
                    $post_photo     = $r['post_photo'];
                    $add_date       = $r['add_date'];
                    $views          = $r['views'];
            ?>
            <tr>
                <td class="text-center"><?php echo $post_id; ?></td>

                <td class="text-center"><?php echo $category_name = get_info("post_categories","category_name","WHERE category_id='$category_id' AND status=1"); ?></td>

                <td class="text-center"><?php echo substr($post_title, 0, 100); ?></td>
                <td class="text-center"><img src="<?php echo $site_url; ?>/images/<?php echo $post_photo; ?>" alt="Post Photo" style="width:160px;"></td>
                <td class="text-center"><?php echo $add_date; ?></td>
                <td class="text-center"><?php echo $views; ?></td>
                <td class="text-center">
                    <a href="<?php echo $cp_url; ?>/post-edit/<?php echo $post_id; ?>/"><button type="button" class="btn btn-outline-info btn-primary btn-sm">Edit</button></a>
                    <form method="post" action="">
                        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                        <button type="submit" class="btn btn-danger btn-sm" style="margin-left: 10px;">Delete</button>
                    </form>
                </td>

            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
