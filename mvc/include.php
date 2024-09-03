
<?php
if (isset($slug) && $slug != "") {
    include($slug . ".php");
} else {
    include("welcome.php");
    // if(strpos($slug, "fbc") == 1){include("welcome.php");} //for facebook share link
}
?>
