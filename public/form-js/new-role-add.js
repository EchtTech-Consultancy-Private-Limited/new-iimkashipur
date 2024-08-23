var KTAppRoleSave = function () {
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _officeAdd;
    var _handleOfficeAddForm = function(e) {
    var validation;
    var form = document.getElementById('kt_modal_add_role_form');
       // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
       validation = FormValidation.formValidation(
             form,
             {
                fields: {
                    role_type: {
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
                   sort_order: {
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
       $('.submit-newRole-btn').click( function(e) {
             e.preventDefault();
             validation.validate().then(function(status) {
                if (status == 'Valid') {
                   submitButton.setAttribute('data-kt-indicator', 'on');
                   submitButton.disabled = true;
                   //$('#examAddModal').modal('hide');
                    $('#loading').addClass('loading');
                    $('#loading-content').addClass('loading-content');
                axios.post(crudUrlTemplate.create,
                         new FormData(form), {
                   }).then(function (response) {
                   if (response.data.status == 200) {
                    $('#loading').removeClass('loading');
                    $('#loading-content').removeClass('loading-content');
                      toastr.success(
                         "New Role added successfully!", 
                         "New Role!", 
                         {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                            history.scrollRestoration = 'manual';
                         }
                         location.href = 'new-role-list'; // reload page
                      }, 1500);
                      
                   } else {
                    $('#loading').removeClass('loading');
                    $('#loading-content').removeClass('loading-content');
                      toastr.error(
                         response.data.email, 
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
                                    {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
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
 
 // Cancel button handler
 const cancelButton = document.getElementById('kt_modal_add_role').querySelector('[data-kt-users-modal-action="cancel"]');
     cancelButton.addEventListener('click', e => {
         e.preventDefault();
 
         Swal.fire({
             text: "Are you sure you would like to cancel?",
             icon: "warning",
             showCancelButton: true,
             buttonsStyling: false,
             confirmButtonText: "Yes, cancel it!",
             cancelButtonText: "No, return",
             customClass: {
                 confirmButton: "btn btn-primary",
                 cancelButton: "btn btn-active-light"
             }
         }).then(function (result) {
             if (result.value) {
                 document.getElementById('kt_modal_add_role_form').reset(); // Reset form			
                 $('#kt_modal_add_role').modal('hide');
                 $('#loading').removeClass('loading');
                $('#loading-content').removeClass('loading-content');
             } else if (result.dismiss === 'cancel') {
                 Swal.fire({
                     text: "Your form has not been cancelled!.",
                     icon: "error",
                     buttonsStyling: false,
                     confirmButtonText: "Ok, got it!",
                     customClass: {
                         confirmButton: "btn btn-primary",
                     }
                 });
             }
         });
     });
 
     // Close button handler
 const closeButton = document.getElementById('kt_modal_add_role').querySelector('[data-kt-users-modal-action="close"]');
     closeButton.addEventListener('click', e => {
         e.preventDefault();
 
         Swal.fire({
             text: "Are you sure you would like to cancel?",
             icon: "warning",
             showCancelButton: true,
             buttonsStyling: false,
             confirmButtonText: "Yes, cancel it!",
             cancelButtonText: "No, return",
             customClass: {
                 confirmButton: "btn btn-primary",
                 cancelButton: "btn btn-active-light"
             }
         }).then(function (result) {
             if (result.value) {
                 document.getElementById('kt_modal_add_role_form').reset(); // Reset form			
                 $('#kt_modal_add_role').modal('hide');
                 $('#loading').removeClass('loading');
                $('#loading-content').removeClass('loading-content');
             } else if (result.dismiss === 'cancel') {
                 Swal.fire({
                     text: "Your form has not been cancelled!.",
                     icon: "error",
                     buttonsStyling: false,
                     confirmButtonText: "Ok, got it!",
                     customClass: {
                         confirmButton: "btn btn-primary",
                     }
                 });
             }
         });
     });
 return {
         init: function () {
             _officeAdd = $('#kt_modal_add_role_form');
             _handleOfficeAddForm();
             submitButton = document.querySelector('#kt_add_newRole_submit');
             // Handle forms
         }
     };
 }();
 // On document ready
 jQuery(document).ready(function() {
    KTAppRoleSave.init();
 });