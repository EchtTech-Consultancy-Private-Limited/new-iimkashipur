var KTAppfileuploadUpdate = function () {
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var id = new URLSearchParams(window.location.search).get('id');
     var _officeAdd;
     var _handleOfficeAddForm = function(e) {
     var validation;
     var form = document.getElementById('kt_fileupload_update_form');
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
                  // file_path: {
                  //       validators: {
                  //          notEmpty: {
                  //             message: 'This field is required'
                  //          },
                  //          regexp: {
                  //             regexp: /\.(gif|jpe?g|tiff?|png|webp|bmp|pdf)$/i,
                  //             message: 'This field can consist of jpg,png,jpeg, pdf file, only'
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
        $('.submit-fileupload-btn').click( function(e) {
              e.preventDefault();
              validation.validate().then(function(status) {
                 if (status == 'Valid') {
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    submitButton.disabled = true;
                    //$('#examAddModal').modal('hide');
                    $('#loading').addClass('loading');
                    $('#loading-content').addClass('loading-content');
                   var formData= new FormData(form);
                   //formData.append("kt_description_en", $('#kt_summernote_en').summernote('code'));
                   //formData.append("kt_description_hi", $('#kt_summernote_hi').summernote('code'));
                 axios.post(crudUrlTemplate.update+'?id='+id,
                             formData, {
                    }).then(function (response) {
                  if (response.data.status ==200) {
                      $('#loading').removeClass('loading');
                      $('#loading-content').removeClass('loading-content');
                       toastr.success(
                          "updated File update successfully!", 
                          "updated File!", 
                          {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                       );
                       setTimeout(function() {
                          if (history.scrollRestoration) {
                             history.scrollRestoration = 'manual';
                          }
                          location.href = 'maunalfileupload-list'; // reload page
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
        // Cancel button handler
  return {
          init: function () {
              _officeAdd = $('#kt_fileupload_update_form');
              _handleOfficeAddForm();
              submitButton = document.querySelector('#kt_update_fileupload_submit');
              // Handle forms
          }
      };
  }();
  // On document ready
  jQuery(document).ready(function() {
      KTAppfileuploadUpdate.init();
  });