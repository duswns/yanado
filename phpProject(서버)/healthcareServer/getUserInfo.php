<?php
    # Get UserInfo matching with id

    header('content-type: text/html; charset=utf-8');
    // DB Connection Information
    $connect = mysqli_connect("localhost", "manager", "SWcap23!") or die("Fail to connect SQL server");
    
    // DB Connection(User)
    mysqli_select_db($connect, "User");
    
    $id = $_POST["output"];
    
    // Fetch UserInfo using sql
    $sql = "SELECT * FROM Users WHERE id = '$id';";
    $result = mysqli_query($connect, $sql);
    
    // Make result to JSON Object
    if ($result->num_rows == 0)
        die("No matching data");
    else {
        $row = mysqli_fetch_assoc($result);
        $resultObject = array(
            "username" => $row["username"],
            "height" => $row["height"],
            "weight" => $row["weight"],
            "targetweight" => $row["targetweight"],
            "address" => $row["address"],
            "flag" => $row["flag"]
        );
    
        // JSON Object encoding
        $resultObject = json_encode($resultObject, JSON_UNESCAPED_UNICODE);
    
        // Send resultObject
        echo $resultObject;
    }
    
    // Disconnect DB
    mysqli_close($connect);
?>