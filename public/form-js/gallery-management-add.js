var KTAppPhotoSave = function () {
   var _officeAdd;
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _handleOfficeAddForm = function(e) {
    var validation;
    var form = document.getElementById('kt_photo_information_form');
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
                               regexp: /^[-+.,)@:\/&?''=""( A-Za-z0-9]{1,300}$/,
                               message: 'This field can consist of alphabetical characters, spaces, max 300 characters only'
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
       $('.submit-photo-btn').click( function(e) {
             e.preventDefault();
             validation.validate().then(function(status) {
                if (status == 'Valid') {
                   submitButton.setAttribute('data-kt-indicator', 'on');
                   submitButton.disabled = true;
                   //$('#examAddModal').modal('hide');
                   $('#loading').addClass('loading');
                   $('#loading-content').addClass('loading-content');
                   var formData= new FormData(form);
                  formData.append("type", '0');
                axios.post(crudUrlTemplate.create_photo,formData, {
                   }).then(function (response) {
                  if (response.data.status ==200) {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                      toastr.success(
                         "New Photo added successfully!", 
                         "New Photo Information!", 
                         {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                            history.scrollRestoration = 'manual';
                         }
                         location.href = 'gallerymanagement-create'; // reload page
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
 const initFormRepeater1 = () => {
    $('#kt_photo_add_multiple_options').repeater({
       initEmpty: false,
       // defaultValues: {
       //     'text-input': 'foo'
       // },
       show: function () {
             $(this).slideDown();
             // Init select2 on new repeated items
             //initConditionsSelect2();
       },
       hide: function (deleteElement) {
             $(this).slideUp(deleteElement);
       }
    });
 }
 return {
         init: function () {
             initFormRepeater1();
             _officeAdd = $('#kt_photo_information_form');
             _handleOfficeAddForm();
             submitButton = document.querySelector('#kt_add_photo_submit');
             // Handle forms
         }
     };
 }();
 
 var KTAppVideoSave = function () {
    var _officeAdd1;
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _handleOfficeAddForm1 = function(e) {
    var validation;
    var form = document.getElementById('kt_video_information_form');
       // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
       validation = FormValidation.formValidation(
             form,
             {
                fields: {
                    title_name_en1: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
                            },
                            regexp: {
                              regexp: /^[-+.,)@:\/&?''=""( A-Za-z0-9]{1,300}$/,
                              message: 'This field can consist of alphabetical characters, spaces, max 300 characters only'
                           },
                         },
                   },
               //     Video: {
               //       validators: {
               //          notEmpty: {
               //             message: 'This field is required'
               //          },
               //          regexp: {
               //             regexp: /^(http|https):\/\//,
               //             message: 'This field can consist of http or https url only'
               //          },
               //       },
               // },
                   // page_title_hi: {
                   //       validators: {
                   //          notEmpty: {
                   //             message: 'This field is required'
                   //          },
                   //       },
                   // },
                },
                plugins: {
                   trigger: new FormValidation.plugins.Trigger(),
                   bootstrap: new FormValidation.plugins.Bootstrap5()
                }
             }
       );
       $('.submit-video-btn').click( function(e) {
             e.preventDefault();
             validation.validate().then(function(status) {
                if (status == 'Valid') {
                   submitButton.setAttribute('data-kt-indicator', 'on');
                   submitButton.disabled = true;
                   //$('#examAddModal').modal('hide');
                   var formData= new FormData(form);
                  formData.append("type", '1');
                axios.post(crudUrlTemplate.create_video,formData, {
                   }).then(function (response) {
                  if (response.data.status ==200) {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                      toastr.success(
                         "New Video added successfully!", 
                         "New Video Information!", 
                         {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                            history.scrollRestoration = 'manual';
                         }
                         location.href = 'gallerymanagement-create'; // reload page
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
 const initFormRepeater2 = () => {
    $('#kt_video_add_multiple_options').repeater({
       initEmpty: false,
       // defaultValues: {
       //     'text-input': 'foo'
       // },
       show: function () {
             $(this).slideDown();
             // Init select2 on new repeated items
            // initConditionsSelect2();
       },
       hide: function (deleteElement) {
             $(this).slideUp(deleteElement);
       }
    });
 }
 return {
         init: function () {
             initFormRepeater2();
             _officeAdd1 = $('#kt_video_information_form');
             _handleOfficeAddForm1();
             submitButton = document.querySelector('#kt_add_video_submit');
             // Handle forms
         }
     };
 }();
 
 // On document ready
 jQuery(document).ready(function() {
    KTAppPhotoSave.init();
    KTAppVideoSave.init();
 });