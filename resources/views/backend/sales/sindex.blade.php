@extends('backend.layouts.app')

@section('content')


<!-- Search Panel Start   -->
<style>
 .mControl {
 max-width: 150px;
 min-width: 100px;
 }

 .fieldset {
 margin: 0px;
 padding: 0px;
 }

 .panel-heading {
 padding: 5px 10px !important
 }

 .form-control {
 width: 100% !important;
 }
 .form-group {
 width: 100% !important;
 }
</style>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="padding: 0px 100px 0px 100px">
 <div class="panel panel-primary">
 <div class="panel-heading" role="tab" id="headingOne" style="background-color: green">
 <div class="panel-title">
 <span class="glyphicon glyphicon-plus"></span>
 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
 aria-controls="collapseOne" style="text-decoration: none;">
 Search Panel
 </a>
 </div>
 </div>
 <fieldset class="fieldset">
 <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
 <div class="panel-body form-inline">
 <div class="row">
   {{ Form::open(['route' => 'admin.sale.list', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}
    
    
      
    <input type="text" name="sale_no" placeholder=" রশিদ নং " class="form-control">
    <input type="text" name="customer_name" placeholder=" ক্রেতা নাম " class="form-control">
    <input type="text" name="customer_mobile" placeholder=" ক্রেতা ফোন " class="form-control">

   <!--   <select name="division_id" id="division" class="form-control required">
        <option value="">-- বিভাগ নির্বাচন করুন  --</option>                           
            @foreach($division as $item)
            <option value="{{ $item->id }}" {{ old('division_id')==$item->id?'selected':'' }}>
                {{ 
                    $item->bn_name
                }}
            </option>
            @endforeach
    </select>

   <select name="district_id" id="district" class="district_val form-control required">
        <option value="">-- জেলা নির্বাচন করুন  --</option>
    </select>

    <select name="upazilla_id" id="upazila" class="upazila_val form-control required">
        <option value="">-- উপজেলা নির্বাচন করুন  --</option>
    </select> -->

    <select name="sell_center" id="sell_center" class="sell_center form-control required">
        <option value="">--    --</option>
    </select>



    <input type="date" name="from_date"  class="form-control">
    <input type="date" name="to_date"  class="form-control">
    
    <select class="form-control" name="paginate">
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="75">75</option>
        <option value="100">100</option>
        <option value="500">500</option>
    </select>

    <button type="submit"  class="btn btn-success"> খুঁজুন </button>

    {{ Form::close() }}
   
 </div>
 </div>
 </div>
 </fieldset>
 </div>
</div>

<!-- Search Panel End   -->
    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
               <!--  <div class="panel-heading">
                    <i class="fa fa-home"></i>  বই বিক্রি তালিকা 
                </div> -->

                 @include('backend.sales._new_sub_nav')

                <div class="panel-body">
                    <div class="">
                        <table class="table table-bordered">
                            <thead>
                                <tr>                                    
                                    <td class="text-center">ক্রম</td>
                                    <td class="text-center">রশিদ নং</td>
                                    <td class="text-center"> ক্রেতা নাম</td>
                                    <td class="text-center"> ক্রেতা ফোন </td>
                                    <td class="text-center"> মূল্য</td>
                                    <td class="text-center"> ছাড়</td>
                                    <td class="text-center"> পরিশোধ </td>
                                    <td class="text-center"> বাকি</td>
                                    <td class="text-center">#</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($info as $key => $item)
                                <tr>
                                    <td class="text-center"> {{ $key+1 }} </td>
                                    <td class="text-center">{{ $item->sale_no}}</td>
                                    <td class="text-center">{{ $item->castomer_name}}</td>
                                   
                                    <td class="text-center">{{ $item->customer_mobile}}</td>
                                    <td class="text-center">{{ $item->tot_bill}}</td>
                                    <td class="text-center">{{ $item->tot_normal_discount}}</td>
                                    <td class="text-center">{{ $item->tot_paid}}</td>
                                    <td class="text-center">{{ $item->tot_due}}</td>                                   
                                    <td class="text-center">
                                         
                                    </td>
                                    
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
@endsection