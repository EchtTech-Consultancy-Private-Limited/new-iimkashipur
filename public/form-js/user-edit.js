var KTAppUserEdit = function () {
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var id = new URLSearchParams(window.location.search).get('id');
    var _officeAdd;
    var _handleOfficeAddForm = function(e) {
    var validation;
    var form = document.getElementById('kt_modal_edit_user_form');
       // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
       validation = FormValidation.formValidation(
             form,
             {
                fields: {
                 user_name: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
                            },
                            regexp: {
                              regexp: /^[-+.,)@:\/&?''=""( A-Za-z0-9]{1,40}$/,
                              message: 'This field can consist of alphabetical characters, spaces, max 40 characters only'
                           },
                         },
                   },
                   user_email: {
                     validators: {
                        notEmpty: {
                           message: 'This field is required'
                        },
                         regexp: {
                             regexp: /^(?=.{2,50}$)[^\s@]+@[^\s@]+\.[^\s@]+$/,
                             message: 'The value is not a valid email address, max 50 characters only',
                        },
                     },
                  },
                   user_role: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
                            },
                         },
                   },
                 //   password: {
                 //         validators: {
                 //            notEmpty: {
                 //               message: 'This field is required'
                 //            },
                 //         },
                 //   },
                  
                },
                plugins: {
                   trigger: new FormValidation.plugins.Trigger(),
                   bootstrap: new FormValidation.plugins.Bootstrap5()
                }
             }
       );
       $('.submit-edit-btn').click( function(e) {
             e.preventDefault();
             validation.validate().then(function(status) {
                if (status == 'Valid') {
                   submitButton.setAttribute('data-kt-indicator', 'on');
                   submitButton.disabled = true;
                   //$('#examAddModal').modal('hide');
                    $('#loading').addClass('loading');
                    $('#loading-content').addClass('loading-content');
                   var formData= new FormData(form);
                     formData.append("user_email", $('#user_email').val());
                axios.post(crudUrlTemplate.update+'?id='+id,
                        formData,{
                   }).then(function (response) {
                   if (response.data.status == 200) {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                      toastr.success(
                         "New User Edit successfully!", 
                         "New User!", 
                         {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                            history.scrollRestoration = 'manual';
                         }
                         location.href = 'user-list'; // reload page
                      }, 1500);
                      
                   } else {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                      toastr.error(
                         response.data.email,
                        $('#loading').removeClass('loading'),
                        $('#loading-content').removeClass('loading-content'), 
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
                        $('#loading').removeClass('loading'),
                        $('#loading-content').removeClass('loading-content'),
                         toastr.error(
                              "Some fields are required", 
                              "Something Require!",
                              {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                            );
                      }
                })
             });
       }
 
 // Cancel button handler
 return {
         init: function () {
             _officeAdd = $('#kt_modal_edit_user_form');
             _handleOfficeAddForm();
             submitButton = document.querySelector('#kt_edit_user_submit');
             // Handle forms
         }
     };
 }();
 // On document ready
 jQuery(document).ready(function() {
     KTAppUserEdit.init();
 });