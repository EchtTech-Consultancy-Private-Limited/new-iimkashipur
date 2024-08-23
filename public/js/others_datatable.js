"use strict";
var KTDatatablesBasicPaginations = function() {
	var initTable1 = function() {
		var table = $('#kt_datatable_contact_us');
		var jsonURL = $('#urlListData').attr('data-info');
		var crudUrlTemplate = JSON.parse(jsonURL);
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
		// begin first table
		var tableObject = table.DataTable({
			//order: [[1, 'asc']],
			responsive: true,
			pagingType: 'full_numbers',
			searchDelay: 500,
			processing: true,
			pageLength: 10,
			ajax: {
				"url": crudUrlTemplate.list,
				"type": "GET",
				"data": {
					"_token": csrfToken
				}
			},
			columns: [
				{ "data": "id" },
				{ "data": "name" },
				{ "data": "email" },
				{ "data": "phone" },
				{ "data": "action" }
			],
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					searchable: false,
					responsivePriority: -1,
					render: function(data, type, full, meta) {
						// create these links only if corresponding URL is present
						var viewLinkHtml = '';
						var editLinkHtml = '';
						var deleteLinkHtml = '';
						var dropdownHtml = '';

						if (crudUrlTemplate.view !== undefined) {
							viewLinkHtml = '<a href="' + crudUrlTemplate.view.replace("xxxx", full.uid) + 
							'" class="btn btn-sm btn-clean btn-icon mr-2 track-click" data-track-name="datatable-js-employee-view-btn" title="View">\
							<span class="svg-icon svg-icon-md">\
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z"/></svg>\
							</span>\
							</a>';
						}

						if (crudUrlTemplate.edit !== undefined) {
							editLinkHtml = '<a href="'+ crudUrlTemplate.edit.replace("xxxx", full.uid) +'" class="btn btn-sm btn-clean btn-icon mr-2 track-click"\
							data-track-name="datatable-js-employee-edit-btn" title="Edit">\
								<span class="svg-icon svg-icon-md">\
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
											<rect x="0" y="0" width="24" height="24"/>\
											<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
											<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
										</g>\
									</svg>\
								</span>\
							</a>';
						}

						if (crudUrlTemplate.delete !== undefined) {
							deleteLinkHtml = '<a href="'+ crudUrlTemplate.delete.replace("xxxx", full.uid) +'" class="btn btn-sm btn-clean btn-icon delete-single-record track-click"\
							data-track-name="datatable-js-employee-delete-btn" title="Delete">\
								<span class="svg-icon svg-icon-md">\
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
											<rect x="0" y="0" width="24" height="24"/>\
											<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
											<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
										</g>\
									</svg>\
								</span>\
							</a>';
                        }
                        
                        dropdownHtml = '' +
                            viewLinkHtml + ' &nbsp;'+
                            editLinkHtml + '&nbsp;'+
                            deleteLinkHtml + '&nbsp;';
				
						return dropdownHtml;
					},
				},
			],

			"drawCallback": function (settings) {

				// bind delete link to click event
				$(".delete-single-record").click(function (event) {
					event.preventDefault();
					var deleteUrl = $(this).attr('href');
					var rowId = $(this).data('rowid');
					
					swal.fire({
						title: 'Are you sure?',
						text: "You won't be able to revert this!",
						type: 'success',
						showCancelButton: true,
						confirmButtonText: 'Yes, delete it!'
					}).then(function (result) {
						if (result.value) {
							axios.delete(deleteUrl)
							.then(function (response) {
								// remove record row from DOM
								tableObject
									.row(rowId)
									.remove()
									.draw();
								toastr.success(
									"Record has been deleted!", 
									"deleted!", 
									{timeOut: 0,showProgressbar: true, extendedTimeOut: 0,allow_dismiss: false, closeButton: true, closeDuration: 0}
								 );
								 setTimeout(function() {
									if (history.scrollRestoration) {
									   history.scrollRestoration = 'manual';
									}
									location.href = 'menu-list'; // reload page
								 }, 1500);

							})
							.catch(function (error) {
								var errorMsg = 'Could not delete record. Try later.';
								
								if (error.response.status >= 400 && error.response.status <= 499)
									errorMsg = error.response.data.message;

								swal.fire(
									'Error!',
									errorMsg,
									'error'
								)
							});     
						}
					});
				});
            }
		});
	};
	return {
		//main function to initiate the module
		init: function() {
			initTable1();
		},
	};
}();
jQuery(document).ready(function() {
	KTDatatablesBasicPaginations.init();
	// errors in table will be logged in console
	$.fn.dataTable.ext.errMode = 'throw'; 
});
