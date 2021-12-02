
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Adding User</title>
        <meta name="description" content="Adding User">
        <meta name="keywords" content="PHP, MySql, UserLogin">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="styles/style.css" rel="stylesheet" />
    </head>
    <body>
       <?php  include 'header.inc'; ?>
       <form method="post" id="addUserForm"  action="insertuser.php">
            <h1>Add User</h1>
            <p>
                <label for="addUsername">Username: </label>
                <input type="text" name= "addUsername" id="addUsername" />
            </p>

            <p>
                <label for="addPassword">Password: </label>
                <input type="password" name= "addPassword" id="addPassword" />
            </p>

            <p>
                <label for="confirmPassword">ConfirmedPassword: </label>
                <input type="password" name= "confirmPassword" id="confirmPassword" />
            </p>

            <input type= "submit" id="btnAddUser" name="btnAddUser" class="button" value="Add"/>
       
        <?php
     
            include 'phpenhancements.php';
            
           
                require_once ("settings.php"); //connection information
                $conn = @mysqli_connect($host,
                        $user,
                        $pwd,
                        $sql_db
                );
               
                if( $_SERVER['QUERY_STRING'] == "Username%20already%20exist"){
                    echo "<p class=\"norecord\">Username already exist</p>";
                }else if($_SERVER['QUERY_STRING'] == "Fill"){
                    echo "<p class=\"norecord\">Please Fill in all required field</p>";
                }
                else if($_SERVER['QUERY_STRING'] == "insufficientlength"){
                    echo "<p class=\"norecord\">Password must be longer than 5 characters</p>";
                }else if($_SERVER['QUERY_STRING'] == "conpassword"){
                    echo "<p class=\"norecord\">ConfirmedPassword do not match</p>";
                }
                else{
             //checks if connection is successful
             if(!$conn){
                 //Displays an error message 
                 echo "<p>Database connection failure</p>"; //not in production script

             } else{
                    $sql_table="login";
                   
                     $query4 = "select * from  $sql_table ORDER BY userNum ";
                     $result4 = mysqli_query($conn, $query4);
                     if(!$result4){
                         echo "<p>Something is wrong with ", $query4, "</p>";
                         //Would not show in a production script
                     }else{
                        echo "<h1>User List</h1>";
                         tableLogin($result4);
                         mysqli_free_result($result4);
                     }
                     mysqli_close($conn);
                     
                 }// if successful database connection
                
             }

     
   ?> 
     </form>
        <footer>

        <?php include 'footer.inc';?>

        </footer>
    </body>
</html>