<?php 

    require($_SERVER['DOCUMENT_ROOT'] . "/RMS/session.php");

    
    if(isset($_POST['editid'])) {

        $id = $_POST['editid'];

        $sql = "SELECT * FROM table_data WHERE id = {$id}";
        $data = mysqli_query($conn, $sql);

        $data = mysqli_fetch_assoc($data);
        print_r(json_encode($data));
    }



    // This request is from food lists page used to get data and fill form fields
    if(isset($_POST['foodid'])) {

        $id = $_POST['foodid'];

        $sql = "SELECT * FROM fooditems WHERE id = {$id}";
        $data = mysqli_query($conn, $sql);

        $data = mysqli_fetch_assoc($data);
        print_r(json_encode($data));
    }