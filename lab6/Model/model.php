<?php

require_once 'db_connect.php';


function getUserInfo($email){
    $connect = db_connect();
    $selectquery = "SELECT * FROM `my_table` where email = ?";

    try {
        $stmt = $connect->prepare($selectquery);
        $stmt->execute([$email]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch();
    return $row;                  
}

function saveUserInfo ($email){



	$connect = db_connect();
  //  $selectQuery ="INSERT INTO `my_table` ( `username`, `password`, `email`, `gender`, `dob1`, `dob2`, `dob3`, `travel_lover`)
   //  VALUES (:username, :password, :email, :gender, :dob1, :dob2, :dob3, :Are_You_a_Travel_Lover );";

$selectQuery = "INSERT into  my_table (username, password, email, gender, dob1, dob2, dob3, travel_lover)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    try{
        $stmt = $connect->prepare($selectQuery);

        if (!$stmt->bind_param( 'ssssssss', $email['username'], $email['password'], $email['email'], $email['gender'],
            $email['dob1'], $email['dob2'], $email['dob3'], $email['travel_lover']))
        {
            echo "Error: ".$stmt->error;
            //exit();
        }

        $stmt->execute();

            return true;
    }catch(PDOException $e){
        echo $e->getMessage();
        return false;
    }
}






















 ?>