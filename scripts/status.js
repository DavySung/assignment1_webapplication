/**
*Author: Davy Sung 103535521
*Target:status.php
*Purpose: This file is for any function relevant to the target page.
*Created: 10/10/2021
*Last Updated: 10/10/2021
*Credits: 
*/
"use strict";
function changevalue(){
    var changeVal = document.getElementById("changeSt").value;
    location.href='status.php?eoiNumber=' + changeVal; 
}
function init3(){
  

   var change = document.getElementById("changeSt"); 
   change.addEventListener("click", changevalue);
 

}

window.addEventListener("load", init3);
