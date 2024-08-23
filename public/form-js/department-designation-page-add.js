var KTvalidationDepartment= function() {
    var _officeAdd;
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _handleOfficeAddForm = function(e) {
        var validation;
        var form = document.getElementById('kt_department_settings_general');
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    departmentName: {
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
                    departmentName_hi: {
                        validators: {
                            notEmpty: {
                                message: 'यह फ़ील्ड आवश्यक है'
                            },
                            regexp: {
                                regexp: /^[-+.,@:\/&?'"=)( \u0900-\u097F\s]{1,100}$/,
                                message: 'इस फ़ील्ड में केवल हिंदी अक्षर ही अनुमत हैं और अधिकतम 100 अक्षर की अनुमत है।'
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
    $('.submit-department-btn').click( function(e) {
            e.preventDefault();
            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    submitButton.disabled = true;
                    //$('#examAddModal').modal('hide');
                    $('#loading').addClass('loading');
                   $('#loading-content').addClass('loading-content');
                 axios.post(crudUrlTemplate.create_deptDesig, {
                       name_en: $('.departmentName').val(),
                       name_hi: $('.departmentName_hi').val(),
                    })
                    .then(function (response) {
                    if (response.data.status ==200) {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                       toastr.success(
                          "New Department added successfully!", 
                          "New Department!", 
                          {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                       );
                       setTimeout(function() {
                          if (history.scrollRestoration) {
                             history.scrollRestoration = 'manual';
                          }
                          location.href = 'departmentdesignation-create'; // reload page
                       }, 1500);
                      
                    } else {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        console.log('Brijesh '+message)
                       }
                    })
                    .catch(function (error) {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        for (var field in error.response.data.errors) {
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
            _officeAdd = $('#kt_department_settings_general');
        _handleOfficeAddForm();
        submitButton = document.querySelector('#kt_department_submit');
        }
    };
}();

var KTvalidationDesignation= function() {
    var _officeAdd2;
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _handleOfficeAddForm2 = function(e) {
        var validation;
        var form = document.getElementById('kt_designation_content_settings');
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    designationName: {
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
                    designationName_hi: {
                        validators: {
                            notEmpty: {
                                message: 'This field is required'
                            },
                            regexp: {
                                regexp: /^[-+.,@:\/&?'"=)( \u0900-\u097F\s]{1,100}$/,
                                message: 'इस फ़ील्ड में केवल हिंदी अक्षर ही अनुमत हैं और अधिकतम 100 अक्षर की अनुमत है।'
                            },
                        },
                    },
                    'deprt_id': {
                          validators: {
                             notEmpty: {
                                message: 'This field is required'
                             }
                          }
                       }
                 },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5()
                }
            }
        );
        
        $('.submit-designation-btn').click( function(e) {
            e.preventDefault();
            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    submitButton.disabled = true;
                    $('#loading').addClass('loading');
                    $('#loading-content').addClass('loading-content');
                    //$('#examAddModal').modal('hide');
                 axios.post(crudUrlTemplate.create_deptDesig, {
                       name_en: $('.designationName').val(),
                       name_hi: $('.designationName_hi').val(),
                       parent_id: $('.deprt_id').val(),
                    })
                    .then(function (response) {
                    if (response.data.status ==200) {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                       toastr.success(
                          "New Designation added successfully!", 
                          "New Designation!", 
                          {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                       );
                       setTimeout(function() {
                          if (history.scrollRestoration) {
                             history.scrollRestoration = 'manual';
                          }
                          location.href = 'departmentdesignation-create'; // reload page
                       }, 1500);
                      
                    } else {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                       toastr.error(
                          response.data.message,
                          "Something went wrong!", 
                          {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                       );
                       }
                    })
                    .catch(function (error) {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        for (var field in error.response.data.errors) {
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
                                {timeOut: 2, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                             );
                       }
                 })
              });
        }
    return {
        init: function() {
            _officeAdd2 = $('#kt_designation_content_settings');
        _handleOfficeAddForm2();
        submitButton = document.querySelector('#kt_designation_submit');
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTvalidationDepartment.init();
    KTvalidationDesignation.init();
});