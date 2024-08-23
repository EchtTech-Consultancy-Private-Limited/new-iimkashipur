var KTvalidationCoreWebsiteSetting3= function() {
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var id = new URLSearchParams(window.location.search).get('id');
    var _officeAdd3;
    var _handleOfficeAddForm3 = function(e) {
        var validation;
        var form = document.getElementById('kt_social_link_update_form');
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                 google_link: {
                        validators: {
                            notEmpty: {
                                message: 'This url is you have fill http or https url'
                            },
                            regexp: {
                                regexp: /^(http|https):\/\//,
                                message: 'This field can consist of http or https url only'
                            },
                        },
                    },
                    linkedin: {
                        validators: {
                            notEmpty: {
                                message: 'This url is you have fill http or https url'
                            },
                            regexp: {
                                regexp: /^(http|https):\/\//,
                                message: 'This field can consist of http or https url only'
                            },
                        },
                    },
                    facebook: {
                        validators: {
                            notEmpty: {
                                message: 'This url is you have fill http or https url'
                            },
                            regexp: {
                                regexp: /^(http|https):\/\//,
                                message: 'This field can consist of http or https url only'
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
        $('.submit-coreWebsiteSetting-btn3').click( function(e) {
            e.preventDefault();
            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    submitButton.disabled = true;
                    //$('#examAddModal').modal('hide');
                    $('#loading').addClass('loading');
                    $('#loading-content').addClass('loading-content');
                 axios.post(crudUrlTemplate.update_sociallink+'?id='+id, {
                       google_link: $('.google_link').val(),
                       linkedin: $('.linkedin').val(),
                       facebook: $('.facebook').val(),
                       twitter: $('.twitter').val(),
                       instagram: $('.instagram').val(),
                       github: $('.github').val(),
                       youtube: $('.youtube').val(),
                       whatsapp: $('.whatsapp').val(),
                    })
                    .then(function (response) {
                    if(response.data.status ==200) {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                       toastr.success(
                          "New Social Link added successfully!", 
                          "New Social Link!", 
                          {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                       );
                       setTimeout(function() {
                          if (history.scrollRestoration) {
                             history.scrollRestoration = 'manual';
                          }
                          location.href = 'sociallink-list'; // reload page
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
            _officeAdd3 = $('#kt_social_link_update_form');
        _handleOfficeAddForm3();
        submitButton = document.querySelector('#kt_coreWebsiteSetting_submit3');
        }
    };
}();
jQuery(document).ready(function() {
  KTvalidationCoreWebsiteSetting3.init();
});