@extends('template.main')

@section('main-content')
<style>
    #information li{
        margin-left: 0;
        padding: 0 0 0 40px!important;
        list-style: none;
        background-image: url("/images/CheckSign.svg");
        background-repeat: no-repeat;
        background-position: left center;
        background-size: 20px;
    }

    #information h2,
    #information h3,
    #information h4,
    #information h5,
    #information h6{
        color: #A72A2C!important;
        font-weight: bold;
    }

    #information a{
        color: #A72A2C!important;
    }

    h1{
        color: #A72A2C;
        font-weight: bold;
    }
    #eq{
      margin-top: 50px;
    }
   #end{
     margin-bottom: 20px;
   }
   #list{
      margin: 10px;
   }
</style>


  <div class="row">
      <div class="col">
          <img src="/uploads/hero/{{ $disaster_content->hero_image }}" class="hero-image">
      </div>
  </div>

  <div class="my-5">
    <div class="row justify-content-center my-4">
        <div class="col-lg-10 text-center"id ="eq">
            <h1>{{ $disaster_content->disaster_type }}</h1>
        </div>
    </div>

    <div class="row justify-content-center" id="information">
        <div class="col-lg-6">
            <p>{!! $disaster_content->content !!}</p>
        </div>
    </div>
  </div>


@if ($disaster_content->disaster_type == "Earthquake")
      
  <div class = "row justify-content-center" id= "list">
    <div class = "col-lg-4-content-center">
      <h2>Things to Do:</h2>
    </div>
  </div>
  <div class ="row justify-content-center my-3">
    <div class ="col-lg-5-content-center">
      <img src = "\images\DuckCoverHold.png" width = "590" height ="195">
    </div>
  </div>


  <div class="row justify-content-center my-5" id="chcklist">
    <div class="col-lg-5">

      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <img src= "\images\Checksign.svg" width = "20" height = "20"> Drop
              </button>
            </h2>
          </div>

          <div id="collapseOne" class="panel-collapse collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              Go down, on your knees. This prevents  you from injuring yourself from other falling and moving objects, you can also hold onto foundation columns and go far away from falling objects.
            </div>
          </div>
        </div>
      </div>

      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <img src= "\images\Checksign.svg" width = "20" height = "20">  Cover
              </button>
            </h2>
          </div>

          <div id="collapseTwo" class="panel-collapse collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
              Cover your head with anything, such as a book or anything you have on hand. Find something to go under like a bed, table or chair. Your head is precious; keep it away from falling objects. 
            </div>
          </div>
        </div>
      </div>

      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
              <img src= "\images\Checksign.svg" width = "20" height = "20">  Hold
              </button>
            </h2>
            
          </div>
              
          <div id="collapseThree" class="panel-collapse collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
            Hold your position until the earthquake stops. Stay still, do not leave your position. Don't urge yourself to reach things outside your cover. Be vigilant for any aftershocks. 
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endif

  

@endsection