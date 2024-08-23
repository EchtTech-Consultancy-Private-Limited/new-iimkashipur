var KTvalidationModule= function() {
    var _officeAdd;
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _handleOfficeAddForm = function(e) {
        var validation;
        var form = document.getElementById('kt_settings_module_form');
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    menuName_en: {
                        validators: {
                            notEmpty: {
                                message: 'This field is required'
                            },
                            regexp: {
                                regexp: /^[-+.,)@:\/&?''=""( A-Za-z0-9]{1,100}$/,
                               message: 'This field can consist of alphabetical characters, spaces, max 100 characters only'
                            },
                        },
                    },
                    url: {
                        validators: {
                            notEmpty: {
                                message: 'This field is required'
                            },
                        },
                    },
                    shortorder: {
                        validators: {
                            notEmpty: {
                                message: 'This field is required'
                            },
                            regexp: {
                                regexp: /^-?\d{1,3}$/,
                                message: 'This field can consist of number characters only'
                             },
                        },
                    },
                prefix: {
                        validators: {
                            notEmpty: {
                                message: 'This field is required'
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5()
                }
            }
        );
        $('.submit-add-module-btn').click( function(e) {
            e.preventDefault();
            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    submitButton.disabled = true;
                    //$('#examAddModal').modal('hide');
                    $('#loading').addClass('loading');
                    $('#loading-content').addClass('loading-content');
                 axios.post(crudUrlTemplate.create, {
                       name_en: $('.menuName_en').val(),
                       name_hi: $('.menuName_hi').val(),
                       sort_order: $('.shortorder').val(),
                       prefix: $('.prefix').val(),
                       url: $('.url').val(),
                    })
                    .then(function (response) {
                       
                    if (response.data.status == 200) {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                       toastr.success(
                          response.data.message, 
                          "New Module!", 
                          {timeOut: 0, extendedTimeOut: 0, closeButton: true,progressBar:true, closeDuration: 0}
                       );
                       setTimeout(function() {
                          if (history.scrollRestoration) {
                             history.scrollRestoration = 'manual';
                          }
                          location.href = 'module-create'; // reload page
                       }, 1500);
                      
                    } else {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                       toastr.error(
                          response.data.message.name_en, 
                          response.data.message, 
                          "Something went wrong!", 
                          {timeOut: 1, extendedTimeOut: 0, closeButton: true,progressBar:true, closeDuration: 0}
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
            _officeAdd = $('#kt_settings_module_form');
        _handleOfficeAddForm();
        submitButton = document.querySelector('#kt_module_submit');
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
  KTvalidationModule.init();
});