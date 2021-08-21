
    <script>
        $(".update-cart").change(function(e) {
          e.preventDefault();
          var ele = $(this);
          $.ajax({
              url: '{{ route('update.cart') }}',
              method: "patch",
              data: {
                  _token: '{{ csrf_token() }}',
                  id: ele.parents("tr").attr("data-id"),
                  quantity: ele.parents("tr").find(".quantity").val(),
                  price: ele.parents("tr").find(".price").val()
              },
              success: function(response) {
                  window.location.reload();
              }
          });
      });
    
    
      $(".remove-from-cart").click(function (e) {
            e.preventDefault();
      
            var ele = $(this);
      
            if(confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    
          </script>