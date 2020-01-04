// global the manage memeber table 
var manageMemberTable;

$(document).ready(function() {
	manageMemberTable = $("#manageMemberTable").DataTable({
		"ajax": "php_action/retrieve.php",
		"order":[],
		
	});


	$("#addMemberModalBtn").on('click', function() {
		// reset the form 
		$("#createMemberForm")[0].reset();
		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".messages").html("");

		// submit form
		$("#createMemberForm").unbind('submit').bind('submit', function() {

			$(".text-danger").remove();

			var form = $(this);

			// validation
			var level = $("#level").val();
			var room = $("#room").val();
			var type = $("#type").val();
			var description = $("#description").val();
			var capacity = $("#capacity").val();

			if(level == "") {
				$("#level").closest('.form-group').addClass('has-error');
				$("#level").after('<p class="text-danger">The Name field is required</p>');
			} else {
				$("#level").closest('.form-group').removeClass('has-error');
				$("#level").closest('.form-group').addClass('has-success');				
			}

			if(room == "") {
				$("#room").closest('.form-group').addClass('has-error');
				$("#room").after('<p class="text-danger">The Address field is required</p>');
			} else {
				$("#room").closest('.form-group').removeClass('has-error');
				$("#room").closest('.form-group').addClass('has-success');				
			}

			if(type == "") {
				$("#type").closest('.form-group').addClass('has-error');
				$("#type").after('<p class="text-danger">The Contact field is required</p>');
			} else {
				$("#type").closest('.form-group').removeClass('has-error');
				$("#type").closest('.form-group').addClass('has-success');				
			}

			if(capacity == "") {
				$("#capacity").closest('.form-group').addClass('has-error');
				$("#capacity").after('<p class="text-danger">The Active field is required</p>');
			} else {
				$("#capacity").closest('.form-group').removeClass('has-error');
				$("#capacity").closest('.form-group').addClass('has-success');				
			}

			if(description == "") {
				$("#description").closest('.form-group').addClass('has-error');
				$("#description").after('<p class="text-danger">The Active field is required</p>');
			} else {
				$("#description").closest('.form-group').removeClass('has-error');
				$("#description").closest('.form-group').addClass('has-success');				
			}

			if(level && room && type && capacity && description) {
				//submi the form to server
				$.ajax({
					url : form.attr('action'),
					type : form.attr('method'),
					data : form.serialize(),
					dataType : 'json',
					success:function(response) {

						// remove the error 
						$(".form-group").removeClass('has-error').removeClass('has-success');

						if(response.success == true) {
							$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

							// reset the form
							$("#createMemberForm")[0].reset();		

							// reload the datatables
							manageMemberTable.ajax.reload(null, false);
							// this function is built in function of datatables;

						} else {
							$(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
						}  // /else
					} // success  
				}); // ajax subit 				
			} /// if


			return false;
		}); // /submit form for create member
	}); // /add modal

});

function removeMember(id = null) {
	if(id) {
		// click on remove button
		$("#removeBtn").unbind('click').bind('click', function() {
			$.ajax({
				url: 'php_action/remove.php',
				type: 'post',
				data: {member_id : id},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {						
						$(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

						// refresh the table
						manageMemberTable.ajax.reload(null, false);

						// close the modal
						$("#removeMemberModal").modal('hide');

					} else {
						$(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
					}
				}
			});
		}); // click remove btn
	} else {
		alert('Error: Refresh the page again');
	}
}

function editMember(id = null) {
	if(id) {

		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".edit-messages").html("");

		// remove the id
		$("#member_id").remove();

		// fetch the member data
		$.ajax({
			url: 'php_action/getSelectedMember.php',
			type: 'post',
			data: {member_id : id},
			dataType: 'json',
			success:function(response) {
				$("#editLevel").val(response.level);

				$("#editRoom").val(response.room);

				$("#editType").val(response.type);

				$("#editCapacity").val(response.capacity);

				$("#editDescription").val(response.description);	

				// mmeber id 
				$(".editMemberModal").append('<input type="hidden" name="member_id" id="member_id" value="'+response.id+'"/>');

				// here update the member data
				$("#updateMemberForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var editLevel = $("#editLevel").val();
					var editRoom = $("#editRoom").val();
					var editType = $("#editType").val();
					var editCapacity = $("#editCapacity").val();
					var editDescription = $("#editDescription").val();

					if(editLevel == "") {
						$("#editLevel").closest('.form-group').addClass('has-error');
						$("#editLevel").after('<p class="text-danger">The Name field is required</p>');
					} else {
						$("#editLevel").closest('.form-group').removeClass('has-error');
						$("#editLevel").closest('.form-group').addClass('has-success');				
					}

					if(editRoom == "") {
						$("#editRoom").closest('.form-group').addClass('has-error');
						$("#editRoom").after('<p class="text-danger">The Address field is required</p>');
					} else {
						$("#editRoom").closest('.form-group').removeClass('has-error');
						$("#editRoom").closest('.form-group').addClass('has-success');				
					}

					if(editType == "") {
						$("#editType").closest('.form-group').addClass('has-error');
						$("#editType").after('<p class="text-danger">The Contact field is required</p>');
					} else {
						$("#editType").closest('.form-group').removeClass('has-error');
						$("#editType").closest('.form-group').addClass('has-success');				
					}

					if(editCapacity == "") {
						$("#editCapacity").closest('.form-group').addClass('has-error');
						$("#editCapacity").after('<p class="text-danger">The Active field is required</p>');
					} else {
						$("#editCapacity").closest('.form-group').removeClass('has-error');
						$("#editCapacity").closest('.form-group').addClass('has-success');				
					}
					if(editDescription == "") {
						$("#editDescription").closest('.form-group').addClass('has-error');
						$("#editDescription").after('<p class="text-danger">The Active field is required</p>');
					} else {
						$("#editDescription").closest('.form-group').removeClass('has-error');
						$("#editDescription").closest('.form-group').addClass('has-success');				
					}

					if(editLevel && editRoom && editType && editCapacity && editDescription) {
						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								if(response.success == true) {
									$(".edit-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
									'</div>');

									// reload the datatables
									manageMemberTable.ajax.reload(null, false);
									// this function is built in function of datatables;

									// remove the error 
									$(".form-group").removeClass('has-success').removeClass('has-error');
									$(".text-danger").remove();
								} else {
									$(".edit-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
									'</div>')
								}
							} // /success
						}); // /ajax
					} // /if

					return false;
				});

			} // /success
		}); // /fetch selected member info

	} else {
		alert("Error : Refresh the page again");
	}
}