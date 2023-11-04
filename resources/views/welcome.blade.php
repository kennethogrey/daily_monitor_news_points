<!DOCTYPE html>
<html>
<head>
    <title>
        Daily Monitor Sales Points
    </title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('leaflet/leaflet.css')}}">
</head>
<body>
<nav class="navbar bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand">News Points</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('login')}}">login</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-12" id="map" style="height: 90vh;"></div>
    </div>
</div>
<script src="{{asset('js/location.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('leaflet/leaflet.js')}}"></script>
<script>
    if ("geolocation" in navigator) {
        // Get the user's location and send it to the Laravel controller
        navigator.geolocation.getCurrentPosition(function(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            var map = L.map('map').setView([latitude, longitude], 13);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 25,
            }).addTo(map);
            var userMarker = L.marker([latitude,longitude]).addTo(map);
            userMarker.bindPopup("<b>Your current location</b><br>Latitude: "+latitude+"<br>Longitude: "+ longitude).openPopup();

            var newsIcon = L.icon({
                iconUrl: '/leaflet/images/newsIcon.png',

                iconSize:     [38, 95], // size of the icon
                shadowSize:   [50, 64], // size of the shadow
                iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
                shadowAnchor: [4, 62],  // the same for the shadow
                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });

            @foreach($news_points as $news_point)
            var newsPointMarker = L.marker([{{ $news_point->latitude }}, {{ $news_point->longitude }}], {icon: newsIcon}).addTo(map);
            newsPointMarker.bindPopup("<b>{{ $news_point->address }}</b><br>Latitude: {{ $news_point->latitude }}<br>Longitude: {{ $news_point->longitude }}").openPopup();
            @endforeach

        });
    } else {
       console.log("location not supported by browser");
    }

</script>
</body>
</html>
