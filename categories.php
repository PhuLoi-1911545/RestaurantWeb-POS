<?php
    include('partials_front/header.php');
?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
                // 1. SQL to display categories from db
                $sql = "SELECT * FROM category WHERE active='Yes'";
                $res = mysqli_query($connection, $sql);

                $count = mysqli_num_rows($res);

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];

                        ?>
                            <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                                <div class="box-3 float-container">
                                    <?php
                                        if ($image_name != "") {
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" class="img-responsive img-curve">
                                            <?php
                                        } else {
                                            echo "<h3 class='text-danger text-center'> Image not availables! </h3>"; 
                                        }
                                    ?>

                                    <h3 class="float-text text-white"><?php echo $title; ?></h3>
                                </div>
                            </a>
                        <?php
                    }
                } else {
                    echo "<h3 class='text-danger text-center'> Category not added! </h3>"; 
                }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

<?php
    include('partials_front/footer.php');
?>