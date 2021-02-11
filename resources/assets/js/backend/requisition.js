 
$('#book_requisition').select2({
    ajax: {
        // url: hostname+'/CommonController/mosqueNameSearch',
        url : 'bookNameSearch',
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
    placeholder: 'বই নির্বাচন করুন',
    minimumInputLength: 1   
});


$(document).on('change', '#book_requisition', function () {
    var book_id = $(this).val();
    // alert(book_id);
    var ci_csrf_token = $("input[name='ci_csrf_token']").val();
    var sendData = {ci_csrf_token: ci_csrf_token, book_id: book_id};

    $.post("checkStock", sendData).done(function (data) {
        if (data == true) {
            book_insert_data(book_id);
        } else {
            swal("Stock Not Available", " ", "error");
            return false;
        }
    });

});


function book_insert_data(book_id = 0) {
    
    // var patient_id = $("#patient_id").val();
    
    // var check = 0;
    // $('form table tbody').find('.product_id').each(function () {
    //     if ($(this).val() == product_id) {
    //         check = 1;
    //         return false;
    //     }
    // });
    // if (check == 1) {
    //     swal("Already Exit", " ", "error");
    //     return false;
    // }
    //targetUrl = siteURL + 'main_pharmacy_sale/pharmacy/getMedicineInfo/' + product_id + '/' + c_type;
    $.get('getMedicineInfo/'+book_id, function (response) {
        //console.log(response);
        // alert(response);
        var row = '';
        // var total_price = 0;
        row += '<tr class="success">';

        row += '<td>' + response.b_name + '<input type="hidden" class="product_id" name="product_id[]" value="' + response.book_id + '" /> </td>';
        row += '<td>' + response.category; '</td>';
        row += '<td><input type="text" name="s_qnty[]" autocomplete="off" tabindex="6" class="form-control s_qnty" value="' + response.quantity_level + '" style="width:50px;" readonly/></td>';
        row += '<td><input type="text" name="qnty[]" autocomplete="off" tabindex="6" class="form-control qnty decimalmask" value="1" style="width:50px;" required=""/></td>';
        row += '<td><button type="button" class="remove s_remove"><i class="fa fa-times" aria-hidden="true"></i></button></td>';

        row += '</tr>'

        $('#sale_data').append(row);
        total();
    }, 'json').fail(function (xhr) {
        //console.log(xhr);
    });
}



$(document).on('keyup', '.qnty', function () {

    var qnty = parseFloat($(this).val());
    var tot_price = parseFloat($(this).closest('tr').find('.tot_price').val());
    //var tot_discount = parseFloat($(this).closest('tr').find('.tot_discount').val());
    var stock = parseFloat($(this).closest('tr').find('.s_qnty').val());
    // var nd_amount = parseFloat($(this).closest('tr').find('.nd_amount').val());
    // var sd_amount = parseFloat($(this).closest('tr').find('.sd_amount').val());

    // alert(qnty);
    // alert(tot_price);
    // alert(stock);

    if (stock < qnty) {
        $(this).val(stock);
        var qnty = stock;
    }
    // var tot_discount = parseFloat((nd_amount * qnty) + (sd_amount * qnty));
    var sub_total = parseFloat(tot_price * qnty);
    // $(this).closest('tr').find('.tot_discount').val(tot_discount.toFixed(2));
    // $(this).closest('tr').find('.tot_discount_text').text(tot_discount.toFixed(2));
    $(this).closest('tr').find('.sub_total').val(Math.round(sub_total));
    $(this).closest('tr').find('.sub_total_text').text(Math.round(sub_total));
    total();
});


 
$('#bookSeller').select2({
    ajax: {
        // url: hostname+'/CommonController/mosqueNameSearch',
        url : 'bookSellerSearch',
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
    placeholder: 'বিক্রয় কেন্দ্রের নাম',
    minimumInputLength: 1   
});


$(document).on('change', '#bookSeller', function () {

    var id = $(this).val();
    var ci_csrf_token = $("input[name='ci_csrf_token']").val();
    var sendData = {ci_csrf_token: ci_csrf_token, cust_id: id};
    
    $.get('getBookSellerInfo/'+id, function (response) {        
        set_customer(response)       
    }, 'json').fail(function (xhr) {
        //console.log(xhr);
    });
});

function set_customer(info){    
    $('#customer_name').val(info.name);
    $('#c_number').val(info.mobile);
}


$(document).on("click", "#req_details", function(){

    $('#commonModalTitle').html('Requisition Details');
    $('#commonModalBody').html('<div class="loader"></div>');
    $('#commonModalFooter').remove();
    $('#commonModal').modal('show');
    var id = $(this).attr('ids');
    var ci_csrf_token = $("input[name='ci_csrf_token']").val();
    var sendData  = {id:id,ci_csrf_token:ci_csrf_token};
    // var _this = $(this).closest('tr');
    
    $.post('getReqDetails/'+id, sendData).done( function( data ) {
        $('#commonModalBody').html(data);

    });
    //location.reload();
});
 


 



