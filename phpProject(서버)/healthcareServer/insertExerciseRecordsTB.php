<?php
    # Insert into ExerciseRecords TABLE
    
    header('content-type: text/html; charset=utf-8');
    // DB connection information
    $connect = mysqli_connect("localhost", "manager", "SWcap23!") or die("Fail to connect SQL server");
    
    // Choose DB
    mysqli_select_db($connect, "User");
    
    $id = $_POST["u_id"];
    $date = $_POST["u_date"];
    $routineName = $_POST["u_routineName"];
    $bodypart = $_POST["u_bodypart"];
    $exerciseName = $_POST["u_exerciseName"];
    $exerciseInfo = $_POST["u_exerciseInfo"];
    $time = $_POST["u_time"];
    $memo = $_POST["u_memo"];
    
    // Insert user dietRecords
    $sql = "INSERT INTO ExerciseRecords (id,date,routine,bodypart,exercise_name,exercise_info,time,memo)
                VALUES ('$id','$date','$routineName','$bodypart','$exerciseName','$exerciseInfo','$time','$memo');";
    $result = mysqli_query($connect, $sql);
    
    // Check result
    if (!$result) die("User insert failed");
    
    // DB connection close
    mysqli_close($connect);
?>