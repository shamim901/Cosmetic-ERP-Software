$('#sell_center').select2({
    ajax: {
        // url: hostname+'/CommonController/mosqueNameSearch',
        url : 'sellCenterNameSearch',
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
    placeholder: 'বিক্রয় কেন্দ্র নাম ',
    minimumInputLength: 1   
});

$('#customer').select2({
    ajax: {
        // url: hostname+'/CommonController/mosqueNameSearch',
        url : 'customerNameSearch',
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
    placeholder: 'Customer Name',
    minimumInputLength: 1   
});


$(document).on('change', '#customer', function () {

    var id = $(this).val();
    var ci_csrf_token = $("input[name='ci_csrf_token']").val();
    var sendData = {ci_csrf_token: ci_csrf_token, cust_id: id};
    
    $.get('getCustomer_info/'+id, function (response) {        
        set_customer(response)       
    }, 'json').fail(function (xhr) {
        //console.log(xhr);
    });
});

function set_customer(info){    
    $('#customer_name').val(info.name);
    $('#c_number').val(info.customer_mobile);
}

$('#book_sale').select2({
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
    placeholder: 'Product Name',
    minimumInputLength: 1   
});


$(document).on('change', '#book_sale', function () {
    var book_id = $(this).val();
    // alert(book_id);
    var ci_csrf_token = $("input[name='ci_csrf_token']").val();
    var sendData = {ci_csrf_token: ci_csrf_token, book_id: book_id};

    $.post("checkStock_sale", sendData).done(function (data) {
        if (data == true) {
            // alert(book_id);
            book_insert_data_for_sale(book_id);
        } else {
            swal("Stock Not Available", " ", "error");
            return false;
        }
    });

});


function book_insert_data_for_sale(book_id = 0) {
    
    // var patient_id = $("#patient_id").val();
    
    var check = 0;
    $('form table tbody').find('.product_id').each(function () {
        if ($(this).val() == book_id) {
            check = 1;
            return false;
        }
    });
    if (check == 1) {
        swal("Already Exit", " ", "error");
        return false;
    }
    
    $.get('getMedicineInfo_sale/'+book_id, function (response) {
        console.log(response);
        // alert(response);
        var row = '';
        // var total_price = 0;
        row += '<tr class="success">';

        row += '<td>' + response.category + '&nbsp; >> &nbsp;' + response.b_name + '<input type="hidden" class="product_id" name="product_id[]" value="' + response.product_id + '" /> </td>';
        row += '<td>' + response.price + '<input type="hidden" class="form-control tot_price" name="sale_price[]" value="' + response.price + '" /> </td>';
        // row += '<td>' + Math.round(response.stock) + '<input type="hidden" name="stock[]" class="stock" value="' + Math.round(response.stock) + '" /> </td>';
        //row += '<td><span class="tot_discount_text">' + response.total_discount_amount + '</span><input type="hidden" class="tot_discount" name="td_amount[]" value="' + response.total_discount_amount + '" /> </td>';
        row += '<td><input type="text" name="s_qnty[]" autocomplete="off" tabindex="6" class="form-control s_qnty" value="' + response.quantity_level + '" style="width:50px;" readonly/></td>';
        row += '<td><input type="text" name="discount[]" autocomplete="off" tabindex="6" class="form-control  decimalmask" value="0" style="width:50px;" disabled/></td>';
        row += '<td><input type="text" name="qnty[]" autocomplete="off" tabindex="6" class="form-control qnty decimalmask" value="1" style="width:50px;" required=""/></td>';
        row += '<td><span class="sub_total_text">' + Math.round(response.price) + '</span><input type="hidden" name="sub_total[]" class="sub_total" value="' + Math.round(response.price) + '" /> </td>';
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

$('#education_table').on('click', '.s_remove', function () {    
    $(this).closest("tr").remove();
    total();
});


function total() {
    total_price = 0;
    $('form table tbody .sub_total').each(function () {
        total_price += parseFloat($(this).val());
    });
    $("#pharmacy_total_price,#due").val(Math.round(total_price));
    // total_due();
}



$(document).on('keyup', '.discount', function () {

    var discount_type = $('#discount_type').val();
    var discount = parseFloat($(this).val());
    var paid = parseFloat($('#paid').val());
    var tot_price = parseFloat($(this).closest('tr').find('#pharmacy_total_price').val());
    var due = 0

    if (discount_type == 1) {
        if (!paid) {
            if (discount>tot_price) {           
                $(this).val(Math.round(tot_price));
                $("#due").val(Math.round(0));
            }
            else{
                due = parseFloat(tot_price - discount);
                $("#due").val(Math.round(due));
            }
          
        }
        if (paid) { 
            var rest = tot_price - paid ;
            if (discount > rest) {
                $(this).val(Math.round(rest));
                $("#due").val(Math.round(0));             
            }
            else{
                due = parseFloat(tot_price - paid - discount);
                $("#due").val(Math.round(due));
            }   
         }
    }
    if (discount_type ==2) {

        var discount_amount = (discount*tot_price)/100;

        if (!paid) {
            if (discount_amount>tot_price) {           
                $(this).val(Math.round(0));
                $("#due").val(Math.round(tot_price));
            }
            else{
                due = parseFloat(tot_price - discount_amount);
                $("#due").val(Math.round(due));
            }
          
        }
        if (paid) { 
            var rest = tot_price - paid ;
            if (discount_amount > rest) {
                $(this).val(Math.round(rest));
                $("#due").val(Math.round(0));             
            }
            else{
                due = parseFloat(tot_price - paid - discount_amount);
                $("#due").val(Math.round(due));
            }   
         }

    }

});



$(document).on('keyup', '.paid', function () {

    var paid  = parseFloat($(this).val());
    var discount = parseFloat($('.discount').val());
    var tot_price = parseFloat($(this).closest('tr').find('#pharmacy_total_price').val());
    $(".discount").val(Math.round(0));

    if (paid > tot_price) {
        $(this).val(Math.round(tot_price));
        due = parseFloat(tot_price - paid); 
        $("#due").val(Math.round(0)); 
    }

    if (paid < tot_price) {
        $(this).val(Math.round(paid));
        due = parseFloat(tot_price - paid); 
        $("#due").val(Math.round(due)); 
    }
    if (paid == tot_price) {
        $(this).val(Math.round(paid));
        due = parseFloat(tot_price - paid); 
        $("#due").val(Math.round(due)); 
    }
   
});

$(document).on('keyup', '#op_balance', function () {

    var value  = $(this).val();
    $(".op_value").val(Math.round(value));
   
});



 
$(document).on('change', '#discount_type', function () {
    
    var discount_type = $(this).val();
    $("#discount").val(Math.round(0)); 
    var tot_price = parseFloat($(this).closest('tr').find('#pharmacy_total_price').val());
    $("#due").val(Math.round(tot_price)); 

    if(discount_type==1){
        $("#discount_type_text").text('TK');         
    }else{
        $("#discount_type_text").text('%');
       
    }
        
});
