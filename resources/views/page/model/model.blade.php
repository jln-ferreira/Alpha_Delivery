<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#personalInfo_Modal">
  {{ auth()->user()->name }}
</button>

<!-- Modal -->
<div class="modal fade" id="personalInfo_Modal" tabindex="-1" role="dialog" aria-labelledby="personalInfo_Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="personalInfo_Label">Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <!------------------------------ INSIDE MODAL ----------------------------->
        <form method="POST" action="editUser">
          {{ method_field('PATCH') }} <!-- UPDATE -->
          @csrf
          <!-- PERSONAL INFORMATION -->
          <div class="form-group">
            <label for="name">Full name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
          </div>
          <div class="form-group">
            <label for="phoneNumber">Phone Number:</label>
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="{{ auth()->user()->phoneNumber }}" required>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
          </div>
          <!-- ADDRESS -->
          <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ auth()->user()->addresses->address }}">
          </div>
          <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" class="form-control" id="country" name="country" value="{{ auth()->user()->addresses->country }}">
          </div>
          <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ auth()->user()->addresses->city }}">
          </div>
          <div class="form-group">
            <label for="zipCode">Zip Code:</label>
            <input type="text" class="form-control" id="zipCode" name="zipCode" value="{{ auth()->user()->addresses->zipCode }}">
          </div>

          <div class="modal-footer">
            <button type="edit" class="btn btn-primary">Save changes</button>
            <a href="logoutUser" style="color: white;" type="button" class="btn btn-danger">Logout</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>






<!-- Modal -->
<!--           <div class="modal fade" id="newItens_Modal" tabindex="-1" role="dialog" aria-labelledby="newItens_Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="newItens_Label">Itens</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body"> -->
                  <!------------------------------ INSIDE MODAL ----------------------------->
<!--                   <table id="myItens_DT" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Card Id</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Comments</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="text" class="form-control" name="card_id"></td>
                    <td><input type="text" class="form-control" name="name" required></td>
                    <td><input type="number" class="form-control" name="quantity" min="1" required></td>
                    <td><input type="text" class="form-control" name="comment"></td>
                    <td style="text-align-last: center;"> 
                      <i class="pen_FW fa fa-pencil fa-xs" title="Edit"></i>
                      <i class="trash_FW fa fa-trash fa-xs" title="Delete"></i>
                    </td>
                  </tr>
                </tbody>
              </table>
                </div>
              </div>
            </div>
          </div> -->