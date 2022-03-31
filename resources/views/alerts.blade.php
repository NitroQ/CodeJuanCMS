@extends('template.main')

@section('main-content')

<div class="row">
    <div class="col">
        <img src="/uploads/alerts/{{ $alert->image or 'placeholder.png' }}" class="buildkit-image">
    </div>
</div>

<div class = "row justify-content-center">
    <div class = "col-lg-5 py-5">
        <h1 class="subheadliner text-center">{{ $alert->title }}</h1>
        <p class="text-center">Posted on: {{ $alert->created_at->format('F j, Y') }}</p>

        <div class="my-5">
            {!! $alert->description !!}
        </div>

        {{-- <div class = "container_Cards">
            <div class = alerts_Card id = "card1">
                <div>
                    <img src="/images/Alert_Fire.jpg" class = "Head_img">
                    <img src="/images/Alert_EQuake.svg" class = "Head_icn">
                </div>

                <div class = "Alert_details" id = "details2">
                    <h5 class = "alert_title"> Fire Alert in <br> Metro Manila </h5>
                </div>

                <p class = "worded_det">
                    <b> Date: </b> March 1, 2021 <br>
                    <b> Calamity Degree: </b> 2nd Alarm <br>
                    <b> Address Affected: </b> Sto. Rosario, Brgy Plainview, Mandaluyong City | <i>Residential</i>
                </p>
            </div>

            <div class = alerts_Card id = "card2">
                <div>
                    <img src="/images/Alert_EQuake.jpg" class = "Head_img">
                    <img src="/images/Alert_Fire.svg" class = "Head_icn">
                </div>

                
                <div class = "Alert_details" id = "details1">
                        <h5 class = "alert_title"> Latest Earthquake in or near Mandaluyong City </h5>
                </div>

                <p class = "worded_det">
                        During the past 30 days, Mandaluyong City was shaken by 
                        1 quake of magnitude and 3 quakes between 2.0 and 3.0. 
                        There were also 6 quakes below magnitude 2.0 which people 
                        don't normally feel. <br>
                        <b>Updated 9 Apr 2021 18:08 GMT </b>
                </p>

                <p class = "worded_det">
                        <b> Biggest Quake: </b> 2.1 quake 7.2 km northeast of Balayan, 
                        Batangas, Calabarzon, Philippines, 2 Apr 2021 11:05 am (GMT +8) |
                        8 days ago <br>
                        <b> Most Recent Quake: </b> 1.9 quake South China Sea, 19 km west 
                        of Nasugbu, Batangas, Calabarzon, Philippines, 6 Apr 2021 10:27 pm 
                        (GMT +8) | 3 days ago
                </p>
            </div>

            <div class = alerts_Card id = "card3">
                <div>
                    <img src="/images/Alert_Fire2.jpg" class = "Head_img">
                    <img src="/images/Alert_EQuake.svg" class = "Head_icn">
                </div>

                <div class = "Alert_details" id = "details1">
                        <h5 class = "alert_title"> Fire Alert in <br> Metro Manila </h5>
                </div>

                <p class = "worded_det">
                    <b> Date: </b> March 6, 2020 <br>
                    <b> Calamity Degree: </b> 1st Alarm <br>
                    <b> Address Affected: </b> Sitio 4, Brgy. San Jose, Mandaluyong City, Metro Manila | <i>Residential</i>
                </p>
            </div>
        </div> --}}

    </div>
</div>

@endsection