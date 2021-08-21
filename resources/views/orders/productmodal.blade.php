   
  <div id="addProductModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('storeproduct') }}"  id="addUser" name="addUser" method="post">
            @csrf
            <div class="form-group">
              <label class="col-form-label">Name</label>
              <input type="text" id="name" required class="form-control" name="name">
            </div>
            <div class="form-group">
              <label class="col-form-label">Description</label>
              <input type="text" id="description" required class="form-control" name="description">
            </div>
            <div class="form-group">
              <label class="col-form-label">Services</label>            
              <select type="text" class="form-control" id="brand" name="brand" >
              <option disabled selected>--Please Select a Service--</option>
              @foreach($service as $services)
                    <option name="{{$services->service_name}}"> {{$services->service_name}}</option>
                    @endforeach
              </select>
            
            </div>
            <div class="form-group">
                <label  class="col-form-label">Quantity</label>
                        <input type="number" id="quantity" required class="form-control" name="quantity">
              </div>
            <div class="form-group">
                <label  class="col-form-label">Price</label>
                <input type="number" id="price" required class="form-control" name="price">
              </div>
              <div class="form-group">
                <label  class="col-form-label">Alert Stock</label>
                <input type="number" id="alert_stock"  class="form-control" name="alert_stock">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
     </form>
      </div>
    </div>
  </div>
