<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="About the creator of this website" />
  <meta name="keywords" content="About Page, HTML, CSS" />
  <meta name="author" content="Davy Sung"  />
  
  <title>About Page</title>
  
  <!-- References to external CSS files -->
  <link href="styles/style.css" rel="stylesheet" />
  
</head>

<body>
<header>
    <?php include 'header.inc';?>
</header>
  

    <section id="myInfo">
       
        <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <figure>
                    <img src="images/myphoto.jpg" alt="my photo" width="150" height="200" id="myPhoto">
                </figure>
              </div>
              <div class="flip-card-back">
                <h1>Davy Sung</h1>
                <p>Student</p>
              </div>
            </div>
          </div> 
        <dl>
        <dt><strong>Name: </strong></dt> <dd>Davy Sung</dd>
        <dt><strong>Student ID: </strong></dt> <dd>103535521</dd>
        <dt><strong>Tutor: </strong></dt><dd>Bo Li</dd>
        <dt><strong>Course: </strong></dt><dd> Bachelor of Computer Science- Software Development</dd>
        <dt><strong>Email: </strong></dt>
            <dd><a href="mailto:103535521@student.html.edu.au" >103535521@student.swin.edu.au</a></dd>
        </dl>
       
    </section>
    
    <section id="timetable">
        <h3 class="myTimetable">Timetable Detail</h3>
        <table> 
            <thead>
                <tr>
                    <th></th>
                    <th class="dayHeader">Monday</th>
                    <th class="dayHeader">Tuesday</th>
                    <th class="dayHeader">Wednesday</th>
                    <th class="dayHeader">Thursday</th>
                    <th class="dayHeader">Friday</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr><th class="timeHeader">8am</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><th class="timeHeader">9:00</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="computerLogic" rowspan="2">COS10003
                        <br />Computer & Logic Essential
                    <br/>Live Online 1 (1) </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><th class="timeHeader">10:00</th>
                    <td class="networkAdmin" rowspan="2">TNE 10005
                        <br />Network Administrator
                    <br/>Live Online 1 (1) </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><th class="timeHeader">10:30</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="computerLogic" rowspan="4">COS10003
                        <br />Tutorial1 (3)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                   
                </tr>
                <tr><th class="timeHeader">11:00</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                   
                </tr>
                <tr><th class="timeHeader">12pm</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                </tr>
                <tr><th class="timeHeader">12:30</th>
                    <td></td>
                    <td rowspan="4" class="createWeb">COS10011
                        <br /> Lab1(7)
                    </td>
                    <td></td>
                    
                    <td class="ucd" rowspan="3">COS20001
                        <br />Tutorial1(10)</td>
                        <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><th class="timeHeader">1:00</th>
                    <td></td>
                    <td></td>
                    
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><th class="timeHeader">2:00</th>
                    <td rowspan="3" class="createWeb">COS10011
                        <br /> Create Web Applications
                        <br/>Live Online 1 (1) 
                    </td>
                    <td></td>
                    <td></td>
                    
                    <td></td>
                    <td></td>
                    <td></td>
                  
                </tr>
                <tr><th class="timeHeader">2:30pm</th>
                    <td></td>
                    <td class="networkAdmin" rowspan="5">TNE10005
                        <br />Practical1 (3)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                </tr>
                <tr ><th rowspan="2" class="timeHeader" >3:00</th>
                   
                    <td></td>
                    <td></td>
                   
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="thisRow">
                    <td rowspan="2" class="ucd">COS20001
                        <br/>User-Centered Design
                        <br/>Live Online 1 (1) 
                    </td>
                    <td></td>
                    <td></td>
                   
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  
                </tr>
                <tr><th class="timeHeader">4:00</th>
                    <td></td>
                    <td></td>
                    <td></td>
                   
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><th class="timeHeader">5:00</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><th class="timeHeader">5:30</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </section>
    <footer>
   
    <?php include 'footer.inc';?>

    </footer>
</body>

</html>