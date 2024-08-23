var jsonURL = $('#urlListData').attr('data-info');
var crudUrlTemplate = JSON.parse(jsonURL);
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