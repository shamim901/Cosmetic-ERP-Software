@extends('backend.layouts.app')

@section('content')
 
    <div class="row">
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-default">                
                <div class="panel-heading" style="width: 550px; float: left;padding-left: 300px">
                    <h4>   ইসলামিক ফাউন্ডেশন  </h4>
                    <h5> <b> {{ $info[0]->sell_center_name }}  </b></h5>
                    <p> {{ $info[0]->up_name}}, {{ $info[0]->dis_name}}  </p>
                    <p> {{ $info[0]->sellcenter_num }} </p>
                </div>

                 <div class="panel-heading " style="width: 250px; float: right; padding-top: 15px">
                    <table  class="table table-bordered">
                    	<tr>
                    		<th>Sele No.:</th>
                    		<td>{{ $info[0]->sale_no }}</td>
                    	</tr>
                    	<tr>
                    		<th>Date:</th>
                    		<td>  <?php echo date('Y-m-d') ?> </td>
                    	</tr>
                    </table>
                </div>


                <div class="panel-body">
					<table class="table">
						 
					  	<tbody>
						  <tr>
						  	 
						  	<th> গ্রাহকের নাম:</th>
						  	<td> {{ $info[0]->name }} </td>
						  
						  	<th> মোবাইল:</th>
						  	<td> {{ $info[0]->customer_mobile }}</td>
						  </tr>

						  </tr>
					  </tbody>
					</table>

					 <table class="table table-bordered" id="education_table" style="margin-bottom:0px; ">
                        <thead>
					    	<tr class="success">
						      	<th class="text-center" colspan="9">  বই বিক্রি </th>
						    </tr>
					  	</thead>
                            <thead>
                            <tr class="active">
                                <tr class="border">
					                <th>SL</th>
					                <th>বইয়ের নাম</th>
					                <th>প্রতি ইউনিট</th>
					                <th>পরিমাণ</th>
					                <th>মুল্য</th>
					                <th class="text-center">ছাড়</th>
					                <th>উপমোট মুল্য</th>
					             
                            </tr>

                              @foreach($info as $key => $item)
                                <tr>
                                    <td class="text-center"> {{ $key+1 }} </td>
                                    <td class="text-center">{{ $item->book_name}}</td>
                                    <td class="text-center">{{ $item->unit_price}}</td>                                   
                                    <td class="text-center">{{ $item->product_sale_qnty }}</td>
                                    <td class="text-center">{{ $item->unit_price *  $item->product_sale_qnty}}</td>
                                    <td class="text-center">{{ $item->product_discount}}</td>
                                    <td class="text-center">{{ $item->unit_price *  $item->product_sale_qnty -  $item->product_discount}}</td>
                                </tr>
                            @endforeach

			            <tr class="border-top">
			                <th colspan="5"></th>
			                <th> মোট মুল্য </th>
			                <th> {{ $info[0]->tot_bill }} </th>
			            </tr>

			            <tr>
			                <th colspan="5"></th>
			                <th>ছাড়</th>
			                <th>
			                   {{ $info[0]->tot_normal_discount }} 
			                </th>
			            </tr>
			           
			            <tr>
			                <th colspan="5"></th>
			                <th>জমা</th>
			                <th> {{ $info[0]->tot_paid }} </th>
			            </tr>

			            <tr>
			                <th colspan="5"></th>
			                <th>বাকি</th>
			                <th> {{ $info[0]->tot_due }} </th>
			            </tr>

			           </thead>
						
					 

                        </table>

                        <div class="border">
            				<p style="text-align: left;margin:0;padding: 3px;" class="uppercase"><b>মোট জমা(কথায়)
                    			:  {{ $info[0]->tot_paid }} Only</b></p>
        				</div>


        				 <table class="table">
				            <tr>
				                <td>
				                    <span class="border-top">Cash Received By {{ $info[0]->username }} </span>
				                </td>
				                <td><strong><p style="font-weight: bold;font-size: 12px;padding: 5px">বিঃদ্রঃ</strong><u> ক্যাশ মেমো
				                        ছাড়া ওষুধ ফেরত নেয়া হবে না । </u></p></td>

				                <td><strong><p style="font-weight: bold;font-size: 12px;padding: 5px"> Print Date: <?php echo date('Y-m-d') ?> </p></td>
				            </tr>
				        </table>
					
	                
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
    
<script type="text/javascript">

    window.print();
    setTimeout(function () {
        window.close();
    }, 150);

</script>

<!-- <script type="text/javascript">
    window.print();
    window.close();
</script> -->

@endsection