  
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Managing EOI record</title>
        <meta name="description" content="Process EOI">
        <meta name="keywords" content="PHP, MySql">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="styles/style.css" rel="stylesheet" />
        <script src="scripts/manage.js"></script>
    </head>
    <body>

    <?php include 'header.inc';?>

        <form method="post" id="displayForm">
            <label for="inputEOI">Input </label>
                <input type="text" name= "inputEOI" id="inputEOI" />
            
            <input type="submit" name="displayAll"
                    class="button" value="DisplayAllEOIs" />
            
            <input type="submit" name="byPosition"
                    class="button" value="DisplayByPosition" />
                    
            <input type="submit" name="byName"
                class="button" value="DisplayByName" />

            <button type="submit" name="deleteAll" id="deleteAll" value="DeleteAllByJobReferenceNumber">DeleteAllByJobReferenceNumber</button>
        
       
    <?php
    include 'phpenhancements.php' ;
     $rows = 0;$sort = "jobRefNum";  
     
     $sortArray = array("EOINumber","JobReferenceNumber","FirstName", "LastName");
        $sortValue= array("eoiNumber","jobRefNum", "fname", "lname");
        //display sort 
        filter("EOINumber", $sortArray, $sortValue);
        
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
     require_once ("settings.php"); //connection information

        $conn = @mysqli_connect($host,
                $user,
                $pwd,
                $sql_db
        );
        
        //checks if connection is successful
        if(!$conn){
            //Displays an error message 
            echo "<p>Database connection failure</p>"; //not in production script

        } else{
            //Upon successful connection
            $query="";$dropdown="";
            $sql_table="eoi";
            //Set up the SQL command to query or add data into the table
            if(isset($_POST['inputEOI'])){
                $input = $_POST['inputEOI'];
                if($input == ""){
                    if(isset($_POST['byPosition']) || isset($_POST['byName']) || isset($_POST['deleteAll'])){
                        echo"<p class=\"norecord\">Input Required Field.</p>";
                        $query .= "select * FROM eoi WHERE eoiNumber = null ";
                    }
                    else {
                        if(isset($_POST['sort'])){ 
                            global $sort; 
                            $sort = $_POST["sort"];
                            $query .= "SELECT * FROM $sql_table ORDER BY $sort ASC";
                        }
                    }
                } 
                else {
                    if(isset($_POST['byPosition'])) {
                        $query .= "select * FROM $sql_table WHERE jobRefNum like '%$input%'";
                    }
                    else if(isset($_POST['byName'])) {
                        $query .= "select * FROM $sql_table WHERE fname like '$input' OR lname like'$input'  OR CONCAT(fname,lname) like '$input' ";
                    }
                    else if(isset($_POST['deleteAll'])) {
                        //$query .= "Delete FROM eoi WHERE jobRefNum = '$input'";
                            if($_SERVER['QUERY_STRING'] == "delete=true")
                            {
                                $query2 = "select * FROM $sql_table WHERE jobRefNum = '$input'";
                                $result2 = mysqli_query($conn, $query2);
                                $rowcount=mysqli_num_rows($result2);
                                if($rowcount <= 0){
                                    echo "<p class=\"norecord\">No Record Found for delete.</p>";   
                                    $query .= "select * FROM eoi ORDER BY eoiNumber";
                                    
                               }else{
                                    while($row = mysqli_fetch_assoc($result2)){ 
                                        if($row["jobRefNum"] == $input ){
                                            $query3 = "Delete FROM $sql_table WHERE jobRefNum = '$input'";
                                            $result3 = mysqli_query($conn, $query3);
                                        }
                                    }
                                    $query .= "select * FROM $sql_table";
                                    echo "Successfully Delete ",$rowcount,"record.";
                                    
                               }
                                
                            }else if($_SERVER['QUERY_STRING'] == "delete=false"){

                                echo"<p class=\"norecord\">No record is deleted.</p>";
                            }
                            
                            
                    }
                    else{
                        if(isset($_POST['sort'])){ 
                            global $sort; 
                            $sort = $_POST["sort"];
                            $query .= "SELECT * FROM $sql_table ORDER BY '$sort' ASC";
                        }
                        
                    }
                }
                
            }else {
                if(isset($_POST['sort'])){ 
                    global $sort; 
                    $sort = $_POST["sort"];
                    $query .= "SELECT * FROM $sql_table ORDER BY '$sort' ASC";
                }
            }

            //execute the query and store result into the result pointer
            $result = mysqli_query($conn, $query);

            // checks if the execution was successful
            if(!$result){
                echo "<p>Something is wrong with ", $query, "</p>";
            } else{
                $rows += mysqli_num_rows($result);
                //echo $rows;
                if($rows != 0){
                   
                    echo "<h1>EOI Table</h1>";
                    table($result);
                    //Frees up the memory, after using the result pointer
                    mysqli_free_result($result);
                }
                else{
                    echo"<p class=\"norecord\">No Record Found.</p>";
                }
                
            }// if successful query operation

        //close the datbase connection
        mysqli_close($conn);

        }// if successful database connection

    }
    else{
       //echo "<script>window.location.href=\"login.php\"</script>";
    }
     
     ;?>
</form>
    <footer>
    <?php include 'footer.inc';?>
    </footer>

    </body>
</html>