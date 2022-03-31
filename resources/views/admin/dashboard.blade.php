@extends('template.admin')

@section('admin-content')
<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

<div class="row">
    <div class="col">
        <h2>DASHBOARD</h2>
    </div>
</div>
<hr>
@if(Session::has('flash_message'))
<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
{{Session::get('flash_message')}}
</div>
@endif

{{-- Donation Amount --}}
<h6 class="text-muted h-styled">At A Glance</h6>
<div class="row mb-2 px-2">
    <div class="col-lg-3 px-1">
        <div class="card card-stat">
            <div class="card-body">
                <span data-feather="package" class="card-icn"></span>
                <div class="card-title">Disaster Relief</div><br>
                <p class="card-text">₱ {{ $reliefSum or 0 }}</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 px-1">
        <div class="card card-stat">
            <div class="card-body">
                <span data-feather="alert-circle" class="card-icn"></span>
                <div class="card-title">Needed Most</div><br>
                <p class="card-text">₱ {{ $needSum or 0 }}</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 px-1">
        <div class="card card-stat">
            <div class="card-body">
                <span data-feather="home" class="card-icn"></span>
                <div class="card-title">Disaster Recovery</div><br>
                <p class="card-text">₱ {{ $recoverySum or 0}}</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 px-1">
        <div class="card card-stat">
            <div class="card-body">
                <span data-feather="smile" class="card-icn"></span>
                <div class="card-title">For a Cause</div><br>
                <p class="card-text">₱ {{ $causeSum or 0}}</p>
            </div>
        </div>
    </div>
</div>

<div class="row my-4">
    
    <div class="col-lg-9">
        <h6 class="text-muted h-styled">List of Donations</h6>
        <table class="table table-sm">
            <thead class="thead-cust-dark">
                <tr>
                    <th scope="col">Name of Person</th>
                    <th scope="col">E-Mail Address</th>
                    <th scope="col">Date Donated</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donations as $x)
                <tr class="border-bottom">
                    <td>{{ $x->fname }} {{ $x->lname }}</td>
                    <td>{{ $x->email }}</td>
                    <td>{{ $x->created_at->format('F j, Y') }}</td>
                    <td>₱ {{ $x->amount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-lg-3">
        <h6 class="text-muted h-styled">Quick Summary</h6>
        <div class="card people-card">
            <div class="card-body text-center">
                <div class="d-flex" style="display: inline-block">
                    <img src="/images/social-care.png" class="m-auto"">
                </div>
                <h1 class="pct my-0">{{ $donations->count() }}</h1>
                <p class="my-0"><i>No. of People Donated</i></p>
                <hr>
                <p class="my-0">Total Amount of Donation</p>
                <h5>₱ {{ $total }}</h5>
            </div>
        </div>
    </div>
</div>

<script>
    feather.replace()
</script>

@endsection