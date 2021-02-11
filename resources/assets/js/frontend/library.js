 $(".books").keyup(function(){
                    
    var bn_digit = ["0", "1", "2", "3","4", "5", "6", "7", "8","9"];
    
    function tr_digit(s){
        return s.replace(/\d/,
          function(a){
            return bn_digit[a]
              }
            )
          }

                
    var numbers = {
             '০': 0,
              '১': 1,
              '২': 2,
              '৩': 3,
              '৪': 4,
              '৫': 5,
              '৬': 6,
              '৭': 7,
              '৮': 8,
              '৯': 9
              };

               
    function replaceNumbers(input) {
        var output = [];
        for (var i = 0; i < input.length; ++i) {
          if (numbers.hasOwnProperty(input[i])) {
              output.push(numbers[input[i]]);
              } else {
                output.push(input[i]);
                }
              }
              return output.join('');
           }

       
        var first_num = replaceNumbers(""+tr_digit(""+$('#total_books_by_ifa').val()+"")+"");
                // alert(first_num);
        var second_number = replaceNumbers(""+tr_digit(""+$('#total_books_by_other').val()+"")+"");
        var sum = parseInt(first_num) + parseInt(second_number); 

        // alert(replaceNumbers(""+tr_digit(""+$('#total_books_by_ifa').val()+"")+""));

      var finalEnlishToBanglaNumber={'0':'০','1':'১','2':'২','3':'৩','4':'৪','5':'৫','6':'৬','7':'৭','8':'৮','9':'৯'};
 
        String.prototype.getDigitBanglaFromEnglish = function() {
            var retStr = this;
            for (var x in finalEnlishToBanglaNumber) {
                 retStr = retStr.replace(new RegExp(x, 'g'), finalEnlishToBanglaNumber[x]);
            }
            return retStr;
        };
         
        var english_number=""+sum.toString()+"";
         
        var bangla_converted_number=english_number.getDigitBanglaFromEnglish();
         
        
        $('#total_books').val(""+bangla_converted_number+"");
        });