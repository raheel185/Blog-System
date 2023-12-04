<?php
require_once 'connect.php';
include 'header.php';

?>

<!-- <div class="w3-container">
    <form action="
    
    PHP code ==> echo $url_path  ==> end of PHP
    
    search.php" method="GET" class="w3-container">
        <p>
            <input type="text" name="q" class="w3-input w3-border" placeholder="Search for anything" required>
        </p>
        <p>
        <input type="submit" class="w3-btn w3-teal w3-round" value="Search">
        </p>
    </form>
</div> -->


<?php



// COUNT
$sql = "SELECT COUNT(*) FROM posts";
$result = mysqli_query($dbcon, $sql);
$r = mysqli_fetch_row($result);
$numrows = $r[0];

$rowsperpage = PAGINATION;
$totalpages = ceil($numrows / $rowsperpage);

$page = 1;
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = (INT)$_GET['page'];
}

if ($page > $totalpages) {
    $page = $totalpages;
}

if ($page < 1) {
    $page = 1;
}
$offset = ($page - 1) * $rowsperpage;


$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $offset, $rowsperpage";
$result = mysqli_query($dbcon, $sql);

if (mysqli_num_rows($result) < 1) {
    echo '<div class="w3-panel w3-pale-red w3-card-2 w3-border w3-round">No post yet!</div>';

   
} else {
    echo '<h2 class="title_main">All Adventures</h2>';
    echo '<div class="border_line"></div>';
    echo '<div class="all_posts ft_posts">';
  while ($row = mysqli_fetch_assoc($result)) {

   
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

echo "<p><div class='w3-bar w3-center paginations'>";

if ($page > 1) {
    echo "<a href='?page=1'>&laquo;</a>";
    $prevpage = $page - 1;
    echo "<a href='?page=$prevpage' class='w3-btn'><</a>";
}

$range = 3;
for ($x = $page - $range; $x < ($page + $range) + 1; $x++) {
    if (($x > 0) && ($x <= $totalpages)) {
        if ($x == $page) {
            echo "<div class='w3-teal w3-button cur_pg'>$x</div>";
        } else {
            echo "<a href='?page=$x' class='w3-button w3-border ot_pg'>$x</a>";
        }
    }
}

if ($page != $totalpages) {
    $nextpage = $page + 1;
    echo "<a href='?page=$nextpage' class='w3-button'>></a>";
    echo "<a href='?page=$totalpages' class='w3-btn'>&raquo;</a>";
}

echo "</div></p>";
}











include("footer.php");

?>