/**
*Author: Davy Sung 103535521
*Target: apply.html
*Purpose: This file is for any function relevant to the target page.
*Created: 19/09/2021
*Last Updated: 24/09/2021
*Credits: 
*/

//Timeout Function for apply.html
//src = https://stackoverflow.com/questions/20618355/how-to-write-a-countdown-timer-in-javascript
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if(minutes==1 && seconds == 00){
            alert("You have 1min left to complete or you will redirect back to Job Description Page!")
           
        }
        
        if (--timer < 0) {
            timer = duration;
            window.location.assign("jobs.html")
        }
    }, 1000);
}
//src https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform?hl=en
// This sample uses the Places Autocomplete widget to:
// 1. Help the user select a place
// 2. Retrieve the address components associated with that place
// 3. Populate the form fields with those address components.
// This sample requires the Places library, Maps JavaScript API.
// Include the libraries=places parameter when you first load the API.
// For example: <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
let autocomplete;
let address1Field;
let address2Field;
let postalField;

function initAutocomplete() {
  address1Field = document.querySelector("#streetAddress");
  //address2Field = document.querySelector("#address2");
  postalField = document.querySelector("#postcode");
  // Create the autocomplete object, restricting the search predictions to
  // addresses in the US and Canada.
  autocomplete = new google.maps.places.Autocomplete(address1Field, {
    componentRestrictions: { country: ["au"] },
    fields: ["address_components", "geometry"],
    types: ["address"],
  });
  address1Field.focus();
  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener("place_changed", fillInAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  const place = autocomplete.getPlace();
  let address1 = "";
  let postcode = "";
 
  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  // place.address_components are google.maps.GeocoderAddressComponent objects
  // which are documented at http://goo.gle/3l5i5Mr
  for (const component of place.address_components) {
    const componentType = component.types[0];
    console.log(component)
    switch (componentType) {
      case "street_number": {
        address1 = `${component.long_name} ${address1}`;
        break;
      }

      case "route": {
        address1 += component.short_name;
        break;
      }

      case "postal_code": {
        postcode = `${component.long_name}${postcode}`;
        break;
      }

      case "postal_code_suffix": {
        postcode = `${postcode}-${component.long_name}`;
        break;
      }
      case "locality":
        document.querySelector("#suburb").value = component.short_name;
        break;
      case "administrative_area_level_1": {
        console.log(component.short_name);
        var ty = component.short_name.toLowerCase();

           var ddl = document.getElementById('state');
            var opts = ddl.options.length;
            for (var i=0; i<opts; i++){
                if (ddl.options[i].value == ty){
                    ddl.options[i].selected = true;
                    break;
                }
            } 
        
        break;
      }
      case "country":
        document.querySelector("#country").value = component.long_name;
        break;
    }
  }

  address1Field.value = address1;
  postalField.value = postcode;
  // After filling the form with address components from the Autocomplete
  // prediction, set cursor focus on the second address line to encourage
  // entry of subpremise information such as apartment, unit, or floor number.
  address1Field.focus();
}

function init2(){

        $("#skillDes").hide();
        $("#error").hide();
       
        $("#otherskills").click(function () {
            if ($(this).is(":checked")) {
                $("#skillDes").show();
                
            } else {
                $("#skillDes").hide();
               
            }
        });
        initAutocomplete();
        var twentyMinutes = 60 * 7,
        display = document.querySelector('#timeLimit');
        startTimer(twentyMinutes, display);

}

window.addEventListener("load", init2);

