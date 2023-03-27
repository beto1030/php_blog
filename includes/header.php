<?php


    $query= "SELECT * FROM categories";
    $categories = $db -> query($query);

    //echo $row;
    //$sql = "SELECT id, firstname, lastname FROM MyGuests";
    
    //$db->close();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>

    <header>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Coding w/ beto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">


             <?php if(isset($_GET['category']) || strpos($_SERVER['REQUEST_URI'], "index.php" ) === false) { ?>
                <a class="nav-link" aria-current="page" href="./index.php">HOME</a>
             <?php } else {?>
                <a class="nav-link active" href="./index.php">HOME</a>
             <?php } ?>
             <?php
             if ($categories->num_rows > 0) {
                 // output data of each row
                 while($row = $categories->fetch_assoc()) {
                     if(isset($_GET['category']) && $row['id'] == $_GET['category']) {
             ?>
                 <a class="nav-link active" href="index.php?category=<?php echo $row['id'] ?>"><?php echo $row["text"]; ?></a>
<?php } else { ?>
    
                 <a class="nav-link" href="index.php?category=<?php echo $row['id'] ?>"><?php echo $row["text"]; ?></a>
<?php }
                 }
             } else {
                     echo "0 results";
               }
                     
             ?>

              </div>
            </div>
          </div>
        </nav>

        
    </header>
    <main class="row mx-2">
        <section class="col-8 p-0">
