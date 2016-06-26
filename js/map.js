var map;
function initMap() {
   /*var dropLocations = [{"id":48,"title":"Helgelandskysten","longitude":12.63376,"latitude":66.02219},{"id":46,"title":"Tysfjord","longitude":16.50279,"latitude":68.03515},{"id":44,"title":"Sledehunds-ekspedisjon","longitude":7.53744,"latitude":60.08929},{"id":43,"title":"Amundsens sydpolferd","longitude":11.38411,"latitude":62.57481},{"id":39,"title":"Vikingtokt","longitude":6.96781,"latitude":60.96335},{"id":6,"title":"Tungtvann- sabotasjen","longitude":8.49139,"latitude":59.87111}];*/
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      center: {lat: 66.022, lng: 12.633},
      disableDefaultUI: true
    });
    
    var bounds = new google.maps.LatLngBounds();

    var contentString = 
        '<div id="bodyContent">'+
        '<p>301 Mass. Ave. Boston, MA 02115</p>' +
        '</div>';

    var infowindow = new google.maps.InfoWindow({
      content: contentString
    });

    var marker = new google.maps.Marker({
      position: {lat: 66.022, lng: 12.633},
      map: map,
      maxWidth: 200
    });
    
    marker.addListener('click', function() {
      infowindow.open(map, marker);
    });
    
    addMarkers();
  
    function addMarkers() {
        for(var i in dropLocations) {
          var contentString = '<div id="bodyContent">'+
                '<p>'+dropLocations[i].title+'</p>' +
                '</div>';

          infoWindow = new google.maps.InfoWindow({ 
            content: contentString, 
            maxWidth: 200 
          });

          var myLatLng = {lat: dropLocations[i].latitude, lng: dropLocations[i].longitude};
          dropLocations[i].mark = new google.maps.Marker({
            position: myLatLng,
            info: contentString,
            map: map
          });
            
          bounds.extend(dropLocations[i].mark.position);

           google.maps.event.addListener(dropLocations[i].mark, 'click', function() {
            infoWindow.setContent(this.info);
            infoWindow.open(map, this);
           });
        }
        map.fitBounds(bounds);
    }
    
      
   
}