<?php

include("../session.php");


// getting a limit of how many records we want to show in our page.
$limit_per_load = 6;


// setting page load's value if load button is pressed then page load's is changed 
if (isset($_POST['page_no'])) {
    $page = $_POST['page_no'];
} else {
    $page = 0;
}

$fetch_food_data_query = "SELECT * FROM foodItems";

if(isset($_POST['filter'])) {
    $filter = $_POST['filter'];
    $filterStr = implode("', '", $filter);
    $fetch_food_data_query .= " WHERE food_category IN ('{$filterStr}')";
    $last_page = $page + $limit_per_load;
    $fetch_food_data_query .= " LIMIT 0, {$last_page}";
    $fetch_food_data = mysqli_query($conn, $fetch_food_data_query);
}else {   
    $fetch_food_data_query .= " LIMIT {$page}, {$limit_per_load}";
    $fetch_food_data = mysqli_query($conn, $fetch_food_data_query);
}


// get num rows 
$fetch_food_data_num_rows = mysqli_num_rows($fetch_food_data);
?>


<div class="boxes">
    <?php if (mysqli_num_rows($fetch_food_data) > 0) : ?>
        <?php while ($foodItem = mysqli_fetch_assoc($fetch_food_data)) : ?>
            <?php $last_id = $foodItem['id']; ?>
            <div class="box">
                <a href="./us_food.php?s_item=<?= $foodItem['id'] ?>">
                    <div class="box-img">
                        <img src="../assets/images/<?= $foodItem['primary_img'] ?>" alt="Food Image">
                        <?php if ($foodItem['discount_percentage'] > 0) : ?>
                            <div class="discount"> <?= $foodItem['discount_percentage'] . "% Off" ?> </div>
                        <?php endif; ?>
                    </div>
                    <div class="box-title">
                        <span class="title"><?= $foodItem['food_name'] ?></span>
                        <span class="rating">4.3 <i class="fa-solid fa-star"></i></span>
                    </div>
                    <div class="details">
                        <span>
                            <?= $foodItem['food_description'] ?>
                        </span>
                        <span class="price">
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                            <?= $foodItem['price'] ?> for one
                        </span>
                    </div>
                </a>
            </div>
        <?php endwhile; ?>


</div>
<?php if((isset($last_page) && $last_page < $page) || $fetch_food_data_num_rows > 5): ?>
<div class="load-more">
    <button id="load-more" data-id="<?= $last_id ?>">
        Load More...
    </button>
</div>
<?php endif; ?>

<?php
    else :
        echo false;
    endif;

    mysqli_close($conn);
?>