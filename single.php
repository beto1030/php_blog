<?php
include("includes/config.php");
include("includes/db.php");

if(isset($_GET['post'])) {
    $post= mysqli_real_escape_string($db, $_GET['post']);
    $p= $db->query("SELECT * FROM posts WHERE id='$post'");
    $p1 = $p->fetch_assoc();

    $page_title = $p1['title'];

}

include("includes/header.php");
if(isset($_GET['post'])) {
    $id= mysqli_real_escape_string($db, $_GET['post']);
    $query = "SELECT * FROM posts WHERE id='$id'";
}


$posts = $db -> query($query);

if(isset($_POST['post_comment'])) {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $comment = mysqli_real_escape_string($db, $_POST['comment']);

    $query = "INSERT INTO comments (name, comment, post) VALUES ('$name', '$comment', '$id')";
    
    $db -> query($query);
    
    header("Location:single.php?post=$id");
    exit();
}

$query = "SELECT * FROM comments WHERE post='$id' AND status='1'";

$comments = $db -> query($query);



if($posts -> num_rows > 0) {
    while($row = $posts->fetch_assoc()) {

?>
    <main class="m-4">
        <h1><?php echo $row['title']; ?></h1>

        <small><?php echo $row['date']. " by <a href='#'>". $row['author']."</a>"; ?></small>

        <?php echo $row['body']; ?>
    </main>
<?php
    }
}
?>

<div class="comment-area">
    <form method="post">
        <div class="form-group">
            <label for="userName">Name</label>
            <input type="text" name="name" class="form-control" id="userName" placeholder="Name">
        </div>    

        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea id="comment" name="comment" cols="60" rows="10"></textarea>
        </div>    
        <button type="submit" name="post_comment" class="btn btn-primary">Post Comment</button>
    </form>
</div>

<!-- comments section -->

<?php

 ?>
<section class="gradient-custom">

    <div class="row d-flex">
      <div class="col-md-12 col-lg-10 col-xl-8 flex-grow-1">
        <div class="card border-0">
          <div class="card-body px-0">
          <h4 class="text-center mb-4 pb-2"><?php echo $comments->num_rows; ?> Comments</h4>

            <div class="row">
              <div class="col">
<?php 
while($comment = $comments->fetch_assoc()) {
    if($comment['is_admin'] != 1) {
?>

                <div class="d-flex flex-start">
                  <img class="rounded-circle shadow-1-strong me-3"
                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar" width="65"
                    height="65" />
                  <div class="flex-grow-1 flex-shrink-1">
                    <div>
                      <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-1">
                            <?php echo $comment['name']; ?><span class="small">- 2 hours ago</span>
                        </p>
                        <a href="#!"><i class="fas fa-reply fa-xs"></i><span class="small"> reply</span></a>
                      </div>
                      <p class="small mb-0"> <?php echo $comment['comment']; ?></p>
                    </div>

                  </div>
                </div><!-- end of first comment -->
<?php } else {
 ?>

                <!-- start of 2nd comment -->
                <div class="d-flex flex-start mt-4">
                            <img class="rounded-circle shadow-1-strong me-3"
                              src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(12).webp" alt="avatar" width="65"
                              height="65" />
                            <div class="flex-grow-1 flex-shrink-1">

                              <div>
                                <div class="d-flex justify-content-between align-items-center">
                                  <p class="mb-1">
                                     <?php echo $comment['name']; ?> <span class="small">- 2 hours ago</span><button class="btn btn-info btn-xs">Admin</button>
                                  </p>
                                  <a href="#!"><i class="fas fa-reply fa-xs"></i><span class="small"> reply</span></a>
                                </div>
                                <p class="small mb-0"> <?php echo $comment['comment']; ?> </p>
                              </div>

                            </div>

                </div><!-- end of 2nd comment -->

              </div><!-- .col -->
            </div><!-- .row -->
          </div><!-- .card-body -->
        </div><!-- .card -->
      </div>
    </div>
</section>

<?php } } ?>

<?php
include("includes/footer.php");
?>
