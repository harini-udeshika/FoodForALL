let lat=document.getElementById("lat");
let lon=document.getElementById("lon");

let latVal=parseFloat(lat.value);
let longVal=parseFloat(lon.value);

function initAutocomplete() {
    let srilanka={lat: latVal ,lng: longVal};
    // The location of Uluru
    
    // The map, centered at Uluru
    var map = new google.maps.Map(document.getElementById("map"), {
      zoom: 15,
      center: srilanka,
      mapTypeControl: false,

    
    });
    

    var input = document.getElementById("locationInp");
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var autocomplete = new google.maps.places.Autocomplete(input);
    var marker=new google.maps.Marker({
      draggable:true,
  
      map:map
    });
    marker.setPosition(srilanka);
    marker.setVisible(true);
    autocomplete.bindTo("bounds", map);
    autocomplete.setFields(['address_components','geometry','name'])
    autocomplete.addListener('place_changed', function () {
      // marker.setVisible(false);
      var place = autocomplete.getPlace();
      if (!place.geometry) {
          // User entered the name of a Place that was not suggested and
          // pressed the Enter key, or the Place Details request failed.
          window.alert("No details available for input: '" + place.name + "'");
          return;
      }
  
      // If the place has a geometry, then present it on a map.
      if (place.geometry.viewport) {
          map.fitBounds(place.geometry.viewport);
      } else {
          map.setCenter(place.geometry.location);
          map.setZoom(17);  // Why 17? Because it looks good.
      }
      marker.setPosition(place.geometry.location);
      marker.setVisible(true);
  });
  google.maps.event.addListener(marker,'position_changed',
              function () {
                  document.getElementById('p-latitude').value=marker.position.lat();
                  document.getElementById('p-longitude').value=marker.position.lng();
              }
          )
  
  }
  
  document.addEventListener("DOMContentLoaded",function(event){initAutocomplete()});