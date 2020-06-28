<div class="multisteps-form__panel shadow p-4 rounded row" id="veggies-section" data-animation="slideHorz">
 <div class="col-md-3">
  <h2>Physical Activity</h2>
  <h5>Pick an option which perfectly fits your daily physical activities</h5>
  <p>
   <img src="assets/img/e7.png" class="img-fluid">
 </p>
</div>
<div class="col-md-7 checkbox-row">
  <input type="hidden" name="physical_activity" id="physical_activity">
  <div class="physicals-section">
    <p class="js-btn-next" onclick="return physicals(0.05)">Almost no physical activity</p>
    <p class="js-btn-next" onclick="return physicals(0.2)">I often go for a walk</p>
    <p class="js-btn-next" onclick="return physicals(0.375)">I exercise 1 - 3 times a week</p>
    <p class="js-btn-next" onclick="return physicals(0.55)">I exercise 3 - 5 times a week</p>
    <p class="js-btn-next" onclick="return physicals(0.725)">I exercise almost everyday</p>
    <p class="js-btn-next" onclick="return physicals(0.9)">I'm a professional athlete</p>
  </div>
</div>
<div class="col-md-2 back-btn-section" style="padding-top: 5% !important;">
 <button class="btn btn-back js-btn-prev" type="button"><span class="fa fa-sm fa-arrow-circle-left back-icon"></span>Back</button>
</div>
</div>