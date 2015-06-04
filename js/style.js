jQuery(function() {
    console.log('go');

    jQuery('#primary-menu > li a').on('mouseover', function () {
        jQuery('.sub-menu:visible', jQuery(this).parent()).divBlur();
    });
});