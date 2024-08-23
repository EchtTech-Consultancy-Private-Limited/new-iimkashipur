var KTApppgcsSave = function () {
   var jsonURL = $('#urlListData').attr('data-info');
   var crudUrlTemplate = JSON.parse(jsonURL);
   var id = new URLSearchParams(window.location.search).get('id');
    var _officeAdd;
    var _handleOfficeAddForm = function(e) {
    var validation;
    var form = document.getElementById('kt_pgcs_update_form');
       // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
       validation = FormValidation.formValidation(
             form,
             {
                fields: {
                  title_name_en: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
                            },
                            regexp: {
                              regexp: /^[-+.,)@:\/&?''=""( A-Za-z0-9]{1,400}$/,
                              message: 'This field can consist of alphabetical characters, spaces, max 400 characters only'
                           },
                         },
                   },
                   logo_url: {
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
                 //   image: {
                 //         validators: {
                 //            notEmpty: {
                 //               message: 'This field is required'
                 //            },
                 //            // regexp: {
                 //            //    regexp: /\.(gif|jpe?g|tiff?|png|webp|bmp)$/i,
                 //            //    message: 'This field can consist of jpg,png,jpeg file, spaces, digits only'
                 //            // },
                 //         },
                 //   },
                },
                plugins: {
                   trigger: new FormValidation.plugins.Trigger(),
                   bootstrap: new FormValidation.plugins.Bootstrap5()
                }
             }
       );
       $('.submit-pgcs-btn').click( function(e) {
             e.preventDefault();
             validation.validate().then(function(status) {
                if (status == 'Valid') {
                   submitButton.setAttribute('data-kt-indicator', 'on');
                   submitButton.disabled = true;
                   //$('#examAddModal').modal('hide');
                   $('#loading').addClass('loading');
                   $('#loading-content').addClass('loading-content');
                   var formData= new FormData(form);
                  //  formData.append("kt_description_en", $('#kt_summernote_en').summernote('code'));
                  //  formData.append("kt_description_hi", $('#kt_summernote_hi').summernote('code'));
                axios.post(crudUrlTemplate.update+'?id='+id,formData, {
                   }).then(function (response) {
                  if(response.data.status ==200) {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                      toastr.success(
                         "Update Logo Update successfully!", 
                         "Update Logo!", 
                         {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                            history.scrollRestoration = 'manual';
                         }
                         location.href = 'pgcs-list'; // reload page
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
         init: function () {
             
             _officeAdd = $('#kt_pgcs_update_form');
             _handleOfficeAddForm();
             submitButton = document.querySelector('#kt_update_pgcs_submit');
             // Handle forms
         }
     };
 }();
 // On document ready
 jQuery(document).ready(function() {
    KTApppgcsSave.init();
 });