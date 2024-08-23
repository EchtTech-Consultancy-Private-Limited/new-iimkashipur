$(document).on('change', '.checkmime', function(e){
        e.preventDefault();
    //$('#examAddModal').modal('hide');
    var link = document.querySelector('#removeRow');
    let formdata = new FormData();
    formdata.append('file', e.target.files[0]);
   // console.log(e.target.files[0]);
    axios.post('../mimeimagecheck',formdata, {
        }).then(function (response) {
        if (response.data.status ==200) {
            toastr.success(
                "Matches file extension!", 
                "Matches file Information!", 
                {timeOut: 2, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
            );
        } else {
            link.click();
            toastr.error(
                response.data.message.file,
                "Something went wrong!", 
                {timeOut: 2, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
            );
            }
        })
        .catch(function (error) {
                toastr.error(
                "Sorry, looks like there are some errors detected, please try again.", 
                "Something went wrong!", 
                {timeOut: 2, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                );
            }).then(() => {
                // Hide loading indication
                submitButton.removeAttribute('data-kt-indicator');
                // Enable button
                submitButton.disabled = false;
            });
    
});

