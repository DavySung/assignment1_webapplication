/**
*Author: Davy Sung 103535521
*Target: jobs.html
*Purpose: This file is for any function relevant to the target page.
*Created: 18/09/2021
*Last Updated: 24/09/2021
*Credits: 
*/
"use strict";

function sendInfo(){
        var arrSkill=[""];
        sessionStorage.firstname = "";
        sessionStorage.lastname = "";
        sessionStorage.dob = "";
        sessionStorage.email ="";
        sessionStorage.phone = "";
        sessionStorage.gender = "";
        sessionStorage.streetAddress = "";
        sessionStorage.suburb = "";                             
        sessionStorage.state = "";
        sessionStorage.postcode = "";
        sessionStorage.setItem("skill", JSON.stringify(arrSkill));
        sessionStorage.inputskill = ""; 
  
}
function prefill_form(){
    
        
            document.getElementById("jobReferenceNum").value = localStorage.jobReferenceNum;
            document.getElementById("firstName").value = sessionStorage.firstname;
            document.getElementById("lastName").value = sessionStorage.lastname;
            document.getElementById("dob").value = sessionStorage.dob;
            document.getElementById("email").value = sessionStorage.email;
            document.getElementById("phone").value = sessionStorage.phone;
            document.getElementById("streetAddress").value = sessionStorage.streetAddress;
            document.getElementById("suburb").value = sessionStorage.suburb;
            document.getElementById("postcode").value = sessionStorage.postcode;
    
            if(sessionStorage.gender == "female"){
                document.getElementById("female").checked = true;
            }
            else{
                document.getElementById("male").checked = true;
            }
   
            var ty = sessionStorage.getItem("state");
    
               var ddl = document.getElementById('state');
                var opts = ddl.options.length;
                for (var i=0; i<opts; i++){
                    if (ddl.options[i].value == ty){
                        ddl.options[i].selected = true;
                        break;
                    }
                } 
    
           var retrievedData = sessionStorage.getItem("skill");
            var arrSkill = JSON.parse(retrievedData);
            //var arrSkill = sessionStorage.skill;
    
            if(arrSkill != null){
                for(var i=0; i<arrSkill.length;i++){
    
                    if(arrSkill[i] == "ProblemSolving"){
                        document.getElementById("probsolving").checked = true;
                    }
                    if(arrSkill[i] == "Communication"){
                        document.getElementById("communication").checked = true;
                    }
                    if(arrSkill[i] == "Management"){
                        document.getElementById("management").checked = true;
                    }
                    if(arrSkill[i] == "Teamwork"){
                        document.getElementById("teamwork").checked = true;
                    }
                    if(arrSkill[i] == sessionStorage.inputskill){
                        document.getElementById("otherskills").checked = true;
                        $("#skillDes").show();
                        document.getElementById("inputskill").value = sessionStorage.inputskill;
                        
                    }
                  
                    
                }
            }
     
            sessionStorage.firstTimer = "False";
       
    
    }
function init() {

    var btn1= document.getElementById("submit1");
    var btn2 = document.getElementById("submit2");
    btn1.onclick = function() {
            
            if(sessionStorage.firstTimer == undefined){   
                sessionStorage.jobReferenceNum = "SA001"; 
                localStorage.jobReferenceNum = "SA001";
                sessionStorage.firstTimer = "True";
                sendInfo();
            }else prefill_form();
               
      
    };

    btn2.onclick = function() {
        if(sessionStorage.firstTimer == undefined){   
                sessionStorage.jobReferenceNum = "ND002"; 
                localStorage.jobReferenceNum = "ND002";
                sessionStorage.firstTimer = "True";
                sendInfo();
            }else prefill_form();
           
    }
    
    
  
}

window.onload = init;