  var dropLocations = data;
        console.log(data);
      if (dropLocations>0) {
          var lat, lng;
        for(var i in dropLocations) {
            console.log('hello');
            /*var mygeocoder = new google.maps.Geocoder();
            mygeocoder.geocode({'address' : '10 Leon St. Boston MA 02115'}, function(results, status){
            lat = results[0].geometry.location.lat();
            lng = results[0].geometry.location.lng();
            });
                            
                        var geocoder = new google.maps.Geocoder();
                        geocoder.geocode( { 'address': '10 Leon St. Boston MA 02115'}, function(results, status) {
                      if (status == google.maps.GeocoderStatus.OK) {
                        //map.setCenter(results[0].geometry.location);
                          console.log(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                      } else {
                        alert("Geocode was not successful for the following reason: " + status);
                      }
                    });
          var info = {
            latitude: lat, 
            longitude: lng,
            address: dropLocations[i].street + ' ' + dropLocations[i].city + ' ' + dropLocations[i].state + ' ' + dropLocations[i].zipcode
          };
            console.log(info);
          drops.push(info);
          console.log(drop);*/
        } 
        addMarkers();
      }
      else {
        //no drop locations
      }
    }).fail(function(error){
      alert("There was an error loading the drop locations, please refresh the page and try agian");
    });