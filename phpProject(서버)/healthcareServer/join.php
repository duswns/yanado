<?php
    # Join from app
    
    header('content-type: text/html; charset=utf-8');
    // DB connection information
    $connect = mysqli_connect("localhost", "manager", "SWcap23!") or die("Fail to connect SQL server");
    
    // Choose DB
    mysqli_select_db($connect, "User");
    
    $id = $_POST["u_id"];
    $pw = $_POST["u_pw"];
    $username = $_POST["u_username"];
    $height = (int) $_POST["u_height"];
    $weight = (int) $_POST["u_weight"];
    $targetweight = (int) $_POST["u_targetweight"];
    $address = $_POST["u_address"];
    
    // Insert user verification info
    $sql = "INSERT INTO Users (id,password,username,height,weight,targetweight,address,flag)
                        VALUES ('$id','$pw','$username',$height,$weight,$targetweight,'$address',1);";
    $result = mysqli_query($connect, $sql);
    
    // Check result
    if (! $result)
        die("User insert failed");
    
    // DB connection close
    mysqli_close($connect);
?>