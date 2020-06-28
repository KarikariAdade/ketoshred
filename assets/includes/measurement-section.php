<div class="multisteps-form__panel shadow p-4 rounded row" id="veggies-section" data-animation="slideHorz">
 <div class="col-md-3">
  <h2 id="measurement-h2">Measurement</h2>
  <h5>Pick an option which perfectly fits your daily physical activities</h5>
  <p>
   <img src="assets/img/e7.png" class="img-fluid">
 </p>
</div>
<div class="col-md-7 checkbox-row text-center" style="margin: 0; padding: 0;width:100%;">
  <input type="hidden" name="physical_activity" id="physical_activity">
  <div class="measurement-section">
    <ul class="nav nav-pills" role="tablist">
    <li class="nav-item">
      <a class="nav-link nav-link-1 active" id="home-tab" data-toggle="tab" href="#imperial" role="tab">
        <span class="nav-link-icon">Imperial</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link nav-link-2" data-toggle="tab" href="#metric" role="tab">
        <span class="nav-link-icon">Metric</span>
      </a>
    </li>
  </ul>
  <div class="measurement-form">
    <div class="">
      <p id="form-error-section"><span class="fa fa-info-circle"></span><span id="form-error"></span></p>
      <div class="tab-content" id="myTabContent2">
        <div class="tab-pane fade show active" id="imperial" role="tabpanel" aria-labelledby="home-tab">
          <div class="form-group">
            <input type="text" id="age_imperial" class="form-control" placeholder="Age">
            <p align="right"><small>Years</small></p>
          </div>
          <div class="form-group height">
            <input type="text" id="height_feet" class="form-control" placeholder="Feet (Ft)">
             <!-- <p align="right"><small>Years</small></p> -->
            <input type="text" id="height_inches" class="form-control" placeholder="Inches (In)">
             <!-- <p align="right"><small>Years</small></p> -->
          </div>
          <div class="form-group">
            <input type="text" id="weight_lbs" class="form-control" placeholder="Weight (Lbs)">
             <p align="right"><small>lbs</small></p>
          </div>
          <div class="form-group">
            <input type="text" id="lose_lb" class="form-control" placeholder="Target Weight (Lbs)"> <p align="right"><small>lbs</small></p>
          </div>
          <div class="form-group">
            <input type="email" id="email_imperial" class="form-control" placeholder="Email Address">
          </div>
        </div>
        <div class="tab-pane fade" id="metric" role="tabpanel" aria-labelledby="home-tab">
          <div class="form-group">
            <input type="text" id="age_metric" class="form-control" placeholder="Age">
             <p align="right"><small>Years</small></p>
          </div>
          <div class="form-group">
           <input type="text" id="height_cm" class="form-control" placeholder="Height (cm)">
            <p align="right"><small>cm</small></p>
          </div>
          <div class="form-group">
            <input type="text" id="weight_kgs" class="form-control" placeholder="Weight (Kgs)">
             <p align="right"><small>kgs</small></p>
          </div>
          <div class="form-group">
            <input type="text" id="lose_kg" id="" class="form-control" placeholder="Target Weight (Kgs)">
             <p align="right"><small>kgs</small></p>
          </div>
           <div class="form-group">
            <input type="email" id="email_metric" class="form-control" placeholder="Email Address">
          </div>
        </div>
      </div>
    </div>
  </div>
  <p class="continue-btn submit_button"><button type="submit" class="btn submit_btn">Submit <span class="fa fa-arrow-circle-right"></span></button></p>
</div>
</div>
<div class="col-md-2 back-btn-section">
  <button class="btn btn-back js-btn-prev" type="button" ><span class="fa fa-sm fa-arrow-circle-left back-icon"></span>Back</button>
</div>
</div>