@extends('template.main')

@section('main-content')


<div class="hero-image-2" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('/images/Prepare_BuildKit.jpg">
    <div class="hero-text">
      <h1 style="font-size: 70px;">Build a Kit</h1>
	  <p>Prepare necessary materials to be ready to reduce risks in the family</p>
    </div>
</div>

@foreach ($kits as $x)
	<div class="row justify-content-center">
		<div class="col-lg-6">
			<h2 class="basic text-center">{{ $x->name }}</h2>
			<ul class="basictext fa-ul">
				@foreach ($supplies->where('kit_id' , $x->id) as $s)
					<li><span class="fa-li"><i class="fas fa-check-circle"></i></span>{{ $s->supply_desc }}</li>
				@endforeach
			</ul>
		</div>
	</div>
@endforeach

<hr>

<h2 class="w-100 basic text-center">OTHER THINGS TO CONSIDER</h2>
<div class="row justify-content-center my-5">
	<div class="col-lg-3">
		<div class="card mb-4">
			<div class="card-body">
	        <h5 class="card-title">Kit Maintenance</h5>
            <ol class="card-text">
				<li>Store your kit in a cool, dry place that’s out of direct sunlight.</li>
				<li>Keep your emergency kit supplies in durable, easy-to-carry containers.</li>
				<li>Do a six-month check.</li>
				<li>Do a more thorough yearly check.</li>
				<li>Take care of your kit and update as needed.</li>
			</ol>
	        </div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="card mb-4">
			<div class="card-body">
	        <h5 class="card-title">Storing Your Kit</h5>
	            <ul class="card-text">
		    		<li><b>At Home:</b> Make sure they are located and accessible by storing them somewhere along your exit path.</li>
		    		<li><b>At Work:</b> Keep your supplies in a small box or fanny pack.</li>
		    		<li><b>In Your Car:</b> In case you are stranded, consider storing at least a three-day worth of supply.</li>
		    	</ul>
	        </div>
		</div>
	</div>
</div>
</div>

@endsection