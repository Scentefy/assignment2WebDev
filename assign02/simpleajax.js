// file simpleajax.js
var xhr = createRequest();
function getData(dataSource, divID, aName, aContact, aUnitno, aStreetno, aStreetname, aSuburb, aDestination, aPickuptime)  {
    if(xhr) {
	    var place = document.getElementById(divID);
	    var url = dataSource+"?name="+aName+
							"&contact="+aContact+
							"&unitno="+aUnitno+
							"&streetno="+aStreetno+
							"&streetname="+aStreetname+
							"&suburb="+aSuburb+
							"&destination="+aDestination+
							"&pickuptime="+aPickuptime;
	    xhr.open("GET", url, true);
	    xhr.onreadystatechange = function() {
		    alert(xhr.readyState);
			if (xhr.readyState == 4 && xhr.status == 200) {
			place.innerHTML = xhr.responseText;
		    } // end if
	    } // end anonymous call-back function
	    xhr.send(null);
	} // end if
} // end function getData()

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd+"T00:00:00";
document.getElementById("pickuptimefield").setAttribute("min", today);




