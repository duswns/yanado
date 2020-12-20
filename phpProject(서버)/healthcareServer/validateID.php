<?php
    # Validate ID

    header('content-type: text/html; charset=utf-8');
    // DB connection information
    $connect = mysqli_connect("localhost", "manager", "SWcap23!") or die("Fail to connect SQL server");
    
    // Choose DB
    mysqli_select_db($connect, "User");
    
    $id = $_POST["u_id"];
    
    $sql = "SELECT * FROM Users WHERE id = '$id';";
    $result = mysqli_query($connect, $sql);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0)
            echo $row["flag"];
        else
            echo 0;
    } else
        echo mysqli_errno($connect);
    
    mysqli_close($connect);
?>