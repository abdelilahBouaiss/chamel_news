(function($){
	$.fn.mapmarker = function(options){
		var opts = $.extend({}, $.fn.mapmarker.defaults, options);

		return this.each(function() {
			// Apply plugin functionality to each element
			var map_element = this;
			addMapMarker(map_element, opts.zoom, opts.center, opts.markers);
		});
	};
	
	// Set up default values
	var defaultMarkers = {
		"markers": []
	};

	$.fn.mapmarker.defaults = {
		
	}
	
	// Main function code here (ref:google map api v3)
	function addMapMarker(map_element, zoom, center, markers){
		//console.log($.fn.mapmarker.defaults['center']);
		
		//Set center of the Map
		var myOptions = {
		  zoom: zoom,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		var map = new google.maps.Map(map_element, myOptions);
		var geocoder = new google.maps.Geocoder();
		var infowindow = null;
		var baloon_text = "";
		
		
		
		//run the marker JSON loop here
		$.each(markers.markers, function(i, the_marker){
			latitude=the_marker.latitude;
			longitude=the_marker.longitude;
			icon=the_marker.icon;
			var baloon_text=the_marker.baloon_text;
			
			if(latitude!="" && longitude!="" && typeof(latitude)!='undefined' && typeof(longitude)!='undefined' ){
				var marker = new google.maps.Marker({
					map: map, 
					position: new google.maps.LatLng(latitude,longitude),
					animation: google.maps.Animation.DROP,
					icon: icon
				});
				
				// Set up markers with info windows 
				google.maps.event.addListener(marker, 'click', function() {
					// Close all open infowindows
					if (infowindow) {
						infowindow.close();
					}
					
					infowindow = new google.maps.InfoWindow({
						content: baloon_text
					});
					
					infowindow.open(map,marker);
				});
				map.setCenter(marker.getPosition());
			}else{
				
				geocoder.geocode( { 'address': center}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				//In this case it creates a marker, but you can get the lat and lng from the location.LatLng
				var marker = new google.maps.Marker({
					map: map, 
					position: results[0].geometry.location,
					animation: google.maps.Animation.DROP,
					icon: icon
				});
				
				// Set up markers with info windows 
				google.maps.event.addListener(marker, 'click', function() {
					// Close all open infowindows
					if (infowindow) {
						infowindow.close();
					}
					
					infowindow = new google.maps.InfoWindow({
						content: baloon_text
					});
					
					infowindow.open(map,marker);
				});
				map.setCenter(marker.getPosition());
			}
			else{
				console.log("Geocode was not successful for the following reason: " + status);
			}
		});
			}
			
		});
	}

})(jQuery);
