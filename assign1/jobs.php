<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Demonstrate each job position" />
  <meta name="keywords" content="Job Description, Software Architect, .NET Developer" />
  <meta name="author" content="Davy Sung"  />
  
  <title>Job Description</title>
  
  <!-- References to external CSS files -->
  <link href="styles/style.css" rel="stylesheet" />
  <script src="scripts/jobs.js"></script>

</head>

<body>
<header>
    <?php include 'header.inc';?>
</header>

    <h1>Position Description</h1>
    <article class="row">
        <h2>Position 1</h2>
        <section class="column" id="section1"> 
            <h3><strong>ReferenceNumber:</strong> SA001</h3>
           <ol>
            <li><strong>Position:</strong> Software Architect</li>
            <li><strong>Description:</strong> 
                Robert Half are commencing an exclusive search for a Software Architect. You will inherit a key role within our client's technology team, enhancing their Software product by utilising modern technologies within the Microsoft tech stack.

                You'll work alongside other key players within the technology team, including the Software Development Manager and Senior Developers, but you'll have lots of autonomy to make key technical decisions.
                
                The organisation you'll be joining are very reputable, they already have several enterprise clients who use their Software in Australia and New Zealand, although through a recent acquisition, they now have a huge pathway to success in the United States.
                
                The businesses HQ are based in Melbourne, but you will work from home for most of the time. Our preference is for candidates to be based in Victoria, but we would consider interstate options too.
                
                We are seeking a candidate who has great experience with the .NET technology stack with strong Microservices and Azure experience.
                
                You will play a key part in this firm's technology team, and you should be ready and excited for the challenge.</li>
            <li><strong>Salary Range:</strong> $AUD150K-170K</li>
            <li><strong>Report To:</strong> Manager</li>
            <li><strong>Key Responsibilities:</strong> 
            <ul>
                <li>Design, develop and execute software solutions to improve our clients Software Product and product portfolio</li>
                <li>Provide architectural blueprints and technical leadership to the Software Development Team</li>
                <li>Evaluate and recommend tools, technologies, and processes to ensure the highest quality product platform</li>
                <li>Collaborate with peer organizations, quality assurance and end users to produce cutting-edge software solutions</li>
                <li>Interpret business requirements to articulate the business needs to be addressed</li>
                <li>Troubleshoot code level problems quickly and efficiently</li>
            </ul></li><li><strong>Requirements:</strong>
            <ul>
                <li>Fantastic technical skills</li>
                <li>Extensive experience with .NET Core, Microservices, and Azure</li>
                <li>Strong architectural experience</li>
                <li>A high attention to detail with fantastic documentation skills</li>
                <li>Previous experience in an architectural role (not Mandatory but welcomed)</li>
                <li>Excellent communication and stakeholder management skills</li>
                 <li>We welcome applicants from Senior Developer backgrounds if the above criteria are met</li>
            </ul></li>
        </ol>
        
        </section>
        <form action="apply.php" id="submitForm">      
        <aside id="aside1">
            <img src="images/WorkFromHome.png" alt="work" width="300" height="300"/>
            <button type="submit" class="button" id="submit1" name="submit1" value="SA001">Apply Now</button>
        </aside></article>

        <article class="row">
            <h2>Position 2</h2>
        <section class="column" id="section2">
            <h3><strong>ReferenceNumber:</strong> ND002</h3>
            <ol>
            <li><strong>Position:</strong>.NET Developer</li>
            <li><strong>Description:</strong> 
                NaviHedge Pty Ltd (www.navihedge.com.au) provides transparent corporate & enterprise technology solutions to an opaque global marketplace.

                At NaviHedge, we are a wholly owned Australian company with a highly experienced team in the technology/fintech industry. We understand the importance of automation, transparency with an unparalleled level of ethical principles driving our development team.
                
                NaviHedge is currently embarking on a period of aggressive growth and need Full Stack Developers (.Net) in our Sydney office to help grow our application ecosystem. The ideal candidate should have solid ASP.Net & C# skills looking to learn and champion new technologies, whilst working on greenfield projects in a truly collaborative, non-hierarchal environment.
            </li>
            <li><strong>Salary Range:</strong> $AUD130K-150K</li>
            <li><strong>Report To:</strong> Manager</li>
            <li><strong>Key Responsibilities:</strong> 
                <ul>
                    <li>Develop, design and implement new or modified software products or ongoing business projects</li>
                    <li>Develop API's that integrate with external Software systems</li>
                    <li>Steer product development and technical delivery successfully through a lean/agile product development process</li>
                    <li>Utilise client base technologies to optimise the front end user interface</li>
                </ul>
            </li>
            <li><strong>Education and Experience:</strong> <br />
                Over 5+ Years of experience in developing and delivering large scale applications utilising established development tools, guidelines and conventions including the following technologies:
                <ul>
                    <li>ASP.Net MVC, EntityFramework, .Net Core</li>
                    <li>C#</li>
                    <li>MySQL/SQL Server</li>
                    <li>Rest Architecture</li>
                    <li>Angular 7+, React14.0+</li>
                    <li>Git</li>
                    <li>API testing with Postman</li>
                    <li>Software CI/CD Pipelines</li>
                    <li>AWS Core Services</li>
                    
                </ul>

            </li>
        </ol>
        </section>
        <aside id="aside2">
            <img src="images/WorkFromHome.png" alt="work" width="300" height="300"/>
            <button type="submit" class="button" id="submit2" name="submit2" value="ND002">Apply Now</button>
            
        </aside>
        </form>
    </article>



    <footer>

    <?php include 'footer.inc';?>

    </footer>
    
</body>

</html>