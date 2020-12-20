<?php
    # Insert into DietRecords TABLE
    
    header('content-type: text/html; charset=utf-8');
    // DB connection information
    $connect = mysqli_connect("localhost", "manager", "SWcap23!") or die("Fail to connect SQL server");
    
    // Choose DB
    mysqli_select_db($connect, "User");
    
    $id = $_POST["u_id"];
    $date = $_POST["u_date"];
    $foodname = $_POST["u_foodname"];
    $kcal = (double) $_POST["u_kcal"];
    $time_category = $_POST["u_time_category"];
    $amount = $_POST["u_amount"];
    $time = $_POST["u_time"];
    $memo = $_POST["u_memo"];
    
    // Insert user dietRecords
    $sql = "INSERT INTO DietRecords (id,date,foodname,kcal,time_category,amount,time,memo)
            VALUES ('$id','$date','$foodname',$kcal,'$time_category','$amount','$time','$memo');";
    $result = mysqli_query($connect, $sql);
    
    // Check result
    if (!$result) die("User insert failed");
    
    // DB connection close
    mysqli_close($connect);
?>