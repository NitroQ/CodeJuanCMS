@extends('template.admin')

@section('admin-content')

<div class="row">
    <div class="col">
        <h2>EDIT ALERT</h2>
    </div>
</div>
<hr>

<div class="row">
	<div class="col-lg-6">

        <Form method="POST" action="{{ route('alerts.update' , [$alert->id]) }}">
            <input type="hidden" name="_method" value="PUT">
			{{ csrf_field() }}

            <div class="form-group">
                <label for="details">Add Image</label>
                <input type="file" class="form-control" name="image">
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{ $alert->title }}">
                <span style="color: #FC1838">{{$errors->first('title')}}</span>
            </div>

            <div class="form-group">
                <label for="tag">Alert Tag</label>
                <input type="text" class="form-control" name="tag" placeholder="Enter Custom Tag" value="{{ $alert->tag }}">
                <span style="color: #FC1838">{{$errors->first('tag')}}</span>
            </div>

			<div class="form-group">
				<label for="description">Content</label>
				<textarea name="description" class="form-control" id="description">{!! $alert->description !!}</textarea>
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