@extends('template.admin')

@section('admin-content')
{{-- Leaflt Map CSS--}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/>
{{-- Leaflt Map JS--}}
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>

<style>
 

</style>

<div id="stats">
    <div class="card card-stat">
        <div class="card-body">
            <i class="fas fa-hotel" id="card-icn"></i></i>
            <div class="card-title">Evacuation Centers</div>
            <br>
            <p class="card-text">{{ $centers->count() }}</p>
        </div>
        <div class="card-footer">
            <a class="col-a px-3" href="javascript:;" data-toggle="collapse" data-target="#list">Expand Details<i class="fas fa-chevron-down"></i></a>
            <br>
            <ul id="list" class="collapse">
                @foreach ($centers as $x)
                <li class="list-ec p-2 border-bottom" onclick="popUp({{$x->latitude}} , {{$x->longitude}})">
                    <div>
                      <h6 class="mx-2 my-0"><b>{{ $x->name }}</b></h6>
                      <small>{{ $x->address }}</small>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
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

        marker = L.marker([item.latitude,item.longitude] , {icon: red})
        .addTo(mymap)
        .bindPopup(tip);
    });

    function popUp(lat,lng){

        mymap.flyTo([lat, lng], 18);

    }

</script>

    
@endsection