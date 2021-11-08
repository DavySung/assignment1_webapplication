/**
*Author: Davy Sung 103535521
*Target:login.php
*Purpose: This file is for any function relevant to the target page.
*Created: 10/10/2021
*Last Updated: 10/10/2021
*Credits: 
*/
"use strict";
function loginTime(duration, display) {
    var timer = duration, minutes, seconds;
    var btn = document.getElementById("btnLogin");
   
      setInterval(function () {
        
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);
  
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
  
        display.textContent = minutes + ":" + seconds;
       
        if (--timer < 0) {
            timer = duration;
            btn.disabled = true;
        } if(timer == 0) {
            btn.disabled = false;
            sessionStorage.Count = 0;
            window.location.assign("login.php")
        }
       
    }, 1000);  
  }

function checkLogin(count){
    
    var countLimit = sessionStorage.Count;
    var display = document.querySelector('#time10');
    var btn = document.getElementById("btnLogin");
    var incCount = incrementCount(countLimit);
    if(sessionStorage.Count== undefined){
        sessionStorage.Count = 1;
    }
    else{
          if(countLimit == 3){
            loginTime(10, display);
            btn.disabled = true;
          }else {
            
            //btn.disabled = false;
            sessionStorage.Count = incCount;
        
          }

    }

}

function incrementCount(count){
    count++;
    return count;
}
function init3(){
    var login = document.getElementById("btnLogin");
    login.addEventListener("click", checkLogin);

 }
 
 window.addEventListener("load", init3);