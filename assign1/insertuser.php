<?php
     
     include 'phpenhancements.php';
     $addUsername="" ;  $addPassword="" ; $confirmPassword="";
     if ($_SERVER["REQUEST_METHOD"] == "POST") {   
         require_once ("settings.php"); //connection information
         $conn = @mysqli_connect($host,
                 $user,
                 $pwd,
                 $sql_db
         );
         
         $errMsg = "";
         if(isset($_POST["btnAddUser"])){
             if(isset($_POST["addUsername"])){
                 $addUsername .= $_POST["addUsername"];
             }
           
         if(isset($_POST["addPassword"]))
         {
             $addPassword .= $_POST["addPassword"];
         }
         
         if(isset($_POST["confirmPassword"]))
         {
             $confirmPassword .= $_POST["confirmPassword"];

         }
        
         if($addUsername != "" && $addPassword != "" && $confirmPassword != "" && strlen($addPassword) > 5){
            if ($addPassword != $confirmPassword){
                header("location: adduser.php?conpassword");
                //s $errMsg .= "<p>Confirmation Password not match<br /></p>";
             }else{
             $username = sanitise_input($addUsername);
             
             $addPassword = sanitise_input($addPassword);
             $confirmPassword = sanitise_input($confirmPassword);
        
             //encrypt the password
            //  $encrptPw = password_hash($addPassword, 
            //          PASSWORD_DEFAULT);
            $bcrypt = new Bcrypt(15);
            $hash = $bcrypt->hash($addPassword);
           
             //checks if connection is successful
             if(!$conn){
                 //Displays an error message 
                 echo "<p>Database connection failure</p>"; //not in production script

             } else{
                 $sql_table="login";
                 
                 if($errMsg != ""){
                     echo "<p>$errMsg</p>";
                 
                 }
                 else{
                     //Upon successful connection
                     $query1 = "CREATE TABLE IF NOT EXISTS `login` (
                         `userNum` int(11) NOT NULL AUTO_INCREMENT,
                         `username` varchar(100) NOT NULL,
                         `password` varchar(100) NOT NULL,
                         PRIMARY KEY (`userNum`)
                     ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
                     ";
                     $result1 = mysqli_query($conn, $query1);
                     // checks if the execution was successful
                     if(!$result1){
                         echo "<p>Something is wrong with ", $query1, "</p>";
                         //Would not show in a production script
                     }else{
                         //mysqli_free_result($result1);
                     }
             
                     $query3 = "select username from  $sql_table where username = '$addUsername'";
                     $result3 = mysqli_query($conn, $query3);
                     //Set up the SQL command to query or add data into the table
                     if(!$result3){
                         echo "<p>Something is wrong with ", $query3, "</p>";
                         //Would not show in a production script
                     }else{ 
                         if(mysqli_num_rows($result3)>0) {
                             echo "<p>Username already exist</p>";
                             header("location: adduser.php?Username%20already%20exist");
                         }
                         else{
                             mysqli_free_result($result3);
                             $query2 = "insert into $sql_table (username, password) values ('$addUsername', '$hash')";
                             //execute the query and store result into the result pointer
                             $result2 = mysqli_query($conn, $query2);
         
                             // checks if the execution was successful
                             if(!$result2){
                                 echo "<p>Something is wrong with ", $query2, "</p>";
                                 //Would not show in a production script
                             } else{
                                 //display an operation successful message
                                 header("location: adduser.php");
                                }
                                mysqli_free_result($result2);
                                     
                         }                       
                     }
                     //close the datbase connection
                     mysqli_close($conn);
                 } 
                 }// if successful database connection
             }
             }else if(strlen($addPassword) <5){
                header("location: adduser.php?insufficientlength");
             }
             else{
                header("location: adduser.php?Fill");
             }
           
         }
        }

        else{
           // $addUsername="" ;  $addPassword="" ; $confirmPassword="";
           header("location: adduser.php");
        }
        
   ?> 