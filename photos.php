
    <?php include('partials-front/menu.php'); ?>

    <!-- photos sEARCH Section Starts Here -->
    <section class="photos-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>photos-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Photos.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- photos sEARCH Section Ends Here -->



    <!-- photos MEnu Section Starts Here -->
    <section class="photos-menu">
        <div class="container">
            <h2 class="text-center">Recent Photos</h2>

            <?php 
                //Display photoss that are Active
                $sql = "SELECT * FROM tbl_photo WHERE active='Yes'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the photoss are availalable or not
                if($count>0)
                {
                    //photoss Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="photos-menu-box">
                            <div class="photos-menu-img">
                                <?php 
                                    //CHeck whether image available or not
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

                                <a href="<?php echo SITEURL; ?>order.php?photos_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //photos not Available
                    echo "<div class='error'>photos not found.</div>";
                }
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- photos Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>