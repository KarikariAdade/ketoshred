$(".image-checkbox").each(function () {
  if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
    $(this).addClass('image-checkbox-checked');
  }
  else {
    $(this).removeClass('image-checkbox-checked');
  }
});
// sync the state to the input
$(".image-checkbox").on("click", function (e) {
  $(this).toggleClass('image-checkbox-checked');
  var $checkbox = $(this).find('input[type="checkbox"]');
  $checkbox.prop("checked",!$checkbox.prop("checked"))
  e.preventDefault();
});

$('.multisteps-form__progress-btn').click(function (e){
  e.stopPropagation();
})

$('.no-meat').click(function(){
  if ($('.no-meat').hasClass('image-checkbox-checked')) {
    $('.protein').each(function(){
     $(this).removeClass('image-checkbox-checked');
     $('input[name=proteins]').prop('checked',false);
   });
  }
})

$('#veggies-continue-btn').click(function (e){
  if ($('.veggie').hasClass('image-checkbox-checked')) {
    return true;
  }else{
    alert('select at least a field');
    e.stopPropagation();
  }
})

$('#protein-continue-btn').click(function (e){
  if ($('.protein, .no-meat').hasClass('image-checkbox-checked')) {
    return true;
  }else{
    alert('select at least a field');
    e.stopPropagation();
  }
})

$('#dairy-continue-btn').click(function (e){
  if ($('.dairy').hasClass('image-checkbox-checked')) {
    return true;
  }else{
    alert('select at least a field');
    e.stopPropagation();
  }
})

$('.protein').click(function (){
  $('.no-meat').removeClass('image-checkbox-checked');
})

$('#email_metric, #email_imperial').keyup(function(){
  email_check(this);
})

$('#age_imperial, #age_metric').keyup(function(){
  calculateAge(this);
})
$('#weight_kgs, #weight_lbs, #lose_lb, #lose_kg').keyup(function(){
  calculateWeight(this);
})
$('#height_inches, #height_feet, #height_cm').keyup(function(){
  calculateHeight(this);
})
$('#form-error-section').hide();



//  function validateEmail($email) {
//   var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
//   return emailReg.test( $email );
// }
// if( !validateEmail(emailaddress)) { /* do stuff here */ }

$('.multisteps-form__form').submit(function(e){
  e.preventDefault();
  // formSubmission($(this));
  var age_imperial = $('#age_imperial').val();
  var age_metric = $('#age_metric').val();
  var height_feet = $('#height_feet').val();
  var height_cm = $('#height_cm').val();
  var height_inches = $('#height_inches').val();
  var weight_kgs = $('#weight_kgs').val();
  var weight_lbs = $('#weight_lbs').val();
  var lose_kg = $('#lose_kg').val();
  var lose_lb = $('#lose_lb').val();
  var email_imperial = $('#email_imperial').val();
  var email_metric = $('#email_metric').val();
  var submit_btn = $('.submit_btn').val();
  var gender = $('#gender').val();
  var dairy_product = [];
  var veggies = [];
  var proteins = [];
  var no_meat = $('#no-meat:checked').val();
  var physical_activity = $('#physical_activity').val();
  var fav_dairy = $('input[name=dairy_product]:checked').each(function(){
    dairy_product.push($(this).val());
  })
  var fav_veggie = $('input[name=veggies]:checked').each(function(){
    veggies.push($(this).val());
  })
  var fav_protein = $('input[name=proteins]:checked').each(function(){
    proteins.push($(this).val());
  })
  proteins = proteins.join(',');
  dairy_product = dairy_product.join(',');
  veggies = veggies.join(',');;
  if (age_imperial > 120 || age_metric > 120 || isNaN(age_imperial) || isNaN(age_metric) || age_imperial == "" || age_metric == "") {
    $('#form-error-section').fadeIn(500);
    $('#form-error').html('Enter a valid age');
    return false;
  }
  if (height_feet > 20 || height_feet == "") {
    $('#form-error-section').fadeIn(500);
    $('#form-error').html('Enter a valid height');
    return false;
  }
  if (isNaN(height_feet)) {
    $('#form-error-section').fadeIn(500);
    $('#form-error').html('Height should be a number');
    return false;
  }
  if (height_cm > 600 || height_cm == "") {
    $('#form-error-section').fadeIn(500);
    $('#form-error').html('Enter a valid height');
    return false;
  }
  if (isNaN(height_cm)) {
    $('#form-error-section').fadeIn(500);
    $('#form-error').html('Height should be a number');
    return false;
  }
  if (isNaN(weight_kgs) || isNaN(weight_lbs) || isNaN(lose_kg) || isNaN(lose_lb)) {
    $('#form-error-section').fadeIn(500);
    $('#form-error').html('Weight should be a number');
    return false;
  }
  if (weight_lbs == "" || weight_kgs == "" || lose_lb == "" || lose_kg == "") {
     $('#form-error-section').fadeIn(500);
    $('#form-error').html('Weight field should not be empty');
    return false;
  }
  if (email_metric == "" || email_imperial == "") {
     $('#form-error-section').fadeIn(500);
    $('#form-error').html('Please enter your email address');
    return false;
  }
  $.ajax({
    url:'assets/includes/result.php',
    method:'POST',
    data: {
      age_imperial: age_imperial,
      age_metric: age_metric,
      height_feet: height_feet,
      height_cm: height_cm,
      height_inches: height_inches,
      weight_kgs: weight_kgs,
      weight_lbs: weight_lbs,
      lose_kg: lose_kg,
      lose_lb: lose_lb,
      email_imperial: email_imperial,
      email_metric: email_metric,
      submit_btn: submit_btn,
      gender: gender,
      no_meat: no_meat,
      physical_activity: physical_activity,
      proteins: proteins,
      dairy_product: dairy_product,
      veggies: veggies
    },
    success:function(data){
     $('.index-body').html(data);
   }
 })
})


$('.contact-form').submit(function (e){
  e.preventDefault();
  var contact_full_name = $('#contact_full_name').val();
  var contact_email = $('#contact_email').val();
  var contact_option = $('#contact_option').val();
  var contact_message = $('#contact_message').val();
  var contact_button = $('.contact_button').val();

  $.ajax({
    url: 'assets/includes/contact.php',
    method: 'POST',
    data: {
      contact_full_name: contact_full_name,
      contact_email: contact_email,
      contact_option: contact_option,
      contact_message: contact_message,
      contact_button: contact_button
    },
    success:function(data){
      $('#form-error-section').fadeIn(500);
    $('#form-error').html(data);
    }
  })
})


//DOM elements
const DOMstrings = {
  stepsBtnClass: 'multisteps-form__progress-btn',
  stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
  stepsBar: document.querySelector('.multisteps-form__progress'),
  stepsForm: document.querySelector('.multisteps-form__form'),
  stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
  stepFormPanelClass: 'multisteps-form__panel',
  stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
  stepPrevBtnClass: 'js-btn-prev',
  stepNextBtnClass: 'js-btn-next' };


//remove class from a set of items
const removeClasses = (elemSet, className) => {

  elemSet.forEach(elem => {

    elem.classList.remove(className);

  });

};

//return exect parent node of the element
const findParent = (elem, parentClass) => {

  let currentNode = elem;

  while (!currentNode.classList.contains(parentClass)) {
    currentNode = currentNode.parentNode;
  }

  return currentNode;

};

//get active button step number
const getActiveStep = elem => {
  return Array.from(DOMstrings.stepsBtns).indexOf(elem);
};

//set all steps before clicked (and clicked too) to active
const setActiveStep = activeStepNum => {

  //remove active state from all the state
  removeClasses(DOMstrings.stepsBtns, 'js-active');

  //set picked items to active
  DOMstrings.stepsBtns.forEach((elem, index) => {

    if (index <= activeStepNum) {
      elem.classList.add('js-active');
    }

  });
};

//get active panel
const getActivePanel = () => {

  let activePanel;

  DOMstrings.stepFormPanels.forEach(elem => {

    if (elem.classList.contains('js-active')) {

      activePanel = elem;

    }

  });

  return activePanel;

};

//open active panel (and close unactive panels)
const setActivePanel = activePanelNum => {

  //remove active class from all the panels
  removeClasses(DOMstrings.stepFormPanels, 'js-active');

  //show active panel
  DOMstrings.stepFormPanels.forEach((elem, index) => {
    if (index === activePanelNum) {

      elem.classList.add('js-active');

      setFormHeight(elem);

    }
  });

};

//set form height equal to current panel height
const formHeight = activePanel => {

  const activePanelHeight = activePanel.offsetHeight;

  DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;

};

const setFormHeight = () => {
  const activePanel = getActivePanel();

  formHeight(activePanel);
};

//STEPS BAR CLICK FUNCTION
DOMstrings.stepsBar.addEventListener('click', e => {

  //check if click target is a step button
  const eventTarget = e.target;

  if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
    return;
  }

  //get active button step number
  const activeStep = getActiveStep(eventTarget);

  //set all steps before clicked (and clicked too) to active
  setActiveStep(activeStep);

  //open active panel
  setActivePanel(activeStep);
});

//PREV/NEXT BTNS CLICK
DOMstrings.stepsForm.addEventListener('click', e => {

  const eventTarget = e.target;

  //check if we clicked on `PREV` or NEXT` buttons
  if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`)))
  {
    return;
  }

  //find active panel
  const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);

  let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);

  //set active step and active panel onclick
  if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
    activePanelNum--;

  } else {

    activePanelNum++;

  }

  setActiveStep(activePanelNum);
  setActivePanel(activePanelNum);

});

//SETTING PROPER FORM HEIGHT ONLOAD
window.addEventListener('load', setFormHeight, false);

//SETTING PROPER FORM HEIGHT ONRESIZE
window.addEventListener('resize', setFormHeight, false);

//changing animation via animation select !!!YOU DON'T NEED THIS CODE (if you want to change animation type, just change form panels data-attr)

const setAnimationType = newType => {
  DOMstrings.stepFormPanels.forEach(elem => {
    elem.dataset.animation = newType;
  });
};

//selector onchange - changing animation
const animationSelect = document.querySelector('.pick-animation__select');

animationSelect.addEventListener('change', () => {
  const newAnimationType = animationSelect.value;

  setAnimationType(newAnimationType);
});




function add_gender(id){
  $('#gender').attr('value',id);
}
anm.on();

function physicals (option){
  $('#physical_activity').attr('value', option);
}

function calculateWeight(weight_param){
  var weight_lbs = $('#weight_lbs');
  var weight_kgs = $('#weight_kgs');
  var lose_lb = $('#lose_lb');
  var lose_kg = $('#lose_kg');

  if (weight_param.id == 'weight_lbs' || weight_param.id == 'lose_lb') {
    if (isNaN(weight_param.value) || weight_param.value == "") {
      var weight = 0
    }else{
     var weight = weight_param.value;
   }
   weight_kg = Math.round(weight * 0.453 * 10) / 10;
   if (weight_param.id == 'weight_lbs') {
    weight_kgs.val(weight_kg);
  }else{
    lose_kg.val(weight_kg);
  }
}
else{
  if (isNaN(weight_param.value) || weight_param.value == "") {
    var weight = 0;
  }else{
    var weight = weight_param.value;
  }
  weight_lb = Math.round(weight * 2.2);
  if (weight_param.id == 'weight_kgs') {
    weight_lbs.val(weight_lb);
  }else{
    lose_lb.val(weight_lb);
  }
}
}

function calculateAge(age_param){
  var age_imperial = $('#age_imperial');
  var age_metric = $('#age_metric');
  if (age_param.id == 'age_imperial') {
    age_metric.val(age_param.value);
  }else{
    age_imperial.val(age_param.value);
  }
}

function email_check(email_param){
  var email_imperial = $('#email_imperial');
  var email_metric = $('#email_metric');
  if (email_param.id == 'email_imperial') {
    email_metric.val(email_param.value);
  }else{
    email_imperial.val(email_param.value);
  }
}

function calculateHeight(height_param){
  if (height_param.id == 'height_feet' || height_param.id == 'height_inches') {
    var height_feet = $('#height_feet').val();
    var height_inches = $('#height_inches').val();
    var height_cm = $('#height_cm');

    if (isNaN(height_feet) || height_feet == '') {
      height_feet = 0;
    }

    if (isNaN(height_inches) || height_inches == '') {
      height_inches = 0;
    }

    height_inches = parseInt(parseInt(height_feet * 12) + parseInt(height_inches));
    var h = Math.round(height_inches * 2.54);
    height_cm.val(h);
  }else{
    if (isNaN(height_param.value) || height_param.value == '') {
      cm = 0;
    }else{
      cm = height_param.value;
    }

    var totalInches = Math.round(cm/2.54);
    var inches = totalInches % 12;
    var feet = (totalInches - inches) / 12;
    height_param.form.height_feet.value = feet;
    height_param.form.height_inches.value = inches;
  }
}