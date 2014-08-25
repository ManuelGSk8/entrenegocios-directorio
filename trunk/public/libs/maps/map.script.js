function initialize() {

    var markers = [];
    var mapOptions = {
        zoom: 13,
        center: new google.maps.LatLng(-12.060590, -77.041752)
    };

    var map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);

    var input = /** @type {HTMLInputElement} */(
        document.getElementById('pac-input'));
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var searchBox = new google.maps.places.SearchBox(
        /** @type {HTMLInputElement} */(input));


    google.maps.event.addListener(searchBox, 'places_changed', function(){
        var places = searchBox.getPlaces();

        if(places.length == 0)
        {
            return;
        }

        for (var i = 0, marker; marker = markers[i]; i++) {
            marker.setMap(null);
        }

        markers = [];
        var bounds = new google.maps.LatLngBounds();

        var place = places[0];

        for (var i = 0, marker; marker = markers[i]; i++) {
            marker.setMap(null);
        }

        var marker = new google.maps.Marker({
            map: map,
            title: place.name,
            position: place.geometry.location,
            draggable:true,
            animation: google.maps.Animation.DROP

        });

        markers.push(marker);
        bounds.extend(place.geometry.location);
        map.fitBounds(bounds);

        $('#latitud').val(marker.getPosition().lat());
        $('#longitud').val(marker.getPosition().lng());

        google.maps.event.addListener(marker, 'dragend', function(event){
            $('#latitud').val(event.latLng.lat());
            $('#longitud').val(event.latLng.lng());
        });


    });

    google.maps.event.addListener(map, 'bounds_changed', function() {
        var bounds = map.getBounds();
        searchBox.setBounds(bounds);
    });
}


function loadScript() {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&' +
        '&libraries=places&callback=initialize';
    document.body.appendChild(script);
}

window.onload = loadScript;
