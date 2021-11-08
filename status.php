
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Update Status</title>
        <meta name="description" content="Confirmation EOI">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="styles/style.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="scripts/status.js"></script>
    </head>
    <body>
    <?php include 'header.inc';?>
       <h1>Status</h1>
       <?php 
       global $status;
            function dropdownLoop($selected){
                $statusArray = array("New", "Current", "Final");
                echo "<form method=\"post\" id=\"submitChange\">";
                
                echo "<select name=\"status\" id=\"status\">";
                for($i=0;$i<3;$i++){;
                    if(strtolower($statusArray[$i]) == strtolower($selected)){
                        echo "<option value=$statusArray[$i] selected=\"selected\">$statusArray[$i]</option>";		
                    }
                    else  echo "<option value=$statusArray[$i]>$statusArray[$i]</option>";
                  //  $status = $statusArray[$i];		 	
                }
                echo "</select>";
                echo "<br/><br/><input type=\"submit\" id=\"btnSubmitChange\" class=\"button\" value=\"Submit Change\"> </form>";
            }     
            
          require_once ("settings.php"); //connection information
          
          $conn = @mysqli_connect($host,
                  $user,
                  $pwd,
                  $sql_db
          );
          $query_string = $_SERVER['QUERY_STRING'] ;

            //checks if connection is successful
        if(!$conn){
            //Displays an error message 
            echo "<p>Database connection failure</p>"; //not in production script

        } else{
            $sql_table="eoi";
            $query = "select * FROM eoi WHERE eoiNumber = '$query_string'";
            $result = mysqli_query($conn, $query);
          
            if(!$result){
                echo "<p>Something is wrong with ", $query, "</p>";
            } else{
                $rows = mysqli_num_rows($result);
                //echo $rows;
                if($rows != 0){
                    //Display the retrieved records
                    echo "<table id=\"statusTable\" class=\"recordTable\">\n";
                    echo "<tr>\n "
                        ."<th scope=\"col\">EOINumber</th>\n "
                        ."<th scope=\"col\">JobRefNumber</th>\n "
                        ."<th scope=\"col\">Full Name</th>\n "
                        ."<th scope=\"col\">Email</th>\n "
                        ."<th scope=\"col\">Phone</th>\n "
                        ."<th scope=\"col\">Gender</th>\n "
                        ."<th scope=\"col\">Address</th>\n "
                        ."<th scope=\"col\">Skill</th>\n "
                        ."<th scope=\"col\">Status</th>\n "
                        ."<th></th>"
                        ."<tr>\n ";
                    // retrive current record pointed by the result pointer
                    
                    while($row = mysqli_fetch_assoc($result)){
                        
                        echo "<tr>\n ";
                        echo"<td>", $row["eoiNumber"], "</td>\n ";
                        echo"<td>", $row["jobRefNum"], "</td>\n ";
                        echo"<td>", $row["fname"]," ", $row["lname"], "</td>\n ";
                        echo"<td>", $row["email"], "</td>\n ";
                        echo"<td>", $row["phone"], "</td>\n ";
                        echo"<td>", $row["gender"],"</td>\n ";
                        echo"<td>", $row["streetAddress"]," ",$row["suburb"]," ",$row["state"], " ", $row["postcode"],"</td>\n ";
                        echo"<td>", $row["skills"]," ", $row["otherSkills"], "</td>\n ";

                        echo"<td>",dropdownLoop($row["status"]), "</td>\n ";
                      
                        echo "</tr>\n ";
                    }
                    echo "</table>\n ";
                    //echo "<input type=\"submit\" class=\"button\" value=\"Submit Change\">";
                    //Frees up the memory, after using the result pointer
                    mysqli_free_result($result);   
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $status.=$_POST["status"];
                        $query2 = "update $sql_table SET status='$status' WHERE eoiNumber = '$query_string'";
                        $result2 = mysqli_query($conn, $query2);
                        if(!$result2){
                            echo "<p>Something is wrong with ", $query2, "</p>";
                        } else{
                           echo"Update Successfully.";
                           echo '<script type="text/javascript">window.location.assign("manage.php");</script>';
                           
                           // mysqli_free_result($result2);
                        }
                    }
                    
                }
                else{
                    echo"<p class=\"norecord\">No Record Found.</p>";
                }
                
                mysqli_close($conn);
            }// if successful query operation

           
        }

       ?>


    <footer>
    <?php include 'footer.inc';?>
    </footer>

    </body>
</html>