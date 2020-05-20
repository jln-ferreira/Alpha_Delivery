
<!-- ----------------------------------MODAL TO ADD ITEMS ------------------------------------>
<div class="modal fade" id="addItensModal" tabindex="-1" role="dialog" aria-labelledby="addItensModal_Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header" style=" background-color: #0069d9;">
            <h5 class="modal-title" id="personalInfo_Label" style=" color: white;">New Item:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" color: white;">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <!------------------------------ INSIDE MODAL ----------------------------->
        <form method="POST" action="../add_newItem">
        @csrf
          <div class="container">
                <div class="row">
                  <div class="form-group col-lg-10 ">
                    <input type="hidden" name="card_id" value="{{$card_id->id}}" style="background-color: transparent; border: hidden; color: white; font-size: x-large; font-weight: bold;">
                    <input type="text" class="form-control fill_newitem"  name="nameNewItem" placeholder="Item Name" required autocomplete="off">
              </div>
              <a class="btn btn-info" style="height: 40px;width: 67px;"><i class="fa fa-bars" style="color: white;"></i></a>
                </div>
                <div class="row">
                  <div class="form-group col-lg-3">
                    <label for="quantityItem">Quantity</label>
                <input type="number" class="form-control" id="quantityItem" name="quantityItem" min="1" value="1" required>
              </div>
              <div class="form-group col-lg-4">
                    <label for="quantityItem">Average price</label>
                <input type="number" class="form-control" id="avgPrice" name="avgValue">
              </div>
              <div class="form-group col-lg-5">
                <label for="quantityItem">Final price</label>
                <input type="number" class="form-control" id="finalPrice" name="finalPrice" disabled>
              </div>  
                </div>
              </div>
          <!-- COMMENTS -->
          <div class="row">
            <div class="col-lg-12">
              <textarea class="form-control" cols="50" rows ="3" name="comment" placeholder="Comments"></textarea>
            </div>
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
<!------------------------- END MODAL TO ADD ITEMS --------------------------->
<!-- <script>
    $( function() {
    var projects = [
      {
        label: "Apples",
        desc: "Apples"
      },
      {
        label: "Arugula",
        desc: "Arugula"
      },
      {
        label: "Avocado",
        desc: "Avocado"
      }
    ];
 
    $( ".fill_newitem" ).autocomplete({
      minLength: 0,
      source: projects,
      focus: function( event, ui ) {
        $( ".fill_newitem" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $( ".fill_newitem" ).val( ui.item.label );
        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<div>" + item.label + "</div>" )
        .appendTo( ul );
    };
  } );
  </script>

  <style>
    .ui-front {
      z-index: 9999999 !important;
    }
  </style> -->