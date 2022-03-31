@extends('template.main')

@section('main-content')
<link rel="stylesheet" href="/css/donate.css">

<div class="hero-image-2" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('/images/donate.jpg')">
    <div class="hero-text">
      <h1 style="font-size: 70px;">Donate for a Cause</h1>
    </div>
</div>


<div class="row justify-content-center donate-categ py-5">
    <button class="btn donate-link mx-3" id="relief_don" data-toggle="modal" data-target="#makeDonation" data-donCateg="relief">
        <div class="card donate-card">
            <div class="card-body">
                <h3>Disaster Relief</h3>
                <p>Help people affected by disasters, big and small</p>
            </div>
        </div>
    </button>
    <button class="btn donate-link mx-3" id="needed_don" data-toggle="modal" data-target="#causeDonation" data-donCateg="needed">
        <div class="card donate-card ">
            <div class="card-body">
                <h3>Needed Most</h3>
                <p>Support urgent needs and concerns of the community</p>
            </div>
        </div>
    </button>
    <button class="btn donate-link mx-3" id="recovery_don" data-toggle="modal" data-target="#makeDonation" data-donCateg="recovery">
        <div class="card donate-card">
            <div class="card-body">
                <h3>Disaster Recovery</h3>
                <p>Aid in infrastrcuture rehabilitation affected by disasters</p>
            </div>
        </div>
    </button>
    <div class="card muted-card mx-3">
        <div class="card-body">
            <h3 class="muted-ct">Your support makes a difference</h3>
        </div>
    </div>

</div>

@if ($don)
<div class="row justify-content-center py-5" id="top_cause">
    <div class="col-3">
        <img src="/uploads/drives/{{ $don->image or "placeholder.jpeg"}}" class="donate-img">
    </div>
    <div class="col-lg-6">
        <h1 class="scpBold">{{ $don->title }}</h1>
        <p>{!! strip_tags($don->description) !!}</p>
        <br>
        <div class="row align-items-center">
            <div class="col">
                <button class="btn btn-donate scpBold" data-toggle="modal" id="cause_don" data-target="#causeDonation" data-donCateg="cause">DONATE NOW</button>
            </div>
            <div class="text-right">
                <a href="{{ route('donate-view' , [$don->id]) }}" class="link-view">VIEW DETAILS</a>
            </div>
        </div>
    </div>
</div>      
@endif







<h2 class="w-100 basic text-center">How to donate</h2>
<div class="row justify-content-center py-5" id="how_row">
    <div class="card method-card mx-3">
        <div class="card-header py-3"><img src="/images/gcash.png" width="50px" height="auto"> Donate through GCash</div>
        <div class="card-body">
            <p>You can send your donation through GCAsh</p>
            Details: 
            <br>
            <ul>
                <li>Account Name: Chloe Sophia D. Bonifacio</li>
                <li>Number: 09667011409</li>
            </ul>
        </div>
    </div>
    <div class="card method-card mx-3">
        <div class="card-header py-3"><img src="/images/bdo.png" width="50px" height="auto"> Donate through BDO</div>
        <div class="card-body">
            <p>You can deposit your donation through BDO</p>
            Details: 
            <br>
            <ul>
                <li>Account Name: Chloe Sophia D. Bonifacio</li>
                <li>Account Number: 123456789015</li>
            </ul>
        </div>
    </div>
    <div class="card method-card mx-3">
        <div class="card-header py-3"><img src="/images/paypal.png" width="50px" height="auto"> Donate through Paypal</div>
        <div class="card-body">
            <p>You can deposit your donation through PayPal</p>
            Details: 
            <br>
            <ul>
                <li>E-mail Address: bonifacio@paypal.com</li>
                <li>Account Number: 09667011409</li>
            </ul>
        </div>
    </div>
</div>



{{-- Modal for Donation --}}
<div id="makeDonation" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-body p-4">
                <div class="row mb-4">
                    <div class="col">
                        <img src="/images/donate.jpg" width="100%" height="150px" style="object-fit: cover">
                    </div>
                </div>
                <h4 class="text-center"><b>Thank you for Choosing to Donate!</b></h4>
                <p>Enter your information below so we can track your donation and send you updates on your kind donation. We ensure that your donation will be used for its intended cause.</p>
                <hr>
                <div class="row">
                    <div class="col">
                        <Form method="POST" action="{{ route('donations-store') }}">
                            {{ csrf_field() }}
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="title">Enter the amount you are donating:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1">Php</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Enter Amount" name="amount">
                                    </div>                              
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="title">Choose method of donation:</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="method" id="method1" value="GCash">
                                        <label class="form-check-label" for="method1">GCash</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="method" id="method2" value="BDO">
                                        <label class="form-check-label" for="method2">BDO</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="method" id="method3" value="BPI">
                                        <label class="form-check-label" for="method3">BPI</label>
                                      </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <label for="title">First Name</label>
                                    <input type="text" class="form-control" name="fname" placeholder="Enter Name">    
                                </div>
                                <div class="col">
                                    <label for="title">Last Name</label>
                                    <input type="text" class="form-control" name="lname" placeholder="Enter Name">   
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="title">Email Address</label>
                                    <input type="text" class="form-control" name="email" placeholder="Enter Name">    
                                </div>
                            </div>
                            <input type="hidden" id="donation_categ" name="categ">
                
                            <div class="row my-3 justify-conten-center">
                                <div class="col">
                                    <input type="submit" class="btn btn-donate-now w-100" onclick="this.disabled=true;this.value='Submitted, please wait...';this.form.submit();" />
                                </div>
                            </div>
                
                        </Form>
                    </div>
                </div>

            </div>
		</div>
	</div>
</div>

<div id="causeDonation" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-body p-4">
                <div class="row mb-4">
                    <div class="col">
                        <img src="/images/give.jpeg" width="100%" height="150px" style="object-fit: cover">
                    </div>
                </div>
                <h4 class="text-center"><b>Donating For a Cause!</b></h4>
                <p>Thank you for choosing to donate to our cause. People like you are an inspiration to all. Thank you for this generous act of giving. Today, your donation is a gift that could not be appreciated more. </p>
                <small>Enter your information below so we can track your donation and send you updates on your kind donation. We ensure that your donation will be used for its intended cause.</small>
                <hr>
                <div class="row">
                    <div class="col">
                        <Form method="POST" action="{{ route('donations-store') }}">
                            {{ csrf_field() }}
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="title">Enter the amount you are donating:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1">Php</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Enter Amount" name="amount">
                                    </div>                              
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="title">Choose method of donation:</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="method" id="method1" value="GCash">
                                        <label class="form-check-label" for="method1">GCash</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="method" id="method2" value="BDO">
                                        <label class="form-check-label" for="method2">BDO</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="method" id="method3" value="BPI">
                                        <label class="form-check-label" for="method3">BPI</label>
                                      </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <label for="title">First Name</label>
                                    <input type="text" class="form-control" name="fname" placeholder="Enter Name">    
                                </div>
                                <div class="col">
                                    <label for="title">Last Name</label>
                                    <input type="text" class="form-control" name="lname" placeholder="Enter Name">   
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="title">Email Address</label>
                                    <input type="text" class="form-control" name="email" placeholder="Enter Name">    
                                </div>
                            </div>
                            <input type="hidden" id="cause_donation_categ" name="categ">
                
                            <div class="row my-3 justify-conten-center">
                                <div class="col">
                                    <input type="submit" class="btn btn-donate-now w-100" onclick="this.disabled=true;this.value='Submitted, please wait...';this.form.submit();" />
                                </div>
                            </div>
                
                        </Form>
                    </div>
                </div>

            </div>
		</div>
	</div>
</div>

<script>
	$(document).on('click','#relief_don',function(){
    	var donationCategory =$(this).attr('data-donCateg');
		$('#donation_categ').val(donationCategory); 
	});
    $(document).on('click','#needed_don',function(){
    	var donationCategory =$(this).attr('data-donCateg');
		$('#donation_categ').val(donationCategory); 
	});
    $(document).on('click','#recovery_don',function(){
    	var donationCategory =$(this).attr('data-donCateg');
		$('#donation_categ').val(donationCategory); 
	});
    $(document).on('click','#cause_don',function(){
    	var donationCategory =$(this).attr('data-donCateg');
		$('#cause_donation_categ').val(donationCategory); 
	});
</script>
@endsection