var formHandler = (function($){
    // references to all our inputs so we can do some validation on the front end
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
        // do some validation on the input values
    }

    var displayErrors = function(){
        // when some data is not present
        // give some tips to the user on what to do
        // to put the form in a good state
    }

    var submitForm = function(){
        // if button isnt disabled
        // submit the information to OUR server
        $.ajax({
            method: "POST",
            url: FROM_WP.ajax_url, //localize the ajax url from wp
            data: , // package all the data up first
            success: function(){
                // some success actions
            },
            error: function(){
                // some error actions
            }
        })
    }

    var handleSubmit = function(){
        // check for violations
        var hasErrors = validateInputs();
        // if some violations display Errors
        if (hasErrors) {
            displayErrors();
            return;
        }

        // if none submit
        submitForm();
    }

    var init = function(){

        // handle the form
        submitButton.click(handleSubmit)
    }

    return { init: init }


})(jQuery);

$(document).ready(function () {
    formHandler.init();
});
