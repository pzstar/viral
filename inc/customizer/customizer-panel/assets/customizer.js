jQuery(document).ready(function ($) {
    "use strict";
    /* Move sidebar widgets in the font page panel */
    wp.customize.section('sidebar-widgets-viral-frontpage-sidebar').panel('viral_front_page_panel');
    wp.customize.section('sidebar-widgets-viral-frontpage-sidebar').priority('30');
});
