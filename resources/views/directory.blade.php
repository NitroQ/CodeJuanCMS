@extends('template.main')

@section('main-content')

<div class="row">

    <div class="col-lg-7 pl-5">
        <h2 id = "sect2_title">Directories</h2>
        <p id = "desc_evacdir">
            Ensure your safety by knowing the hotlines in case of emergency. 
            With DART you can browse important hotlines related to different
            types of emergency such as calamities and disasters.
        </p>


        @if (!$brgyDirectory->isEmpty())
            <div class="my-5">
                <h3 id = "sect_subtitle">Mandaluyong's Barangay Directory</h3>
                <hr id = "redline">
                @foreach ($brgyDirectory as $x)
                    <div class="row">
                        <div class="col">
                            <img src="/uploads/directory/{{ $x->image or 'Telephone.svg' }}" class = "DirIconMain">
                            <b>{{ $x->name }}</b>
                        </div>
                        <div class="col-4">{{ $x->contact }}</div>
                    </div>
                    <hr class="my-2">
                @endforeach
            </div>
        @endif

        @if (!$calDirectory->isEmpty())
            <div class="my-5">
                <h3 id = "sect_subtitle">Mandaluyong's  Calamity-Related Directory</h3>
                <hr id = "redline">
                @foreach ($calDirectory as $x)
                    <div class="row">
                        <div class="col">
                            <img src="/uploads/directory/{{ $x->image or 'Telephone.svg' }}" class = "DirIconMain">
                            <b>{{ $x->name }}</b>
                        </div>
                        <div class="col-2">{{ $x->contact }}</div>
                        <div class="col-2">{{ ucfirst($x->type) }}</div>
                    </div>
                    <hr class="my-2">
                @endforeach
            </div>
        @endif

        @if (!$otDirectory->isEmpty())
            <div class="my-5">
                <h3 id = "sect_subtitle">Others</h3>
                <hr id = "redline">
                @foreach ($otDirectory as $x)
                    <div class="row">
                        <div class="col">
                            <img src="/uploads/directory/{{ $x->image or 'Telephone.svg' }}" class = "DirIconMain">
                            <b>{{ $x->name }}</b>
                        </div>
                        <div class="col-2">{{ $x->contact }}</div>
                        <div class="col-2">{{ ucfirst($x->type) }}</div>
                    </div>
                    <hr class="my-2">
                @endforeach
            </div>
        @endif

    </div>

    <div class="col">

    </div>

    <div class="col-lg-4 p-0">
        <img src="/images/CityHall.jpg" class = "dirimg" id = "dirimg_1">
        <img src="/images/FireDepartment.jpg" class = "dirimg" id = "dirimg2">
    </div>
</div>


@endsection