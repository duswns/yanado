<?php
    # Get Notices
    
    header('content-type: text/html; charset=utf-8');
    // DB Connection Information
    $connect = mysqli_connect("localhost", "manager", "SWcap23!") or die("Fail to connect SQL server");
    
    // DB Connection(Daily)
    mysqli_select_db($connect, "Daily");
    
    // Fetch all notices
    $sql = "SELECT issue FROM Issues WHERE flag = 1 ORDER BY date DESC;";
    $result = mysqli_query($connect, $sql);
    $resultArray = array();

    // make result to JSON Array
    if($result->num_rows == 0)
        echo -1;
    else{
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