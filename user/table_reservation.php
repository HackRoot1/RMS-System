<?php

require("../session.php");

$get_user_data_query = "SELECT * FROM users_data WHERE email = '{$_SESSION['email']}'";
$get_user_data = mysqli_query($conn, $get_user_data_query) or die("User Not available");
$user_data = mysqli_fetch_assoc($get_user_data);


if (isset($_GET['t_id'])) {
    $t_id = $_GET['t_id'];

    $sql = "SELECT * FROM `customer_guests_details` WHERE table_id = '{$t_id}'";
    $table_r_data = mysqli_query($conn, $sql);
    $table_r_data = mysqli_fetch_assoc($table_r_data);
}

    
$css = "table_reservation";
include("./header.php");
include("../time.php");

?>


    <main>

        <section class="categories">
            <a href="./table_reservation.php">
                <div class="active">
                    <span class="icon">
                        <i class="fa-solid fa-utensils"></i>
                    </span>
                    <span>
                        Book Table
                    </span>
                </div>
            </a>

            <a href="./dashboard.php">
                <div>
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


        <section class="table-reservation-section">

            <div class="table-reservation-info">
                <div class="title">Reserve Table</div>

                <div class="table-reservation-form">
                    <form action="./table_reservation_data.php" method="POST">
                        <div class="booking-details">
                            <div>
                                <span>Please select your booking details</span>
                                <div>
                                    <select name="select_date" id="Date" placeholder="Select Date">
                                        <option value="one" disabled selected>Select Date</option>
                                        <option value="<?= $current_date ?>"><?= $current_date ?></option>
                                        <option value="<?= $next_day ?>"><?= $next_day ?></option>
                                        <option value="<?= $day_after_next ?>"><?= $day_after_next ?></option>
                                    </select>

                                    <select name="select_guests" id="guests">
                                        <option value="one" disabled selected>Select Guests</option>
                                        <option value="1" <?= (isset($table_r_data['guests_count']) && $table_r_data['guests_count'] == '1') ? "selected" : "" ?>>1</option>
                                        <option value="2" <?= (isset($table_r_data['guests_count']) && $table_r_data['guests_count'] == '2') ? "selected" : "" ?>>2</option>
                                        <option value="3" <?= (isset($table_r_data['guests_count']) && $table_r_data['guests_count'] == '3') ? "selected" : "" ?>>3</option>
                                        <option value="4" <?= (isset($table_r_data['guests_count']) && $table_r_data['guests_count'] == '4') ? "selected" : "" ?>>4</option>
                                        <option value="5" <?= (isset($table_r_data['guests_count']) && $table_r_data['guests_count'] == '5') ? "selected" : "" ?>>5</option>
                                        <option value="6" <?= (isset($table_r_data['guests_count']) && $table_r_data['guests_count'] == '6') ? "selected" : "" ?>>6</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <span>Enter Guests Details</span>
                                <div>
                                    <input type="hidden" placeholder="First Name" name="table_id" value="<?= isset($t_id) ? $t_id : "" ?>">
                                    <input type="text" placeholder="First Name" name="firstName" value="<?= $table_r_data['first_name'] ?? "" ?>">
                                    <input type="text" placeholder="Last Name" name="lastName" value="<?= $table_r_data['last_name'] ?? "" ?>">
                                </div>
                                <div>
                                    <input type="text" placeholder="Email" name="email" value="<?= $table_r_data['email'] ?? "" ?>">
                                    <input type="text" placeholder="Phone" name="contact_no" value="<?= $table_r_data['contact_no'] ?? "" ?>">
                                </div>
                            </div>

                            <div>
                                <span>Additional Requests</span>
                                <textarea name="request" id="request" cols="30" rows="5"> <?= $table_r_data['request'] ?? "" ?></textarea>
                            </div>

                            <div class="btns">
                                <input type="submit" name="book-table" value="<?= isset($table_r_data['first_name']) ? "Update" : "Book" ?>">
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </section>


    </main>

<?php include("./footer.php") ?>