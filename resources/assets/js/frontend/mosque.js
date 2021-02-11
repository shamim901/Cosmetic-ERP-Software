

// $('.masjid_name_auto_search').select2({
//     ajax: {
//         url: hostname+'/CommonController/mosqueNameSearch',
//         dataType: 'json',
//         delay: 250,
//         data: function (params) {
//             return {
//                 q: params.term,
//             };
//         },
//         processResults: function (data, params) {
//             return {
//                 results: data.items
//             };
//         },
//         cache: true
//     },

//     allowClear: true,
//     placeholder: 'Medicine Name',
//     minimumInputLength: 1   
// });


$(document).on("select2:select", ".masjid_name_auto_search", function () {

    // var medicine_id = $(this).val();
    // var $this=$(this);
    // if(checkDuplicateMedicine(medicine_id)==1){
    //     return false;
    // }
   

    // targetUrl = siteURL+'prescription/doctor/getMedicineName/'+medicine_id
    // $.get(targetUrl, function (response) {

    //     var doctor_rules_option=null;
    //     var i;
    //     var rules=response.doctor_rules;
    //     for (i = 0; i < rules.length; i++) {
    //       doctor_rules_option += '<option value="'+rules[i].id+'">'+rules[i].rule_name+'</option>';
    //     }

    //     var row = '';
    //     var total_price = 0;
    //     row += '<tr class="success">';

    //     row += '<td>' + response.category_info.category_name + '&nbsp; >> &nbsp;' + response.medicine_name.product_name + '<input type="hidden" name="medicine_id[]" value="'+medicine_id+'" /></td>';
        
    //     row+='<td> <select name="roule_id[]" id="roule_id" class="form-control" required="">'+doctor_rules_option+'</select></td>';
    //     row+='<td><input type="text" name="duration[]" class="form-control"/></td>';
    //     row+='<td><input type="text" name="advice_medicine[]" class="form-control"/></td>';
       
    //     row += '<td><button type="button" class="remove s_remove"><i class="fa fa-times" aria-hidden="true"></i></button></td>';

    //     row += '</tr>'

    //     $('#medicine_row').append(row);
        
    // }, 'json').fail(function (xhr) {
    //     //console.log(xhr);
    // });
});
