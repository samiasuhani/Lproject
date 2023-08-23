  
<?php

function db_connect(){
    $connect = mysqli_connect("localhost","root","","my_data");
    return $connect;
}

?>