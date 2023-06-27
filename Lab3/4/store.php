<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["name"]))  
      {  
           $error = "<label>Enter Name</label>";  
      }
      else if(empty($_POST["email"]))  
      {  
           $error = "<label>Enter an e-mail</label>";  
      }  
      else if(empty($_POST["un"]))  
      {  
           $error = "<label>Enter a username</label>";  
      }  
      else if(empty($_POST["pass"]))  
      {  
           $error = "<label >Enter a password</label>";  
      }
      else if(empty($_POST["Cpass"]))  
      {  
           $error = "<label>Confirm password field cannot be empty</label>";  
      } 
      else if(empty($_POST["gender"]))  
      {  
           $error = "<label>Gender cannot be empty</label>";  
      } 
       
      else  
      {  
           if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $new_data = array(  
                     'name'               =>     $_POST['name'],  
                     'e-mail'          =>     $_POST["email"],  
                     'username'     =>     $_POST["un"],  
                     'gender'     =>     $_POST["gender"],  
                     'dob'     =>     $_POST["dob"]  
                );  
                $array_data[] = $new_data;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "<label>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           
      </head>  
      <body>  
           <br />  
           <div>                 
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br /> 
                     <fieldset><legend>REGISTATION</legend>
                          <label>Name</label>
                          <input type="text" name="name" /><br />  
                          <span>_______________________________________</span><br>
                          <label>E-mail</label>
                          <input type="text" name = "email"/><br />
                          <span>_______________________________________</span><br>
                          <label>User Name</label>
                          <input type="text" name = "un"/><br />
                          <span>_______________________________________</span><br>
                          <label>Password</label>
                          <input type="password" name = "pass"/><br />
                          <span>_______________________________________</span><br>
                          <label>Confirm Password</label>
                          <input type="password" name = "Cpass"/><br />
                          <span>_______________________________________</span><br>

                         <fieldset>
                              <legend>Gender</legend>
                         <input type="radio" id="male" name="gender" value="male">
                          <label for="male">Male</label>                     
                          <input type="radio" id="female" name="gender" value="female">
                          <label for="female">Female</label>
                          <input type="radio" id="other" name="gender" value="other">
                          <label for="other">Other</label><br>
                     </fieldset>

                          <fieldset>

                          <legend>Date of Birth:</legend>
                          <input type="date" name="dob"> <br><br>
                         </fieldset> 
                          
                          <input type="submit" name="submit" value="Submit"/>
                          <input type="reset" name="reset" value="Reset"><br />                      
                          <?php  
                          if(isset($message))  
                          {  
                               echo $message;  
                          }  
                          ?> 
                     </fieldset>
                      
                </form>  
                <a href="load.php">Show Data</a>
           </div>  
           <br />  
      </body>  
 </html>  