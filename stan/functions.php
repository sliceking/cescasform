<?php

// functions.php is like the brain to a wordpress theme
// it houses all the functions you need or you would include
// classes or link up actions and ajax calls into the wordpress application

// this file in rhf has a lot of stuff in it already
// make sure to add this part above the giant mess of ACF at the bottom of the file

// we will tell it to load up the js for our page, when that template is loaded
if ( is_page_template( 'Move form' ) ) {
    wp_enqueue_script(
        'move-in-script', // internal identifier
        'moven.js', // path to js file
        ['jquery'], // dependencies
        '',
        true
    );

    // pass some wordpress data from the server into our js file, so it knows where to communicate
    // and has the nonce value so we can verify the request comes from our site
    wp_localize_scrit(
        'move-in-script',
        'FROM_WP',
        [
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce( 'move-n' ),
        ]
    );
}

// the actions submitted from the form are connected to our function that handles the submission
add_action( 'wp_ajax_move_in_form_submission', 'move_in_form_submission' );
add_action( 'wp_ajax_nopriv_move_in_form_submission', 'move_in_form_submission' );
function move_in_form_submission(){
    // we check to make sure the nonce is valid
    check_ajax_referer( 'move-n', 'nonce' );

    // do some sanitization first

    // do some validation on the back end

    // add the extra data to the request before sending
    // Submission URL: https://cptest.move-n.com/api/Lead/LeadInfo
    // Sender_ID: 849b2101c11b171ca1cb65b27d1119127ee38f2c
    // Parent_ID: 224

    // send request off to the 3rd party service
    $res = wp_remote_post();

    // check response

    // if response is good return a
    wp_send_json_success();

    // if its bad
    wp_send_json_error();

}
