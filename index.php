<?php
include("includes/config.php");
include("includes/db.php");

if(isset($_GET['category'])) {
    $category = mysqli_real_escape_string($db, $_GET['category']);
    $cat = $db->query("SELECT * FROM categories WHERE id='$category'");
    $c = $cat->fetch_assoc();

    $page_title = $c['text']." Posts";

}

include("includes/header.php");
if(isset($_GET['category'])) {
    $category = mysqli_real_escape_string($db, $_GET['category']);
    $query = "SELECT * FROM posts WHERE category='$category'";
}else{
    $query = "SELECT * FROM posts";
}


$posts = $db -> query($query);

if($posts -> num_rows > 0) {
    while($row = $posts->fetch_assoc()) {

?>

    <h1><a href="single.php?post=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h1>
    <small><?php echo $row['date']. " by <a href='#'>". $row['author']."</a>"; ?></small>
    <?php 
    $body = $row['body']; 

    echo substr(strip_tags($body), 0, 400). "...";
    ?>
        <a href="single.php?post=<?php echo $row['id']; ?>" class="btn btn-primary">Read More</a>
<?php
    }
} else {
    echo "<p>No Matching Posts</p>";
}
?>
<?php
include("includes/footer.php");
?>
