$(document).ready(function(){
    function headerlogo()
    {
        alert('PO');
       $.ajax({
            type:'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:$('#websitecoresetting').serialize(),
            url: "{{ url('/websitecoresetting-store') }}",
            success: function(data) {
                if(data.success)
               {
                $('#co').html('<div class="alert alert-success" id="#co">Header Footer Logo Saved Successfully.</div>');
                $('#websitecoresetting')[0].reset();  
               }
            },
            error: function(xhr,status,data){
             $('#logo_title_error').text(response.responseJSON.errors.logo_title);
             $('#header_logo_error').text(response.responseJSON.errors.header_logo);
            },
        });
    }
    // function ListingData()
    // {
    //     $('#websiteCoreSettings_table').html('');
    //     $.ajax({
    //         type:'get',
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url: "{{ url('/websitecoresetting-show') }}",
    //         success: function(response) {
    //             if(response.success)
    //         {
    //             var websitecoresetting="";
    //             $.each(response.data,function(index,data){
    //                 data+='<tr id="row"'+data.id+'><td>'+ ++index +'</td><td>'+data.logo_title+'</td><td>'+data.header_logo+'</td><td><a href="{{ url('/websitecoresetting') }}">Edit</a></td><button class="btn btn-primary" onclick="deleteheaderlogo('+data.id+');">Delete</button></td></tr>';
    //             });
    //             $('#websiteCoreSettings_table').html('websitecoresetting');  
    //         }
    //         }
    //         error: function(xhr,status,data){
    //          $('#logo_title_error').text(response.responseJSON.errors.logo_title);
    //          $('#header_logo_error').text(response.responseJSON.errors.header_logo);
    //         },
    //     });
    // }
//     function deleteheaderlogo(id)
//     {
//         $.ajax({
//             type:'POST',
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             data:$(websitecoresetting_id:id),
//             url: "{{ url('/websitecoresetting') }}",
//             success: function(data) {
//                 if(data.success)
//             {
//                 $('#co').html('<div class="alert alert-success" id="#co">Header Footer Logo Saved Successfully.</div>');
//                 ListingData();  
//             }
//             },
//             error: function(xhr,status,data){
//             },
//         });
//     }

// $(document).on("click", "#update", function() {
//         var UserName = $(this).data('id');
//           // alert(UserName);
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//         });


//         $.ajax({
//             url: "{{ url('/Accounts/club_id_image') }}",
//             type: "get",
//             data: {
//                 id: UserName
//             },
//             success: function(data) {

//                 $('#form').attr('action', '{{ url('Accounts/edit-club-image') }}' +
//                     '/' + data.item.id)
//                 $("#imagetext").val(data.item.image_title);
//                 $("#imagealt").val(data.item.image_alt);
//                 $("#imagesort").val(data.item.sort_order);
//                 $("#imageoldid").val(data.item.cell_imges);
//                 $("#event").val(data.item.event);
//                 $('#image').html('<img src="{{ asset('uploads/multiple/club') }}/' + data.item
//                     .image + '" width="100" height="100" />')
//                 $("#imagestatus").val(data.item.status);
//             },

//         });

//     });
//  // update company

//  $('#update_company_data').on('click', function(e) {

//      e.preventDefault();
//      //alert("edit-data");
//      $.ajax({
//          url: "{{url('/websitecoresetting')}}",
//          beforeSend: function(xhr) {
//              xhr.setRequestHeader('Authorization', 'Bearer' + $.cookie('token'));
//          },
//          type: "POST",
//          data: new FormData(document.getElementById("update_company")),
//          processData: false,
//          dataType: 'json',
//          contentType: false,
//          success: function(response) {
//              $('#successMsg').show();
//              console.log(response);
//              if (response) {
//                  $(".modal").trigger('click');
//                  $("#company_added").show().html(response.success);
//                  document.getElementById("success-box").style.display = 'block';

//                  $("#update_company")[0].reset();
//                  $("#success").show().html(response.success);
//                  //$('#edit-modal-data').modal('hide');
//                  var data = new dataTable.row(index).data();
//                  data[1] = response[0].company_name;
//                  data[2] = response[0].email;
//                  data[3] = response[0].website_url;
//                  data[4] = response[0].city;
//                  data[5] = response[0].country_name;
//                  data[6] = response[0].added_name;

//                  dataTable.row(index).data(data).draw();
//               index = index + 1;
//              }
             
//          },

//          error: function(response){
//              $('#comp-error').text(response.responseJSON.errors.comp_name);
//              $('#company_type-error').text(response.responseJSON.errors.company_type);
//              $('#trading_name-error').text(response.responseJSON.errors.trading_name);
//              $('#registration_no-error').text(response.responseJSON.errors.registration_no);
//          },
//      });

//  });

 });