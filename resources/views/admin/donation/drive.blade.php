@extends('template.admin')

@section('admin-content')

<div class="row">
    <div class="col">
        <h2>DONATION DRIVES LIST</h2>
    </div>
</div>
<hr>
@if(Session::has('flash_message'))
<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
{{Session::get('flash_message')}}
</div>
@endif

<div class="row">
    <div class="col col-lg-3">
        <a href="{{ route('donations-create') }}"><button class="btn btn-danger w-100"><i class="fas fa-plus-circle"></i> Start a Donation Drive</button></a>
    </div>
</div>
<br>
<div class="row">
    <div class="col">
        <table class="table table-sm">
            <thead class="thead-cust-dark">
                <tr>
                    <th scope="col">Donation Drive</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($drive as $x)
                    <tr>
                        <td>{{ $x->title }}</td>
                        <td>{{ $x->start_date }}</td>
                        <td>{{ $x->end_date }}</td>
                        <td>
                            @if ($x->status == 0)
                                Inactive
                            @else
                                Active
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="">
                                @if ($x->status == 0)
                                    <a href="{{ route('start-donation' , [$x->id]) }}"><button type="button" class="btn btn-sm btn-primary">Start Donation Drive</button></a> &nbsp;
                                @else
                                    <a href="{{ route('end-donation' , [$x->id]) }}"><button type="button" class="btn btn-sm btn-danger">End Donation Drive</button></a> &nbsp;
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection