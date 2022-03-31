@extends('template.admin')

@section('admin-content')

<div class="row">
    <div class="col">
        <h2>EMERGENCY KITS</h2>
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
        <button class="btn btn-danger w-100" data-toggle="modal" data-target="#createKit"><i class="fas fa-plus-circle"></i> Add New Kit</button>
    </div>
</div>
<br>

<div class="row">
	<div class="col-lg-12">

        <table class="table table-sm">
            <thead class="thead-cust-dark">
                <tr>
                    <th scope="col">Name/Type of Kit</th>
                    <th scope="col">Supplies</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kits as $k)
                <tr class="border-bottom">
                    <td>{{ $k->name }}</td>
                    <td>{{ $supplies->where('kit_id' , $k->id)->count() }} supplie(s)</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">
                            <a href="{{ route('supplies-create' , [$k->id]) }}"><button type="button" class="btn btn-sm btn-primary">Add Kit Supplies</button></a>&nbsp;
                            <a href="{{ route('kit-delete' , [$k->id]) }}"><button type="button" class="btn btn-sm btn-danger">Remove</button></a>&nbsp;
                        </div>
                    </td>
                </tr>
                    
                @endforeach


            </tbody>
        </table>
	</div>
</div>

{{-- Modal for Creating --}}
<div id="createKit" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Create An Emergency Kit</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
            <div class="modal-body">
                <Form method="POST" action="{{ route('kit.store') }}">
                    {{ csrf_field() }}
        
                    <div class="form-group">
                        <label for="title">Name of the Kit</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Kit Name">
                        <span style="color: #FC1838">{{$errors->first('name')}}</span>
                    </div>
        
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