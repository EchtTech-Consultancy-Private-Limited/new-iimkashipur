var KTvalidationMenu1= function() {
    var _officeAdd;
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _handleOfficeAddForm = function(e) {
        var validation;
        var form = document.getElementById('kt_settings_menu_form');
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
                    menu_place: {
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
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5()
                }
            }
        );
        $('.submit-add-menu-btn').click( function(e) {
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
                       menu_place: $("input[type='radio'][name='menu_place']:checked").val(),
                       sort_order: $('.shortorder').val(),
                       url: $('.url').val(),
                       footer_url: $('.footer_url').val(),
                       tab_type: $("input[type='radio'][name='tab_type']:checked").val()
                    })
                    .then(function (response) {

                    if (response.data.status ==200) {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                       toastr.success(
                          "New Menu added successfully!", 
                          "New Menu!", 
                          {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                       );
                       setTimeout(function() {
                          if (history.scrollRestoration) {
                             history.scrollRestoration = 'manual';
                          }
                          location.href = 'menu-create'; // reload page
                       }, 1500);
                      
                    } else {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                       toastr.error(
                          "Sorry, the information is incorrect, please try again.", 
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
            _officeAdd = $('#kt_settings_menu_form');
        _handleOfficeAddForm();
        submitButton = document.querySelector('#kt_menu_submit');
        }
    };
}();
var KTvalidationMenu2= function() {
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _officeAdd2;
    var _handleOfficeAddForm2 = function(e) {
        var validation;
        var form = document.getElementById('kt_settings_menu_form2');
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                 submenuName_en: {
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
                    'menu_id': {
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
        
        $('.submit-add-menu-btn2').click( function(e) {
            e.preventDefault();
            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    submitButton.disabled = true;
                    $('#loading').addClass('loading');
                    $('#loading-content').addClass('loading-content');
                    //$('#examAddModal').modal('hide');
                 axios.post(crudUrlTemplate.create, {
                       name_en: $('.submenuName_en').val(),
                       name_hi: $('.submenuName_hi').val(),
                       parent_id: $('.menu_id').val(),
                       sort_order: $('.shortorder1').val(),
                       url: $('.url1').val(),
                       tab_type: $("input[type='radio'][name='tab_type1']:checked").val()
                    })
                    .then(function (response) {

                    if(response.data.status ==200) {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                       toastr.success(
                          "New Sub Menu added successfully!", 
                          "New Sub Menu!", 
                          {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                       );
                       setTimeout(function() {
                          if (history.scrollRestoration) {
                             history.scrollRestoration = 'manual';
                          }
                          location.href = 'menu-create'; // reload page
                       }, 1500);
                      
                    } else {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                       toastr.error(
                          "Sorry, the information is incorrect, please try again.", 
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
            _officeAdd2 = $('#kt_settings_menu_form2');
        _handleOfficeAddForm2();
        submitButton = document.querySelector('#kt_menu_submit2');
        }
    };
}();
var KTvalidationMenu3= function() {
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _officeAdd3;
    var _handleOfficeAddForm3 = function(e) {
        var validation;
        var form = document.getElementById('kt_settings_menu_form3');
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                 sub_sub_menu_en: {
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
                    'submenu_id': {
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
        
        $('.submit-add-menu-btn3').click( function(e) {
            e.preventDefault();
            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    submitButton.disabled = true;
                    //$('#examAddModal').modal('hide');
                    $('#loading').addClass('loading');
                   $('#loading-content').addClass('loading-content');
                 axios.post(crudUrlTemplate.create, {
                       name_en: $('.sub_sub_menu_en').val(),
                       name_hi: $('.sub_sub_menu_hi').val(),
                       parent_id: $('.submenu_id').val(),
                       sort_order: $('.shortorder2').val(),
                       url: $('.url2').val(),
                       tab_type: $("input[type='radio'][name='tab_type2']:checked").val()
                    })
                    .then(function (response) {

                    if(response.data.status ==200) {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                       toastr.success(
                          "New Sub Sub Menu added successfully!", 
                          "New Sub Sub Menu!", 
                          {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                       );
                       setTimeout(function() {
                          if (history.scrollRestoration) {
                             history.scrollRestoration = 'manual';
                          }
                          location.href = 'menu-create'; // reload page
                       }, 1500);
                      
                    } else {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                       toastr.error(
                          "Sorry, the information is incorrect, please try again.", 
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
            _officeAdd3 = $('#kt_settings_menu_form3');
        _handleOfficeAddForm3();
        submitButton = document.querySelector('#kt_menu_submit3');
        }
    };
}();
var KTvalidationMenu4= function() {
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _officeAdd4;
    var _handleOfficeAddForm4 = function(e) {
        var validation;
        var form = document.getElementById('kt_settings_menu_form4');
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                 sub_sub_sub_menu_en: {
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
                    'subsubmenu_id': {
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
        
        $('.submit-add-menu-btn4').click( function(e) {
            e.preventDefault();
            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    submitButton.disabled = true;
                    //$('#examAddModal').modal('hide');
                    $('#loading').addClass('loading');
                   $('#loading-content').addClass('loading-content');
                 axios.post(crudUrlTemplate.create, {
                       name_en: $('.sub_sub_sub_menu_en').val(),
                       name_hi: $('.sub_sub_sub_menu_hi').val(),
                       parent_id: $('.subsubmenu_id').val(),
                       sort_order: $('.shortorder3').val(),
                       url: $('.url3').val(),
                       tab_type: $("input[type='radio'][name='tab_type3']:checked").val()
                    })
                    .then(function (response) {
                    if(response.data.status ==200) {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                       toastr.success(
                          "New Sub Sub Menu added successfully!", 
                          "New Sub Sub Menu!", 
                          {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                       );
                       setTimeout(function() {
                          if (history.scrollRestoration) {
                             history.scrollRestoration = 'manual';
                          }
                          location.href = 'menu-create'; // reload page
                       }, 1500);
                      
                    } else {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                       toastr.error(
                          "Sorry, the information is incorrect, please try again.", 
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
            _officeAdd4 = $('#kt_settings_menu_form4');
        _handleOfficeAddForm4();
        submitButton = document.querySelector('#kt_menu_submit4');
        }
    };
}();
// Class Initialization
jQuery(document).ready(function() {
  KTvalidationMenu1.init();
  KTvalidationMenu2.init();
  KTvalidationMenu3.init();
  KTvalidationMenu4.init();
});