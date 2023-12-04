<?php
require_once 'connect.php';
require_once 'functions.php';
//

$cur_url = 'http://localhost';
$cur_url .= parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
      
      

if (isset($_GET['id'])) {

    if(isset($_GET['parent_id']))
    echo $_GET['parent_id'];
   
    if (isset($_GET['name'], $_GET['content'])) {
        
        
        $cpid = $_GET['parent_id'];
        $cname = $_GET['name'];
        $ccontent = $_GET['content'];
        $now = date('Y-m-d H:i:s');
      
        $sql_cm = "INSERT INTO comments (page_id, parent_id, name, content, submit_date) VALUES('$id', '$cpid', '$cname', '$ccontent', '$now')";
       
       if ($dbcon->query($sql_cm) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql_cm . "<br>" . $dbcon->error;
          }
        
          header("Location: $cur_url");
        
    }

    $sql = "SELECT * FROM comments WHERE page_id = '$id' ORDER BY submit_date DESC";
    $result = mysqli_query($dbcon, $sql);

    $comments = $result -> fetch_all(MYSQLI_ASSOC);

    if(!empty($comments)){
        echo '<div class="comments">';  
        echo show_comments($comments);
        echo '</div>';
    }else{
        echo '<div class="comments_form">'; 
       echo show_write_comment_form();
       echo '</div>';
    }
    

    
} else {
    exit('No page ID specified!');
}






?>