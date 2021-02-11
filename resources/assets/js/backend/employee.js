 $(document).on('change', '#quota_id', function () {
    var id = $(this).val();
    if (id == 1) {
         $('.quata_panel').css({display:'block'});
    } 

    if (id == 0) {
         $('.quata_panel').css({display:'none'});
    }        
});