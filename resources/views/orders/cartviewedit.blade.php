<link href="{{asset('css/invoice.css')}}">
<script src="{{asset('js/poppercart.min.js')}}"></script>
<script src="{{asset('js/jquerycart.min.js')}}"></script>
<div style="margin-top:35px;" class="container">
    <div class="row" align="right" >
        <div class="col-lg-12 col-sm-12 col-12 main-section">
          <div class="dropdown">
                <span type="button" class="btn btn-info" >
                    <i class="fa fa-shopping-cart " aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </span>
</div>
</div>
</div>
</div>