var map;
function initMap() {
    var dropLocations = [];
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      center: {lat: 42.339348, lng: -71.088173},
      disableDefaultUI: true
    });
    
    var bounds = new google.maps.LatLngBounds();

    var contentString = 
        '<div id="bodyContent">'+
        '<p>You are here.</p>' +
        '</div>';

    var infowindow = new google.maps.InfoWindow({
      content: contentString
    });

    var marker = new google.maps.Marker({
      position: {lat: 42.339348, lng: -71.088173},
      map: map,
      maxWidth: 200,
      icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png'
    });
    
    marker.addListener('click', function() {
      infowindow.open(map, marker);
    });
    
    
    getDropLocations();
    //addMarkers();
  
    function addMarkers(dropLocation) {
          var contentString = '<div id="bodyContent">'+
                '<p>'+dropLocation.address+'</p>' +
                '</div>';
            console.log(contentString);
          infoWindow = new google.maps.InfoWindow({ 
            content: contentString, 
            maxWidth: 200 
          });

          var myLatLng = {lat: dropLocation.latitude, lng: dropLocation.longitude};
        
          dropLocation.mark = new google.maps.Marker({
            position: myLatLng,
            info: contentString,
            map: map
          });
            
          bounds.extend(dropLocation.mark.position);

           google.maps.event.addListener(dropLocation.mark, 'click', function() {
            infoWindow.setContent(this.info);
            infoWindow.open(map, this);
           });
        map.fitBounds(bounds);
    }
    
    function getDropLocations() {
    $.getJSON('http://recycle-that.jastcode.com/api/drop', function (data) {
    var drops = data; 
    if (drops.length) {
        for(var i in drops){
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode( { 'address': drops[i].street + ', ' + drops[i].city + ' ' + drops[i].state + ' ' + drops[i].zipcode}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var lat = results[0].geometry.location.lat();
                    var lng = results[0].geometry.location.lng();
                    var info = {
                        latitude: lat,
                        longitude: lng,
                        address: results[0].formatted_address
                    };
                    console.log(info);
                    dropLocations.push(info);
                    addMarkers(info);
                  
                } 
            });
            
        }
        console.log(dropLocations);
       
    }
        else{
            console.log('no');
        }
  }).fail(function(error){
      alert("There was an error loading the drop locations, please refresh the page and try agian");
    });
    }
      
   
}