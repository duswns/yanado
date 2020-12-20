<?php
    # Update Users TABLE
    
    header('content-type: text/html; charset=utf-8');
    // DB connection information
    $connect = mysqli_connect("localhost", "manager", "SWcap23!") or die("Fail to connect SQL server");
    
    // Choose DB
    mysqli_select_db($connect, "User");
    
    $prevId = $_POST["u_prevId"];
    $id = $_POST["u_id"];
    $pw = $_POST["u_pw"];
    $username = $_POST["u_username"];
    $height = (int) $_POST["u_height"];
    $weight = (int) $_POST["u_weight"];
    $targetweight = (int) $_POST["u_targetweight"];
    $address = $_POST["u_address"];
    
    // Update userInfo
    $sql = "UPDATE Users SET id = '$id', password = '$pw', username = '$username', height = $height, 
            weight = $weight, targetweight = $targetweight, address = '$address', flag = 1 
            WHERE id = '$prevId';";
    $result = mysqli_query($connect, $sql);
    
    // Check result
    if (!$result) die("User update failed");
    
    // DB connection close
    mysqli_close($connect);
?>
