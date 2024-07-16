<?php

$css_page = "staff_dashboard";
include("./header.php");


$get_user_data_query = "SELECT * FROM users_data WHERE email = '{$_SESSION['email']}'";
$get_user_data = mysqli_query($conn, $get_user_data_query) or die("User Not available");
$user_data = mysqli_fetch_assoc($get_user_data);


?>


            <section class="main-section">
                <div class="title">
                    Welcome <?= $user_data['username'] ?> to Staff Dashboard
                </div>

            </section>




        </section>
    </main>
</body>
</html>