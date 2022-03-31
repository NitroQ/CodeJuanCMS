@extends('template.admin')

@section('admin-content')

<div class="row">
    <div class="col">
        <h2>EDIT {{ $disaster->disaster_type }}</h2>
    </div>
</div>
<hr>

<div class="row">
	<div class="col">

        <Form method="POST" enctype="multipart/form-data" action="{{ route('disasters.update' , [$disaster->id]) }}">
            <input type="hidden" name="_method" value="PUT">
			{{ csrf_field() }}

            <div class="form-group">
                <label for="details">Change Hero Image</label>
                <input type="file" class="form-control" name="hero_image">
                <span style="color: #FC1838">{{$errors->first('hero_image')}}</span>

            </div>

            <div class="form-group">
                <label for="disaster_type">Disaster Type</label>
                <input type="text" class="form-control" name="disaster_type" placeholder="Type of Disaster" value="{{ $disaster->disaster_type }}">
                <span style="color: #FC1838">{{$errors->first('disaster_type')}}</span>
            </div>

			<div class="form-group">
				<label for="description">Content</label>
				<textarea name="content" class="form-control" id="description">{!! $disaster->content !!}</textarea>
                <span style="color: #FC1838">{{$errors->first('content')}}</span>
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