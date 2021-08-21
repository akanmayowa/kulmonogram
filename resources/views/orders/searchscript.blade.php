

<script type="text/javascript">
    $('#search').on('keyup',function(e){
            e.preventDefault();
    $value=$(this).val();
    $.ajax({
    type : 'get',
    url : '{{URL::to('search')}}',
    data:{'search':$value},
    success:function(data){
    $('#table1 tbody').html(data);
    }
    });
    })
    </script>