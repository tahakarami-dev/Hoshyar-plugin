jQuery(document).ready(function($) {
    $('.tab').click(function() {
        $('.tab').removeClass('active');
        $(this).addClass('active');
    
        $('.tab-content').removeClass('active');
        $('#' + $(this).data('tab')).addClass('active');
    });
})