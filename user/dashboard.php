<?php

require("../session.php");

$get_user_data_query = "SELECT * FROM users_data WHERE email = '{$_SESSION['email']}'";
$get_user_data = mysqli_query($conn, $get_user_data_query) or die("User Not available");
$user_data = mysqli_fetch_assoc($get_user_data);

$category_query = "SELECT DISTINCT(food_category), primary_img FROM foodItems";
$category_data = mysqli_query($conn, $category_query);


$css = "uDashboard";
include("./header.php");

?>


<main>


    <section class="categories">
        <a href="./table_reservation.php">
            <div>
                <span class="icon">
                    <i class="fa-solid fa-utensils"></i>
                </span>
                <span>
                    Book Table
                </span>
            </div>
        </a>

        <a href="#">
            <div class="active">
                <span class="icon">
                    <i class="fa-solid fa-utensils"></i>
                </span>
                <span>
                    Delivery
                </span>
            </div>
        </a>

        <a href="#">
            <div>
                <span class="icon">
                    <i class="fa-solid fa-utensils"></i>
                </span>
                <span>
                    Nightlife
                </span>
            </div>
        </a>

    </section>

    <hr>

    <section class="filters">

        <!-- applied filter and their count -->
        <div class="filter-status">
            <span class="count">0</span>
            <span>
                Filters
            </span>
        </div>

        <div class="filter-list"></div>

    </section>


    <section class="best-categories">
        <div class="title">Inspiration for your first order</div>
        <div class="boxes">

                <?php while ($data = mysqli_fetch_assoc($category_data)) : ?>
                    <div class="box">
                        <img src="../assets/images/<?= $data['primary_img']; ?>" alt="Food Category">
                        <div class="food-name"><?= $data['food_category']; ?></div>
                    </div>
                <?php endwhile; ?>

        </div>
    </section>


    <section class="menu-list">
        <div class="title">
            Get Your Loved Food
        </div>

        <div class="result-ajax-data">

        </div>

    </section>

</main>


<script>
    $(document).ready(function() {

        // fetch all data by default
        function loadData(obj) {
            $.ajax({
                url: "load_dynamic_data.php",
                type: "POST",
                data: obj,
                success: function(data) {
                    if (data) {
                        $(".load-more").remove();
                        $(".result-ajax-data").append(data);
                    } else {
                        $("#load-more").html("Finished");
                        $("#load-more").prop("disabled", true);
                    }
                },
            });
        }

        // fetching first time 
        loadData();

        // function to check how many filters applied
        function checkFilters() {
            let appliedFilters = document.querySelectorAll(".applied-filter");

            let count = appliedFilters.length;
            document.querySelector(".count").innerHTML = count;

            let objFilter = []

            appliedFilters.forEach((element, index) => {
                let name = element.children[0].innerText;
                objFilter = [
                    ...objFilter,
                    name,
                ]
            });

            return objFilter;
        }


        $(document).on("click", "#load-more", function() {
            $("#load-more").html("Loading...");
            var page_id = $(this).data("id");

            let obj = {
                page_no: page_id
            }

            filterData = checkFilters();

            if (filterData != "") {
                $(".result-ajax-data").empty();
                obj = {
                    ...obj,
                    filter: filterData
                }
            }

            loadData(obj);
        });


        $(document).on("click", ".box", function() {
            let filter = $(this).children(".food-name").text();

            let checkClick = $(this).hasClass("active");
            if (checkClick) {
                return;
            }

            $(".filter-list").append(`<div class="applied-filter"><span class = "name">${filter}</span><span class = "close">X</span></div>`);
            $(this).addClass("active");


            filterData = checkFilters();

            $(".result-ajax-data").empty();
            let obj = {
                filter: filterData
            }
            loadData(obj);
        });


        $(document).on("click", ".applied-filter .close", function() {

            let filterName = $(this).siblings(".name").html();

            let searchFilter = document.querySelectorAll(".box.active");

            searchFilter.forEach((element, index) => {
                let name = element.children[1].innerText;
                if (name == filterName) {
                    element.classList.remove("active")
                }
            });


            $(this).parent().remove();

            filterData = checkFilters();

            $(".result-ajax-data").empty();
            let obj = {
                filter: filterData
            }
            loadData(obj);
        });

    });
</script>

<?php include("./footer.php") ?>