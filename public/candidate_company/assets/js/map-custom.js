"use strict";
function gMapHome () {
  if ($('.google-map-home').length) {
    $('.google-map-home').each(function () {
      // getting options from html 
      var Self = $(this);
      var mapName = Self.attr('id');
      var mapLat = Self.data('map-lat');
      var mapLng = Self.data('map-lng');
      var iconPath = Self.data('icon-path');
      var mapZoom = Self.data('map-zoom');
      var mapTitle = Self.data('map-title');


      var styles = [{"featureType": "all", "elementType": "labels.text", "stylers": [{"visibility": "off"} ] }, {"featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{"color": "#444444"} ] }, {"featureType": "landscape", "elementType": "all", "stylers": [{"color": "#f2f2f2"} ] }, {"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "road", "elementType": "all", "stylers": [{"saturation": -100 }, {"lightness": 45 } ] }, {"featureType": "road.highway", "elementType": "all", "stylers": [{"visibility": "simplified"} ] }, {"featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{"visibility": "off"} ] }, {"featureType": "road.local", "elementType": "labels.text", "stylers": [{"visibility": "off"} ] }, {"featureType": "transit", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "water", "elementType": "all", "stylers": [{"color": "#ffe807"}, {"visibility": "on"} ] } ];


      if ($(this).hasClass('skin_1')) {
        var iconPath = 'images/resource/p1.png';
        var styles = [{"featureType": "all", "elementType": "labels.text", "stylers": [{"visibility": "off"} ] }, {"featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{"color": "#444444"} ] }, {"featureType": "landscape", "elementType": "all", "stylers": [{"color": "#f2f2f2"} ] }, {"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "road", "elementType": "all", "stylers": [{"saturation": -100 }, {"lightness": 45 } ] }, {"featureType": "road.highway", "elementType": "all", "stylers": [{"visibility": "simplified"} ] }, {"featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{"visibility": "off"} ] }, {"featureType": "road.local", "elementType": "labels.text", "stylers": [{"visibility": "off"} ] }, {"featureType": "transit", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "water", "elementType": "all", "stylers": [{"color": "#ffe807"}, {"visibility": "on"} ] } ];
      }

      if ($(this).hasClass('skin_2')) {
        var iconPath = 'images/resource/p2.png';
        $( this ).css("box-shadow", "rgba(0, 0, 0, 0.64) 0px 0px 6px");
        var styles = [
        {"featureType": "all", "elementType": "labels", "stylers": [{"visibility": "on"} ] }, 
        {"featureType": "all", "elementType": "labels.text.stroke", "stylers": [{"saturation": 0}, {"color": "#000000"}, {"lightness": 30} ] },
        {"featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{"saturation": 30}, {"color": "#000000"}, {"lightness": 80} ] },
        {"featureType": "landscape", "elementType": "all", "stylers": [{"color": "#464646"} ] },
        {"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "off"} ] },
        {"featureType": "road", "elementType": "all", "stylers": [{"saturation": -100 }, {"lightness": 45 }, {"visibility": "off"} ] },
        {"featureType": "road.highway", "elementType": "all", "stylers": [{"visibility": "simplified"},{"visibility": "off"} ] },
        {"featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{"visibility": "off"} ] },
        {"featureType": "transit", "elementType": "all", "stylers": [{"visibility": "off"} ] },
        {"featureType": "water", "elementType": "all", "stylers": [{"color": "#3c3c3c"}, {"visibility": "on"} ] } ]; 
      }

      if ($(this).hasClass('skin-3')) {
        var iconPath = 'images/resource/p3.png';
        var styles = [{"featureType": "all", "elementType": "labels", "stylers": [{"visibility": "off"} ] }, {"featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{"color": "#444444"} ] }, {"featureType": "landscape", "elementType": "all", "stylers": [{"color": "#f2f2f2"} ] }, {"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "road", "elementType": "all", "stylers": [{"saturation": -100 }, {"lightness": 45 } ] }, {"featureType": "road.highway", "elementType": "all", "stylers": [{"visibility": "simplified"} ] }, {"featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{"visibility": "off"} ] }, {"featureType": "transit", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "water", "elementType": "all", "stylers": [{"color": "#13a0b2"}, {"visibility": "on"} ] } ];
      }

      if ($(this).hasClass('skin-4')) {
        var iconPath = 'images/resource/p4.png';
        var styles = [{"featureType": "all", "elementType": "labels", "stylers": [{"visibility": "off"} ] }, {"featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{"color": "#444444"} ] }, {"featureType": "landscape", "elementType": "all", "stylers": [{"color": "#f2f2f2"} ] }, {"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "road", "elementType": "all", "stylers": [{"saturation": -100 }, {"lightness": 45 } ] }, {"featureType": "road.highway", "elementType": "all", "stylers": [{"visibility": "simplified"} ] }, {"featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{"visibility": "off"} ] }, {"featureType": "transit", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "water", "elementType": "all", "stylers": [{"color": "#44e2ff"}, {"visibility": "on"} ] } ];
      }

      // if zoom not defined the zoom value will be 15;
      if (!mapZoom) {
        var mapZoom = 12;
      };
      // init map
      var map;
      map = new GMaps({
          div: '#'+mapName,
          scrollwheel: false,
          lat: mapLat,
          lng: mapLng,
          styles: styles,
          zoom: mapZoom
      });
      // if icon path setted then show marker
      if(iconPath) {
        map.addMarker({
          icon: 'images/resource/p1.png',
          lat: 51.665929,
            lng: -4.705519,
            title: 'Tenby ',
            infoWindow: {
            content: '<img src="images/partners/m1.jpg" alt="m1.jpg"> <h4>General Ledger Accountant</h4> <p class="fz14">Posted 23 August by <span class="text-thm2">Wiggle CRC</span></p>'
          }
        });
        map.addMarker({
          icon: 'images/resource/p2.png',
          lat: 52.113522,
            lng: -4.082160,
            title: 'Sub Office for Rental',
            infoWindow: {
            content: '<img src="images/partners/m1.jpg" alt="m1.jpg"> <h4>General Ledger Accountant</h4> <p class="fz14">Posted 23 August by <span class="text-thm2">Wiggle CRC</span></p>'
          }
        });
        map.addMarker({
          icon: 'images/resource/p4.png',
          lat: 51.820656,
            lng: -4.494697,
            title: 'St Clears',
            infoWindow: {
            content: '<img src="images/partners/m1.jpg" alt="m1.jpg"> <h4>General Ledger Accountant</h4> <p class="fz14">Posted 23 August by <span class="text-thm2">Wiggle CRC</span></p>'
          }
        });
        map.addMarker({
          icon: 'images/resource/p1.png',
          lat: 51.679268,
            lng: -3.812692,
            title: 'Neath',
            infoWindow: {
            content: '<img src="images/partners/m1.jpg" alt="m1.jpg"> <h4>General Ledger Accountant</h4> <p class="fz14">Posted 23 August by <span class="text-thm2">Wiggle CRC</span></p>'
          }
        });
        map.addMarker({
          icon: 'images/resource/p1.png',
          lat: 52.384113,
            lng: -3.434125,
            title: 'Rhayader',
            infoWindow: {
            content: '<img src="images/partners/m1.jpg" alt="m1.jpg"> <h4>General Ledger Accountant</h4> <p class="fz14">Posted 23 August by <span class="text-thm2">Wiggle CRC</span></p>'
          }
        });
        map.addMarker({
          icon: 'images/resource/p1.png',
          lat: 51.759407,
            lng: -5.171406,
            title: 'Pembrokeshire Coast National Park',
            infoWindow: {
            content: '<img src="images/partners/m1.jpg" alt="m1.jpg"> <h4>General Ledger Accountant</h4> <p class="fz14">Posted 23 August by <span class="text-thm2">Wiggle CRC</span></p>'
          }
        });
        map.addMarker({
          icon: 'images/resource/p1.png',
          lat: 52.355605,
            lng: -4.105606,
            title: 'Aberystwyth',
            infoWindow: {
            content: '<img src="images/partners/m1.jpg" alt="m1.jpg"> <h4>General Ledger Accountant</h4> <p class="fz14">Posted 23 August by <span class="text-thm2">Wiggle CRC</span></p>'
          }
        });
        map.addMarker({
          icon: 'images/resource/p8.png',
          lat: 51.402238,
            lng: -3.311549,
            title: 'Barry',
            infoWindow: {
            content: '<img src="images/partners/m1.jpg" alt="m1.jpg"> <h4>General Ledger Accountant</h4> <p class="fz14">Posted 23 August by <span class="text-thm2">Wiggle CRC</span></p>'
          }
        });
        map.addMarker({
          icon: 'images/resource/p1.png',
          lat: 51.893709,
            lng: -3.451420,
            title: 'Brecon',
            infoWindow: {
            content: '<img src="images/partners/m1.jpg" alt="m1.jpg"> <h4>General Ledger Accountant</h4> <p class="fz14">Posted 23 August by <span class="text-thm2">Wiggle CRC</span></p>'
          }
        });        
      }
    });  
  };
}
// Dom Ready Function
jQuery(document).on('ready', function () {
  (function ($) {
    // add your functions
    gMapHome();
  })(jQuery);
});