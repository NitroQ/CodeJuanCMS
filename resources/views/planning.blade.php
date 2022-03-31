@extends('template.main')

@section('main-content')


<div class="hero-image-2" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('/images/Prepare_MakePlan.jpg')">
    <div class="hero-text">
      <h1 style="font-size: 70px;">Make a Plan</h1>
      <p>Create and Practice an Emergency Plan so your family will know what to do in a Crisis</p>
    </div>
</div>

<div class="py-5">
    <h1 class="subheadliner text-center">Planning in case of an emergency?<br>You can do it in just 5 easy steps!</h1>


    <div class="row justify-content-center mt-5 mb-3 px-5">
        <div class="col-lg-1">
            <h1 class="number">1</h1>
        </div>
        <div class="col-lg-7">
            <h2>Make a plan by asking the important questions.</h2>
            <ul>
                <li>How will I receive emergency alerts and warnings?</li>
                <li>What is my shelter plan?</li>
                <li>What is my evacuation route?</li>
                <li>What is my family/household communication plan?</li>
                <li>Do I need to update my emergency preparedness kit?</li>
                <li>Check with the Centers for Disease Control (CDC) and update my emergency plans due to Coronavirus.
                    <ul>    
                        <li>Get masks (for everyone over 2 years old), disinfectants, and check my sheltering plan.</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div class="row justify-content-center my-3 p-5" style="background-color: rgb(245, 245, 245)">
        <div class="col-lg-1">
            <h1 class="number">2</h1>
        </div>
        <div class="col-lg-7">
            <h2>Consider your family's specific needs.</h2>
            <ul>
                <li>Where you live and the specific needs of your family members are major factors to consider in your home emergency plan. Know what natural disasters could occur in your area and how best to prepare for emergencies like hurricanes, severe flooding, volcanoes or tornadoes.</li>
                <li>Different ages of members within your household</li>
                <li>Responsibilities for assisting others</li>
                <li>Locations frequented</li>
                <li>Dietary needs</li>
                <li>Medical needs including prescriptions and equipment</li>
                <li>Disabilities or access and functional needs including devices and equipment</li>
                <li>Languages spoken</li>
                <li>Cultural and religious considerations</li>
                <li>Pets or service animals</li>
                <li>Households with school-aged children</li>
            </ul>
        </div>
    </div>

    
    <div class="row justify-content-center my-3">
        <div class="col-lg-1">
            <h1 class="number">3</h1>
        </div>
        <div class="col-lg-7">
            <h2>Make a disaster supply kit.</h2>
            <p>Putting everything you need in one place for easy access.</p>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col-lg-1">
            <h1 class="number">4</h1>
        </div>
        <div class="col-lg-7">
            <h2>Fill Out a Family Emergency Plan</h2>
            <p>Download and fill out a family emergency plan or use it as a guide to create your own.</p>
            <ul class="familylink"><li><a href="https://www.ready.gov/sites/default/files/2021-02/family-emergency-communication-plan.pdf">Family Emergency Plan</a></li></ul>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-1">
            <h1 class="number">5</h1>
        </div>
        <div class="col-lg-7">
            <h2>Write it down and practice with your family.</h2>
            <p>Practice your plan at least twice a year.</p>
        </div>
    </div>

    <div class="row justify-content-center my-5" id="chcklist">
        <div class="col-lg-7">
        
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn " type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <h5><b>Preparedness Materials</b></h5>
                  </button>
                </h2>
              </div>

              <div id="collapseTwo" class="panel-collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <ul class="links">
                        <li><a href="https://www.ready.gov/sites/default/files/2021-02/family-emergency-communication-plan.pdf">Create a Family Emergency Communication Plan</a></li>
                        <li><a href="https://www.ready.gov/sites/default/files/2020-03/family-communication-plan_fillable-card.pdf">Family Communication Plan Fillable Card</a></li>
                        <li><a href="https://www.ready.gov/sites/default/files/2020-03/ready_know-your-alerts-and-warnings.pdf">Know Your Alerts and Warnings</a></li>
                    </ul>                
                </div>
              </div>
            </div>
          </div>    
        </div>
      </div>

</div>


@endsection