<?php 
include("includes/config.php");
include("includes/db.php");
if(isset($_GET['q'])){
    $page_title = "Search Results for \"". $_GET['q']."\"";
}
include("includes/header.php");

if(isset($_GET['q'])) {
    $keyword= mysqli_real_escape_string($db, $_GET['q']);
    $posts_query = "SELECT * FROM posts WHERE keywords='$keyword'";
    $keyterms_query = "SELECT * FROM optical WHERE term='$keyword'";
    $posts = $db -> query($posts_query);
    $keyterms= $db -> query($keyterms_query);
    
}else{
    echo "<p>No Keyword!!!</p>";
}?>
<div class="container">
<div class="row">
<div class="col">
<?php
echo "<br/><blockquote>".$posts->num_rows." Search Results for ". $_GET['q']."</blockquote>";

if($posts -> num_rows > 0) {
    while($row = $posts->fetch_assoc()) {

?>

    <h1><a href="single.php?post=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h1>
    <?php 
    $body = $row['body']; 

    echo "<section>".substr($body, 0, 400)." ...</section>";
    ?>
        <a href="single.php?post=<?php echo $row['id']; ?>" class="btn btn-primary">Read More</a>
<?php
    }
}else { echo "<p>No Matching Posts</p>"; }
?>
</div>

<div class="col">
<?php
echo "<br/><blockquote>".$keyterms->num_rows." Search Results for ". $_GET['q']."</blockquote>";
if($keyterms -> num_rows > 0){

    while($term = $keyterms->fetch_assoc()) {?>
    <p><?php echo "<p>".$term['term'].": ".$term['definition']."</p>"; ?></p>
<?php
    }
} else{
    echo "<p>No Matching Terms</p>";
}

?>
</div>
</div>
</div>

<?php include("includes/footer.php"); ?>
