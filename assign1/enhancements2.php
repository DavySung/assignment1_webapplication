
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Demonstate of Javascript Enhancement" />
  <meta name="keywords" content="enhancement, javascript, google api" />
  <meta name="author" content="Davy Sung"  />
  
  <title>Enhancement2</title>
  
  <!-- References to external CSS files -->
  <link href="styles/style.css" rel="stylesheet" />
  
</head>

<body>
<header>
    <?php include 'header.inc';?>
</header>
<article id="enhancementArt">
  <p class="enHeading">Enhancement 2</p>
  <h3>Enhancement 2.1: Google API Auto-Complete</h3>
<section>
  <div class="paragraph">
      <p>
        On Apply Page, thre is an extra function that help the user to find their address easily and efficiently. When the user fill into street address column, there are a variety of address pop up in a dropdown bar to help with navigated to their address. They then click on any of the address that they think is the right one and the whole address includes suburb, state and postcode will autocomplete for them. However, I have limited the address for Australia only to help with the validation. For people outside of Australia, they have to manually type in the address. But due to validation of state and postcode, they would not be able to enter the address. 
        <br/><br/>
        The source from this code is gotten from Google Console Documentation. Using Place API from Google API to help complete and find the address. Address that is not in google map will not be found. In order to use this API, developer must have a valid google console account and api key. Hence, in order to use this API for a long-term period, developer or business must pay for Google API service when the user use the feature in web application.
        
        <br/><br/>
        <strong>Implemented on: </strong><a href="apply.php">Apply Page</a>
        <br/><br/>
        <strong>Source: </strong><a href="https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform?hl=en" target="_blank">GoogleMapPlatform </a>,
        <a href="https://console.cloud.google.com" target="_blank">GoogleConsole</a>
      </p>

  </div>

  <h3>Enhancement 2.2: Set Timer</h3>
  <div class="paragraph">
      <p>
        This feature limit the user to 20 minutes when completing the application form. On apply page, the user can fill in their application for 20minutes only. There will be an alert pop up when the user have 1minute left. For testing purpose, I will limit the timer to 7minutes only. If the user fail to complete and submit the application form within the time limit, they will redirect to Job Page. This means that they haveb to recomplete the application again. Their information will not be saved untill they have successfully submit the form.
        <br/> <br/>
        Technique implemented in this function is that using javascript setInterval() method to evaluates the timeup in milliseconds.
        <br/> <br/>
        <strong>Implemented On: </strong><a href="about.php">Apply Page</a>
        <br/><br/>
        <strong>Source: </strong> <a href="https://stackoverflow.com/questions/20618355/how-to-write-a-countdown-timer-in-javascript" target="_blank">StackOverflow</a>
      </p>
      

  </div>
</section>

<p class="enHeading">Extra Feature</p>
<section>
<div class="paragraph">
  <ul>
      <li>The user need to choose any job from job page to apply.</li>
      <li>The user can only apply by clicking the button in job page</li>
      <li>Input box for otherskill will only appear when the user check on otherskill. If unchecked, it will not appear.</li>
      <li>Job Reference cannot be changed by the user. If they want to change their mind, they need to go back to Job Page and click on the apply button.</li>
  </ul>

</div>

</section>

  <section>
    <p class="enHeading">References</p>     

    <h3>Learning Material Resourses</h3>
    <div class="paragraph">
    <p >Here are all the learning resources that helps in building this website effectively:</p>
    <ul>
      <li><strong>Youtube Google API: </strong><a href="https://www.youtube.com/watch?v=Q_GraCZJRiQ" target="_blank">Cairocoders</a></li>
      <li><strong>Google API: </strong><a href="https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform?hl=en" target="_blank">GoogleMapPlatform </a></li>
      <li><strong>Timer: </strong><a href="https://stackoverflow.com/questions/20618355/how-to-write-a-countdown-timer-in-javascript" target="_blank">StackOverflow</a></li>
      
    </ul>
  </div>
    <h3>Content Resources</h3>
    <div class="paragraph">
    <p >Contents that are used in thiss website is listed below:</p>
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