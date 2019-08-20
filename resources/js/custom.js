$('.tab-menu li').click(function(){
    $('.tab-menu li').removeClass('selected');
    $(this).addClass('selected');
    $('#main-content').removeClass();
    $('#main-content').addClass($(this).attr('attr-type'));
});

function readURL(input, target) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        console.log(e.target.result);
        $('.' + target).attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
}

$("#avatarFile").change(function() {
    readURL(this, 'img_profile');
});

$("#backgroundFile").change(function() {
    readURL(this, 'img_profile_back');
});

$('#checkbox_agree').click(function(){
    if(this.checked) {
        $('.register-btn').prop('disabled', false);
    } else {
        $('.register-btn').prop('disabled', true);
    }
})

$('.btn-add-department').click(function() {
    $('.department-list').append(`<li><input type="text" name="department[]" placeholder="Department" required><a class="btn-remove-department"><i aria-hidden="true" class="fa fa-trash"></i></a></li>`);
});

$(document).on('click', '.btn-remove-department', function() {
    $(this).closest('li').remove();
});

$('.profile-reset-btn').click(function(){
    $('.profile-complete input').val('');
    $('.profile-complete textarea').val('');
    $('.profile-complete .department-list').empty();
});

$('.btn-add-staff').click(function(){
    var optionValues = '';

    $('.department-select:first option').each(function() {
        if($(this).val() == '') {
            optionValues += `<option value="" disabled selected>Department</option>`;
        } else {
            optionValues += `<option value='` + $(this).val() + `'>`+$(this).text()+`</option>`;
        }
    });
    $('.staff-body').append(`<div class="form-group row">
        <div class="col-md-3">
            <input type="text" placeholder="First Name" name="first_name[]" required>
        </div>
        <div class="col-md-3">
            <input type="text" placeholder="Last Name" name="last_name[]" required>
        </div>
        <div class="col-md-3">
            <input type="text" placeholder="name@example.com" name="email[]" required>
        </div>
        <div class="col-md-3">
            <select name="department[]" class="department-select" required>` + optionValues + `
            </select>
            <a class="btn-remove-staff"><i aria-hidden="true" class="fa fa-trash"></i></a>
        </div>
    </div>
    `);
});

$(document).on('click', '.btn-remove-staff', function(){
    if($('.staff-body div.form-group').length > 1) {
        $(this).closest('div.form-group').remove();
    }
});

$(document).ready(function(){
    if($('#selected_country').val() != '') {
        $('select[name="country"]').val($('#selected_country').val());
    }
});