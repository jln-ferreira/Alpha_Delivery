<!-- ---------------------------------------[MODAL MUDIFY PERSONAL INFO]--------------------------------------- -->
<!-- ========================================================================================================== -->
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
            <div>Points: {{ auth()->user()->points }}</div>
            <button type="edit" class="btn btn-primary">Save changes</button>
            <a href="/Alpha_Delivery/logoutUser" style="color: white;" type="button" class="btn btn-danger">Logout</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- ========================================================================================================== -->
