
const initializeBlock = function (block) {
  let maps = block.querySelectorAll('[data-google-maps]');

  maps.forEach( (element) => initMap(element));

  function initMap(element) {
    // Find marker elements within map.
    let markers = element.querySelectorAll('[data-marker]');

    // Create generic map.
    let mapArgs = {
      zoom: +element.dataset.zoom || 16,
      mapId: '1231d563ed3655d4',
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      disableDefaultUI: true,
    };
    let map = new google.maps.Map(element, mapArgs);

    // Add markers.
    map.markers = [];
    markers.forEach(function (marker) {
      initMarker(marker, map);
    });

    // Center map based on markers.
    centerMap(map);

    // Return map instance.
    return map;
  }

  function initMarker(markerElement, map) {
    // Get position from marker.
    let lat = markerElement.dataset.lat;
    let lng = markerElement.dataset.lng;
    let latLng = {
      lat: parseFloat(lat),
      lng: parseFloat(lng)
    };

    // custom marker like image
    let icon = markerElement.dataset.iconMarker;

    // custom marker like svg
    icon = {
      // path: "M20 28.3333V15V5L29 12L21 18M14 22.1513C8.13634 23.1402 4 25.5355 4 28.3333C4 32.0152 11.1634 35 20 35C28.8366 35 36 32.0152 36 28.3333C36 25.5355 31.8637 23.1402 26 22.1513",
      path: "M-20,0a20,20 0 1,0 40,0a20,20 0 1,0 -40,0",
      strokeColor: '#0F6A52',
      anchor: new google.maps.Point(0,0),
      strokeWeight: 2,
      scale: 1
    }

    // Create marker instance.
    let marker = new google.maps.Marker({
      position: latLng,
      center: latLng,
      map: map,
      icon: icon,
    });

    // Append to reference for later use.
    map.markers.push(marker);

    // If marker contains HTML, add it to an infoWindow.
    if (markerElement.innerHTML) {
      // Create info window.
      let infowindow = new google.maps.InfoWindow({
        content: markerElement.innerHTML
      });

      // Show info window when marker is clicked.
      google.maps.event.addListener(marker, 'click', function () {
        infowindow.open(map, marker);
      });
    }
  }

  function centerMap(map) {
    // Create map boundaries from all map markers.
    let bounds = new google.maps.LatLngBounds();
    map.markers.forEach(function (marker) {
      bounds.extend({
        lat: marker.position.lat(),
        lng: marker.position.lng()
      });
    });

    // Case: Single marker.
    if (map.markers.length === 1) {
      map.setCenter(bounds.getCenter());

      // Case: Multiple markers.
    } else {
      map.fitBounds(bounds);
    }
  }
}

// Render maps on page load.
document.addEventListener('DOMContentLoaded', function () {

  let blocks = document.querySelectorAll('[data-google-maps-block]');
  blocks.forEach((block) => {
    initializeBlock(block);
  });
});
