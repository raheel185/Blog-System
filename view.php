<?php
require_once 'connect.php';
require_once 'header.php';

//RewriteRule ^p/(.*)$ view.php?id=$1 [QSA,L]

$id = (INT)$_GET['id'];
if ($id < 1) {
    header("location: $url_path");
}
$sql = "Select * FROM posts WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);


$invalid = mysqli_num_rows($result);
if ($invalid == 0) {
    header("location: $url_path");
}

$hsql = "SELECT * FROM posts WHERE id = '$id'";
$res = mysqli_query($dbcon, $hsql);
$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$title = $row['title'];
$feature_img = $row['feature_img'];
$description = $row['description'];
$author = $row['posted_by'];
$time = $row['date'];
$img_url = "http://localhost/blogsite/img/$feature_img";


echo "

        <div class='img_div'>
        <img src='$img_url'>
        <h2>$title</h2>
        </div>

        <div class='single_banner'>
        
        <div class='content'>
        $description
        </div>

        </div>

";

?>


<?php
if (isset($_SESSION['username'])) {
    ?>
    <div class="w3-text-green"><a href="<?=$url_path?>edit.php?id=<?php echo $row['id']; ?>">[Edit]</a></div>
    <div class="w3-text-red">
        <a href="<?=$url_path?>del.php?id=<?php echo $row['id']; ?>"
           onclick="return confirm('Are you sure you want to delete this post?'); ">[Delete]</a></div>
    <?php
}
echo '</div></div>';



require('comments.php');


include("footer.php");
