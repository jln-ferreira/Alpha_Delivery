<!------- [MODAL] ------->
<div class="modal fade" id="addCardModel" tabindex="-1" role="dialog" aria-labelledby="addCardModel_Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header" style=" background-color: #DC143C;">
            <h5 class="modal-title" id="personalInfo_Label" style=" color: white;">New Card:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" color: white;">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        
      <!------------------------------ INSIDE MODAL ----------------------------->
        <form method="POST" action="{{ route('add_newCard') }}">
        @csrf
          <!-- name card -->
          <div class="form-group">
            <label for="nameNewCard">Name for your Card:</label>
            <input type="text" class="form-control" id="nameNewCard" name="nameNewCard" required>
          </div>
          <!-- TIPS -->
          <label for="tips">Offering Tips?</label>
          <select name="tips" id="tipsYN">
            <option value="No" selected>No</option>
            <option value="Yes">Yes</option>
          </select>
          <div id="divValueTips" style="display: none; padding-left: 30px;">
            <label for="valueTips">Value: </label>
            <input type="number" class="form-control" id="valueTips" name="valueTips" max="100" min="1" value="1" style="width: 50%; display: inline-block;">
          </div>
        
          <!-- DEADLINE -->
          <div class="form-group">
          <label for="deadline">Expiration date:</label>
          <input type="date" class="form-control" id="deadline" name="deadline" min="{{date('Y-m-d')}}" max="{{date('Y-m-d', strtotime(' + 30 days'))}}">
          </div>

          <button class="modal-footer"  style="justify-content: center;background-color: transparent;border: 0;margin: 0 auto;">
            <div>
              <div class="buttonSaveCard">
                <div class="iconSave">
                  <i class="fa fa-floppy-o"></i>
                </div>
              </div>
            </div>
          </button>
        </form>
        </div>
      </div>
  </div>
</div>
<!-- ========================================================================================================== -->