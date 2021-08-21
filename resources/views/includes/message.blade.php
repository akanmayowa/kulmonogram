@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<script>
    @if(Session::has('success'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ Session::get('success') }}");
    @endif



    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ Session::get('info') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ Session::get('error') }}");
    @endif

    </script>

    
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            <button type="submit" class="close" data-dismiss="alert">×</button>	
          {{ session('success') }}
        </div> 
    @endif
  </div>

