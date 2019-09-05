function reset_form_errors(formId) {
    $('.has-error').removeClass('has-error');
    $('.help-block').text('');
}

function form_errors(errors, scrollTop) {
    $.each(errors, function(key, item) {
        $('#' + key).parent().addClass('has-error');
        $('#msg_' + key).text(item);
    });

    if (scrollTop) {
        $("html, body").animate({ scrollTop: "0px" });
    }
}