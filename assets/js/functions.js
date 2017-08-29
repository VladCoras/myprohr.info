function showFileNumber() {
    $('.inputfile').on('change', function(e) {
        var label = $(this).next();
        
        // Get files
        if( this.files && this.files.length > 1 )
            fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
        else
            fileName = e.target.value.split( '\\' ).pop();

        // console.log(fileName);
        // set text
        if( fileName )
            label.text(fileName);
        else
            label.text("Files selected");

    });
}

function initForm(e, form) {
    var removeError = function(field) {
        var errorField = field ? field.parents('.error-field') : $('.error-field');
        if (errorField) {
            errorField.removeClass('error-field').find('.error-message').remove();
        };
    };
    var displayError = function(form, fields) {
        removeError(null);
        $.each(fields, function(key, val) {
            var field = $('*[name="' + key + '"]', form);
            field.addClass('error').val(val);
            field.change(function() {
                removeError($(this));
            }).keyup(function() {
                removeError($(this));
            });
        });
    };
    e.preventDefault();
    form.addClass('loading');
    $.ajax({
        url: form.attr('action'),
        data: form.serialize() + '&ajax=1',
        type: 'post',
        dataType: 'json'
    }).done(function(response) {
        if (response.errors) {
            displayError(form, response.errors);
            if ($('.error-field', form).length) {
                $('html, body').animate({scrollTop:  $('.error-field').eq(0).offset().top}, 400);
            };
        } else {
            if (response.success == 1) {
                if (response.redirect) {
                    window.location.href = response.redirect;
                } else {
                    if (response.submit == 1) {
                        form.unbind('submit').submit();
                    } else {
                        form.find('input[type="text"], input[type="email"], textarea').val('');
                        alert(response.message);
                    };
                };
            } else {
                alert(response.message);
            };
        };
    }).fail(function(data) {
        alert('Error. Please try again later.' );
    }).always(function() {
        form.removeClass('loading');
    });
};