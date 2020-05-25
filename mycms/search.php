 <!-- Header -->
<?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>


<!-- Navigation -->
<?php include "includes/navigation.php"; ?>
    
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
               
               <!-- Below is a php code that will submit the search via POST superglobal; The query will then go through the DB and find post_tags like the search (posts that contain similar tags);  -->
              <?php 
                    
                if(isset($_POST['submit'])){
                
                    $search= $_POST['search'];
                    
                    $query ="SELECT * FROM posts WHERE post_tags LIKE '%$search%'"; // 'LIKE' keyword will provide results with similar context, so it will post multiple results; ADDITION: % is used before and after the variable $search, as this is string so it is a must!
                    $search_query = mysqli_query($connection, $query);
                    
                    if(!$search_query){
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    $count = mysqli_num_rows($search_query);
                    if($count == 0) {
                        
                        echo "<h1>No result found... </>";
                        
                    }
                    
                    else {
                
                    $select_all_posts_query = mysqli_query($connection,$query);
                    
                    while($row = mysqli_fetch_assoc($search_query)) {
                        
                        
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_content = $row['post_content'];
                        $post_image = $row['post_image'];
                    
                     ?>
                     
                <h1 class="page-header">Page Heading <small>Secondary Text</small></h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
          <?php    }
                }       
            } 
        ?>
                
            </div>

<!-- Blog Sidebar Widgets Column -->
<?php include "includes/sidebar.php"; ?>
            
        </div>
        <!-- /.row -->

        <hr>
        
 <!-- Footer -->
<?php include "includes/footer.php"; ?>
     
</body>

</html>