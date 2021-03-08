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

    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>

    <!-- CAtegories Section Starts Here -->
    
    <!-- Categories Section Ends Here -->



    <!-- photos MEnu Section Starts Here -->
    <section class="photos-menu">
        <div class="container">
            <h2 class="text-center">Photos Collection</h2>

            <?php 
            
            //Getting photoss from Database that are active and featured
            //SQL Query
            $sql2 = "SELECT * FROM tbl_photo WHERE active='Yes' AND featured='Yes' LIMIT 6";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //CHeck whether photos available or not
            if($count2>0)
            {
                //photos Available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get all the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="photos-menu-box">
                        <div class="photos-menu-img">
                            <?php 
                                //Check whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not available.</div>";
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
                //photos Not Available 
                echo "<div class='error'>photos not available.</div>";
            }
            
            ?>

            

 

            <div class="clearfix"></div>

            

        </div><br>
        <br>
        <br>
        
        <div id="contact" class="contact-area">
        <p class="text-center">
            <h3>Photo Treasury</h3>
            <address>Level-4, 34, Awal Centre, Banani, Dhaka
            <br>
                Official: phototreasury@gmail.com
             <br> Helpline : 01320976430 (Available : 09:00am to 11:00pm)
            </address>
        </p>
        </div>

        
    </section>
    <!-- photos Menu Section Ends Here -->

    
    <?php include('partials-front/footer.php'); ?>