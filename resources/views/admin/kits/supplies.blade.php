@extends('template.admin')

@section('admin-content')

<div class="row">
    <div class="col">
        <h2>{{ $kit->name }}</h2>
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
        <button class="btn btn-danger w-100" data-toggle="modal" data-target="#addSupply"><i class="fas fa-plus-circle"></i> Add New Supply</button>
    </div>
</div>
<br>

<div class="row">
	<div class="col-lg-12">

        <table class="table table-sm">
            <thead class="thead-cust-dark">
                <tr>
                    <th scope="col">Supplies</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($supplies as $s)
                <tr class="border-bottom">
                    <td>{{ $s->supply_desc }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">
                            <a href="{{ route('supplies-delete' , [$s->id]) }}"><button type="button" class="btn btn-sm btn-danger">Remove</button></a>&nbsp;
                        </div>
                    </td>
                </tr>
                    
                @endforeach


            </tbody>
        </table>
	</div>
</div>

{{-- Modal for Creating --}}
<div id="addSupply" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Supply</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
            <div class="modal-body">
                <Form method="POST" action="{{ route('supplies.store') }}">
                    {{ csrf_field() }}
        
                    <div class="form-group">
                        <label for="title">Name/Description of the Item</label>
                        <input type="text" class="form-control" name="supply_desc" placeholder="Enter Name/Description">
                        <span style="color: #FC1838">{{$errors->first('supply_desc')}}</span>
                    </div>
                    <input type="hidden" name="kit_id" value="{{ $kit->id }}">
        
                    <div class="row my-3">
                        <div class="col-lg-4">
                            <input type="submit" class="btn btn-dark form-control" onclick="this.disabled=true;this.value='Submitted, please wait...';this.form.submit();" />
                        </div>
                    </div>
        
                </Form>
            </div>
		</div>
	</div>
</div>

@endsection