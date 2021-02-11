   var hostname = window.Laravel.hostname;
            //district dropdown 
            $('#divisiond').change(function(){
              $('.district_vald').addClass('form-control input-sm');
              $(".district_vald  > option").remove();
              var id = $('#divisiond').val();

              $.ajax({
                type: "GET",
                url: hostname+'/api/v1/divisions/'+id+'/districts',

                success: function(item)
                {

                  $.each(item['data'],function(key,value)
                  {
                      // $(".district_val").append(
                      //   "<option value=" + key + ">" + val.name+ "</option>");

                    var opt = $('<option />');
                    opt.val(value['id']);
                    opt.text(value['name']);
                    $('.district_vald').append(opt);
                  });
                }, error: function (jqXHR) {
                // alert("error");
                showMessages('Unknown Error!!!', 'error');
                }
              });

            });

            //upazila dropdown
            $('#districtd').change(function(){
              $('.upazila_vald').addClass('form-control input-sm');
              $(".upazila_vald  > option").remove();
              var id = $('#districtd').val();
              

              $.ajax({
                type: "GET",
                url: hostname+'/api/v1/districts/'+id+'/upazilas',
                success: function(item)
                {
                  $.each(item['data'],function(key,value)
                  {
                    var opt = $('<option />');
                    opt.val(value['id']);
                    opt.text(value['name']);
                    $('.upazila_vald').append(opt);
                  });
                }

              });
            });

            //Union dropdown
            $('#upazilad').change(function(){
              $('.union_vald').addClass('form-control input-sm');
              $(".union_vald  > option").remove();
              var id = $('#upazilad').val();

             

              $.ajax({
                type: "GET",
                url: hostname+'/api/v1/upazilas/'+id+'/unions',
                success: function(item)
                {
                  $.each(item['data'],function(key,value)
                  {
                    
                    var opt = $('<option />');
                    opt.val(value['id']);
                    opt.text(value['name']);
                    $('.union_vald').append(opt);
                  });
                }
              });
            });


            //  //Union dropdown
            // $('#uniond').change(function(){
            //   $('.masjid_vald').addClass('form-control input-sm');
            //   $(".masjid_vald  > option").remove();
            //   var id = $('#uniond').val();
            //   // alert('dsfsd');
              

            //   $.ajax({
            //     type: "GET",
            //     url: hostname+'/api/v1/unions/'+id+'/masjid',
            //     success: function(item)
            //     {
            //       $.each(item['data'],function(key,value)
            //       {

            //         var opt = $('<option />');
            //         opt.val(value['id']);
            //         opt.text(value['name']);
            //         $('.masjid_vald').append(opt);
            //       });
            //     }
            //   });
            // });



            $( function() {
                $( "#villagesd" ).autocomplete({
                    source:function(request,response){
                        var search = $('#villagesd').val();
                        var id = $('#union').val();
                        $.get(hostname+"/api/v1/unions/'+id+'/villages-search?q="+search).done(function(data, status){
                            response(JSON.parse(data));
                        });
                    }
                });
            });