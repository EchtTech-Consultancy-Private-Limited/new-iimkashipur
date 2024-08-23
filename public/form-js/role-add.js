var KTAppRoleSave = function () {
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _officeAdd;
    var _handleOfficeAddForm = function(e) {
    var validation;
    var form = document.getElementById('kt_role_add_form');
       // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
       validation = FormValidation.formValidation(
             form,
             {
                fields: {
                   role_name: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
                            },
                            regexp: {
                              regexp: /^[-+.,)@:\/&?''=""( A-Za-z0-9]{1,50}$/,
                              message: 'This field can consist of alphabetical characters, spaces, max 50 characters only'
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
       $('.submit-role-btn').click( function(e) {
             e.preventDefault();
             validation.validate().then(function(status) {
                if (status == 'Valid') {
                   submitButton.setAttribute('data-kt-indicator', 'on');
                   submitButton.disabled = true;
                   //$('#examAddModal').modal('hide');
                  //var formData= new FormData(form);
                  //formData.append("kt_description_en", $('#kt_summernote_en').summernote('code'));
                 // formData.append("kt_description_hi", $('#kt_summernote_hi').summernote('code'));
                axios.post(crudUrlTemplate.create_role,
                            new FormData(form), {
                   }).then(function (response) {
                   if (response.data.status ==200) {
                      toastr.success(
                         "New Role added successfully!", 
                         "New Role!", 
                         {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                            history.scrollRestoration = 'manual';
                         }
                         location.href = 'role-create'; // reload page
                      }, 1500);
                      
                   } else {
                      toastr.error(
                         "Sorry, the information is incorrect, please try again.", 
                         "Something went wrong!", 
                         {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      }
                   })
                   .catch(function (error) {
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
                         toastr.error(
                              "Some fields are required", 
                              "Something Require!",
                              {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                            );
                      }
                })
             });
       }
    // Select all handler
    var handleSelectAll = function (){
       // Define variables
       const selectAll = document.getElementById('kt_role_add_form').querySelector('#kt_roles_select_all');
       const allCheckboxes = document.getElementById('kt_role_add_form').querySelectorAll('[type="checkbox"]');
       // Handle check state
       selectAll.addEventListener('change', e => {
          // Apply check state to all checkboxes
          allCheckboxes.forEach(c => {
                c.checked = e.target.checked;
          });
       });
    }
 return {
         init: function () {
             handleSelectAll();
             _officeAdd = $('#kt_role_add_form');
             _handleOfficeAddForm();
             submitButton = document.querySelector('#kt_add_role_submit');
             // Handle forms
         }
     };
 }();
 
 jQuery(document).ready(function() {
    KTAppRoleSave.init();
 });