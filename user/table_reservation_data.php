<?php
require("../session.php");


$get_user_data_query = "SELECT * FROM users_data WHERE email = '{$_SESSION['email']}'";
$get_user_data = mysqli_query($conn, $get_user_data_query) or die("User Not available");
$user_data = mysqli_fetch_assoc($get_user_data);

// get tables info and compare with seats

if (isset($_POST['book-table'])) {

    // Function to sanitize user input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (empty($_POST["select_date"])) {
        echo "Date is required";
        echo $_POST['select_date'];
        exit();
    } else {
        $res_date = test_input($_POST["select_date"]);
    }
   
    if (empty($_POST['select_guests'])) {
       echo "Guests is required";
       exit();
    } else {
        $res_guests = test_input($_POST['select_guests']);
        if (!preg_match("/[0-9]/", $res_guests)) {
            // $res_guestsErr = "Only date allowed";
            echo "Only Guests allowed";
            exit();
        }
    }
    
    if (empty($_POST['firstName'])) {
        echo "firstName is required";
        exit();
    } else {
        $firstName = test_input($_POST['firstName']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $firstName)) {
            // $firstNameErr = "Only firstName allowed";
            echo "Only firstName allowed";
            exit();
        }
    }
    
    if (empty($_POST['lastName'])) {
        echo "lastName is required";
        exit();
    } else {
        $lastName = test_input($_POST['lastName']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lastName)) {
            // $lastNameErr = "Only lastName allowed";
            echo "Only lastName allowed";
            exit();
        }
    }
    
    if (empty($_POST['email'])) {
        echo "email is required";
        exit();
    } else {
        $email = test_input($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // $emailErr = "Invalid email format";
            echo "Invalid email format";
            exit();
        }
    }
    
    if (empty($_POST['contact_no'])) {
        echo "contact_no is required";
        exit();
    } else {
        $contact_no = test_input($_POST['contact_no']);
        if (!preg_match("/[0-9]/", $contact_no) && strlen($contact_no) == 10) {
            // $contact_noErr = "Only contact_no allowed";
            echo "Only contact_no allowed";
            exit();
        }
    }
    
    if (empty($_POST['request'])) {
        echo "request is required";
        exit();
    } else {
        $request = test_input($_POST['request']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $request)) {
            // $requestErr = "Only request allowed";
            echo "Only request allowed";
            exit();
        }
    }



    // rt_query === reserved table query
    $rt_query = "SELECT table_id FROM table_reserved WHERE status = 0";
    $rt_res = mysqli_query($conn, $rt_query) or die(mysqli_error($conn));
    $rt = [];
    while ($d = mysqli_fetch_assoc($rt_res)) {
        array_push($rt, $d['table_id']);
    }

    $str = implode(", ", $rt);

    if(!empty($res_guests)) {
        $t_sql = "SELECT * FROM table_data WHERE seats >= {$res_guests}";
        if($str) {
            $t_sql .= " AND id NOT IN ({$str})";
        }
        $t_res = mysqli_query($conn, $t_sql);
        if($t_res) {
            $t_data = mysqli_fetch_assoc($t_res);
        }else {
            echo "Table are not available";
        }
    }


    if ($_POST['book-table'] == "Book" && !empty($t_data)) {

        $sql2 = "INSERT INTO 
                        customer_guests_details
                        (user_id, table_id, guests_count, first_name, last_name, email, contact_no, request)
                    VALUES
                    ('{$user_data['id']}', '{$t_data['id']}', '{$res_guests}', '{$firstName}', '{$lastName}', '{$email}', '{$contact_no}', '{$request}')";

        $sql = "INSERT INTO 
                        table_reserved
                        (user_id, table_id, date)
                    VALUES
                        ({$user_data['id']}, {$t_data['id']}, '{$res_date}')";

        if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
            header("Location: table_reserved.php");
            exit();
        }
    }

    if ($_POST['book-table'] == "Update") {

        $table_id = $_POST['table_id'];

        $sql2 = "UPDATE 
                        customer_guests_details
                    SET
                        guests_count = '{$res_guests}', 
                        first_name = '{$firstName}', 
                        last_name = '{$lastName}', 
                        email = '{$email}', 
                        contact_no = '{$contact_no}', 
                        request = '{$request}'
                    WHERE
                        user_id = '{$user_data['id']}'
                    AND
                        table_id = '{$table_id}'
                    ";

        if (mysqli_query($conn, $sql2)) {
            header("Location: table_reserved.php");
            exit();
        } else {
            echo mysqli_error($conn);
        }
    }
}
