var KTvalidationFormMenuMapping= function() {
    var _officeAdd;
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _handleOfficeAddForm = function(e) {
        var validation;
        var form = document.getElementById('kt_formMenuMapping_settings_general');
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    form_name: {
                        validators: {
                            notEmpty: {
                                message: 'This field is required'
                            },
                            // regexp: {
                            //     regexp: /^[-+.,)@:\/&?''=""( A-Za-z0-9]*$/,
                            //     message: 'This field can consist of alphabetical characters, spaces, digits only'
                            // },
                        },
                    },
                    menu_name: {
                        validators: {
                            notEmpty: {
                                message: 'This field is required'
                            },
                            // regexp: {
                            //     regexp: /^[-+.,)@:\/&?''=""( A-Za-z0-9]*$/,
                            //     message: 'This field can consist of alphabetical characters, spaces, digits only'
                            // },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5()
                }
            }
        );
    $('.submit-formMenuMap-btn').click( function(e) {
            e.preventDefault();
            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    submitButton.disabled = true;
                    //$('#examAddModal').modal('hide');
                    $('#loading').addClass('loading');
                   $('#loading-content').addClass('loading-content');
                 axios.post(crudUrlTemplate.create, {
                       form_name: $('.form_name').val(),
                       menu_name: $('.menu_name').val(),
                    })
                    .then(function (response) {
                    if (response.data.status ==200) {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                       toastr.success(
                          "Form Mapping With Menu successfully!", 
                          "New Mapping!", 
                          {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                       );
                       setTimeout(function() {
                          if (history.scrollRestoration) {
                             history.scrollRestoration = 'manual';
                          }
                          location.href = 'formmappingmenu-list'; // reload page
                       }, 1500);
                      
                    } else {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        toastr.error(
                            errorMessage,
                            "Something went wrong!", 
                            {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                            );
                       }
                    })
                    .catch(function (error) {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                            for(var field in error.response.data.errors) {
                                if (error.response.data.errors.hasOwnProperty(field)) {
                                error.response.data.errors[field].forEach(function (errorMessage) {
                                    toastr.error(
                                            errorMessage,
                                            {timeOut: 2, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                                        );
                                });
                                }
                            }
                          }).then(() => {
                                // Hide loading indication
                                submitButton.removeAttribute('data-kt-indicator');
                                // Enable button
                                submitButton.disabled = false;
                          });
                       } else {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                             toastr.error(
                                    "Some fields are required", 
                                    "Something Require!",
                                   {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                                );
                          }
                 })
              });
        }
    return {
        init: function() {
            _officeAdd = $('#kt_formMenuMapping_settings_general');
        _handleOfficeAddForm();
        submitButton = document.querySelector('#kt_add_formMapping_submit');
        }
    };
}();


// Class Initialization
jQuery(document).ready(function() {
    KTvalidationFormMenuMapping.init();
});