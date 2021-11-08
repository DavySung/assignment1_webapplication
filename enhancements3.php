
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Demonstate of PHP Enhancement" />
  <meta name="keywords" content="enhancement, php, login" />
  <meta name="author" content="Davy Sung"  />
  
  <title>Enhancement3</title>
  
  <!-- References to external CSS files -->
  <link href="styles/style.css" rel="stylesheet" />
  
</head>

<body>
<header>
    <?php include 'header.inc';?>
</header>
<article id="enhancementArt2">
  <p class="enHeading">Enhancement 3</p>
  <h3>Enhancement 3.1: Login</h3>
<section>
  <div class="paragraph">
      <p>
        This feature allow authorize user to login to the application before they could manage the EOI record in <a href="manage.php">manage.php page</a>
        The user need to enter the correct username and password inorder to login. If the user attempt to login 3times but failed to login, they will be locked
        for 10seconds before they could try again. 

        <br/><br/><strong>Technique Used:</strong>
        <ul>
          <li>when user click on login button, it will check if the user has enter the correct data against login table in database.</li>
            <li>If the username and password is correct, they will redirect to manage.php page</li>
            <li>If not correct, they will have 3 attempts</li>
            <li>After the attempt 3times and still incorrect, they will be locked for 10seconds. Login button will disabled.</li>
            <li>Timer and Lock mechanism is implemented through Javascript</li>
        </ul>

        <br/>
        <strong>Implemented on: </strong><a href="login.php">Login Page</a>

      </p>

  </div>

  <h3>Enhancement 3.2: Add User To Login</h3>
  <div class="paragraph">
      <p>
        This feature allow user to add authorize user for managing EOI page. New user will be add by verifying against username.Username 
        must be unique. Password and ConfirmedPassword must matched. If everything is okay, new user will add to login table record.
        <br/> <br/>
        For Security purpose, password is encrypted with hash format. It will be decrypted when user use to login. 
        <br/> <br/>
        <strong>Implemented On: </strong><a href="adduser.php">AddUser Page</a>
        <br/><br/>
        <strong>Source: </strong> <a href="https://stackoverflow.com/questions/4795385/how-do-you-use-bcrypt-for-hashing-passwords-in-php/6337021#6337021" target="_blank">StackOverFlow</a>
      </p>
      

  </div>
</section>

<p class="enHeading">Extra Feature</p>
<section>
<div class="paragraph">
  <ul>
      <li>Sorting EOI</li>
  </ul>

</div>

</section>

  <section>
    <p class="enHeading">References</p>     

    <h3>Learning Material Resourses</h3>
    <div class="paragraph">
    <p >Here are all the learning resources that helps in building this website effectively:</p>
    <ul>
      <li><strong>Encrypt and Decrypt Password Using Hash: <a href="https://stackoverflow.com/questions/4795385/how-do-you-use-bcrypt-for-hashing-passwords-in-php/6337021#6337021" target="_blank">StackOverFlow</a></strong></li>

    </ul>
  </div>
    <h3>Content Resources</h3>
    <div class="paragraph">
    <p >Contents that are used in this website is listed below:</p>
    <p><em>Noted: </em>all images are copyright</p>
    <ul>
      <li><strong>Illustration: </strong><a href="https://icons8.com/illustrations/author/5e96a99001d036001976f998" target="_blank">Vijay Verma</a> from <a href="https://icons8.com/illustrations" target="_blank">Ouch!</a></li>
      <li><strong>Job Position Content: </strong><a href="https://www.seek.com.au/job/53576328?type=standard#searchRequestToken=e392376f-81b2-4125-a385-3ac7e7e731ab" target="_blank">
        Seek
        </a></li>
        <li><strong>Content in Home Page: </strong><a href="https://cgi.njoyn.com/CGI/xweb/XWeb.asp?NTKN=c&clid=21001&Page=JobDetails&Jobid=J0821-0194&BRID=844175&lang=1" target="_blank">
          CGI Company
          </a></li>
    </ul>

  </div>
  </section>

</article>
 
  <footer>

    <?php include 'footer.inc';?>

</footer>
  </body>

</html>