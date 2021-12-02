<?php 
    session_start(); //start the session_start
    if(!isset($_SESSION["number"])){ //check if session variable exists
        $_SESSION["number"] = 0; //create and set the session variable
    }
    $count = $_SESSION["number"]; //copy the value to a variable

?>  
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Login</title>
        <meta name="description" content="Confirmation EOI">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="styles/style.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="scripts/login.js"></script>
    </head>
    <body>
<?php include 'header.inc' ;?>

    <form method="post" id="loginForm" novalidate="novalidate">
            <p class="time">TimeLimit:
                <span id="time10">0</span></p>
            <p>
            <p id="myCount" value="0"></p>
            <p>
                <label for="username">Username: </label>
                <input type="text" name= "username" id="username" required="required" />
            </p>

            <p>
                <label for="password">Password: </label>
                <input type="password" name= "password" id="password" required="required"  />
            </p>

            <p>Username: admin <br/> Password: admin1</p>
            <input type= "submit" id="btnLogin" name="btnLogin" class="button" value="Login"/>
            <a href="adduser.php" id="userLink"  class="button">Add User</a>
    </form>

<?php 
include 'phpenhancements.php';
     if ($_SERVER["REQUEST_METHOD"] == "POST") {

        require_once ("settings.php"); //connection information

        $conn = @mysqli_connect($host,
                $user,
                $pwd,
                $sql_db
        );
        $sql_table="login";
        if(isset($_POST['username'])){
            $username = $_POST['username'];
        }
    
        if(isset($_POST['password'])){
            $password = $_POST['password'];
        }

        if(!$username == "" && $password != ""){
         //checks if connection is successful
         if(!$conn){
            //Displays an error message 
            echo "<p>Database connection failure</p>"; //not in production script

        } else{ 

            $query="select username, password from $sql_table where username = '$username'";
            $result = mysqli_query($conn, $query);
            $rowcount=mysqli_num_rows($result);
            // checks if the execution was successful
            if(!$result){
                echo "<p>Something is wrong with ", $query, "</p>";
            } else{
                
                if($count == 3 ){
                // sleep(10);
                    session_unset();
                    session_destroy();
                  
                    
                } else{
                    
                    $count = $_SESSION["number"]; //copy the value to a variable
                    $count++; //increment the value
                    $_SESSION["number"] = $count;
                    if($rowcount <= 0){
                        echo "<p class=\"norecord\">Login Failed.</p>";   
                    }
                    else{

                        while($row = mysqli_fetch_assoc($result)){
                            $bcrypt = new Bcrypt(15);
                              $hash = $row["password"];
                              $isGood = $bcrypt->verify($password, $hash);
                               // $verify = password_verify($password, $hash);
                                    if($row["username"] ==  $username )
                                    {
                                        if($isGood ){
                                            session_unset();
                                            session_destroy();
                                            echo"<script>window.location.assign(\"manage.php\")</script>";

                                        }else {
                                            echo "<p>Incorrect Password.</p>";
                                        }
                                    }
                                    else{
                                        echo "<p>Incorrect Username.</p>";
                                        
                                    }
                                }
                          
                            }
                            mysqli_free_result($result);
                    }
                 
            }
            mysqli_close($conn);
     }}else{
         echo "<p class=\"norecord\">Please fill in required field";
     }

    }

     echo "<footer>", include 'footer.inc' ,"</footer>"
     
?>
   

    </body>
</html>