<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Apply for Job through this page" />
  <meta name="keywords" content="Apply Job, Software Architect, .NET Developer" />
  <meta name="author" content="Davy Sung"  />

  <title>Apply Page</title>
  
  <!-- References to external CSS files -->
  <link href="styles/style.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script
   src="https://maps.googleapis.com/maps/api/js?key=insert&libraries=places"></script>
 
  <script src="scripts/enhancements.js"></script>
  <script src="scripts/apply.js"></script>

</head>

<body>
<header>
    <?php include 'header.inc';?>
</header>

    <form id="regform" method="post" action="processeoi.php" novalidate="novalidate" autocomplete="off">
   
        <p class="time">TimeLimit:
        <span id="timeLimit">0</span></p>
        <p>
            <label for="jobReferenceNum">Job Reference Number: </label>
            <input type="text" name= "jobReferenceNum" id="jobReferenceNum" required="required" pattern="^[a-zA-Z0-9]{5}$" readonly />
            
        </p>

        <fieldset>
            <legend>Personal Information</legend>
            <p>
                <label for="firstName">First Name: </label>
                <input type="text" name= "firstName" id="firstName" required="required" pattern="^[a-zA-Z]{1,20}$" />
            </p>

            <p>
                <label for="lastName">Last Name: </label>
                <input type="text" name= "lastName" id="lastName" required="required"  pattern="^[a-zA-Z]{1,20}$"/>
            </p>

            <p>
                <label for="dob">Date Of Birth: </label>
                <input type="date" name= "dob" id="dob" required="required"  />
            </p>
            <p>
                <label for="email">Email Address: </label>
                <input type="text" name= "email" id="email" required="required" 
                pattern="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$" />
            </p>
            <p>
                <label for="phone">Phone Number: </label>
                <input type="text" name= "phone" id="phone" required="required"  pattern="^(?:\s*\d){8,12}$"/>
            </p>
        </fieldset>
        <fieldset>
            <legend>Gender</legend>
            <p><label for="male">Male</label> 
				<input type="radio" id="male" name="gender" value="male" checked="checked"/>
			<label for="female">Female</label> 
				<input type="radio" id="female" name="gender" value="female"/>
			</p>
        </fieldset>

        <fieldset>
            <legend>Address</legend>
            <p>
                <label for="streetAddress">Street Address: </label>
                <input type="text" name= "streetAddress" id="streetAddress" required="required" pattern="^[a-zA-Z0-9\s]{1,40}$"/>
            </p>
            <p>
                <label for="suburb">Suburb/Town: </label>
                <input type="text" name= "suburb" id="suburb" required="required" pattern="^[a-zA-Z0-9]{1,40}$" />
            </p>
            <p><label for="state">State</label> 
                <select name="state" id="state">
                    <option value="vic">VIC</option>			
                    <option value="nsw">NSW</option>
                    <option value="qld">QLD</option>
                    <option value="nt">NT</option>
                    <option value="wa">WA</option>
                    <option value="sa">SA</option>
                    <option value="tas">TAS</option>
                    <option value="act">ACT</option>
                </select>
            </p>
            <p>
                <label for="postcode">Postcode: </label>
                <input type="text" name= "postcode" id="postcode" required="required"  pattern="[0-9]{4}"/>
            </p>
            <p  id="country" class="hidden"></p>
        </fieldset>

        <fieldset>
            <legend>Skills List</legend>
                <p><label for="probsolving">Problem Solving </label>
                <input type="checkbox" name="probsolving" id="probsolving" value="Problem Solving" /><br />
                <label for="communication">Communication</label>
                <input type="checkbox" name="communication" id="communication" value="communication" /><br />
                <label for="management">Management</label>
                <input type="checkbox" name="management" id="management" value="management" /><br />

                <label for="teamwork">Teamwork</label>
                <input type="checkbox" name="teamwork" id="teamwork" value="teamwork" /><br />

                <label for="otherskills">Other Skills</label>
                <input type="checkbox" name="otherskills" id="otherskills" value="otherskills" /><br /></p>
                <div id="skillDes" >
                    <p>Description of other skills</p>
                    <textarea rows="4" col="10" name="inputskill" id="inputskill"
                    placeholder="Write the description here..."></textarea>
                </div>

        </fieldset>
   
        <fieldset id="error">
            <legend>Error Message</legend>
            <p id="msg"></p>
        </fieldset>
        <input type= "submit" id="btnSubmit" class="button" value="Register"/>
        <input type= "reset" id="btnReset" class="button" value="Reset Form"/>

    </form>
    

    <footer>

    <?php include 'footer.inc';?>

    </footer>

</body>

</html>