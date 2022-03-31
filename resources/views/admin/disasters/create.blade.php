@extends('template.admin')

@section('admin-content')

<div class="row">
    <div class="col">
        <h2>ADD DISASTER</h2>
    </div>
</div>
<hr>

<div class="row">
	<div class="col">

        <Form method="POST" action="{{ route('disasters.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="details">Hero Image</label>
                <input type="file" class="form-control" name="hero_image">
            </div>

            <div class="form-group">
                <label for="disaster_type">Disaster Type</label>
                <input type="text" class="form-control" name="disaster_type" placeholder="Type of Disaster">
            </div>

			<div class="form-group">
				<label for="description">Content</label>
				<textarea name="content" class="form-control" id="description"></textarea>
			</div>

            <div class="row">
                <div class="col-lg-2">
                    <input type="submit" class="btn btn-dark form-control" onclick="this.disabled=true;this.value='Submitted, please wait...';this.form.submit();" />
                </div>
            </div>

        </Form>
	</div>
</div>


@endsection