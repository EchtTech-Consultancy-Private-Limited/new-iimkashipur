var KTAppFileUploadSave = function () {

    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _officeAdd;
    var _handleOfficeAddForm = function(e) {
    var validation;
    var form = document.getElementById('kt_fileupload_add_form');
       // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
       validation = FormValidation.formValidation(
             form,
             {
                fields: {
                    title_name: {
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
                   file_path: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
                            },
                            regexp: {
                               regexp: /\.(gif|jpe?g|tiff?|png|webp|bmp|pdf)$/i,
                               message: 'This field can consist of jpg,png,jpeg, pdf file, only'
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
       $('.submit-fileupload-btn').click( function(e) {
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
                   if (response.data.status ==200) {
                    $('#loading').removeClass('loading');
                    $('#loading-content').removeClass('loading-content');
                      toastr.success(
                         "New File added successfully!", 
                         "New File!", 
                         {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                            history.scrollRestoration = 'manual';
                         }
                         location.href = 'maunalfileupload-list'; // reload page
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
       // Cancel button handler
    const cancelButton = document.getElementById('kt_modal_add_fileupload').querySelector('[data-kt-users-modal-action="cancel"]');
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
                document.getElementById('kt_fileupload_add_form').reset(); // Reset form			
                $('#kt_modal_add_fileupload').modal('hide');
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
    const closeButton = document.getElementById('kt_modal_add_fileupload').querySelector('[data-kt-users-modal-action="close"]');
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
                document.getElementById('kt_fileupload_add_form').reset(); // Reset form			
                $('#kt_modal_add_fileupload').modal('hide');
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
             _officeAdd = $('#kt_fileupload_add_form');
             _handleOfficeAddForm();
             submitButton = document.querySelector('#kt_add_fileupload_submit');
             // Handle forms
         }
     };
 }();
 // On document ready
 jQuery(document).ready(function() {
     KTAppFileUploadSave.init();
 });