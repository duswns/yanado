<?php
    # Login from app

    header('content-type: text/html; charset=utf-8');
    // DB connection information
    $connect = mysqli_connect("localhost", "manager", "SWcap23!") or die("Fail to connect SQL server");
    
    // Choose DB
    mysqli_select_db($connect, "User");
    
    $id = $_POST["u_id"];
    $pw = $_POST["u_pw"];
    
    // Insert user verification info
    $sql = "SELECT * FROM Users WHERE id = '$id';";
    $result = mysqli_query($connect, $sql);
    
    // Check result
    if($result){
        $row = mysqli_fetch_assoc($result);
        if(is_null($row)) echo "ID does not exist";
        else{
            $r_email = strrev($id);
            $length = strlen($id);
            // Concatenate piece of r_email
            $piece = "";
            for($i=$row["flag"]-1; $i<$length; $i+=$row["flag"])
                $piece = $piece.$r_email[$i];
            
            // Password verification
            $piece_hash = hash("sha256",$piece);
            if($pw === $row["password"].$piece_hash){
                echo "success";
                $sql = "UPDATE Users SET flag = IF((flag+1)%($length+1) = 0, 1, flag+1) WHERE id = '$id'";
                mysqli_query($connect,$sql);
            }
            else echo "fail";
        }
    }
    else echo mysqli_error($connect);
        
    // DB connection close
    mysqli_close($connect);
?>