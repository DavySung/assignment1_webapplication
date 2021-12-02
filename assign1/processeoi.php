
<?php
session_start();

?>     
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Adding EOI record</title>
        <meta name="description" content="Process EOI">
        <meta name="keywords" content="PHP, MySql">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="styles/style.css" rel="stylesheet" />
    </head>
    <body>
       
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         // echo"<header>",include 'header.inc',"</header>";
         include 'header.inc';
         include 'phpenhancements.php';
          echo"<h1>EOI Detail</h1>";
        require_once ("settings.php"); //connection information
        $conn = @mysqli_connect($host,
                $user,
                $pwd,
                $sql_db
        );
      
        $errMsg = "";
        if(isset($_POST['btnSubmit']))
        {
            echo("<p>Error</p>");
        }
        else{
           
        $jobRefNum = $_POST["jobReferenceNum"];
               
        if(isset($_POST["firstName"]))
        {
            $fname = $_POST["firstName"];
            
           
        }else{
            //Redirect to form, if process not triggered by a form submit
            //header("location: jobs.php");
            echo("<p>Error2</p>");
        }
        if($fname == ""){
            $errMsg .= "<p>You must enter your first name.</p>";
        }
        else if (!preg_match("/^[a-zA-Z]{1,20}$/", $fname)){
        $errMsg .= "<p>Only alpha letters allowed in your first name.</p>";
        }
    
        if(isset($_POST["lastName"]))
        {
            $lname = $_POST["lastName"];
           
        }else{
            //Redirect to form, if process not triggered by a form submit
            //header("location: jobs.php");
            echo("<p>Error3</p>");
        }
        if($lname == ""){
            $errMsg .= "<p>You must enter your last name.</p>";
        }
        else if (!preg_match("/^[a-zA-Z]{1,20}$/", $lname)){
        $errMsg .= "<p>Only alpha letters allowed in your last name.</p>";
        }
    
        if(isset($_POST["email"]))
        {
            $email = $_POST["email"];

        }else{
            //Redirect to form, if process not triggered by a form submit
            //header("location: jobs.php");
            echo("<p>Error4</p>");
        }
        if($email == ""){
            $errMsg .= "<p>You must enter your email.</p>";
        }
        else if (!preg_match("/[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+.[a-zA-Z0-9.-]/", $email)){
        $errMsg .= "<p>Street must be number or alpha characters only<br /></p>";
        }
    
        if(isset($_POST["streetAddress"]))
        {
            $streetAddress = $_POST["streetAddress"];
          
        }else{
            //Redirect to form, if process not triggered by a form submit
            //header("location: jobs.php");
            echo("<p>Error5</p>");
        }
        if($streetAddress == ""){
            $errMsg .= "<p>You must enter your street address.</p>";
        }
    
        if(isset($_POST["suburb"]))
        {
            $suburb = $_POST["suburb"];
           
        }else{
            //Redirect to form, if process not triggered by a form submit
            //header("location: jobs.php");
            echo("<p>Error6</p>");
        }
        if($suburb == ""){
            $errMsg .= "<p>You must enter your suburb.</p>";
        }
        else if (!preg_match("/[a-zA-Z0-9]{1,40}/", $suburb)){
            $errMsg .= "<p>Suburb must contain alpha character or number only<br /></p>";
        }

        $state=$_POST["state"];
        if(isset($_POST['postcode']))
        {
            $postcode = $_POST["postcode"];
           
        }else{
            //Redirect to form, if process not triggered by a form submit
            //header("location: jobs.php");
            echo("<p>Error7</p>");
        }
        if($postcode == ""){
            $errMsg .= "<p>You must enter state.</p>";
        }
        else if (!preg_match("/^[0-9]{4}$/", $postcode)){
        $errMsg .= "<p>Postcode must contain only number<br /></p>";
        }
    
        if(isset($_POST["phone"]))
        {
            $phone =$_POST["phone"];

        }else{
            //Redirect to form, if process not triggered by a form submit
            //header("location: jobs.php");
            echo("<p>Error8</p>");
        }
        if($phone == ""){
            $errMsg .= "<p>You must enter your phone.</p>";
        }
        else if (!preg_match("/^[0-9]{8,12}$/", $phone)){
        $errMsg .= "<p>Phone must contain only number<br /></p>";
        }

        if(isset($_POST["gender"]))
        {
            $gender = $_POST["gender"];
        }
        else{ $errMsg .=  "<p>Please choose any radio button.</p>";}

        $skills = "";
        if(isset($_POST["probsolving"])) $skills .= "Problem Solving";
        if(isset($_POST["communication"])) $skills .= ", Communication";
        if(isset($_POST["management"])) $skills .= $skills.", Management";
        if(isset($_POST["teamwork"])) $skills .= ", Teamwork";
       
        if(isset($_POST["inputskill"]))
        { 
            $inputskill =$_POST["inputskill"];
            if($inputskill == ""){
               // $errMsg .= "<p>You must enter your skill description.</p>";
                $inputskill .= "";
            }
           // $skills .= ", " + $inputskill;
        
        }else{
            //Redirect to form, if process not triggered by a form submit
            //header("location: jobs.php");
            echo("<p>Error9</p>");
        }
        $status = "New";
        
        $fname = sanitise_input($fname);
        $lname = sanitise_input($lname);
        $email = sanitise_input($email);
        $phone = sanitise_input($phone);
        $streetAddress = sanitise_input($streetAddress);
        $suburb = sanitise_input($suburb);
        $postcode = sanitise_input($postcode);

        //checks if connection is successful
        if(!$conn){
            //Displays an error message 
            echo "<p>Database connection failure</p>"; //not in production script

        } else{
            $sql_table="eoi";
            $checkEOI = "select `eoiNumber` from $sql_table";
            $generatedNum = rand(1, 10000);
           

            $res = mysqli_query($conn, $checkEOI);
                // checks if the execution was successful
                if(!$res){
                    echo "<p>Something is wrong with ", $checkEOI, "</p>";
                    //Would not show in a production script
                } else{
                    while($row = mysqli_fetch_assoc($res)){
                        if($generatedNum != $row["eoiNumber"])
                        {
                            $eoiNumber = $generatedNum;
                            $_SESSION["eoiNumber"] =  $eoiNumber;
                        }
                        else{
                            $generatedNum++;
                        }
                        
                    }
                    
                    
                }

            $_SESSION["jobRefNum"] =  $jobRefNum;
            $_SESSION["fname"] =  $fname;
            $_SESSION["lname"] =  $lname;
            
            $_SESSION["email"] =  $email;
            $_SESSION["streetAddress"] =  $streetAddress;
            $_SESSION["suburb"] =  $suburb;
            $_SESSION["state"] =  $state;
            $_SESSION["postcode"] =  $postcode;
            $_SESSION["phone"] =  $phone;
            $_SESSION["gender"] =  $gender;
            $_SESSION["skills"] =  $skills;
            $_SESSION["status"] =  $status;
            
            if($errMsg != ""){
                echo "<p>$errMsg</p>";
                echo "<a href=\"apply.php\" id=\"btnback\" class=\"button\">Back</a>";
            }
            else{
                //Upon successful connection
               

                $query1 = "CREATE TABLE IF NOT EXISTS `eoi` (
                    `eoiNumber` int(10) NOT NULL,
                    `jobRefNum` varchar(5) NOT NULL,
                    `fname` varchar(20) NOT NULL,
                    `lname` varchar(20) NOT NULL,
                    `streetAddress` varchar(40) NOT NULL,
                    `suburb` varchar(40) NOT NULL,
                    `state` varchar(3) NOT NULL,
                    `postcode` varchar(4) NOT NULL,
                    `email` varchar(200) NOT NULL,
                    `phone` varchar(12) NOT NULL,
                    `skills` varchar(100) NOT NULL,
                    `otherSkills` text,
                    `gender` varchar(10) NOT NULL,
                    `status` varchar(20) NOT NULL,
                    PRIMARY KEY (`eoiNumber`)
                  );";
                $result1 = mysqli_query($conn, $query1);
                // checks if the execution was successful
                if(!$result1){
                    echo "<p>Something is wrong with ", $query1, "</p>";
                    //Would not show in a production script
                } else{
                    //dsiplay an operation successful message
                    //echo "<p class=\"ok\">Everything is Okay</p>";
                  
                }

                //Set up the SQL command to query or add data into the table
                //$query2 = "insert into $sql_table (fname, lname, gender,email,phone) values ('$firstname','$lastname', '$gender', '$email', '$phone' )";
                $query2 = "insert into $sql_table (eoiNumber,jobRefNum, fname, lname,streetAddress, suburb, state, postcode, email,phone, skills, otherSkills, gender, status) values ('$eoiNumber','$jobRefNum', '$fname', '$lname', '$streetAddress','$suburb', '$state', '$postcode', '$email','$phone', '$skills', '$inputskill', '$gender', '$status')";
                //execute the query and store result into the result pointer
                $result2 = mysqli_query($conn, $query2);

                // checks if the execution was successful
                if(!$result2){
                    echo "<p>Something is wrong with ", $query2, "</p>";
                    //Would not show in a production script
                } else{
                    //dsiplay an operation successful message

                    echo "<div id=\"eoi\"><p><strong>Welcome</strong> ", $fname, " ",$lname , "</p>" , 
                     "<p><strong>EOI Numer:</strong>  ", $eoiNumber, "</p>" ,  
                     "<p><strong>Job Reference Number:</strong> ", $jobRefNum,"</p>" , 
                     "<p><strong>Email:</strong> ", $email,"</p>" ,
                     "<p><strong>Phone:</strong> ", $phone,"</p>" , 
                     "<p><strong>Address:</strong> ", $streetAddress, " " , $suburb, " ", $state, " ", $postcode,"</p>", 
                     "<p><strong>Gender:</strong> ", $gender,"</p>" , 
                     "<p><strong>Skills:</strong> ", $skills, " ",$inputskill ,"</p>", 
                     "<p><strong>Job Status:</strong> ", $status,"</p>", 
                     "<a href=\"jobs.php\" id=\"btnback2\" class=\"button\"> Back</a></div>";
                     
                }// if successful query operation
               
              
                //close the datbase connection
                mysqli_close($conn);

            }// if successful database connection
       
        }// if successful database connection
        }
    }
    else{
        header("location: jobs.php");
      
    }
      ?> 

<footer>

<?php include 'footer.inc';?>

</footer>
    </body>
</html>