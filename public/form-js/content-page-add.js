var KTAppBasicInformationSave = function () {
    var _officeAdd;
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _handleOfficeAddForm = function(e) {
    var validation;
    var form = document.getElementById('kt_basic_information_form');
       // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
       validation = FormValidation.formValidation(
             form,
             {
                fields: {
                  menu_id: {
                     validators: {
                        notEmpty: {
                           message: 'This field is required'
                        },
                     },
                  },
                   page_title_en: {
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
                   page_title_hi: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
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
       $('.submit-basicInfo-btn').click( function(e) {
             e.preventDefault();
             validation.validate().then(function(status) {
                if (status == 'Valid') {
                   submitButton.setAttribute('data-kt-indicator', 'on');
                   submitButton.disabled = true;
                   //$('#examAddModal').modal('hide');
                   $('#loading').addClass('loading');
                   $('#loading-content').addClass('loading-content');
                axios.post(crudUrlTemplate.create_pagemetatag,new FormData(form), {
                   }).then(function (response) {
                   if (response.data.status ==200) {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                      toastr.success(
                         "New Basic Information added successfully!", 
                         "New Basic Information!", 
                         {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                            history.scrollRestoration = 'manual';
                         }
                         location.href = 'contentpage-create'; // reload page
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
 return {
         init: function () {
             _officeAdd = $('#kt_basic_information_form');
             _handleOfficeAddForm();
             submitButton = document.querySelector('#kt_add_basicInformation_submit');
             // Handle forms
         }
     };
 }();
 var KTAppcontentpageSave = function () {
   var _officeAdd1;
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _handleOfficeAddForm1 = function(e) {
    var validation;
    var form = document.getElementById('kt_page_content_form');
       // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
       validation = FormValidation.formValidation(
             form,
             {
                fields: {
                   pageTitle_id: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
                            },
                         },
                   },
                   kt_summernote_en: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
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
 $('.submit-contentpage-btn').click( function(e) {
             e.preventDefault();
             validation.validate().then(function(status) {
                if (status == 'Valid') {
                   submitButton.setAttribute('data-kt-indicator', 'on');
                   submitButton.disabled = true;
                   //$('#examAddModal').modal('hide');
                   $('#loading').addClass('loading');
                   $('#loading-content').addClass('loading-content');
                axios.post(crudUrlTemplate.create_pagecontent,{
                         pageTitle_id: $('.pageTitle_id').val(),
                         kt_summernote_en: $('#kt_summernote_en').summernote('code'),
                         kt_summernote_hi: $('#kt_summernote_hi').summernote('code')
                   }).then(function (response) {
                   if (response.data.status ==200) {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                      toastr.success(
                         "New Page Content added successfully!", 
                         "New Page Content!", 
                         {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                             history.scrollRestoration = 'manual';
                         }
                       location.href = 'contentpage-create'; // reload page
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
             _officeAdd1 = $('#kt_page_content_form');
             _handleOfficeAddForm1();
             submitButton = document.querySelector('#kt_add_pagecontent_submit');
             // Handle forms
         }
     };
 }();
 var KTAppPageGallerySave = function () {
   var _officeAdd2;
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _handleOfficeAddForm2 = function(e) {
    var validation;
    var form = document.getElementById('kt_page_gallery_form');
       // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
       validation = FormValidation.formValidation(
             form,
             {
                fields: {
                   pageTitle_id1: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
                            },
                         },
                   },
                   imagetitle: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
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
 $('.submit-gallerypage-btn').click( function(e) {
             e.preventDefault();
             validation.validate().then(function(status) {
                if (status == 'Valid') {
                   submitButton.setAttribute('data-kt-indicator', 'on');
                   submitButton.disabled = true;
                   //$('#examAddModal').modal('hide');
                   $('#loading').addClass('loading');
                   $('#loading-content').addClass('loading-content');
                axios.post(crudUrlTemplate.create_pagegallery, new FormData(form),{
                         
                   }).then(function (response) {
                   if (response.data.status ==200) {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                      toastr.success(
                         "New Page Gallery added successfully!", 
                         "New Page Gallery!", 
                         {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                             history.scrollRestoration = 'manual';
                         }
                       location.href = 'contentpage-create'; // reload page
                      }, 1500);
                      
                   } else {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                      toastr.error(
                         response.data.message.imagetitle, 
                         response.data.message.image, 
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
 const initFormRepeater = () => {
    $('#kt_Pagegallery_add_multiple_options').repeater({
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
             initFormRepeater();
             _officeAdd2 = $('#kt_page_gallery_form');
             _handleOfficeAddForm2();
             submitButton = document.querySelector('#kt_add_pagegallery_submit');
         }
     };
 }();
 var KTAppPagePdfSave = function () {
   var _officeAdd3;
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _handleOfficeAddForm3 = function(e) {
    var validation;
    var form = document.getElementById('kt_page_pdf_form');
       // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
       validation = FormValidation.formValidation(
             form,
             {
                fields: {
                   pageTitle_id2: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
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
 $('.submit-pdfpage-btn').click( function(e) {
             e.preventDefault();
             validation.validate().then(function(status) {
                if (status == 'Valid') {
                   submitButton.setAttribute('data-kt-indicator', 'on');
                   submitButton.disabled = true;
                   //$('#examAddModal').modal('hide');
                   $('#loading').addClass('loading');
                   $('#loading-content').addClass('loading-content');
                axios.post(crudUrlTemplate.create_pagepdf,new FormData(form),{
                         
                   }).then(function (response) {
                   if (response.data.status ==200) {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                      toastr.success(
                         "New Page Pdf added successfully!", 
                         "New Page Pdf!", 
                         {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                             history.scrollRestoration = 'manual';
                         }
                       location.href = 'contentpage-create'; // reload page
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
 const initFormRepeater1 = () => {
    $('#kt_PagePdf_add_multiple_options').repeater({
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
 const initFormRepeater2 = () => {
   $('#kt_tablehead_add_multiple_options').repeater({
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
             initFormRepeater1();
             initFormRepeater2();
             _officeAdd3 = $('#kt_page_pdf_form');
             _handleOfficeAddForm3();
             submitButton = document.querySelector('#kt_add_pagepdf_submit');
         }
     };
 }();
 var KTAppPageBannerSave = function () {
   var _officeAdd4;
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _handleOfficeAddForm4 = function(e) {
    var validation;
    var form = document.getElementById('kt_page_banner_form');
       // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
       validation = FormValidation.formValidation(
             form,
             {
                fields: {
                   pageTitle_id3: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
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
 $('.submit-bannerpage-btn').click( function(e) {
             e.preventDefault();
             validation.validate().then(function(status) {
                if (status == 'Valid') {
                   submitButton.setAttribute('data-kt-indicator', 'on');
                   submitButton.disabled = true;
                   //$('#examAddModal').modal('hide');
                   $('#loading').addClass('loading');
                   $('#loading-content').addClass('loading-content');
                axios.post(crudUrlTemplate.create_pagebanner,new FormData(form),{
                         
                   }).then(function (response) {
                   if (response.data.status ==200) {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                      toastr.success(
                         "New Page Banner added successfully!", 
                         "New Page Banner!", 
                         {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                             history.scrollRestoration = 'manual';
                         }
                       location.href = 'contentpage-create'; // reload page
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
 return {
         init: function () {
             _officeAdd4 = $('#kt_page_banner_form');
             _handleOfficeAddForm4();
             submitButton = document.querySelector('#kt_add_pagebanner_submit');
         }
     };
 }();
 // On document ready
 jQuery(document).ready(function() {
    KTAppBasicInformationSave.init();
    KTAppcontentpageSave.init();
    KTAppPageGallerySave.init();
    KTAppPagePdfSave.init();
    KTAppPageBannerSave.init();
 });