/**
*Author: Davy Sung 103535521
*Target:manage.php
*Purpose: This file is for any function relevant to the target page.
*Created: 08/10/2021
*Last Updated: 08/10/2021
*Credits: 
*/
"use strict";
function confirmationFunc() {
    var con = confirm("Are you sure you want to delete?");
    const params = new URLSearchParams(location.search);
    if(con == true){
        params.set('delete', true);
        
    }else{
        params.set('delete', false);
    }
        params.toString();
        window.history.replaceState({}, '', `${location.pathname}?${params.toString()}`);
}

function init3(){
        document.getElementById("deleteAll").addEventListener("click", confirmationFunc);;


 }
 
 window.addEventListener("load", init3);
 