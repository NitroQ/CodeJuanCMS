@extends('template.admin')

@section('admin-content')

<div class="row">
    <div class="col">
        <h2>EDIT HOTLINE</h2>
    </div>
</div>
<hr>

<div class="row">
	<div class="col-lg-6">

        <Form method="POST" action="{{ route('directory.update' , [$hotline->id]) }}">
            <input type="hidden" name="_method" value="PUT">
			{{ csrf_field() }}

            <div class="form-group">
                <label for="name">Institution/Establishment</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name of Institution/Establishment" value="{{ $hotline->name }}">
                <span style="color: #FC1838">{{$errors->first('name')}}</span>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Enter Full Address" value="{{ $hotline->address }}">
                <span style="color: #FC1838">{{$errors->first('address')}}</span>
            </div>

            <div class="row my-3">
                <div class="col">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="other" {{$hotline->type == 'other'	? 'selected' : ''}}>Other</option>
                        <option value="hospital" {{$hotline->type == 'hospital'	? 'selected' : ''}}>Hospital</option>
                        <option value="fire" {{$hotline->type == 'fire'	? 'selected' : ''}}>Fire</option>
                        <option value="flood" {{$hotline->type == 'flood'	? 'selected' : ''}}>Flood</option>
                        <option value="earthquake" {{$hotline->type == 'earthquake'	? 'selected' : ''}}>Earthquake</option>
                        <option value="covid" {{$hotline->type == 'covid'	? 'selected' : ''}}>Covid</option>
                        <option value="barangay" {{$hotline->type == 'barangay'	? 'selected' : ''}}>Barangay</option>
                    </select>
                    <span style="color: #FC1838">{{$errors->first('type')}}</span>

                </div>
                <div class="col">
                    <label for="contact">Contact No.</label>
                    <input type="text" class="form-control" name="contact" placeholder="Contact No." value="{{ $hotline->contact }}">
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