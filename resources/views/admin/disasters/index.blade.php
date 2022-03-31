@extends('template.admin')

@section('admin-content')

<div class="row">
    <div class="col">
        <h2>DISASTERS</h2>
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
        <a href="{{ route('disasters.create') }}"><button class="btn btn-danger w-100"><i class="fas fa-plus-circle"></i> Add New Disaster</button></a>
    </div>
</div>
<br>

<div class="row">
	<div class="col-lg-6">

        <table class="table table-sm">
            <thead class="thead-cust-dark">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col" class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($disasters as $x)
                <tr class="border-bottom">
                    <td>{{ $x->disaster_type }}</td>
                    <td  class="text-right">
                        <div class="btn-group" role="group" aria-label="">
                            <a href="{{ route('disasters.edit' , [$x->id]) }}"><button type="button" class="btn btn-sm btn-secondary">Edit</button></a> &nbsp;
                        </div>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
	</div>
</div>
@endsection