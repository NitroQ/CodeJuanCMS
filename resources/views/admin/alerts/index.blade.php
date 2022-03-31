@extends('template.admin')

@section('admin-content')

<div class="row">
    <div class="col">
        <h2>ANNOUNCEMENTS/ALERTS</h2>
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
        <a href="{{ route('alerts.create') }}"><button class="btn btn-danger w-100"><i class="fas fa-plus-circle"></i> Create An Alert!</button></a>
    </div>
</div>
<br>

<div class="row">
	<div class="col-lg-12">

        <table class="table table-sm">
            <thead class="thead-cust-dark">
                <tr>
                    <th></th>
                    <th scope="col">Title</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alerts as $x)
                <tr class="border-bottom">
                    <td><img src="/uploads/alerts/{{ $x->image or 'placeholder.png' }}" width="30px" height="30px" style="object-fit: cover"></td>
                    <td>{{ $x->title }}</td>
                    <td>{{ $x->tag }}</td>
                    <td>{{ $x->created_at->format('F j, Y') }} {{ $x->created_at->format('g:i A') }}</td>
                    <td>
                        @if ($x->active == 1)
                            <a href="{{ route('alert-inactive' , [ $x->id ]) }}"><button type="button" class="btn btn-sm btn-primary">Set Inactive</button></a>&nbsp;
                        @else
                            <a href="{{ route('alert-active' , [ $x->id ]) }}"><button type="button" class="btn btn-sm btn-outline-primary">Set Active</button></a>&nbsp;
                         @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">
                            <a href="{{ route('alerts.edit' , [ $x->id ]) }}"><button type="button" class="btn btn-sm btn-secondary">Edit</button></a>&nbsp;
                            <a href="{{ route('alert-delete' , [ $x->id ]) }}"><button type="button" class="btn btn-sm btn-danger">Remove</button></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
	</div>
</div>
@endsection