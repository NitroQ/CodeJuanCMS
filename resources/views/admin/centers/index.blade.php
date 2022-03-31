@extends('template.admin')

@section('admin-content')

<div class="row">
    <div class="col">
        <h2>EVACUATION CENTERS</h2>
    </div>
    <div class="col text-right">
        <a href="evacuation-centers" target="_blank"><button class="btn btn-dark">VIEW MAPS</button></a>
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
        <a href="{{ route('centers.create') }}"><button class="btn btn-danger w-100"><i class="fas fa-plus-circle"></i> Add New Evacuation Center</button></a>
    </div>
</div>
<br>

<div class="row">
	<div class="col-lg-12">

        <table class="table table-sm">
            <thead class="thead-cust-dark">
                <tr>
                    <th scope="col">Evacuation Center</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($centers as $x)
                <tr class="border-bottom">
                    <td>{{ $x->name }}</td>
                    <td>{{ $x->contact }}</td>
                    <td>{{ $x->address }}</td>
                    <td>
                        @if ($x->active == 1)
                            <a href="{{ route('set-inactive' , [ $x->id ]) }}"><button type="button" class="btn btn-sm btn-primary">Set Inactive</button></a>&nbsp;
                        @else
                            <a href="{{ route('set-active' , [ $x->id ]) }}"><button type="button" class="btn btn-sm btn-outline-primary">Set Active</button></a>&nbsp;
                        @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">

                            <a href="{{ route('centers.edit' , [ $x->id ]) }}"><button type="button" class="btn btn-sm btn-secondary">Edit</button></a>&nbsp;
                            <a href="{{ route('centers-delete' , [ $x->id ]) }}"><button type="button" class="btn btn-sm btn-danger">Remove</button></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $centers->links() }}
	</div>
</div>
@endsection