function deleteTodo(id) {
    let url = `/users/${id}`;
    let token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: url,
        type: 'DELETE',
        data: {
        _token: token
        },
        success: function(response) {
            $("#todo_"+id).remove();
        }
    });
}

$(document).ready(function () {
	$("#addUser").validate({
		 rules: {
				name: "required",
				email: "required",
				is_admin: "required",
                password: "required"
			},
			messages: {
			},
		 submitHandler: function(form) {
		  var form_action = $("#addUser").attr("action");
		  $.ajax({
			  data: $('#addUser').serialize(),
			  url: form_action,
			  type: "PUT",
			  dataType: 'json',
			  success: function (data) {
				  var user = '<tr id="'+data.id+'">';
				  user += '<th>' + data.id + '</th>';
				  user += '<th>' + data.first_name + '</th>';
				  user += '<th>' + data.last_name + '</th>';
				  user += '<th>' + data.address + '</th>';
				  user += '<th><a  href="{{ route("users.edit", [$user->id]) }}" class="btn btn-primary">span class="icon text-white-50"><i class="fas fa-flag"></i></span></a></th>';
                  user += '<th><a data-id="' + data.id + '" href="javascript:void(0);" onclick="deleteTodo({{ $user->id }})" class="btn btn-danger"><span class="icon text-white-50"><i class="fas fa-trash"></i></span></a></th>';
                  user += '</tr>';            
				  $('#dataTable_info tbody').prepend(user);
				  $('#addUser')[0].reset();
				  $('#addModal').modal('hide');
			  },
			  error: function (data) {
			  }
		  });
		}
	})

   



});