@extends('template.admin')

@section('admin-content')

<div class="row">
    <div class="col">
        <h2>EDIT EVACUATION CENTER</h2>
    </div>
</div>
<hr>

<div class="row">
	<div class="col">

        <Form method="POST" action="{{ route('centers.update' , [$center->id]) }}">
            <input type="hidden" name="_method" value="PUT">
			{{ csrf_field() }}

            <div class="form-group">
                <label for="name">Institution/Establishment</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name of Institution/Establishment" value="{{ $center->name }}">
                <span style="color: #FC1838">{{$errors->first('name')}}</span>
            </div>

            <div class="row my-3">
                <div class="col">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Enter Full Address" value="{{ $center->address }}">
                    <span style="color: #FC1838">{{$errors->first('address')}}</span>
    
                </div>
                <div class="col">
                    <label for="contact">Contact No.</label>
                    <input type="text" class="form-control" name="contact" placeholder="Contact No." value="{{ $center->contact }}">
                    <span style="color: #FC1838">{{$errors->first('contact')}}</span>
    
                </div>
            </div>

            <div class="row my-3">
                <div class="col">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control" name="latitude" value="{{ $center->latitude }}">
                    <span style="color: #FC1838">{{$errors->first('latitude')}}</span>
                </div>
                <div class="col">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control" name="longitude" value="{{ $center->longitude }}">
                    <span style="color: #FC1838">{{$errors->first('longitude')}}</span>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="description">Location Description</label>
                    <textarea name="description" rows="5" class="form-control">{{ $center->description }}</textarea>
                    <span style="color: #FC1838">{{$errors->first('description')}}</span>
                </div>
            </div>
            

            <div class="row my-3">
                <div class="col-lg-2">
                    <input type="submit" class="btn btn-dark form-control" onclick="this.disabled=true;this.value='Submitted, please wait...';this.form.submit();" />
                </div>
            </div>



        </Form>
	</div>
</div>


@endsection