<?php
require_once 'connect.php';
require_once 'header.php';

?>



<?php



$sql = "SELECT * FROM posts ORDER BY RAND() LIMIT 4";
$result = mysqli_query($dbcon, $sql);

echo "<div class='banner_posts'>";

while ($row = mysqli_fetch_assoc($result)) {



    $cat_id = $row['cat_id'];
    $id = htmlentities($row['id']);
    
    $title = htmlentities($row['title']);
   
    $slug = htmlentities($row['slug']);
    $time = htmlentities($row['date']);

    $fimg = $row['feature_img'];

    $sql1 = "SELECT cat_name FROM category WHERE cat_id = '$cat_id'";
    $result1 = mysqli_query($dbcon, $sql1);
    $row = $result1 -> fetch_array(MYSQLI_ASSOC);
    $cat_name = $row['cat_name'];

   $permalink = $url_path;
    $permalink .= "p/".$id ."/".$slug;

   
    echo '<div class="banner_item">';


    echo "<img src='./img/$fimg' >";

    echo '<div class="item_inner">';
    echo "<span class='cat_post'>$cat_name</span>";
    echo "<h3><a href='$permalink'>$title</a></h3>";
    echo "<div class='w3-text-grey'> $time </div>";
    echo '</div>';

    echo '</div>';

   
}


echo '</div>';

//
// Display posts with Category => Featured 
//

$sql = "SELECT * FROM posts WHERE cat_id = 1 LIMIT 4";

$result1 = mysqli_query($dbcon, $sql);
if($result1){

    echo '<div class="post_section feature_sec">';

    echo '<h2>See our Featured Posts</h2>';
    echo '<div class="border_line"></div>';

    echo '<div class="ft_posts">';

    while ($row = mysqli_fetch_assoc($result1)) {

       
        $id = htmlentities($row['id']);
        $title = htmlentities($row['title']);
       
        $slug = htmlentities($row['slug']);
        $time = htmlentities($row['date']);
    
        $fimg = $row['feature_img'];

        $permalink = $url_path;
        $permalink .= "p/".$id ."/".$slug;
        
        echo "<a href='$permalink' class='ft_item'>
        
        <img src='./img/$fimg'>
        <h3>$title</h3>
        <span>$time</span>
        
        </a>";
       
    }

    echo '</div>';


    echo '</div>';


}


// End of section
//



//
// Display posts with Category => Adventures 
//

$sql = "SELECT * FROM posts WHERE cat_id = 2 LIMIT 4";

$result1 = mysqli_query($dbcon, $sql);
if($result1){

    echo '<div class="post_section feature_sec">';

    echo '<h2>This month adventures</h2>';
    echo '<div class="border_line"></div>';

    echo '<div class="ft_posts">';

    while ($row = mysqli_fetch_assoc($result1)) {

       
        $id = htmlentities($row['id']);
        $title = htmlentities($row['title']);
       
        $slug = htmlentities($row['slug']);
        $time = htmlentities($row['date']);
    
        $fimg = $row['feature_img'];

        $permalink = $url_path;
        $permalink .= "p/".$id ."/".$slug;
        
        echo "<a href='$permalink' class='ft_item'>
        
        <img src='./img/$fimg'>
        <h3>$title</h3>
        <span>$time</span>
        
        </a>";
       
    }

    echo '</div>';


    echo '</div>';


}


// End of section
//



//include("categories.php");
include("footer.php");






