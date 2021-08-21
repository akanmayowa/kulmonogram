   
  <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('storecustomer') }}"  id="addUser" name="addUser" method="post">
            @csrf
            <div class="form-group">
              <label class="col-form-label">Name</label>
              <input type="text" id="name" required class="form-control" name="name">
            </div>
            <div class="form-group">
                <label  class="col-form-label">Phone</label>
                <input type="number" id="phone" required class="form-control" name="phone">
              </div>
            <div class="form-group">
                <label  class="col-form-label">Address</label>
                <textarea type="text" id="address" required class="form-control" name="address"></textarea>
              </div>
              <div class="form-group">
                <label  class="col-form-label">Date of Birth</label>
                <input type="date" id="dob"  class="form-control" name="dob">
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
