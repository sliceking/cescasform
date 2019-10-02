<?php

// functions.php is like the brain to a wordpress theme
// it houses all the functions you need or you would include
// classes or link up actions and ajax calls into the wordpress application

// this file in rhf has a lot of stuff in it already
// make sure to add this part above the giant mess of ACF at the bottom of the file

// we will tell it to load up the js for our page, when that template is loaded
if( is_page_template('Move form') ){
    wp_enqueue_script(
        'move-in-script',
        'moven.js',
        ['jquery'],
        '',
        true
    );

}
