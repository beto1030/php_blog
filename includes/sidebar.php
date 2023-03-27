        <section class="col-4 p-5 mt-5" style="width: 30%;">
           <form action="results.php" class="mb-5" id="searchForm"> 
              <label for="q"><h5>Search</h5></label><br/>
              <input class="mb-2" type="search" id="query" name="q" placeholder="Search...">
              <br/>
              <button type="submit">Search</button>
           </form>

                <?php 
                if(isset($_POST['subscribe'])){
                    $name = mysqli_real_escape_string($db, $_POST['name']);
                    $email = mysqli_real_escape_string($db, $_POST['email']);
                    
                    $query = "INSERT INTO subscribers (name, email) VALUES ('$name', '$email')";

                    $db->query($query);
                } 
                ?>
           <form class="mb-5"id="subscribeForm" method="post"> 
                <label for="name"><h5>Subscribe</h5></label><br/>
                <input class="mb-2" type="text" placeholder="Name" name="name" required>
                <br/>
                <input class="mb-2" type="text" placeholder="Email address" name="email" required>
                <br/>
                <input type="submit" name="subscribe" value="Subscribe">
           </form>

           <div class="sidebar-module">
                <h4>Categories</h4>
                <hr>
                <?php
                    $q = "SELECT * FROM categories";
                    $categories = $db->query($q);
                ?>
                <ul class="list-unstyled">
                <?php while($c = $categories->fetch_assoc()) { ?>
                <li><a href="index.php?category=<?php echo $c['id']; ?>"><?php echo $c['text']; ?></a></li>
                <?php } ?>
                </ul>
           </div>
        </section>
