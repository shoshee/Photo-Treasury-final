
    <?php include('partials-front/menu.php'); ?>

    <!-- photos sEARCH Section Starts Here -->
    <section class="photos-search text-center">
        <div class="container">
            <?php 

                //Get the Search Keyword
                $search = $_POST['search'];
            
            ?>


            <h2>photoss on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- photos sEARCH Section Ends Here -->



    <!-- photos MEnu Section Starts Here -->
    <section class="photos-menu">
        <div class="container">
            <h2 class="text-center">photos Menu</h2>

            <?php 

                //SQL Query to Get photoss based on search keyword
                $sql = "SELECT * FROM tbl_photo WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether photos available of not
                if($count>0)
                {
                    //photos Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="photos-menu-box">
                            <div class="photos-menu-img">
                                <?php 
                                    // Check whether image name is available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/photos/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php 

                                    }
                                ?>
                                
                            </div>

                            <div class="photos-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="photos-price">$<?php echo $price; ?></p>
                                <p class="photos-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="#" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //photos Not Available
                    echo "<div class='error'>photos not found.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- photos Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>