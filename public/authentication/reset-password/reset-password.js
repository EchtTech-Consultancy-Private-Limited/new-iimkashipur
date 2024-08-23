"use strict";
// Class Definition
var KTAuthResetPassword = function () {
    // Elements
    var form;
    var submitButton;
    var validator;
    var handleForm = function (e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'email': {
                        validators: {
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: 'The value is not a valid email address',
                            },
                            notEmpty: {
                                message: 'Email address is required'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',  // comment to enable invalid state icons
                        eleValidClass: '' // comment to enable valid state icons
                    })
                }
            }
        );
    }
    var handleSubmitAjax = function (e) {
        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            // Prevent button default action
            e.preventDefault();

            // Validate form
            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    // Check axios library docs: https://axios-http.com/docs/intro
                    axios.post(submitButton.closest('form').getAttribute('action'), new FormData(form)).then(function (response) {
                       if (response.status == 200) {
                            form.reset();
                            toastr.success(
                                "We have send a password reset link to your email!", 
                                "Successfully reset link!", 
                                {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                             );
                             setTimeout(function() {
                                if (history.scrollRestoration) {
                                   history.scrollRestoration = 'manual';
                                }
                                //location.href = response.data.redirectUrl; // reload page
                             }, 1500);
                           
                        } else {
                            toastr.error(
                                'Sorry, '+error.response.data.message, 
                                "email or password is incorrect", 
                                {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                             );
                        }
                    }).catch(function (error) {
                        toastr.error(
                            'Sorry, '+error.response.data.message, 
                            "error", 
                            {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                         );
                    }).then(() => {
                        // Hide loading indication
                        submitButton.removeAttribute('data-kt-indicator');
                        // Enable button
                        submitButton.disabled = false;
                    });
                } else {
                    toastr.error(
                        "Sorry, looks like there are some errors detected, please try again.", 
                        "error", 
                        {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                     );
                }
            });
        });
    }
    
    var isValidUrl = function(url) {
        try {
            new URL(url);
            return true;
        } catch (e) {
            return false;
        }
    }
    // Public Functions
    return {
        // public functions
        init: function () {
            form = document.querySelector('#kt_password_reset_form');
            submitButton = document.querySelector('#kt_password_reset_submit');

            handleForm();

            if (isValidUrl(form.getAttribute('action'))) {
                handleSubmitAjax(); // use for ajax submit
            } else {
                handleSubmitAjax(); // used for demo purposes only
            }
        }
    };
}();
// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAuthResetPassword.init();
});
