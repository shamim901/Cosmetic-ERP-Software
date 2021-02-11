/* Shamim Reza */
///New Sub Customer Modal SHow  22/08/2020  
$(document).on('click', '.author_name_add', function () {
    
    // var id = $('#cust_id').val();
    var target =  'add_new_athor' ;
   
    console.log(target);
    $('#commonModalTitle').html('Create New Sub Customer');
    $('#commonModalBody').html('<div class="loader"></div>');
    $('#commonModal').modal('show');
    $('#commonModalFooter').remove();

    $.get(target, function (data) {
        $('#commonModalBody').html(data);
    })
});


$('#author').select2({
    ajax: {
        // url: hostname+'/CommonController/mosqueNameSearch',
        url : 'authorNameSearch',
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term,
            };
        },
        processResults: function (data, params) {
            return {
                results: data.items
            };
        },
        cache: true
    },

    allowClear: true,
    placeholder: 'লেখকের নাম ',
    minimumInputLength: 1   
});
