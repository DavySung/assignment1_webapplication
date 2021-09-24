/**
*Author: Davy Sung 103535521
*Target: apply.html
*Purpose: This file is for any function relevant to the target page.
*Created: 18/09/2021
*Last Updated: 24/09/2021
*Credits: 
*/

"use strict";

function validation(){

    var msg = "";
    var result = true;

    //start of validation
    var firstname = document.getElementById("firstName").value;
    if(!firstname.match(/^[a-zA-Z]{1,20}$/)){
        msg += "Your first name must only contain alpha characters<br />";
        result =false;
    }
    var lastname = document.getElementById("lastName").value;
    if(!lastname.match(/[a-zA-Z]{1,20}/)){
        console.log(lastname)
        msg += "Your last name must only contain alpha characters<br />";
        result =false;
    }
    var email = document.getElementById("email").value;
    if(!email.match(/[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+.[a-zA-Z0-9.-]/)){
        msg += "Please enter a valid email address<br />";
        result =false;
    }
    var phone = document.getElementById("phone").value;
    if(!phone.match(/^(?:\s*\d){8,12}$/)){
        msg += "Phone must contain only number<br />";
        result =false;
    }
    var suburb = document.getElementById("suburb").value;
    if(!suburb.match(/[a-zA-Z0-9]{1,40}/)){
        msg += "Suburb must contain alpha character or number only<br />";
        result =false;
    }    
    var streetAddress = document.getElementById("streetAddress").value;
    console.log(streetAddress.length);
    if(streetAddress.length == 1){
        msg += "Enter street address<br />";
        result =false;
    } 
    else if(!streetAddress.match(/[a-zA-Z0-9\s]{1,40}/)){
        msg += "Street must be number or alpha characters only<br />";
        result =false;
    }    
    var postcode = document.getElementById("postcode").value;
    if(!postcode.match(/^[0-9]{4}$/)){
        msg += "Postcode must contain only number<br />";
        result =false;
    }

    var dob = document.getElementById("dob").value;
    if(checkDate(dob) == false){
        msg += "You must be between 15 - 80 years.<br />";
        result = false;
    }
    
    var postcode = document.getElementById("postcode").value;
    var state = getState();
    if(postcode != ""){
        switch(state){
            case "vic":
                if(!(postcode.charAt(0) == "3" || postcode.charAt(0) == "8"))
                {
                    msg += "Postcode for Victoria must start with either 3 or 8.<br />";
                    result = false;
                }
                break;
            case "nsw":
                if(!(postcode.charAt(0) == "1" || postcode.charAt(0) == "2"))
                {
                    msg += "Postcode for NewSouthWhale must start with either 1 or 2.<br />";
                    result = false;
                    console.log("state: " +state);
                }
                break;
            case "qld": 
                if(!(postcode.charAt(0) == "4" || postcode.charAt(0) == "9"))
                {
                    msg += "Postcode for Queensland must start with either 4 or 9.<br />";
                    result = false;
                }
                break;
            case "nt":
                if(!(postcode.charAt(0) == "0"))
                {
                    msg += "Postcode for Northen Territory must start with 0.<br />";
                    result = false;
                }
                break;
            case "wa":
                if(!(postcode.charAt(0) == "6" ))
                {
                    msg += "Postcode for Western Australia must start with 6.<br />";
                    result = false;
                }
                break;
            case "sa":
                if(!(postcode.charAt(0) == "5" ))
                {
                    msg += "Postcode for South Australia must start with 5.<br />";
                    result = false;
                }
                break;
            case "tas":
                if(!(postcode.charAt(0) == "7"))
                {
                    msg += "Postcode for Tasmania must start with 7.<br />";
                    result = false;
                }
                break;
            case "act":
                if(!(postcode.charAt(0) == "0"))
                {
                    msg += "Postcode for Australian Capital Territory must start with 0.<br />";
                    result = false;
                }
                break;
            default:
                msg += "Please input the right state info.<br />";
    
        }
    }
 

    var probSolving = document.getElementById("probsolving").checked;
    var communication = document.getElementById("communication").checked;
    var teamwork = document.getElementById("teamwork").checked;
    var management = document.getElementById("management").checked;
    var otherskills = document.getElementById("otherskills").checked;
    var inputskill = document.getElementById("inputskill").value;

    if(otherskills){
       
           
        if(inputskill == ""){
            msg += "You must input the skill description.<br />";
            result = false;
            
        }
    }
    
    
    if(!(probSolving || communication || teamwork || management || otherskills))
    {
        msg += "Please Select at least one skill.<br />";
        result = false;
    }

    var gender="";
    if(document.getElementById("male").checked)
        gender = "male";
    else gender = "female";


    
    if(msg != ""){
        $("#error").show();
        document.getElementById("msg").innerHTML = msg;
    }
    

    if(result){
        storeInput(dob, postcode, state, probSolving, communication, management, teamwork, otherskills, gender);
        
    }

    return result;
}

function checkDate(dob){
    const today = new Date();

    var date= today.getDate();
    var year = today.getFullYear();
    var month = today.getMonth()+1;

    var dateArr = dob.split("-");

    for(var i=0; i<dateArr.length; i++){
        //console.log(year-dateArr[0])
        if(year-dateArr[0] > 80 || year-dateArr[0] < 15)
        {
            return false;
            break;
        }
        else if(dateArr[1] > month) {
            return false;
            break;
        }
        else if(dateArr[1] == month && dateArr[0] == year){
            if(dateArr[2] >= date) {
                return false;
                break;
        }}
        else if(dateArr[2] >= date && dateArr[0] > year&& dateArr[1] > month) {
            return false;
            break;
        }
        else {
            return true;
            break;
        }
        
    }
}

function storeInput(dob, postcode, state, probSolving, communication, management, teamwork, otherskill, gender){

    var solving = "", comm="", manage="", team="", other="", inputskill = "";
    if(document.getElementById("inputskill").value != ""){
        inputskill += document.getElementById("inputskill").value;
    }else inputskill += " ";
    
    if(probSolving){solving = "ProblemSolving";}
    if(communication) {comm += "Communication";}
    if(management){manage += "Management";}
    if(teamwork) {team += "Teamwork";}
    if(otherskill){other += inputskill}

    var arrSkill = [solving, comm,manage, team, other];
    
    sessionStorage.jobReferenceNum = document.getElementById("jobReferenceNum").value;
    sessionStorage.firstname = document.getElementById("firstName").value;
    sessionStorage.lastname = document.getElementById("lastName").value;
    sessionStorage.dob = dob;
    sessionStorage.email = document.getElementById("email").value;
    sessionStorage.phone = document.getElementById("phone").value;
    sessionStorage.gender = gender;
    sessionStorage.streetAddress = document.getElementById("streetAddress").value;
    sessionStorage.suburb = document.getElementById("suburb").value;
    sessionStorage.state = state;
    sessionStorage.postcode = postcode;
    sessionStorage.setItem("skill", JSON.stringify(arrSkill));
    sessionStorage.inputskill = inputskill;
    sessionStorage.firstTimer = "False";
}


function getState(){
    var stateName = "None";
    var stateArray = document.getElementById("state").getElementsByTagName("option");
    for(var i=0; i<stateArray.length ; i++){
        if(stateArray[i].selected)
        stateName= stateArray[i].value; //assign the value attribute
    }
    
    return stateName;
}

function sendInfo(){
    document.getElementById("jobReferenceNum").value = localStorage.jobReferenceNum;
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
    if(sessionStorage.firstTimer == undefined){
        alert("Go To Apply From Job Page!")
        window.location.assign("jobs.html");
    }
    else if(sessionStorage.firstTimer == "False"){
        if(localStorage.jobReferenceNum != undefined){
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
     
        }
        else{
            alert("Go To Apply From Job Page!")
            window.location.assign("jobs.html");
        }
       
    }
    else{
        sendInfo();
    }


}
   
// this function is called when the browser window loads
// it will register functions that will respond to browser events
function init() {
    //console.log(include('enhancements.js'))
    //document.querySelector("#skillDes").style.display = "none"; 
    prefill_form();
    var regForm = document.getElementById("regform");
    regForm.onsubmit = validation; //register the event listener

}

window.addEventListener("load", init);