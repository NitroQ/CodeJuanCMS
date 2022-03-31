<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>CodeJuan</title>

        <!--Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!-- JQUERY -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <!--Icon-->
        <script src="https://kit.fontawesome.com/f67ab1f0a2.js" crossorigin="anonymous"></script>
        <link rel='icon' type='image/png' href='/images/favicon.ico'>

        {{-- Leaflt Map CSS--}}
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>
        {{-- Leaflt Map JS--}}
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

        {{-- Swal fire --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <!--CSS/Stylesheets-->
        <link rel="stylesheet" href="/css/main.css">
        @yield('css')
            
    </head>
    <body>

        {{-- Navigation --}}
        <nav class="navbar navbar-custom navbar-expand-md justify-content-center px-3 py-2 sticky-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-bars"></span>
            </button>
            <a href="{{ route('home') }}" class="navbar-brand w-50"><img src="/images/logobrand.png" id="logo"></a>

            <div class="navbar-collapse collapse" >
                <ul class="navbar-nav w-50 mr-auto justify-content-end nav-justified">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                            Disasters 
                        </a>
                        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                            @foreach ($disaster_nav as $dn)
                                <a class="dropdown-item" href="{{ route('disaster-page' , [ $dn->disaster_type ]) }}">{{ $dn->disaster_type }}</a>
                            @endforeach
                        </div>                        
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                            Prepare 
                        </a>
                        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('build-a-kit') }}">Build A Kit</a>
                            <a class="dropdown-item" href="{{ route('plan-ahead') }}">Plan Ahead</a>
                            <a class="dropdown-item" href="{{ route('safety-skills') }}">Safety Skills</a>
                        </div>                        
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                            Resources 
                        </a>
                        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('evacuation-centers') }}">Evacuation Centers</a>
                            <a class="dropdown-item" href="{{ route('directory-list') }}">Directory</a>
                        </div>                        
                    </li>
                </ul>
                <a class="btn btn-blue-cust mx-2" href="{{ route('evacuation-map') }}">Know your nearest centers</a>
                <a class="btn btn-red-cust pulse mx-2" href="{{ route('donate') }}">DONATE</a>
            </div>
        
        </nav>

        {{-- Page Content --}}
        <div class="content">
            @yield('main-content')
        </div>

        <footer class="footer p-3">
            <div class="row">
                <div class="col text-center">
                    <img src="/images/logobrand.png" class="footer-logo mb-3">
                    <h6 class="copy">&copy; CodeJuan Team A - Codeniverse (2021)</h6>
                </div>
            </div>
        </footer>        

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        {{-- Sweet Alerts --}}
        <script>
            @if(Session::has('donation_success'))
                Swal.fire({
                imageUrl: '/images/thankyou.png',
                imageHeight: 200,
                html:
                    '<h4 style="color:#A72A2C">Thank you for Donating!</h4>' + 
                    '<p>You are the special type of person that changes lives, lifts people up, and makes the world a better place. Thank you for your donation and your association with our cause.</p>',
                confirmButtonText: 'Ok'
                })
            @endif
        </script>
    </body>
</html>