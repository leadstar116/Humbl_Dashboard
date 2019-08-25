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

$('.profile-form').submit(function(e){
    var departments = [];
    $('input[name="department[]"]').each(function(){
        if($.inArray($(this).val(), departments) !== -1) {
            e.preventDefault();
            alert("Same departments are existing!");
            return false;
        } else {
            departments.push($(this).val());
        }
    });
});

$(document).on('click', '.btn-delete-staff', function(){
    var r = confirm("Are you going to exclude this staff?");
    if (r == true) {
        var userId = $(this).attr('attr-id');
        var formData = new FormData;
        formData.append('userId', userId);
        formData.append('token', "{{ csrf_token() }}");
        $.ajax({
            url: '/remove_staff',
            type: 'POST',
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "userId": userId
                },
            success: function (data, textStatus, jqXHR) {
                if (typeof data.error === 'undefined') {
                    alert('Successfully removed!');
                    $('.existing-staff-table tr[attr-id="' + userId + '"]').remove();
                }
                else {
                    // Handle errors here
                    alert('ERRORS: ' + data.error);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Handle errors here
                alert('ERRORS: ' + textStatus);
                // STOP LOADING SPINNER
            }
        });
    }
});

setTimeout(function(){
    if($('#customer_ratings').length) {
        var data_string = $('#customer_ratings').val();
        var months_string = $('#rating_months').val();
        var months = months_string.split(',');
        var data = $.merge(['data1'], data_string.split(','));
        var chart2 = c3.generate({
            bindto: '#chart-guest-satisfication', // id of chart wrapper
            data: {
                columns: [
                    // each columns data
                    data,
                ],
                type: 'area-spline', // default type of chart
                groups: [
                    [ 'data1']
                ],
                colors: {
                    'data1': '#d54d88',
                },
                names: {
                    // name of each serie
                    'data1': 'Rating',
                }
            },
            axis: {
                x: {
                    type: 'category',
                    // name of each category
                    categories: months
                },
            },
            legend: {
                show: false, //hide legend
            },
            padding: {
                bottom: -20,
                top: 0,
                left: -7,
            },
        });

        var data_string = $('#reviews_count').val();
        var data = $.merge(['data1'], data_string.split(','));
        var chart = c3.generate({
            bindto: '#chart-area-spline-sracked', // id of chart wrapper
            data: {
                columns: [
                    // each columns data
                    data,
                ],
                type: 'area-spline', // default type of chart
                groups: [
                    [ 'data1']
                ],
                colors: {
                    'data1': '#d54d88',
                },
                names: {
                    // name of each serie
                    'data1': '5 star reviews'
                }
            },
            axis: {
                x: {
                    type: 'category',
                    // name of each category
                    categories: months
                },
            },
            legend: {
                show: false, //hide legend
            },
            padding: {
                bottom: -20,
                top: 0,
                left: -7,
            },
        });
    }
}, 1000);
