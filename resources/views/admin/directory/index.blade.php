@extends('template.admin')

@section('admin-content')

<div class="row">
    <div class="col">
        <h2>HOTLINE DIRECTORY</h2>
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
        <a href="{{ route('directory.create') }}"><button class="btn btn-danger w-100"><i class="fas fa-plus-circle"></i> Add New Hotline</button></a>
    </div>
</div>
<br>

<div class="row">
	<div class="col-lg-12">

        <table class="table table-sm">
            <thead class="thead-cust-dark">
                <tr>
                    <th></th>
                    <th scope="col">Establishment</th>
                    <th scope="col">Type</th>
                    <th scope="col">Hotline(s)</th>
                    <th scope="col">Address</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hotline as $x)
                <tr class="border-bottom">
                    <td><img src="/uploads/directory/{{ $x->image or 'placeholder.png' }}" width="30px" height="30px" style="object-fit: cover"></td>
                    <td>{{ $x->name }}</td>
                    <td>{{ ucfirst($x->type) }}</td>
                    <td>{{ $x->contact }}</td>
                    <td>{{ $x->address }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">
                            <a href="{{ route('directory.edit' , [$x->id]) }}"><button type="button" class="btn btn-sm btn-secondary">Edit</button></a>&nbsp;
                            <a href="{{ route('directory-delete' , [ $x->id ]) }}"><button type="button" class="btn btn-sm btn-danger">Remove</button></a>
                        </div>
                    </td>
                </tr>
                    
                @endforeach

            </tbody>
        </table>
	</div>
</div>
@endsection