@extends('template.admin')

@section('admin-content')

<div class="row">
    <div class="col">
        <h2>ADD HOTLINE</h2>
    </div>
</div>
<hr>

<div class="row">
	<div class="col-lg-6">

        <Form method="POST" action="{{ route('directory.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="details">Add Image</label>
                <input type="file" class="form-control" name="image">
            </div>

            <div class="form-group">
                <label for="name">Institution/Establishment</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name of Institution/Establishment">
                <span style="color: #FC1838">{{$errors->first('name')}}</span>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Enter Full Address">
                <span style="color: #FC1838">{{$errors->first('address')}}</span>
            </div>

            <div class="row my-3">
                <div class="col">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="other">Other</option>
                        <option value="hospital">Hospital</option>
                        <option value="fire">Fire</option>
                        <option value="flood">Flood</option>
                        <option value="earthquake">Earthquake</option>
                        <option value="covid">Covid</option>
                        <option value="barangay">Barangay</option>
                    </select>
                    <span style="color: #FC1838">{{$errors->first('type')}}</span>

                </div>
                <div class="col">
                    <label for="contact">Contact No.</label>
                    <input type="text" class="form-control" name="contact" placeholder="Contact No.">
                    <span style="color: #FC1838">{{$errors->first('contact')}}</span>
    
                </div>
            </div>

            <div class="row my-3">
                <div class="col-lg-4">
                    <input type="submit" class="btn btn-dark form-control" onclick="this.disabled=true;this.value='Submitted, please wait...';this.form.submit();" />
                </div>
            </div>

        </Form>
	</div>
</div>


@endsection