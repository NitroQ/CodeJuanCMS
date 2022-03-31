@extends('template.main')

@section('main-content')

<div class="row">
    <div class="col">
        <div style="z-index: 999;position:absolute;top:40%;left:20%">
            <img src="/images/poster.png" class="poster-image">
        </div>
        <img src="/images/main_banner.png" class="landing-image">
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-6 text-center">
        <h1 class=" my-5 h-b">What is Code Juan</h1>
        <p>Code Juan aims to equip the public with the essential knowledge on Disaster Risk Reduction.
            Code Juan is developed to inform and encourage the Filipino people to prepare, respond and put emphasis on emergencies. And that is through having an updated background of latest announcements from Local Government units regarding human-induced or natural disasters. 
            Furthermore, it is a reference used for safety procedures, disaster management, contact services, and public directory.
        </p>
    </div>
</div>

<div class="row row-icn-icn justify-content-center px-3 my-5">
    <div class="col-lg-2 text-center">
        <i class="fas fa-user-shield"></i>        
        <br>
        <label>Safety</label>
        <br>
        <p>Find the evacuation areas near you! Know where to go in times of emergency.</p>
    </div>
    <div class="col-lg-2 text-center" id="mid-col">
        <i class="fas fa-brain"></i>
        <br>
        <label>Awareness</label>
        <br>
        <p>Be informed and increase disaster, risk, and threats literacy. </p>
    </div>
    <div class="col-lg-2 text-center">
        <i class="fas fa-briefcase-medical"></i>
        <br>
        <label>Essentials</label>
        <br>
        <p>Plan ahead and arm yourself with the essentials. Being prepared saves lives.</p>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-6 text-center">
        <h1 class=" mt-5 h-b">Be Alert!</h1>
        <p>Read the latest emergency alerts.</p>
    </div>
</div>

<div class="row justify-content-center">
    @foreach ($alerts as $a)
        <div class="col-lg-3">
            <div class="card alert-card">
                <div class="card-body">
                    <img src="/uploads/alerts/{{ $a->image or 'placeholder.png' }}" class="card-img">
                    <small class="date-sm">{{ $a->created_at->format('F j, Y') }}</small>
                    <div class="w-100 text-center my-3">
                        <div style="height: 60px">
                            <h5 class="line-clamp">{{ $a->title }}</h5>
                        </div>
                        <p class="line-clamp">{!! strip_tags($a->description) !!}</p>
                        <a href="{{ route('alerts-view' , [$a->id]) }}">Read Details</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>


@if (!$disaster_nav->isEmpty())
<div class="row justify-content-center">
    <div class="col-lg-6 text-center">
        <h1 class=" mt-5 h-b">Learn More</h1>
        <p>Immerse yourself and learn more about disasters.</p>
    </div>
</div>

<div class="row justify-content-center">
    @foreach ($disaster_nav as $d)
    <a href="{{ route('disaster-page' , [ $d->disaster_type ]) }}" class="text-decoration-none" style="color: black;"">
        <div class="card-mini">
            <div class="card-body">
                {{ $d->disaster_type }}
            </div>
        </div>
    </a>

    @endforeach
</div>    
@endif

@endsection