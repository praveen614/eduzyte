    // function initialize() {
    //   var mapOptions = {
    //     zoom: 12,
    //     scrollwheel: false,
    //             styles: [{
    //         "featureType": "water",
    //         "elementType": "geometry",
    //         "stylers": [{
    //             "color": "#e9e9e9"
    //         }, {
    //             "lightness": 17
    //         }]
    //     }, {
    //         "featureType": "landscape",
    //         "elementType": "geometry",
    //         "stylers": [{
    //             "color": "#f5f5f5"
    //         }, {
    //             "lightness": 20
    //         }]
    //     }, {
    //         "featureType": "road.highway",
    //         "elementType": "geometry.fill",
    //         "stylers": [{
    //             "color": "#ffffff"
    //         }, {
    //             "lightness": 17
    //         }]
    //     }, {
    //         "featureType": "road.highway",
    //         "elementType": "geometry.stroke",
    //         "stylers": [{
    //             "color": "#ffffff"
    //         }, {
    //             "lightness": 29
    //         }, {
    //             "weight": 0.2
    //         }]
    //     }, {
    //         "featureType": "road.arterial",
    //         "elementType": "geometry",
    //         "stylers": [{
    //             "color": "#ffffff"
    //         }, {
    //             "lightness": 18
    //         }]
    //     }, {
    //         "featureType": "road.local",
    //         "elementType": "geometry",
    //         "stylers": [{
    //             "color": "#ffffff"
    //         }, {
    //             "lightness": 16
    //         }]
    //     }, {
    //         "featureType": "poi",
    //         "elementType": "geometry",
    //         "stylers": [{
    //             "color": "#f5f5f5"
    //         }, {
    //             "lightness": 21
    //         }]
    //     }, {
    //         "featureType": "poi.park",
    //         "elementType": "geometry",
    //         "stylers": [{
    //             "color": "#dedede"
    //         }, {
    //             "lightness": 21
    //         }]
    //     }, {
    //         "elementType": "labels.text.stroke",
    //         "stylers": [{
    //             "visibility": "on"
    //         }, {
    //             "color": "#ffffff"
    //         }, {
    //             "lightness": 16
    //         }]
    //     }, {
    //         "elementType": "labels.text.fill",
    //         "stylers": [{
    //             "saturation": 36
    //         }, {
    //             "color": "#333333"
    //         }, {
    //             "lightness": 40
    //         }]
    //     }, {
    //         "elementType": "labels.icon",
    //         "stylers": [{
    //             "visibility": "off"
    //         }]
    //     }, {
    //         "featureType": "transit",
    //         "elementType": "geometry",
    //         "stylers": [{
    //             "color": "#f2f2f2"
    //         }, {
    //             "lightness": 19
    //         }]
    //     }, {
    //         "featureType": "administrative",
    //         "elementType": "geometry.fill",
    //         "stylers": [{
    //             "color": "#fefefe"
    //         }, {
    //             "lightness": 20
    //         }]
    //     }, {
    //         "featureType": "administrative",
    //         "elementType": "geometry.stroke",
    //         "stylers": [{
    //             "color": "#fefefe"
    //         }, {
    //             "lightness": 17
    //         }, {
    //             "weight": 1.2
    //         }]
    //     }],
    //     center: new google.maps.LatLng(40.676128, -74.4910406)
    //   };
    //   var map = new google.maps.Map(document.getElementById('map'),mapOptions);
    //   var marker = new google.maps.Marker({
    //     position: map.getCenter(),
    //     icon: 'img/others/map-marker-icon.png',
    //     map: map
    //   });
    // }
    // google.maps.event.addDomListener(window, 'load', initialize);   



       $(document).ready(function() {
    
  var locations = [
      ['London Eye', 17.689461, 83.230848,12],
      ['London Eye', 17.689542, 83.232747,12],
      ['London Eye', 17.689619, 83.230891,12],
      ['London Eye', 17.689517, 83.231524,12],
      ['London Eye', 17.689542, 83.231792,11],
      ['London Eye', 17.689568, 83.231631,10],
      ['London Eye', 17.689614, 83.231707,9],
      ['London Eye', 17.689619, 83.231889,8],
      ['London Eye', 17.689675, 83.231538,7],
      ['London Eye', 17.689727, 83.231719,6],
      ['London Eye', 17.689546, 83.231042,5],
      ['Charing Cross', 17.689383, 83.231728, 4],
      ['Leicester Square', 17.689959, 83.232585, 3],
      ['Euston Station', 17.689056, 83.231475, 2],
      ['Kings Cross Station', 17.688996, 83.2323144, 1]
    ];

    var map = new google.maps.Map(document.getElementById('map2'), {
      zoom:5,
      center: new google.maps.LatLng(17.689916, 83.231385),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      disableDefaultUI: true
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;
    var markers = new Array();

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      markers.push(marker);

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }

    function AutoCenter() {
      //  Create a new viewpoint bound
      var bounds = new google.maps.LatLngBounds();
      //  Go through each...
      $.each(markers, function (index, marker) {
      bounds.extend(marker.position);
      });
      //  Fit these bounds to the map
      map.fitBounds(bounds);
    }
    AutoCenter();

        });