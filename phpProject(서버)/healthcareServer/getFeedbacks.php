<?php
    # Get Feedbacks
    
    header('content-type: text/html; charset=utf-8');
    // DB Connection Information
    $connect = mysqli_connect("localhost", "manager", "SWcap23!") or die("Fail to connect SQL server");
    
    // DB Connection(User)
    mysqli_select_db($connect, "Daily");
    
    $id = $_POST["output"];
    
    // Fetch UserInfo using sql
    $sql = "SELECT feedback FROM Feedbacks WHERE id = '$id' ORDER BY date DESC;";
    $result = mysqli_query($connect, $sql);
    $resultArray = array();

    // make result to JSON Array
    if($result->num_rows == 0)
        echo -1;
    else {
        while ($row = mysqli_fetch_assoc($result))
            $resultArray[] = $row;
    
        // JSON Array encoding
        $resultArray = json_encode($resultArray, JSON_UNESCAPED_UNICODE);
    
        // Send resultArray
        echo $resultArray;
    }
    
    // Disconnect DB
    mysqli_close($connect);
?>