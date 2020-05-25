                <!-- Blog Sidebar Widgets Well -->
                <div class="col-md-4">

              
               
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Search</h4>
                <form action="search.php" method="post"> <!-- if action field is empty, it will not send it anywhere.-->
                    <div class="input-group">
                        <input name="search" type="text" class="form-control"> <!-- In order for query to work, input name should be "search"  -->
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit"> <!-- button name and type should be submit otherwise it wont work  -->
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                    </form> <!-- end of form -->
                    <!-- /.input-group -->
                </div>
                
                <?php
                
                    $query = "SELECT * FROM categories"; // This can be limited to only a specific number only by adding 'LIMIT <NUMBER>' after categories
                    $select_all_categories_query = mysqli_query($connection,$query);
                
                ?>

                <!-- Blog Categories Well -->
                <div class="well">
                   <?php
                
                    $query = "SELECT * FROM categories";
                    $select_all_categories_sidebar = mysqli_query($connection,$query);
                    
                    ?>
                    
                    <h4>Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                             <?php  
                                while ($row = mysqli_fetch_assoc($select_all_categories_sidebar)) {
                                $cat_title = $row['cat_title'];
                                echo "<li><a href='#'>{$cat_title}</a></li>";
                                }
                             ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                
                
                
                
                

                <!-- Side Widget Well -->
                <?php include "widget.php"?>

            </div>
