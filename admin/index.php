<?php include('./includes/header.php'); ?>
        
        <div class="lime-container">
            <div class="lime-body">
                <div class="container">
                    
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Recent Posts</h5>
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
                                                    <td><a href="#" class="btn btn-warning me-3">Edit</a><a href="#" class="btn btn-danger">Delete</a></td>
                                                </tr>
                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                    </div>      
                                </div>
                            </div>
                        </div>
                        
                    
                </div>
                <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Recent Comments</h5>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Comment</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php //if($posts -> num_rows > 0) {
                                                //while($row = $posts->fetch_assoc()) {?>
                                                <tr>
                                                    <td><?php echo "March 22, 2023";?></td>
                                                    <td><?php echo "test title"; ?></td>
                                                    <td><a href="#" class="btn btn-success me-3">Approve</a><a href="#" class="btn btn-danger">Delete</a></td>
                                                </tr>
                                                <?php// }} ?>
                                            </tbody>
                                        </table>
                                    </div>      
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Recent Categories</h5>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Comment</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php //if($posts -> num_rows > 0) {
                                                //while($row = $posts->fetch_assoc()) {?>
                                                <tr>
                                                    <td><?php echo "March 22, 2023";?></td>
                                                    <td><?php echo "test title"; ?></td>
                                                    <td><a href="#" class="btn btn-warning me-3">Edit</a><a href="#" class="btn btn-danger">Delete</a></td>
                                                </tr>
                                                <?php// }} ?>
                                            </tbody>
                                        </table>
                                    </div>      
                                </div>
                            </div>
                        </div>
                </div>
            </div>

<?php include('./includes/footer.php'); ?>
