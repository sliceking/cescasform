var formHandler = (function($){
    // references to all our inputs so we can do some validation on the front end
    // also the submit button is starting off as disabled, so we can
    // add logic to un-disable the button when all conditions are met
    var firstName = $('#first_name');
    var lastName = $('#last_name');
    var homePhone = $('#home_phone');
    var cellPhone = $('#cell_phone');
    var email = $('#email');
    var address1 = $('#address_1');
    var address2 = $('#address_2');
    var city = $('#city');
    var zip = $('#zip');
    var note = $('#note');
    var prospectFirstName = $('#prospect_first_name');
    var prospectLastName = $('#prospect_last_name');
    var typeOfService = $('#type_of_service');
    var submitButton = $('#submit_button');

    var validateInputs = function(){
        // do some validation on the inputs
    }

    var displayErrors = function(){
        // when some data is not present
        // give some tips to the user on what to do
        // to put the form in a good state
    }

    var enableSubmit = function(){
        // when conditions are met, enable the submit button
    }

    var submitForm = function(){
        // if button isnt disabled
        // submit the information to OUR server
        $.ajax({
            method: "POST",
            url: , //localize the ajax url from wp
            data: , // package all the data up first
            success: function(){
                // some success actions
            },
            error: function(){
                // some error actions
            }
        })
    }

    var init = function(){

        // handle the form
        submitButton.click(submitForm)
    }

    return { init: init }


})(jQuery);

$(document).ready(function () {
    formHandler.init();
});
