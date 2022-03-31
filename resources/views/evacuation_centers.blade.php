@extends('template.main')

@section('main-content')

<div class="row">

    <div class="col-lg-7 pl-5">
        <h2 id = "sect2_title">Evacuation Centers</h2>
        <p id = "desc_evacdir">
            Know where to go by browsing through the different evacuation centers available.
            Equip yourself and your family with a place to go to in case of emergencies.
        </p>

        <div class="mt-5">
            <h3 id = "sect_subtitle">Mandaluyong City Evacuation Centers</h3>
            <hr id = "redline">
        </div>

        @foreach ($evac as $e)
        <div class = "spec_centers d-flex">
            <img src="/images/MapPointer.svg" class = "IconMain">
            <p class = "cent_name"> 
                <b>Center Name:</b>&nbsp; {{ $e->name }} <br>
                <b>Description:</b>&nbsp; {{ $e->description or '~' }} <br>
                <b>Address:</b>&nbsp; {{ $e->address }} <br>
                <b>Contact Number:</b>&nbsp;{{ $e->contact or '~' }} <br>
            </p>
        </div>
        @endforeach

    </div>  
    <div class="col"></div>
    <div class="col-lg-4 p-0">
        <img src="/images/Resources_EvacCenters.jpg" class = "dirimg" id = "dirimg_1">
        <img src="/images/Resources_EvacPlans.jpg" class = "dirimg" id = "dirimg2">
        <img src="/images/Resources_Resources.jpg" class = "dirimg" id = "dirimg2">
        <img src="/images/Resource_Evac1.jpg" class = "dirimg" id = "dirimg2">
        <img src="/images/Resource_Evac2.jpg" class = "dirimg" id = "dirimg2">
        <img src="/images/Resource_Evac3.jpg" class = "dirimg" id = "dirimg2">
        <img src="/images/Resource_Evac4.jpg" class = "dirimg" id = "dirimg2">
        <img src="/images/Resource_Evac5.jpg" class = "dirimg" id = "dirimg2">
    </div>
</div>



@endsection