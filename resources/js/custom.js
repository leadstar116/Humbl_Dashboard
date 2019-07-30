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