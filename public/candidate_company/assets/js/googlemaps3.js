jQuery(function($) {
  // Asynchronously Load the map API 
  var script = document.createElement('script');
  script.src = "https://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
  document.body.appendChild(script);
});

var grayStyles = [{
  featureType: "all",
  stylers: [{
    saturation: -100
  }, {
    lightness: 0
  }]
}, ];




function initialize() {
  var map;
  var bounds = new google.maps.LatLngBounds();
  var mapOptions = {
    scrollwheel: false,
    navigationControl: true,
    mapTypeControl: true,
    zoomControl: true,
    disableDefaultUI: false,
    styles: grayStyles,
    mapTypeId: 'roadmap'
  };

  // Display a map on the page
  map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
  map.setTilt(45);

  // Multiple Markers
  var markers = [
    ['København, Denmark', 55.6760968, 12.5683371],
    ['Aalborg, Denmark', 57.046707, 9.935932],
    ['Århus, Denmark', 56.162939, 10.203921],
    ['Esbjerg, Denmark', 55.476466, 8.459405],
    ['Odense, Denmark', 55.403756, 10.40237],
  ];


  // Info Window Content
  var infoWindowContent = [
    ['<div class="info_content">' +
      '<h3>The Havens</h3>' +
      '<img src="images/partners/1.jpg" alt="">' +
      '<h4>General Ledger Accountant</h4>' +
      '<p>Posted 23 August by <span class="text-thm2">Wiggle CRC</span>.</p>'
    ],
    ['<div class="info_content">' +
      '<h3>Aalborg</h3>' +
      '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>'
    ],
    ['<div class="info_content">' +
      '<h3>Århus</h3>' +
      '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>'
    ],
    ['<div class="info_content">' +
      '<h3>Esbjerg</h3>' +
      '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>'
    ],
    ['<div class="info_content">' +
      '<h3>Odense</h3>' +
      '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>'
    ]
  ];

  // Display multiple markers on a map
  var infoWindow = new google.maps.InfoWindow(),
    marker, i;

  // Loop through our array of markers & place each one on the map  
  for (i = 0; i < markers.length; i++) {
    var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
    bounds.extend(position);
    marker = new google.maps.Marker({
      position: position,
      map: map,
      title: markers[i][0],
      animation: google.maps.Animation.DROP,
      icon: {
        url: "http://buskinlondon.com/sites/all/modules/custom/busk_geo/img/marker-neutral.svg", //change your custom marker icon here
        scaledSize: new google.maps.Size(26, 42)
      }
    });

    // Allow each marker to have an info window    
    google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        infoWindow.setContent(infoWindowContent[i][0]);
        infoWindow.open(map, marker);
      }
    })(marker, i));

    // Automatically center the map fitting all markers on the screen
    map.fitBounds(bounds);
  }

  // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
  var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
    this.setZoom(6);
    google.maps.event.removeListener(boundsListener);
  });

  // color overlay
  var color = "#3498db"; //Set your tint color. Needs to be a hex value.
  bounds = new google.maps.LatLngBounds(
    new google.maps.LatLng(-84.999999, -179.999999),
    new google.maps.LatLng(84.999999, 179.999999));

  rect = new google.maps.Rectangle({
    bounds: bounds,
    fillColor: color,
    fillOpacity: 0.15,
    strokeWeight: 0,
    map: map
  });
}

// get coordinates http://www.mapcoordinates.net/en