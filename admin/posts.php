<?php include('./includes/header.php'); ?>
        
        <div class="lime-container">
            <div class="lime-body">
                <div class="container">
                    
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Posts</h5>
                                    <a href="new_post.php" class="btn-info btn-lg">Add New</a>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Date Posted</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($posts -> num_rows > 0) {
                                                while($row = $posts->fetch_assoc()) {?>
                                                <tr>
                                                    <td><?php echo $row['date'] ?></td>
                                                    <td><?php echo $row['title'] ?></td>
                                                    <td><a href="#" class="btn btn-warning me-3">Edit</a></td>
                                                </tr>
                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                    </div>      
                                </div>
                            </div>
                        </div>
                        
                    
                </div>
                
                
            </div>

<?php include('./includes/footer.php'); ?>
