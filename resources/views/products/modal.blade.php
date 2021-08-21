<div class="modal fade" id="post-modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header"  >
            <h5 class="modal-title"  id="exampleModalLongTitle">Add/Edit Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    <div class="modal-body">

              <form name="userForm" >
                 <input type="hidden" name="post_id" id="post_id">
                  <div class="form-group">
                      <label for="name" class="col-sm-2">name</label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" id="name" name="name" >
                          <span id="nameError" class="alert-message"></span>
                      </div>
                  </div>
  
                  <div class="form-group">
                      <label class="col-sm-2">Description</label>
                      <div class="col-sm-12">
                          <textarea class="form-control" id="description" name="description" rows="2" cols="3"></textarea>
                          <span id="descriptionError" class="alert-message"></span>
                      </div>
                  </div>
                 

                  <div class="form-group">
                    <label for="name" class="col-sm-2">Service</label>
                    <div class="container">
                        @if(session('warning'))
                            <div class="alert alert-danger">
                                <button type="submit" class="close" data-dismiss="alert">×</button>	
                              {{ session('warning') }}
                            </div> 
                        @endif
                      </div>
                   
                      <div class="col-sm-12">
                      <select  type="text" class="form-control" id="brand" name="brand" >
                      <option disabled selected>--Please Select a Service--</option>
                      @forelse($service as $services)
                            <option name="{{$services->service_name}}"> {{$services->service_name}}</option>
                            @empty
                            <option  selected disabled>
                                Create Services First!
                                {{Session::flash('warning', 'Create Services First Before Adding Items!')}}
                                
                           </option>
                              @endforelse
                      </select>
                        <span id="brandError" class="alert-message"></span>
                    </div>
                </div>


                <div class="form-group">
                    <label for="name" class="col-sm-2">Quantity</label>
                    <div class="col-sm-12">
                        <input  type="number" class="form-control" id="quantity" name="quantity" >
                        <span id="quantiyError" class="alert-message"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-2">Price</label>
                    <div class="col-sm-12">
                        <input  type="number" class="form-control" id="price" name="price" >
                        <span id="priceError" class="alert-message"></span>
                    </div>
                </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="createPost()">Save</button>
          </div>
      </div>
    </div>
  </div>
  <script>
    $(function(){           
        if (!Modernizr.inputtypes.date) {
            $('input[type=date]').datepicker({
                  dateFormat : 'dd/mm/yyyy'
                }
             );
        }
    });
</script>