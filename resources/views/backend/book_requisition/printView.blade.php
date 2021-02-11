@extends('frontend.layouts.app')

@section('content')
 
    <div class="row">
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-default">                
               <div class="panel-heading" style="width: 550px; float: left;padding-left: 300px">
                   <h4>ইসলামিক ফাউন্ডেশন</h4>
                    <p>আগারগাঁও, শেরেবাংলা নগর, ঢাকা-১২০৭</p>
                </div>

                 <div class="panel-heading " style="width: 250px; float: right; padding-top: 15px">
                    <table  class="table table-bordered">
                    	<tr>
                    		<th>Issue No:</th>
                    		<td>{{ $info[0]->issue_no}}</td>
                    	</tr>
                    	<tr>
                    		<th>Date:</th>
                    		<td>  <?php echo date('Y-m-d') ?> </td>
                    	</tr>
                    </table>
                </div>



                

                <div class="panel-body">
					<table class="table table-bordered">
						 
					  	<tbody>
						  <tr>
						  	 <th>বিক্রয়কেন্দের নাম: {{ $info[0]->sell_center_name }}</th>
						  </tr>
						  <tr>
						  	<th> মোবাইল:  {{ $info[0]->sellcenter_num }}</th>						   						 
						  </tr>
						   <tr>
						  	<th> চাহিদা নং:  {{ $info[0]->requisition_no }}</th>						   						 
						  </tr>
					  </tbody>
					</table>

					 <table class="table table-bordered" id="education_table" style="margin-bottom:0px; ">
                        <thead>
					    	<tr class="success">
						      	<th class="text-center" colspan="9">  বই ইস্যু </th>
						    </tr>
					  	</thead>
                            <thead>
                            <tr class="active">
                                <tr class="border">
					                <th class="text-center">SL</th>
					                <th class="text-center">বইয়ের নাম</th>
					                <th class="text-center">চাহিদা পরিমাণ</th>
					                <th class="text-center">ইস্যু পরিমাণ</th>
					               
					               
					             
                            </tr>

                              @foreach($info as $key => $item)
                                <tr>
                                    <td class="text-center"> {{ $key+1 }} </td>
                                    <td class="text-center">{{ $item->book_name}}</td>
                                    <td class="text-center">{{ $item->req_qnty}}</td>                                   
                                    <td class="text-center">{{ $item->issue_qnty }}</td>
                                    
                                </tr>
                            @endforeach

			          

			           </thead>
						
					 

                        </table>
 


        				 <table class="table">
				            <tr>
				                <td>
				                    <span class="border-top">Issued By {{ $info[0]->username }} </span>
				                </td>
				                

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

<script type="text/javascript">
    window.print();
    window.close();
</script>

@endsection