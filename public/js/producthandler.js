$('#laravel_crud').DataTable();

function addPost() {
    $("#post_id").val('');
    $('#post-modal').modal('show');
}

function editPost(event) {
    var id = $(event).data("id");
    let _url = `/products/${id}`;
    $('#nameError').text('');
    $('#descriptionError').text('');
    $('#brandError').text('');
    $('#quantiyError').text('');
    $('#priceError').text('');

    $.ajax({
        url: _url,
        type: "GET",
        success: function(response) {
            if (response) {
                $("#post_id").val(response.id);
                $("#name").val(response.name);
                $("#description").val(response.description);
                $("#brand").val(response.brand);
                $("#quantity").val(response.quantity);
                $("#price").val(response.price);
                $('#post-modal').modal('show');
            }

        }
    });
}



function createPost() {
    var name = $('#name').val();
    var description = $('#description').val();
    var brand = $('#brand').val();
    var quantity = $('#quantity').val();
    var price = $('#price').val();
    var id = $('#post_id').val();
    let _url = `/products`;
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: _url,
        type: "POST",
        data: {
            id: id,
            name: name,
            description: description,
            brand: brand,
            quantity: quantity,
            price: price,
            _token: _token
        },
        success: function(response) {
            if (response.code == 200) {
                if (id != "") {
                    $("#row_" + id + " td:nth-child(2)").html(response.data.name);
                    $("#row_" + id + " td:nth-child(3)").html(response.data.description);
                    $("#row_" + id + " td:nth-child(4)").html(response.data.brand);
                    $("#row_" + id + " td:nth-child(5)").html(response.data.quantity);
                    $("#row_" + id + " td:nth-child(6)").html(response.data.price);
                } else {
                    $('#laravel_crud tbody').prepend('<tr id="row_' + response.data.id + '"><td>' + response.data.id + '</td><td>' + response.data.name + '</td><td>' + response.data.description + '</td><td>' + response.data.brand + '</td><td>' + response.data.quantity + '</td><td>' + response.data.price + '</td><td><a href="javascript:void(0)" data-id="' + response.data.id + '" onclick="editPost(event.target)" class="btn btn-sm btn-info">Edit</a></td><td><a href="javascript:void(0)" data-id="' + response.data.id + '" class="btn  btn-sm btn-danger" onclick="deletePost(event.target)">Delete</a></td></tr>');
                }
                $('#name').val('');
                $('#description').val('');
                $('#brand').val('');
                $('#quantity').val('');
                $('#price').val('');
                $('#post-modal').modal('hide');
            }
        },
        error: function(response) {
            $('#nameError').text(response.responseJSON.errors.name);
            $('#descriptionError').text(response.responseJSON.errors.description);
            $('#brandError').text(response.responseJSON.errors.brand);
            $('#quantiyError').text(response.responseJSON.errors.quantiy);
            $('#priceError').text(response.responseJSON.errors.price);
        }
    });
}

function deletePost(event) {
    var id = $(event).data("id");
    let _url = `/products/${id}`;
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: _url,
        type: 'DELETE',
        data: {
            _token: _token
        },
        success: function(response) {
            $("#row_" + id).remove();
            window.location.reload();
        }
    });
}