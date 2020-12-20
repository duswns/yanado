<?php
    # Get ExerciseLists TABLE

    header('content-type: text/html; charset=utf-8');
    // DB Connection Information
    $connect = mysqli_connect("localhost", "manager", "SWcap23!") or die("Fail to connect SQL server");
    
    $connect2 = mysqli_connect("localhost", "manager", "SWcap23!") or die("Fail to connect SQL server");
    
    // DB Connection(Exercise)
    mysqli_select_db($connect, "Exercise");
    
    // Fetch all exerciseDB using sql
    $sql = "SELECT * FROM ExerciseLists;";
    $result = mysqli_query($connect, $sql);
    $resultArray = array();
    
    // DB Connection(AppInfo)
    mysqli_select_db($connect2, "AppInfo");
    
    // Fetch exercise DB version using sql
    $sql = "SELECT exercise FROM Versions;";
    $result2 = mysqli_query($connect2, $sql);
    $version = mysqli_fetch_row($result2)[0];
    
    // make result to JSON Array
    if ($result->num_rows == 0)
        die("No matching data");
    else {
        while ($row = mysqli_fetch_assoc($result))
            $resultArray[] = $row;
    
        // JSON Array encoding
        $resultArray = json_encode($resultArray, JSON_UNESCAPED_UNICODE);
    
        // Send exercise DB version and resultArray
        echo "version: $version";
        echo $resultArray;
    }
    
    // Disconnect DB
    mysqli_close($connect);
    mysqli_close($connect2);
?>
