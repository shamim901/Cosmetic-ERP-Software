$(function () {
    //district dropdown
    $('body').on('change', '#division', function () {
        var id = $(this).val();

        $.ajax({
            type: "GET",
            url: '/api/v1/divisions/' + id + '/districts',
            success: function (item) {
                $('.district_val').html('<option />');
                $.each(item['data'], function (key, value) {
                    var opt = $('<option />');
                    opt.val(value['id']);
                    opt.text(value['name']);
                    $('.district_val').append(opt);
                });
            }
        });
    });

    //upazila dropdown
    $('body').on('change', '#district', function () {
        var id = $(this).val();

        $.ajax({
            type: "GET",
            url: '/api/v1/districts/' + id + '/upazilas',
            success: function (item) {
                $('.upazila_val').html('<option />');
                $.each(item['data'], function (key, value) {
                    var opt = $('<option />');
                    opt.val(value['id']);
                    opt.text(value['name']);
                    $('.upazila_val').append(opt);
                });
            }

        });
    });

    //Union dropdown
    $('body').on('change', '#upazila', function () {
        var id = $(this).val();

        $.ajax({
            type: "GET",
            url: '/api/v1/upazilas/' + id + '/unions',
            success: function (item) {
                $('.union_val').html('<option />');
                $.each(item['data'], function (key, value) {
                    var opt = $('<option />');
                    opt.val(value['id']);
                    opt.text(value['name']);
                    $('.union_val').append(opt);
                });
            }
        });
    });


    // $("#villages").autocomplete({
    //     source: function (request, response) {
    //         var search = $('#villages').val();
    //         var id = $('#union').val();
    //         $.get("/api/v1/unions/'+id+'/villages-search?q=" + search).done(function (data, status) {
    //             response(JSON.parse(data));
    //         });
    //     }
    // });
});


$("#education_table tbody>tr").on('click', 'button.edu_add', function () {
    $(this).parents('tr').clone(true).insertAfter('#education_table tbody>tr:last');
    return false;
});

$("#education_table tbody>tr").on('click', 'button.edu_remove', function () {
    $(this).parents('tr').fadeOut('slow', function () {
        $(this).remove();
    });

    return false;
});


$("#exp_table tbody>tr").on('click', 'button.exp_add', function () {
    $(this).parents('tr').clone(true).insertAfter('#exp_table tbody>tr:last');
    return false;
});

$("#exp_table tbody>tr").on('click', 'button.exp_remove', function () {
    $(this).parents('tr').fadeOut('slow', function () {
        $(this).remove();
    });

    return false;
});

 

$('.comapny_auto_field').select2({
    ajax: {
        url: 'companyNameSearch',
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
    placeholder: 'Company Name',
    minimumInputLength: 1
});



$('.category_auto_field').select2({
    ajax: {
        url: 'categoryNameSearch',
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
    placeholder: 'Category Name',
    minimumInputLength: 1
});



$('.product_auto_field').select2({
    ajax: {
        url: 'productNameSearch',
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
