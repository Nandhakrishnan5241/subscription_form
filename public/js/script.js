$(document).ready(function(){
    showOverlayTarget(jsArray);
    $('.overlayForm').submit(function(e){
        e.preventDefault();
        var email = $('#email').val();
        if (!validateEmail(email)) {
           
            $(".error-msg").show();
            $('.error-msg').text('Please enter a valid email address.');
            return false;
        }
        // var domain = email.split('@')[1];
        
        // if(domain != 'gmail.com'){
        //     $('#email').css('border-color', 'red');
        //     $('#validate').show();
        //     return false;
        // }
        $.ajax({
            url: 'submitemail',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            data: {email: email},
            success: function(response) {
                if(response) {
                    $('#overlay').hide();
                    $(".success-msg").show();
                    $('.success-msg').text('Thank you for subscribing!');
                } else {
                    $(".error-msg").show();
                    $('.error-msg').text('The email ID you entered already exists. Please try with a different email ID.');
                }
            }
        });
    });
});

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function showOverlayTarget(jsArray){
    var displayRules = jsArray[0].displayrules;
    if (displayRules === "once_per_day") {
        var lastShownDate = localStorage.getItem('overlayLastShownDate');
        var today = new Date().toISOString().slice(0, 10);
        if (lastShownDate === today) {
            closeOverlay();
            return; 
        }
        $('#overlay').fadeIn();
        localStorage.setItem('overlayLastShownDate', today);
    } 
    else if (displayRules === "once_per_session") {        
        var isShownInSession = sessionStorage.getItem('overlayShownInSession');
        if (isShownInSession) {
            return; 
        }       
        $('#overlay').fadeIn();
        sessionStorage.setItem('overlayShownInSession', true);
    } 
    else {               
        $('#overlay').fadeIn();
    }
}
function closeOverlay() {
    $('#overlay').fadeOut();
}
