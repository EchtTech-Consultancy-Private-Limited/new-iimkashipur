var KTAppBannerSave = function () {
   var _officeAdd;
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _handleOfficeAddForm = function(e) {
    var validation;
    var form = document.getElementById('kt_banner_add_form');
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
                               regexp: /^[-+.,)@:\/&?''=""( A-Za-z0-9]{1,200}$/,
                               message: 'This field can consist of alphabetical characters, spaces, max 200 characters only'
                            },
                         },
                   },
                   bannertitle: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
                            },
                            regexp: {
                               regexp: /^[-+.,)@:\/&?''=""( A-Za-z0-9]{1,100}$/,
                               message: 'This field can consist of alphabetical characters, spaces, max 200 characters only'
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
                   image: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
                            },
                            regexp: {
                               regexp: /\.(gif|jpe?g|tiff?|png|webp|bmp)$/i,
                               message: 'This field can consist of jpg,png,jpeg file, image only'
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
       $('.submit-banner-btn').click( function(e) {
             e.preventDefault();
             validation.validate().then(function(status) {
                if (status == 'Valid') {
                   submitButton.setAttribute('data-kt-indicator', 'on');
                   submitButton.disabled = true;
                   //$('#examAddModal').modal('hide');
                   $('#loading').addClass('loading');
                   $('#loading-content').addClass('loading-content');
                   var formData= new FormData(form);
                   formData.append("kt_description_en", $('#kt_summernote_en').summernote('code'));
                   formData.append("kt_description_hi", $('#kt_summernote_hi').summernote('code'));
                axios.post(crudUrlTemplate.create_banner,formData, {
                        }).then(function (response) {
                   if (response.data.status ==200) {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                      toastr.success(
                         "New Banner added successfully!", 
                         "New Banner!", 
                         {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                            history.scrollRestoration = 'manual';
                         }
                         location.href = 'homebanner-create'; // reload page
                      }, 1500);
                      
                   } else {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                     console.log('Brijesh console');
                      toastr.error(
                         response.data.message.image, 
                         "Something went wrong!", 
                         {timeOut: 2, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
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
 const initFormRepeater = () => {
         $('#kt_banner_add_multiple_options').repeater({
             initEmpty: false,
             // defaultValues: {
             //     'text-input': 'foo'
             // },
             show: function () {
                 $(this).slideDown();
                 // Init select2 on new repeated items
                 initConditionsSelect2();
             },
             hide: function (deleteElement) {
                 $(this).slideUp(deleteElement);
             }
         });
     }
 return {
         init: function () {
             demos();
             initFormRepeater();
             _officeAdd = $('#kt_banner_add_form');
             _handleOfficeAddForm();
             submitButton = document.querySelector('#kt_add_banner_submit');
             // Handle forms
         }
     };
 }();
 // On document ready
 jQuery(document).ready(function() {
    KTAppBannerSave.init();
 });