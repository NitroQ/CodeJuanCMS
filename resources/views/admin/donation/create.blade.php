@extends('template.admin')

@section('admin-content')

<div class="row">
    <div class="col">
        <h2>START DONATION DRIVE</h2>
    </div>
</div>
<hr>

<div class="row">
	<div class="col-lg-6">

        <Form method="POST" action="{{ route('donation-drives-store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="details">Add Image</label>
                <input type="file" class="form-control" name="image">
            </div>

            <div class="form-group">
                <label for="name">Title of Donation Drive</label>
                <input type="text" class="form-control" name="title" placeholder="Enter Title">
                <span style="color: #FC1838">{{$errors->first('title')}}</span>
            </div>

            <div class="row my-3">
                <div class="col">
                    <label for="name">Start Date</label>
                    <input type="date" class="form-control" name="start_date" placeholder="Enter Date">
                    <span style="color: #FC1838">{{$errors->first('start_date')}}</span>
                </div>
                <div class="col">
                    <label for="name">End Date</label>
                    <input type="date" class="form-control" name="end_date" placeholder="Enter Date">
                    <span style="color: #FC1838">{{$errors->first('end_date')}}</span>
                </div>
            </div>

			<div class="form-group">
				<label for="description">Details about the donation drive</label>
				<textarea name="description" class="form-control" id="description"></textarea>
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