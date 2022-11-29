// Use below link if you want to get latitude & longitude
// http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude.php	
$(document).ready(function(){
//set up markers 
var myMarkers = {"markers": [
{"latitude": "-37.8176419", "longitude":"144.9554397", "icon": "http://localhost/driveme/wp-content/themes/driveme/images/map-locator.png", "baloon_text": '121 King St, Melbourne VIC 3000, Australia'}
]};
//set up map options
$("#map").mapmarker({
	zoom	: 15,
	center	: '121 King Street Melbourne Victoria 3000 Australia',
	markers	: myMarkers
	});
});