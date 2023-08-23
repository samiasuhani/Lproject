<?php
	session_start();
	
	if(isset($_POST['submit'])){
		$email= $_POST['email'];
		$password= $_POST['password'];
		if($email != '' && $password != ''){
          
		
			$dtls = file_get_contents('myfile.json');
            $dtlsOk=json_decode($dtls);
           

			$name = $dtlsOk-> name;
			$userpassword = $dtlsOk-> password;

			$connect = mysqli_connect("localhost","root","","my_data");
			$read = "SELECT * FROM my_table";
			$query = mysqli_query($connect, $read);
			while($row = mysqli_fetch_assoc($query)){
				print_r($row);

			}

		 		   
		    if(!isset($_COOKIE[$email])) {
				echo " $email ";
		 } else {
		 echo "no_email";
		 
		  }
	   
	

			if($email == $email && $password == $userpassword){
				$_SESSION['flag'] = 'true';
				header('location: ../view/Dashboard.php');
								
			}else{
				
				echo 'invlaid username/password';
			}
		}else{
			echo "null value found";
		   }
	}else{
		echo "invalid request";
	}

?>