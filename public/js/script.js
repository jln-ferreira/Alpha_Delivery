// ------------FRONT PAGE--------------
//=====================================
//-------------------------------------
//              #theOne
//           [We are Strategy
//            We are Comunity
//            We are ONE]
var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };
//---------------------------------------------------------------------------------

//-------------------------------MY CARD PAGE--------------------------------------
//=================================================================================

// --[MODEL NEW CARD]--
$(document).ready(function() {
    // show value of tips if selected Y
    var boolTips = document.getElementById('tipsYN');
    var valueTips = document.getElementById('valueTips');
    
    $("#tipsYN").change(function(){
        if (boolTips.value == 'Yes') {
            $("#divValueTips").fadeIn();
            $("#divValueTips").css('display', 'inline-block');
            valueTips.value = 0;
        }
        else{
            $("#divValueTips").fadeOut();
        }
    });
   
});

//----------------------------[DATA TABLE MY CARD]---------------------------------
$(document).ready(function() {


    // DataTable initialisation
    // ------ALL CARDS--------
    $('#allCard_DT').DataTable({
        select: true,
        responsive: true,
        colReorder: true,
        autoFill: true,
        dom: 'Bfrtip',
        columnDefs: [{ "targets": [8], "searchable": false, "orderable": false, "visible": true }]
        }
    );

    // DataTable initialisation
    // --------CARDS-----------
    $('#myCard_DT').DataTable({
        select: true,
        responsive: true,
        colReorder: true,
        autoFill: true,
        dom: 'Bfrtip',
        columnDefs: [{ "targets": [6], "searchable": false, "orderable": false, "visible": true }]
        }
    );

    // DataTable initialisation
    // ----------ITEM-----------
    $('#myItens_DT').DataTable({
        select: true,
        responsive: true,
        colReorder: true,
        autoFill: true,
        dom: 'Bfrtip',
        columnDefs: [{ "targets": [4], "searchable": false, "orderable": false, "visible": true }]
        }
    );
});

//=================================================================================
//------------ [myCard show new card]-----------
$(document).ready(function(){
  $("#newCard_addRow").click(function(){
    $("#new_Card_tr").toggle();
  });
});
//------------ [myItem show new item]-----------
$(document).ready(function(){
  $("#newItem_addRow").click(function(){
    $("#new_Item_tr").toggle();
  });
});


//=================================================================================
// ------[TOOLTIP FOR CARD - TIPS]------
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});

//---------------------------------WORK PAGE---------------------------------------
//=================================================================================
// ------- [Send the number of the order to MODEL] -------
$(document).ready(function(){

    var card_id;
    var card_id_model = document.getElementById("number_order");

    $(".card_id").click(function(){
        card_id = $(this).text();

        card_id_model.innerHTML = card_id;
        
        var regex_Card_id = "^\\s*"+ card_id +"\\s*$";

        $('#allcard_itens_DT').dataTable( {
            //retrieve: true,
            
            destroy: true,
            "searchCols": [
                { "search": regex_Card_id, "regex": true }
            ]
        });
    }); 

    //--------------IF SOMEONE SELECT OWN CARD--------------------
    $('[data-toggle="tooltip"]').tooltip();   
     
});

