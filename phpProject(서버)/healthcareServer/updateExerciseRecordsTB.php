<?php
    # Update ExerciseRecords TABLE
    
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
    $prevTime = $_POST["u_prevTime"];
    
    // Update ExerciseRecords
    $sql = "UPDATE ExerciseRecords SET routine = '$routineName', bodypart = '$bodypart',
            exercise_name = '$exerciseName', exercise_info = '$exerciseInfo', time = '$time', memo = '$memo'
            WHERE id = '$id' AND date = '$date' AND time = '$prevTime';";
    $result = mysqli_query($connect, $sql);
    
    // Check result
    if (!$result) die("User update failed");
    
    // DB connection close
    mysqli_close($connect);
?>