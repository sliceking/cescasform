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
            'nonce' => wp_create_nonce( 'move-n-nonce' ),
        ]
    );

}
