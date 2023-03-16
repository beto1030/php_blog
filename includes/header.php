<?php
    include("includes/config.php");
    include("includes/db.php");


    $categories = $db -> query($query);
    echo "categories-> ".$categories->num_rows;

    //echo $row;
    //$sql = "SELECT id, firstname, lastname FROM MyGuests";
        $sql = "SELECT * FROM categories";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row;
            }
        } else {
            echo "0 results";
        }
        $conn->close();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>

    <header>
        <nav class="d-flex justify-content-start my-2 mb-4">
                <a class="mx-2" href="#">link</a>

        </nav>
    </header>
    <main class="row mx-2">
        <section class="col-8 p-0">
