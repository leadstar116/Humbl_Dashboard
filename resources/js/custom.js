/*
$('.Log-In').click(function(){
    $('.login-container').addClass('log-in');
    $('.login-container').removeClass('sign-up');
});

$('.Join-Us').click(function(){
    $('.login-container').removeClass('log-in');
    $('.login-container').addClass('sign-up');
});
*/
$('#checkbox_agree').click(function(){
    if(this.checked) {
        $('.register-btn').prop('disabled', false);
    } else {
        $('.register-btn').prop('disabled', true);
    }
})