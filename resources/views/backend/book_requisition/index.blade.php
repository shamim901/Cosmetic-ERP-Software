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
   {{ Form::open(['route' => 'admin.requisition.list', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}
    
    
      
    <input type="text" name="requisition_no" placeholder=" চাহিদা নং " class="form-control">
    <input type="text" name="bseller_name" placeholder=" বিক্রয়কেন্দ্র নাম " class="form-control">
    <input type="text" name="bseller_number" placeholder=" বি. ফোন " class="form-control">

     <select name="division_id" id="division" class="form-control required">
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
    </select>


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
               
                @include('backend.book_requisition._list_sub_nav')

                <div class="panel-body">
                    <div class="">
                        <table class="table table-bordered">
                            <thead>
                                <tr>                                    
                                    <td class="text-center">ক্রম</td>
                                    <td class="text-center"> চাহিদা নং</td>
                                    <td class="text-center"> বিক্রয়কেন্দ্র নাম </td>
                                    <td class="text-center"> বি. ফোন </td>
                                                                                                
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($info as $key => $item)
                                <tr>
                                    <td class="text-center"> {{ $key+1 }} </td>
                                    <td class="text-center">{{ $item->requisition_no}}</td>
                                    <td class="text-center">{{ $item->name}}</td>                                   
                                    <td class="text-center">{{ $item->mobile}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                         {!! $info->render() !!}
                    </div>
                    
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
@endsection