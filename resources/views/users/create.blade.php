<script src="{{asset('datatable/jquery-3.5.1.js')}}"></script>
  <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('users.store') }}"  id="addUser" name="addUser" method="post">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Name:</label>
              <input type="text" id="name" required class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Email Address:</label>
                <input type="email" id="email" required class="form-control" name="email">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Role:</label>
            <select type="text" name="is_admin" required id="is_admin" class="form-control" >
             <option disabled selected>--Select Role--</option> 
             <option id="1" value="1">Admin</option>
             <option id="2" value="2">User</option>               
            </select>  
            </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Password:</label>
                <input type="password" id="password" required class="form-control" name="password">
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