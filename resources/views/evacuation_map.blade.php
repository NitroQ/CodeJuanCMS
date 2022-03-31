@extends('template.main')

@section('main-content')
<style>
    #mapid{
        height: 100vh;
    }
    .content{
        margin-bottom: 0!important;
    }
</style>

<div id="mapid"></div>

<script>
    var mymap = L.map('mapid').setView([14.581577980357437, 121.03816173208617], 16);
    L.tileLayer( 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    }).addTo( mymap );
    var markers = {!! json_encode($centers) !!};
    var icon = L.divIcon({
        html: '<span style=></span>'
    });

    var red = new L.Icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    console.log(markers);

    markers.map( function(item) {
        tip =    '<div class="row align-items-center">'
                + '<div class="col-2"> <i class="fas fa-hotel" style="font-size:40px;color:#A72A2C"></i> </div>'
                + '<div class="col"> <h4><b>' + item.name + '</b></h4></div>'
                + '</div> <hr style="margin-top:0"> <div class="row"><div class="col">' 
                + '<i class="fas fa-map-marker-alt"></i>&nbsp;' + item.address +'<br>'
                + '<i class="fas fa-phone"></i>&nbsp;' + item.contact +'<br>'
                + item.description +'<br>'
                + '</div></div>' 
                + '<div class="row"><div class="col">' 
                + '<a href="https://www.google.com/maps/search/?api=1&query=' + item.address + '" class="btn btn-danger btn-sm" style="color:white;float:right" target="_blank">Get Directions</a>'
                + '</div></div>'

        marker = L.marker([item.latitude,item.longitude] , {icon: red})
        .addTo(mymap)
        .bindPopup(tip);
    });

</script>
    
@endsection