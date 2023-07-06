
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
</head>

<body style="width: 800px;">
    <?php include('./header2.php');?>
<?php
    
$Err = $passwordErr = $npasswordErr = $cpasswordErr = "";
$password = $npassword =$cpasswordp = "";
if(isset ($_POST['Submit'])){
    $password = $_POST['password'];
    $npassword = $_POST['npassword'];
    $cpassword = $_POST['cpassword'];

if(empty($password) || empty($npassword) || empty($cpassword)){
        $Err = "Please fill up all the informations!";
    }
    else{
        if(!preg_match( "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $p)){
        $pErr =" Minimum eight characters, at least one letter, one number and one special character!";
         }
        if(!strcmp($password, $npassword)){
          $npErr = "New Password should not be same as the Current Password!";
         }
        if(strcmp($npassword, $cpassword))
         {
            $cpErr = "New Password must match with the Retyped Password!";
         }
    }
}
?>  


                <form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">

                   <?php include ('./account.php'); ?>
    <fieldset>
        <legend> <h2>CHANGE PASSWORD</h2> </legend>
        <label for="password"> Current Password : </label>
        <input type="text" name="password"><span style="color: red">*<?php echo $passwordErr?><br></span>
        <label for="npassword"style="color: green"> New Password : </label>
        <input type="text" name="npassword"><span style="color: red">*<?php echo $npasswordErr?><br></span> 
        <label for="cpassword" style="color: red"> Retype New Password : </label>
        <input type="text" name="cpassword"><span style="color: red">*<?php echo $cpasswordErr?><br></span>     
        <span class="underline">__________________________________________</span><br><br> 
        <label style="color: red"><?php echo $Err ?></label>  <br>
        <input type="submit" name="Submit" value="Submit">
    </fieldset>
    </form> 
       <?php include ('./footer.php'); ?>
</body>
</html>