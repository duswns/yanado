<?php
    # Update DietRecords TABLE
    
    header('content-type: text/html; charset=utf-8');
    // DB connection information
    $connect = mysqli_connect("localhost", "manager", "SWcap23!") or die("Fail to connect SQL server");
    
    // Choose DB
    mysqli_select_db($connect, "User");

    $id = $_POST["u_id"];
    $date = $_POST["u_date"];
    $foodname = $_POST["u_foodname"];
    $kcal = $_POST["u_kcal"];
    $time_category = $_POST["u_time_category"];
    $amount = $_POST["u_amount"];
    $time = $_POST["u_time"];
    $memo = $_POST["u_memo"];
    
    // Update DietRecords
    $sql = "UPDATE DietRecords SET foodname = '$foodname', kcal = '$kcal',amount = '$amount', 
            time = '$time', memo = '$memo'
            WHERE id = '$id' AND date = '$date' AND time_category = '$time_category';";
    $result = mysqli_query($connect, $sql);
    
    // Check result
    if (!$result) die("User update failed");
        
    // DB connection close
    mysqli_close($connect);
?>