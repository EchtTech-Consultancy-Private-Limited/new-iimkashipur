jQuery(function($) {
    $(document.getElementById('fb-editor')).formBuilder({
        onSave: function(evt, formData) {
            saveForm(formData);
        },
    });
});
var jsonURL = $('#urlListData').attr('data-info');
var crudUrlTemplate = JSON.parse(jsonURL);
function saveForm(form) {
    $.ajax({
        type: 'post',
        headers: {
            'Authorization': 'Bearer ' + $("meta[name='csrf-token']").attr("content")
        },
        url: crudUrlTemplate.create,
        data: {
            'content': form,
            'form_name': $("#form_name").val(),
            "_token": $("meta[name='csrf-token']").attr("content"),
        },
        success: function(data) {
            if(data.status ==200){
                toastr.success(
                    "New Form added successfully!", 
                    "New Form!", 
                    {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                 );
                 setTimeout(function() {
                    if (history.scrollRestoration) {
                       history.scrollRestoration = 'manual';
                    }
                    location.href = 'formbuilder-create'; // reload page
                 }, 1500);
                }else{
                    // if(data.message.form_name[0] !=''){
                    //     var message= data.message.form_name[0];
                    // }else{
                    //     var message= data.message;
                    // }
                    toastr.error(
                        data.message, 
                        "Something went wrong!", 
                        {timeOut: 1, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                    );
                    
                }
                
            //location.href = "formbuilder-create";
            //console.log(data);
        }
    });
}

var id = new URLSearchParams(window.location.search).get('id');
$(function() {
    $.ajax({
        type: 'get',
        headers: {
            'Authorization': 'Bearer ' + $("meta[name='csrf-token']").attr("content")
        },
        url: crudUrlTemplate.show,
        data: {
            'id': id
        },
        success: function(data) {
           // console.log(data.uid)
            $("#form_id").val(data.uid);
            $('#fb-reader').formRender({
                formData: data.content
            });
        }
    });
});