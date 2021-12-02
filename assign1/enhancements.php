<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Demonstate of CSS Demonstration" />
  <meta name="keywords" content="enhancement, css animation" />
  <meta name="author" content="Davy Sung"  />
  
  <title>Enhancement</title>
  
  <!-- References to external CSS files -->
  <link href="styles/style.css" rel="stylesheet" />
  
</head>

<body>
  
<header>
    <?php include 'header.inc';?>
</header>
<article id="enhancementArt">
  <p class="enHeading">Enhancements 2: <a href="enhancements2.php">Click here to go to Enhancement 2</a></p>
  <p class="enHeading">Enhancements 3: <a href="enhancements3.php">Click here to go to Enhancement 3</a></p>
  <p class="enHeading">Enhancements 1: CSS</p>
  <h3>Enhancement 1.1: CSS Linear Animation</h3>
<section>
  <div class="paragraph">
      <p>
        On Home Page, there is an css animation that is being used. When the user click on the home page, the animation of the image will start in 2s. It will repeat itself twice and then it will stop at the last position. This is added on to make the page looks for lively and attractive instead of just a still image. Technique that is used is declared a transition properties to 0.5sb and use animation properties;
        <br/><br/>
        <strong>Implemented on: </strong><a href="index.php">Home Page</a>
        <br/><br/>
        <strong>Source: </strong><a href="https://www.w3schools.com/howto/howto_css_flip_card.asp" target="_blank">w3schools</a>
      </p>

  </div>

  <h3>Enhancement 1.2: Flip Card</h3>
  <div class="paragraph">
      <p>
        On about page, I have implemented a hover effect where the image will flip when the user hover on the image. To enable this effect, the user just have to hover on the image and it will flip and show some description. Flip card is a great idea when there is not much space to put all the personal detail of people. This feature could also be implemented through JavaScript where they click on image and it filp but I recognized that this way is more efficient. And as JavaScript is not allowed to be used in this assignment as well. 
        <br/>
        Moreover, on this page as well if you hover on any of timetable column or navigation bar, it will change the background color.
        <br/><br/>
        <strong>Implemented On: </strong><a href="about.php">About Page</a>
        <br/><br/>
        <strong>Source: </strong> <a href="https://www.w3schools.com" target="_blank">w3schools</a>
      </p>

  </div>
</section>

  <section>
    <p class="enHeading">References</p>

    <h3>Learning Material Resourses</h3>
    <div class="paragraph">
    <p >Here are all the learning resources that helps in building this website effectively:</p>
    <ul>
      <li><strong>For CSS Animation: </strong><a href="https://www.w3schools.com/howto/howto_css_flip_card.asp" target="_blank">w3schools</a></li>
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