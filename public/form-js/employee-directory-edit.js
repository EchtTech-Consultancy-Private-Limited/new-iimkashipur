var KTAppEmployeeDirectoryEdit = function () {
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _officeAdd;
    var id = new URLSearchParams(window.location.search).get('id');
    var _handleOfficeAddForm = function(e) {
    var validation;
    var form = document.getElementById('kt_EmployeeDirectory_edit_form');
       // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
       validation = FormValidation.formValidation(
             form,
             {
                fields: {
                  deprt_id: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
                            },
                            // regexp: {
                            //    regexp: /^[A-Za-z0-9-' ]*$/,
                            //    message: 'This field can consist of alphabetical characters, spaces, digits only'
                            // },
                         },
                  },
                  designation_id: {
                     validators: {
                        notEmpty: {
                           message: 'This field is required'
                        },
                        // regexp: {
                        //    regexp: /^[A-Za-z0-9-' ]*$/,
                        //    message: 'This field can consist of alphabetical characters, spaces, digits only'
                        // },
                     },
                  },
                  fename: {
                     validators: {
                        notEmpty: {
                           message: 'This field is required'
                        },
                        regexp: {
                           regexp: /^[A-Za-z0-9-' ]*[.,]*$/,
                           message: 'This field can consist of alphabetical characters, spaces, characters only'
                        },
                     },
                  },
                  lename: {
                     validators: {
                        notEmpty: {
                           message: 'This field is required'
                        },
                        regexp: {
                           regexp: /^[A-Za-z0-9-' ]*[.,]*$/,
                           message: 'This field can consist of alphabetical characters, spaces, digits only'
                        },
                     },
                  },
                  fhname: {
                     validators: {
                        notEmpty: {
                           message: 'This field is required'
                        },
                        // regexp: {
                        //    regexp: /^[A-Za-z0-9-' ]*$/,
                        //    message: 'This field can consist of alphabetical characters, spaces, digits only'
                        // },
                     },
                  },
                  lhname: {
                     validators: {
                        notEmpty: {
                           message: 'This field is required'
                        },
                        // regexp: {
                        //    regexp: /^[A-Za-z0-9-' ]*$/,
                        //    message: 'This field can consist of alphabetical characters, spaces, digits only'
                        // },
                     },
                  },
                  mobileno: {
                     validators: {
                        notEmpty: {
                           message: 'This field is required'
                        },
                        regexp: {
                           regexp: /^[0-9]{10}$/,
                           message: 'The value is not a valid Number'
                        },
                     },
                  },
                  landlineNo: {
                     validators: {
                        notEmpty: {
                           message: 'This field is required'
                        },
                        regexp: {
                           regexp: /^[0-9][\d|\.|\,|\-|\ ]{10,15}$/,
                           message: 'The value is require minimum 10 and maximum 15 Number'
                        },
                     },
                  },
                  extentionNo: {
                     validators: {
                        notEmpty: {
                           message: 'This field is required'
                        },
                        regexp: {
                           regexp: /^[A-Za-z0-9-'][\d|\.|\,|\-|\:|\(|\)|\ ]{2,25}$/,
                           message: 'The value is require minimum 2 and maximum 25 Number'
                        },
                     },
                  },
                  short_order: {
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
                  email: {
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
                },
                plugins: {
                   trigger: new FormValidation.plugins.Trigger(),
                   bootstrap: new FormValidation.plugins.Bootstrap5()
                }
             }
       );
       $('.submit-EmployeeDirectoryedit-btn').click( function(e) {
             e.preventDefault();
             validation.validate().then(function(status) {
                if (status == 'Valid') {
                  submitButton.setAttribute('data-kt-indicator', 'on');
                  submitButton.disabled = true;
                  $('#loading').addClass('loading');
                  $('#loading-content').addClass('loading-content');
                  var formData= new FormData(form);
                  formData.append("description_e", $('#kt_summernote_en').summernote('code'));
                  formData.append("description_h", $('#kt_summernote_hi').summernote('code'));
                axios.post(crudUrlTemplate.update+'?id='+id,
                           formData, {
                   }).then(function (response) {
                   if (response.data.status ==200) {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                      toastr.success(
                         "New update successfully!", 
                         "New Entry!", 
                         {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                            history.scrollRestoration = 'manual';
                         }
                        location.href = 'employeedirectory-list'; // reload page
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
                               {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                            );
                      }
                })
             });
       }
var demos = function () {
   $('.summernote').summernote({
      placeholder: 'Description...',
      height: 200,
      tabsize: 2
   });
}
 return {
         init: function () {
            demos();
             _officeAdd = $('#kt_EmployeeDirectory_edit_form');
             _handleOfficeAddForm();
             submitButton = document.querySelector('#kt_edit_EmployeeDirectory_submit');
             // Handle forms
         }
     };
 }();
 
 jQuery(document).ready(function() {
    KTAppEmployeeDirectoryEdit.init();
 });