<?php
    # Get Events
    
    header('content-type: text/html; charset=utf-8');
    // DB Connection Information
    $connect = mysqli_connect("localhost", "manager", "SWcap23!") or die("Fail to connect SQL server");
    
    // DB Connection(Daily)
    mysqli_select_db($connect, "Daily");
    
    // Today date
    $date = date('Y-m-d');
    
    // Fetch all events(passed)
    $sql = "SELECT issue FROM Issues WHERE date < '$date' AND flag = 0 ORDER BY date DESC;";
    $result = mysqli_query($connect, $sql);
    $resultArray = array();
    
    // Fetch all events(onGoing)
    $sql = "SELECT issue FROM Issues WHERE date >= '$date' AND flag = 0 ORDER BY date DESC;";
    $result2 = mysqli_query($connect, $sql);

    // make result to JSON Array
    while ($row = mysqli_fetch_assoc($result))
        $resultArray[] = $row;

    if (($size = count($resultArray)) < 6) {
        for (; $size < 6; $size++)
            array_push($resultArray,array("issue" => "No event"));
    }
    
    while ($row = mysqli_fetch_assoc($result2))
        $resultArray[] = $row;
    
    if (($size = count($resultArray)) < 12) {
        for (; $size < 12; $size++)
            array_push($resultArray,array("issue" => "No event"));
    }

    // JSON Array encoding
    $resultArray = json_encode($resultArray, JSON_UNESCAPED_UNICODE);
    
    // Send resultArray
    echo $resultArray;
    
    // Disconnect DB
    mysqli_close($connect);
?>