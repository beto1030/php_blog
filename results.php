<?php 
include("includes/config.php");
include("includes/db.php");
if(isset($_GET['q'])){
    $page_title = "Search Results for \"". $_GET['q']."\"";
}
include("includes/header.php");

if(isset($_GET['q'])) {
    $keyword= mysqli_real_escape_string($db, $_GET['q']);
/*$query = "SELECT * FROM posts, optical WHERE term='Aphakia'"; */
    $query = "SELECT * FROM `posts` WHERE `body` LIKE '%$keyword%' OR `title` LIKE '%$keyword%'";

    $results= $db -> query($query);
    
}else{
    echo "<p>No Keyword!!!</p>";
    }?>
<?php

if($results-> num_rows > 0) {
    while($row = $results->fetch_assoc()) { ?>
<div class="container">
        
            <h1><a href="single.php?post=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h1>
    <small><?php echo $row['date']. " by <a href='#'>". $row['author']."</a>"; ?></small>
            <?php 
            $body = $row['body']; 
        
            echo "<section>".substr(strip_tags($body), 0, 400)." ...</section>";
            ?>
                <a href="single.php?post=<?php echo $row['id']; ?>" class="btn btn-primary">Read More</a>
</div>
<?php }
}else { echo "<p>No Matching Posts</p>"; }?>

<?php include("includes/footer.php"); ?>
